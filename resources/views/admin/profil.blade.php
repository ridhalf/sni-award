@extends('layouts.admin.master')
@php
$user = auth()->user();
@endphp
<style>
  .col-data {
    padding-left: 48px;
  }

</style>
@section('content')
  <div class="content-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="profile card card-body p-3" style="height: auto">
            <div class="profile-head">
              <div class="profile-info">
                <div class="profile-photo mt-0">
                  <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="profile-details">
                  <div class="profile-name px-3 pt-2">
                    <h4 class="text-primary mb-0">{{ $user->email }}</h4>
                    <h4 class="text-muted mb-0">{{ $user->peran }}</h4>
                  </div>
                  <div class="dropdown ml-auto">
                    <button type="button" data-toggle="modal" data-target="#edit-profile-modal" onclick="showModal()" class="btn btn-sm btn-warning text-white mr-2">Edit
                      Profile</button>
                    {{-- <button class="btn btn-sm btn-info">Pdf</button> --}}
                  </div>
                </div>
              </div>
              <div style="padding: 15px 20px">
                <table>
                  <tr>
                    <td>Gender</td>
                    <td class="col-data">: Pria</td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td class="col-data">: 30 Maret 2024</td>
                  </tr>
                  <tr>
                    <td>Pekerjaan</td>
                    <td class="col-data">: Manager IT</td>
                  </tr>
                  <tr>
                    <td>Nama Instansi</td>
                    <td class="col-data">: BSN</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td class="col-data">: Jl. Aja Dulu 60, Jakarta</td>
                  </tr>
                  <tr>
                    <td>No. Telepon</td>
                    <td class="col-data">: 08211111111</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="edit-profile-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profil</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="comment-form" action="{{ route('adminProfilUpdate', $user->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Nama Lengkap <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="nama_lengkap">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Gelar Sebelum Nama <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="gelar_sebelum_nama">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Gelar Setelah Nama <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="gelar_setelah_nama">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Tanggal Lahir <span class="required text-danger">*</span></label>
                  <input type="data" class="form-control" value="" name="tgl_lahir">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Pekerjaan <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="pekerjaan">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Nama Instansi <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="nama_instansi">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Alamat <span class="required text-danger"></label>
                  <textarea rows="8" class="form-control" name="alamat" required></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Kota <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="kota">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Provinsi <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="provinsi">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="text-black font-w600">Telepon <span class="required text-danger">*</span></label>
                  <input type="text" class="form-control" value="" name="nomor_telepon">
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
@endsection
