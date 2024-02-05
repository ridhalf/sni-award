@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Pertanyaan</a></li>
        </ol>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body d-flex justify-content-center">
              <div class="col-lg-8 col-md-7 order-md-1">
                <form class="needs-validation" action="{{ route('faq.update', $dataFaq->id) }}" method="POST" novalidate="">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan" id="pertanyaan" placeholder="" required
                      value="{{ $dataFaq->pertanyaan }}">
                    @error('pertanyaan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="jawaban">Jawaban</label>
                    <input type="text" class="form-control @error('jawaban') is-invalid @enderror" id="jawaban" name="jawaban" placeholder="" required
                      value="{{ $dataFaq->jawaban }}">
                    @error('jawaban')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <hr class="mb-4">
                  <button class="btn btn-warning text-white btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Simpan</button>
                  <a href="{{ route('faq.index') }}" class="btn btn-danger btn-sl-sm" type="button">
                    <span class="mr-2"></span>Batal
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
