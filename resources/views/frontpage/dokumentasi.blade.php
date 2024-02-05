@push('css')
  <style>
    .post-container {
      position: fixed;
      top: 0px;
      bottom: 0px;
      left: 0px;
      right: 0px;
      display: grid;
      place-items: center;
      padding: 10%;
      overflow: hidden;
      background-color: rgba(0, 0, 0, .3);
    }

    .post {
      display: flex;
      flex-direction: row;
      justify-content: center;
      overflow: hidden;
      width: 100%;
    }

    #image-container {
      background-color: black;
      min-height: 400px;
    }

    .img-documentation {
      width: 100%;
      height: 100%;
      min-height: 400px;
      object-fit: cover;
    }

    .btn-close {
      float: right;
    }

    #info-container {
      max-width: 400px;
      min-width: 280px;
      min-height: 400px;
      display: flex;
      flex-direction: column;
    }

    #documentation-date {
      box-sizing: border-box;
      background-color: white;
      font-size: 16px;
      font-weight: 300;
      border-bottom: 1px solid #D9D9D9;
      text-align: start;
      border-radius: 0px 5px 0px 0px;
      padding: 10px 20px;
      justify-content: space-between;
    }

    #documentation-content {
      background-color: white;
      flex: 1 1 0;
      overflow: scroll;
      text-align: start;
      padding: 20px;
      line-height: 30px;
    }

    .documentation-content {
      margin-bottom: 30px;
    }

    .documentation-title {
      color: #e3b04b;
    }

    .documentation-content:last-child {
      margin-bottom: 0px;
    }

    .documentation-content-description {
      color: rgba(0, 0, 0, .6);
      margin-top: 10px;
      font-size: 0.8em;
    }

    .btn-previous {
      position: absolute;
      top: auto;
      bottom: auto;
      left: 5%;
      border: none;
      height: 44px;
      width: 44px;
      background-color: #aaaaaa56;
      color: black;
      font-size: 36px;
      line-height: 32px;
    }

    .btn-next {
      position: absolute;
      top: auto;
      bottom: auto;
      right: 5%;
      border: none;
      height: 44px;
      width: 44px;
      background-color: #aaaaaa56;
      color: black;
      font-size: 36px;
      line-height: 32px;
    }

    .round {
      border-radius: 50%;
    }

    @media only screen and (max-width: 991px) {
      .post {
        display: block;
      }

      #image-container {
        width: 100%;
        min-width: 0;
        max-width: 100%;
      }

      #info-container {
        width: 100%;
        min-width: 0;
        max-width: 100%;
      }
    }

    .img-fill {
      width: 100%;
      height: 240px;
      object-fit: cover;
    }

  </style>
@endpush
<!-- End Screenshot Area -->
<section id="dokumentasi" class="screenshot-area ptb-100">
  <div class="container-fluid right-position">
    <div class="section-title">
      <h2>Dokumentasi</h2>
      <div class="bar"></div>
      {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidiunt  labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p> --}}
    </div>

    <div class="screenshot-slider owl-carousel owl-them">
      @foreach ($dataGambar as $key => $data)
        <div onclick="showDetail({{ $key }})" class="screenshot-item">
          {{-- onclick="showDetail('{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}', '{{ $data->judul }}', '{{ $data->deskripsi }}', '{{ asset('storage/' . $data->nama_file) }}')" --}}
          <div class="image">
            <img class="img-fill" src="/storage/{{ $data->nama_file }}" alt="image">
            {{-- <h6>{{ $data->judul }}</h6>
            <p>{{ Str::limit($data->deskripsi, 60, '...') }}</p> --}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- End Screenshot Area -->

@push('js')
  <script type="text/javascript">
    $(document).on('click', '.btn-close', function() {
      swal.clickConfirm();
    });

    var gambarIndex = 0;
    var dataGambarJs = @json($dataGambar);

    function nextDetail() {
      if (gambarIndex < dataGambarJs.length - 1) {
        gambarIndex++;
        showDetail(gambarIndex);
      } else {
        gambarIndex = 0;
        showDetail(gambarIndex);
      }
    }

    function prevDetail() {
      if (gambarIndex > 0) {
        gambarIndex--;
        showDetail(gambarIndex);
      } else {
        gambarIndex = dataGambarJs.length - 1;
        showDetail(gambarIndex);
      }
    }

    // function showDetail(tanggal, judul, deskripsi, url) {
    function showDetail(index) {
      gambarIndex = index;
      var tanggal = dataGambarJs[gambarIndex]['tanggal'];
      var judul = dataGambarJs[gambarIndex]['judul'];
      var deskripsi = dataGambarJs[gambarIndex]['deskripsi'];
      var url = dataGambarJs[gambarIndex]['url'];
      Swal.fire({
        showConfirmButton: false,
        allowOutsideClick: true,
        html: '<div class="post-container">' +
          '<div class="post">' +
          '<div id="image-container">' +
          '<img class="img-documentation" id="image" src="' + url + '">' +
          '</div>' +
          '<div id="info-container">' +
          '<div id="documentation-date">' +
          tanggal +
          '<button type="button" role="button" tabindex="0" class="btn btn-sm btn-close"></button>' +
          '</div>' +
          '<div id="documentation-content">' +
          '<div class="documentation-content">' +
          '<div class="documentation-title">' + judul + '</div>' +
          '<div class="documentation-content-description">' + deskripsi + '</div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '</div>' +
          '<button onclick="prevDetail()" class="btn btn-primary btn-previous round">&#8249;</button>' +
          '<button onclick="nextDetail()" class="btn btn-primary btn-next round">&#8250;</button>' +
          '</div>' +
          '</div>',
      })
    }
    // $(document).ready(function() {
    //   $('.doc').on('click', function() {

    //   })
    // })
  </script>
@endpush
