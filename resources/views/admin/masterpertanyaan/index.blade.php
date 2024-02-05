@extends('layouts.admin.master')
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
      <div class="page-titles ">
        <ol class="breadcrumb d-flex justify-content-between align-items-center">
          <li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Daftar Pertanyaan</a></li>
          <li>
						<a href="{{ route('masterpertanyaan.create') }}" class="btn btn-warning btn-event w-100" style="color: #ffffff">
              <span class="align-middle"><i class="ti-plus"></i></span> Tambah Pertanyaan
            </a>
					</li>
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
                      <th class="pl-5 text-left">Tipe Pertanyaan</th>
                      <th width="300px" class="pl-0 text-center">Pertanyaan</th>
                      <th class="pl-5 text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="customers">
                    @foreach ($dataPertanyaan as $pertanyaan)
                      <tr class="btn-reveal-trigger">
                        
                        <td class="py-3">
                          <a href="#">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
                            </div>
                          </a>
                        </td>
                        <td class=" pl-5 text-left"><a href="mailto:ricky@example.com">{{ $pertanyaan->tipe_pertanyaan }}</a></td>
                        <td width="300px" class="pl-0 text-justify">{{ $pertanyaan->pertanyaan }}</td>
                        <td class="py-2 text-center">
                          <a href="{{ route('masterpertanyaan.edit', $pertanyaan->id) }}" type="submit" class="badge badge-warning text-white"><span>Ubah</span>
                          </a>
                          <form class="d-inline" action="{{ route('masterpertanyaan.destroy', $pertanyaan->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="badge badge-danger" onclick="return confirm('apakah yakin ingin menghapus data ini? ')"><span>Hapus</span>
                            </button>
                          </form>
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
