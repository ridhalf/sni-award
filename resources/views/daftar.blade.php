<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="{{ asset('assets') }}/css/all.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/daftar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
  <title>SNI AWARD | Daftar</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container log-in-container">
      <form action="/register" method="POST">
        @csrf
        <h1 class="text-white text-center">SNI AWARD</h1>
        <h5 class="text-white text-center">Daftarkan Akun Anda</h5>
        <div class="form-group mt-3">
          <label class="mb-1 text-white"><strong>Nama Organisasi</strong></label>
          <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror" name="nama_organisasi" id="nama_organisasi" required
            value="{{ old('nama_organisasi') }}">
          @error('nama_organisasi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label class="mb-1 text-white"><strong>Email</strong></label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        {{-- <div class="form-group">
                            <label class="mb-1 text-white"><strong>Password</strong></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
							@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
                        </div> --}}

        <!-- <div class="text-center"> -->
        <button type="submit" class="btn btn-coklat btn-block mt-3">Selanjutnya<span></span></button>
        <!-- </div> -->

        <p class="text-white">Sudah memiliki akun ? <a class="text-white" href="/login">Masuk</a></p>
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
