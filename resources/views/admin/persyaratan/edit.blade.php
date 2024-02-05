@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Dokumen</a></li>
        </ol>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body d-flex justify-content-center">
              <div class="col-lg-8 col-md-7 order-md-1">
                <form method="POST" action="{{ route('persyaratan.update', $dataPersyaratan->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <input type="text" class="form-control bg-transparent @error('nama_file') is-invalid @enderror" name="nama_file" placeholder=" Judul:"
                      value="{{ $dataPersyaratan->nama_file }}">
                    @error('nama_file')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".pdf" class="custom-file-input @error('nama_dokumen') is-invalid @enderror" name="nama_dokumen">
                      <label class="custom-file-label">Pilih file</label>
                      @error('nama_dokumen')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="text-left mt-4 mb-2">
                    <button class="btn btn-warning text-white btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Perbarui</button>
                    <a href="{{ route('persyaratan.index') }}" class="btn btn-danger text-white btn-sl-sm mr-2" type="cancel"><span
                        class="mr-2"></span>Batal</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
