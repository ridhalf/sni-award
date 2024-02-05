@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="card avtivity-card">
            <div class="card-body">
              <div class="media align-items-center">
                <span class="activity-icon bgl-warning mr-md-4 mr-3">
                  <img alt="image" width="40" height="37" src="{{ asset('admin') }}/icons/peserta.svg" alt="">
                </span>
                <div class="media-body">
                  <p class="fs-14 mb-2">Peserta</p>
                  <span class="title font-w600"> {{ $jumlahPeserta }}</span>
                </div>
              </div>
              <div class="progress" style="height:5px;">
                <div class="progress-bar bg-warning" style="width: 42%; height:5px;" role="progressbar">
                  <span class="sr-only"></span>
                </div>
              </div>
            </div>
            <div class="effect bg-warning"></div>
          </div>
        </div>
        
        <div class="col-sm-6">
          <div class="card avtivity-card">
            <div class="card-body">
              <div class="media align-items-center">
                <span class="activity-icon bgl-warning mr-md-4 mr-3">
                  <img alt="image" width="40" height="37" src="{{ asset('admin') }}/icons/evaluator.svg" alt="">
                </span>
                <div class="media-body">
                  <p class="fs-14 mb-2">Evaluator</p>
                  <span class="title font-w600">{{ $jumlahEvaluator }}</span>
                </div>
              </div>
              <div class="progress" style="height:5px;">
                <div class="progress-bar bg-warning" style="width: 42%; height:5px;" role="progressbar">
                  <span class="sr-only"></span>
                </div>
              </div>
            </div>
            <div class="effect bg-warning"></div>
          </div>
        </div>
      </div>

      <div class="page-titles ">
        <ol class="breadcrumb d-flex justify-content-between align-items-center">
          <li class="breadcrumb-item active mr-auto align-items-center"><a href="javascript:void(0)">Daftar Acara Yang Akan Datang</a></li>
          <li>
            
          </li>
        </ol>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th width="70px" class="pl-5 text center">Judul</th>
                      <th class="pl-5 text-center">Tanggal Mulai</th>
                      <th class="pl-5 text-center">Tanggal Selesai</th>
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
  </div>
@endsection
