@extends('layouts.peserta.master')
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
		@if (session()->has('sukses'))
				<div class="alert alert-success solid alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
					<strong>{{ session('sukses') }}</strong>
					<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
					</button>
				</div>
				@endif
            <!-- row -->
			<div class="container-fluid">
				<div class="page-titles ">
					<ol class="breadcrumb d-flex justify-content-between align-items-center">
					  <li class="breadcrumb-item active mr-auto align-items-center"><a href="javascript:void(0)">Daftar Acara Yang Akan Datang</a></li>
					  <li>
						
					  </li>
					</ol>
				  </div>
				<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-responsive-lg mb-0 table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th width="70px" class="pl-5 text center">Judul</th>
											<th class="pl-5 text-center">Mulai</th>
											<th class="pl-5 text-center">Hingga</th>
											<th class="pl-5 text-center">Link</th>
										</tr>
									</thead>
									<tbody id="customers">
										@foreach ($jadwalAcara as $acara)
										<tr class="btn-reveal-trigger">
											<td class="py-3">
												<div class="media-body">
												<h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
												</div>
											</td>
											<td width="70px" class="pl-5 text-justify">{{ $acara->judul }}</td>
											<td class="py-2 pl-5 wspace-no text-center">{{ date('d F Y', strtotime($acara->mulai)) }}</td>
											<td class="py-2 pl-5 wspace-no text-center">{{ date('d F Y', strtotime($acara->hingga)) }}</td>
											<td class="py-2 pl-5 wspace-no text-center">@if ($acara->link_meet != '-')
												<a href="{{ $acara->link_meet }}">Klik disini</a>
											@else
												-
											@endif</td>
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
        <!--**********************************
            Content body end
        ***********************************-->
