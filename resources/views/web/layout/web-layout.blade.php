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
    <link rel="icon" type="image/png" href="{{ Tab_Icon() }}">

    <!-- Social Sharing (Open Graph) -->
    <meta property="og:title" content="@yield('title', 'Default Site Title')">
    <meta property="og:description" content="@yield('description', 'Default description here')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', Tab_Icon())">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Default Site Title')">
    <meta name="twitter:description" content="@yield('description', 'Default description here')">
    <meta name="twitter:image" content="@yield('og_image', Tab_Icon())">

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
    <link rel="stylesheet"
        href="{{ asset('assets/css/web/style.css') }}?v={{ filemtime(public_path('assets/css/web/style.css')) }}">

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

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999999;
            transition: opacity .5s ease;
        }


        #preloader img {
            width: 300px;
            animation: pulse 1.2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }

            100% {
                transform: scale(1);
            }
        }

        #preloader.hide {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
    </style>
</head>


<body>

    <div id="preloader">
        <img src="{{ Tab_Icon() }}" alt="Logo">
    </div>

    <div style="display:none" id="dvloader"><img src="{{ asset('assets/imgs/loading.gif')}}"  alt="image" /></div>
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
                                        <h3 class="fw-bold text-primary-blue">{{ __('label.get_your_free_quote') }}</h3>
                                        <p class="text-muted">{{ __('label.no_hidden_costs') }}</p>
                                    </div>

                                    <form id="quote_form" enctype="multipart/form-data">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.full_name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control bg-light border-0"
                                                    placeholder="John Doe" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.phone') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="phone" class="form-control bg-light border-0"
                                                    placeholder="(555) 123-4567" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.email_address') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control bg-light border-0"
                                                    placeholder="john@example.com" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.your_address') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="suburb" class="form-control bg-light border-0"
                                                    placeholder="e.g. 123 Main St, Richmond, VIC" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.date') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control bg-light border-0"
                                                    placeholder="dd/mm/yyyy" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.time_optional') }}</label>
                                                <select name="time" class="form-control bg-light border-0" required>
                                                    <option value="">{{ __('label.select_a_time') }}</option>
                                                    <option value="07:00">7:00 AM</option>
                                                    <option value="07:30">7:30 AM</option>
                                                    <option value="08:00">8:00 AM</option>
                                                    <option value="08:30">8:30 AM</option>
                                                    <option value="09:00">9:00 AM</option>
                                                    <option value="09:30">9:30 AM</option>
                                                    <option value="10:00">10:00 AM</option>
                                                    <option value="10:30">10:30 AM</option>
                                                    <option value="11:00">11:00 AM</option>
                                                    <option value="11:30">11:30 AM</option>
                                                    <option value="12:00">12:00 PM</option>
                                                    <option value="12:30">12:30 PM</option>
                                                    <option value="13:00">1:00 PM</option>
                                                    <option value="13:30">1:30 PM</option>
                                                    <option value="14:00">2:00 PM</option>
                                                    <option value="14:30">2:30 PM</option>
                                                    <option value="15:00">3:00 PM</option>
                                                    <option value="15:30">3:30 PM</option>
                                                    <option value="16:00">4:00 PM</option>
                                                    <option value="16:30">4:30 PM</option>
                                                    <option value="17:00">5:00 PM</option>
                                                    <option value="17:30">5:30 PM</option>
                                                    <option value="18:00">6:00 PM</option>
                                                    <option value="18:30">6:30 PM</option>
                                                    <option value="19:00">7:00 PM</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.service') }}<span
                                                        class="text-danger">*</span></label>
                                                <select name="service_id" class="form-control bg-light border-0"
                                                    required>
                                                    <option value="">{{ __('label.select_a_service') }}</option>
                                                    <option value="0">{{ __('label.special_offers') }}</option>
                                                    @foreach ($services as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label small fw-semibold text-muted">{{ __('label.your_message_optional') }}</label>
                                                <textarea name="msg" class="form-control bg-light border-0" rows="3"
                                                    placeholder="{{ __('label.briefly_describe') }}"></textarea>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="row justify-content-end g-3">
                                                    <div class="col-md-3">
                                                        <button type="button" onclick="save_quote('quote_form')"
                                                            class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">{{ __('label.send') }}</button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" data-bs-dismiss="modal"
                                                            class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">{{ __('label.close') }}</button>
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
        window.addEventListener("load", function () {
            const loader = document.getElementById("preloader");

            if (loader) {
                loader.style.opacity = "0";

                setTimeout(function () {
                    loader.style.display = "none";
                }, 500);
            }
        });

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

            // ── Mobile Navigation ──
            const isMobile = () => window.innerWidth < 992;
            const header = document.querySelector('.header-main');
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.getElementById('navbarNav');
            const dropdowns = [...document.querySelectorAll('.nav-item.dropdown')];
            let scrollPosition = 0;

            // ── Mobile offcanvas toggle ──
            function toggleMobileMenu(forceState) {
                if (!navbarCollapse || !navbarToggler || !header) return;

                const isOpen = forceState !== undefined ? forceState : !navbarCollapse.classList.contains('show');

                navbarCollapse.classList.toggle('show', isOpen);
                navbarToggler.classList.toggle('active', isOpen);
                navbarToggler.setAttribute('aria-expanded', isOpen);

                // Backdrop management
                let backdrop = document.querySelector('.navbar-backdrop');
                if (isOpen) {
                    scrollPosition = window.scrollY;
                    document.body.classList.add('mobile-menu-open');
                    document.body.style.top = `-${scrollPosition}px`;

                    if (!backdrop) {
                        backdrop = document.createElement('div');
                        backdrop.className = 'navbar-backdrop';
                        document.body.appendChild(backdrop);
                        backdrop.addEventListener('click', () => toggleMobileMenu(false), { once: true });
                    }
                    backdrop.classList.add('active');
                } else {
                    document.body.classList.remove('mobile-menu-open');
                    document.body.style.top = '';
                    window.scrollTo(0, scrollPosition);
                    scrollPosition = 0;

                    if (backdrop) {
                        backdrop.classList.remove('active');
                        backdrop.addEventListener('transitionend', () => {
                            if (backdrop && backdrop.parentNode) backdrop.remove();
                        }, { once: true });
                    }

                    // Close all open dropdowns
                    dropdowns.forEach(d => {
                        d.classList.remove('mobile-open');
                        const icon = d.querySelector('.dropdown-toggle-icon');
                        if (icon) icon.setAttribute('aria-expanded', 'false');
                    });
                }
            }

            // ── Hamburger click ──
            navbarToggler?.addEventListener('click', (e) => {
                if (!isMobile()) return;
                e.preventDefault();
                toggleMobileMenu();
            });

            // ── Close button (inside offcanvas) ──
            const closeBtn = document.querySelector('[data-nav-close]');
            closeBtn?.addEventListener('click', () => {
                if (isMobile()) toggleMobileMenu(false);
            });

            // ── Mobile dropdown accordion (delegated) ──
            navbarCollapse?.addEventListener('click', (e) => {
                const iconBtn = e.target.closest('.dropdown-toggle-icon');
                if (!iconBtn || !isMobile()) return;
                e.preventDefault();
                e.stopPropagation();

                const dropdown = iconBtn.closest('.nav-item.dropdown');
                if (!dropdown) return;

                const wasOpen = dropdown.classList.contains('mobile-open');

                // Close all other dropdowns
                dropdowns.forEach(d => {
                    d.classList.remove('mobile-open');
                    const otherIcon = d.querySelector('.dropdown-toggle-icon');
                    if (otherIcon) otherIcon.setAttribute('aria-expanded', 'false');
                });

                // Toggle current
                dropdown.classList.toggle('mobile-open', !wasOpen);
                iconBtn.setAttribute('aria-expanded', !wasOpen);

                // ── Dynamic sizing & scroll on open ──
                if (!wasOpen && navbarCollapse) {
                    const dropdownMenu = dropdown.querySelector('.dropdown-menu-custom');
                    if (dropdownMenu) {
                        requestAnimationFrame(() => {
                            const panelRect = navbarCollapse.getBoundingClientRect();
                            const ddRect = dropdown.getBoundingClientRect();
                            const spaceBelow = panelRect.bottom - ddRect.top - 16;
                            const capped = Math.min(spaceBelow * 0.65, window.innerHeight * 0.4);
                            dropdownMenu.style.setProperty('--dropdown-max-height', Math.max(100, Math.round(capped)) + 'px');
                        });
                    }

                    // Auto-scroll to keep dropdown visible
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            const panelBottom = navbarCollapse.getBoundingClientRect().bottom;
                            const ddBottom = dropdown.getBoundingClientRect().bottom;
                            if (ddBottom > panelBottom - 10) {
                                navbarCollapse.scrollBy({
                                    top: ddBottom - panelBottom + 16,
                                    behavior: 'smooth'
                                });
                            }
                        });
                    });
                }
            });

            // ── Close menu when tapping a nav link (delegated) ──
            navbarCollapse?.addEventListener('click', (e) => {
                const link = e.target.closest('.navbar-nav .nav-link:not(.dropdown-toggle)');
                if (link && isMobile()) {
                    setTimeout(() => toggleMobileMenu(false), 250);
                }
            });

            // ── Close menu when clicking "Get A Quote" ─
            document.addEventListener('click', (e) => {
                const quoteBtn = e.target.closest('[data-close-mobile-menu]');
                if (quoteBtn && isMobile()) {
                    toggleMobileMenu(false);
                }
            });

            // ── Close on Escape ──
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && isMobile() && navbarCollapse?.classList.contains('show')) {
                    toggleMobileMenu(false);
                }
            });

            // ── Close on resize to desktop ──
            let resizeTimer;
            window.addEventListener('resize', () => {
                cancelAnimationFrame(resizeTimer);
                resizeTimer = requestAnimationFrame(() => {
                    if (window.innerWidth >= 992 && navbarCollapse?.classList.contains('show')) {
                        toggleMobileMenu(false);
                    }
                });
            }, { passive: true });

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