@extends('layouts.evaluator.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pekerjaan Evaluator</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" method="POST" action="{{ route('pekerjaan.update',$dataPekerjaan->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="instansi">Nama Perusahaan</label>
                                    <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" value="{{ old('instansi',$dataPekerjaan->instansi) }}" required="">
                                    @error('instansi')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan',$dataPekerjaan->jabatan) }}" required="">
                                        @error('jabatan')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="tahun_mulai">Tahun Mulai</label>
                                        <select class="d-block w-100 default-select @error('tahun_mulai') is-invalid @enderror" id="tahun_mulai" name="tahun_mulai" required="">
                                            <option value="">Pilih...</option>
                                            @for ($tahun = 2000 ; $tahun < date('Y');$tahun++)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @endfor
                                        </select>
                                        @error('tahun_mulai')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="tahun_selesai">Tahun Selesai</label>
                                        <select class="d-block w-100 default-select @error('tahun_selesai') is-invalid @enderror" id="tahun_selesai" name="tahun_selesai" required="">
                                            <option value="">Pilih...</option>
                                            @for ($tahun = 2000 ; $tahun < date('Y');$tahun++)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @endfor
                                        </select>
                                        @error('tahun_selesai')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-warning btn-sl-sm mr-2 text-white" type="submit"><span class="mr-2"></span>Simpan</button>
                                <a href="{{ route('pekerjaan.index') }}" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection