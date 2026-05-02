@extends('web.layout.web-layout')

@section('content')
    <!-- ========================
                     SECTION 1: Contact Hero
                ======================== -->
    <section class="contact-hero" data-aos="fade-up">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'contact')
                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="contact-hero-img">
            @endif

        @endforeach
        <div class="container" data-aos="fade-up">
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

                        <form id="quote_form" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Full Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control bg-light border-0"
                                        placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Mobile Number<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="phone" class="form-control bg-light border-0"
                                        placeholder="(555) 123-4567" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Email Address<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control bg-light border-0"
                                        placeholder="john@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Suburb / Area<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="suburb" class="form-control bg-light border-0"
                                        placeholder="e.g. Richmond, VIC" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Date<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date" class="form-control bg-light border-0"
                                        placeholder="dd/mm/yyyy" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Time (optional)</label>
                                    <select name="time" class="form-control bg-light border-0" required>
                                        <option value="">Select a time</option>
                                        <option value="07:00">7:00 AM</option>
                                        <option value="08:00">8:00 AM</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                        <option value="18:00">6:00 PM</option>
                                        <option value="19:00">7:00 PM</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-semibold text-muted">Service<span
                                            class="text-danger">*</span></label>
                                    <select name="service" class="form-control bg-light border-0">
                                        <option value="">Select Service</option>
                                        @foreach ($services as $key => $value)
                                            <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-muted">Your Message (optional)</label>
                                    <textarea class="form-control bg-light border-0" name="msg" rows="3"
                                        placeholder="Briefly describe your cleaning needs..."></textarea>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="button" onclick="save_quote()"
                                        class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">Send
                                        Request</button>
                                </div>
                            </div>
                        </form>
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
                <a href="#EditModel" data-bs-toggle="modal" class="btn btn-secondary px-5 py-3">Book Now</a>
                <a href="tel:0413368322" class="btn btn-outline-white px-5 py-3">Call Support</a>
            </div>
        </div>
    </section>

@endsection