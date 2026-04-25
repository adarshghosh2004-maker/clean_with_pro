<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row g-4 justify-content-between">
            <div class="col-lg-3 col-md-6">
                <a class="navbar-brand text-white fs-3 mb-4 d-block" href="#">
                    <img src="<?php echo asset('assets/imgs/CWPss.PNG'); ?>" alt="Clean With Professionals" height="60">
                </a>
                <p class="small text-white-50 mb-4">Premium cleaning services tailored to your specific needs. Experience excellence and reliability.</p>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6">
                <h5>Useful Links</h5>
                <ul class="list-unstyled mt-4">
                    <li class="mb-2"><a href="<?php echo route('home'); ?>">Home</a></li>
                    <li class="mb-2"><a href="<?php echo route('about'); ?>">About Us</a></li>
                    <li class="mb-2"><a href="<?php echo route('specials'); ?>">Specials</a></li>
                    <li class="mb-2"><a href="<?php echo route('gallery'); ?>">Gallery</a></li>
                    <li class="mb-2"><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div class="col-lg-2 col-md-6">
                <h5>Our Services</h5>
                <ul class="list-unstyled mt-4">
                    <li class="mb-2"><a href="#">Commercial Cleaning</a></li>
                    <li class="mb-2"><a href="#">Residential Cleaning</a></li>
                    <li class="mb-2"><a href="#">Deep Sanitization</a></li>
                    <li class="mb-2"><a href="#">Carpet Cleaning</a></li>
                    <li class="mb-2"><a href="#">Window Cleaning</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <h5>Contact Details</h5>
                <ul class="list-unstyled mt-4">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-geo-alt-fill text-secondary-green me-3 mt-1"></i>
                        <span class="text-white-50 small">123 CleanPro Street, Suite 100<br>Melbourne, VIC 3000</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill text-secondary-green me-3"></i>
                        <span class="text-white-50 small">1-800-CLEAN-PRO</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-envelope-fill text-secondary-green me-3"></i>
                        <span class="text-white-50 small">info@cleanwithprofessionals.com</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="mt-5 mb-4 border-secondary">
        <div class="text-center text-white-50 small">
            &copy; 2026 Clean With Professionals. All rights reserved.
        </div>
    </div>
</footer>

<a href="https://wa.me/1234567890" class="floating-whatsapp" target="_blank" title="Chat on WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>

<button class="scroll-top" id="scrollTopBtn" title="Go to top">
    <i class="bi bi-arrow-up"></i>
</button>


<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });

    // Scroll to Top Functionality
    const scrollTopBtn = document.getElementById("scrollTopBtn");
    if (scrollTopBtn) {
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                scrollTopBtn.classList.add("visible");
            } else {
                scrollTopBtn.classList.remove("visible");
            }
        };

        scrollTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    }
</script>
