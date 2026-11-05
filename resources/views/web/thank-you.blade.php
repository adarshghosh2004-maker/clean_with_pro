@extends('web.layout.web-layout')

@section('title', 'Thank You | Clean With Professionals')
@section('description', 'Thank you for requesting a quote with Clean With Professionals. Our team will get back to you shortly.')
@section('keywords', 'thank you, quote request received, clean with professionals')

@section('meta_robots')
    <meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
    <!-- ==========================================
                         THANK YOU HERO & CONFIRMATION SECTION
                     ========================================== -->
    <section class="thankyou-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9 col-12">
                    <div class="thankyou-card text-center" data-anim="fade-up">

                        <!-- Success Checkmark Icon -->
                        <div class="thankyou-icon-wrapper mx-auto">
                            <div class="thankyou-icon-inner">
                                <svg class="thankyou-check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" role="img"
                                    aria-label="Success checkmark">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            </div>
                        </div>

                        <!-- Badge -->
                        <span class="thankyou-badge">Quote Request Submitted</span>

                        <!-- Main Heading -->
                        <h1 class="thankyou-title">Thank You for Your Quote Request!</h1>

                        <!-- Primary Message -->
                        <p class="thankyou-message">
                            We have received your request successfully. Our team is currently reviewing your details and
                            will get back to you shortly with a tailored quote.
                        </p>

                        <!-- Information Highlights Box -->
                        <div class="thankyou-info-box">
                            <div class="row g-3 text-start">
                                <div class="col-md-6 col-12">
                                    <div class="thankyou-info-item">
                                        <div class="thankyou-info-icon">
                                            <i class="bi bi-clock-history" aria-hidden="true"></i>
                                        </div>
                                        <div>
                                            <h6 class="thankyou-info-heading">Quick Response</h6>
                                            <p class="thankyou-info-text">Our team usually responds within 1 hour during
                                                business hours.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="thankyou-info-item">
                                        <div class="thankyou-info-icon">
                                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                                        </div>
                                        <div>
                                            <h6 class="thankyou-info-heading">Need Urgent Service?</h6>
                                            <p class="thankyou-info-text">
                                                Call us directly at
                                                <a href="tel:{{ Setting_Data()['contact'] ?? '+61468460145' }}"
                                                    class="thankyou-phone-link">
                                                    {{ Setting_Data()['contact'] ?? '+61468460145' }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="thankyou-actions">
                            <a href="{{ route('home') }}" class="btn thankyou-btn-home">
                                <i class="bi bi-house-door-fill me-2" aria-hidden="true"></i>Return to Home
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pagescript')
    @if(!empty($isConversion) && $isConversion)
        <!-- Google Ads Conversion Event Trigger (Only executed on authentic quote submissions) -->
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { window.dataLayer.push(arguments); }
            gtag('event', 'conversion', {
                'send_to': 'AW-18095631245/IDW5CJvTyLccEI3X1bRD',
                'value': 1.0,
                'currency': 'AUD'
            });
        </script>
    @endif
@endsection