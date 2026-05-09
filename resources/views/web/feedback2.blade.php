@extends('web.layout.web-layout')
@section('content')

    <!-- Hero Section -->
    <section class="hero-section">
        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?q=80&w=2000&auto=format&fit=crop"
            alt="Luxury Interior" class="hero-img">
        <div class="container">
            <div class="hero-section-subtitle">Editorial Experience</div>
            <h1 class="hero-heading-v2">Your Voice, Our Standard.</h1>
        </div>
    </section>

    <!-- Feedback Form Card -->
    <div class="feedback-form-container-v2">
        <div class="feedback-card-v2" data-anim="fade-up" data-anim-delay="200">
            <span class="step-indicator-v2">Step 1 of 1</span>
            <h2 class="card-title-v2">Service Feedback</h2>

            <form action="#" method="POST" id="feedbackForm">
                @csrf
                <!-- Rating -->
                <div class="rating-section-v2">
                    <label class="rating-label-v2">How would you rate the experience?</label>
                    <div class="rating-stars-v2" id="starRating">
                        <button type="button" class="star-btn-v2 active" data-value="1">
                            <span class="material-symbols-outlined">star</span>
                        </button>
                        <button type="button" class="star-btn-v2 active" data-value="2">
                            <span class="material-symbols-outlined">star</span>
                        </button>
                        <button type="button" class="star-btn-v2 active" data-value="3">
                            <span class="material-symbols-outlined">star</span>
                        </button>
                        <button type="button" class="star-btn-v2 active" data-value="4">
                            <span class="material-symbols-outlined">star</span>
                        </button>
                        <button type="button" class="star-btn-v2 inactive" data-value="5">
                            <span class="material-symbols-outlined">star</span>
                        </button>
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="4">
                </div>

                <!-- Full Name -->
                <div class="form-group-v2">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="form-control-v2"
                        placeholder="Julianne Smith" required>
                </div>

                <!-- Select Service -->
                <div class="form-group-v2">
                    <label for="service">Select Service</label>
                    <div class="select-wrapper-v2">
                        <select id="service" name="service" class="form-control-v2 select-v2" required>
                            <option value="" disabled selected>Deep Cleaning Package</option>
                            <option value="basic">Basic Cleaning</option>
                            <option value="deep">Deep Cleaning</option>
                            <option value="move">Move-In/Out Cleaning</option>
                        </select>
                    </div>
                </div>

                <!-- Specific Details -->
                <div class="form-group-v2">
                    <label for="details">Specific Details</label>
                    <textarea id="details" name="details" class="form-control-v2 textarea-v2"
                        placeholder="Share your experience with us..."></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit-v2">
                    Submit Feedback
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Privacy Section -->
    <div class="privacy-section" data-anim="fade-up">
        <h3 class="privacy-title">Your privacy is our priority.</h3>
        <p class="privacy-text">
            Data submitted through this portal is used exclusively to refine our concierge standards.
            Your editorial contribution helps us maintain Atmospheric Clarity for all our clients.
        </p>
        <a href="#" class="btn-view-policy">View Policy</a>
    </div>


    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Star Rating Logic
        document.addEventListener('DOMContentLoaded', function () {
            const starButtons = document.querySelectorAll('.star-btn-v2');
            const ratingInput = document.getElementById('ratingInput');

            starButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const rating = this.getAttribute('data-value');
                    ratingInput.value = rating;

                    starButtons.forEach(btn => {
                        const btnValue = btn.getAttribute('data-value');
                        if (btnValue <= rating) {
                            btn.classList.add('active');
                            btn.classList.remove('inactive');
                        } else {
                            btn.classList.remove('active');
                            btn.classList.add('inactive');
                        }
                    });
                });
            });
        });
    </script>

@endsection
