<!-- Start About Area -->
    <section id="acara" class="about-area pb-100">
        <div class="container">
            

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h3>{{ $data->kumpulanacara }}</h3>
                        <div class="bar "></div>
                        <p>{{ $data->ket_kumpulanacara }}</p>
                        <div class="about-btn">
                            <a href="/semuaacara" class="default-btn">
                                Lihat selengkapnya
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="/storage/{{ $data->gambar_kumpulanacara }}" alt="image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="assets/img/vector_kumpulanacara1.png" alt="image" style="height: 200px">
                    </div>
                </div>
            </div>
        </div>

        <div class="default-shape">
            <div class="shape-1">
                <img src="assets/img/shape/1.png" alt="image">
            </div>

            <div class="shape-2 rotateme">
                <img src="assets/img/shape/2.png" alt="image">
            </div>

            <div class="shape-3">
                <img src="assets/img/shape/3.svg" alt="image">
            </div>

            <div class="shape-4">
                <img src="assets/img/shape/4.svg" alt="image">
            </div>

            <div class="shape-5">
                <img src="assets/img/shape/5.png" alt="image">
            </div>
        </div>
    </section>
    <!-- End About Area -->