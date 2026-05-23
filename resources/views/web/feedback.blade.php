@extends('web.layout.web-layout')

@section('title', 'Customer Feedback - Clean With Professionals')
@section('description', 'Read customer feedback and reviews about our professional cleaning services in Melbourne.')
@section('keywords', 'customer feedback, cleaning reviews, Melbourne cleaners testimonials')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'feedback')
                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="hero-img">
            @endif
        @endforeach
        <div class="container">
            <div class="hero-section-subtitle">Editorial Experience</div>
            <h1 class="hero-heading-v2">Your Voice, Our Standard.</h1>
        </div>
    </section>

    <!-- Feedback Form Card -->
    <div class="feedback-form-container-v2">
        <div class="feedback-card-v2" data-anim="fade-up" data-anim-delay="200">
            <h2 class="card-title-v2">Service Feedback</h2>

            <form method="POST" id="feedback">
                @csrf
                <input type="hidden" name="id" value="">

                <div class="form-group-v2">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="name" class="form-control-v2" placeholder="Julianne Smith"
                        required>
                </div>

                <div class="form-group-v2">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control-v2"
                        placeholder="julianne.smith@example.com" required>
                </div>

                <div class="form-group-v2">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" id="mobile_number" name="mobile_no" class="form-control-v2" placeholder="679869756"
                        required>
                </div>

                <div class="form-group-v2">
                    <label for="area">Area</label>
                    <input type="text" id="area" name="area_name" class="form-control-v2" placeholder="Enter your area"
                        required>
                </div>

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

                <!-- Specific Details -->
                <div class="form-group-v2">
                    <label for="details">Your Experience</label>
                    <textarea id="details" name="feedback" class="form-control-v2 textarea-v2"
                        placeholder="Share your experience with us..."></textarea>
                </div>

                <!-- Submit Button -->
                <button type="button" onclick="save_feedback()" class="btn-submit-v2">
                    Submit Feedback
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </form>
        </div>
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

        function save_feedback() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#feedback")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.feedback.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, 'feedback', '');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dvloader").hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                showError();
            }
        }
    </script>

@endsection