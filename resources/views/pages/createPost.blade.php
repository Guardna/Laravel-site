@extends('layouts.front')

@section('title')
    Post create
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection

@section('content')
<!-- Sadrzaj -->
        <div class="col-md-8">
            <h3>Add post</h3>

            @isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset
            <form action="{{ (isset($post))? asset('/posts/update/'.$post->postId) : asset('/posts/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ (isset($post))? $post->naslov : old('naslov') }}"/>
              </div>
              <div class="form-group">
                <label>Body:</label>
                <textarea name="body" class="form-control" rows="7">{{ (isset($post))? $post->sadrzaj : old('sadrzaj') }}</textarea>
              </div>
              <div class="form-group">
                <label>Photo:</label>
                @isset($post)
                <img src="{{ asset($post->putanja) }}" width="35" height="35"/>
                @endisset
                <input type="file" name="photo" class="form-control"  />
              </div>
              <div class="form-group">
                <label>Alt:</label>
                <input type="text" name="alt" class="form-control" value="{{ (isset($post))? $post->alt : old('alt') }}"/>
              </div>
              <div class="form-group">
                <input type="submit" name="addPost" value="{{ (isset($post))? 'Change post' : 'Add post' }}" class="btn btn-default" />
              </div>
            </form>

            <table class="table">
                <tr>
                  <td>ID</td>
                  <td>Korisnicko ime</td>
                  <td>Naslov</td>
                  <td>Slika</td>
                  <td>Datum Kreiranja/Izmene</td>
                  <td>Uloga</td>
                  <td>Izmeni</td>
                  <td>Obrisi</td>
                </tr>
                <!-- Prikaz postova-->
                @isset($postovi)
                @if(session()->get('user')[0]->naziv == 'admin')
                @foreach($postovi as $post)
                  <tr>
                    <td> {{ $post->postId }} </td>
                    <td> {{ $post->korisnicko_ime }} </td>
                    <td> {{ $post->naslov }} </td>
                    <td> <img src="{{ asset($post->putanja) }}" width="75" height="75" /> </td>
                    <td> {{ date("d.m.Y. H:i:s", $post->create) }}</br>@if($post->update!=null){{ date("d.m.Y. H:i:s", $post->update) }}@endif </td>
                    <td> {{ $post->naziv }} </td>
                    <td> <a href="{{ asset('/posts/'.$post->postId) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/posts/destroy/'.$post->postId) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endif
                @if(session()->get('user')[0]->naziv != 'admin')
                @foreach($postovi->where("korisnik_id", "=", session()->get('user')[0]->id) as $post)
                  <tr>
                    <td> {{ $post->postId }} </td>
                    <td> {{ $post->korisnicko_ime }} </td>
                    <td> {{ $post->naslov }} </td>
                    <td> <img src="{{ asset($post->putanja) }}" width="75" height="75" /> </td>
                    <td> {{ date("d.m.Y. H:i:s", $post->create) }}</br>@if($post->update!=null){{ date("d.m.Y. H:i:s", $post->update) }}@endif </td>
                    <td> {{ $post->naziv }} </td>
                    <td> <a href="{{ asset('/posts/'.$post->postId) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/posts/destroy/'.$post->postId) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endif
                @endisset
            </table>

        </div>
		<!--// Sadrzaj -->
@endsection
