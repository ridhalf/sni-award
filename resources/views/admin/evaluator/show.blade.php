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
        @if (session()->has('gagal'))
            <div class="alert alert-danger solid alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                class="mr-2">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <strong>{{ session('gagal') }}</strong>
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
            </div>
        @endif
        <form action="{{ route('verifikasiEvaluator',3) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <label for="pendidikan">Biodata</label> <br><br>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Nama Lengkap</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->nama_lengkap }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Gelar Sebelum Nama</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->gelar_sebelum_nama }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Gelar Setelah Nama</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->gelar_setelah_nama }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Status</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->status }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Tanggal Lahir</h5>
                                </div>
                                <div class="col-md-auto">
                                    @if ($dataEvaluator->tgl_lahir != NULL)
                                        <h5>{{ date('d F Y', strtotime($dataEvaluator->tgl_lahir)) }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Pekerjaan</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->pekerjaan }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Nama Instansi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->nama_instansi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Nama Instansi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataEvaluator->nama_instansi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-md-auto">
                                    @if ($dataEvaluator->jenis_kelamin == "L")
                                        <h5>Laki-laki</h5>
                                    @else
                                        <h5>Perempuan</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <label for="pendidikan">Pekerjaan</label> <br><br>
                            @foreach ($dataPekerjaan as $data)
                            <div class="row">
                                <div class="col-4">
                                    <h5>{{ $data->instansi }}</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $data->jabatan }}</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $data->jabatan }}</h5>
                                </div>
                                {{-- <form action="{{ route('verifikasiPekerjaan',[$data->id,$data->user_id]) }}" method="POST">
                                    <button type="submit" class="badge badge-success">verifikasi</button>
                                </form> --}}
                                <div class="col-2">
                                    @if (!$data->status)
                                        <h5><a href="{{ route('verifikasiPekerjaan',[$data->id,$data->user_id]) }}" class="badge badge-light">Verifikasi</a></h5>
                                    @else
                                        <h5 class="badge badge-success">Telah diverifikasi</h5>
                                    @endif
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <label for="pendidikan">Sertifikat</label> <br><br>
                            @foreach ($dataSertifikat as $data)
                            <div class="row">
                                <div class="col-4">
                                    <h5>{{ $data->nama_sertifikat }}</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5><a href="/storage/{{ $data->nama_file }}">Lihat</a></h5>
                                </div>
                                
                                <div class="col-2">
                                    
                                    @if (!$data->status)
                                        <h5><a href="{{ route('verifikasiSertifikat',[$data->id,$data->user_id]) }}" class="badge badge-light">Verifikasi</a></h5>
                                    @else
                                        <h5 class="badge badge-success">Telah diverifikasi</h5>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <label for="pendidikan">Pendidikan</label> <br><br>
                            @foreach ($dataPendidikan as $data)
                            <div class="row">
                                <div class="col-4">
                                    <h5>{{ $data->nama_kampus }}</h5>
                                </div>
                                <div class="col-2">
                                    <h5>{{ $data->tahun_lulus }}</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5><a href="/storage/{{ $data->ijazah }}">Lihat</a></h5>
                                </div>
                                <div class="col-2">
                                    @if (!$data->status)
                                        <h5><a href="{{ route('verifikasiPendidikan',[$data->id,$data->user_id]) }}" class="badge badge-light">Verifikasi</a></h5>
                                    @else
                                        <h5 class="badge badge-success">Telah diverifikasi</h5>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-success">Verifikasi</button>
                    <a href="" class="btn btn-danger  btn-sl-sm" type="cancel"><span class="mr-2"></span>Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection