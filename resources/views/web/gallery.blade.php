@extends('web.layout.web-layout')
@section('content')


    <!-- Hero Section -->
    <section class="gallery-hero-v2" data-aos="fade-up">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'gallery')
                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="gallery-hero-v2-img">
            @endif

        @endforeach
        <div class="container">
            <h1 data-aos="fade-up" data-aos-delay="100">Before &<br><span>After Cleaning Gallery</span></h1>
            <p data-aos="fade-up" data-aos-delay="200">
                Witness the transformational power. Our editorial-standard cleaning services turn cluttered Melbourne
                homes into pristine sanctuaries.
            </p>
            <div class="d-flex justify-content-center gap-3" data-aos="fade-up" data-aos-delay="300">
                <a href="#EditModel" data-bs-toggle="modal"
                    class="btn-secondary-green rounded-pill px-4 py-3 text-decoration-none fw-bold">Get a Free Quote</a>
                <a href="{{ route('pricing') }}"
                    class="btn-outline-white rounded-pill px-4 py-3 text-decoration-none fw-bold">View
                    Pricing</a>
            </div>
        </div>
    </section>

    <nav class="gallery-filter">
        <div class="container-fluid filter-wrapper">

            <!-- Left Button -->
            <button class="scroll-btn left" onclick="scrollFilter(-200)">&#10094;</button>

            <ul class="filter-nav" id="filterNav">
                @foreach ($services as $key => $value)
                    <li>
                        <a href="" id="{{ $value['id'] }}" class="{{ $key == 0 ? 'active' : '' }} filter-a">
                            {{ $value['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Right Button -->
            <button class="scroll-btn right" onclick="scrollFilter(200)">&#10095;</button>

        </div>
    </nav>

    <!-- Gallery Grid -->
    <section class="gallery-grid-v2" data-aos="fade-up">
        <div class="container">
            <!-- Project 1 -->
            @foreach ($services as $key => $value)
                <div class="row services-row" data-id="{{ $value['id'] }}" style="{{ $key == 0 ? '' : 'display:none;' }}">
                    @foreach ($gallery as $item => $data)
                        @if($data['service_id'] == $value['id'])
                            <div class="col-lg-4 col-md-6 gallery-item-v2" data-aos="fade-up" data-aos-duration="800">
                                <div class="ba-card-v2">
                                    <div class="ba-images-container">
                                        <div class="ba-side-v2">
                                            <span class="ba-label before">Before</span>
                                            <img src="{{ $data['before_img'] }}" alt="Before Cleaning">
                                        </div>
                                        <div class="ba-side-v2">
                                            <span class="ba-label after">After</span>
                                            <img src="{{ $data['after_img'] }}" alt="After Cleaning">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- Video Thumbnails --}}
                <div class="video-grid">

                    <div class="video-card">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Steam Deep Clean">
                        <div class="play-wrap">
                            <button class="play-btn" aria-label="Play video">&#9654;</button>
                        </div>
                        <p class="video-label">Steam Deep Clean</p>
                    </div>

                    <div class="video-card">
                        <img src="https://images.unsplash.com/photo-1585771724684-38269d6639fd?w=600&q=80"
                            alt="Chandelier Detailing">
                        <div class="play-wrap">
                            <button class="play-btn" aria-label="Play video">&#9654;</button>
                        </div>
                        <p class="video-label">Chandelier Detailing</p>
                    </div>

                    <div class="video-card">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600&q=80"
                            alt="Industrial Sanitation">
                        <div class="play-wrap">
                            <button class="play-btn" aria-label="Play video">&#9654;</button>
                        </div>
                        <p class="video-label">Industrial Sanitation</p>
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-banner-v2" data-aos="fade-up">
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
                        <div class="icon-circle"><i class="fa-solid fa-leaf"></i></div>
                        <h3>Eco-Friendly</h3>
                        <p>Non-Toxic Formula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialized Services -->
    <section class="specialized-services" data-aos="fade-up">
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
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-stars"></i></div>
                        <h4>Sofa & Upholstery</h4>
                        <p>Gentle yet effective treatment for delicate fabrics, including leather and velvet.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-droplet-half"></i></div>
                        <h4>Bathroom Sanitization</h4>
                        <p>Deep scrubbing of tiles, grout whitening, and removal of limescale and mold.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-key"></i></div>
                        <h4>End of Lease</h4>
                        <p>100% bond back guarantee cleaning following strict real-estate checklists.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-wind"></i></div>
                        <h4>Duct Cleaning</h4>
                        <p>Improve air quality by removing dust, debris, and allergens from your HVAC system.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card-mini">
                        <div class="icon-box"><i class="bi bi-house-check"></i></div>
                        <h4>After Renovation</h4>
                        <p>Meticulous cleaning of post-construction dust and builder's residue.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-v2" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-extrabold">What Our Clients Say</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card-v2">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
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
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
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
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
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
    <section class="cta-v2" data-aos="fade-up">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h2>Ready for a Spotless Home? Book Today!</h2>
                <a href="<?php echo route('contact'); ?>" class="btn-white">Secure My Spot</a>
            </div>
        </div>
    </section>
@endsection

@section('pagescript')
    <script>
        function scrollFilter(value) {
            const container = document.getElementById('filterNav');
            container.scrollBy({
                left: value,
                behavior: 'smooth'
            });
        }

        $(document).ready(function () {
            $('.filter-a').click(function (e) {
                e.preventDefault();

                var serviceId = $(this).attr('id');

                // Active button
                $('.filter-a').removeClass('active');
                $(this).addClass('active');

                // Hide all rows smoothly
                $('.services-row').fadeOut(200);

                // Show selected with delay
                setTimeout(function () {
                    var target = $('.services-row[data-id="' + serviceId + '"]');

                    target.fadeIn(300, function () {
                        // 🔥 Re-init AOS after DOM visibility change
                        AOS.refreshHard();
                    });

                }, 200);
            });

        });
    </script>
@endsection