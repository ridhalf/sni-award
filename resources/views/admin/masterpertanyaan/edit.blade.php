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
                <form class="needs-validation" action="{{ route('masterpertanyaan.update', $dataPertanyaan->id) }}" method="POST" novalidate="">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="tipe_pertanyaan">Tipe Pertanyaan</label>
                    <select class="form-control @error('tipe_pertanyaan') is-invalid @enderror" id="tipe_pertanyaan" name="tipe_pertanyaan" required>
                      <option {{ $dataPertanyaan->tipe_pertanyaan == '0' ? 'selected' : '' }} value="0">Tipe 0</option>
                      <option {{ $dataPertanyaan->tipe_pertanyaan == '1' ? 'selected' : '' }} value="1">Tipe 1</option>
                      <option {{ $dataPertanyaan->tipe_pertanyaan == '2' ? 'selected' : '' }} value="2">Tipe 2</option>
                    </select>
                    {{-- <input type="text" class="form-control @error('tipe_pertanyaan') is-invalid @enderror" id="tipe_pertanyaan" name="tipe_pertanyaan"
                      placeholder="" required value="{{ $dataPertanyaan->tipe_pertanyaan }}"> --}}
                    @error('tipe_pertanyaan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input type="text" class="form-control @error('pertanyaan') is-invalid @enderror" name="pertanyaan" id="pertanyaan" placeholder="" required
                      value="{{ $dataPertanyaan->pertanyaan }}">
                    @error('pertanyaan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <hr class="mb-4">
                  <button class="btn btn-warning text-white btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Simpan</button>
                  <a href="{{ route('masterpertanyaan.index') }}" class="btn btn-danger btn-sl-sm" type="cancel">
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
