@extends('layouts.admin.master')
@section('content')
    <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Berita</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!--Tab slider End-->
                                    <div class="col">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active d-flex justify-content-center" id="first">
                                                <img class="img-fluid" style="max-width: 500px" src="/storage/{{ $berita->gambar }}" alt="">
                                            </div>
                                        </div>
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr konten">
                                                <h1 class="text-center my-5 fs-2 px-4">{{ $berita->judul }}</h1>
                                                {!! $berita->konten !!}
                                            </div>
                                        </div>
                                        <div class=" mt-5 d-flex justify-content-end">
                                            <a class="badge badge-warning text-white" href="{{ route('berita.edit', $berita->id) }}">Edit</a>
                                            <form class="d-inline" action="{{ route('berita.destroy', $berita->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="badge badge-danger" type="submit">Delete</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- review -->
					
                </div>
            </div>
        </div>
@endsection