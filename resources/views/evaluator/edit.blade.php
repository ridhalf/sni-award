@extends('layouts.evaluator.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profil Evaluator</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" action="{{ route('profilevaluator.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="oldGambar" value="{{ $dataEvaluator->gambar }}">
                                <input type="hidden" name="oldNpwp" value="{{ $dataEvaluator->npwp }}">
                                <input type="hidden" name="oldKtp" value="{{ $dataEvaluator->ktp }}">
                                <input type="hidden" name="oldCv" value="{{ $dataEvaluator->cv }}">

                                <div class="mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap"  value="{{ old('nama_lengkap',$dataEvaluator->nama_lengkap) }}">
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="gelar_sebelum_nama">Gelar Sebelum Nama</label>
                                        <input type="text" class="form-control @error('gelar_sebelum_nama') is-invalid @enderror" id="gelar_sebelum_nama" name="gelar_sebelum_nama"  value="{{ old('gelar_sebelum_nama',$dataEvaluator->gelar_sebelum_nama) }}">
                                        @error('gelar_sebelum_nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Gelar Sesudah Nama</label>
                                        <input type="text" class="form-control @error('gelar_setelah_nama') is-invalid @enderror" id="gelar_setelah_nama" name="gelar_setelah_nama"  value="{{ old('gelar_setelah_nama',$dataEvaluator->gelar_setelah_nama) }}">
                                        @error('gelar_setelah_nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  value="{{ $data->email }}" disabled>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status',$dataEvaluator->status) }}" disabled>
                                            @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $dataEvaluator->tgl_lahir) }}" >
                                    @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_instansi">Nama Instansi</label>
                                    <input type="text" class="form-control @error('nama_instansi') is-invalid @enderror" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi',$dataEvaluator->nama_instansi) }}" >
                                    @error('nama_instansi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan',$dataEvaluator->pekerjaan) }}" >
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="form-group mb-0 @error('jenis_kelamin') is-invalid @enderror">
                                        @if ($dataEvaluator->jenis_kelamin== "P")
                                            <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="L"> Laki Laki</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="P" checked> Perempuan</label>
                                        @else
                                            <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="L" checked> Laki Laki</label>
                                            <label class="radio-inline mr-3"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                                        @endif
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat',$dataEvaluator->alamat) }}" >
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <select  id="provinsi" class="@error('master_provinsi_id') is-invalid @enderror" name="master_provinsi_id" >
                                            <option value="">Pilih...</option>
                                            @foreach ($dataProvinsi as $provinsi)
                                            @if (old('master_provinsi_id',$dataEvaluator->master_provinsi_id)==$provinsi->id)
                                                <option value="{{ $provinsi->id }}" selected>{{ $provinsi->nama }}</option>
                                            @else
                                                <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('master_provinsi_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="kabupaten">Kabupaten</label>
                                        <select  id="kabupaten" class="@error('master_kota_kabupaten_id') is-invalid @enderror" name="master_kota_kabupaten_id">
                                            <option value="">Pilih...</option>
                                            @foreach ($dataKabupaten as $kabupaten)
                                                @if (old('master_kota_kabupaten_id',$dataEvaluator->master_kota_kabupaten_id)==$kabupaten->id)
                                                    <option value="{{ $kabupaten->id }}" selected>{{ $kabupaten->nama }}</option>
                                                @else
                                                    
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('master_kota_kabupaten_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_telepon">No Telepon</label>
                                    <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon"  value="{{ old('nomor_telepon',$dataEvaluator->nomor_telepon) }}" >
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group" id="imagePreview">
                                        @if ($dataEvaluator->gambar)
                                        <img src="/storage/{{ $dataEvaluator->gambar }}" class="img-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="gambar">Gambar</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="gambar">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="imagePreview">
                                        @if ($dataEvaluator->npwp)
                                        <img src="/storage/{{ $dataEvaluator->npwp }}" class="img-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="npwp">Npwp</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="npwp">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="imagePreview">
                                        @if ($dataEvaluator->ktp)
                                        <img src="/storage/{{ $dataEvaluator->ktp }}" class="img-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="ktp">Ktp</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="ktp">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="imagePreview">
                                        @if ($dataEvaluator->cv)
                                        <img src="/storage/{{ $dataEvaluator->cv }}" class="img-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="cv" class="">Cv</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="cv">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr class="mb-4">
                                <button class="btn btn-warning text-white btn-lg btn-block w-25" type="submit">Simpan</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection