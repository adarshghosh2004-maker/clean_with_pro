@extends('web.layout.web-layout')
@section('content')


    <!-- Section 1: Pricing Hero -->
    <section class="pricing-hero section-padding" data-aos="fade">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <h1 class="display-3 fw-extrabold text-primary mb-4">
                        Melbourne's Most <br> Transparent <br> Cleaning Prices <br> — No Hidden Fees
                    </h1>
                    <p class="fs-5 text-muted mb-5">
                        Simple, honest pricing designed for real homes. We believe professional cleanliness shouldn't
                        come with surprises.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="#" class="btn btn-secondary px-4 py-3 rounded-pill fw-bold">Book My Clean</a>
                        <a href="#" class="btn btn-outline-primary px-4 py-3 rounded-pill fw-bold">Get An Instant
                            Price</a>
                    </div>
                    <div class="d-flex flex-wrap gap-4 text-muted small fw-semibold">
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined text-secondary fs-5">verified_user</span>
                            Flat rates
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined text-secondary fs-5">payments</span>
                            Hourly rate
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined text-secondary fs-5">visibility</span>
                            Transparent pricing
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="pricing-hero-img-wrapper position-relative">
                        <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?q=80&w=1000&auto=format&fit=crop"
                            alt="Cleaning Service" class="img-fluid rounded-5 shadow-lg">
                        <div
                            class="abstract-shape bg-secondary-green opacity-20 position-absolute bottom-0 end-0 m-n4 rounded-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: How Pricing Works -->
    <section class="how-pricing-works py-5 bg-white">
        <div class="container text-center">
            <h2 class="display-5 fw-bold text-primary mb-5 position-relative d-inline-block" data-aos="fade-up">
                How Pricing Works
                <span class="title-underline"></span>
            </h2>
            <div class="row g-4 mt-2">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="pricing-model-card p-5 rounded-4 border h-100 text-start transition-all">
                        <div class="pricing-icon-box mb-4 bg-secondary-container text-secondary">
                            <span class="material-symbols-outlined fs-2">schedule</span>
                        </div>
                        <span
                            class="badge bg-secondary-container text-secondary px-3 py-2 rounded-pill mb-3 text-uppercase fw-bold badge-sm">Flexibility
                            & Control</span>
                        <h3 class="fw-bold mb-3">Hourly Rate</h3>
                        <p class="text-muted">Perfect for specific tasks like deep cleaning certain areas or partial
                            service. Pay only for the time we spend cleaning your home.</p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                    <div
                        class="pricing-model-card p-5 rounded-4 border h-100 text-start bg-primary-container text-white transition-all">
                        <div class="pricing-icon-box mb-4 bg-white text-primary">
                            <span class="material-symbols-outlined fs-2">task_alt</span>
                        </div>
                        <span
                            class="badge bg-secondary px-3 py-2 rounded-pill mb-3 text-uppercase fw-bold badge-sm">Best
                            Value, Best Shine</span>
                        <h3 class="fw-bold mb-3">Flat Rate</h3>
                        <p class="opacity-75">A complete home cleaning solution based on your home's size. Consistent,
                            predictable pricing for a recurring pristine home.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Pricing Details -->
    <section class="pricing-details section-padding bg-light">
        <div class="container">
            <!-- Hourly Rate Pricing -->
            <div class="mb-5" data-aos="fade-up">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-4 mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <h2 class="h3 fw-bold text-primary mb-0">Hourly Rate Pricing</h2>
                        <span class="small text-danger d-flex align-items-center gap-1">
                            <span class="material-symbols-outlined fs-6">cancel</span>
                            Not suitable for End of Lease cleans
                        </span>
                    </div>
                    <div class="pricing-tabs d-flex p-1 bg-white rounded-pill border">
                        <button class="btn btn-sm px-4 py-2 rounded-pill fw-bold">One-Off $60/hr</button>
                        <button class="btn btn-sm px-4 py-2 rounded-pill fw-bold">Weekly $55/hr</button>
                        <button class="btn btn-secondary btn-sm px-4 py-2 rounded-pill fw-bold">Fortnightly
                            $55/hr</button>
                        <button class="btn btn-sm px-4 py-2 rounded-pill fw-bold">Monthly $50/hr</button>
                    </div>
                </div>
            </div>

            <!-- Flat Rate Pricing -->
            <div class="mt-5">
                <h2 class="h3 fw-bold text-primary mb-4" data-aos="fade-up">Flat Rate Pricing</h2>
                <div class="row g-4">
                    <!-- 1 Bed -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="flat-rate-card p-4 bg-white rounded-4 border text-center h-100 transition-all">
                            <div class="mb-3">
                                <span class="material-symbols-outlined fs-1 text-secondary">hotel</span>
                            </div>
                            <p class="fw-bold mb-1">1 Bed</p>
                            <h3 class="display-6 fw-extrabold text-primary mb-3">from $119</h3>
                            <a href="#"
                                class="text-secondary fw-bold text-decoration-none small d-flex align-items-center justify-content-center gap-1">View
                                Details <span class="material-symbols-outlined fs-6">chevron_right</span></a>
                        </div>
                    </div>
                    <!-- 2 Beds -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="flat-rate-card p-4 bg-white rounded-4 border text-center h-100 transition-all">
                            <div class="mb-3">
                                <span class="material-symbols-outlined fs-1 text-secondary">hotel</span>
                            </div>
                            <p class="fw-bold mb-1">2 Beds</p>
                            <h3 class="display-6 fw-extrabold text-primary mb-3">from $139</h3>
                            <a href="#"
                                class="text-secondary fw-bold text-decoration-none small d-flex align-items-center justify-content-center gap-1">View
                                Details <span class="material-symbols-outlined fs-6">chevron_right</span></a>
                        </div>
                    </div>
                    <!-- 3 Beds -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div
                            class="flat-rate-card p-4 bg-white rounded-4 border-secondary border-3 text-center h-100 transition-all position-relative overflow-hidden">
                            <div
                                class="most-popular-badge bg-secondary text-white small px-3 py-1 position-absolute top-0 start-50 translate-middle-x fw-bold">
                                MOST POPULAR</div>
                            <div class="mb-3 mt-2">
                                <span class="material-symbols-outlined fs-1 text-secondary">hotel</span>
                            </div>
                            <p class="fw-bold mb-1">3 Beds</p>
                            <h3 class="display-6 fw-extrabold text-primary mb-3">from $181</h3>
                            <a href="#"
                                class="text-secondary fw-bold text-decoration-none small d-flex align-items-center justify-content-center gap-1">View
                                Details <span class="material-symbols-outlined fs-6">chevron_right</span></a>
                        </div>
                    </div>
                    <!-- 4 Beds -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="flat-rate-card p-4 bg-white rounded-4 border text-center h-100 transition-all">
                            <div class="mb-3">
                                <span class="material-symbols-outlined fs-1 text-secondary">hotel</span>
                            </div>
                            <p class="fw-bold mb-1">4 Beds</p>
                            <h3 class="display-6 fw-extrabold text-primary mb-3">from $232</h3>
                            <a href="#"
                                class="text-secondary fw-bold text-decoration-none small d-flex align-items-center justify-content-center gap-1">View
                                Details <span class="material-symbols-outlined fs-6">chevron_right</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Service Comparison -->
    <section class="service-comparison section-padding bg-white" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary">Service Comparison</h2>
            </div>
            <div class="comparison-table-wrapper rounded-4 border overflow-hidden shadow-sm">
                <table class="table table-borderless mb-0">
                    <thead>
                        <tr class="bg-primary-container text-white text-center">
                            <th class="py-4 text-start ps-5">Included Features</th>
                            <th class="py-4">Our Basic</th>
                            <th class="py-4 bg-secondary">Spring Clean <br><span class="small fw-normal">EXTENDED
                                    SERVICE</span></th>
                            <th class="py-4">End of Lease</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td class="py-3 text-start ps-5 border-bottom">Dust and Web Removal</td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom bg-light"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 text-start ps-5 border-bottom">Deep Cleaning</td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom bg-light"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 text-start ps-5 border-bottom">Dust/Wipe Dusting</td>
                            <td class="py-3 border-bottom text-muted opacity-50"><span
                                    class="material-symbols-outlined">cancel</span></td>
                            <td class="py-3 border-bottom bg-light"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 text-start ps-5 border-bottom">Mopping</td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom bg-light"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 text-start ps-5 border-bottom">Clean Inside Furniture</td>
                            <td class="py-3 border-bottom text-muted opacity-50"><span
                                    class="material-symbols-outlined">cancel</span></td>
                            <td class="py-3 border-bottom bg-light"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                            <td class="py-3 border-bottom"><span
                                    class="material-symbols-outlined text-secondary">check_circle</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Section 5: Save More Banner -->
    <section class="save-more-banner py-4 bg-secondary text-white" data-aos="zoom-in">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-4">
                <div class="d-flex align-items-center gap-3">
                    <span class="material-symbols-outlined fs-1">loyalty</span>
                    <div>
                        <h4 class="fw-bold mb-1">Save More with Regular Visits</h4>
                        <p class="mb-0 opacity-75">Enjoy exclusive discounts and the same trusted cleaner every single
                            time.</p>
                    </div>
                </div>
                <button class="btn btn-primary-container text-white px-4 py-2 rounded-pill fw-bold border-0">Claim My
                    Discount</button>
            </div>
        </div>
    </section>

    <!-- Section 6: Trust Badges -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="trust-badge-item">
                        <div class="badge-icon-circle mx-auto mb-3">
                            <span class="material-symbols-outlined fs-2">verified_user</span>
                        </div>
                        <p class="fw-bold mb-0">Police Checked</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="trust-badge-item">
                        <div class="badge-icon-circle mx-auto mb-3">
                            <span class="material-symbols-outlined fs-2">shield</span>
                        </div>
                        <p class="fw-bold mb-0">Fully Insured</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="trust-badge-item">
                        <div class="badge-icon-circle mx-auto mb-3">
                            <span class="material-symbols-outlined fs-2">eco</span>
                        </div>
                        <p class="fw-bold mb-0">Eco-Friendly</p>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="trust-badge-item">
                        <div class="badge-icon-circle mx-auto mb-3">
                            <span class="material-symbols-outlined fs-2">thumb_up</span>
                        </div>
                        <p class="fw-bold mb-0">100% Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Testimonials -->
    <section class="section-padding bg-white" data-aos="fade-up">
        <div class="container text-center">
            <h2 class="display-5 fw-bold text-primary mb-5">Trusted by Melbourne Locals</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="text-muted mb-4 small">"The most professional cleaning service I've used. The flat
                            rate pricing is so much better than worrying about the clock!"</p>
                        <div class="d-flex align-items-center gap-3">
                            <div
                                class="avatar bg-primary-container text-white rounded-circle d-flex align-items-center justify-content-center">
                                S</div>
                            <div>
                                <h6 class="fw-bold mb-0">Sarah</h6>
                                <p class="small text-muted mb-0">Footscray</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="text-muted mb-4 small">"You left my house sparkling. Love the transparency. No hidden
                            fees or extra charges at the end."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div
                                class="avatar bg-secondary-green text-white rounded-circle d-flex align-items-center justify-content-center">
                                J</div>
                            <div>
                                <h6 class="fw-bold mb-0">Jessica</h6>
                                <p class="small text-muted mb-0">Brighton</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                        <div class="stars mb-3 text-secondary">
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                            <span class="material-symbols-outlined fs-6">star</span>
                        </div>
                        <p class="text-muted mb-4 small">"Great value for money. The recurring discount makes it very
                            affordable for a busy household."</p>
                        <div class="d-flex align-items-center gap-3">
                            <div
                                class="avatar bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">
                                M</div>
                            <div>
                                <h6 class="fw-bold mb-0">Michael</h6>
                                <p class="small text-muted mb-0">St Kilda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 8: Ready for a Spotless Home? -->
    <section class="cta-section py-5" data-aos="zoom-in">
        <div class="container">
            <div class="bg-primary-container p-5 rounded-5 text-white text-center shadow-lg">
                <h2 class="display-4 fw-bold mb-3">Ready for a Spotless Home?</h2>
                <p class="fs-5 opacity-75 mb-5 mx-auto max-w-600">Join hundreds of Melbourne families who trust us as
                    their weekly sanctuary. Simple booking, professional results.</p>
                <div class="d-flex justify-content-center flex-wrap gap-3">
                    <a href="#" class="btn btn-secondary px-5 py-3 rounded-pill fw-bold">Get a Free Quote</a>
                    <a href="#" class="btn btn-white bg-white text-primary px-5 py-3 rounded-pill fw-bold">Book My
                        Clean</a>
                </div>
            </div>
        </div>
    </section>

@endsection
