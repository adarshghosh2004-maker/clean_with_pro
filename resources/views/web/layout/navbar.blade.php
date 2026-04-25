<header class="site-header">
    <div class="top-bannner">
        <div class="container-fluid top-banner-inner">
            <div class="top-banner-note">
                <span class="top-banner-pill">Same Day Service</span>
                <span>Trusted upholstery, sofa, carpet and mattress cleaning for homes and offices.</span>
            </div>
            <a href="tel:675676576576765" class="top-banner-call">24/7 Emergency Line: 675676576576765</a>
        </div>
    </div>
    <div class="container-fluid nav-container" id="site-navbar">
        <div class="nav-shell">
            <a href="/" class="brand-wrap">
                <span class="logo">
                    <img src="{{ asset('assets/imgs/no_img.png') }}" alt="Company logo">
                </span>
                <span class="brand-copy">
                    <strong>CleanCare</strong>
                    <small>Premium fabric and upholstery specialists</small>
                </span>
            </a>

            <nav class="d-none d-lg-block" aria-label="Primary">
                <ul class="nav-links">
                    <li><a href="{{route('web.home')}}">Home</a></li>
                    <li><a href="{{route('web.about')}}">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#hero-enquiry">Book Now</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </nav>

            <div class="nav-actions">
                <a href="#hero-enquiry" class="quote-btn d-none d-md-inline-flex">Get A Quote</a>
                <button
                    class="mobile-nav-toggle d-inline-flex d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mobileNav"
                    aria-controls="mobileNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <div class="collapse nav-mobile-panel d-lg-none" id="mobileNav">
                <div class="nav-mobile-inner">
                    <a href="/">Home</a>
                    <a href="#about">About Us</a>
                    <a href="#services">Services</a>
                    <a href="#hero-enquiry">Book Now</a>
                    <a href="#contact">Contact Us</a>
                    <a href="tel:675676576576765" class="quote-btn mobile-quote-btn">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</header>