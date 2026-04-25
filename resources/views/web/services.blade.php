@extends('web.layout.web-layout')
@section('content')
    <!-- Section 1: Services Hero -->
    <section class="services-hero" data-aos="fade">
        <div class="container text-center">
            <h1 class="display-3 fw-extrabold text-white mb-4" data-aos="fade-up" data-aos-delay="100">
                Professional Cleaning <br> Services Across Melbourne
            </h1>
            <div class="d-flex justify-content-center gap-3 mt-4" data-aos="fade-up" data-aos-delay="200">
                <button class="btn btn-secondary px-4 py-3">Book Now</button>
                <button class="btn btn-outline-white px-4 py-3">View Our Work</button>
            </div>
        </div>
    </section>

    <!-- Section 2: Service Categories Icons -->
    <section class="service-categories-bar py-5 bg-white shadow-sm" data-aos="fade-up">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-4">
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">cleaning_services</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">CARPET</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="150">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">chair</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">SOFA</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">bed</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">MATTRESS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">layers</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">RUGS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="300">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">kitchen</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">COMMERCIAL</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="350">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">curtains</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">CURTAINS</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="400">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">tile_lamp</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">TILE</p>
                </div>
                <div class="category-item text-center" data-aos="zoom-in" data-aos-delay="450">
                    <div class="category-icon-circle">
                        <span class="material-symbols-outlined">sanitizer</span>
                    </div>
                    <p class="small fw-bold mt-2 mb-0">HYGIENE</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Detailed Service 1 (Carpet) -->
    <section class="section-padding bg-light overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="service-img-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3LJXMaW9ElZjrWPcZmEvz8tPmpL-AacytQhXOiUQ1gJ80WikZrNKoHMqFACU026cUcL0t9kfiQXw40E4Qq5G7l1NxNrT7dQNkFUJQQRbVeBOCL4FNwxojELaDAEwxnBekAzF8LkK7-KFFx6IbudaLxlvLe9GnIIAQBbjf9-r_UQrpE46qtq6WeGSWz8tev-oy0IQdcHjZFKDbdLC3vGmYEWG1QxEv_KgHOM1UCpzxrgwj93fAu_41C1NsWFEp2Ywc-YB-G1A-scE"
                            alt="Carpet Cleaning" class="img-fluid rounded-4 shadow object-fit-cover"
                            style="height: 400px; width: 100%;">
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                    <p class="text-secondary fw-bold text-uppercase mb-2">Premium Care</p>
                    <h2 class="display-5 fw-bold text-primary mb-4">Master Steam Carpet Cleaning</h2>
                    <p class="text-muted mb-4 fs-5">Our clinical-grade steam extraction penetrates deep into the pile,
                        removing pollen, germs, tough stains, and bacteria for a standard surpassing vacuum suction.</p>
                    <ul class="list-unstyled mb-5">
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Deep fiber refreshment & sanitize</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Eco-friendly, child & pet safe tech</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Advanced stain removal technology</span>
                        </li>
                    </ul>
                    <div
                        class="d-flex align-items-center justify-content-between p-4 bg-white rounded-4 shadow-sm border-start border-4 border-secondary">
                        <div>
                            <p class="small text-muted mb-0">Starting from</p>
                            <h3 class="fw-bold mb-0 text-primary">$99.00</h3>
                        </div>
                        <button class="btn btn-primary-blue px-4 py-2 rounded-3 fw-bold">Book Service</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Detailed Service 2 (Sofa) -->
    <section class="section-padding overflow-hidden">
        <div class="container">
            <div class="row align-items-center g-5 flex-row-reverse">
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="service-img-wrapper">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgt9du2xanHw4skZCQ-CLjbqILeegOxGFKHeHA4uf19AfdiB1NvUze-bw1Z4DeXQbg7Wwyt8Uwwd6m3l2stAlf6Huayhgwv5ywYzIREfbvB1UMxDvbzikPi7LCa5kLTbITbUM4QR7vunRJq-SdS414vEP6TMK9qvTOO-QQ0mZVbx07cotIchYJoJ1RTjUcHO2fUzO55TT-ekHAii3D28g8Jcto5TSbVUrC451eK6EEKbxgO82VLOCaUundEzaY8Q6YafSaCuZIyXc"
                            alt="Sofa Cleaning" class="img-fluid rounded-4 shadow object-fit-cover"
                            style="height: 400px; width: 100%;">
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-5" data-aos="fade-right">
                    <p class="text-secondary fw-bold text-uppercase mb-2">Upholstery Specialist</p>
                    <h2 class="display-5 fw-bold text-primary mb-4">Expert Sofa & Couch Restoration</h2>
                    <p class="text-muted mb-4 fs-5">Whether it’s delicate velvet or durable linen, our tailored cleaning
                        methods restore the texture and color of your favorite furniture.</p>
                    <ul class="list-unstyled mb-5">
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Fabric-specific treatment plans</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Deodorizing and sanitizing included</span>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <span class="material-symbols-outlined text-secondary me-3">check_circle</span>
                            <span>Removes oils, skin cells, and allergens</span>
                        </li>
                    </ul>
                    <div
                        class="d-flex align-items-center justify-content-between p-4 bg-white rounded-4 shadow-sm border">
                        <div>
                            <p class="small text-muted mb-0">Starting from</p>
                            <h3 class="fw-bold mb-0 text-primary">$149.00</h3>
                        </div>
                        <button class="btn btn-primary-blue px-4 py-2 rounded-3 fw-bold shadow-sm">Book Service</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Specialist Solutions Grid -->
    <section class="section-padding bg-light">
        <div class="container text-center">
            <h2 class="display-5 fw-bold text-primary mb-3" data-aos="fade-up">Specialist Solutions</h2>
            <p class="text-muted mx-auto mb-5" style="max-width: 600px;" data-aos="fade-up" data-aos-delay="100">Every
                corner of your home deserves a fresh start. Explore our specialized maintenance services.</p>

            <div class="row g-4 text-start">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
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
                    <div
                        class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
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
                    <div
                        class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
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
                    <div
                        class="solution-card h-100 p-4 bg-white rounded-4 shadow-sm border-top border-4 border-secondary">
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

    <!-- Section 7: Transparent Pricing -->
    <section class="section-padding bg-light" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">Transparent Pricing</h2>
            </div>
            <div class="pricing-table-wrapper bg-white rounded-4 overflow-hidden shadow-sm border">
                <table class="table table-hover mb-0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="py-4 ps-4 fw-bold">SERVICE TYPE</th>
                            <th class="py-4 fw-bold">STARTING FROM</th>
                            <th class="py-4 fw-bold">EST. TIME</th>
                            <th class="py-4 pe-4 text-end fw-bold">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 ps-4 fw-bold">Steam Carpet Cleaning (3 Rooms)</td>
                            <td class="py-4">$99.00</td>
                            <td class="py-4">45 - 60 mins</td>
                            <td class="py-4 pe-4 text-end"><button
                                    class="btn btn-secondary btn-sm rounded-pill px-3 fw-bold">Book</button></td>
                        </tr>
                        <tr>
                            <td class="py-4 ps-4 fw-bold">Standard 3-Seater Sofa</td>
                            <td class="py-4">$149.00</td>
                            <td class="py-4">2 - 3 hours</td>
                            <td class="py-4 pe-4 text-end"><button
                                    class="btn btn-secondary btn-sm rounded-pill px-3 fw-bold">Book</button></td>
                        </tr>
                        <tr>
                            <td class="py-4 ps-4 fw-bold">Medical Grade Mattress Sanitize</td>
                            <td class="py-4">$299.00</td>
                            <td class="py-4">Full Day</td>
                            <td class="py-4 pe-4 text-end"><button
                                    class="btn btn-secondary btn-sm rounded-pill px-3 fw-bold">Book</button></td>
                        </tr>
                        <tr>
                            <td class="py-4 ps-4 fw-bold">Mattress (Preservation Specialist)</td>
                            <td class="py-4">$60.00</td>
                            <td class="py-4">45 mins</td>
                            <td class="py-4 pe-4 text-end"><button
                                    class="btn btn-secondary btn-sm rounded-pill px-3 fw-bold">Book</button></td>
                        </tr>
                    </tbody>
                </table>
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
                <h2 class="display-5 fw-bold text-primary mb-3">CleanCare Success Stories</h2>
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
    <section class="section-padding bg-primary text-white text-center position-relative overflow-hidden"
        data-aos="zoom-in">
        <div class="container position-relative z-2">
            <h2 class="display-4 fw-bold mb-3">Ready to Book?</h2>
            <p class="fs-5 opacity-75 mb-5 mx-auto" style="max-width: 600px;">Restore the life and health of your space
                today with Melbourne's fabric specialists.</p>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-secondary px-5 py-3 rounded-3 fw-bold shadow">Get A Free Quote</button>
                <button class="btn btn-outline-white px-5 py-3 rounded-3 fw-bold">Call 1800-CLEAN</button>
            </div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle opacity-10 z-1"
            style="font-size: 20rem; pointer-events: none;">
            <span class="material-symbols-outlined">cleaning_services</span>
        </div>
    </section>

@endsection