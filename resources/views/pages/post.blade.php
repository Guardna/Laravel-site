@extends('layouts.front')

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection
@section('content')

@isset($singlePost)
<!-- Sadrzaj -->
        <div class="col-md-8">


          <!-- Title -->
          <h1 class="mt-4">{{ $singlePost->naslov }}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{ $singlePost->postKorisnik }}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{ date("d.m.Y. H:i:s", $singlePost->create) }}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{ asset('/'.$singlePost->putanja)}}" alt="{{ $singlePost->alt}}">

          <hr>

          <!-- Post Content -->
          <p> {{ $singlePost->sadrzaj }}</p>

		  <hr>

          <!-- Comments Form -->
          @if(session()->get('user'))


          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="{{ route("postComment", ['postId' => $singlePost->postId]) }}" method="post">
                  {{ csrf_field() }}
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" name="akcija" value="post" class="btn btn-primary">Submit</button>
              </form>
            <!-- <form id="ajaxform">
                    <div hidden>
                        <input type="text" name="postid" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="message" class="form-control" placeholder="Enter Your Message" required="">
                    </div>
                    <button class="btn btn-success save-data">Save</button>
                </form> -->
                <br>
                @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                    {{ session('warning') }}
                    </div>
                @endif
            </div>
          </div>
          @else
          <h4>Da bi komentarisali morate da se ulogujete.</h4>
          @endif
          <div hidden>
          <form id="pform" action="{{ route("editComment", ['postId' => $singlePost->postId],['commentId' =>"2"]) }}" method="post">
                  {{ csrf_field() }}
                <div class="form-group">
                  <textarea class="form-control" id="txta" rows="3" name="content1"></textarea>
                </div>
                <button type="submit" name="akcija" value="edit" class="btn btn-primary">Update</button>
              </form>
          </div>
		  <!--// Comments Form -->

          <!-- Single Comment -->

               @isset($comments)
                @include('components.comments')
               @endisset



		<!--// Single Comment -->

        </div>
		<!--// Sadrzaj -->
@endisset
@endsection
