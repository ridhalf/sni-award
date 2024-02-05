@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Evaluator</a></li>
        </ol>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body d-flex justify-content-center">
              <div class="col-lg-8 col-md-7 order-md-1">
                <form class="needs-validation" action="{{ route('storeEvaluator') }}" method="POST" novalidate="">
                  @csrf
                  <div class="mb-3">
                    <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder=""
                      value="{{ old('nama_lengkap') }}" required="">
                    @error('nama_lengkap')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="you@example.com"
                      value="{{ old('email') }}">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="status">Status<span class="text-danger">*</span></label>
                    <select class="d-block w-50 default-select @error('status') is-invalid @enderror" id="status" name="status" required="">
                      <option value="">Pilih...</option>
                      <option value="calon evaluator">Calon Evaluator</option>
                      <option value="evaluator">Evaluator</option>
                      <option value="ketua evaluator">Ketua Evaluator</option>
                    </select>
                    @error('status')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-warning text-white" type="submit">Simpan</button>
                  <a href="{{ route('showDataEvaluator') }}" class="btn btn-danger text-white" type="cancel">Batal</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
