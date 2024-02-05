<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SNI Award | Ubah Password</title>
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
    <link href="{{ asset('assets') }}/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="h-100 mt-5">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="/"><img src="{{ asset('assets') }}/images/logo-full.png" alt=""></a>
									</div>
                                    <h2 class="text-center mb-4 text-white">Ubah Password</h2>
                                    @if (session()->has('sukses'))
                                                <div class="alert alert-success solid alert-dismissible fade show">
                                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                    <strong>{{ session('sukses') }}</strong>
                                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                    </button>
                                                </div>
                                    @endif
                                    @if (session()->has('gagal'))
                                                <div class="alert alert-warning solid alert-dismissible fade show">
                                                    <strong>{{ session('gagal') }}</strong>
                                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                                    </button>
                                                </div>
                                    @endif
                                    <form action="{{ route('simpanPasswordBaru',$id) }}" method="POST">
                                        @csrf
                                            <div class="form-group">
                                                <label for="password" class="text-white">Password Baru</label>
                                                <input type="password" class="form-control @error('password') is-invalid  @enderror" name="password" id="password">
                                                <div class="invalid-feedback">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                        
                                            <div class="form-group">
                                                <label for="konfirmasi_password" class="text-white">Konfirmasi Password</label>
                                                <input type="password" class="form-control @error('konfirmasi_password') is-invalid  @enderror" name="konfirmasi_password" id="konfirmasi_password">
                                                <div class="invalid-feedback">
                                                    @error('konfirmasi_password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-coklat btn-block">SUBMIT</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>