<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ $peran }}</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/images/logosniaward.png">
  <link rel="stylesheet" href="{{ asset('admin') }}/vendor/chartist/css/chartist.min.css">
  {{-- //<link rel="stylesheet" href="{{ asset('dashboard') }}/css/style.css"> --}}
  <link href="{{ asset('admin') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css" />
  {{-- select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  {{-- trix editor --}}
  <link rel="stylesheet" type="text/css" href="/assets/css/trix.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="your_website_domain/css_root/flaticon.css">
  <script type="text/javascript" src="/assets/js/trix.js"></script>

  
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }

  </style>
</head>

<body>
  @include('partials_admin.header')
  @include('partials_admin.sidebar')

  @yield('content')

  @include('partials_admin.footer')

  <!-- jQuery Min JS -->
  <script src="{{ asset('admin') }}/js/jquery-3.5.1.min.js"></script>
  <!-- Popper Min JS -->
  <script src="{{ asset('admin') }}/js/popper.min.js"></script>
  <!-- Bootstrap Min JS -->
  <script src="{{ asset('admin') }}/js/bootstrap.min.js"></script>
  <!-- Owl Carousel Min JS -->
  <script src="{{ asset('admin') }}/js/owl.carousel.min.js"></script>
  <!-- Appear JS -->
  <script src="{{ asset('admin') }}/js/jquery.appear.js"></script>
  <!-- Odometer JS -->
  <script src="{{ asset('admin') }}/js/odometer.min.js"></script>
  <!-- Slick JS -->
  <script src="{{ asset('admin') }}/js/slick.min.js"></script>
  <!-- Particles JS -->
  <script src="{{ asset('admin') }}/js/particles.min.js"></script>
  <!-- Ripples JS -->
  <script src="{{ asset('admin') }}/js/jquery.ripples-min.js"></script>
  <!-- Popup JS -->
  <script src="{{ asset('admin') }}/js/jquery.magnific-popup.min.js"></script>
  <!-- WOW Min JS -->
  <script src="{{ asset('admin') }}/js/wow.min.js"></script>
  <!-- AjaxChimp Min JS -->
  <script src="{{ asset('admin') }}/js/jquery.ajaxchimp.min.js"></script>
  <!-- Form Validator Min JS -->
  <script src="{{ asset('admin') }}/js/form-validator.min.js"></script>
  <!-- Contact Form Min JS -->
  <script src="{{ asset('admin') }}/js/contact-form-script.js"></script>
  <!-- Main JS -->
  <script src="{{ asset('admin') }}/js/main.js"></script>

  {{-- datatables --}}
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  {{-- Select 2 --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



  {{-- evaluator --}}
  {{-- <script>
            $(document).ready( function () {
                $('#evaluatorTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('dataevaluator') !!}',
                    columns: [
                        { data: 'nama_lengkap', name: 'nama_lengkap' },
                        { data: 'status', name: 'status' },
                        { data: 'nomor_telepon', name: 'nomor_telepon' },
                        { data: 'action', name: 'action' },
                    ]
                });
            });
        </script> --}}

  {{-- peserta --}}
  <script>
    $(document).ready(function() {
      $('#pesertaTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datapeserta') !!}',
        columns: [{
            data: 'nama_organisasi',
            name: 'nama_organisasi'
          },
          {
            data: 'tipe_organisasi',
            name: 'tipe_organisasi'
          },
          {
            data: 'nomor_telepon',
            name: 'nomor_telepon'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });
  </script>
  
  {{-- evaluator --}}
  <script>
    $(document).ready(function() {
      $('#evaluatorTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dataevaluator') !!}',
        columns: [{
            data: 'nama_lengkap',
            name: 'nama_lengkap'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'nomor_telepon',
            name: 'nomor_telepon'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });
  </script>

  {{-- berita --}}
  <script>
    $(document).ready(function() {
      $('#beritaTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('databerita') !!}',
        columns: [{
            data: 'judul',
            name: 'judul'
          },
          {
            data: 'rilis',
            name: 'rilis'
          },
          {
            data: 'kategori',
            name: 'kategori'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });
  </script>

  {{-- seTable --}}
  <script>
    $(document).ready(function() {
      $('#seTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datase') !!}',
        columns: [{
            data: 'nama_organisasi',
            name: 'nama_organisasi'
          },
          {
            data: 'tipe_organisasi',
            name: 'tipe_organisasi'
          },
          {
            data: 'nomor_telepon',
            name: 'nomor_telepon'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });

  </script>
  {{-- deTable --}}
  <script>
    $(document).ready(function() {
      $('#deTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datade') !!}',
        columns: [{
            data: 'nama_organisasi',
            name: 'nama_organisasi'
          },
          {
            data: 'tipe_organisasi',
            name: 'tipe_organisasi'
          },
          {
            data: 'nomor_telepon',
            name: 'nomor_telepon'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });
  </script>
  {{-- verifikasiTable --}}
  <script>
    $(document).ready(function() {
      $('#verifTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dataverif') !!}',
        columns: [{
            data: 'nama_organisasi',
            name: 'nama_organisasi'
          },
          {
            data: 'tipe_organisasi',
            name: 'tipe_organisasi'
          },
          {
            data: 'nomor_telepon',
            name: 'nomor_telepon'
          },
          {
            data: 'action',
            name: 'action'
          },
        ]
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#evaluator').select2();
    });
  </script>

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
