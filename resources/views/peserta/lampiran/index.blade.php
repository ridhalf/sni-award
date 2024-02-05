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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            @if ($isNew == 'new' && count($dataDokumen)==0 && $isVerify)
                                <p>UNGGAH DOKUMEN ANDA!</p>
                                <li><a href="{{ route('lampiran.create') }}" class="btn btn-warning text-white btn-event w-25" style="color: #ffffff">
                                    <span class="align-middle"><i class="ti-plus"></i></span> Unggah Lampiran
                                </a></li>
                            @elseif($isNew == 'edit' && !$isVerify)
                                <p>UNGGAH ULANG DOKUMEN ANDA!</p>
                                <li><a href="{{ route('lampiran.edit',$data->id) }}" class="btn btn-warning text-white btn-event w-25" style="color: #ffffff">
                                    <span class="align-middle"><i class="ti-plus"></i></span> Unggah Lampiran
                                </a></li>
                                <table class="table table-sm mb-0 table-responsive-lg text-black">
                                    <thead>
                                        
                                            <th class="align-middle">Nama Lampiran</th>
                                            <th class="align-middle text-right">Aksi</th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($dataDokumen as $data)
                                                <tr class="btn-reveal-trigger">
                                                    <td class="py-2">{{ $data->nama_dokumen }}</td>
                                                    @if ($data->nama_file)
                                                        <td class="py-2 text-right"><a href="/storage/{{ $data->nama_file }}"><span class="badge badge-success">Lihat<span class="ml-1 fa fa-check"></span></span></a>
                                                    @else
                                                        <td class="py-2 text-right"><a href="{{ route('lampiran.edit',$data->id) }}"><span class="badge badge-warning">Upload<span class="ml-1 fa fa-exclamation"></span></span></a>
                                                    @endif
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            @else
                                <table class="table table-sm mb-0 table-responsive-lg text-black">
                                    <thead>
                                        
                                            <th class="align-middle">Nama Lampiran</th>
                                            <th class="align-middle text-right">Aksi</th>
                                            <th class="no-sort"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($dataDokumen as $data)
                                                <tr class="btn-reveal-trigger">
                                                    <td class="py-2">{{ $data->nama_dokumen }}</td>
                                                    <td class="py-2 text-right"><a href="/storage/{{ $data->nama_file }}"><span class="badge badge-success">Lihat<span class="ml-1 fa fa-check"></span></span></a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
        </div>
        @foreach ($feedback as $item)
            <div class="col">
                    <div class="card text-white bg-dark">
                        <div class="card-header">
                            <h5 class="card-title text-white">Feedback</h5>
                        </div>
                        <div class="card-body mb-0">
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-white">
                            {{ $item->created_at }}
                        </div>
                    </div>
            </div>
        @endforeach
        @foreach ($oldFeedback as $item)
            <div class="col">
                    <div class="card text-white bg-dark">
                        <div class="card-header">
                            <h5 class="card-title text-white">Feedback</h5>
                        </div>
                        <div class="card-body mb-0">
                            <p class="card-text">{{ $item->deskripsi }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-white">
                            {{ $item->created_at }}
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
</div>

@endsection