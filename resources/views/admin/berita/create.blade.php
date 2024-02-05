@extends('layouts.admin.master')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Dokumen</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                            <div class="compose-content">
                                <form method="POST" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <select class="form-control w-25 @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                        <option value="">Pilih..</option>
                                        <option value="Berita">Berita</option>
                                        <option value="Acara">Acara</option>
                                    </select>
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control bg-transparent @error('judul') is-invalid @enderror" name="judul" placeholder=" Judul:" value="{{ old('judul') }}">
                                        @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" accept=".jpg, .png, .jpeg" class="custom-file-input @error('gambar') is-invalid @enderror" name="gambar">
                                            <label class="custom-file-label">Pilih file</label>
                                            @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="konten">Konten</label>
                                        <input type="hidden" class="form-control bg-transparent @error('konten') is-invalid @enderror" id="konten" name="konten" placeholder=" Konten:">
                                        <trix-editor input="konten" style="min-height: 200px;"></trix-editor>
                                        @error('konten')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="text-left mt-4 mb-2">
                                        <button class="btn btn-warning btn-sl-sm mr-2 text-white" type="submit"><span class="mr-2"></span>Simpan</button>
                                        <a href="{{ route('berita.index') }}" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                                    </div>
                                </form>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault();
    }) 
</script>

@endsection