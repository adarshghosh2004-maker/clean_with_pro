@extends('web.layout.web-layout')

@section('title', 'Professional Cleaning Services Melbourne | Get a Free Quote Today')
@section('description', 'Get Melbourne\'s top-rated professional cleaning services. 100% Bond Back Guarantee, fully insured, police-checked staff, and eco-safe products. Book same-day service now!')
@section('keywords', 'cleaning services melbourne, end of lease cleaning, house cleaners, carpet steam cleaning, booking quote')

@section('content')
    <!-- ==========================================
             HERO SECTION: Split Grid (USP + Instant Form)
             ========================================== -->
    <section class="lp-hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left: Catchy Value Proposition & Bullets -->
                <div class="col-lg-6" data-anim="fade-right">
                    <div class="lp-hero-badge">
                        <i class="bi bi-star-fill text-warning"></i> Melbourne's #1 Rated Cleaners
                    </div>
                    <h1 class="lp-hero-title">
                        Get Your Space <span>Spotless</span> Today
                    </h1>
                    <p class="lp-hero-subtitle">
                        Experience the gold standard in fabric care and property cleaning. Trusted by thousands of Melbourne
                        residents and real estate agents. We handle the dirty work so you don't have to!
                    </p>

                    <div class="lp-hero-bullets">
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-shield-check"></i></span>
                            <span>Fully Insured & Police-Checked Professionals</span>
                        </div>
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-arrow-repeat"></i></span>
                            <span>100% Bond Back Guarantee on End of Lease</span>
                        </div>
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-tree"></i></span>
                            <span>Eco-Friendly, Non-Toxic & Child/Pet Safe Solutions</span>
                        </div>
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-house-check"></i></span>
                            <span>Approved Services by Real Estate Agents</span>
                        </div>
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-clock-history"></i></span>
                            <span>Same-Day Booking & Flexible 7-Day Schedules</span>
                        </div>
                        <div class="lp-bullet-item">
                            <span class="lp-bullet-icon"><i class="bi bi-cash-coin"></i></span>
                            <span>No deposites required for bookings. Pay on Arrival</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <a href="tel:{{ Setting_Data()['contact'] ?? '+61468460145' }}"
                            class="btn btn-secondary btn-lg rounded-pill px-4 py-3 shadow transition-all hover-translate-y">
                            <i class="bi bi-telephone-fill me-2"></i> Call Us:
                            {{ Setting_Data()['contact'] ?? '+61468460145' }}
                        </a>
                    </div>
                </div>

                <!-- Right: High-Converting Embedded Form -->
                <div class="col-lg-6" data-anim="fade-left" id="lp-form-anchor">
                    <div class="lp-hero-form-wrapper">
                        <div class="lp-hero-form-header text-center mb-4">
                            <h3 class="fw-bold">{{ __('label.get_your_free_quote') }}</h3>
                            <p class="text-muted small">No obligation. No hidden charges. Response in minutes.</p>
                        </div>

                        <form id="quote_form_landing" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">{{ __('label.full_name') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control bg-light border-0"
                                        placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">{{ __('label.phone') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" class="form-control bg-light border-0"
                                        placeholder="(555) 123-4567" required>
                                </div>
                                <div class="col-md-6">
                                    <label
                                        class="form-label small fw-semibold text-muted">{{ __('label.email_address') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control bg-light border-0"
                                        placeholder="john@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label
                                        class="form-label small fw-semibold text-muted">{{ __('label.your_address') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="suburb" class="form-control bg-light border-0"
                                        placeholder="e.g. Richmond, VIC" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">{{ __('label.date') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control bg-light border-0"
                                        placeholder="dd/mm/yyyy" required>
                                </div>
                                <div class="col-md-6">
                                    <label
                                        class="form-label small fw-semibold text-muted">{{ __('label.time_optional') }}</label>
                                    <select name="time" class="form-control bg-light border-0">
                                        <option value="">{{ __('label.select_a_time') }}</option>
                                        <option value="07:00">7:00 AM</option>
                                        <option value="07:30">7:30 AM</option>
                                        <option value="08:00">8:00 AM</option>
                                        <option value="08:30">8:30 AM</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="09:30">9:30 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="10:30">10:30 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="11:30">11:30 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="12:30">12:30 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="13:30">1:30 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="14:30">2:30 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="15:30">3:30 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="16:30">4:30 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="17:30">5:30 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                        <option value="18:30">6:30 PM</option>
                                        <option value="19:00">7:00 PM</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-muted">{{ __('label.service') }}<span
                                            class="text-danger">*</span></label>
                                    <select name="service_id" class="form-control bg-light border-0" required>
                                        <option value="">{{ __('label.select_a_service') }}</option>
                                        <option value="0">{{ __('label.special_offers') }}</option>
                                        @foreach ($services as $value)
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label
                                        class="form-label small fw-semibold text-muted">{{ __('label.your_message_optional') }}</label>
                                    <textarea name="msg" class="form-control bg-light border-0" rows="2"
                                        placeholder="{{ __('label.briefly_describe') }}"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="button" onclick="save_quote('quote_form_landing')"
                                        class="btn btn-secondary btn-lg w-100 rounded-3 fw-bold shadow-sm py-3 text-uppercase">
                                        Submit Quote Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
             TRUST SIGNS BAR: Quick Trust Triggers
             ========================================== -->
    <section class="lp-usp-bar" data-anim="fade-up">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="lp-usp-item">
                        <div class="lp-usp-icon-wrapper">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div class="lp-usp-text">
                            <h5>6+ Years</h5>
                            <p>Premium Service</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="lp-usp-item">
                        <div class="lp-usp-icon-wrapper">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <div class="lp-usp-text">
                            <h5>Fully Insured</h5>
                            <p>Total Peace of Mind</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="lp-usp-item">
                        <div class="lp-usp-icon-wrapper">
                            <i class="bi bi-patch-check-fill"></i>
                        </div>
                        <div class="lp-usp-text">
                            <h5>Bond Back</h5>
                            <p>100% Guaranteed</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="lp-usp-item">
                        <div class="lp-usp-icon-wrapper">
                            <i class="bi bi-emoji-smile-fill"></i>
                        </div>
                        <div class="lp-usp-text">
                            <h5>5000+ Happy</h5>
                            <p>Active Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
             SERVICES SECTION: Special Offers
             ========================================== -->
    <section class="lp-services-section section-padding" data-anim="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-secondary fw-bold text-uppercase mb-2">Exclusive Deals</p>
                <h2 class="section-title">🔥Special Premium Offers🔥</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Experience Melbourne's premier cleaning standard with our curated seasonal specials. Limited time offers
                    for clients who demand excellence.
                </p>
            </div>

            <div class="offers-grid">
                {{-- Offer 1 --}}
                <div class="offer-card" data-anim="fade-up" data-anim-delay="100">
                    <div class="offer-card-top">
                        <div class="offer-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div class="offer-price-info">
                            <span class="price-label">STARTS FROM</span>
                            <span class="price-amount">$179</span>
                        </div>
                    </div>
                    <h3>3-Hour Domestic Cleaning Special</h3>
                    <p>Give your home the refresh it deserves with our domestic cleaning.</p>
                    <ul class="sp2-card-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            General area cleaning
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Surface wipe-down
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Kitchen cleaning
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Bathroom cleaning
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Carpet vacuuming & floor mopping
                        </li>
                    </ul>
                    <a class="btn-select-offer btn-select-landing-offer mt-auto text-decoration-none" href="#lp-form-anchor"
                        data-name="3-Hour Domestic Cleaning Special">SELECT OFFER</a>
                </div>

                {{-- Offer 2 --}}
                <div class="offer-card highlight-card" data-anim="fade-up" data-anim-delay="200">
                    <div class="best-deal-ribbon">POPULAR</div>
                    <div class="offer-card-top">
                        <div class="offer-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="offer-price-info">
                            <span class="price-label">BEST PRICE</span>
                            <span class="price-amount">$90</span>
                        </div>
                    </div>
                    <h3>CARPET STEAM CLEANING SPECIAL</h3>
                    <p>Don't live with dirty carpets—get that "new home" feeling today! 🌬️💎</p>
                    <ul class="sp2-card-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Deep Steam Clean for up to 3 Bedrooms
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Tough Stain pre-treatment
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Dust & Allergen removal
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Fast Drying & Fresh Scent
                        </li>
                    </ul>
                    <a class="btn-select-offer btn-select-landing-offer mt-auto text-decoration-none" href="#lp-form-anchor"
                        data-name="CARPET STEAM CLEANING SPECIAL">SELECT OFFER</a>
                </div>

                {{-- Offer 3 --}}
                <div class="offer-card" data-anim="fade-up" data-anim-delay="300">
                    <div class="offer-card-top">
                        <div class="offer-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="8" cy="12" r="5"></circle>
                                <circle cx="16" cy="12" r="5"></circle>
                            </svg>
                        </div>
                        <div class="offer-price-info">
                            <span class="price-label">SUPER SAVER</span>
                            <span class="price-amount">$210</span>
                        </div>
                    </div>
                    <h3>Oven + Bathroom Deep Clean Special</h3>
                    <p>Bring back the shine to your home with our Oven & Bathroom Cleaning package.</p>
                    <ul class="sp2-card-features">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Full bathroom deep clean – showers, mirrors, bathtub & toilet
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Removal of grime, soap scum & buildup
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            Standard oven deep cleaning & degreasing
                        </li>
                    </ul>
                    <a class="btn-select-offer btn-select-landing-offer mt-auto text-decoration-none" href="#lp-form-anchor"
                        data-name="Oven + Bathroom Deep Clean Special">SELECT OFFER</a>
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
             HOW IT WORKS: 3 Simple Conversion Steps
             ========================================== -->
    <section class="section-padding bg-white" data-anim="fade-up">
        <div class="container text-center">
            <p class="text-secondary fw-bold text-uppercase mb-2">Simple & Hassle-Free</p>
            <h2 class="display-5 fw-bold text-primary mb-4">Our Seamless 3-Step Cleaning Process</h2>
            <p class="text-muted mx-auto mb-5" style="max-width: 600px;">
                We have designed our workflow to be as seamless and transparent as possible, giving you absolute convenience
                and comfort.
            </p>

            <div class="row g-5 mt-3 justify-content-center">
                <div class="col-md-4" data-anim="fade-up" data-anim-delay="100">
                    <div class="lp-trust-badge-circle">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <h4 class="fw-bold mb-3 text-primary">1. Quick Quote</h4>
                    <p class="text-muted">Fill out our 60-second quote form or call us. We will provide a completely
                        transparent estimate tailored to your requirements.</p>
                </div>
                <div class="col-md-4" data-anim="fade-up" data-anim-delay="200">
                    <div class="lp-trust-badge-circle">
                        <i class="bi bi-clipboard2-check"></i>
                    </div>
                    <h4 class="fw-bold mb-3 text-primary">2. Deep Cleaning</h4>
                    <p class="text-muted">Our fully insured, police-checked cleaners arrive on-time with high-grade
                        equipment and eco-safe products to carry out a meticulous deep clean.</p>
                </div>
                <div class="col-md-4" data-anim="fade-up" data-anim-delay="300">
                    <div class="lp-trust-badge-circle">
                        <i class="bi bi-emoji-laughing"></i>
                    </div>
                    <h4 class="fw-bold mb-3 text-primary">3. Sparkle & Smile</h4>
                    <p class="text-muted">Inspect the brilliant results. If you chose an End of Lease clean, rest easy
                        knowing we back our work with a 100% Bond Back Guarantee.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
             TESTIMONIALS SECTION: Social Proof
             ========================================== -->
    <section class="section-padding bg-light-gray" data-anim="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-secondary fw-bold text-uppercase mb-2">Our Reputation</p>
                <h2 class="section-title">What Melbourne Customers Say</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    We are dedicated to building long-term relationships through professional excellence. See what our happy
                    clients have to say.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($feedbacks->take(3) as $value)
                    <div class="col-md-4">
                        <div class="lp-review-card" data-anim="zoom-in">
                            <div class="lp-review-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p class="lp-review-text">"{{ String_Cut($value->feedback, 180) }}"</p>
                            <div class="lp-review-author">
                                <div class="lp-review-avatar">
                                    {{ substr($value->name, 0, 1) }}
                                </div>
                                <div class="lp-review-info">
                                    <h5>{{ $value->name }}</h5>
                                    <p>{{ $value->area_name ?? 'Melbourne' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==========================================
             CONVERSION FOOTER: Urgency CTA Banner
             ========================================== -->
    <section class="section-padding bg-primary text-white text-center position-relative overflow-hidden"
        data-anim="zoom-in">
        <div class="container position-relative z-2">
            <h2 class="display-4 fw-bold mb-3">Ready to Experience the Difference?</h2>
            <p class="fs-5 opacity-75 mb-5 mx-auto" style="max-width: 600px;">
                Restore the beauty, health, and comfort of your property today with Melbourne's most reliable cleaners.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a class="btn btn-secondary btn-lg rounded-pill fw-bold shadow px-4 py-3" href="#lp-form-anchor">
                    Get A Free Quote
                </a>
                <a class="btn btn-outline-white btn-lg rounded-pill fw-bold px-4 py-3"
                    href="tel:{{ Setting_Data()['contact'] ?? '+61468460145' }}">
                    <i class="bi bi-telephone-fill me-2"></i> Call: {{ Setting_Data()['contact'] ?? '+61468460145' }}
                </a>
            </div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle opacity-10 z-1"
            style="font-size: 20rem; pointer-events: none;">
            <span class="material-symbols-outlined">cleaning_services</span>
        </div>
    </section>

    <!-- ==========================================
             STICKY BOTTOM CTA BAR (Boost Mobile CRO)
             ========================================== -->
    <div class="lp-sticky-bar d-md-none">
        <div class="container">
            <div class="lp-sticky-container">
                <div class="lp-sticky-info">
                    <div class="lp-sticky-phone-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div class="lp-sticky-text">
                        <h6>Book by Phone</h6>
                        <p>{{ Setting_Data()['contact'] ?? '+61468460145' }}</p>
                    </div>
                </div>
                <div class="d-flex w-100 gap-2">
                    <a href="tel:{{ Setting_Data()['contact'] ?? '+61468460145' }}"
                        class="btn btn-secondary flex-grow-1 py-2 fw-bold shadow-sm">
                        <i class="bi bi-telephone-fill"></i> Call Now
                    </a>
                    <a href="#lp-form-anchor" class="btn btn-primary-blue flex-grow-1 py-2 fw-bold shadow-sm">
                        <i class="bi bi-pencil-square"></i> Get Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        $(document).ready(function () {
            $('.btn-select-landing-offer').on('click', function (e) {
                e.preventDefault();
                let offerName = $(this).data('name');

                // Select "Special Offers" (value 0) in the form
                $('#quote_form_landing select[name="service_id"]').val('0');

                // Pre-populate the message area with the selected offer name
                $('#quote_form_landing textarea[name="msg"]').val('I would like to book the: ' + offerName);

                // Smooth scroll to the form anchor
                $('html, body').animate({
                    scrollTop: $("#lp-form-anchor").offset().top - 80
                }, 400);
            });
        });
    </script>
@endsection