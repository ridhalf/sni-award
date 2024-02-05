@extends('layouts.evaluator.master')
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="page-titles ">
					<ol class="breadcrumb d-flex justify-content-between align-items-center">
					  <li class="breadcrumb-item active mr-auto align-items-center"><a href="javascript:void(0)">Riwayat SE</a></li>
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
										<th class="pl-5 width200">Nama Instansi</th>
										<th class="pl-5 text-right">Selesai</th>
									</tr>
								</thead>
								<tbody id="customers">
									@foreach ($riwayatSe as $item)
									<tr class="btn-reveal-trigger">
										
										<td class="py-3">
										<a href="#">
											<div class="media-body">
											<h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
											</div>
										</a>
										</td>
										<td width="70px" class="pl-5 text-justify">{{ $item->nama_organisasi }}</td>
										<td class="py-2 pl-5 wspace-no text-right">{{ date('d F Y', strtotime($item->updated_at)) }}</td>
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