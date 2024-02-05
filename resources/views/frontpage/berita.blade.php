 <!-- Start Berita Area -->
 <section class="blog-area pt-100 pb-70" id="berita">
   <div class="container" style="border-bottom:3px solid #E3B04B;position:relative">

     <div class="section-title">
       <h2>{{ $data->berita }}</h2>
       <div class="bar"></div>
       <p>{{ $data->ket_berita }}</p>
     </div>

     <div class="row">
       @foreach ($dataBerita as $data)
         <div class="col-lg-4 col-md-6">
           <div class="single-blog">
             <div class="image">
               <a href="/berita/{{ $data->slug }}">
                 <img src="/storage/{{ $data->gambar }}" alt="image">
               </a>
             </div>
             <div class="content">
               <ul class="post-meta">
                 <li>
                   <i class="fa fa-calendar"></i>
                   {{ date('d F Y', strtotime($data->rilis)) }}
                 </li>
               </ul>
               <h3>
                 <a href="/berita/{{ $data->slug }}">
                   {{ $data->judul }}
                 </a>
               </h3>
               <p>{{ $data->potongan_berita }}</p>
               <a href="/berita/{{ $data->slug }}" class="read-more">
                 Baca selengkapnya
               </a>
             </div>
           </div>
         </div>
       @endforeach
     </div>
     <a href="{{ route('kumpulanBerita') }}" class="shadow-sm d-flex align-items-center justify-content-center"
       style="position:absolute;bottom:-2.2vh;right:0;border:2px solid #E3B04B;border-radius:50px;padding:5px 15px;background:white;color:#E3B04B;font-weight:550">Lihat
       Semua <i class="lni lni-arrow-right ml-2 mt-1" style="font-size:22px"></i></a>

   </div>

 </section>

 <!-- End Blog Area -->
