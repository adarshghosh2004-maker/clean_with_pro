<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <!-- AOS CSS removed -->

    <link href="{{asset('assets/css/admin/toastr.min.css')}}" rel="stylesheet" type="text/css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/web/style.css'); ?>">
    <!-- Custom CSS -->
    <style>
        /* Loader */
        #dvloader {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.7;
            background-color: #fff;
            z-index: 9999;
            text-align: center;
        }

        #dvloader image {
            position: absolute;
            top: 100px;
            left: 240px;
            z-index: 100;
        }
    </style>
</head>

<body>
    <div style="display:none" id="dvloader"><img src="{{ asset('assets/imgs/loading.gif')}}" /></div>
    @include('web.layout.navbar')

    @yield('content')
    <div class="modal fade" id="EditModel" tabindex="-1" data-bs-backdrop="static" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <section class="quote-form-section m-0" id="quote" style="margin-top: 80px;" data-anim="fade-up">
                    <div class="container p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-12" data-anim="fade-up">
                                <div class="quote-card border border-light">
                                    <div class="text-center mb-4">
                                        <h3 class="fw-bold text-primary-blue">Get Your Free Quote</h3>
                                        <p class="text-muted">No hidden costs. Transparent pricing. We work all 7 days
                                            7:00 AM to 7:00 PM.</p>
                                    </div>

                                    <form id="quote_form" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Full Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control bg-light border-0"
                                                    placeholder="John Doe" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Mobile
                                                    Number<span class="text-danger">*</span></label>
                                                <input type="number" name="phone" class="form-control bg-light border-0"
                                                    placeholder="(555) 123-4567" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Email
                                                    Address<span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control bg-light border-0"
                                                    placeholder="john@example.com" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Suburb /
                                                    Area<span class="text-danger">*</span></label>
                                                <input type="text" name="suburb" class="form-control bg-light border-0"
                                                    placeholder="e.g. Richmond, VIC" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Date<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control bg-light border-0"
                                                    placeholder="dd/mm/yyyy" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">Time
                                                    (optional)</label>
                                                <select name="time" class="form-control bg-light border-0" required>
                                                    <option value="">Select a time</option>
                                                    <option value="07:00">7:00 AM</option>
                                                    <option value="08:00">8:00 AM</option>
                                                    <option value="09:00">9:00 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="11:00">11:00 AM</option>
                                                    <option value="12:00">12:00 PM</option>
                                                    <option value="13:00">1:00 PM</option>
                                                    <option value="14:00">2:00 PM</option>
                                                    <option value="15:00">3:00 PM</option>
                                                    <option value="16:00">4:00 PM</option>
                                                    <option value="17:00">5:00 PM</option>
                                                    <option value="18:00">6:00 PM</option>
                                                    <option value="19:00">7:00 PM</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label small fw-semibold text-muted">Service<span
                                                        class="text-danger">*</span></label>
                                                <select name="service_id" class="form-control bg-light border-0"
                                                    required>
                                                    <option value="">Select a service</option>
                                                    @foreach ($services as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label small fw-semibold text-muted">Your Message
                                                    (optional)</label>
                                                <textarea name="msg" class="form-control bg-light border-0" rows="3"
                                                    placeholder="Briefly describe your cleaning needs..."></textarea>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="row justify-content-end">
                                                    <div class="col-md-3">
                                                        <button type="button" onclick="save_quote(
                                                        )"
                                                            class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">Send</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" data-bs-dismiss="modal"
                                                            class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('web.layout.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/toastr.min.js')}}"></script>

    <script>

        $(document).on('click', '[data-bs-toggle="modal"]', function () {

            let serviceId = $(this).data('id');

            // set selected option
            $('#EditModel select[name="service_id"]').val(serviceId);

        });
        
        function get_responce_message(resp, form_name = "", url = "") {
            if (resp.status == '200') {
                toastr.success(resp.success);
                if (form_name != "") {
                    document.getElementById(form_name).reset();
                }
                if (url != "") {
                    setTimeout(function () {
                        window.location.replace(url);
                    }, 500);
                }
            } else {
                var obj = resp.errors;
                if (typeof obj === 'string') {
                    toastr.error(obj);
                } else {
                    $.each(obj, function (i, e) {
                        toastr.error(e);
                    });
                }
            }
        }

        // Toastr MSG Show
        @if(Session::has('error'))
            toastr.error('{{ Session::get("error") }}');
        @elseif(Session::has('success'))
            toastr.success('{{ Session::get("success") }}');
        @endif

        function save_quote() {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $('#dvloader').show();

                $("#dvloader").show();
                var formData = new FormData($("#quote_form")[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("quote.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp);
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
    <script>
        // Global Scroll Reveal Animation Logic
        document.addEventListener('DOMContentLoaded', () => {
            const revealOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('anim-visible');
                        // Optional: unobserve after reveal
                        // observer.unobserve(entry.target);
                    }
                });
            }, revealOptions);

            // Targets all elements that have hidden styles in style.css
            const animatedSelectors = [
                '.s2-features-text', '.s2-info-box', '.s2-img-1', '.s2-img-2',
                '.section-header', '.gallery-card', '.video-card', '.haq-content',
                '.haq-description', '.contact-card', '.haq-visual', '.quote-card'
            ];

            const observeElements = () => {
                animatedSelectors.forEach(selector => {
                    document.querySelectorAll(selector).forEach(el => {
                        revealObserver.observe(el);
                    });
                });
                // Also observe our custom data-anim elements
                document.querySelectorAll('[data-anim]').forEach(el => {
                    revealObserver.observe(el);
                });
            };

            observeElements();

            // Re-run if content changes (e.g., gallery filtering)
            window.addEventListener('contentUpdated', observeElements);
        });
    </script>
    @yield('pagescript')
</body>

</html>
