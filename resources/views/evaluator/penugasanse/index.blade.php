@extends('layouts.evaluator.master')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg mb-0 table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="pl-5 widt300">Nama Organisasi</th>
                                <th class="pl-5 text-right">Mulai</th>
                                <th class="pl-5 text-right">Hingga</th>
                                <th class="pl-5 text-center">Status</th>
                                <th class="pl-5 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="customers">
                            @foreach ($penugasanSe as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="py-3">
                                    <div class="media-body">
                                    <h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
                                    </div>
                                </td>
                                <td class="py-2 pl-5 wspace-no">{{ $item->nama_organisasi }}</td>
                                <td class="py-2 pl-5 wspace-no text-right">{{ date('d F Y', strtotime($item->mulai)) }}</td>
                                <td class="py-2 pl-5 wspace-no text-right">{{ date('d F Y', strtotime($item->hingga)) }}</td>
                                <td class="py-2 pl-5 wspace-no text-right">
                                    @if ($item->status == 0)
                                        <div class="badge badge-warning text-black"><span>Tertunda</span></div>
                                    @elseif($item->status == 1)
                                        <div class="badge badge-info text-white"><span>Verifikasi</span></div>
                                    @else
                                        <div class="badge badge-success text-white"><span>Selesai</span></div>
                                    @endif
                                </td>
                                <td class="py-2 pl-5 wspace-no text-right">
                                    @if ($item->status == 0)
                                        <a class="badge badge-secondary text-white" href="{{ route('verifikasiPenugasanSe', $item->id) }}">Verifikasi</a>
                                    @endif
                                    @if ($item->status == 1)
                                        <button type="button" data-toggle="modal" data-target="#form-upload-file" data-id="{{ $item->id }}"
                                            class="badge btn-form-upload badge-danger text-white">Unggah File
                                        </button>
                                    @endif
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
{{-- Modal Tambah SNI --}}
    <div class="modal fade" id="form-upload-file">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unggah File Penilaian SE</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="comment-form" action="{{ route('uploadFilePenugasanSe') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id" id="upload-id">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept=".pdf" class="custom-file-input @error('file_penilaian') is-invalid @enderror" name="file_penilaian">
                                <label class="custom-file-label">Pilih File ...</label>
                                @error('file_penilaian')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="submit btn btn-sm btn-warning text-white" name="submit">Simpan</button>
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- Modal Tambah SNI --}}
@endsection
@push('scripts')
<script>
    $(document).on("click", ".btn-form-upload", function() {
    var id = $(this).data('id');

    console.log(id);

    if (id != null) {
        $(".modal-body #upload-id").val(id);
    }
    });
</script>
@endpush
