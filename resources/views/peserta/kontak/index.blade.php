@extends('layouts.peserta.master')
@section('content')

<div class="content-body">
    @if (session()->has('sukses'))
				<div class="alert alert-success solid alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
					<strong>{{ session('sukses') }}</strong>
					<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
					</button>
				</div>
				@endif
    <div class="container-fluid">
        <div class="page-titles ">
            <ol class="breadcrumb d-flex justify-content-between align-items-center">
                <li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Daftar Kontak</a></li>
                <li><div class="input-group search-area d-xl-inline-flex d-none mr-3">
                    <div class="input-group-append">
                        <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Cari Dokumen . . .">
                </div>
                </li>
                <li><a href="{{ route('kontak.create') }}" class="btn btn-primary btn-event w-100" style="color: #ffffff">
                    <span class="align-middle"><i class="ti-plus"></i></span> Tambah Kontak
                </a></li>
                
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-lg mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkAll">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>No</th>
                                        <th class="pl-5 width200">Nama</th>
                                        <th class="pl-5 width200">Jabatan</th>
                                        <th class="pl-5 width200">No Telepon</th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    @foreach ($dataKontak as $data)                                    
                                    <tr class="btn-reveal-trigger">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox1">
                                                <label class="custom-control-label" for="checkbox1"></label>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <a href="#">
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2 pl-5 wspace-no">{{ $data->nama_lengkap }}</td>
                                        <td class="py-2 pl-5 wspace-no">{{ $data->jabatan }}</td>
                                        <td class="py-2 pl-5 wspace-no">{{ $data->nomor_telepon }}</td>
                                        <td class="py-2 text-right">
                                            <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <form action="{{ route('kontak.edit', $data->id) }}" method="GET">
                                                        @csrf 
                                                        <button type="submit"  class="dropdown-item"><span>Ubah</span>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('kontak.destroy', $data->id) }}" method="POST">
                                                        @csrf 
                                                        @method('delete')
                                                        <button type="submit"  class="dropdown-item text-danger" onclick="return confirm('apakah yakin ingin menghapus data ini? ')"><span>Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection