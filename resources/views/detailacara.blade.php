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

        <title>SNI Award -  Detail Acara</title>

        <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
    </head>

    <body data-spy="scroll" data-offset="120">

        <!-- Start Preloader Area -->
        {{-- <div class="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div> --}}
        <!-- End Preloader Area -->

        <!-- Start Navbar Area -->
        <nav class=" navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('assets') }}/img/logosniaward.png" width="100px" alt="logo">
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Beranda
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="/" class="nav-link">
                                Informasi
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="/" class="nav-link">
                                Berita
                            </a>
                        </li>
                        

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Download
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Linimasa
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Acara
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Dokumentasi
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                FAQ
                            </a>
                        </li>
                    </ul>

                    <div class="others-option">
                        <div class="d-flex align-items-center">
                            <div class="option-item">
                                <a href="/login" class="default-btn">
                                    Masuk
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar Area -->

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            {{-- <h2>{{$data->judul }}</h2> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="default-shape">
                <div class="shape-1">
                    <img src="{{ asset('assets') }}/img/shape/1.png" alt="image">
                </div>

                <div class="shape-2 rotateme">
                    <img src="{{ asset('assets') }}/img/shape/2.png" alt="image">
                </div>

                <div class="shape-3">
                    <img src="{{ asset('assets') }}/img/shape/3.svg" alt="image">
                </div>

                <div class="shape-4">
                    <img src="{{ asset('assets') }}/img/shape/4.svg" alt="image">
                </div>

                <div class="shape-5">
                    <img src="{{ asset('assets') }}/img/shape/5.png" alt="image">
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Single Blog Area -->
        <section class="single-blog-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="blog-details-desc">
                            <div class="article-image">
                                {{-- <img src="/storage/{{ $data->gambar }}" alt="image"> --}}
                            </div>
                            <div class="article-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <span>Diterbitkan :</span> 
                                            {{-- <a href="index.html">{{ $data->rilis }}</a> --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-5">
                                    {{-- {!! $data->konten !!} --}}
                                </div>
                                {{-- <blockquote class="wp-block-quote">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                    <cite>Tom Cruise</cite>
                                </blockquote>
                                <p>Quuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quia non numquam eius modi tempora incidunt ut labore et dolore magnam dolor sit amet, consectetur adipisicing.</p>
                                <ul class="wp-block-gallery columns-3">
                                    <li class="blocks-gallery-item">
                                        <figure>
                                            <img src="{{ asset('assets') }}/img/blog/image1.jpg" alt="image">
                                        </figure>
                                    </li>

                                    <li class="blocks-gallery-item">
                                        <figure>
                                            <img src="{{ asset('assets') }}/img/blog/image2.jpg" alt="image">
                                        </figure>
                                    </li>

                                    <li class="blocks-gallery-item">
                                        <figure>
                                            <img src="{{ asset('assets') }}/img/blog/image3.jpg" alt="image">
                                        </figure>
                                    </li>
                                </ul>
                                <h3>Four major elements that we offer:</h3>
                                <ul class="features-list">
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Scientific Skills For getting a better result
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        Communication Skills to getting in touch
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        A Career Overview opportunity Available
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        A good Work Environment For work
                                    </li>
                                </ul>
                                <h3>Setting the mood with incense</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in  sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                <h3>The Rise Of Marketing And Why You Need It</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                             --}}
                            </div>

                            {{-- <div class="article-footer">
                                <div class="article-tags">
                                    <span>
                                        <i class="fa fa-bookmark"></i>
                                    </span>
                                    <a href="">Fashion</a>,
                                    <a href="">Travel</a>
                                </div>

                                <div class="article-share">
                                    <ul class="social">
                                        <li><span>Bagikan:</span></li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="post-navigation">
                                <div class="navigation-links">
                                    <div class="nav-previous">
                                        <a href="index.html">
                                            <i class="flaticon-left"></i> 
                                            Sebelumnya
                                        </a>
                                    </div>
                                    <div class="nav-next">
                                        <a href="index.html">
                                            Selanjutnya
                                            <i class="flaticon-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>    

                           
                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area" id="secondary">
                            <section class="widget widget_search">
                                <form class="search-form search-top">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search...">
                                    </label class="">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </section>

                            <section class="widget widget_colugo_posts_thumb">
                                <h3 class="widget-title">Berita Terkini</h3>
                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time class="2021-06-30">June 10, 2021</time>
                                        <h4 class="title usmall">
                                            <a href="index.html">Making Peace With The Feast Or Famine Of Freelancing</a>
                                        </h4>
                                    </div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg2" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time class="2021-06-30">June 21, 2021</time>
                                        <h4 class="title usmall">
                                            <a href="index.html">Be healthy, Enjoy life with Colugo organic</a>
                                        </h4>
                                    </div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg3" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <time class="2021-06-30">June 30, 2021</time>
                                        <h4 class="title usmall">
                                            <a href="index.html">Buy organic food online and be healthy</a>
                                        </h4>
                                    </div>
                                </article>
                            </section>

                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Single Blog Area -->


        <!-- Start Footer Area -->
        <section class="footer-area pt-100 pb-70">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="single-footer-widget">
                            <a href="#" class="logo">
                                <img src="assets/img/logosniaward.png" alt="image" style="width: 100px">
                                <img src="assets/img/logobsn.png" alt="image" style="width: 180px">
                            </a>
                                <p>Gedung I BPPT Jl. M.H. Thamrin No.8
                                    Kebon Sirih, Jakarta Pusat 10340</p>
                                <br>
                            <a href="https://goo.gl/maps/dd7M7QX8j1CmNpm98" target="_blank" class="logo">
                                <img src="assets/img/icon/pin.svg" alt="pinlokasi" style="width: 20px"> Koordinat Peta  </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="single-footer-widget pl-5">
                            <h3>Tautan</h3>
                            <ul class="list">
                                <li>
                                    <a href="#home">
                                        Beranda
                                    </a>
                                </li>
                                <li>
                                    <a href="#about">
                                        Informasi
                                    </a>
                                </li>
                                <li>
                                    <a href="#berita">
                                        Berita
                                    </a>
                                </li>
                                <li>
                                    <a href="#download">
                                        Download
                                    </a>
                                </li>
                                <li>
                                    <a href="#linimasa">
                                        Linimasa
                                    </a>
                                </li>
                                <li>
                                    <a href="#acara">
                                        Acara
                                    </a>
                                </li>
                                <li>
                                    <a href="#dokumentasi">
                                        Dokumentasi
                                    </a>
                                </li>
                                <li>
                                    <a href="#faq">
                                        FAQ
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 text-center">
                        <div class="single-footer-widget">
                            <h3>Sosial Media</h3>
                            <ul class="list">
                                <li>
                                    {{-- <a href="{{ $data->linkfacebook }}" target="_blank"> --}}
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </a>
                                </li>
                                <li>
                                    {{-- <a href="{{ $data->linktwitter }}" target="_blank"> --}}
                                        <i class="fab fa-twitter"></i>
                                        Twitter
                                    </a>
                                </li>
                                <li>
                                    {{-- <a href="{{ $data->webbsn }}" target="_blank"> --}}
                                        <i class="fas fa-link"></i>
                                        BSN
                                    </a>
                                </li>
                                <li>
                                    {{-- <a href="{{ $data->linkinstagram }}" target="_blank"> --}}
                                        <i class="fab fa-instagram"></i>
                                        Instagram   
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section>
        <!-- End Footer Area -->

        <!-- Start Copy Right Area -->
        <div class="copy-right">
            <div class="container">
                <div class="copy-right-content">
                    <p>
                        Copyright © {{ date("Y"); }}. All Rights Reserved by
                        <a href="https://bsn.go.id" target="_blank">
                            Badan Standardisasi Nasional
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- End Copy Right Area -->

        <!-- Start Go Top Section -->
        <div class="go-top">
            <i class="fa fa-chevron-up"></i>
            <i class="fa fa-chevron-up"></i>
        </div>
        <!-- End Go Top Section -->

        <!-- jQuery Min JS -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <!-- Popper Min JS -->
        <script src="assets/js/popper.min.js"></script>
        <!-- Bootstrap Min JS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Owl Carousel Min JS -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- Appear JS -->
        <script src="assets/js/jquery.appear.js"></script>
        <!-- Odometer JS -->
        <script src="assets/js/odometer.min.js"></script>
        <!-- Slick JS -->
        <script src="assets/js/slick.min.js"></script>
        <!-- Particles JS -->
        <script src="assets/js/particles.min.js"></script>
        <!-- Ripples JS -->
        <script src="assets/js/jquery.ripples-min.js"></script>
        <!-- Popup JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <!-- WOW Min JS -->
        <script src="assets/js/wow.min.js"></script>
        <!-- AjaxChimp Min JS -->
        <script src="assets/js/jquery.ajaxchimp.min.js"></script>
        <!-- Form Validator Min JS -->
        <script src="assets/js/form-validator.min.js"></script>
        <!-- Contact Form Min JS -->
        <script src="assets/js/contact-form-script.js"></script>
        <!-- Main JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>