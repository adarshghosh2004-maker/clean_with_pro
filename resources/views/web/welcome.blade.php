@extends('web.layout.web-layout')

@section('content')

  <!-- Section 3: Hero Slider -->
  <section class="hero-slider">
    <div id="heroSlider">
    <!-- Slide 1 -->
    @foreach ($services as $key => $value)
    <div class="slide-item {{ $key == 0 ? "active" : "" }}">
      <img alt="Modern luxury living room" class="w-100 h-100 object-fit-cover position-absolute"
      src="{{ $value['banner_img'] }}" />
      <div class="slide-overlay"></div>
      <div class="container-custom position-relative px-4 px-md-5 z-2">
      <div style="max-width: 700px;">
      <h1 class="display-3 fw-extrabold text-white mb-4">
      <span class="text-secondary-fixed">{{ $value['title'] }}</span>
      </h1>
      <p class="fs-5 text-white opacity-75 mb-5 lh-lg">
      {{ String_Cut($value['short_title'], 70) }}
      </p>
      <div class="d-flex flex-column flex-sm-row gap-3">
      <button class="btn btn-secondary py-3 px-5 d-flex align-items-center justify-content-center gap-2">
        Book Now <span class="material-symbols-outlined">arrow_forward</span>
      </button>
      <button class="btn btn-outline-white py-3 px-5">Our Services</button>
      </div>
      </div>
      </div>
    </div>
    @endforeach
    </div>

    <div class="position-absolute bottom-0 end-0 mb-5 me-5 d-none d-md-flex gap-3 z-3">
    <button class="slider-arrow" id="prevBtn">
      <span class="material-symbols-outlined"></span>
    </button>
    <button class="slider-arrow" id="nextBtn">
      <span class="material-symbols-outlined"></span>
    </button>
    </div>
  </section>


  <!-- 4. ABOUT / IMAGE + TEXT SECTION -->
  <section class="section-padding bg-light-gray">
    <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6" data-aos="fade-right">
      <div class="about-images-grid position-relative">
        <img src="https://placehold.co/600x400/004b87/FFFFFF?text=Main+Cleaning" class="about-img-main shadow"
        alt="Cleaning Staff">
        <img src="https://placehold.co/300x200/00b050/FFFFFF?text=Equipment" class="about-img-sub shadow"
        alt="Equipment">
        <img src="https://placehold.co/300x200/ffffff/004b87?text=Clean+Office" class="about-img-sub shadow"
        alt="Clean Office">

        <!-- Floating Badge -->
        <div class="position-absolute bg-primary-blue text-white p-3 rounded shadow text-center"
        style="bottom: -20px; right: -20px;">
        <h3 class="mb-0 fw-bold">15+</h3>
        <p class="small mb-0">Years Experience</p>
        </div>
      </div>
      </div>
      <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
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
      <a href="#" class="btn btn-outline-primary py-2 px-4 rounded-pill">Read More About Us</a>
      </div>
    </div>
    </div>
  </section>


  <!-- Section 7: How It Works -->
  <section class="py-5 my-5 container-custom px-4 text-center">
    <h2 class="display-5 fw-extrabold text-primary mb-4">A Seamless Experience</h2>
    <p class="text-on-surface-variant mx-auto mb-5" style="max-width: 500px;">From booking to the final inspection,
    we’ve refined our process for your convenience.</p>
    <div class="row g-4 mt-5">
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">1</div>
      <h4 class="fw-bold text-primary fs-5 mb-2">Easy Booking</h4>
      <p class="small text-on-surface-variant">Get an instant quote online or via a quick phone call.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">2</div>
      <h4 class="fw-bold text-primary fs-5 mb-2">Inspection</h4>
      <p class="small text-on-surface-variant">Our experts analyze fabric type and stain levels before starting.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">3</div>
      <h4 class="fw-bold text-primary fs-5 mb-2">Deep Clean</h4>
      <p class="small text-on-surface-variant">Precision treatment using professional-grade machinery.</p>
    </div>
    <div class="col-md-3">
      <div
      class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center fs-3 fw-black mx-auto mb-4"
      style="width: 64px; height: 64px;">4</div>
      <h4 class="fw-bold text-primary fs-5 mb-2">Fresh Finish</h4>
      <p class="small text-on-surface-variant">Final grooming and inspection to ensure the pristine standard.</p>
    </div>
    </div>
  </section>

  <!-- 5. SERVICES SHOWCASE (INTERACTIVE) -->
  <section class="section-padding services-showcase">
    <div class="container">
    <div class="text-center mb-5" data-aos="fade-up">
      <p class="text-secondary-green fw-bold text-uppercase mb-2">Our Services</p>
      <h2 class="section-title">Tailored Solutions for Every Need</h2>
    </div>
    <div class="row align-items-center g-5">
      <div class="col-lg-5" data-aos="fade-right">
      <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist"
        aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-commercial-tab" data-bs-toggle="pill"
        data-bs-target="#v-pills-commercial" type="button" role="tab">Commercial Cleaning</button>
        <button class="nav-link" id="v-pills-toilet-tab" data-bs-toggle="pill" data-bs-target="#v-pills-toilet"
        type="button" role="tab">Daily Basic Toilet Wash</button>
        <button class="nav-link" id="v-pills-post-tab" data-bs-toggle="pill" data-bs-target="#v-pills-post"
        type="button" role="tab">Post Construction Cleaning</button>
        <button class="nav-link" id="v-pills-window-tab" data-bs-toggle="pill" data-bs-target="#v-pills-window"
        type="button" role="tab">Window & Facade Cleaning</button>
      </div>
      </div>
      <div class="col-lg-7" data-aos="fade-left">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active position-relative" id="v-pills-commercial" role="tabpanel">
        <img src="https://placehold.co/800x500/003662/FFFFFF?text=Corporate+Headquarters"
          class="showcase-img shadow" alt="Commercial">
        <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-50 text-white"
          style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
          <h4>Corporate Headquarters</h4>
          <p class="mb-0">Daily upkeep programs for large enterprise environments.</p>
        </div>
        </div>
        <div class="tab-pane fade position-relative" id="v-pills-toilet" role="tabpanel">
        <img src="https://placehold.co/800x500/00b050/FFFFFF?text=Washroom+Hygiene" class="showcase-img shadow"
          alt="Toilet">
        <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-50 text-white"
          style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
          <h4>Washroom Hygiene</h4>
          <p class="mb-0">Deep sanitization and odor control for public restrooms.</p>
        </div>
        </div>
        <div class="tab-pane fade position-relative" id="v-pills-post" role="tabpanel">
        <img src="https://placehold.co/800x500/f8f9fa/333333?text=Post+Construction" class="showcase-img shadow"
          alt="Post Construction">
        <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-50 text-white"
          style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
          <h4>Site Clearance</h4>
          <p class="mb-0">Removal of dust, debris, and marks after renovation.</p>
        </div>
        </div>
        <div class="tab-pane fade position-relative" id="v-pills-window" role="tabpanel">
        <img src="https://placehold.co/800x500/004b87/FFFFFF?text=Facade+Cleaning" class="showcase-img shadow"
          alt="Window Cleaning">
        <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-dark bg-opacity-50 text-white"
          style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
          <h4>High-Rise Windows</h4>
          <p class="mb-0">Streak-free results for exterior glass and facades.</p>
        </div>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>

  <!-- 6. INDUSTRIES / AREAS SERVED -->
  <section class="section-padding bg-white">
    <div class="container text-center">
    <h2 class="section-title" data-aos="fade-up">Industries <span>We Serve</span></h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">Providing specialized cleaning protocols for
      diverse sectors.</p>

    <div class="row justify-content-center g-4">
      <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="100">
      <div class="industry-card">
        <i class="bi bi-shop industry-icon"></i>
        <h6 class="fw-bold mb-0">Retail</h6>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="200">
      <div class="industry-card">
        <i class="bi bi-hospital industry-icon"></i>
        <h6 class="fw-bold mb-0">Medical</h6>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="300">
      <div class="industry-card">
        <i class="bi bi-building industry-icon"></i>
        <h6 class="fw-bold mb-0">Corporate</h6>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="400">
      <div class="industry-card">
        <i class="bi bi-gear industry-icon"></i>
        <h6 class="fw-bold mb-0">Industrial</h6>
      </div>
      </div>
      <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-delay="500">
      <div class="industry-card">
        <i class="bi bi-book industry-icon"></i>
        <h6 class="fw-bold mb-0">Education</h6>
      </div>
      </div>
    </div>
    </div>
  </section>

  <!-- 7. RECENT WORK (VIDEOS) -->
  <section class="section-padding bg-light-gray">
    <div class="container">
    <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
      <div>
      <h2 class="section-title mb-0">Recent <span>Success Stories</span></h2>
      </div>
      <a href="#" class="btn btn-outline-primary rounded-pill px-4">View All Gallery</a>
    </div>

    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
      <div class="video-card shadow-sm">
        <img src="https://placehold.co/600x400/004b87/FFFFFF?text=Corporate+HQ" alt="Video Thumb">
        <div class="play-btn"><i class="bi bi-play-fill"></i></div>
        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-50 text-white">
        <h6 class="mb-0 fw-bold">Corporate Office - Deep Clean</h6>
        </div>
      </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
      <div class="video-card shadow-sm">
        <img src="https://placehold.co/600x400/00b050/FFFFFF?text=Retail+Store" alt="Video Thumb">
        <div class="play-btn"><i class="bi bi-play-fill"></i></div>
        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-50 text-white">
        <h6 class="mb-0 fw-bold">Retail Store - Floor Polishing</h6>
        </div>
      </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
      <div class="video-card shadow-sm">
        <img src="https://placehold.co/600x400/f8f9fa/333333?text=Luxury+Villa" alt="Video Thumb">
        <div class="play-btn"><i class="bi bi-play-fill"></i></div>
        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-50 text-white">
        <h6 class="mb-0 fw-bold">Luxury Villa - Move-in Clean</h6>
        </div>
      </div>
      </div>
    </div>
    </div>
  </section>

  <!-- 10. FAQ SECTION -->
  <section class="section-padding bg-light-gray">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8" data-aos="fade-up">
      <div class="text-center mb-5">
        <h2 class="section-title">Know More About <span>Clean With Professionals</span></h2>
        <p class="text-muted">Frequently Asked Questions</p>
      </div>

      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
          Do your staff carry their own equipment?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted">
          Absolutely. Every team member comes fully equipped with industrial-grade tools and eco-friendly
          chemicals required for your specific service. No need to supply anything.
          </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
          How long does carpet cleaning take?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted">
          On average, it takes about 20-30 minutes per room. Drying times vary between 2-6 hours depending on
          airflow and humidity.
          </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
          Are your cleaning products safe for pets and children?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted">
          Yes, we prioritize health and safety. We use eco-friendly, non-toxic products that are entirely safe
          for both children and pets once dry.
          </div>
        </div>
        </div>
        <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
          Do I need to be present during the cleaning?
          </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-muted">
          No, it is not necessary. Many of our clients provide us with a key or access code. All our staff are
          thoroughly background-checked for your peace of mind.
          </div>
        </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="#" class="btn btn-outline-primary rounded-pill px-4">Read More FAQs</a>
      </div>
      </div>
    </div>
    </div>
  </section>

  <!-- 12. GET A QUOTE SECTION -->
  <section class="quote-form-section" id="quote" style="margin-top: 80px;">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10" data-aos="fade-up">
      <div class="quote-card border border-light">
        <div class="text-center mb-4">
        <h3 class="fw-bold text-primary-blue">Get Your Free Quote</h3>
        <p class="text-muted">No hidden costs. Transparent pricing. We work all 7 days 8:00 AM to 7:00 PM.</p>
        </div>

        <form>
        <div class="row g-3">
          <div class="col-md-6">
          <label class="form-label small fw-semibold text-muted">Full Name</label>
          <input type="text" class="form-control bg-light border-0" placeholder="John Doe" required>
          </div>
          <div class="col-md-6">
          <label class="form-label small fw-semibold text-muted">Mobile Number</label>
          <input type="tel" class="form-control bg-light border-0" placeholder="(555) 123-4567" required>
          </div>
          <div class="col-md-6">
          <label class="form-label small fw-semibold text-muted">Email Address</label>
          <input type="email" class="form-control bg-light border-0" placeholder="john@example.com" required>
          </div>
          <div class="col-md-6">
          <label class="form-label small fw-semibold text-muted">Suburb / Area</label>
          <input type="text" class="form-control bg-light border-0" placeholder="e.g. Richmond, VIC" required>
          </div>
          <div class="col-12">
          <label class="form-label small fw-semibold text-muted">How can we help?</label>
          <textarea class="form-control bg-light border-0" rows="3"
            placeholder="Briefly describe your cleaning needs..."></textarea>
          </div>
          <div class="col-12 text-center mt-4">
          <button type="submit" class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">Send
            Request</button>
          </div>
        </div>
        </form>
      </div>
      </div>
    </div>
    </div>
  </section>
@endsection

@section('pagescript')

<script>
  // Hero Slider Logic (Unique to this page)
  let currentSlide = 0;
  const slides = document.querySelectorAll('.slide-item');
  const dots = document.querySelectorAll('.slider-dot');

  function showSlide(index) {
    if (slides.length === 0) return;
    slides.forEach((slide, i) => {
      slide.classList.remove('active');
      if (dots[i]) dots[i].classList.remove('active');
    });
    slides[index].classList.add('active');
    if (dots[index]) dots[index].classList.add('active');
    currentSlide = index;
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

  // Event Listeners
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');
  if (nextBtn) nextBtn.addEventListener('click', nextSlide);
  if (prevBtn) prevBtn.addEventListener('click', prevSlide);

  // Auto-play
  let slideInterval = setInterval(nextSlide, 6000);

  // Pause on hover
  const slider = document.querySelector('.hero-slider');
  if (slider) {
    slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
    slider.addEventListener('mouseleave', () => slideInterval = setInterval(nextSlide, 6000));
  }
</script>
@endsection