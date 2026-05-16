<!-- Header / Navigation -->
<header class="header-main sticky-top shadow-sm">
    <!-- Section 1: Top Announcement Bar -->
    <div
        class="bg-primary-container text-white py-2 px-4 px-md-5 d-flex justify-content-between align-items-center small font-weight-medium">
        <div class="d-flex align-items-center gap-3">
            <span class="badge-announcement bg-secondary px-3 py-1 rounded-pill text-uppercase fw-bold">SAME DAY
                SERVICE</span>
            <span class="d-none d-sm-inline opacity-75">Expert fabric care across Melbourne metropolitan areas.</span>
        </div>
        <div class="d-flex align-items-center">
            <span class="material-symbols-outlined fs-6">call</span>
            <a class="text-white text-decoration-none fw-bold"
                href="tel:{{ Setting_Data()['contact'] ?? "+61468460145" }}">{{ Setting_Data()['contact'] ?? "+61468460145" }}
                - {{ Setting_Data()['company_name'] ?? "Clean With Professionals" }}</a>
        </div>
    </div>

    <!-- Section 2: Main Navbar -->
    <nav class="navbar navbar-expand-lg" aria-label="Main navigation">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo route('home'); ?>">
                <img src="{{ asset('assets/imgs/CWPss.PNG') }}" alt="Clean With Professionals Logo"
                    class="navbar-logo me-3">
                <span
                    class="m-0 fs-4 fw-bold text-primary-blue headline">{{ Setting_Data()['company_name'] ?? "Clean With Professionals" }}</span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><span></span></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"
                            @if(request()->routeIs('home')) aria-current="page" @endif>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo request()->routeIs('about') ? 'active' : ''; ?>"
                            href="<?php echo route('about'); ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo request()->routeIs('specials') ? 'active' : ''; ?>"
                            href="<?php echo route('specials'); ?>">Specials</a>
                    </li>
                    <li class="nav-item dropdown dropdown-button">
                        <a class="nav-link dropdown-toggle <?php echo request()->routeIs('services') ? 'active' : ''; ?>"
                            href="<?php echo route('services'); ?>" id="servicesDropdown" role="button"
                            aria-expanded="false">
                            Services
                        </a>
                        <button class="dropdown-toggle-icon" type="button" aria-label="Toggle services dropdown" aria-expanded="false">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="dropdown-menu mega-menu dropdown-menu-custom shadow-lg"
                            aria-labelledby="servicesDropdown">
                            <div class="dropdown-grid">
                                @foreach ($services as $value)
                                    <a class="dropdown-item" href="{{ route('services_detail', $value['slug']) }}">
                                        {{ $value['title'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo request()->routeIs('pricing') ? 'active' : ''; ?>"
                            href="<?php echo route('pricing'); ?>">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo request()->routeIs('gallery') ? 'active' : ''; ?>"
                            href="<?php echo route('gallery'); ?>">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo request()->routeIs('contact') ? 'active' : ''; ?>"
                            href="<?php echo route('contact'); ?>">Contact Us</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center mt-3 mt-lg-0">
                    <a href="#EditModel" data-bs-toggle="modal"
                        class="btn btn-secondary px-4 py-2 rounded-pill fw-bold shadow-sm transition-all hover-translate-y">Get
                        A Quote</a>
                </div>
            </div>
        </div>
    </nav>
</header>