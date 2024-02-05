 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a  href="{{ route('dashboard') }}" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Beranda</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-book"></i>
                        <span class="nav-text">Halaman depan</span></a>
                        <ul aria-expanded="false">
                        <li><a href="{{ route('frontpage.edit',1) }}">Edit</a></li>
                        <li><a href="{{ route('faq.index') }}">FaQ</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="{{ route('showDataPeserta') }}" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Peserta</span>
						</a>
                    </li>
                    <li><a class="" href="/admin/evaluator" aria-expanded="false">
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Evaluator</span>
                        </a>
                    </li>
                    <li><a class="" href="/admin/berita" aria-expanded="false">
                        <i class="flaticon-381-news"></i>
                        <span class="nav-text">Berita & Acara</span>
                        </a>
                    </li>
                    <li><a class="" href="{{ route('dokumentasi.index') }}" aria-expanded="false">
                        <i class="flaticon-381-picture"></i>
                        <span class="nav-text">Dokumentasi</span>
                        </a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-view"></i>
                        <span class="nav-text">Dokumen</span></a>
                        <ul aria-expanded="false">
                        <li><a href="{{ route('persyaratan.index') }}">Persyaratan SNI Award</a></li>
                        <li><a href="{{ route('capacitybuilding.index') }}">Materi Capacity Building</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-time"></i>
                        <span class="nav-text">Penjadwalan</span></a>
                        <ul aria-expanded="false">
                        <li><a href="{{ route('penjadwalanacara.index') }}">Penjadwalan Acara</a></li>
                        <li><a href="{{ route('getPesertaPenugasanVerifikasi') }}">Penjadwalan Verifikasi Dokumen</a></li>
                        <li><a href="{{ route('penugasanse.index') }}">Penjadwalan Se</a></li>
                        <li><a href="{{ route('penugasande.index') }}">Penjadwalan De</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-settings"></i>
                        <span class="nav-text">Data Master</span></a>
                        <ul aria-expanded="false">
                        <li><a href="{{ route('masterpertanyaan.index') }}">Master Pertanyaan</a></li>
                        {{-- <li><a href="{{ route('masterdokumen.index') }}">Master Dokumen</a></li> --}}
                        </ul>
                    </li>
				<div class="copyright">
					<p>Copyright © SNI AWARD {{ date("Y"); }}</p>
					
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->