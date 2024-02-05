@extends('layouts.admin.master')
@section('content')
  <div class="content-body">
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
    <div class="container-fluid">
      <div class="page-titles">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Frontpage</a></li>
        </ol>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <div class="compose-content">
                <form method="POST" action="{{ route('frontpage.update', $dataFrontpage->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <input type="hidden" name="oldGambar_judul" value="{{ $dataFrontpage->gambar_judul }}">
                    <input type="hidden" name="oldGambar_unduhberkas" value="{{ $dataFrontpage->gambar_unduhberkas }}">
                    <input type="hidden" name="oldGambar_linimasa" value="{{ $dataFrontpage->gambar_linimasa }}">
                    <input type="hidden" name="oldGambar_kumpulanacara" value="{{ $dataFrontpage->gambar_kumpulanacara }}">
                    <input type="hidden" name="old_Gambar_pertanyaan" value="{{ $dataFrontpage->gambar_pertanyaan }}">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control bg-transparent @error('judul') is-invalid @enderror" name="judul" placeholder=" Judul:"
                      value="{{ $dataFrontpage->judul }}">
                    @error('judul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_judul">Ket Judul</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_judul') is-invalid @enderror" name="ket_judul" placeholder=" Ket judul:"
                      value="{{ $dataFrontpage->ket_judul }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_judul" id="ket_judul" rows="5">{{ $dataFrontpage->ket_judul }}</textarea>
                    @error('ket_judul')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group" id="imagePreview">
                    @if ($dataFrontpage->gambar_judul)
                      <img src="/storage/{{ $dataFrontpage->gambar_judul }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Gambar Banner</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg" class="gambar_judul custom-file-input @error('gambar_judul') is-invalid @enderror" id="gambar_judul " name="gambar_judul"
                        onchange="previewImage()">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('gambar_judul')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tentang_sniaward">Tentang SNI Award</label>
                    <input type="text" class="form-control bg-transparent @error('tentang_sniaward') is-invalid @enderror" name="tentang_sniaward"
                      placeholder="Tentang SNI Award" value="{{ $dataFrontpage->tentang_sniaward }}">
                    @error('tentang_sniaward')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_sniaward">Ket SNI Award</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_sniaward') is-invalid @enderror" name="ket_sniaward"
                      placeholder="Ket SNI Award" value="{{ $dataFrontpage->ket_sniaward }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_sniaward" id="ket_sniaward" rows="5">{{ $dataFrontpage->ket_sniaward }}</textarea>
                    @error('ket_sniaward')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="berita">Berita</label>
                    <input type="text" class="form-control bg-transparent @error('berita') is-invalid @enderror" name="berita" placeholder="Berita"
                      value="{{ $dataFrontpage->berita }}">
                    @error('berita')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_berita">Ket Berita</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_berita') is-invalid @enderror" name="ket_berita" placeholder="ket_berita"
                      value="{{ $dataFrontpage->ket_berita }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_berita" id="ket_berita" rows="5">{{ $dataFrontpage->ket_berita }}</textarea>
                    @error('ket_berita')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="unduhberkas">Unduh Berkas</label>
                    <input type="text" class="form-control bg-transparent @error('unduhberkas') is-invalid @enderror" name="unduhberkas" placeholder="unduhberkas"
                      value="{{ $dataFrontpage->unduhberkas }}">
                    @error('unduhberkas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_unduhberkas">Ket Unduh Berkas</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_unduhberkas') is-invalid @enderror" name="ket_unduhberkas"
                      placeholder="ket_unduhberkas" value="{{ $dataFrontpage->ket_unduhberkas }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_unduhberkas" id="ket_unduhberkas"
                      rows="5">{{ $dataFrontpage->ket_unduhberkas }}</textarea>
                    @error('ket_unduhberkas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    @if ($dataFrontpage->gambar_unduhberkas)
                      <img src="/storage/{{ $dataFrontpage->gambar_unduhberkas }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Gambar Unduh Berkas</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg" class="custom-file-input @error('gambar_unduhberkas') is-invalid @enderror" name="gambar_unduhberkas">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('gambar_unduhberkas')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="linimasa">Linimasa</label>
                    <input type="text" class="form-control bg-transparent @error('linimasa') is-invalid @enderror" name="linimasa" placeholder="linimasa"
                      value="{{ $dataFrontpage->linimasa }}">
                    @error('linimasa')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    @if ($dataFrontpage->gambar_linimasa)
                      <img src="/storage/{{ $dataFrontpage->gambar_linimasa }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Gambar Linimasa</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg" class="custom-file-input @error('gambar_linimasa') is-invalid @enderror" name="gambar_linimasa">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('gambar_linimasa')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kumpulanacara">Kumpulan Acara</label>
                    <input type="text" class="form-control bg-transparent @error('kumpulanacara') is-invalid @enderror" name="kumpulanacara"
                      placeholder="kumpulanacara" value="{{ $dataFrontpage->kumpulanacara }}">
                    @error('kumpulanacara')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    @if ($dataFrontpage->gambar_kumpulanacara)
                      <img src="/storage/{{ $dataFrontpage->gambar_kumpulanacara }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Gambar Kumpulan Acara</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg" class="custom-file-input @error('gamabr_kumpulanacara') is-invalid @enderror" name="gambar_kumpulanacara">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('gamabr_kumpulanacara')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ket_kumpulanacara">Ket Kumpulan Acara</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_kumpulanacara') is-invalid @enderror" name="ket_kumpulanacara"
                      placeholder="ket_kumpulanacara" value="{{ $dataFrontpage->ket_kumpulanacara }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_kumpulanacara" id="ket_kumpulanacara"
                      rows="5">{{ $dataFrontpage->ket_kumpulanacara }}</textarea>
                    @error('ket_kumpulanacara')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="dokumentasi">Dokumentasi</label>
                    <input type="text" class="form-control bg-transparent @error('dokumentasi') is-invalid @enderror" name="dokumentasi"
                      placeholder="dokumentasi" value="{{ $dataFrontpage->dokumentasi }}">
                    @error('dokumentasi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="pertanyaan">FaQ</label>
                    <input type="text" class="form-control bg-transparent @error('pertanyaan') is-invalid @enderror" name="pertanyaan" placeholder="pertanyaan"
                      value="{{ $dataFrontpage->pertanyaan }}">
                    @error('pertanyaan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_pertanyaan">Ket FaQ</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_pertanyaan') is-invalid @enderror" name="ket_pertanyaan"
                      placeholder="ket_pertanyaan" value="{{ $dataFrontpage->ket_pertanyaan }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_pertanyaan" id="ket_pertanyaan"
                      rows="5">{{ $dataFrontpage->ket_pertanyaan }}</textarea>
                    @error('ket_pertanyaan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    @if ($dataFrontpage->gambar_pertanyaan)
                      <img src="/storage/{{ $dataFrontpage->gambar_pertanyaan }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @else
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Gambar FaQ</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept=".jpg, .png, .jpeg" class="custom-file-input @error('gambar_pertanyaan') is-invalid @enderror" name="gambar_pertanyaan">
                      <label class="custom-file-label">Pilih File ...</label>
                      @error('gambar_pertanyaan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kontakkami">Kontak Kami</label>
                    <input type="text" class="form-control bg-transparent @error('kontakkami') is-invalid @enderror" name="kontakkami" placeholder="kontakkami"
                      value="{{ $dataFrontpage->kontakkami }}">
                    @error('kontakkami')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket_kontakkami">Ket Kontak Kami</label>
                    {{-- <input type="text" class="form-control bg-transparent @error('ket_kontakkami') is-invalid @enderror" name="ket_kontakkami"
                      placeholder="ket_kontakkami" value="{{ $dataFrontpage->ket_kontakkami }}"> --}}
                    <textarea class="form-control bg-transparent" name="ket_kontakkami" id="ket_kontakkami"
                      rows="5">{{ $dataFrontpage->ket_kontakkami }}</textarea>
                    @error('ket_kontakkami')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="linkfacebook">Facebook</label>
                    <input type="text" class="form-control bg-transparent @error('linkfacebook') is-invalid @enderror" name="linkfacebook"
                      placeholder="linkfacebook" value="{{ $dataFrontpage->linkfacebook }}">
                    @error('linkfacebook')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="linkinstagram">Instagram</label>
                    <input type="text" class="form-control bg-transparent @error('linkinstagram') is-invalid @enderror" name="linkinstagram"
                      placeholder="linkinstagram" value="{{ $dataFrontpage->linkinstagram }}">
                    @error('linkinstagram')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="linktwitter">Twitter</label>
                    <input type="text" class="form-control bg-transparent @error('linktwitter') is-invalid @enderror" name="linktwitter"
                      placeholder="linktwitter" value="{{ $dataFrontpage->linktwitter }}">
                    @error('linktwitter')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="webbsn">BSN</label>
                    <input type="text" class="form-control bg-transparent @error('webbsn') is-invalid @enderror" name="webbsn" placeholder="webbsn"
                      value="{{ $dataFrontpage->webbsn }}">
                    @error('webbsn')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="text-left mt-4 mb-2">
                    <button class="btn btn-warning text-white btn-sl-sm mr-2" type="submit"><span class="mr-2"></span>Simpan</button>
                    <button class="btn btn-danger btn-sl-sm" type="button"><span class="mr-2"></span>Batal</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    function previewImage(){
        const gambar_judul = document.querySelector('.gambar_judul');
        const imgPreview = document.querySelector('.img-preview'); 
        // console.log(gambar_judul.files[0].name);
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(gambar_judul.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    const image = document.getElementById('gambar_judul');
    const imgPreview = document.getElementById('img-preview'); 
    const pre_image = imgPreview.querySelector('.img-preview')

    image.addEventListener("change", function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();
            imgPreview.style.display = "block ";

            reader.addEventListener("load",function(){
                previewImage.setAttribute("src",this.result)
            });
            reader.readAsDataURL(file)
        }
    });
  </script>
@endsection
