@extends('layouts.front')

@section('title')
    Autor page
@endsection

@section('appendCss')
    @parent
    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/blog-home.css" rel="stylesheet"/>
@endsection
@section('content')
<!-- Sadrzaj -->
        <div class="col-md-8">

          <h1 class="my-4">O Autoru
          </h1>
           
          <!-- Blog Post -->
          <div class="card mb-4">
              @isset($korisnici)
              @foreach($korisnici as $korisnik)
              @if($korisnik->korisnikId==9)
            <img class="card-img-top" src="{{ asset($korisnik->slika) }}" alt="autor" >@endif
              @endforeach
            @endisset
          </div>
          <table class="table">
                <tr>
                  <td>Ime i Prezime:</td>
                  <td>Stefan Popovic</td>
                </tr>
                <tr>
                  <td>Datum rodjenja:</td>
		  <td>02.04.1994</td>
                </tr>
                <tr>
		  <td>Skola:</td>
		  <td>Visoka ICT</td>
		</tr>
                <tr>
                <td>Email:</td>
		<td>stefan.popovic.328.15@ict.edu.rs</td>
                </tr>
                <td></td><td></td>
            </table>
          
          
          
        </div>


@endsection