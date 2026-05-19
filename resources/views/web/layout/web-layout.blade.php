<!DOCTYPE html>
<html>

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dynamic SEO Tags -->
    <title>@yield('title', 'Default Site Title')</title>
    <meta name="description" content="@yield('description', 'Default description here')">
    <meta name="keywords" content="@yield('keywords', 'cleaning, services, melbourne')">
    <link rel="canonical" href="@yield('canonical', url()->current())">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/imgs/CWPss.PNG') }}">

    <!-- Social Sharing (Open Graph) -->
    <meta property="og:title" content="@yield('title', 'Default Site Title')">
    <meta property="og:description" content="@yield('description', 'Default description here')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('assets/imgs/CWPss.PNG'))">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Default Site Title')">
    <meta name="twitter:description" content="@yield('description', 'Default description here')">
    <meta name="twitter:image" content="@yield('og_image', asset('assets/imgs/CWPss.PNG'))">

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

    <link href="{{asset('assets/css/admin/toastr.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/web/style.css') }}">

    <!-- Loader CSS -->
    <style>
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
                                                    <option value="0">Special Offers</option>
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
                                                <div class="row justify-content-end g-3">
                                                    <div class="col-md-3">
                                                        <button type="button" onclick="save_quote('quote_form')"
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
            let serviceName = $(this).data('name') ?? '';
            console.log(serviceName);

            // set selected option
            $('#EditModel select[name="service_id"]').val(serviceId);
            $('#EditModel textarea[name="msg"]').val(serviceName);

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

        function save_quote(form) {

            var Demo_Mode = '<?php echo Demo_Mode(); ?>';
            if (Demo_Mode == 1) {

                $("#dvloader").show();
                var formData = new FormData($("#" + form)[0]);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("quote.store") }}',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (resp) {
                        $("#dvloader").hide();
                        get_responce_message(resp, form);

                        if (resp.status == '200') {
                            $('#EditModel').modal('hide');
                        }
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

            // ── Dynamic header height for hero sections ──
            function updateHeaderHeight() {
                const header = document.querySelector('.header-main');
                if (header) {
                    const height = header.offsetHeight;
                    document.documentElement.style.setProperty('--header-height', height + 'px');
                }
            }
            updateHeaderHeight();
            window.addEventListener('resize', updateHeaderHeight);
            // Re-measure after fonts/images load
            window.addEventListener('load', updateHeaderHeight);

            // ── Mobile dropdown navigation ──
            const isMobile = () => window.innerWidth < 768;
            const dropdowns = document.querySelectorAll('.nav-item.dropdown');

            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                const iconBtn = dropdown.querySelector('.dropdown-toggle-icon');

                if (!toggle || !menu) return;

                // Text link always navigates (default behavior)
                // Only intercept on mobile to prevent navigation when clicking text
                // But we want text to navigate, icon to toggle dropdown

                // Icon button toggles dropdown
                if (iconBtn) {
                    iconBtn.addEventListener('click', (e) => {
                        if (!isMobile()) return;
                        e.preventDefault();
                        e.stopPropagation();

                        const isOpen = dropdown.classList.contains('mobile-open');

                        // Close all other dropdowns
                        dropdowns.forEach(d => {
                            if (d !== dropdown) {
                                d.classList.remove('mobile-open');
                                const otherIcon = d.querySelector('.dropdown-toggle-icon');
                                if (otherIcon) otherIcon.setAttribute('aria-expanded', 'false');
                            }
                        });

                        // Toggle current
                        dropdown.classList.toggle('mobile-open', !isOpen);
                        iconBtn.setAttribute('aria-expanded', !isOpen);
                    });
                }

                // Text link on mobile: navigate, don't toggle dropdown
                toggle.addEventListener('click', (e) => {
                    if (!isMobile()) return;
                    // Allow default navigation - do NOT toggle dropdown
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (!isMobile()) return;
                if (!e.target.closest('.nav-item.dropdown')) {
                    dropdowns.forEach(d => {
                        d.classList.remove('mobile-open');
                        const icon = d.querySelector('.dropdown-toggle-icon');
                        if (icon) icon.setAttribute('aria-expanded', 'false');
                    });
                }
            });

            // Close dropdowns on nav link click (non-toggle)
            document.querySelectorAll('.navbar-nav .nav-link:not(.dropdown-toggle)').forEach(link => {
                link.addEventListener('click', () => {
                    if (!isMobile()) return;
                    dropdowns.forEach(d => {
                        d.classList.remove('mobile-open');
                        const icon = d.querySelector('.dropdown-toggle-icon');
                        if (icon) icon.setAttribute('aria-expanded', 'false');
                    });
                });
            });

            // Close dropdowns when navbar collapses
            const navbarCollapse = document.getElementById('navbarNav');
            if (navbarCollapse) {
                navbarCollapse.addEventListener('hidden.bs.collapse', () => {
                    dropdowns.forEach(d => {
                        d.classList.remove('mobile-open');
                        const icon = d.querySelector('.dropdown-toggle-icon');
                        if (icon) icon.setAttribute('aria-expanded', 'false');
                    });
                });
            }

            // ── Animation observer with robust fallback ──
            const animElements = document.querySelectorAll('.anim-trigger, [data-anim]');

            // Show all elements immediately if no observer support
            if (!('IntersectionObserver' in window)) {
                animElements.forEach(el => el.classList.add('anim-visible'));
                return;
            }

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('anim-visible');
                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, {
                threshold: [0, 0.05, 0.1, 0.15, 0.2, 0.25],
                rootMargin: '0px 0px -10px 0px'
            });

            // Observe all anim elements
            let observedCount = 0;
            animElements.forEach(el => {
                // If element is already in viewport, show immediately
                const rect = el.getBoundingClientRect();
                const isInViewport = rect.top < window.innerHeight && rect.bottom > 0;
                if (isInViewport) {
                    el.classList.add('anim-visible');
                    observedCount++;
                } else {
                    revealObserver.observe(el);
                }
            });

            // Fallback: show all animated elements after timeout if observer hasn't fired
            const fallbackTimeout = setTimeout(() => {
                document.querySelectorAll('[data-anim]:not(.anim-visible), .anim-trigger:not(.anim-visible)').forEach(el => {
                    el.classList.add('anim-visible');
                    revealObserver.unobserve(el);
                });
            }, 3000);

            // Also trigger on scroll as additional fallback
            let scrollFallbackApplied = false;
            const scrollCheck = () => {
                if (scrollFallbackApplied) return;
                const remaining = document.querySelectorAll('[data-anim]:not(.anim-visible), .anim-trigger:not(.anim-visible)');
                if (remaining.length === 0) {
                    scrollFallbackApplied = true;
                    window.removeEventListener('scroll', scrollCheck);
                    clearTimeout(fallbackTimeout);
                    return;
                }
                // If user scrolled past most of the page, show remaining
                const scrollPercent = window.scrollY / (document.body.scrollHeight - window.innerHeight);
                if (scrollPercent > 0.7) {
                    remaining.forEach(el => el.classList.add('anim-visible'));
                    scrollFallbackApplied = true;
                    window.removeEventListener('scroll', scrollCheck);
                    clearTimeout(fallbackTimeout);
                }
            };
            window.addEventListener('scroll', scrollCheck, { passive: true });

            // Re-run if content changes
            window.addEventListener('contentUpdated', () => {
                const newElements = document.querySelectorAll('.anim-trigger:not(.anim-visible), [data-anim]:not(.anim-visible)');
                newElements.forEach(el => {
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        el.classList.add('anim-visible');
                    } else {
                        revealObserver.observe(el);
                    }
                });
            });
        });
    </script>
    @yield('pagescript')
</body>

</html>