<!-- Start Fun Facts Area -->
    {{-- Menu informasi  --}}
    <section id="about" class="fun-facts-area pt-100 pb-70">
        <div class="container">
            <div class="row d-flex justify-content-center ">
                <div class="col-lg-3 col-sm-6">
                    <a href="/seputarsni">
                        <div class="single-fun-fact">
                        <div class="icon">
                            <img src="assets/img/icon/award.png" alt="lamp" style="height: 150px">
                        </div>
                        <h3>
                            {{-- <span class="odometer" data-count="345">00</span> --}}
                        </h3>
                        <p>Seputar SNI Award</p>
                    </div>
                    </a>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-fun-fact">
                        <div class="icon">
                            <img src="assets/img/icon/businessman.png" alt="lamp" style="height: 150px">
                        </div>
                        <h3>
                            {{-- <span class="odometer" data-count="10">00</span> --}}
                        </h3>
                        <p>Dewan Juri</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-fun-fact">
                        <div class="icon">
                            <img src="assets/img/icon/medal.png" alt="lamp" style="height: 150px">
                        </div>
                        <h3>
                            {{-- <span class="odometer" data-count="1234">00</span> --}}
                        </h3>
                        <p>Peraih SNI Award</p>
                    </div>
                </div>
               
                <div class="section-title mt-5">
                    <h2>{{ $data->tentang_sniaward }}</h2>
                    <div class="bar"></div>
                    <p>{{ $data->ket_sniaward }}</p>
                </div>
            </div>
        </div>
    </section>
    {{-- Menu informasi  --}}
    <!-- End Fun Facts Area -->