@extends('web.layout.web-layout')
@section('content')


        <!-- Section 1: Pricing Hero -->
        <section class="hero-section">
                @foreach ($pages as $key => $value)
                        @if ($value['name'] == 'pricing')
                                <img src="{{ $value['img'] }}" alt="CleanCare Hero Image" class="hero-img">
                        @endif
                @endforeach
                <div class="container">
                        <h1>
                                Melbourne's Most <br> <span>Transparent</span> <br> Cleaning Prices <br> — No Hidden Fees
                        </h1>
                        <p>
                                Simple, honest pricing designed for real homes. We believe professional
                                cleanliness shouldn't
                                come with surprises.
                        </p>
                        <div class="d-flex justify-content-center">
                                <a href="#EditModel" data-bs-toggle="modal" class="btn btn-secondary px-4 py-3">Book My
                                        Clean</a>
                        </div>
                </div>
        </section>

        <!-- Section 4: Service Comparison -->
        <section class="service-comparison section-padding bg-white" data-aos="fade-up">
                <div class="container">
                        <div class="text-center mb-5">
                                <h2 class="display-5 fw-bold text-primary">Service Comparison</h2>
                        </div>
                        <div class="comparison-table-wrapper rounded-4 border overflow-hidden shadow-sm">
                                <table class="table table-borderless mb-0">
                                        <thead>
                                                <tr class="bg-primary-container text-white text-center">
                                                        <th class="py-4 text-start ps-5">Included Features</th>
                                                        <th class="py-4">General Clean</th>
                                                        <th class="py-4 bg-secondary">Deep Clean <br><span
                                                                        class="small fw-normal">EXTENDED
                                                                        SERVICE</span></th>
                                                        <th class="py-4">Move IN/Move Out</th>
                                                </tr>
                                        </thead>
                                        <tbody class="text-center">
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Light Tidy Up</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Extensive Tidy Up</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Cobweb Removal</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Empty Bins</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust Skirting/Window
                                                                Sills/Doors</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Wipe Skirting/Window
                                                                Sills/Doors</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust/Clean Doors</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Light
                                                                Switches/Power Points</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust Reachable Surfaces
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Mirrors</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Air Freshen (optional)
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Vacuum Soft Furnishing
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Vacuum Under Furniture
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Walls</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Ceilings</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust Blinds</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Window Tracks</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Inside All
                                                                Drawers/Cabinets</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Garages</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                </tr>
                                        </tbody>
                                        <thead>
                                                <tr class="bg-primary-container text-white text-center">
                                                        <th class="py-4 text-start ps-5">Kitchen</th>
                                                        <th class="py-4">General Clean</th>
                                                        <th class="py-4 bg-secondary">Deep Clean <br><span
                                                                        class="small fw-normal">EXTENDED
                                                                        SERVICE</span></th>
                                                        <th class="py-4">Move IN/Move Out</th>
                                                </tr>
                                        </thead>
                                        <tbody class="text-center">
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Stovetop</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Rangehood Exterior
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Underside Rangehood
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Exhaust
                                                                Fans/Filters</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Wipe Benchtops</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Appliances
                                                                (Exterior)</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Splashback</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Polish Tapware</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Scrub Sink</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Microwave
                                                                Inside/Out</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Wipe Cupboard Exteriors
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Polish Stainless Steel
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust All Surfaces</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Inside Dishwasher
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Oven (Inside)</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Inside Kitchen
                                                                Cabinets</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                        </tbody>
                                        <thead>
                                                <tr class="bg-primary-container text-white text-center">
                                                        <th class="py-4 text-start ps-5">Bathroom</th>
                                                        <th class="py-4">General Clean</th>
                                                        <th class="py-4 bg-secondary">Deep Clean <br><span
                                                                        class="small fw-normal">EXTENDED
                                                                        SERVICE</span></th>
                                                        <th class="py-4">Move IN/Move Out</th>
                                                </tr>
                                        </thead>
                                        <tbody class="text-center">
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Scrub Bath</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Scrub Shower</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Scrub Sink</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Wipe Benches</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Mirrors</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Polish Chrome</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Wipe Cupboard Exteriors
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Empty Bins</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Toilet</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Scrub Shower Grout</td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Ceiling Exhaust Fan
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Inside Drawers/Cabinets
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                        </tbody>
                                        <thead>
                                                <tr class="bg-primary-container text-white text-center">
                                                        <th class="py-4 text-start ps-5">Bedroom</th>
                                                        <th class="py-4">General Clean</th>
                                                        <th class="py-4 bg-secondary">Deep Clean <br><span
                                                                        class="small fw-normal">EXTENDED
                                                                        SERVICE</span></th>
                                                        <th class="py-4">Move IN/Move Out</th>
                                                </tr>
                                        </thead>
                                        <tbody class="text-center">
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Dust/Wipe All Surfaces
                                                        </td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom text-muted opacity-50"><span
                                                                        class="material-symbols-outlined">cancel</span></td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <td class="py-3 text-start ps-5 border-bottom">Clean Inside Drawers</td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom bg-light"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                        <td class="py-3 border-bottom"><span
                                                                        class="material-symbols-outlined text-secondary">check_circle</span>
                                                        </td>
                                                </tr>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </section>

        <!-- Section 6: Trust Badges -->
        <section class="py-5 bg-light" data-aos="fade-up">
                <div class="container">
                        <div class="row g-4 text-center">
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                                        <div class="trust-badge-item">
                                                <div class="badge-icon-circle mx-auto mb-3">
                                                        <span class="material-symbols-outlined fs-2">verified_user</span>
                                                </div>
                                                <p class="fw-bold mb-0">Police Checked</p>
                                        </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                                        <div class="trust-badge-item">
                                                <div class="badge-icon-circle mx-auto mb-3">
                                                        <span class="material-symbols-outlined fs-2">shield</span>
                                                </div>
                                                <p class="fw-bold mb-0">Fully Insured</p>
                                        </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                                        <div class="trust-badge-item">
                                                <div class="badge-icon-circle mx-auto mb-3">
                                                        <span class="material-symbols-outlined fs-2">eco</span>
                                                </div>
                                                <p class="fw-bold mb-0">Eco-Friendly</p>
                                        </div>
                                </div>
                                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                                        <div class="trust-badge-item">
                                                <div class="badge-icon-circle mx-auto mb-3">
                                                        <span class="material-symbols-outlined fs-2">thumb_up</span>
                                                </div>
                                                <p class="fw-bold mb-0">100% Satisfaction</p>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>

        <!-- Section 7: Testimonials -->
        <section class="section-padding bg-white" data-aos="fade-up">
                <div class="container text-center">
                        <h2 class="display-5 fw-bold text-primary mb-5">Trusted by Melbourne Locals</h2>
                        <div class="row g-4">
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                        <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                                                <div class="stars mb-3 text-secondary">
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                </div>
                                                <p class="text-muted mb-4 small">"The most professional cleaning service I've
                                                        used. The flat
                                                        rate pricing is so much better than worrying about the clock!"</p>
                                                <div class="d-flex align-items-center gap-3">
                                                        <div
                                                                class="avatar bg-primary-container text-white rounded-circle d-flex align-items-center justify-content-center">
                                                                S</div>
                                                        <div>
                                                                <h6 class="fw-bold mb-0">Sarah</h6>
                                                                <p class="small text-muted mb-0">Footscray</p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                        <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                                                <div class="stars mb-3 text-secondary">
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                </div>
                                                <p class="text-muted mb-4 small">"You left my house sparkling. Love the
                                                        transparency. No hidden
                                                        fees or extra charges at the end."</p>
                                                <div class="d-flex align-items-center gap-3">
                                                        <div
                                                                class="avatar bg-secondary-green text-white rounded-circle d-flex align-items-center justify-content-center">
                                                                J</div>
                                                        <div>
                                                                <h6 class="fw-bold mb-0">Jessica</h6>
                                                                <p class="small text-muted mb-0">Brighton</p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                        <div class="testimonial-card p-4 rounded-4 border h-100 text-start">
                                                <div class="stars mb-3 text-secondary">
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                        <span class="material-symbols-outlined fs-6">star</span>
                                                </div>
                                                <p class="text-muted mb-4 small">"Great value for money. The recurring discount
                                                        makes it very
                                                        affordable for a busy household."</p>
                                                <div class="d-flex align-items-center gap-3">
                                                        <div
                                                                class="avatar bg-warning text-white rounded-circle d-flex align-items-center justify-content-center">
                                                                M</div>
                                                        <div>
                                                                <h6 class="fw-bold mb-0">Michael</h6>
                                                                <p class="small text-muted mb-0">St Kilda</p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>

        <!-- Section 8: Ready for a Spotless Home? -->
        <section class="cta-section py-5" data-aos="zoom-in">
                <div class="container-fluid">
                        <div class="bg-primary-container p-5 rounded-5 text-white text-center shadow-lg">
                                <h2 class="display-4 fw-bold mb-3">Ready for a Spotless Home?</h2>
                                <p class="fs-5 opacity-75 mb-5 mx-auto max-w-600">Join hundreds of Melbourne families who trust
                                        us as
                                        their weekly sanctuary. Simple booking, professional results.</p>
                                <div class="d-flex justify-content-center flex-wrap gap-3">
                                        <a href="#EditModel" data-bs-toggle="modal"
                                                class="btn btn-secondary px-5 py-3 rounded-pill fw-bold">Get
                                                a Free Quote</a>
                                </div>
                        </div>
                </div>
        </section>

@endsection