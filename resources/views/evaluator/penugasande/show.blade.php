@extends('layouts.evaluator.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        @if (session()->has('sukses'))
            <div class="alert alert-success solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                class="mr-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>{{ session('sukses') }}</strong>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>
        @endif
        @if (session()->has('gagal'))
            <div class="alert alert-danger solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                class="mr-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>{{ session('gagal') }}</strong>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>
        @endif
        
            <form action="{{ route('uploadFilePenugasan',$tugasDe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $tugasDe->id }}">
            <input type="hidden" name="peserta_id" value="{{ $tugasDe->peserta_id }}">
            <input type="hidden" name="oldNama_file" value="{{ $tugasDe->nama_file }}">
            <div class="row mb-2">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" accept=".pdf" class="custom-file-input @error('nama_file') is-invalid @enderror" name="nama_file">
                    <label class="custom-file-label">Pilih File ...</label>
                    @error('nama_file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                </div>
            <div class="row">
                <button class="btn btn-warning" type="submit" >Unggah</button>
            </div>
        </form>

        
    </div>
</div>
@endsection