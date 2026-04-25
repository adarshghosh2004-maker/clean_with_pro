@extends('web.layout.web-layout')

@section('content')
    <!-- ========================
             SECTION 1: Contact Hero
        ======================== -->
    <section class="contact-hero" data-aos="fade-up">
        <div class="container" data-aos="fade-up">
            <span class="about-hero-subtitle d-block mb-3">Get In Touch</span>
            <h1 class="display-3 fw-bold mb-4">We're Here to Help You Shine</h1>
            <p class="fs-5 opacity-75 mb-0 mx-auto max-w-700">Have questions about our services or want to book a
                professional clean? Our team is ready to assist you.</p>
        </div>
    </section>

    <!-- ========================
             SECTION 2: Contact Info Cards
        ======================== -->
    <section class="contact-info-section" data-aos="fade-up">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!-- Phone -->
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <h4 class="fw-bold mb-3">Call Us</h4>
                        <p class="text-muted mb-4">Direct line for booking and urgent inquiries.</p>
                        <a href="tel:0413368322" class="text-secondary fw-bold fs-5 text-decoration-none">0413 368
                            322</a>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <h4 class="fw-bold mb-3">Email Us</h4>
                        <p class="text-muted mb-4">Send us your details and we'll reply within 24h.</p>
                        <a href="mailto:info@cleancare.pro"
                            class="text-secondary fw-bold fs-5 text-decoration-none">info@cleancare.pro</a>
                    </div>
                </div>
                <!-- Address -->
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <h4 class="fw-bold mb-3">Our Office</h4>
                        <p class="text-muted mb-4">123 Clean Street, Melbourne VIC 3000</p>
                        <a href="#map" class="text-secondary fw-bold fs-5 text-decoration-none">Get Directions</a>
                    </div>
                </div>
                <!-- Timing -->
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">access_time</span>
                        </div>
                        <h4 class="fw-bold mb-3">Business Hours</h4>
                        <p class="text-muted mb-4">Monday - Friday: 8AM - 6PM<br>Saturday: 9AM - 4PM<br>Sunday: Closed</p>
                        <a href="#" class="text-secondary fw-bold fs-5 text-decoration-none">Get Directions</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
             SECTION 3: Contact Form & Map
        ======================== -->
    <section class="section-padding bg-white" data-aos="fade-up">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Contact Form -->
                <div class="col-lg-12" data-aos="fade-right">
                    <div class="contact-form-wrapper">
                        <h2 class="display-5 fw-bold mb-4">Send Us a Message</h2>
                        <p class="text-muted mb-5">Fill out the form below and one of our cleaning specialists will get
                            back to you shortly.</p>

                        <form action="#" method="POST" class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="04XX XXX XXX" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Service Required</label>
                                <select class="form-select">
                                    <option selected disabled>Choose a service...</option>
                                    <option>Regular Residential Cleaning</option>
                                    <option>Deep Spring Clean</option>
                                    <option>Move In / Move Out Clean</option>
                                    <option>Commercial Cleaning</option>
                                    <option>Carpet & Upholstery</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Your Message</label>
                                <textarea class="form-control" rows="4" placeholder="How can we help you?"></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-secondary w-100 py-3 fs-5">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
             SECTION 4: FAQ (Following the template)
        ======================== -->
    <section class="section-padding bg-light" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Common Questions</h2>
                <p class="text-muted">Quick answers to help you get started.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="accordion" id="contactFaq">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    Do you provide all cleaning supplies?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    Yes, we bring all necessary eco-friendly cleaning products and professional-grade
                                    equipment to every job.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    What is your cancellation policy?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    We require at least 24 hours notice for cancellations. Cancellations within 24 hours
                                    may incur a fee.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    Are your cleaners insured?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    Absolutely. Every member of our team is fully insured and police-checked for your
                                    peace of mind.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
             SECTION 5: CTA
        ======================== -->
    <section class="cta-section-new" data-aos="fade-up">
        <div class="container" data-aos="zoom-in">
            <h2 class="display-4 fw-bold mb-4">Ready to Start Your Clean Journey?</h2>
            <p class="fs-5 opacity-75 mb-5">Join 5,000+ happy Melburnians who trust CleanCare.</p>
            <div class="cta-buttons">
                <a href="{{ route('home') }}" class="btn btn-secondary px-5 py-3">Book Now</a>
                <a href="tel:0413368322" class="btn btn-outline-white px-5 py-3">Call Support</a>
            </div>
        </div>
    </section>

@endsection