@extends('layouts.admin.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Dokumen</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" novalidate="" method="POST" action="{{ route('masterdokumen.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="tipe_dokumen">Tipe Dokumen</label>
                                    <input type="text" class="form-control @error('tipe_dokumen') is-invalid @enderror" id="tipe_dokumen" name="tipe_dokumen" placeholder="" value="{{ old('tipe_dokumen') }}" required="">
                                    @error('tipe_dokumen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="format_file">Format File</label>
                                        <input type="text" class="form-control" id="format_file" name="format_file" placeholder="" value="{{ old('format_file') }}" required="" >
                                        @error('format_file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="maks_ukuran">Maksimal Ukuran</label>
                                        <input type="text" class="form-control @error('maks_ukuran') is-invalid @enderror" id="maks_ukuran" name="maks_ukuran" placeholder="" value="2048" required="">
                                        @error('format_file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="wajib">Wajib</label>
                                    <div class="form-group mb-0">
                                        <label class="radio-inline mr-3"><input type="radio" id="wajib" name="wajib" value="1"> True</label>
                                        <label class="radio-inline mr-3"><input type="radio" id="wajib" name="wajib" value="0"> False</label>
                                    </div>
                                    @error('wajib')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control @error('maks_ukuran') is-invalid @enderror" name="deskripsi" id="deskripsi" placeholder="" value="{{ old('deskripsi') }}" required="">
                                    @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <hr class="mb-4">
                                <button class="btn btn-warning text-white btn-lg btn-block" type="submit">Simpan</button>
                                <a href="{{ route('masterdokumen.index') }}" class="btn btn-danger btn-sl-sm" type="cancel">
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