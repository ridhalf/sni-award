@extends('layouts.evaluator.master')
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
      @if (session()->has('lengkapi'))
        <div class="alert alert-warning text-white solid alert-dismissible fade show">
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
          <li class="breadcrumb-item active mr-auto"><a href="javascript:void(0)">Verifikasi Dokumen</a></li>
          <li>
            
          </li>
        </ol>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-responsive-lg mb-5 table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th class="pl-5 width200">Nama File</th>
                      <th class="pl-5">Status</th>
                      <th class="text-right">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataDokumen as $item)
                      <tr class="btn-reveal-trigger">
                        <td class="py-3">
                          <a href="#">
                            <div class="media-body">
                              <h5 class="mb-0 fs--1">{{ $loop->iteration }}</h5>
                            </div>
                          </a>
                        </td>
                        <td class="py-2 pl-5"><a href="/storage/{{ $item->nama_file }}">{{ $item->nama_dokumen }}</a></td>
                        <td class="py-2 pl-5">
                          @if ($item->status == 1)
                              <span class="badge badge-success">Telah verifikasi</span>
                          @elseif($item->status == 2)
                              <span class="badge badge-warning">Belum lengkap</span>
                          @else
                              <span class="badge badge-dark">Menunggu</span>
                          @endif
                        </td>
                        <td class="text-right">
                          @if (!$item->status)
                            <a href="{{ route('verifikasiBerkasDokumen', [$item->id, $item->user_id, $item->master_unggah_lampiran_id]) }}" class="badge badge-secondary" type="submit">Verifikasi</a>
                            <a href="{{ route('lengkapiBerkasDokumen', [$item->id, $item->user_id, $item->master_unggah_lampiran_id]) }}" class="badge badge-danger" style="display: inline" type="submit">Belum lengkap</a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{-- @if ($dataFeedback !== null)
                  @if ($dataFeedback->status)
                    <div class="col">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                <h5 class="card-title text-white">Feedback</h5>
                            </div>
                            <div class="card-body mb-0">
                                <p class="card-text">{{ $dataFeedback->deskripsi }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-white">
                                {{ $dataFeedback->created_at }}
                            </div>
                        </div>
                    </div>
                  @else
                    <div class="col">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                <h5 class="card-title text-white">Feedback</h5>
                            </div>
                            <div class="card-body mb-0">
                              <form action="{{ route('feedback') }}" method="POST">
                                @csrf
                                <input type="hidden" name="peserta_id" value="{{ $dataPeserta->user_id }}">
                                <input type="hidden" name="evaluator_id" value="{{ $dataEvaluator->id }}">
                                <textarea class="form-control mt-2 bg-info text-white" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                <button class="btn btn-primary mt-2">Kirim</button>
                              </form>
                            </div>
                        </div>
                    </div>
                  @endif
                @else
                <div class="col">
                    <div class="card text-white bg-info">
                        <div class="card-header">
                            <h5 class="card-title text-white">Feedback</h5>
                        </div>
                        <div class="card-body mb-0">
                          <form action="{{ route('feedback') }}" method="POST">
                            @csrf
                            <input type="hidden" name="peserta_id" value="{{ $dataPeserta->user_id }}">
                            <input type="hidden" name="evaluator_id" value="{{ $dataEvaluator->id }}">
                            <textarea class="form-control mt-2 bg-info text-white" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                            <button class="btn btn-primary mt-2">Kirim</button>
                          </form>
                        </div>
                    </div>
                </div>
              @endif --}}

              @if ($tampilkanFormFeedback)
                  <div class="col">
                        <div class="card text-white bg-dark">
                            <div class="card-header">
                                <h5 class="card-title text-white">Feedback</h5>
                            </div>
                            <div class="card-body mb-0">
                              <form action="{{ route('feedback') }}" method="POST">
                                @csrf
                                <input type="hidden" name="peserta_id" value="{{ $dataPeserta->user_id }}">
                                <input type="hidden" name="evaluator_id" value="{{ $dataEvaluator->id }}">
                                <textarea class="form-control mt-2 bg-light text-black" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                                <button class="btn btn-warning text-white mt-2">Kirim</button>
                              </form>
                            </div>
                        </div>
                    </div>
              @endif
              {{-- @if ($dataFeedback->status)
                    <div class="col">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                <h5 class="card-title text-white">Feedback</h5>
                            </div>
                            <div class="card-body mb-0">
                                <p class="card-text">{{ $dataFeedback->deskripsi }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-white">
                                {{ $dataFeedback->created_at }}
                            </div>
                        </div>
                    </div>
              @else --}}
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
        </div>
      </div>
    </div>
  </div>
@endsection
