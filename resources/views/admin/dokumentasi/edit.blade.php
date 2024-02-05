@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Dokumentasi</a></li>
        </ol>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body d-flex justify-content-center">
              <div class="col-lg-8 col-md-7 order-md-1">
                <form class="needs-validation" action="{{ route('dokumentasi.update', $dataGambar->id) }}" method="POST" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="oldNama_file" value="{{ $dataGambar->nama_file }}">
                  <div class="mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" placeholder=""
                      value="{{ $dataGambar->judul }}" required="">
                    @error('judul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control bg-transparent" name="deskripsi" id="deskripsi"
                      rows="5">{{ $dataGambar->deskripsi }}</textarea>
                    @error('deskripsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    {{-- <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder=""
                      value="{{ $dataGambar->deskripsi }}" required="">
                    @error('deskripsi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror --}}
                  </div>
                  <div class="form-group" id="imagePreview">
                    @if ($dataGambar->nama_file)
                      <img src="/storage/{{ $dataGambar->nama_file }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg"  class="custom-file-input @error('nama_file') is-invalid @enderror" name="nama_file">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('nama_file')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-warning text-white" type="submit">Perbarui</button>
                  <a href="{{ route('dokumentasi.index') }}" class="btn btn-danger text-white" type="cancel">Batal</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
