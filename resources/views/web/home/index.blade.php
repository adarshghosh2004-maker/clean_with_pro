@extends('web.layout.page-web')
@section('title','Home')
@section('content')
<section id="hero-section">
    <div class="container-fluid px-0 carousal-container h-100">
        <div id="carouselExampleFade" class="carousel slide carousel-fade h-100">
            <div class="carousel-inner">
                @foreach($services as $key=>$value)
                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{$value['banner_img']}}" class="d-block carousal-img " alt="...">
                    <div class="hero-copy">
                        <h1>{{ $value['title'] }}</h1>
                        <h2 class="mt-3">{{ $value['short_title'] }}</h2>
                        <div class="hero-actions">
                            <a href="#hero-enquiry" class="btn hero-btn hero-btn-primary">More Info</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev hero-control hero-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="hero-control-icon" aria-hidden="true">&#8592;</span>
            </button>
            <button class="carousel-control-next hero-control hero-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="hero-control-icon" aria-hidden="true">&#8594;</span>
            </button>
        </div>
    </div>
</section>

@php
$serviceCards = $services->values();
$serviceCardCount = $serviceCards->count();
@endphp

<section class="services-showcase-section" id="services">
    <div class="container-fluid">
        <div class="services-showcase-shell">

            <button id="showcase-next-btn">More</button>
            <div class="services-showcase-layout">

                <div class="services-showcase-intro">
                    <span class="section-kicker">All Cleaning Services</span>
                    <h2>Everything you need for fresher carpets, upholstery, mattresses, and more.</h2>
                    <p class="services-showcase-lead">
                        Explore our complete cleaning range in one place. Each service is delivered with fabric-safe
                        methods, modern equipment, and a careful finish that suits both homes and commercial spaces.
                    </p>

                    <div class="services-showcase-stats">
                        <article class="services-stat-card">
                            <strong>{{ str_pad((string) $serviceCardCount, 2, '0', STR_PAD_LEFT) }}+</strong>
                            <span>specialist services available</span>
                        </article>
                        <article class="services-stat-card">
                            <strong>Fast</strong>
                            <span>flexible scheduling and same-day support where possible</span>
                        </article>
                    </div>

                    <a href="{{ route('web.about') }}" class="quote-btn services-showcase-btn">See How We Work</a>
                </div>
                <div class="services-showcase-wrapper">
                    <div class="services-showcase-slider">
                        <div class="services-showcase-board">
                            @foreach($serviceCards as $key => $value)
                            <article class="service-showcase-card">
                                <div class="service-showcase-media">
                                    <img src="{{ $value['banner_img'] }}" alt="{{ $value['title'] }}">
                                </div>

                                <div class="service-showcase-copy">
                                    @if(!empty($value['short_title']))
                                    <span class="service-showcase-pill">{{ $value['short_title'] }}</span>
                                    @endif
                                    <h3>{{ $value['title'] }}</h3>
                                </div>
                            </article>
                            @if($key !=0 && $key%8==0)
                        </div>
                        <div class="services-showcase-board">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="service-assurance-section">
    <div class="container-fluid">
        <div class="service-assurance-shell">
            <div class="service-assurance-layout">
                <div class="service-assurance-intro">
                    <span class="section-kicker">Our Service Standards</span>
                    <h2>Professional cleaning, designed to feel effortless from the first visit.</h2>
                    <p class="service-assurance-lead">
                        We shape every appointment around skilled delivery, safe treatment, and a calm service experience so
                        your home or workplace feels looked after, not simply cleaned.
                    </p>
                </div>

                <div class="service-assurance-list">
                    <article class="assurance-item">
                        <div class="assurance-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none">
                                <circle cx="32" cy="20" r="8" />
                                <path d="M18 48c0-7.732 6.268-14 14-14s14 6.268 14 14" />
                                <circle cx="15" cy="25" r="5" />
                                <circle cx="49" cy="25" r="5" />
                                <path d="M7 46c0-5.523 4.477-10 10-10" />
                                <path d="M47 46c0-5.523 4.477-10 10-10" />
                            </svg>
                        </div>
                        <div class="assurance-item-body">
                            <strong>Certified, highly-trained staff</strong>
                            <p>
                                Every cleaner is trained in fabric care, stain treatment, and safe in-home procedures so your
                                surfaces get expert attention from the start.
                            </p>
                        </div>
                    </article>

                    <article class="assurance-item">
                        <div class="assurance-icon" aria-hidden="true">
                            <svg viewBox="0 0 64 64" fill="none">
                                <path d="M20 15h11l4 8v26H20z" />
                                <path d="M35 23h8a6 6 0 0 1 6 6v20H35z" />
                                <path d="M24 15v-5h7v5" />
                                <path d="M26 31h3m-3 8h3m11-4h4" />
                            </svg>
                        </div>
                        <div class="assurance-item-body">
                            <strong>Safe products, advanced equipment</strong>
                            <p>
                                We pair industry-grade tools with carefully selected cleaning solutions that lift dirt
                                effectively while helping protect fabrics, carpets, and indoor air quality.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service-story-section">
    <div class="container-fluid">
        <div class="service-story-layout">
            <div class="service-story-gallery" aria-hidden="true">
                @for($key = 0; $key < ($serviceCardCount> 0 ? 3 : 0); $key++)
                    @php
                    $value = $serviceCards[$key % $serviceCardCount];
                    @endphp
                    <figure class="service-story-card service-story-card-{{ $key + 1 }}">
                        <img src="{{ $value['banner_img'] }}" alt="{{ $value['title'] }}">
                    </figure>
                    @endfor
            </div>

            <div class="service-story-content">
                <h2>
                    Best Cleaning Services Melbourne -
                    <span>Same Day Carpet Cleaning In Melbourne</span>
                </h2>

                <p>
                    Life happens. Maybe your in-laws are coming for a surprise visit, or your pet decided to use your
                    favourite rug as a bathroom. No matter the situation, we understand that sometimes you need your
                    space cleaned ASAP. That’s why we offer same day carpet cleaning services in Melbourne to
                    accommodate any urgent needs.Our skilled technicians use top-of-the-line equipment and eco-friendly cleaning solutions to restore
                    your carpets to their original condition. We also offer stain removal treatments for stubborn marks
                    that won’t budge. With over 10 years of experience in the industry, we deliver the most
                    cost-effective and satisfying cleaning services throughout Melbourne.
                </p>

                <a href="#contact" class="quote-btn service-story-btn">Read More</a>
            </div>
        </div>
    </div>
