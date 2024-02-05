<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SNI AWARD - Lupa Password</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/logosniaward.png">
    <link href="{{ asset('assets') }}/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logosniaward.png" alt=""></a>
									</div>
                                    <h2 class="text-center mb-4 text-white">Lupa Password</h2>
                                    <form action="{{ route('cekEmail') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-white" for="email"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="Masukkan email anda" id="email" name="email">
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


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

</body>

</html>