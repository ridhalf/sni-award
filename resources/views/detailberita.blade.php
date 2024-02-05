@extends('layouts.frontend.master')
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{$dataBerita->judul }}</h2>
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
                                <img src="/storage/{{ $dataBerita->gambar }}" alt="image">
                            </div>
                            <div class="article-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li>
                                            <span>Diterbitkan :</span> 
                                            <a href="index.html">{{ date('d F Y', strtotime($dataBerita->rilis)) }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-5">
                                    {!! $dataBerita->konten !!}
                                </div>
                                
                            </div>
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

@endsection