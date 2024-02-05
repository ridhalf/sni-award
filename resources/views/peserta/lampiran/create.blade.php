@extends('layouts.peserta.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Upload Dokumen</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" action="{{ route('lampiran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach ($dataMasterLampiran as $item)
                                    <label for="nama_dokumen">{{ $item->nama_dokumen }}</label>
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" accept=".pdf" class="custom-file-input @error('nama_file[{{ $item->id }}]') is-invalid @enderror" name="nama_file[{{ $item->id }}]" required>
                                                <label class="custom-file-label">Pilih file</label>
                                                @error('nama_file[{{ $item->id }}]')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                            </div>
                                    </div>
                                @endforeach
                                <hr class="mb-4">
                                <button type="submit" class="submit btn btn-sm btn-warning text-white" name="submit">Simpan</button>
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection