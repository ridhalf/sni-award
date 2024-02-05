@extends('layouts.frontend.master')
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Dewan Juri SNI Award </h2>
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li>Juri</li>
                            </ul>
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

        <!-- Start Blog Area -->
        <section id="blog" class="blog-area pt-100 pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Dewan Juri SNI Award</h2>
                    <div class="bar"></div>
                    
                </div>

                <div class="row">
                    @foreach ($dataBerita as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog">
                                <div class="image">
                                    <a href="">
                                        <img src="/storage/{{ $item->gambar }}" alt="image">
                                    </a>
                                </div>
                                <div class="content">

                                    <h3>
                                        <a href="">
                                            nama
                                        </a>
                                    </h3>
                                    <li>Profesi</li>
                                    <li>Asal Instansi</li>
                                    <a href="" class="read-more">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        </section>

        <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
                <a href="#" class="prev page-numbers">
                    <i class="fa fa-chevron-left"></i>
                </a>
                <a href="#" class="page-numbers">1</a>
                <span class="page-numbers current" aria-current="page">2</span>
                <a href="#" class="page-numbers">3</a>
                <a href="#" class="page-numbers">4</a>
                <a href="#" class="next page-numbers">
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <!-- End Blog Area -->

@endsection