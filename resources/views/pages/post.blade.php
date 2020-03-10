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
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
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
