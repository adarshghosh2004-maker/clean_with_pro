@extends('web.layout.web-layout')
@section('content')
    <!-- Section 1: Services Hero -->
    <section class="services-hero" data-aos="fade">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'service')
                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="services-hero-img">
            @endif

        @endforeach
        <div class="container text-center">
            <h1 class="display-3 fw-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Professional Cleaning <br> Services Across Melbourne
            </h1>
            <div class="d-flex justify-content-center gap-3 mt-4" data-aos="fade-up" data-aos-delay="200">
                <a href="#EditModel" data-bs-toggle="modal" class="btn btn-secondary px-4 py-3">Book Now</a>
                <a href="{{ route('gallery') }}" class="btn btn-outline-white px-4 py-3">View Our Work</a>
            </div>
        </div>
    </section>

    <!-- Section 2: Service Categories Icons -->
    <section class="service-categories-bar py-5 bg-white shadow-sm mb-4" data-aos="fade-up">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-rug fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">CARPET</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="150">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-couch fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">SOFA</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-mattress-pillow fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">MATTRESS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-rug fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">RUGS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-kitchen-set fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">COMMERCIAL</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="350">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-file-lines fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">CURTAINS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="350">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-lines-leaning fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">TILE</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="450">
                    <div class="category-icon-circle">
                        <i class="fa-solid fa-hand-sparkles fa-xl"></i>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">HYGIENE</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="featured-service">
            <div class="featured-card">
                <div class="featured-img"><img src="assets/imgs/CWPss.PNG" alt=""></div>
                <div class="featured-info">
                    <span class="tag-popular">MOST POPULAR</span>
                    <h2>{{ $services[0]['title'] }}</h2>
                    <p>{{ $services[0]['description'] }}</p>
                    <a href="{{ route('services_detail', $services[0]['id']) }}" class="view-details">
                        <i class="fa-solid fa-file-invoice"></i> VIEW DETAILS <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-header anim-trigger">
            <div class="section-title-wrapper">
                <h1 class="section-title">Services</h1>
            </div>
            <div class="slider-controls">
                <button class="btn-nav" onclick="scrollSlider('gallerySlider', -1)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="btn-nav" onclick="scrollSlider('gallerySlider', 1)">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
        <div class="gallery-grid" id="gallerySlider">
            <!-- Card 1 -->
            @foreach ($services as $key => $value)
                <div class="service-card anim-trigger anim-stagger-{{ ($key % 6) + 1 }}">
                    <div class="card-img" style="background-image: url('{{ $value['banner_img'] }}')">
                    </div>
                    <div class="card-body">
                        <div class="card-header">
                            <h3>{{ $value['title'] }}</h3>
                        </div>
                        <p>{{ $value['description'] }}</p>
                        <a href="{{ route('services_detail', $value['id']) }}" class="view-details">VIEW DETAILS <i
                                class="fa-solid fa-chevron-right"></i></a>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Section 5: Specialist Solutions Grid -->
    <section class="section-padding bg-light" data-aos="fade-up">
        <div class="container text-center">
            <h2 class="display-5 fw-bold text-primary mb-3" data-aos="fade-up">Specialist Solutions</h2>
            <p class="text-muted mx-auto mb-5" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="100">Every
                corner of your home deserves a fresh start. Explore our specialized maintenance services.</p>

            <div class="row g-4 text-start">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
                        <div class="solution-icon mb-4">
                            <span class="material-symbols-outlined fs-1 text-secondary">grid_view</span>
                        </div>
                        <h4 class="fw-bold mb-3">Tile & Grout</h4>
                        <p class="small text-muted mb-4">Deep pressure extraction to lift stains from between tiles and
                            restore natural shine.</p>
                        <a href="#"
                            class="text-secondary fw-bold text-decoration-none small d-flex align-items-center gap-2">Learn
                            More <span class="material-symbols-outlined fs-6">arrow_forward</span></a>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
                        <div class="solution-icon mb-4">
                            <span class="material-symbols-outlined fs-1 text-secondary">workspace_premium</span>
                        </div>
                        <h4 class="fw-bold mb-3">Leather Care</h4>
                        <p class="small text-muted mb-4">Specialized moisturizing and PH-balanced treatment to prevent
                            cracking and restore suppleness.</p>
                        <a href="#"
                            class="text-secondary fw-bold text-decoration-none small d-flex align-items-center gap-2">Learn
                            More <span class="material-symbols-outlined fs-6">arrow_forward</span></a>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
                        <div class="solution-icon mb-4">
                            <span class="material-symbols-outlined fs-1 text-secondary">wash</span>
                        </div>
                        <h4 class="fw-bold mb-3">Oriental Rugs</h4>
                        <p class="small text-muted mb-4">Delicate immersion and hand-wash procedures for your antique
                            fibers and tribal rugs.</p>
                        <a href="#"
                            class="text-secondary fw-bold text-decoration-none small d-flex align-items-center gap-2">Learn
                            More <span class="material-symbols-outlined fs-6">arrow_forward</span></a>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
                        <div class="solution-icon mb-4">
                            <span class="material-symbols-outlined fs-1 text-secondary">medical_services</span>
                        </div>
                        <h4 class="fw-bold mb-3">Disinfection</h4>
                        <p class="small text-muted mb-4">Hospital-grade fogging for surfaces and fabrics. To eliminate
                            viral and bacterial pathogens.</p>
                        <a href="#"
                            class="text-secondary fw-bold text-decoration-none small d-flex align-items-center gap-2">Learn
                            More <span class="material-symbols-outlined fs-6">arrow_forward</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: How We Restore Your Home -->
    <section class="section-padding">
        <div class="container text-center">
            <h2 class="display-5 fw-bold text-primary mb-5" data-aos="fade-up">How We Restore Your Home</h2>
            <div class="row g-4 mt-4 position-relative">
                <div class="process-line d-none d-lg-block"></div>
                <div class="col" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-item">
                        <div class="step-number-circle mx-auto mb-3">1</div>
                        <h5 class="fw-bold mb-2">Inspection</h5>
                        <p class="small text-muted">We identify fabric types and spot specific stains.</p>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-item">
                        <div class="step-number-circle mx-auto mb-3">2</div>
                        <h5 class="fw-bold mb-2">Pre-Treatment</h5>
                        <p class="small text-muted">Application of professional solutions to loosen deep dirt.</p>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-item">
                        <div class="step-number-circle mx-auto mb-3">3</div>
                        <h5 class="fw-bold mb-2">Extraction</h5>
                        <p class="small text-muted">High-pressure, low-moisture extraction for deep cleaning.</p>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-item">
                        <div class="step-number-circle mx-auto mb-3">4</div>
                        <h5 class="fw-bold mb-2">Sanitization</h5>
                        <p class="small text-muted">Eliminating allergens and bacteria for a healthy home.</p>
                    </div>
                </div>
                <div class="col" data-aos="fade-up" data-aos-delay="500">
                    <div class="step-item">
                        <div class="step-number-circle mx-auto mb-3">5</div>
                        <h5 class="fw-bold mb-2">Final Review</h5>
                        <p class="small text-muted">A walkthrough to ensure 100% satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 8: Features Row -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-box mb-3">
                        <span class="material-symbols-outlined fs-1 text-secondary">verified_user</span>
                    </div>
                    <h5 class="fw-bold mb-1">Fully Insured</h5>
                    <p class="small opacity-75 mb-0">Complete protection for all residential and commercial jobs.</p>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-box mb-3">
                        <span class="material-symbols-outlined fs-1 text-secondary">eco</span>
                    </div>
                    <h5 class="fw-bold mb-1">Eco-Friendly</h5>
                    <p class="small opacity-75 mb-0">Non-toxic, bio-degradable solutions safe for children and pets.</p>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-box mb-3">
                        <span class="material-symbols-outlined fs-1 text-secondary">event_available</span>
                    </div>
                    <h5 class="fw-bold mb-1">Same-Day</h5>
                    <p class="small opacity-75 mb-0">Urgent cleaning services available 7 days a week in Melbourne.</p>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-box mb-3">
                        <span class="material-symbols-outlined fs-1 text-secondary">thumb_up</span>
                    </div>
                    <h5 class="fw-bold mb-1">Guarantee</h5>
                    <p class="small opacity-75 mb-0">If you're not happy, we re-clean for free. Professional excellence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 9: Success Stories -->
    <section class="section-padding" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">Clean With Professionals Success Stories</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card p-4 rounded-4 shadow-sm border h-100 transition-all hover-translate-y">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="fst-italic text-muted mb-4">"The steam cleaning they did on my 10-year-old sofa was
                            unbelievable. It looks like it just came out of the showroom. Highly recommended for
                            Melbourne residents."</p>
                        <h6 class="fw-bold mb-0 text-primary">— Sarah J., Brighton</h6>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="testimonial-card p-4 rounded-4 shadow-sm border h-100 bg-light transition-all hover-translate-y">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="fst-italic text-muted mb-4">"Called them for an emergency water damage cleanup. They
                            were there within an hour and saved my expensive wool rugs. Lifesavers!"</p>
                        <h6 class="fw-bold mb-0 text-primary">— Michael T., Southbank</h6>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card p-4 rounded-4 shadow-sm border h-100 transition-all hover-translate-y">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="fst-italic text-muted mb-4">"Their commercial service is the best we've used for our
                            office. They are punctual, professional, and the carpets look pristine every morning."</p>
                        <h6 class="fw-bold mb-0 text-primary">— David R., Collins St.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 10: Ready to Book? -->
    <section class="section-padding bg-primary text-white text-center position-relative overflow-hidden" data-aos="zoom-in">
        <div class="container position-relative z-2">
            <h2 class="display-4 fw-bold mb-3">Ready to Book?</h2>
            <p class="fs-5 opacity-75 mb-5 mx-auto" style="max-width: 600px;">Restore the life and health of your space
                today with Melbourne's fabric specialists.</p>
            <div class="d-flex justify-content-center gap-3">
                <a class="btn btn-secondary px-5 py-3 rounded-3 fw-bold shadow" href="#EditModel" data-bs-toggle="modal">Get
                    A Free Quote</a>
                <a class="btn btn-outline-white px-5 py-3 rounded-3 fw-bold" href="tel:+61468460145">Call +61 468 460
                    145</a>
            </div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle opacity-10 z-1"
            style="font-size: 20rem; pointer-events: none;">
            <span class="material-symbols-outlined">cleaning_services</span>
        </div>
    </section>

@endsection

@section('pagescript')

    <script>
        function scrollSlider(sliderId, direction) {
            const slider = document.getElementById(sliderId);
            const card = slider.querySelector('.service-card');
            const scrollAmount = card.offsetWidth + parseInt(window.getComputedStyle(slider).gap);

            slider.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>

@endsection