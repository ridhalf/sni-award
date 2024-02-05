<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="{{ asset('assets') }}/css/all.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/pertanyaan.css">
  <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
  <title>SNI AWARD | Pertanyaan</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container log-in-container">
      <form action="/pertanyaan" method="POST">
        @csrf
        <h1 class="text-white text-center">SNI AWARD</h1>
        <h5 class="text-white text-center">Lengkapi Pertanyaan berikut!</h5>
        @if (session()->has('userid'))
          <input type="text" name="user_id" value="{{ session('userid') }}" hidden>
        @endif
        @foreach ($data as $item)
          <div class="form-group">
            <label class="mb-1 text-white"><strong>{{ $item->pertanyaan }}</strong></label> <br>
            {{-- <input type="text" name="pertanyaan[{{ $item->id }}]" class="form-control" id="j_{{ $item->id }}"  placeholder="jawaban ..." required maxlength="100"> --}}
            @if ($item->id === 1)
              {{-- <div class="basic-dropdown" id="j_{{ $item->id }}" name="pertanyaan[{{ $item->id }}]" required>
							<div class="dropdown">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									Pilih jawaban
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">facebook</a>
									<a class="dropdown-item" href="#">Line</a>
									<a class="dropdown-item" href="#">Instagram</a>
								</div>
							</div>
						</div> --}}
              <select class="d-block w-100 default-select form-control" id="j_{{ $item->id }}" name="pertanyaan[{{ $item->id }}]" required>
                <option value="">Choose...</option>
                <option value="facebook">Facebook</option>
                <option value="line">Line</option>
                <option value="instagram">Instagram</option>
                <option value="website sni">Website BSN</option>
              </select>
            @elseif ($item->id === 2)
              <select class="d-block w-100 default-select form-control" id="j_{{ $item->id }}" name="pertanyaan[{{ $item->id }}]" required>
                <option value="">Choose...</option>
                <option value="mendapatkan penghargaan">Mendapatkan penghargaan</option>
                <option value="mendapatkan hadiah">Mendapatkan hadiah</option>
                <option value="menjadi terkenal">Menjadi terkenal</option>
              </select>
            @elseif ($item->id === 3)
              <select class="d-block w-100 default-select form-control" id="j_{{ $item->id }}" name="pertanyaan[{{ $item->id }}]" required>
                <option value="">Choose...</option>
                <option value="mengetahui lebih lanjut tentang sni award">Mengetahui lebih lanjut tentang SNI award</option>
                <option value="meningkatkan performa perusahaan di bidang sni">Meningkatkan performa perusahaan di bidang SNI</option>
              </select>
            @endif
          </div>
        @endforeach

        <!-- <div class="text-center"> -->
        <button type="submit" class="btn btn-coklat btn-block mt-3">Submit<span></span></button>
        <!-- </div> -->

      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <img src="{{ asset('assets') }}/img/regis.png" style="height: 400px">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
