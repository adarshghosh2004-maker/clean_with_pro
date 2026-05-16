@extends('web.layout.web-layout')

@section('content')
    <div class="s2-page">

        <!-- Hero Section -->
        <section class="hero-section">
            <img src="{{ $service['banner_img'] }}" alt="{{ $service['title'] ?? '' }}" class="hero-img">
            <div class="container">
                  @php
      $middleWord = getMiddleWord($service['title']);
      @endphp
      <h1>
        {!! str_replace(
      $middleWord,
      '<span class="surface-container-lowest">' . $middleWord . '</span>',
      $service['title']
      ) !!}
      </h1>
                <p>{{ $service['short_title'] ?? ''}}</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#EditModel" data-bs-toggle="modal" data-id="{{ $service['id'] ?? '' }}"
                        class="btn btn-secondary px-4 py-3">BOOK NOW</a>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="s2-features" data-anim="fade-up">
            <div class="container">
                <div class="s2-features-grid">
                    <div class="s2-features-text anim-trigger">
                        <p class="eyebrow-label">About the Service</p>
                        <h2>More About {{ $service['title'] ?? '' }}</h2>
                        <p>{{ $service['description'] ?? '' }}</p>
                    </div>
                    <div class="s2-features-images">
                        <div class="s2-img-1 anim-trigger" style="background-image: url('{{ $service['detail_img1'] }}');">
                        </div>
                        <div class="s2-img-2 anim-trigger" style="background-image: url('{{ $service['detail_img2'] }}');">
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

            <div class="gallery-grid" id="gallerySlider">
                <!-- Card 1 -->
                @foreach ($gallery as $key => $value)
                    <div class="gallery-card anim-trigger anim-stagger-{{ ($key % 6) + 1 }}">
                        <div class="comparison-container">
                            <img src="{{ $value['before_img'] }}" alt="Victorian Velvet Before" class="comparison-img"
                                style="filter: contrast(0.8) sepia(0.3) brightness(0.8);">
                            <img src="{{ $value['after_img'] }}" alt="Victorian Velvet After" class="comparison-img">
                            <span class="label-before">BEFORE</span>
                            <span class="label-after">AFTER</span>
                        </div>
                    </div>
                @endforeach
            </div>
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

            <div class="video-grid" id="videoSlider">
                <!-- Video 1 -->
                @foreach ($videos as $key => $value)
                    <div class="video-card anim-trigger anim-stagger-{{ ($key % 6) + 1 }}">
                        <img src="{{ $value['image'] }}" alt="Heritage Silk" class="video-thumbnail">
                        <a class="play-btn-overlay video" data-bs-toggle="modal" data-bs-target="#videoModal"
                            data-video="{{ $value['video'] }}" data-image="{{ $value['image'] }}" title="Watch">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Questions Section -->
        <section class="section-padding bg-light-gray haq-hero">
            <div class="container haq-grid">
                <div class="haq-left anim-trigger anim-trigger-left">
                    <div class="haq-content">
                        <h1>Have <span class="haq-content-span">Questions?</span></h1>
                        <p class="haq-description">
                            {{ $question['description'] ?? '' }}
                        </p>

                        <!-- Call Card -->
                        <div class="contact-card anim-trigger">
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="card-info">
                                <h3>Call Our Specialists</h3>
                                <p>Monday — Friday, 9am — 6pm</p>
                                <a href="tel:{{ Setting_Data()['contact'] ?? '+61468460145' }}" class="contact-value">{{ Setting_Data()['contact'] ?? '+61468460145' }}</a>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="contact-card anim-trigger">
                            <div class="icon-box email">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="card-info">
                                <h3>Email Consultation</h3>
                                <p>Response within 2 hours</p>
                                <a href="https://mail.google.com/mail/?view=cm&to={{ Setting_Data()['email'] ?? 'info@cleanwithpro.com.au' }}" target="_blank" class="contact-value">{{ Setting_Data()['email'] ?? 'info@cleanwithpro.com.au' }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="haq-right anim-trigger anim-trigger-right">
                    <div class="haq-visual">
                        <img src="{{ $question['img_1'] ?? '' }}" alt="Fabric Texture Background" class="main-img-bg">

                        <div class="floating-card card-top">
                            <img src="{{ $question['img_2'] ?? '' }}" alt="Cleaning Products">
                        </div>

                        <div class="floating-card card-bottom">
                            <img src="{{ $question['img_3'] ?? '' }}" alt="Teal Sofa">
                        </div>
                    </div>
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

        function scrollSlider(sliderId, direction) {
            const slider = document.getElementById(sliderId);
            const card = slider.querySelector('.gallery-card, .video-card');
            const gap = parseInt(window.getComputedStyle(slider).gap) || 0;
            const scrollAmount = card.offsetWidth + gap;

            slider.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }

        (function () {

            // ── Smooth wheel handoff for each slider ───────────────────────
            function initSliderWheel(sliderId) {
                const slider = document.getElementById(sliderId);
                if (!slider) return;

                let overflowAccumulator = 0;
                let handoffFrame = null;

                function atStart() {
                    return slider.scrollLeft <= 0;
                }

                function atEnd() {
                    return slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 1;
                }

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

                slider.addEventListener('wheel', function (e) {
                    const scrollingVertically = Math.abs(e.deltaY) > Math.abs(e.deltaX);
                    if (!scrollingVertically) return;

                    const goingDown = e.deltaY > 0;
                    const goingUp   = e.deltaY < 0;
                    const hitEnd    = goingDown && atEnd();
                    const hitStart  = goingUp  && atStart();

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

                }, { passive: false, capture: false });
            }

            // Init both sliders
            initSliderWheel('gallerySlider');
            initSliderWheel('videoSlider');

            // ── Keyframe-based elements ([data-anim]) ─────────────────────
            function observeKeyframeElements() {
                const elements = document.querySelectorAll('.s2-page [data-anim]');

                const observer = new IntersectionObserver((entries) => {
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

                elements.forEach(el => observer.observe(el));
            }

            // ── Transition-based elements (.anim-trigger) ─────────────────
            function observeTransitionElements() {
                // All regular anim-trigger elements (not slider cards)
                const elements = document.querySelectorAll(
                    '.s2-page .anim-trigger:not([data-anim]):not(.gallery-card):not(.video-card)'
                );

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('anim-visible');
                        } else {
                            entry.target.classList.remove('anim-visible');
                        }
                    });
                }, { threshold: 0.15 });

                elements.forEach(el => observer.observe(el));
            }

            // ── Slider cards (.gallery-card, .video-card) ─────────────────
            // Observed separately with a lower threshold so they animate
            // as they scroll into view horizontally inside the slider
            function observeSliderCards() {
                const elements = document.querySelectorAll(
                    '.s2-page .gallery-card, .s2-page .video-card'
                );

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('anim-visible');
                        } else {
                            entry.target.classList.remove('anim-visible');
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -20px 0px'
                });

                elements.forEach(el => observer.observe(el));
            }

            document.addEventListener('DOMContentLoaded', function () {
                observeKeyframeElements();
                observeTransitionElements();
                observeSliderCards();
            });

        })();
    </script>
@endsection
