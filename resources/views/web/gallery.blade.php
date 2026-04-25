@extends('web.layout.web-layout')
@section('content')


    <!-- Hero Section -->
    <section class="gallery-hero-v2">
        <div class="container">
            <span class="badge-top" data-aos="fade-up">MELBOURNE'S PREMIER CLEANING EXPERIENCE</span>
            <h1 data-aos="fade-up" data-aos-delay="100">Before &<br><span>After Cleaning Gallery</span></h1>
            <p data-aos="fade-up" data-aos-delay="200">
                Witness the transformational power. Our editorial-standard cleaning services turn cluttered Melbourne
                homes into pristine sanctuaries.
            </p>
            <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="300">
                <a href="<?php echo route('contact'); ?>"
                    class="btn-secondary-green rounded-pill px-4 py-3 text-decoration-none fw-bold">Get a Free Quote</a>
                <a href="#" class="btn-outline-white rounded-pill px-4 py-3 text-decoration-none fw-bold">View
                    Pricing</a>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <nav class="gallery-filter">
        <div class="container">
            <ul class="filter-nav">
                <li><a href="#" class="active">All Projects</a></li>
                <li><a href="#">Carpet Cleaning</a></li>
                <li><a href="#">Sofa & Upholstery</a></li>
                <li><a href="#">Bathroom</a></li>
                <li><a href="#">End of Lease</a></li>
                <li><a href="#">Duct Cleaning</a></li>
            </ul>
        </div>
    </nav>

    <!-- Gallery Grid -->
    <section class="gallery-grid-v2">
        <div class="container">
            <div class="row">
                <!-- Project 1 -->
                <div class="col-lg-4 col-md-6 gallery-item-v2" data-aos="fade-up">
                    <div class="ba-card-v2">
                        <div class="ba-images-container">
                            <div class="ba-side-v2">
                                <span class="ba-label before">Before</span>
                                <img src="https://images.unsplash.com/photo-1558317374-067fb5f30001?q=80&w=800"
                                    alt="Before Cleaning">
                            </div>
                            <div class="ba-side-v2">
                                <span class="ba-label after">After</span>
                                <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?q=80&w=800"
                                    alt="After Cleaning">
                            </div>
                        </div>
                        <div class="ba-content-v2">
                            <span class="category-tag">Southbank Residence</span>
                            <h4>Master Bedroom Carpet Steam Clean</h4>
                            <p>Removal of deep stains and deep fiber revitalization using eco-friendly thermal
                                extraction.</p>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-lg-4 col-md-6 gallery-item-v2" data-aos="fade-up" data-aos-delay="100">
                    <div class="ba-card-v2">
                        <div class="ba-images-container">
                            <div class="ba-side-v2">
                                <span class="ba-label before">Before</span>
                                <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=800"
                                    alt="Before Grout">
                            </div>
                            <div class="ba-side-v2">
                                <span class="ba-label after">After</span>
                                <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?q=80&w=800"
                                    alt="After Grout">
                            </div>
                        </div>
                        <div class="ba-content-v2">
                            <span class="category-tag">Docklands Penthouse</span>
                            <h4>Grout & Tile Restoration</h4>
                            <p>Full mineral deposit removal and grout whitening for a flawless high-gloss finish.</p>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="col-lg-4 col-md-6 gallery-item-v2" data-aos="fade-up" data-aos-delay="200">
                    <div class="ba-card-v2">
                        <div class="ba-images-container">
                            <div class="ba-side-v2">
                                <span class="ba-label before">Before</span>
                                <img src="https://images.unsplash.com/photo-1540574163026-643ea20ade25?q=80&w=800"
                                    alt="Before Upholstery">
                            </div>
                            <div class="ba-side-v2">
                                <span class="ba-label after">After</span>
                                <img src="https://images.unsplash.com/photo-1556911223-047024844003?q=80&w=800"
                                    alt="After Upholstery">
                            </div>
                        </div>
                        <div class="ba-content-v2">
                            <span class="category-tag">Brighton Estate</span>
                            <h4>Upholstery Sanitization</h4>
                            <p>Allergen removal and deep fabric cleaning for high-end linen sectional sofa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-banner-v2">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-award"></i></div>
                        <h3>10+ Years</h3>
                        <p>Delivering Excellence</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-people"></i></div>
                        <h3>500+ Clients</h3>
                        <p>Happy Households</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-lightning-charge"></i></div>
                        <h3>Same-Day</h3>
                        <p>Service Available</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-leaf"></i></div>
                        <h3>Eco-Friendly</h3>
                        <p>Non-Toxic Formula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialized Services -->
    <section class="specialized-services">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-secondary-green fw-bold text-uppercase small letter-spacing-1">Our Expertise</span>
                <h2 class="fw-extrabold mt-2">Specialized Cleaning Services</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-magic"></i></div>
                        <h4>Carpet Deep Cleaning</h4>
                        <p>Commercial grade steam extraction that removes deep-seated dust and stubborn stains.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-couch"></i></div>
                        <h4>Sofa & Upholstery</h4>
                        <p>Gentle yet effective treatment for delicate fabrics, including leather and velvet.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-droplet-half"></i></div>
                        <h4>Bathroom Sanitization</h4>
                        <p>Deep scrubbing of tiles, grout whitening, and removal of limescale and mold.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-key"></i></div>
                        <h4>End of Lease</h4>
                        <p>100% bond back guarantee cleaning following strict real-estate checklists.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-wind"></i></div>
                        <h4>Duct Cleaning</h4>
                        <p>Improve air quality by removing dust, debris, and allergens from your HVAC system.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-house-check"></i></div>
                        <h4>After Renovation</h4>
                        <p>Meticulous cleaning of post-construction dust and builder's residue.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-v2">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-extrabold">What Our Clients Say</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-v2">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>"The before and after was incredible. I didn't think my 10-year-old carpets could look this
                            new again. Worth every cent."</p>
                        <div class="testimonial-user">
                            <img src="https://i.pravatar.cc/150?u=sarah" alt="Sarah J.">
                            <div>
                                <h5>Sarah J.</h5>
                                <span>Southbank</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-v2">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>"Extremely professional. They arrived on time, used high-quality equipment, and were very
                            respectful of our home."</p>
                        <div class="testimonial-user">
                            <img src="https://i.pravatar.cc/150?u=michael" alt="Michael K.">
                            <div>
                                <h5>Michael K.</h5>
                                <span>Docklands</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-v2">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i>
                        </div>
                        <p>"Seamless experience from booking to execution. The end-of-lease clean was perfect and we got
                            our full bond back."</p>
                        <div class="testimonial-user">
                            <img src="https://i.pravatar.cc/150?u=elena" alt="Elena R.">
                            <div>
                                <h5>Elena R.</h5>
                                <span>Brighton</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-v2">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h2>Ready for a Spotless Home? Book Today!</h2>
                <a href="<?php echo route('contact'); ?>" class="btn-white">Secure My Spot</a>
            </div>
        </div>
    </section>


@endsection