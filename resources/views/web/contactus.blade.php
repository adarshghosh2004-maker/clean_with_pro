@extends('web.layout.web-layout')

@section('title', 'Contact | Clean With Professionals')
@section('description', 'Get in touch with Clean With Professionals for professional cleaning services in Melbourne. Call or email us today.')
@section('keywords', 'contact cleaning company, Melbourne cleaners contact, cleaning services phone')

@section('content')
    <!-- ========================
                                                         SECTION 1: Contact Hero
                                                    ======================== -->
    <section class="hero-section">
        @foreach ($pages as $key => $value)
            @if ($value['name'] == 'contact')
                <img src="{{ $value['img'] }}" alt="Clean With Professionals Hero Image" class="hero-img">
            @endif

        @endforeach
        <div class="container">
            <h1>{{ __('label.were_here_to_help_you') }} <span>{{ __('label.shine') }}</span></h1>
            <p>{{ __('label.have_questions') }}</p>
        </div>
    </section>

    <!-- ========================
                                                         SECTION 3: Contact Form & Map
                                                    ======================== -->
    <section class="section-padding bg-white" data-anim="fade-up">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Contact Form -->
                <div class="col-lg-12" data-anim="fade-right">
                    <div class="contact-form-wrapper">
                        <h2 class="display-5 fw-bold mb-4">{{ __('label.send_us_a_message') }}</h2>
                        <p class="text-muted mb-5">{{ __('label.fill_out_the_form') }}</p>

                        <form id="quote_form_contact" enctype="multipart/form-data">
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
                                    <label for="contact_time" class="form-label small fw-semibold text-muted">{{ __('label.time_optional') }}</label>
                                    <select name="time" id="contact_time" class="form-control bg-light border-0" required>
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
                                    <label for="contact_service_id" class="form-label small fw-semibold text-muted">{{ __('label.service') }}<span
                                            class="text-danger">*</span></label>
                                    <select name="service_id" id="contact_service_id" class="form-control bg-light border-0">
                                        <option value="">{{ __('label.select_service') }}</option>
                                        @foreach ($services as $key => $value)
                                            <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-muted">{{ __('label.your_message_optional') }}</label>
                                    <textarea class="form-control bg-light border-0" name="msg" rows="3"
                                        placeholder="{{ __('label.briefly_describe') }}"></textarea>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="button" onclick="save_quote('quote_form_contact')"
                                        class="btn btn-primary-blue btn-lg w-100 rounded-3 fw-bold shadow-sm">{{ __('label.send_request') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================
                                SECTION 2: Contact Info Cards
                                ======================== -->
    <section class="contact-info-section" data-anim="fade-up">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!-- Phone -->
                <div class="col-md-3" data-anim="fade-up" data-anim-delay="100">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('label.call_us') }}</h4>
                        <p class="text-muted mb-4">{{ __('label.direct_line') }}</p>
                        <a href="tel:{{ Setting_Data()['contact'] ?? "+61468460145"}}"
                            class="text-secondary fw-bold fs-5 text-decoration-none">{{ Setting_Data()['contact'] ?? "+61468460145" }}</a>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-3" data-anim="fade-up" data-anim-delay="200">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('label.email_us') }}</h4>
                        <p class="text-muted mb-4">{{ __('label.send_us_your_details') }}</p>
                        <a href="https://mail.google.com/mail/?view=cm&to={{ Setting_Data()['email'] ?? 'info@cleanwithpro.com.au' }}"
                            target="_blank" class="text-secondary fw-bold fs-5 text-decoration-none">
                            {{ Setting_Data()['email'] ?? "info@cleanwithpro.com.au" }}
                        </a>
                    </div>
                </div>
                <!-- Address -->
                <div class="col-md-3" data-anim="fade-up" data-anim-delay="300">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('label.our_office') }}</h4>
                        <p class="text-muted mb-4">
                            {{ Setting_Data()['address'] ?? "21 McMillan St, Clayton South, VIC 3169, Australia" }}
                        </p>
                    </div>
                </div>
                <!-- Timing -->
                <div class="col-md-3" data-anim="fade-up" data-anim-delay="300">
                    <div class="contact-card text-center">
                        <div class="contact-icon-box mx-auto">
                            <span class="material-symbols-outlined">access_time</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('label.business_hours') }}</h4>
                        <p class="text-muted mb-4">{!! __('label.monday_saturday') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- ========================
                                                         SECTION 5: CTA
                                                    ======================== -->
    <section class="cta-section-new" data-anim="fade-up">
        <div class="container" data-anim="zoom-in">
            <h2 class="display-4 fw-bold mb-4">{{ __('label.ready_to_start') }}</h2>
            <p class="fs-5 opacity-75 mb-5">{{ __('label.join_happy') }}</p>
            <div class="cta-buttons">
                <a href="#EditModel" data-bs-toggle="modal" class="btn btn-secondary px-5 py-3">{{ __('label.book_now') }}</a>
                <a href="tel:+61468460145" class="btn btn-outline-white px-5 py-3">{{ __('label.call_support') }}</a>
            </div>
        </div>
    </section>

@endsection