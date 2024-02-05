@extends('layouts.frontend.master')
@section('content')
  {{-- Informasi --}}
  <div class="container">
    @include('frontpage.banner')
  </div>
  @include('frontpage.informasi')
  @include('frontpage.berita')
  @include('frontpage.download')
  @include('frontpage.linimasa')
  @include('frontpage.kumpulanacara')
  @include('frontpage.dokumentasi')
  @include('frontpage.faq')
  {{-- @include('frontpage.detailberita') --}}
  {{-- @include('frontpage.kontak') --}}

@stop