</section>

<section class="industries-section">
    <div class="container-fluid">
        <div class="industries-shell">
            <div class="industries-top">
                <span class="section-kicker">Industries We Serve</span>
                <h2>Premium cleaning services tailored to the spaces that keep business moving.</h2>
                <p class="industries-description">
                    Trusted by organisations across education, hospitality, healthcare and industrial operations, our cleaning
                    teams work with precision, care and consistent quality to protect your people, property and reputation.
                </p>
                <a href="#contact" class="quote-btn industries-btn">Talk to an Expert</a>
            </div>

            <div class="industries-list">
                <article class="industry-tile">
                    <span class="industry-index">01</span>
                    <div>
                        <strong>Childcare, Schools & Universities</strong>
                        <p>Safe, compliant cleaning for learning environments and student facilities.</p>
                    </div>
                </article>

                <article class="industry-tile">
                    <span class="industry-index">02</span>
                    <div>
                        <strong>Entertainment Venues</strong>
                        <p>Hygienic support for bars, cinemas, indoor play centres and public attractions.</p>
                    </div>
                </article>

                <article class="industry-tile">
                    <span class="industry-index">03</span>
                    <div>
                        <strong>Hospitals, Surgery & Veterinary</strong>
                        <p>High-standard cleaning for clinical, surgery and animal care environments.</p>
                    </div>
                </article>

                <article class="industry-tile">
                    <span class="industry-index">04</span>
                    <div>
                        <strong>Office & Commercial Spaces</strong>
                        <p>Polished cleaning for workplaces, meeting rooms, lobbies and customer-facing areas.</p>
                    </div>
                </article>

                <article class="industry-tile">
                    <span class="industry-index">05</span>
                    <div>
                        <strong>Vehicles & Fleet</strong>
                        <p>Detail-focused cleaning for cars, buses, trains, trams and boats.</p>
                    </div>
                </article>

                <article class="industry-tile">
                    <span class="industry-index">06</span>
                    <div>
                        <strong>Industrial Facilities</strong>
                        <p>Durable cleaning services for warehouses, production floors and large-scale environments.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection

@section('pagescript')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('site-navbar');  
        const prevBtn = document.getElementById('showcase-prev-btn"');
        const nextBtn = document.getElementById('showcase-next-btn"');
        let index = 0;
        const totalPages = $('.services-showcase-slider').children().length;

        $('#showcase-next-btn').on('click', function() {
            index = (index + 1) % totalPages;
            updateSlider();
        });

        function updateSlider() {
            $('.services-showcase-slider').css({
                'transform': 'translateX(-' + (index * 100) + '%)'
            });
        }

        if (!navbar) {
            return;
        }

        const syncNavbarState = function() {
            if (window.scrollY > 24) {
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.remove('nav-scrolled');
            }
        };

        syncNavbarState();
        window.addEventListener('scroll', syncNavbarState, {
            passive: true
        });

    });
</script>
@endsection