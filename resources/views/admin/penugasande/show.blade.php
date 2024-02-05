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
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <label for="pendidikan">Biodata</label> <br><br>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Nama Organisasi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->nama_organisasi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Kategori</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->nama_kategori }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Alamat Organisasi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->alamat_organisasi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Alamat Pabrik</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->alamat_pabrik }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Email Perusahaan</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->email_perusahaan }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>No Telepon</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->nomor_telepon }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>website</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->website }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Tahun Berdiri</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ date('d F Y', strtotime($dataPeserta->tahun_berdiri)) }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Status Kepemilikan</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->status_kepemilikan }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Tipe Produk</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->tipe_produk }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Kekayaan Organisasi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->kekayaan_organisasi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Hasil Penjualan Organisasi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->hasil_penjualan_organisasi }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Tipe Organisasi</h5>
                                </div>
                                <div class="col-md-auto">
                                    <h5>{{ $dataPeserta->tipe_organisasi }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-12">
            <div class="card card-body">
                <div style="justify-content: space-between; display: flex">
                <h3>Evaluator yang ditugaskan</h3>
                <button type="button" data-toggle="modal" data-target="#form-tugas-de" data-peserta-id="{{ $dataPeserta->user_id }}" class="btn btn-form-de btn-sm btn-warning text-white mr-2" @if ($countPenugasan == 2) hidden @endif>
                    Tambah
                </button>
                </div>
                <hr>
                @if ($dataPenugasanDe != null)
                    @foreach ($dataPenugasanDe as $item)
                        <div class="row mt-2">
                            <div class="col-8 my-4">
                                <div>
                                    <h4>
                                    <b>{{ $item->nama_lengkap}}</b>
                                    </h4>
                                    <div class="row">
                                        <div class="col-2">
                                            <h6><span>Mulai</span></h6>
                                        </div>
                                        <div class="col">
                                            <h6>: {{  date('d F Y', strtotime($item->mulai))  }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <h6><span>Hingga</span></h6>
                                        </div>
                                        <div class="col">
                                            <h6>: {{  date('d F Y', strtotime($item->hingga))  }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-auto">
                                        @if ($item->status)
                                            <div class="badge badge-success">Selesai</div>
                                        @else
                                            <div class="badge badge-warning">Tertunda</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col- col-md-4 align-self-center">
                                <button type="button" data-toggle="modal" data-target="#form-tugas-de" data-id="{{ $item->id }}"
                                    data-evaluator-id="{{ $item->evaluator_id }}" data-peserta-id="{{ $item->peserta_id }}" data-tanggal-mulai="{{ $item->mulai }}" data-tanggal-hingga="{{ $item->hingga }}" 
                                    class="btn btn-form-de btn-sm btn-warning text-white float-right mr-2">Edit
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
        
    </div>
</div>

{{--Modal Tambah Evaluator untuk tugas --}}
    <div class="modal fade" id="form-tugas-de">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Simpan Evaluator</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <form class="comment-form" action="{{ route('penugasande.store') }}" method="POST">
            @csrf
            <input type="hidden" name="peserta_id" id="peserta_id">
            <input type="hidden" name="id" id="de_id">
            <div class="row">
                <div class="col-lg-12">
                <div class="form-group">
                    <label class="text-black font-w600">Evaluator <span class="required text-danger">*</span></label>
                    <select name="evaluator_id" id="evaluator" required>
                        <option value="">Pilih...</option>
                        @foreach ($dataEvaluator as $evaluator)
                            @if (old('evaluator_id'))
                                <option value="{{ $evaluator->user_id }}" selected>{{ $evaluator->nama_lengkap }}</option>
                            @else
                                <option value="{{ $evaluator->user_id }}">{{ $evaluator->nama_lengkap }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="row mb-4">
                <div class="col-6">
                        <label for="mulai">Mulai</label>
                        <input class="form-control" type="date" name="mulai" id="mulai">
                    </div>
                    <div class="col-6">
                        <label for="hingga">Hingga</label>
                        <input class="form-control" type="date" name="hingga" id="hingga">
                    </div>
                </div>
                </div>
                <div class="col-lg-12">
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="submit btn btn-sm btn-warning text-white" name="submit">Simpan</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                    
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    {{--Modal Tambah Evaluator untuk tugas --}}
@endsection
@push('scripts')
<script>
    $(document).on("click", ".btn-form-de", function() {
    var id = $(this).data('id');
    var peserta_id = $(this).data('peserta-id');
    $(".modal-body #peserta_id").val(peserta_id);
    console.log(id);

    if (id != null) {
        var evaluator_id = $(this).data('evaluator-id');
        var mulai = $(this).data('tanggal-mulai');
        var hingga = $(this).data('tanggal-hingga');
        console.log()
        $(".modal-body #de_id").val(id);
        $(".modal-body #evaluator").val(evaluator_id);
        $(".modal-body #mulai").val(mulai);
        $(".modal-body #hingga").val(hingga);
    }
    });
</script>
@endpush