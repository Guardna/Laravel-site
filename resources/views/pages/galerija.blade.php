@extends('layouts.front')

@section('title')
    Galerija
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection

@section('content')
<!-- Sadrzaj -->

               <div class="col-md-8">
            <div class="gallery-top heading"><br>
                <h3>Nasa galerija</h3><br>
            </div>
                <div class="card mb-4"></div>
            <div class="container">
            <div class="row">
            @isset($posts)
            @foreach($posts as $post)
            <div class="col-sm-3" >
            <a class="image-popup-no-margins" href="{{ asset('/').$post->putanja }}"><img src="{{ asset('/').$post->putanja }}" class="img img-thumbnail" alt="{{ $post->alt }}"></a>
            <br>
            <center><strong>{{ $post->alt }}</strong></center>
	    </div>
            @endforeach
            @endisset
            </div>
            </div>
                <div class="card mb-4"></div>
        </div>
@endsection