@extends('web.layout.web-layout')

@section('content')
    <!-- ========================
                             SECTION 1: Hero
                        ======================== -->
    <section class="hero-section">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'about')
                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="hero-img">
            @endif

        @endforeach
        <div class="container">
            <h1>Melbourne's Trusted <span>Cleaning Experts</span> Since 2013</h1>
            <p>We've spent the last decade perfecting the art of cleanliness,
                transforming thousands of homes and workplaces into pristine sanctuaries.</p>
        </div>
    </section>

    <!-- ========================
                             SECTION 2: Passion / Our Story
                        ======================== -->
    <section class="passion-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="display-5 fw-bold mb-4">Driven by a Passion for Perfection</h2>
                    <p class="text-muted mb-4">Founded in the heart of Melbourne, CleanCare began with a simple mission:
                        to provide the highest standard of professional cleaning without compromising on the health of
                        our clients or the environment.</p>
                    <p class="text-muted mb-4">What started as a small family operation has grown into a premier
                        cleaning specialist network. We don't just "clean"—we restore environments, ensuring every
                        corner reflects our commitment to excellence.</p>
                    <div class="passion-quote p-4 bg-light rounded-3 mb-4">
                        <p class="fst-italic mb-0">"Excellence is not an act, but a habit. At CleanCare, it is the
                            standard we meet every single day."</p>
                    </div>
                    <div class="row g-4 passion-stat">
                        <div class="col-6">
                            <span class="passion-stat-number">10+</span>
                            <span class="passion-stat-label">Years Experience</span>
                        </div>
                        <div class="col-6">
                            <span class="passion-stat-number">5000+</span>
                            <span class="passion-stat-label">Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="passion-img-wrapper">
                        <img src="{{ asset('assets/imgs/CWPss.PNG') }}" alt="CleanCare Team at Work"
                            class="passion-img shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 3: Core Pillars
                        ======================== -->
    <section class="pillars-section" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">The Core Pillars of CleanCare</h2>
                <p class="text-muted pillars-subtitle mx-auto">Our values define every interaction, every service, and
                    every clean.</p>
            </div>
            <div class="row g-4">
                <!-- Pillar 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="pillar-card">
                        <div class="pillar-icon">
                            <span class="material-symbols-outlined">eco</span>
                        </div>
                        <h4 class="fw-bold mb-3">Eco-Friendly</h4>
                        <p class="text-muted mb-0 small">We exclusively use non-toxic, biodegradable products that are
                            safe for your children, your pets, and the planet.</p>
                    </div>
                </div>
                <!-- Pillar 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="pillar-card">
                        <div class="pillar-icon">
                            <span class="material-symbols-outlined">verified_user</span>
                        </div>
                        <h4 class="fw-bold mb-3">Quality Guaranteed</h4>
                        <p class="text-muted mb-0 small">Not 100% satisfied? We'll come back and fix it for free, no
                            questions asked. Your peace of mind is our priority.</p>
                    </div>
                </div>
                <!-- Pillar 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="pillar-card">
                        <div class="pillar-icon">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <h4 class="fw-bold mb-3">Always On Time</h4>
                        <p class="text-muted mb-0 small">We value your schedule. Our team arrives within the promised
                            window, every single time, without exception.</p>
                    </div>
                </div>
                <!-- Pillar 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="pillar-card">
                        <div class="pillar-icon">
                            <span class="material-symbols-outlined">person_pin_circle</span>
                        </div>
                        <h4 class="fw-bold mb-3">Customer First</h4>
                        <p class="text-muted mb-0 small">Personalized service is at our heart. We listen to your
                            specific needs and tailor our cleaning to match them.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 4: Professional Edge
                        ======================== -->
    <section class="edge-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="display-5 fw-bold mb-4">The Professional Edge You Deserve</h2>
                    <p class="text-muted mb-4">We don't just offer cleaning; we offer a seamless, high-end service
                        experience that takes the stress out of maintaining your space.</p>
                    <ul class="edge-list">
                        <li>Fully Insured Team</li>
                        <li>Police Checked Staff</li>
                        <li>Rigorous Training</li>
                        <li>Specialized Equipment</li>
                        <li>Health-Focused</li>
                        <li>Transparent Pricing</li>
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('assets/imgs/CWPss.PNG') }}" alt="The Professional Edge at CleanCare"
                        class="img-fluid rounded-4 shadow edge-img">
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 5: How It Works
                        ======================== -->
    <section class="how-it-works-section">
        <div class="container">
            <div class="text-center mb-3" data-aos="fade-up">
                <h2 class="display-5 fw-bold">How It Works</h2>
            </div>
            <div class="row timeline-row">
                <div class="col-md-3 timeline-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="timeline-step">1</div>
                    <h5 class="fw-bold">Book Online</h5>
                    <p class="text-muted small">Choose your service and date in 60 seconds.</p>
                </div>
                <div class="col-md-3 timeline-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="timeline-step">2</div>
                    <h5 class="fw-bold">We Notice</h5>
                    <p class="text-muted small">We assign the best cleaning specialist for your home.</p>
                </div>
                <div class="col-md-3 timeline-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="timeline-step">3</div>
                    <h5 class="fw-bold">The Clean</h5>
                    <p class="text-muted small">Our team performs their magic with surgical precision.</p>
                </div>
                <div class="col-md-3 timeline-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="timeline-step">4</div>
                    <h5 class="fw-bold">Relax</h5>
                    <p class="text-muted small">Enjoy your pristine home and the CleanCare guarantee.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 6: Team – Faces Behind the Shine
                        ======================== -->
    <section class="team-section-new" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">The Faces Behind the Shine</h2>
                <p class="text-muted">Meet the experts leading Melbourne's cleaning revolution.</p>
            </div>
            <div class="row g-4">
                <!-- Member 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member-card">
                        <div class="team-initials">DM</div>
                        <h4 class="fw-bold mb-1">Daniel Mira</h4>
                        <p class="text-secondary fw-semibold mb-3">Founder &amp; Director</p>
                        <p class="text-muted small mb-0">"My goal is to bring five-star hotel standards to every home in
                            Melbourne."</p>
                    </div>
                </div>
                <!-- Member 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member-card">
                        <div class="team-initials">SR</div>
                        <h4 class="fw-bold mb-1">Sarah Reynolds</h4>
                        <p class="text-secondary fw-semibold mb-3">Operations Manager</p>
                        <p class="text-muted small mb-0">"I ensure our cleaners are as dedicated to your home's health
                            as we are."</p>
                    </div>
                </div>
                <!-- Member 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member-card">
                        <div class="team-initials">MT</div>
                        <h4 class="fw-bold mb-1">Marisa Thompson</h4>
                        <p class="text-secondary fw-semibold mb-3">Senior Specialist</p>
                        <p class="text-muted small mb-0">"Passion for detail is what makes a room feel truly perfect."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 8: Testimonials
                        ======================== -->
    <section class="about-testimonials-section" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">What Our Clients Say</h2>
                <p class="text-muted">Real reviews from real Melburnians who trust us every day.</p>
            </div>
            <div class="row g-4">
                <!-- Testimonial 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="about-testimonial-card">
                        <div class="about-testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="about-testimonial-text">"CleanCare transformed our office space. The team was
                            punctual, thorough, and incredibly professional. We've never looked back!"</p>
                        <div class="about-testimonial-author">
                            <div class="about-testimonial-initials">JM</div>
                            <div>
                                <span class="about-testimonial-name">James Miller</span>
                                <span class="about-testimonial-role">— Richmond</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="about-testimonial-card">
                        <div class="about-testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="about-testimonial-text">"Absolutely amazing service. My home has never felt cleaner.
                            The eco-friendly products are a huge bonus for our family with young kids."</p>
                        <div class="about-testimonial-author">
                            <div class="about-testimonial-initials">SB</div>
                            <div>
                                <span class="about-testimonial-name">Sophie Barker</span>
                                <span class="about-testimonial-role">— Fitzroy</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="about-testimonial-card">
                        <div class="about-testimonial-stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p class="about-testimonial-text">"Reliable, affordable, and always on time. I've been using
                            CleanCare for two years now and won't go anywhere else. Highly recommend!"</p>
                        <div class="about-testimonial-author">
                            <div class="about-testimonial-initials">MT</div>
                            <div>
                                <span class="about-testimonial-name">Mark Thompson</span>
                                <span class="about-testimonial-role">— Brunswick</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                             SECTION 9: CTA – Experience the Standard
                        ======================== -->
    <section class="cta-section-new">
        <div class="container" data-aos="zoom-in">
            <h2 class="display-4 fw-bold mb-4">Experience the Clean With Professionals Standard</h2>
            <p class="fs-5 opacity-75 mb-5">Join thousands of Melburnians who trust us with their spaces.</p>
            <div class="cta-buttons">
                <a href="#EditModel" data-bs-toggle="modal" data-id="" class="btn btn-secondary px-4 py-3">Book Your First
                    Clean</a>
                <a href="tel:{{ Setting_Data()['contact'] ?? "+61468460145" }}" class="btn btn-outline-white px-5 py-3">Call
                    {{ Setting_Data()['contact'] ?? "+61 468 460 145" }}</a>
            </div>
        </div>
    </section>
@endsection