@extends('layouts.admin.master')
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
                <li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Daftar Dokumen</a></li>
                <li><a href="{{ route('masterdokumen.create') }}" class="btn btn-warning btn-event w-100" style="color: #ffffff">
                    <span class="align-middle"><i class="ti-plus"></i></span> Tambah Dokumen
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
                                        
                                        <th>No</th>
                                        <th class="pl-5">Tipe Dokumen</th>
                                        <th class="pl-5">Format File</th>
                                        <th class="pl-5">Maksimal Ukuran (KB)</th>
                                        <th class="pl-5">Wajib</th>
                                        <th width="70px" class="pl-5">Deskripsi</th>

                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    @foreach ($dataMasterDokumen as $masterDokumen)
                                    <tr class="btn-reveal-trigger">
                                        
                                        <td class="py-3">
                                            <a href="#">
                                                <div class="media-body">
                                                    <h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2 pl-5 wspace-no">{{ $masterDokumen->tipe_dokumen }}</td>
                                        <td class="py-2 pl-5 wspace-no">{{ $masterDokumen->format_file }}</td>
                                        <td class="py-2 pl-5 wspace-no">{{ $masterDokumen->maks_ukuran }}</td>
                                        <td class="py-2 pl-5 wspace-no">{{ $masterDokumen->wajib }}</td>
                                        <td width="70px" class="pl-5 text-justify">{{ $masterDokumen->deskripsi }}</td>
                                        <td class="py-2 text-right">
                                            <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0">
                                                    <form action="{{ route('masterdokumen.edit', $masterDokumen->id) }}" method="GET">
                                                        @csrf 
                                                        <button type="submit"  class="dropdown-item"><span>Ubah</span>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('masterdokumen.destroy', $masterDokumen->id) }}" method="POST">
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