@extends('layouts.front')

@section('title')
    Korisnik create
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection

@section('content')
<!-- Sadrzaj -->
        <div class="col-md-8">
            <h3>Add korisnik</h3>
            
            @empty(!session('message'))
              {{ session('message') }}
            @endempty

            @isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset

            <form action="{{ asset('/register/store') }}" method="POST" enctype="multipart/form-data">
              
              {{ csrf_field() }}
              
              <div class="form-group">
                <label>Korisnicko ime:</label>
                <input type="text" name="korisnickoIme" class="form-control" value="{{ (isset($korisnik))? $korisnik->korisnicko_ime : old('korisnickoIme') }}"/>
              </div>
              <div class="form-group">
                <label>Lozinka:</label>
                <input type="password" name="lozinka" class="form-control" value="{{ (isset($korisnik))? $korisnik->lozinka : old('lozinka') }}"/>
              </div> 
              <div class="form-group">
                <label>Slika:</label>
                
              
            @isset($korisnik)
                  <img src="{{ asset($korisnik->slika) }}" width="35" height="35" style="border-radius: 500px; -moz-border-radius: 500px; margin-top: 2px;"/>
                @endisset
           

                <input type="file" name="slika" class="form-control"  />

              </div>
              <div class="form-group">
                <input type="submit" name="addKorisnik" value="Add korisnik" class="btn btn-default" />
              </div> 
            </form>
        </div>
		<!--// Sadrzaj -->
@endsection