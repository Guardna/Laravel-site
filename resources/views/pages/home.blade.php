@extends('layouts.front')

@section('title')
    Home page
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection

@section('content')
<!-- Sadrzaj -->
        <div class="col-md-8">

          <h1 class="my-4">Film Artikli
         
          </h1>
            
          @isset($users)
          {{-- var_dump($posts) --}}
            
          @foreach($users as $post)
            {{-- var_dump($post) --}}
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="{{ asset('/').$post->putanja }}" alt="{{ $post->alt }}">
            <div class="card-body">
              <h2 class="card-title">{{ $post->naslov }}</h2>
              <p class="card-text">
                  {{ $post->sadrzaj }}
              </p>
              <a href="{{ asset('/post/'.$post->postId )}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{ date("d.m.Y. H:i:s", $post->create) }} by
              <a href="#">{{ $post->korisnicko_ime }}</a>
            </div>
          </div>
		<!--// Blog Post -->
                @endforeach
                @endisset
                
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
            {{ $users->appends(['search' => request('search')])->links() }}
            </li>
          </ul>
        </div>
		<!--// Sadrzaj -->
@endsection