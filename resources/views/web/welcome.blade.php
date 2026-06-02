@extends('web.layout.web-layout')

@section('title', 'Clean With Professionals | Professional Cleaning Services in Melbourne')
@section('description', 'Clean With Professionals offers reliable and affordable cleaning services in Melbourne. Book same-day service now.')
@section('keywords', 'cleaning services, professional cleaners, Melbourne cleaning')

@section('preloads')
  @if(isset($services) && count($services) > 0)
    <link rel="preload" as="image" href="{{ $services[0]['banner_img'] }}" fetchpriority="high">
  @endif
@endsection

@section('content')

  <!-- Section 3: Hero Slider -->
  <section class="hero-slider">
    <div id="heroSlider">
    <!-- Slide 1 -->
    @foreach ($services as $key => $value)
      <div class="slide-item {{ $key == 0 ? "active" : "" }} hero-section">
      <img alt="Modern luxury living room" class="hero-img" src="{{ $value['banner_img'] }}" {!! $key == 0 ? 'fetchpriority="high"' : 'loading="lazy"' !!} />
      <div class="container">
      @php
      $middleWord = getMiddleWord($value['title']);
      @endphp

      <h1>
        {!! str_replace(
      $middleWord,
      '<span class="surface-container-lowest">' . $middleWord . '</span>',
      $value['title']
      ) !!}
      </h1>
      <p>
        {{ String_Cut($value['short_title'], 70) }}
      </p>
      <div class="d-flex justify-content-center gap-3">
        <a class="btn btn-secondary d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal"
        href="#EditModel" data-id="{{ $value['id'] ?? "" }}">
        Book Now <span class="material-symbols-outlined">arrow_forward</span>
        </a>
      </div>
      </div>
      </div>
    @endforeach
    </div>

    <div class="position-absolute bottom-0 end-0 mb-5 me-5 d-none d-md-flex gap-3 z-3">
    <button class="slider-arrow" id="prevBtn" data-label="Prev">
      <span class="material-symbols-outlined">West</span>
    </button>
    <button class="slider-arrow" id="nextBtn" data-label="Next">
      <span class="material-symbols-outlined">East</span>
    </button>
    </div>

    <!-- Mobile slider navigation -->
    <div class="slider-nav-mobile d-md-none">
    <button class="slider-arrow" id="prevBtnMobile" aria-label="Previous slide">
      <span class="material-symbols-outlined">West</span>
    </button>
    <button class="slider-arrow" id="nextBtnMobile" aria-label="Next slide">
      <span class="material-symbols-outlined">East</span>
    </button>
    </div>
  </section>


  <!-- 4. ABOUT / IMAGE + TEXT SECTION -->
  <section class="section-padding bg-light-gray" data-anim="fade-up">
    <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-anim="fade-right">
      <div class="about-images-grid position-relative">
        <img src="assets/imgs/CWP1.webp" class="about-img-main shadow" alt="Cleaning Staff" loading="lazy">
        <img src="assets/imgs/CWP2.webp" class="about-img-sub shadow" alt="Equipment" loading="lazy">
        <img src="assets/imgs/CWP3.webp" class="about-img-sub shadow" alt="Clean Office" loading="lazy">

        <!-- Floating Badge -->
        <div class="position-absolute bg-primary-blue text-white p-3 rounded shadow text-center"
        style="bottom: -20px; right: -20px;">
        <span class="h3 d-block mb-0 fw-bold">6+</span>
        <p class="small mb-0">Years Experience</p>
        </div>
      </div>
      </div>
      <div class="col-lg-6 ps-lg-5" data-anim="fade-left">
      <p class="text-secondary-green fw-bold text-uppercase mb-2">About Our Company</p>
      <h2 class="section-title">Why we are the <span>best cleaning service</span> in Melbourne</h2>
      <p class="text-muted mb-4">We believe a clean environment is the foundation of productivity and peace of mind.
        Our approach combines traditional meticulousness with modern technology.</p>
      <ul class="list-unstyled mb-4">
        <li class="mb-2"><i class="bi bi-check-circle-fill text-secondary-green me-2"></i> Fully Insured and Bonded
        Professionals</li>
        <li class="mb-2"><i class="bi bi-check-circle-fill text-secondary-green me-2"></i> Eco-Friendly and Safe
        Chemicals</li>
        <li class="mb-2"><i class="bi bi-check-circle-fill text-secondary-green me-2"></i> Customized Cleaning
        Schedules</li>
      </ul>
      <a href="{{ route('about') }}" class="btn btn-primary-blue py-2 px-4 rounded-pill">Read More About Us</a>
      </div>
    </div>
    </div>
  </section>


  <!-- Section 7: How It Works -->
  <section class="section-padding container-custom px-4 text-center" data-anim="fade-up">
    <h2 class="display-5 fw-extrabold text-primary mb-4">A Seamless Experience</h2>
    <p class="text-on-surface-variant mx-auto mb-5" style="max-width: 500px;">From booking to final inspection, we make
    moving out simple with a professional cleaning process designed to help you leave your property spotless and
    inspection-ready.</p>
    <div class="row g-4 mt-5">
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">1</div>
      <h3 class="fw-bold text-primary fs-5 mb-2">Easy Booking</h3>
      <p class="small text-on-surface-variant">Book your end of lease clean online or over the phone with a fast,
      hassle-free quote tailored to your property size and requirements.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">2</div>
      <h3 class="fw-bold text-primary fs-5 mb-2">Property Inspection</h3>
      <p class="small text-on-surface-variant">Our experienced team assesses every room, identifying high-traffic areas,
      stains, and agent checklist requirements before cleaning begins.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">3</div>
      <h3 class="fw-bold text-primary fs-5 mb-2">Deep End of Lease Clean</h3>
      <p class="small text-on-surface-variant">We thoroughly clean kitchens, bathrooms, floors, windows, and all living
      spaces using professional-grade equipment and products for a real estate standard finish.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">4</div>
      <h3 class="fw-bold text-primary fs-5 mb-2">Final Touch & Approval</h3>
      <p class="small text-on-surface-variant">Before we leave, we complete a detailed final inspection to ensure your
      property is fresh, spotless, and ready for handover.</p>
    </div>
    </div>
  </section>

  <!-- 5. SERVICES SHOWCASE (INTERACTIVE) -->
  <section class="section-padding services-showcase" data-anim="fade-up">
    <div class="container">

    <!-- Section Heading -->
    <div class="text-center mb-5" data-anim="fade-up">
      <p class="text-secondary-green fw-bold text-uppercase mb-2">
      Our Services
      </p>
      <h2 class="section-title">
      Tailored Solutions for Every Need
      </h2>
    </div>

    <div class="row align-items-center g-5">

      <!-- Left Side Tabs -->
      <div class="col-lg-5" data-anim="fade-right">

      <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
        aria-orientation="vertical">

        @foreach ($services->take(4) as $key => $value)

      <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="v-pills-tab-{{ $key }}" data-bs-toggle="pill"
      data-bs-target="#v-pills-content-{{ $key }}" type="button" role="tab"
      aria-controls="v-pills-content-{{ $key }}" aria-selected="{{ $key == 0 ? 'true' : 'false' }}"
      data-anim="fade-up" data-anim-delay="{{ ($key + 1) * 100 }}">

      {{ $value['title'] ?? '' }}

      </button>

      @endforeach

      </div>

      </div>

      <!-- Right Side Content -->
      <div class="col-lg-7" data-anim="fade-left">

      <div class="tab-content" id="v-pills-tabContent">

        @foreach ($services->take(4) as $key => $value)

      <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="v-pills-content-{{ $key }}"
      role="tabpanel" aria-labelledby="v-pills-tab-{{ $key }}">

      <div class="position-relative overflow-hidden rounded-4">

        <!-- Service Image -->
         <img src="{{ $value['banner_img'] }}" class="showcase-img shadow w-100"
        alt="{{ $value['title'] ?? 'Service Image' }}" loading="lazy">

        <!-- Overlay Content -->
        <div class="position-absolute bottom-0 start-0 w-100 p-4 text-white overlay">

        <h3 class="fw-bold mb-2">
        {{ $value['title'] ?? '' }}
        </h3>

        <p class="mb-0">
        {{ $value['description'] ?? '' }}
        </p>

        </div>

      </div>

      </div>

      @endforeach

      </div>

      </div>

    </div>

    </div>
  </section>

  <!-- 6. INDUSTRIES / AREAS SERVED -->
  <section class="section-padding bg-white" data-anim="fade-up">
    <div class="container text-center">
    <h2 class="section-title" data-anim="fade-up">Industries <span>We Serve</span></h2>
    <p class="text-muted mb-5" data-anim="fade-up" data-anim-delay="100">Providing specialized cleaning protocols for
      diverse sectors.</p>

    <div class="row justify-content-center g-4">
      <div class="col-6 col-md-4 col-lg-2" data-anim="zoom-in" data-anim-delay="100">
      <div class="industry-card">
        <i class="bi bi-shop industry-icon"></i>
        <div class="fw-bold mb-0">Retail</div>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-anim="zoom-in" data-anim-delay="200">
      <div class="industry-card">
        <i class="bi bi-hospital industry-icon"></i>
        <div class="fw-bold mb-0">Medical</div>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-anim="zoom-in" data-anim-delay="300">
      <div class="industry-card">
        <i class="bi bi-building industry-icon"></i>
        <div class="fw-bold mb-0">Corporate</div>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-anim="zoom-in" data-anim-delay="400">
      <div class="industry-card">
        <i class="bi bi-gear industry-icon"></i>
        <div class="fw-bold mb-0">Industrial</div>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-anim="zoom-in" data-anim-delay="500">
      <div class="industry-card">
        <i class="bi bi-book industry-icon"></i>
        <div class="fw-bold mb-0">Education</div>
      </div>
      </div>
    </div>
    </div>
  </section>

  <!-- 7. RECENT WORK (VIDEOS) -->
  <section class="section-padding bg-light-gray" data-anim="fade-up">
    <div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-5" data-anim="fade-up">
      <div>
      <h2 class="section-title mb-0">Recent <span>Success Stories</span></h2>
      </div>
      <a href="{{ route('gallery') }}" class="btn btn-primary-blue  rounded-pill px-4">View All</a>
    </div>

    <div class="row g-4">
      @foreach ($videos as $key => $value)
      <div class="col-md-4" data-anim="fade-up" data-anim-delay="100">
      <div class="video-card shadow-sm">
      <img src="{{ $value->image }}" alt="Video Thumb" loading="lazy">
      <a class="play-btn video" data-bs-toggle="modal" data-bs-target="#videoModal" data-video="{{ $value->video }}"
      data-image="{{ $value->image }}" title="Watch">
      <i class="bi bi-play-fill"></i>
      </a>
      <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-50 text-white">
      <h6 class="mb-0 fw-bold">{{ $value->service?->title ?? 'Video Title' }}</h6>
      </div>
      </div>
      </div>
    @endforeach
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

  <div class="marquee-section">

    <!-- Row 1 -->
    <div class="marquee-track">
    <div class="marquee-inner">
      @foreach ($feedbacks_reverse as $key => $value)
      <div class="pill">
      <span class="quote-text">"{{ String_Cut($value->feedback, 20) }}"</span>
      <span class="dot"></span>
      <span class="name">{{ $value->name }}</span>
      </div>
    @endforeach
    </div>
    </div>

    <!-- Row 2 -->
    <div class="marquee-track reverse">
    <div class="marquee-inner">
      @foreach ($feedbacks as $key => $value)
      <div class="pill">
      <span class="quote-text">"{{ String_Cut($value->feedback, 20) }}"</span>
      <span class="dot"></span>
      <span class="name">{{ $value->name }}</span>
      </div>
    @endforeach
    </div>
    </div>

  </div>
