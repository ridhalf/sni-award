@extends('layouts.frontend.master')
@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Kumpulan Acara</h2>
                            <ul>
                                <li><a href="/">Beranda</a></li>
                                <li>Kumpulan Acara</li>
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
                {{-- <div class="section-title">
                    <h2>Acara</h2>
                    <div class="bar"></div>
                    <p>Kumpulan Acara Yang Telah Diselenggarakan</p>
                </div> --}}

                <div class="row">
                    {{-- @foreach ($dataBerita as $data) --}}
                        <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="image">
                                {{-- <a href="/berita/{{ $data->slug }}"> --}}
                                    {{-- <img src="/storage/{{ $data->gambar }}" alt="image"> --}}
                                </a>
                            </div>
                            <div class="content">
                                <ul class="post-meta">
                                    <li>
                                        <i class="fa fa-calendar"></i>
                                        {{-- {{ $data->rilis }} --}}
                                    </li>
                                </ul>

                                <h3>
                                    {{-- <a href="/berita/{{ $data->slug }}"> --}}
                                        {{-- {{ $data->judul }} --}}
                                    </a>
                                </h3>
                                {{-- <p>{{ $data->potongan_berita }}</p> --}}
                                <a href="/detailacara" class="read-more">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
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