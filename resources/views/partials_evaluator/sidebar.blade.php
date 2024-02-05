 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="" href="{{ route('dashboard') }}" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Beranda</span>
						</a>
                    </li>
                    <li><a class="" href="{{ route('showCapacityBuildingDownload') }}" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Unduh Berkas</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Tugas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('berkasDokumen') }}">Tugas Verifikasi</a></li>
                            <li><a href="{{ route('penugasanSe') }}">Tugas SE</a></li>
                            <li><a href="{{ route('getPenugasanDe') }}">Tugas DE</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="" href="{{ route('penugasanUmpanBalik') }}" aria-expanded="false">
                        <i class="flaticon-381-news"></i>
                        <span class="nav-text">Umpan Balik</span>
                        </a>
                    </li>
                    
                    
                    
				<div class="copyright">
					<p>Copyright © SNI AWARD {{ date("Y"); }}</p>
					
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->