@endsection

@section('pagescript')

  <script>

    document.addEventListener('DOMContentLoaded', function () {
    const tracks = document.querySelectorAll('.marquee-track');

    tracks.forEach(function (track) {
      const inner = track.querySelector('.marquee-inner');
      const isReverse = track.classList.contains('reverse');
      let offset = 0;
      let animationId;

      function getSpeed() {
      return 0.5;
      }

      function step() {
      const pills = inner.querySelectorAll('.pill');
      if (pills.length === 0) return;

      if (!isReverse) {
        offset += getSpeed();

        const firstPill = pills[0];
        const firstPillWidth = firstPill.offsetWidth + 16;

        if (offset >= firstPillWidth) {
        offset -= firstPillWidth;
        inner.appendChild(firstPill);
        }

        inner.style.transform = `translateX(${-offset}px)`;
      } else {
        offset += getSpeed();

        const lastPill = pills[pills.length - 1];
        const lastPillWidth = lastPill.offsetWidth + 16;

        if (offset >= lastPillWidth) {
        offset -= lastPillWidth;
        inner.prepend(lastPill);
        }

        inner.style.transform = `translateX(${offset - lastPill.offsetWidth - 16}px)`;
      }

      animationId = requestAnimationFrame(step);
      }

      track.addEventListener('mouseenter', function () {
      cancelAnimationFrame(animationId);
      });

      track.addEventListener('mouseleave', function () {
      animationId = requestAnimationFrame(step);
      });

      animationId = requestAnimationFrame(step);
    });
    });

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

    // Hero Slider Logic (Unique to this page)
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.slider-dot');
    let isTransitioning = false;

    function showSlide(index) {
    if (slides.length === 0 || isTransitioning) return;

    const prevSlide = slides[currentSlide];
    const nextSlide = slides[index];

    if (prevSlide === nextSlide) return;

    isTransitioning = true;

    // Fade out current
    prevSlide.classList.remove('active');
    prevSlide.style.opacity = '0';

    // Fade in next
    nextSlide.style.opacity = '0';
    nextSlide.classList.add('active');

    // Animate in using nested requestAnimationFrame to avoid forced reflow
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        nextSlide.style.opacity = '1';
      });
    });

    // Update dots
    slides.forEach((_, i) => {
      if (dots[i]) dots[i].classList.remove('active');
    });
    if (dots[index]) dots[index].classList.add('active');

    currentSlide = index;

    // Reset transition lock
    setTimeout(() => {
      isTransitioning = false;
    }, 600);
    }

    function nextSlide() {
    let next = (currentSlide + 1) % slides.length;
    showSlide(next);
    }

    function prevSlide() {
    let prev = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(prev);
    }

    function goToSlide(index) {
    showSlide(index);
    }

    // Event Listeners - desktop
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    if (prevBtn) prevBtn.addEventListener('click', prevSlide);

    // Event Listeners - mobile
    const nextBtnMobile = document.getElementById('nextBtnMobile');
    const prevBtnMobile = document.getElementById('prevBtnMobile');
    if (nextBtnMobile) nextBtnMobile.addEventListener('click', nextSlide);
    if (prevBtnMobile) prevBtnMobile.addEventListener('click', prevSlide);

    // Touch swipe support
    let touchStartX = 0;
    let touchEndX = 0;
    const slider = document.querySelector('.hero-slider');

    if (slider) {
    slider.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    slider.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const diff = touchStartX - touchEndX;
      if (Math.abs(diff) > 50) {
      if (diff > 0) {
        nextSlide();
      } else {
        prevSlide();
      }
      }
    }, { passive: true });
    }

    // Auto-play
    let slideInterval = setInterval(nextSlide, 6000);

    // Pause on hover
    if (slider) {
    slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
    slider.addEventListener('mouseleave', () => slideInterval = setInterval(nextSlide, 6000));
    }
  </script>
@endsection