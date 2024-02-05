    @extends('layouts.admin.master')
    @section('content')
    <div class="content-body">
        <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Acara</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center">
                <div class="col-lg-8 col-md-7 order-md-1">
                    <form method="POST" action="{{ route('penjadwalanacara.update',$acara->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent @error('judul') is-invalid @enderror" name="judul" placeholder=" Judul:" value="{{ $acara->judul }}">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control bg-transparent @error('mulai') is-invalid @enderror" name="mulai" placeholder="" value="{{ date('Y-m-d\TH:i', strtotime($acara->mulai)) }}">
                        @error('mulai')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control bg-transparent @error('hingga') is-invalid @enderror" name="hingga" placeholder=" Judul:" value="{{ date('Y-m-d\TH:i', strtotime($acara->hingga)) }}">
                        @error('hingga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                        <div class="mb-3">
                        <label for="kategori">Kategori<span class="text-danger">*</span></label>
                        <select class="d-block w-50 default-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required="">

                        @if ($acara->kategori)
                            <option value="acara">acara</option>
                        @else
                            <option value="">Pilih...</option>
                            <option value="acara">acara</option>

                        @endif
                        </select>
                        @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control bg-transparent @error('link_meet') is-invalid @enderror" name="link_meet" placeholder=" Link:" value="{{ $acara->link_meet }}">
                        @error('link_meet')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-left mt-4 mb-2">
                        <button class="btn btn-warning text-white btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Simpan</button>
                        <a href="{{ route('penjadwalanacara.index') }}" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endsection
