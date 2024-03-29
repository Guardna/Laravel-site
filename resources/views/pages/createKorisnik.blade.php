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

            <form action="{{ (isset($korisnik))? asset('/users/update/'.$korisnik->id)  : asset('/users/store') }}" method="POST" enctype="multipart/form-data">

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
                <label>Uloga:</label>
                <select name="ddlUloga">
                  <option value="0">Izaberite</option>

                  @foreach($uloge as $uloga)
                    <option value="{{ $uloga->id }}" {{ (isset($korisnik) && $korisnik->uloga_id == $uloga->id)? 'selected' : ((old('ddlUloga')==$uloga->id)? 'selected' : '' )}} > {{ $uloga->naziv }} </option>
                  @endforeach

                </select>
              </div>
              <div class="form-group">
                <input type="submit" name="addKorisnik" value="{{ (isset($korisnik))? 'Change korisnik' : 'Add korisnik' }} " class="btn btn-default" />
              </div>
            </form>

            <table class="table">
                <tr>
                  <td>ID</td>
                  <td>Korisnicko ime</td>
                  <td>Slika</td>
                  <td>Datum Kreiranja/Izmene</td>
                  <td>Uloga</td>
                  <td>Izmeni</td>
                  <td>Obrisi</td>
                </tr>
                <!-- Prikaz korisnika-->
                @isset($korisnici)
                @foreach($korisnici as $korisnik)
                  <tr>
                    <td> {{ $korisnik->korisnikId }} </td>
                    <td> {{ $korisnik->korisnicko_ime }} </td>
                    <td> <img src="{{ asset($korisnik->slika) }}" width="75" height="75" style="border-radius: 500px; -moz-border-radius: 500px;" /> </td>
                    <td> {{ date("d.m.Y. H:i:s", $korisnik->created_at) }}</br>@if($korisnik->updated_at!=null){{ date("d.m.Y. H:i:s", $korisnik->updated_at) }}@endif </td>
                    <td> {{ $korisnik->naziv }} </td>
                    <td> <a href="{{ asset('/users/'.$korisnik->korisnikId) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/users/destroy/'.$korisnik->korisnikId) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endisset
            </table>
        </div>
		<!--// Sadrzaj -->
@endsection
