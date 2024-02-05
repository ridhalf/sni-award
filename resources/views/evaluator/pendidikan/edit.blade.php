@extends('layouts.evaluator.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Pendidikan Evaluator</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" method="POST" action="{{ route('pendidikan.update',$dataPendidikan->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="oldIjazah" value="{{ $dataPendidikan->ijazah }}">
                                <div class="mb-3">
                                    <label for="nama_kampus">Nama Instansi</label>
                                    <input type="text" class="form-control @error('tipe_pertanyaan') is-invalid @enderror" id="nama_kampus" name="nama_kampus" placeholder="" value="{{ old('nama_kampus',$dataPendidikan->nama_kampus) }}" required="">
                                   @error('nama_kampus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                   @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="jenjang">Jenjang</label>
                                        <select class="d-block w-50 default-select" id="jenjang" name="jenjang" required="">
                                            <option value="">Pilih...</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        @error('jenjang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                   @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tahun_lulus" >Tahun Lulus</label>
                                        <select class="d-block w-50 default-select" id="tahun_lulus" name="tahun_lulus" required="">
                                            <option value="">Pilih...</option>
                                            @for ($tahun = 2000 ; $tahun < date('Y');$tahun++)
                                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @endfor
                                        </select>
                                        @error('tahun_lulus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                   @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="jazah">Ijazah</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="ijazah">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-warning text-white btn-lg btn-block" type="submit">Simpan</button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection