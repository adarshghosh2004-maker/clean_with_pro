@extends('web.layout.web-layout')
@section('content')



    <!-- Hero -->
    <div class="hero" style="background-image: url('<?php echo asset('images/aboutus/hero.png'); ?>');" data-aos="fade">
        <div class="hero-content" data-aos="fade-up" data-aos-delay="100">
            <h2>Specials</h2>
            <p>Creating cleaner, healthier homes with a human touch. We believe a clean home is the foundation for a
                happy life. Our professional team is dedicated to excellence and customer satisfaction.</p>
        </div>
    </div>

    <!-- Deal on Services Section -->
    <div class="container">
        <section class="section-container section-padding" data-aos="fade-up">
            <div class="text-center mb-5">
                <h2 class="section-title">
                    <span style="color: var(--primary-blue);">Deal on</span>
                    <span style="color: var(--secondary-green);">Services</span>
                </h2>
                <p class="mx-auto text-muted" style="max-width: 800px; font-size: 1.1rem;">
                    Best Cleaning Services Melbourne offers timely, lowest price cleaning services with best quality.
                    Check our latest special deals below. Call us on <strong>0435 811 838</strong> for more details.
                </p>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="deal-card">
                        <div class="card-body d-flex flex-column h-100">
                            <div class="mb-2">
                                <i class="bi bi-tags-fill" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: var(--text-dark);">3 Rooms Carpet Steam Cleaning</h5>
                            <div class="deal-info-box">
                                <p class="mb-0 small fw-semibold">Carpet Steam Cleaning: <span
                                        class="text-primary">$90.00</span> for 3 rooms up to 30 sqm*</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="deal-card">
                        <div class="card-body d-flex flex-column h-100">
                            <div class="mb-2">
                                <i class="bi bi-heart-pulse-fill"
                                    style="font-size: 2.5rem; color: var(--secondary-green);"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: var(--text-dark);">Pets Stains & Odor Removal</h5>
                            <div class="deal-info-box">
                                <p class="mb-0 small fw-semibold">Pet Stains & Odor Removal: Call for Special Offers.
                                    We'll get rid of your pet stains!</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="deal-card">
                        <div class="card-body d-flex flex-column h-100">
                            <div class="mb-2">
                                <i class="bi bi-stars" style="font-size: 2.5rem; color: #ffc107;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: var(--text-dark);">Upholstery Cleaning Special</h5>
                            <div class="deal-info-box">
                                <p class="mb-0 small fw-semibold">Restore your furniture's beauty. Call for a custom
                                    quote today!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="section-container section-padding">
            <h2 class="section-title" data-aos="fade-up">Why Choose Us</h2>
            <div class="wcu-card" data-aos="fade-right">
                <img src="<?php echo asset('images/aboutus/cleaner.png'); ?>" alt="Cleaner">
                <div class="wcu-card-content">
                    <h3>Trained & Trusted</h3>
                    <p>We provide standard background checks and training to ensure quality cleaning homes and your
                        peace of mind.</p>
                </div>
            </div>
            <div class="wcu-card flex-row-reverse" data-aos="fade-left">
                <img src="<?php echo asset('images/aboutus/kitchen.png'); ?>" alt="Kitchen">
                <div class="wcu-card-content">
                    <h3>Satisfaction Guaranteed</h3>
                    <p>If you are not happy, we will make it right, no questions asked. Our team is dedicated to your
                        happiness.</p>
                </div>
            </div>
        </section>

        <!-- Cleaning Packages -->
        <section class="section-container section-padding" data-aos="fade-up">
            <div class="packages-grid row g-4 mt-2">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="package-card basic">
                        <i class="bi bi-brush-fill"></i>
                        <h4>Basic Clean</h4>
                        <div class="price">$89</div>
                        <div class="desc">Weekly essentials including dusting, vacuuming, and surface cleaning.</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="package-card deep">
                        <i class="bi bi-droplet-fill"></i>
                        <h4>Deep Clean</h4>
                        <div class="price">$149</div>
                        <div class="desc">Comprehensive service covering every nook and cranny.</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="package-card move">
                        <i class="bi bi-key-fill"></i>
                        <h4>Move-In/Out</h4>
                        <div class="price">$229</div>
                        <div class="desc">Complete refresh for your new or old home. We handle the heavy lifting.</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Results and Questions -->
        <section class="section-container section-padding" data-aos="fade-up">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="results-grid">
                        <div class="result-img-container">
                            <img src="<?php echo asset('images/aboutus/before1.png'); ?>" alt="Before">
                            <div class="result-badge">Before</div>
                        </div>
                        <div class="result-img-container">
                            <img src="<?php echo asset('images/aboutus/kitchen.png'); ?>" alt="After">
                            <div class="result-badge">After</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="compact-form h-100">
                        <h4>Get a free quote now</h4>
                        <form>
                            <input type="text" class="form-control" placeholder="First Name">
                            <input type="phone" class="form-control" placeholder="Phone Number">
                            <input type="email" class="form-control" placeholder="Email Address">
                            <button type="submit" class="btn btn-primary-blue w-100 py-3 rounded-pill fw-bold">Get a
                                Free Quote</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection