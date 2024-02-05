<!-- Start Faq Area -->
    <section id="faq" class="faq-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>{{ $data->pertanyaan }}</h2>
                <div class="bar"></div>
                <p>{{ $data->ket_pertanyaan }}</p>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-accordion-content">
                        <ul class="accordion">
                            @foreach ($dataFaq as $item)
                                <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)">
                                    <i class="fa fa-chevron-down"></i>
                                    {{ $item->pertanyaan }}
                                </a>
    
                                <p class="accordion-content show">{{ $item->jawaban }}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-image">
                        <img src="/storage/{{ $data->gambar_pertanyaan }}" alt="image">
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
    <!-- End Faq Area -->