<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ $peran }}</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('peserta') }}/images/logosniaward.png">
  <link rel="stylesheet" href="{{ asset('peserta') }}/vendor/chartist/css/chartist.min.css">
  {{-- //<link rel="stylesheet" href="{{ asset('dashboard') }}/css/style.css"> --}}
  <link href="{{ asset('peserta') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="{{ asset('peserta') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="{{ asset('peserta') }}/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  {{-- Select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  @include('partials_peserta.header')
  @include('partials_peserta.sidebar')

  @yield('content')


  @include('partials_peserta.footer')

  <!-- jQuery Min JS -->
  <script src="{{ asset('peserta') }}/js/jquery-3.5.1.min.js"></script>
  <!-- Popper Min JS -->
  <script src="{{ asset('peserta') }}/js/popper.min.js"></script>
  <!-- Bootstrap Min JS -->
  <script src="{{ asset('peserta') }}/js/bootstrap.min.js"></script>
  <!-- Owl Carousel Min JS -->
  <script src="{{ asset('peserta') }}/js/owl.carousel.min.js"></script>
  <!-- Appear JS -->
  <script src="{{ asset('peserta') }}/js/jquery.appear.js"></script>
  <!-- Odometer JS -->
  <script src="{{ asset('peserta') }}/js/odometer.min.js"></script>
  <!-- Slick JS -->
  <script src="{{ asset('peserta') }}/js/slick.min.js"></script>
  <!-- Particles JS -->
  <script src="{{ asset('peserta') }}/js/particles.min.js"></script>
  <!-- Ripples JS -->
  <script src="{{ asset('peserta') }}/js/jquery.ripples-min.js"></script>
  <!-- Popup JS -->
  <script src="{{ asset('peserta') }}/js/jquery.magnific-popup.min.js"></script>
  <!-- WOW Min JS -->
  <script src="{{ asset('peserta') }}/js/wow.min.js"></script>
  <!-- AjaxChimp Min JS -->
  <script src="{{ asset('peserta') }}/js/jquery.ajaxchimp.min.js"></script>
  <!-- Form Validator Min JS -->
  <script src="{{ asset('peserta') }}/js/form-validator.min.js"></script>
  <!-- Contact Form Min JS -->
  <script src="{{ asset('peserta') }}/js/contact-form-script.js"></script>
  <!-- Main JS -->
  <script src="{{ asset('peserta') }}/js/main.js"></script>
  {{-- Select 2 --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tipe_produk').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tahun_berdiri').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#provinsi').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#kabupaten').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#master_sni_id').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#tipe_organisasi').select2();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#master_sektor_kategori_id').select2();
    });
  </script>

  <script>
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
      });
    });

    $(function() {
      $('#provinsi').on('change', function() {
        let id = $('#provinsi').val();
        $.ajax({
          type: 'POST',
          url: "{{ route('getKabupaten') }}",
          data: {
            "_token": "{{ csrf_token() }}",
            "id": id
          },
          cache: false,

          success: function(msg) {
            $('#kabupaten').html(msg);
          },
          error: function(data) {
            console.log('error:', data);
          }
        })
      })
    })
  </script>

  @stack('scripts')

</body>
