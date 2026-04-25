<footer class="site-footer" id="contact">
    <div class="container-fluid">
        <div class="footer-shell">
            <div class="footer-main">
                <div class="footer-brand">
                    <a href="{{ route('web.home') }}" class="footer-brand-wrap">
                        <span class="logo footer-logo">
                            <img src="{{ asset('assets/imgs/no_img.png') }}" alt="{{ App_Name() }} logo">
                        </span>
                        <span class="brand-copy footer-brand-copy">
                            <strong>{{ App_Name() }}</strong>
                            <small>Premium fabric and upholstery specialists</small>
                        </span>
                    </a>
                    <p>
                        Reliable cleaning for carpets, sofas, mattresses, and upholstery with careful service,
                        fast response times, and a professional finish for homes and offices.
                    </p>
                </div>

                <div class="footer-links-group">
                    <h3>Quick Links</h3>
                    <div class="footer-link-list">
                        <a href="{{ route('web.home') }}">Home</a>
                        <a href="{{ route('web.about') }}">About Us</a>
                        <a href="#services">Services</a>
                        <a href="#hero-enquiry">Book Now</a>
                    </div>
                </div>

                <div class="footer-links-group">
                    <h3>Services</h3>
                    <div class="footer-link-list">
                        <span>Carpet Cleaning</span>
                        <span>Sofa Cleaning</span>
                        <span>Mattress Cleaning</span>
                        <span>Upholstery Care</span>
                    </div>
                </div>

                <div class="footer-contact">
                    <h3>Contact</h3>
                    <div class="footer-contact-list">
                        <a href="tel:675676576576765">675676576576765</a>
                        <a href="mailto:info@cleancare.com">info@cleancare.com</a>
                        <p>Available for residential and commercial bookings throughout Melbourne.</p>
                    </div>
                    <a href="#hero-enquiry" class="quote-btn footer-cta">Request A Quote</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ App_Name() }}. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
