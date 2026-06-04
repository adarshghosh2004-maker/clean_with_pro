@extends('web.layout.web-layout')

@section('title', 'Cleaning Gallery - Before & After | Clean With Professionals')
@section('description', 'View our cleaning gallery showcasing before and after results of homes and offices in Melbourne.')
@section('keywords', 'cleaning gallery, before after cleaning, Melbourne cleaning photos')

@section('content')
    <div class="gallery-page">
        <!-- Hero Section -->
        <section class="hero-section">
            @foreach ($pages as $key => $value)
                @if ($value['name'] == 'gallery')
                    <img src="{{ $value['img'] }}" alt="Clean with Professionals Hero Image" class="hero-img">
                @endif

            @endforeach
            <div class="container">
                <h1>Before &<br><span>After Cleaning Gallery</span></h1>
                <p>
                    Witness the transformational power. Our editorial-standard cleaning services turn cluttered Melbourne
                    homes into pristine sanctuaries.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#EditModel" data-bs-toggle="modal" class="btn btn-secondary px-4 py-3">Get a Free Quote</a>
                    <a href="{{ route('pricing') }}" class="btn btn-outline-white px-4 py-3">View
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

        <!-- Before & After Section -->
        <section class="section-padding" data-anim="fade-up">
            <div class="section-header anim-trigger">
                <div class="section-title-wrapper">
                    <h1 class="section-title">Before & After</h1>
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

            @foreach ($services as $item => $data)
                <div class="gallery-grid services-row gallerySlider" data-id="{{ $data['id'] }}"
                    style="{{ $item == 0 ? '' : 'display:none;' }}">
                    <!-- Card 1 -->
                    @php $i = 1; @endphp
                    @foreach ($gallery as $key => $value)
                        @if($data['id'] == $value['service_id'])
                            <div class="gallery-card anim-trigger anim-stagger-{{ $i }}">
                                <div class="comparison-container">
                                    <img src="{{ $value['before_img'] }}" alt="Victorian Velvet Before" class="comparison-img"
                                        style="filter: contrast(0.8) sepia(0.3) brightness(0.8);">
                                    <img src="{{ $value['after_img'] }}" alt="Victorian Velvet After" class="comparison-img">
                                    <span class="label-before">BEFORE</span>
                                    <span class="label-after">AFTER</span>
                                </div>
                            </div>
                            @php $i = ($i % 6) + 1; @endphp
                        @endif
                    @endforeach
                </div>
            @endforeach
        </section>

        <!-- Process Videos Section -->
        <section class="section-padding" data-anim="fade-up">
            <div class="section-header anim-trigger">
                <div class="section-title-wrapper">
                    <h1 class="section-title">Process Videos</h1>
                </div>
                <div class="slider-controls">
                    <button class="btn-nav" onclick="scrollSlider('videoSlider', -1)">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <button class="btn-nav" onclick="scrollSlider('videoSlider', 1)">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
            </div>

            @foreach ($services as $item => $data)
                <div class="video-grid services-row videoSlider" data-id="{{ $data['id'] }}"
                    style="{{ $item == 0 ? '' : 'display:none;' }}">
                    <!-- Video 1 -->
                    @php $j = 1; @endphp
                    @foreach ($videos as $key => $value)
                        @if($data['id'] == $value['service_id'])
                            <div class="video-card anim-trigger anim-stagger-{{ $j }}">
                                <img src="{{ $value['image'] }}" alt="Heritage Silk" class="video-thumbnail">
                                <a class="play-btn-overlay video" data-bs-toggle="modal" data-bs-target="#videoModal"
                                    data-video="{{ $value['video'] }}" data-image="{{ $value['image'] }}" title="Watch">
                                    <i class="fa-solid fa-play"></i>
                                </a>
                            </div>
                            @php $j = ($j % 6) + 1; @endphp
                        @endif
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>

    <!-- Stats Section -->
    <section class="stats-banner-v2" data-anim="fade-up">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-award"></i></div>
                        <h3>6+ Years</h3>
                        <p>Delivering Excellence</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item-v2">
                        <div class="icon-circle"><i class="bi bi-people"></i></div>
                        <h3>5000+ Clients</h3>
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
    <section class="section-padding" data-anim="fade-up">
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
    <section class="section-padding" data-anim="fade-up">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-extrabold">What Our Clients Say</h2>
            </div>
            <div class="row g-4">
                @foreach ($feedbacks as $key => $value)
                    <div class="col-lg-4 col-md-6">
                        <div class="testimonial-card-v2">
                            <div class="stars">
                                @for ($i = 0; $i < $value['rating']; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                            </div>
                            <p>"{{ $value['feedback'] }}"</p>
                            <div class="testimonial-user">
                                <div class="about-testimonial-initials">{{ substr($value['name'], 0, 2) }}</div>
                                <div>
                                    <h5>{{ $value['name'] }}</h5>
                                    <span>{{ $value['area_name'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-v2" data-anim="fade-up">
        <div class="container">
            <div class="gallery-cta">
                <h2>Ready for a Spotless Home? Book Today!</h2>
                <a href="#EditModel" data-bs-toggle="modal" class="btn-white">Secure My Spot</a>
            </div>
        </div>
    </section>

    <div class="modal fade" id="videoModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0 bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    <video controls width="100%" height="500px" poster="" id="theVideo">
                        <source src="" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('pagescript')
    <script>

        $(document).on('click', '.video', function () {
            let videoSRC = $(this).data("video");
            let videoPoster = $(this).data("image");

            $('#videoModal source').attr('src', videoSRC);
            $('#videoModal video').attr('poster', videoPoster);
            $('#videoModal video')[0].load();
        });

        $('#videoModal').on('hidden.bs.modal', function () {
            let video = document.getElementById("theVideo");
            video.pause();
            video.currentTime = 0;
        });

        // ── Filter nav scroll (arrow buttons) ─────────────────────────────
        function scrollFilter(value) {
            const container = document.getElementById('filterNav');
            container.scrollBy({ left: value, behavior: 'smooth' });
        }

        // ── Filter nav mouse wheel scroll ──────────────────────────────────
        (function () {
            const filterNav = document.getElementById('filterNav');
            const filterWrapper = filterNav ? filterNav.closest('.filter-wrapper') : null;
            if (!filterNav || !filterWrapper) return;

            filterWrapper.addEventListener('wheel', function (e) {
                const scrollingVertically = Math.abs(e.deltaY) > Math.abs(e.deltaX);
                if (!scrollingVertically) return;

                e.preventDefault();
                e.stopPropagation();
                filterNav.scrollBy({ left: e.deltaY, behavior: 'smooth' });

            }, { passive: false });
        })();

        // ── Slider arrow buttons ───────────────────────────────────────────
        function scrollSlider(sliderClass, direction) {
            const slider = $('.' + sliderClass + '.services-row:visible')[0];
            if (!slider) return;

            const card = slider.querySelector('.gallery-card, .video-card');
            if (!card) return;

            const gap = parseInt(window.getComputedStyle(slider).gap) || 0;
            const scrollAmount = card.offsetWidth + gap;

            slider.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
        }

        // ── Wheel fix — attach/reattach on each visible slider ────────────
        const wheelListeners = new WeakMap();

        function attachSliderWheel(slider) {
            if (!slider || wheelListeners.has(slider)) return;

            let overflowAccumulator = 0;
            let handoffFrame = null;

            function atStart() { return slider.scrollLeft <= 0; }
            function atEnd() { return slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 1; }

            function smoothPageScroll(delta) {
                cancelAnimationFrame(handoffFrame);
                let remaining = delta * 6;
                const FRICTION = 0.88;
                function step() {
                    if (Math.abs(remaining) < 0.5) return;
                    window.scrollBy({ top: remaining * (1 - FRICTION), behavior: 'instant' });
                    remaining *= FRICTION;
                    handoffFrame = requestAnimationFrame(step);
                }
                handoffFrame = requestAnimationFrame(step);
            }

            slider.addEventListener('mouseleave', () => {
                overflowAccumulator = 0;
                cancelAnimationFrame(handoffFrame);
            });

            const handler = function (e) {
                const scrollingVertically = Math.abs(e.deltaY) > Math.abs(e.deltaX);
                if (!scrollingVertically) return;

                const hitEnd = e.deltaY > 0 && atEnd();
                const hitStart = e.deltaY < 0 && atStart();

                if (hitEnd || hitStart) {
                    e.preventDefault();
                    e.stopPropagation();
                    overflowAccumulator += e.deltaY;
                    if (Math.abs(overflowAccumulator) > 40) {
                        smoothPageScroll(overflowAccumulator);
                        overflowAccumulator = 0;
                    }
                    return;
                }

                e.preventDefault();
                e.stopPropagation();
                overflowAccumulator = 0;
                cancelAnimationFrame(handoffFrame);
                slider.scrollBy({ left: e.deltaY, behavior: 'auto' });
            };

            slider.addEventListener('wheel', handler, { passive: false, capture: false });
            wheelListeners.set(slider, handler);
        }

        function attachAllVisibleSliderWheels() {
            document.querySelectorAll('.gallerySlider.services-row, .videoSlider.services-row').forEach(slider => {
                if (slider.style.display !== 'none') {
                    attachSliderWheel(slider);
                }
            });
        }

        // ── Intersection observers ─────────────────────────────────────────
        let pageObserver = null;
        let sliderObserver = null;

        function observePageElements() {
            if (pageObserver) pageObserver.disconnect();

            const keyframeEls = document.querySelectorAll(
                '.gallery-page [data-anim], .stats-banner-v2[data-anim], .specialized-services[data-anim], .testimonials-v2[data-anim], .cta-v2[data-anim]'
            );

            pageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        el.classList.remove('anim-visible');
                        requestAnimationFrame(() => {
                            void el.offsetWidth;
                            el.classList.add('anim-visible');
                        });
                    } else {
                        entry.target.classList.remove('anim-visible');
                    }
                });
            }, { threshold: 0.15 });

            keyframeEls.forEach(el => pageObserver.observe(el));

            const triggerEls = document.querySelectorAll('.anim-trigger:not(.gallery-card):not(.video-card)');

            const triggerObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('anim-visible');
                    } else {
                        entry.target.classList.remove('anim-visible');
                    }
                });
            }, { threshold: 0.15 });

            triggerEls.forEach(el => triggerObserver.observe(el));
        }

        function observeSliderCards() {
            if (sliderObserver) sliderObserver.disconnect();

            const cards = document.querySelectorAll(
                '.gallerySlider.services-row:not([style*="display:none"]) .gallery-card, ' +
                '.gallerySlider.services-row:not([style*="display: none"]) .gallery-card, ' +
                '.videoSlider.services-row:not([style*="display:none"]) .video-card, ' +
                '.videoSlider.services-row:not([style*="display: none"]) .video-card'
            );

            sliderObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('anim-visible');
                    } else {
                        entry.target.classList.remove('anim-visible');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -20px 0px' });

            cards.forEach(el => {
                el.classList.remove('anim-visible');
                sliderObserver.observe(el);
            });
        }

        // ── Filter tab switch ──────────────────────────────────────────────
        $(document).ready(function () {
            $('.filter-a').click(function (e) {
                e.preventDefault();

                const serviceId = $(this).attr('id');

                $('.filter-a').removeClass('active');
                $(this).addClass('active');

                $('.services-row').fadeOut(200);

                setTimeout(function () {
                    $('.services-row[data-id="' + serviceId + '"]').fadeIn(300, function () {
                        attachAllVisibleSliderWheels();
                        observeSliderCards();
                    });
                }, 200);
            });
        });

        // ── Init on load ───────────────────────────────────────────────────
        document.addEventListener('DOMContentLoaded', function () {
            observePageElements();
            observeSliderCards();
            attachAllVisibleSliderWheels();
        });

    </script>
@endsection