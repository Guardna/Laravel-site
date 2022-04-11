<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpg" href="images/film.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="kritike filmove,ocene i misljenja">
    <meta name="keywords" content="filmovi,kritika,ocene,forum" />
    <meta name="author" content="Stefan Popovic">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> Film Kritike | @yield('title') </title>

    @section('appendCss')

    <link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    @show

<script src="{{ asset('/') }}vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('/') }}js/Popup/dist/magnific-popup.css">
<script src="{{ asset('/') }}js/provera.js"></script>
<script src="{{ asset('/') }}js/Popup/dist/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.image-popup-vertical-fit').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			mainClass: 'mfp-img-mobile',
			image: {
				verticalFit: true
			}

		});

		$('.image-popup-fit-width').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			image: {
				verticalFit: false
			}
		});

		$('.image-popup-no-margins').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom',
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});

	});


</script>

  </head>
  <body>

    @include('components.nav')

    <div class="container">

      <div class="row">
        <div class="col-lg-12"></div>
        <div class="col-lg-12">
          @empty(!session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endempty

          @empty(!session('success'))
            <div class="alert alert-success">{{ session('success') }} </div>
          @endempty
        </div>

        @yield('content')

        @include('components.sidebar')

      </div>

    </div>


    @include('components.footer')


    @section('appendJavascript')


    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("js/ajax.js") }}"></script>
    @show

  </body>

</html>

