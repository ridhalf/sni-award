<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap Min CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
  <!-- Animate Min CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/animate.min.css">
  <!-- Owl Carousel Min CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome.min.css">
  <!-- Odometer CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/odometer.css">
  <!-- Popup CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.min.css">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css">
  {{-- Sweetalert2 --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.min.css">

  @stack('css')

  <title>SNI AWARD</title>

  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
</head>

<body data-spy="scroll" data-offset="120">


  @include('partials.preloader')
  <div class="container">
    @include('partials.navbar')
  </div>

  @yield('content')

  @include('partials.footer')

  <!-- jQuery Min JS -->
  <script src="{{ asset('assets') }}/js/jquery-3.5.1.min.js"></script>
  <!-- Popper Min JS -->
  <script src="{{ asset('assets') }}/js/popper.min.js"></script>
  <!-- Bootstrap Min JS -->
  <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
  <!-- Owl Carousel Min JS -->
  <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
  <!-- Appear JS -->
  <script src="{{ asset('assets') }}/js/jquery.appear.js"></script>
  <!-- Odometer JS -->
  <script src="{{ asset('assets') }}/js/odometer.min.js"></script>
  <!-- Slick JS -->
  <script src="{{ asset('assets') }}/js/slick.min.js"></script>
  <!-- Particles JS -->
  <script src="{{ asset('assets') }}/js/particles.min.js"></script>
  <!-- Ripples JS -->
  <script src="{{ asset('assets') }}/js/jquery.ripples-min.js"></script>
  <!-- Popup JS -->
  <script src="{{ asset('assets') }}/js/jquery.magnific-popup.min.js"></script>
  <!-- WOW Min JS -->
  <script src="{{ asset('assets') }}/js/wow.min.js"></script>
  <!-- AjaxChimp Min JS -->
  <script src="{{ asset('assets') }}/js/jquery.ajaxchimp.min.js"></script>
  <!-- Form Validator Min JS -->
  <script src="{{ asset('assets') }}/js/form-validator.min.js"></script>
  <!-- Contact Form Min JS -->
  <script src="{{ asset('assets') }}/js/contact-form-script.js"></script>
  <!-- Main JS -->
  <script src="{{ asset('assets') }}/js/main.js"></script>
  {{-- Sweetalert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>

  @stack('js')
</body>

</html>
