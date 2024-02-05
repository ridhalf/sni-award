@extends('layouts.evaluator.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Sertifikat Evaluator</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" method="POST" action="{{ route('sertifikat.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_sertifikat">Nama Sertifikat</label>
                                    <input type="text" class="form-control" name="nama_sertifikat" id="nama_sertifikat" placeholder="" value="" required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-md-2 d-flex align-items-center">
                                        <label for="nama_file">File Sertifikat</label>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="nama_file">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-warning text-white btn-lg btn-block" type="submit">Simpan</button>
                                <a href="{{ route('sertifikat.index') }}" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection