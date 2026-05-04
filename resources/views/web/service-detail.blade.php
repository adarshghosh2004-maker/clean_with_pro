@extends('web.layout.web-layout')

@section('content')

    <!-- Hero Section -->
    <section class="s2-hero" style="background-image: url('{{ $service['banner_img'] }}');">
        <div class="container">
            <span class="s2-badge">BEYOND CLEAN ON THE LEVEL</span>
            <h1>The Science of <span>Spotless</span><br>Living.</h1>
            <p>Hospital grade hygiene for your home's most significant filter. We remove 99.9% of allergens with
                technical precision.</p>
            <div class="s2-hero-btns">
                <a href="#" class="btn s2-btn-blue">BOOK CARPET REPORT</a>
                <a href="#" class="btn s2-btn-outline">view meticulous results</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="s2-features">
        <div class="container">
            <div class="s2-features-grid">
                <div class="s2-features-text">
                    <h2>Beyond Surface Clean: Your Home's Lungs.</h2>
                    <p>Carpets act as a giant air filter, trapping dust, pollen, and volatile organic compounds. Over
                        time,
                        these pollutants saturate the fibers, affecting your home's air quality and the longevity of
                        your
                        investment.</p>
                    <a href="#" class="s2-methodology-link">See Our Methodology</a>
                    <div class="s2-info-box">
                        <h4>Meticulous Attention</h4>
                        <p>Our process starts with a deep fiber analysis to ensure only safe, PH-balanced solutions are
                            used.</p>
                    </div>
                </div>
                <div class="s2-features-images">
                    <div class="s2-img-1" style="background-image: url('{{ $service['detail_img1'] }}');"></div>
                    <div class="s2-img-2" style="background-image: url('{{ $service['detail_img2'] }}');"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Before & After Section -->
    <section class="section">
        <div class="section-header">
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
                <div class="gallery-card">
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
    <section class="section">
        <div class="section-header">
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
                <div class="video-card">
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
    <section class="haq-hero">
        <div class="haq-content">
            <h1>Have Questions?</h1>
            <p class="haq-description">
                {{ $question['description'] ?? '' }}
            </p>

            <!-- Call Card -->
            <div class="contact-card">
                <div class="icon-box">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="card-info">
                    <h3>Call Our Specialists</h3>
                    <p>Monday — Friday, 9am — 6pm</p>
                    <a href="tel:+1800CLEANCARE" class="contact-value">+1 (800) CLEAN-CARE</a>
                </div>
            </div>

            <!-- Email Card -->
            <div class="contact-card">
                <div class="icon-box email">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="card-info">
                    <h3>Email Consultation</h3>
                    <p>Response within 2 hours</p>
                    <a href="mailto:concierge@cleancare.com" class="contact-value">concierge@cleancare.com</a>
                </div>
            </div>
        </div>

        <div class="haq-visual">
            <img src="{{ $question['img_1'] ?? '' }}" alt="Fabric Texture Background" class="main-img-bg">

            <div class="floating-card card-top">
                <img src="{{ $question['img_2'] ?? '' }}" alt="Cleaning Products">
            </div>

            <div class="floating-card card-bottom">
                <img src="{{ $question['img_3'] ?? '' }}" alt="Teal Sofa">
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

        function scrollSlider(sliderId, direction) {
            const slider = document.getElementById(sliderId);
            const card = slider.querySelector('.gallery-card, .video-card');
            const scrollAmount = card.offsetWidth + parseInt(window.getComputedStyle(slider).gap);

            slider.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
@endsection