<!-- Start About Area -->
<section id="download" class="about-area pb-100">
  <div class="container">


    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-content">
          <h3>{{ $data->unduhberkas }}</h3>
          <div class="bar"></div>
          <p>{{ $data->ket_unduhberkas }}</p>
          <div class="about-btn">
            <button id="btn-download" class="default-btn">
              Download Sekarang
              <span></span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="about-image">
          <img src="/storage/{{ $data->gambar_unduhberkas }}" alt="image">
        </div>
      </div>
    </div>
  </div>

  <div class="default-shape">
    <div class="shape-1">
      <img src="assets/img/shape/1.png" alt="image">
    </div>

    <div class="shape-2 rotateme">
      <img src="assets/img/shape/2.png" alt="image">
    </div>

    <div class="shape-3">
      <img src="assets/img/shape/3.svg" alt="image">
    </div>

    <div class="shape-4">
      <img src="assets/img/shape/4.svg" alt="image">
    </div>

    <div class="shape-5">
      <img src="assets/img/shape/5.png" alt="image">
    </div>
  </div>
</section>
<!-- End About Area -->
<!-- Start Features Area -->
<section id="features" class="features-area pb-70">
  <section id="features" class="features-area pb-70">
    <div class="container mt-5">
      {{-- <div class="section-title">
                <h2>Awsome Features</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt  labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            </div> --}}

      <div class="row d-flex justify-content-center">

      </div>
    </div>

    <div class="default-shape">
      <div class="shape-1">
        <img src="assets/img/shape/1.png" alt="image">
      </div>

      <div class="shape-2 rotateme">
        <img src="assets/img/shape/2.png" alt="image">
      </div>

      <div class="shape-3">
        <img src="assets/img/shape/3.svg" alt="image">
      </div>

      <div class="shape-4">
        <img src="assets/img/shape/4.svg" alt="image">
      </div>

      <div class="shape-5">
        <img src="assets/img/shape/5.png" alt="image">
      </div>
    </div>
  </section>
  <!-- End Features Area -->

  @push('js')
    <script type="text/javascript">
      $(document).ready(function() {
        $('#btn-download').on('click', function() {
          Swal.fire({
            icon: 'info',
            title: 'Unduh berkas',
            html: '@foreach ($dataSniAward as $item) <a href="/storage/{{ $item->nama_dokumen }}" class="default-btn download-item-btn mt-2">{{ $item->nama_file }}<span></span></a> @endforeach <a href="#" class="default-btn download-item-btn mt-2">Logo SNI Award<span></span></a><a href="#" class="default-btn download-item-btn mt-2">Newsletter<span></span></a></div>',
            confirmButtonText: 'Tutup'
          })
        })
      })
    </script>
  @endpush
