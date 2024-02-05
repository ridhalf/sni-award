@extends('layouts.peserta.master')
@section('content')
<div class="content-body">
    
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Profil Peserta</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <form class="needs-validation" action="{{ route('profilpeserta.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="oldGambar" value="{{ $dataProfil->gambar }}">
                                <div class="mb-3">
                                    <label for="nama_organisasi">Nama Organisasi</label>
                                    <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror" id="nama_organisasi" name="nama_organisasi"  value="{{ $dataProfil->nama_organisasi }}">
                                    @error('nama_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="master_sni_id">No SNI</label>
                                    <select name="master_sni_id" class="@error('master_sni_id') is-invalid @enderror" id="master_sni_id">
                                        <option value="">Pilih...</option>
                                        @foreach ($dataSni as $sni)
                                        @if (old('master_sni_id',$dataProfil->master_sni_id)==$sni->id)
                                            <option value="{{ $sni->id }}" selected>{{ $sni->no_sni }}</option>
                                        @else
                                            <option value="{{ $sni->id }}">{{ $sni->no_sni }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('master_sni_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_organisasi">Alamat Organisasi</label>
                                    <input type="text" class="form-control @error('alamat_organisasi') is-invalid @enderror" id="alamat_organisasi" name="alamat_organisasi" value="{{ $dataProfil->alamat_organisasi }}">
                                    @error('alamat_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_pabrik">Alamat Pabrik</label>
                                    <input type="text" class="form-control @error('alamat_pabrik') is-invalid @enderror" id="alamat_pabrik" name="alamat_pabrik" value="{{ $dataProfil->alamat_pabrik }}">
                                    @error('alamat_pabrik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="provinsi">Provinsi</label>
                                        <select class="@error('master_provinsi_id') is-invalid @enderror" id="provinsi" name="master_provinsi_id" >
                                            <option value="">Pilih...</option>
                                            @foreach ($dataProvinsi as $provinsi)
                                            @if (old('master_provinsi_id',$dataProfil->master_provinsi_id)==$provinsi->id)
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
                                        <select class="@error('master_kota_kabupaten_id') is-invalid @enderror" id="kabupaten" name="master_kota_kabupaten_id" >
                                            <option value="">Pilih...</option>
                                            @foreach ($dataKabupaten as $kabupaten)
                                                @if (old('master_kota_kabupaten_id',$dataProfil->master_kota_kabupaten_id)==$kabupaten->id)
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
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email_perusahaan">Email Perusahaan</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_perusahaan" name="email_perusahaan" value="{{ $dataProfil->email_perusahaan }}">
                                        @error('email_perusahaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nomor_telepon">No Telepon</label>
                                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ $dataProfil->nomor_telepon }}">
                                        @error('nomor_telepon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ $dataProfil->website }}">
                                    @error('website')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_berdiri">Tahun Berdiri</label>
                                    <select class="@error('tahun_berdiri') is-invalid @enderror" id="tahun_berdiri" name="tahun_berdiri" >
                                        <option value="">Pilih...</option>
                                        @for ($tahun = date("Y"); $tahun > 1900; $tahun--)
                                        @if (old('tahun_berdiri',$dataProfil->tahun_berdiri)==$tahun)
                                            <option value="{{ $tahun}}" selected>{{ $tahun }}</option>
                                        @else
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endif
                                        @endfor
                                    </select>
                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status_kepemilikan">Status Kepemilikan</label>
                                    <input type="text" class="form-control @error('status_kepemilikan') is-invalid @enderror" id="status_kepemilikan" name="status_kepemilikan" value="{{ $dataProfil->status_kepemilikan }}">
                                    @error('status_kepemilikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tipe_produk">Tipe Produk</label>
                                        <select class="@error('tipe_produk') is-invalid @enderror" id="tipe_produk" name="tipe_produk" >
                                            <option value="">Pilih...</option>
                                            <option value="Induk">Induk</option>
                                            <option value="Organisasi Menengah Jasa">Anak</option>
                                            <option value="Cabang">Cabang</option>
                                            <option value="Tunggal">Tunggal</option>
                                        </select>
                                        @error('tipe_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="master_sektor_kategori_id">Sektor atau Kategori</label>
                                        <select class="@error('master_sektor_kategori_id') is-invalid @enderror" id="master_sektor_kategori_id" name="master_sektor_kategori_id" >
                                            <option value="">Pilih...</option>
                                            @foreach ($dataSektorKategori as $sektor)
                                                @if (old('master_sektor_kategori_id',$dataProfil->master_sektor_kategori_id)==$sektor->id)
                                                    <option value="{{ $sektor->id }}" selected>{{ $sektor->nama_kategori }}</option>
                                                @else
                                                    <option value="{{ $sektor->id }}">{{ $sektor->nama_kategori }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('master_sektor_kategori_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="kekayaan_organisasi">Kekayaan Organisasi</label>
                                        <input type="text" class="form-control @error('kekayaan_organisasi') is-invalid @enderror" id="kekayaan_organisasi" name="kekayaan_organisasi" value="{{ $dataProfil->kekayaan_organisasi }}">
                                        @error('kekayaan_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="hasil_penjualan_organisasi">Hasil Penjualan Organisasi</label>
                                        <input type="text" class="form-control @error('hasil_penjualan_organisasi') is-invalid @enderror" id="hasil_penjualan_organisasi" name="hasil_penjualan_organisasi" value="{{ $dataProfil->hasil_penjualan_organisasi }}">
                                        @error('hasil_penjualan_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_organisasi">Tipe Organisasi</label>
                                    <select class="@error('tipe_organisasi') is-invalid @enderror" id="tipe_organisasi" name="tipe_organisasi" >
                                        <option value="">Pilih...</option>
                                        <option value="Induk">Induk</option>
                                        <option value="Organisasi Menengah Jasa">Anak</option>
                                        <option value="Cabang">Cabang</option>
                                        <option value="Tunggal">Tunggal</option>
                                    </select>
                                    @error('tipe_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group" id="imagePreview">
                                        @if ($dataProfil->gambar)
                                        <img src="/storage/{{ $dataProfil->gambar }}" class="img-preview img-fluid mb-3 col-sm-5">
                                        @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </div>
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" name="gambar">
                                            <label class="custom-file-label">Pilih file</label>
                                        @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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