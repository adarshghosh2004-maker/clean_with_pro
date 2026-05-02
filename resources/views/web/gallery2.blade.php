@extends('web.layout.web-layout')

@section('content')

{{-- ═══════════════════════════════════════
     HERO
════════════════════════════════════════ --}}
<section class="gallery-hero">
    <div class="hero-grid-overlay"></div>
    <div class="hero-content">
        <h1>Our Cleaning Work<br>Speaks for Itself</h1>
        <p>Witness the transformation of luxury spaces through our meticulous editorial cleaning process.</p>
    </div>
</section>

{{-- ═══════════════════════════════════════
     FILTER TABS
════════════════════════════════════════ --}}
<section class="gallery-filter">
    <div class="filter-container">
        <button class="filter-btn" data-filter="all">All</button>
        <button class="filter-btn active" data-filter="house-cleaning">House Cleaning</button>
        <button class="filter-btn" data-filter="end-of-lease">End of Lease</button>
        <button class="filter-btn" data-filter="office-cleaning">Office Cleaning</button>
        <button class="filter-btn" data-filter="deep-cleaning">Deep Cleaning</button>
    </div>
</section>

{{-- ═══════════════════════════════════════
     PHOTO GRID
════════════════════════════════════════ --}}
<section class="gallery-grid-section">
    <div class="gallery-grid">

        {{-- Large left image --}}
        <div class="grid-item large" data-category="house-cleaning">
            <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&q=80"
                 alt="Luxury Kitchen with Gold Faucet">
        </div>

        {{-- Top-right --}}
        <div class="grid-item" data-category="end-of-lease">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80"
                 alt="Modern Glass Office">
        </div>

        {{-- Mid-right top --}}
        <div class="grid-item" data-category="house-cleaning">
            <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80"
                 alt="Clean White Bedroom">
        </div>

        {{-- Bottom-right (spans 2 cols) --}}
        <div class="grid-item wide" data-category="office-cleaning">
            <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&q=80"
                 alt="Bright Conference Room">
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════
     THE TRANSFORMATION
════════════════════════════════════════ --}}
<section class="transformation-section">
    <div class="section-header">
        <h2>The Transformation</h2>
        <span class="section-underline"></span>
    </div>

    {{-- Before / After rows --}}
    <div class="transformation-grid">

        {{-- Luxury Bathroom --}}
        <div class="ba-card">
            <div class="ba-images">
                <div class="ba-item">
                    <span class="ba-badge before">BEFORE</span>
                    <img src="https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=400&q=80"
                         alt="Bathroom Before">
                </div>
                <div class="ba-item">
                    <span class="ba-badge after">AFTER</span>
                    <img src="https://images.unsplash.com/photo-1620626011761-996317702a0d?w=400&q=80"
                         alt="Bathroom After">
                </div>
            </div>
            <p class="ba-label">Luxury Bathroom Restoration</p>
        </div>

        {{-- Commercial Floor --}}
        <div class="ba-card">
            <div class="ba-images">
                <div class="ba-item">
                    <span class="ba-badge before">BEFORE</span>
                    <img src="https://images.unsplash.com/photo-1562663474-6cbb3eaa4d14?w=400&q=80"
                         alt="Floor Before">
                </div>
                <div class="ba-item">
                    <span class="ba-badge after">AFTER</span>
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=400&q=80"
                         alt="Floor After">
                </div>
            </div>
            <p class="ba-label">Commercial Floor Resurfacing</p>
        </div>

    </div>

    {{-- Video Thumbnails --}}
    <div class="video-grid">

        <div class="video-card">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80"
                 alt="Steam Deep Clean">
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
</section>

{{-- ═══════════════════════════════════════
     FEATURES / WHY CHOOSE US
════════════════════════════════════════ --}}
<section class="features-section">
    <div class="features-grid">

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
            </div>
            <h3>Extreme Detail</h3>
            <p>We don't just clean; we inspect every corner to ensure a museum-grade finish.</p>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
            </div>
            <h3>Pro Equipment</h3>
            <p>Utilizing the latest industrial-grade technology for deep, lasting results.</p>
        </div>

        <div class="feature-item">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <h3>Elite Cleaners</h3>
            <p>Background-checked, highly trained professionals you can trust in your home.</p>
        </div>

        <div class="feature-item">
            <div class="feature-icon eco">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"/>
                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
                </svg>
            </div>
            <h3>Eco-Products</h3>
            <p>Sustainable, non-toxic cleaning agents that are safe for pets and children.</p>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════
     TESTIMONIALS
════════════════════════════════════════ --}}
<section class="testimonials-section">
    <div class="testimonials-grid">

        <div class="testimonial-card">
            <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <p class="testimonial-text">"The attention to detail was beyond anything I've experienced. My kitchen marble literally glows like it's brand new."</p>
            <p class="testimonial-author">— Sarah J., Kensington</p>
        </div>

        <div class="testimonial-card">
            <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <p class="testimonial-text">"CleanCare handled our office relocation cleaning perfectly. The landlord was impressed and we got our full bond back."</p>
            <p class="testimonial-author">— Marcus T., CEO TechHub</p>
        </div>

        <div class="testimonial-card">
            <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <p class="testimonial-text">"The only company I trust with my pets and kids in the house. Their eco-friendly products smell amazing and work better than chemicals."</p>
            <p class="testimonial-author">— Elena R., Family Home</p>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════
     CTA
════════════════════════════════════════ --}}
<section class="cta-section">
    <div class="cta-box">
        <h2>Ready for a Pristine Space?</h2>
        <div class="cta-buttons">
            <a href="#" class="cta-btn cta-white">Book Now</a>
            <a href="#" class="cta-btn cta-outline">Get Free Quote</a>
        </div>
    </div>
</section>

@endsection
