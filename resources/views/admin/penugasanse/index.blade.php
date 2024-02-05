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
						<li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Daftar Nama Peserta</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="seTable">
                                        <thead>
                                            <tr>
                                                <th>Nama Organisasi</th>
                                                <th>Tipe Organisasi</th>
                                                <th>No Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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