@extends('layouts.evaluator.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      @if (session()->has('sukses'))
				<div class="alert alert-success solid alert-dismissible fade show">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
					<strong>{{ session('sukses') }}</strong>
					<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
					</button>
				</div>
				@endif
      <div class="page-titles ">
        <ol class="breadcrumb d-flex justify-content-between align-items-center">
          <li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Daftar Peserta</a></li>
          <li>
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
                      <th class="pl-5 width200">Nama Peserta</th>
                      <th class="pl-5 text-right" >Status</th>
                      <th class="pl-5 text-right">Aksi</th>
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
                                <td class="py-2 pl-5 wspace-no text-right">
                                    @if ($item->umpan_balik == NULL)
                                        <div class="badge badge-warning text-black"><span>Tertunda</span></div>
                                    @elseif($item->umpan_balik)
                                        <div class="badge badge-success text-white"><span>Selesai</span></div>
                                    @endif
                                </td>
                                <td class="py-2 pl-5 wspace-no text-right">
                                    @if ($item->umpan_balik == NULL)
                                        <button type="button" data-toggle="modal" data-target="#form-upload-file" data-id="{{ $item->peserta_id }}"
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
  </div>
  {{-- Modal Tambah SNI --}}
  <div class="modal fade" id="form-upload-file">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Umpan balik</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="comment-form" action="{{ route('uploadFileUmpanBalik') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="hidden" name="id" id="upload-id">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" accept=".pdf" class="custom-file-input @error('umpan_balik') is-invalid @enderror" name="umpan_balik">
                                <label class="custom-file-label">Pilih File ...</label>
                                @error('umpan_balik')
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