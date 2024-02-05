<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="{{ asset('assets') }}/css/all.css">
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendor/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>SNI AWARD | Login</title>
</head>

<body>
  @if (session()->has('sukses'))
    <div class="alert alert-success solid alert-dismissible fade show">
      <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
        class="mr-2">
        <polyline points="9 11 12 14 22 4"></polyline>
        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
      </svg>
      <strong>{{ session('sukses') }}</strong> Login sekarang!
      <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
      </button>
    </div>
  @endif
  @if (session()->has('loginError'))
    <div class="alert alert-danger solid alert-dismissible fade show">
      <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
        class="mr-2">
        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
        <line x1="15" y1="9" x2="9" y2="15"></line>
        <line x1="9" y1="9" x2="15" y2="15"></line>
      </svg>
      <strong>{{ session('loginError') }}</strong> email atau password anda salah!
      <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
      </button>
    </div>
  @endif
  <div class="container" id="container">
    <div class="form-container log-in-container">
      <form action="/login" method="POST" class="pt-1">
        @csrf
        <h1 class="text-center text-white">SNI AWARD</h1>
        <small class="text-center text-white">Masuk menggunakan akun anda</small>
        <div class="form-group mt-3 ">
          <label class="mb-1 text-white"><strong>Email</strong></label>
          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus required>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label class="mb-1 text-white"><strong>Password</strong></label>
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
        </div>
        <div class="form-row d-flex justify-content-between mt-4">
          <div class="form-group">
            <a class="text-white" href="{{ route('lupaPassword') }}">Lupa Password?</a>
          </div>
        </div>
        <!-- <div class="text-center"> -->
        <button type="submit" class="btn btn-coklat btn-block">Masuk<span></span></button>
        <!-- </div> -->

        <p class="text-white ">Belum memiliki akun ? <a class="text-white" href="/register">Daftar</a></p>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <img src="{{ asset('assets') }}/img/login.png" style="height: 400px">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
