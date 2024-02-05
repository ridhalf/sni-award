@extends('layouts.peserta.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Kontak</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" action="{{ route('kontak.store') }}" method="POST" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="" value="{{ old('nama_lengkap') }}" required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan">Jabatan</label>
                                    <select class="d-block w-50 default-select" id="jabatan" name="jabatan" required="">
                                        <option value="">Pilih...</option>
                                        <option value="CEO">CEO</option>
                                        <option value="Pegawai">Pegawai</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Direktur">Direktur</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_telepon">No Telepon</label>
                                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="" value="{{ old('nomor_telepon') }}" required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection