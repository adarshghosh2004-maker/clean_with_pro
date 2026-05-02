@extends('web.layout.web-layout')

@section('title', 'Specials – CleanCare')

@section('content')

    {{-- ═══════════════════════════════════════
    HERO SECTION
    ════════════════════════════════════════ --}}
    <section class="specials-hero">
        <div class="specials-hero-overlay"></div>
        <div class="specials-hero-content">
            <div class="badge-special">
                <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
                BEST VALUE SPECIALS
            </div>
            <h1>Pristine Results.<br><span class="text-highlight">Exclusive Rates.</span></h1>
            <p>Experience Melbourne's premier cleaning standard with our curated seasonal specials. Limited time offers for
                homeowners who demand excellence.</p>
            <div class="specials-hero-buttons">
                <a href="#" class="btn-book-special">BOOK YOUR SPECIAL</a>
                <a href="#" class="btn-view-services">VIEW ALL SERVICES</a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════
    LIMITED TIME OFFERS
    ════════════════════════════════════════ --}}
    <section class="offers-section">
        <div class="offers-header">
            <h2>🔥Specials Offers🔥</h2>
            <span class="offers-underline"></span>
        </div>

        <div class="offers-grid">
            {{-- Card 1 --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-label">STARTS FROM</span>
                        <span class="price-amount">$179</span>
                    </div>
                </div>
                <h3>3-Hour Domestic Cleaning Special</h3>
                <p>Give your home the refresh it deserves with our domestic cleaning.</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        General area cleaning
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Surface wipe-down
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Kitchen cleaning
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Bathroom cleaning
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Carpet vacuuming & hard floor mopping
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Window sills cleaned
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Stove top cleaning
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Dusting throughout
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">SELECT OFFER</a>
            </div>

            {{-- Card 2 --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 10h16v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10z"></path>
                            <path d="M8 10V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4"></path>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-label">FLASH DEAL</span>
                        <span class="price-amount">$149</span>
                    </div>
                </div>
                <h3>Deep Bath Clean</h3>
                <p>Transform your bathroom into a sparkling sanctuary without lifting a finger! 🧼🚿</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Full Shower Scrub (Tiles & Glass Screens)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Shower Grout Treatment (Lift that dirt!)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Vanity & Cupboards (Inside & Out)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Toilet Sanitization
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Mirrors, Taps & Sinks polished to a shine
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">SELECT OFFER</a>
            </div>

            {{-- Card 3 --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-label">LIMITED</span>
                        <span class="price-amount">$149</span>
                    </div>
                </div>
                <h3>KITCHEN DEEP CLEAN SPECIAL</h3>
                <p>Is your kitchen feeling a little greasy? Let us do the dirty work!</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Inside & Out Cupboards (we get every corner!)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Standard Oven Deep Clean
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Gas Stovetop & Rangehood (degreased & polished)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Benchtops & Splashbacks
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Sinks & Taps scrubbed to a shine
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">SELECT OFFER</a>
            </div>

            {{-- Card 4 --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <rect x="9" y="9" width="6" height="6"></rect>
                            <line x1="9" y1="1" x2="9" y2="4"></line>
                            <line x1="15" y1="1" x2="15" y2="4"></line>
                            <line x1="9" y1="20" x2="9" y2="23"></line>
                            <line x1="15" y1="20" x2="15" y2="23"></line>
                            <line x1="20" y1="9" x2="23" y2="9"></line>
                            <line x1="20" y1="14" x2="23" y2="14"></line>
                            <line x1="1" y1="9" x2="4" y2="9"></line>
                            <line x1="1" y1="14" x2="4" y2="14"></line>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-label">QUICK FIX</span>
                        <span class="price-amount">$90</span>
                    </div>
                </div>
                <h3>OVEN SPECIAL + FREE RANGEHOOD CLEAN!</h3>
                <p>Professional deep scrub that restores your appliances to showroom condition.</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Full Oven Scrub (Inside & Out)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        All Trays & Racks included
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Oven Glass polished
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        BONUS: Rangehood & Filters degreased for FREE!
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">SELECT OFFER</a>
            </div>

            {{-- Card 5 (Highlighted) --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-amount">$90</span>
                    </div>
                </div>
                <h3>CARPET STEAM CLEANING SPECIAL</h3>
                <p>Don't live with dirty carpets—get that "new home" feeling today! 🌬️💎</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Deep Steam Clean for up to 3 Bedrooms
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Tough Stain pre-treatment
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Dust & Allergen removal
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Fast Drying & Fresh Scent
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">BOOK BEST DEAL</a>
            </div>

            {{-- Card 6 --}}
            <div class="offer-card">
                <div class="offer-card-top">
                    <div class="offer-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="8" cy="12" r="5"></circle>
                            <circle cx="16" cy="12" r="5"></circle>
                        </svg>
                    </div>
                    <div class="offer-price-info">
                        <span class="price-label">SUPER SAVER</span>
                        <span class="price-amount">$210</span>
                    </div>
                </div>
                <h3> Oven + Bathroom Deep Clean Special</h3>
                <p>Bring back the shine to your home with our Oven & Bathroom Cleaning package.</p>
                <ul class="sp2-card-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Full bathroom deep clean – showers, mirrors, bathtub & toilet thoroughly scrubbed and sanitised
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Removal of grime, soap scum & buildup
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Standard oven deep cleaning – degreasing and restoring your oven to a fresh, clean finish
                    </li>
                </ul>
                <a href="#" class="btn-select-offer">SELECT OFFER</a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════
    FEATURES / GUARANTEE
    ════════════════════════════════════════ --}}
    <section class="features-section">
        <div class="features-grid">

            <div class="feature-item-alt">
                <div class="feature-icon-alt">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                </div>
                <h3>Fully Insured</h3>
                <p>$20M Public Liability coverage for total peace of mind.</p>
            </div>

            <div class="feature-item-alt">
                <div class="feature-icon-alt">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10z"></path>
                        <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                    </svg>
                </div>
                <h3>Eco-Certified</h3>
                <p>Non-toxic, family and pet-friendly cleaning products.</p>
            </div>

            <div class="feature-item-alt">
                <div class="feature-icon-alt">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                </div>
                <h3>Expert Team</h3>
                <p>Every cleaner is police-checked and extensively trained.</p>
            </div>

            <div class="feature-item-alt">
                <div class="feature-icon-alt">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                        </path>
                    </svg>
                </div>
                <h3>Satisfaction</h3>
                <p>100% money-back guarantee if you aren't delighted.</p>
            </div>

        </div>
    </section>

    {{-- ═══════════════════════════════════════
    CTA SECTION
    ════════════════════════════════════════ --}}
    <section class="cta-section">
        <div class="cta-box-alt">
            <div class="cta-content">
                <h2>Ready for a spotless home?</h2>
                <p>Join over 2,500+ satisfied Melbourne residents. Book your professional clean in under 60 seconds.</p>
            </div>
            <div class="cta-action">
                <a href="#" class="btn-book-online">BOOK ONLINE NOW</a>
            </div>
        </div>
    </section>

@endsection