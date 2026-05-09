@extends('web.layout.web-layout')
@section('content')

    <main class="feedback-container">
        <section class="hero-section" data-anim="fade-up">
            <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop"
                alt="Luxury Interior" class="hero-img">
            <div class="container">
                <div class="hero-section-subtitle">Service Quality</div>
            </div>
        </section>

        <div class="feedback-main-form-wrapper">
            <div class="feedback-content" data-anim="fade-up" data-anim-delay="100">
                <h1>Leave Your Feedback</h1>
                <p>Your insights help us maintain the editorial standards of pristine living.</p>
            </div>

            <form action="#" class="feedback-form" data-anim="fade-up" data-anim-delay="200">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="hello@pristine.com" required>
                </div>

                <div class="rating-box">
                    <label>Service Rating</label>
                    <div class="stars-container" id="starRating">
                        <button type="button" class="star-btn" data-value="1"><span
                                class="material-symbols-outlined">star</span></button>
                        <button type="button" class="star-btn" data-value="2"><span
                                class="material-symbols-outlined">star</span></button>
                        <button type="button" class="star-btn" data-value="3"><span
                                class="material-symbols-outlined">star</span></button>
                        <button type="button" class="star-btn" data-value="4"><span
                                class="material-symbols-outlined">star</span></button>
                        <button type="button" class="star-btn" data-value="5"><span
                                class="material-symbols-outlined">star</span></button>
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="4">
                </div>

                <div class="form-group">
                    <label for="experience">Your Experience</label>
                    <textarea id="experience" class="form-control" rows="5"
                        placeholder="Share the details of your service..."></textarea>
                </div>

                <button type="submit" class="btn-submit-review">Submit Review</button>

                <p class="terms-text">By submitting, you agree to our Editorial Terms of Service.</p>
            </form>
        </div>
    </main>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        document.addEventListener('DOMContentLoaded', function () {
            const starButtons = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('ratingInput');

            // Set initial rating (4 stars as in template)
            updateStars(ratingInput.value);

            starButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating;
                    updateStars(rating);
                });

                button.addEventListener('mouseover', function () {
                    const rating = this.getAttribute('data-value');
                    updateStars(rating);
                });

                button.addEventListener('mouseout', function () {
                    updateStars(ratingInput.value);
                });
            });

            function updateStars(rating) {
                starButtons.forEach(button => {
                    const value = button.getAttribute('data-value');
                    if (value <= rating) {
                        button.classList.add('active');
                        // Fill the star icon
                        button.querySelector('.material-symbols-outlined').style.fontVariationSettings = "'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48";
                    } else {
                        button.classList.remove('active');
                        // Unfill the star icon
                        button.querySelector('.material-symbols-outlined').style.fontVariationSettings = "'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 48"; // Keep fill but change color via class
                        // Actually, in the design, the inactive star is just a lighter color but still looks filled in some versions. 
                        // Let's stick to the color transition.
                    }
                });
            }
        });
    </script>
    
@endsection
