@extends('admin.layout.page-app')
@section('page_title', __('label.quotes'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm"> {{__('label.user')}} </h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{__('label.quotes')}}
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Search -->
            <div class="page-search mb-3">
                <div class="input-group" title="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa-solid fa-magnifying-glass fa-xl light-gray"></i>
                        </span>
                    </div>
                    <input type="text" id="input_search" class="form-control" placeholder="{{__('label.search_user')}}"
                        aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="table-responsive table">
                <table class="table table-striped text-center table-bordered" id="datatable">
                    <thead>
                        <tr class="table-bg">
                            <th> {{__('label.#')}} </th>
                            <th> {{__('label.name')}} </th>
                            <th> {{__('label.email')}} </th>
                            <th> {{__('label.phone')}} </th>
                            <th> {{__('label.suburb')}} </th>
                            <th> {{__('label.date')}} </th>
                            <th> {{__('label.time')}} </th>
                            <th> {{__('label.service')}} </th>
                            <th> {{__('label.msg')}} </th>
                            <th> {{__('label.status')}} </th>
                            <th> {{__('label.action')}} </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════
    INVOICE MODAL
    ════════════════════════════════════════════════ --}}
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 70%;">
            <div class="modal-content invoice-modal-content">

                {{-- Header --}}
                <div class="modal-header invoice-modal-header">
                    <h5 class="modal-title mb-0" id="invoiceModalLabel">
                        <i class="fa-solid fa-file-invoice me-2"></i> Invoice
                    </h5>
                </div>

                {{-- Body --}}
                <div class="modal-body p-4">

                    {{-- Loading Spinner --}}
                    <div id="invoiceSpinner" class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading invoice data...</p>
                    </div>

                    {{-- Error Message --}}
                    <div id="invoiceError" class="alert alert-danger d-none">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Failed to load invoice data.
                    </div>

                    {{-- Invoice Content --}}
                    <div id="invoiceContent" class="d-none">

                        {{-- Top Section: Logo & Company Info --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="company-logo-section">
                                    <img src="{{ asset('assets/imgs/CWPss.png') }}" alt="Mad About Cleaning"
                                        class="company-logo" style="max-height: 80px;">
                                    <div class="mt-2">
                                        <strong id="company_phone_1">Ph.
                                            {{ Setting_Data()['contact'] ?? '0435811838' }}</strong><br>
                                        <a href="{{ Setting_Data()['website'] ?? '' }}"
                                            id="company_website" target="_blank">{{ Setting_Data()['website'] ?? '' }}</a><br>
                                        <a href="mailto:{{ Setting_Data()['email'] ?? '' }}"
                                            id="company_email">{{ Setting_Data()['email'] ?? ''}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <div class="company-details-section">
                                    <h4 class="company-name-header" id="company_name">
                                        {{ Setting_Data()['company_name'] ?? 'MAD ABOUT CLEANING' }}</h4>
                                    <p class="mb-1" id="company_abn">ABN {{ Setting_Data()['abn_number'] ?? '' }}</p>
                                    <p class="mb-1" id="company_acn">ACN {{ Setting_Data()['acn_number'] ?? '' }}</p>
                                    <p class="mb-1" id="company_address">
                                        {{ Setting_Data()['address'] ?? '' }}</p>
                                    <p class="mb-0">Date : <input type="date" id="inv_date"
                                            class="form-control d-inline-block" style="width: auto;"></p>
                                    <p class="mb-0">Invoice No: <span id="modalInvoiceNumber"></span></p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Customer & Technician Details --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="section-title">CUSTOMER DETAILS</h6>
                                    <div class="mb-2">
                                        <label class="form-label small">Name:</label>
                                        <input type="text" class="form-control form-control-sm" id="inv_customer_name"
                                            readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label small">Address:</label>
                                        <textarea class="form-control form-control-sm" id="inv_customer_address" rows="2"
                                            readonly></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label small">Ph:</label>
                                        <input type="text" class="form-control form-control-sm" id="inv_customer_phone"
                                            readonly>
                                    </div>
                                    <div>
                                        <label class="form-label small">Booking Date:</label>
                                        <input type="text" class="form-control form-control-sm" id="inv_booking_date"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="section-title">TECHNICIAN NAME:</h6>
                                    <input type="text" class="form-control form-control-sm mb-2" id="inv_technician_name">

                                    <h6 class="section-title mt-3">BANK DETAILS:</h6>
                                    <p class="mb-1">BSB:- <span id="bank_bsb">{{ Setting_Data()['bsb'] ?? ''}}</span></p>
                                    <p class="mb-0">ACC:- <span id="bank_acc">{{ Setting_Data()['account_number'] ?? '' }}</span></p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Services Section --}}
                        <div class="services-section mb-3">
                            <h6 class="section-title">SELECT SERVICES</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm services-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%;">✓</th>
                                            <th style="width: 62%;">Service</th>
                                            <th style="width: 30%;">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="services_tbody">
                                        {{-- Static services populated by JS --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

                        {{-- Total Hours & Payment Section --}}
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="info-box">
                                    <h6 class="section-title">TIME SPEND (HOURS)</h6>
                                    <input type="number" class="form-control form-control-sm" id="inv_total_hours" value="0"
                                        min="0" step="0.5" placeholder="e.g. 2, 3, 2.5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box">
                                    <h6 class="section-title">PAYMENT METHOD</h6>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="pay_cash"
                                            value="cash" checked>
                                        <label class="form-check-label" for="pay_cash">CASH</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="pay_card"
                                            value="card">
                                        <label class="form-check-label" for="pay_card">CARD</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-box">
                                    <h6 class="section-title">GRAND TOTAL</h6>
                                    <input type="number" class="form-control form-control-sm" id="inv_grand_total" value="0"
                                        step="0.01" readonly>
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Signature Section --}}
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="signature-box">
                                    <p class="text-center mb-2">Customer Signature</p>
                                    <div class="signature-line"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="signature-box">
                                    <p class="text-center mb-2">Technician Signature (Sign after print)</p>
                                    <div class="signature-line"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Footer --}}
                <div class="modal-footer invoice-modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark me-1"></i> Close
                    </button>
                    <a href="#" id="btnDownloadPdf" class="btn btn-success btn-sm d-none" target="_blank">
                        <i class="fa-solid fa-download me-1"></i> Download Invoice
                    </a>
                    <button type="button" class="btn btn-primary btn-sm" id="btnSaveInvoice">
                        <i class="fa-solid fa-save me-1"></i> Save & Download
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- ═══════ END INVOICE MODAL ═══════ --}}

@endsection

@section('pagescript')
    <style>
        /* ── Invoice Modal Styles ── */
        .invoice-modal-content {
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }

        .invoice-modal-header {
            background: #0f3460;
            color: #fff;
            border-bottom: 2px solid #1a4a7a;
        }

        .invoice-modal-footer {
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .company-logo-section {
            padding: 10px;
        }

        .company-logo {
            max-height: 80px;
        }

        .company-details-section {
            text-align: right;
        }

        .company-name-header {
            color: #0f3460;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .info-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            height: 100%;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            color: #0f3460;
            margin-bottom: 10px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 5px;
        }

        .services-table {
            font-size: 13px;
        }

        .services-table thead th {
            background: #0f3460;
            color: #fff;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
        }

        .services-table tbody td {
            vertical-align: middle;
        }

        .services-table input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .services-table input[type="number"] {
            text-align: right;
        }

        .signature-box {
            text-align: center;
            padding: 20px;
        }

        .signature-line {
            border-top: 2px solid #333;
            width: 80%;
            margin: 0 auto;
            padding-top: 5px;
        }

        .form-control-sm,
        .form-select-sm {
            font-size: 13px;
        }

        .inv-status-badge {
            display: inline-block;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-confirmed {
            background: #d1e7dd;
            color: #0f5132;
        }

        .badge-completed {
            background: #cfe2ff;
            color: #084298;
        }
    </style>

    <script>
        $(document).ready(function () {

            var table = $('#datatable').DataTable({
                dom: "<'top'f>rt<'row'<'col-2'i><'col-1'l><'col-9'p>>",
                searching: false,
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                lengthMenu: [[10, 100, 1000, -1], [10, 100, 1000, "All"]],
                language: {
                    paginate: {
                        previous: "<i class='fa-solid fa-chevron-left'></i>",
                        next: "<i class='fa-solid fa-chevron-right'></i>"
                    }
                },
                ajax: {
                    url: "{{ route('admin.user.index') }}",
                    data: function (d) {
                        d.input_search = $('#input_search').val();
                    },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'email', name: 'email', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'phone', name: 'phone', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'suburb', name: 'suburb', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'date', name: 'date', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'time', name: 'time', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'service', name: 'service', render: (d) => d ? d.title : '-' },
                    { data: 'msg', name: 'msg', orderable: false, searchable: false, render: d => d ? d : '-' },
                    { data: 'status', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
            });

            $('#input_search').keyup(function () {
                table.draw();
            });

            // ── Invoice Modal Trigger ──────────────────────────────────────
            var currentQuoteId = null;

            $(document).on('click', '.btn-open-invoice', function () {

                currentQuoteId = $(this).data('id');

                // Reset modal state
                $('#invoiceSpinner').removeClass('d-none');
                $('#invoiceContent').addClass('d-none');
                $('#invoiceError').addClass('d-none');
                $('#btnDownloadPdf').addClass('d-none');
                $('#modalInvoiceNumber').text('');

                // Open modal
                var modal = new bootstrap.Modal(document.getElementById('invoiceModal'));
                modal.show();

                // Fetch invoice data
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    url: '{{ url("admin/user") }}/' + currentQuoteId + '/invoice-data',
                    success: function (resp) {
                        if (resp.status == 200) {

                            // Set invoice number
                            $('#modalInvoiceNumber').text(resp.invoice_number);

                            // Set date to today
                            var today = new Date().toISOString().split('T')[0];
                            $('#inv_date').val(today);

                            // Customer details (readonly)
                            $('#inv_customer_name').val(resp.name || '');
                            $('#inv_customer_address').val(resp.suburb || '');
                            $('#inv_customer_phone').val(resp.phone || '-');

                            // Technician details (readonly)
                            $('#inv_technician_name').val(resp.technician_name || 'N/A');

                            // Populate services (9 static services)
                            var staticServices = [
                                { id: 1, title: 'Carpet Cleaning' },
                                { id: 2, title: 'Rug Cleaning' },
                                { id: 3, title: 'Upholstery Cleaning' },
                                { id: 4, title: 'Mattress Cleaning' },
                                { id: 5, title: 'Tile & Grout Cleaning' },
                                { id: 6, title: 'Stain Removal' },
                                { id: 7, title: 'Odour Removal' },
                                { id: 8, title: 'Steam Cleaning' },
                                { id: 9, title: 'End of Lease Cleaning' }
                            ];

                            var servicesHtml = '';
                            staticServices.forEach(function (service, index) {
                                var apiService = resp.services && resp.services[index] ? resp.services[index] : {};
                                var isChecked = apiService.is_selected ? 'checked' : '';
                                var price = apiService.price || 0;
                                var isDisabled = apiService.is_selected ? '' : 'disabled';

                                servicesHtml += '<tr data-service-index="' + index + '">';
                                servicesHtml += '<td class="text-center"><input type="checkbox" class="service-checkbox" data-index="' + index + '" ' + isChecked + '></td>';
                                servicesHtml += '<td>' + service.title + '</td>';
                                servicesHtml += '<td><input type="number" class="form-control form-control-sm service-price" data-index="' + index + '" value="' + price + '" min="0" step="0.01" ' + isDisabled + '></td>';
                                servicesHtml += '</tr>';
                            });
                            $('#services_tbody').html(servicesHtml);

                            // Set booking date
                            $('#inv_booking_date').val(resp.booking_date || '-');

                            // Set total hours (time_spend)
                            $('#inv_total_hours').val(resp.time_spend || 0);

                            // Set payment method
                            if (resp.payment_method == 'card') {
                                $('#pay_card').prop('checked', true);
                            } else {
                                $('#pay_cash').prop('checked', true);
                            }

                            // Set grand total
                            $('#inv_grand_total').val(resp.total || 0);

                            // Toggle price input disabled state on checkbox change
                            $(document).on('change', '.service-checkbox', function () {
                                var index = $(this).data('index');
                                var priceInput = $('.service-price[data-index="' + index + '"]');
                                if ($(this).is(':checked')) {
                                    priceInput.prop('disabled', false).focus();
                                } else {
                                    priceInput.prop('disabled', true).val(0);
                                }
                                calculateGrandTotal();
                            });

                            // Calculate totals on input change
                            $('.service-price, .service-checkbox').on('input change', function () {
                                calculateGrandTotal();
                            });

                            function calculateGrandTotal() {
                                var grandTotal = 0;

                                $('.service-checkbox').each(function () {
                                    var index = $(this).data('index');
                                    if ($(this).is(':checked')) {
                                        var price = parseFloat($('.service-price[data-index="' + index + '"]').val()) || 0;
                                        grandTotal += price;
                                    }
                                });

                                $('#inv_grand_total').val(grandTotal.toFixed(2));
                            }

                            // Show content
                            $('#invoiceSpinner').addClass('d-none');
                            $('#invoiceContent').removeClass('d-none');

                        } else {
                            $('#invoiceSpinner').addClass('d-none');
                            $('#invoiceError').removeClass('d-none');
                        }
                    },
                    error: function () {
                        $('#invoiceSpinner').addClass('d-none');
                        $('#invoiceError').removeClass('d-none');
                    }
                });
            });

            // ─ Save Invoice Button ──────────────────────────────────────
            $('#btnSaveInvoice').on('click', function () {
                if (!currentQuoteId) {
                    alert('No quote selected');
                    return;
                }

                var staticServices = [
                    { id: 1, title: 'Carpet Cleaning' },
                    { id: 2, title: 'Rug Cleaning' },
                    { id: 3, title: 'Upholstery Cleaning' },
                    { id: 4, title: 'Mattress Cleaning' },
                    { id: 5, title: 'Tile & Grout Cleaning' },
                    { id: 6, title: 'Stain Removal' },
                    { id: 7, title: 'Odour Removal' },
                    { id: 8, title: 'Steam Cleaning' },
                    { id: 9, title: 'End of Lease Cleaning' }
                ];

                // Collect services data
                var services = [];
                var grandTotal = 0;

                $('.service-checkbox').each(function () {
                    var index = $(this).data('index');
                    var isChecked = $(this).is(':checked');
                    var price = parseFloat($('.service-price[data-index="' + index + '"]').val()) || 0;

                    if (isChecked) {
                        grandTotal += price;
                    }

                    services.push({
                        service_id: staticServices[index] ? staticServices[index].id : 0,
                        title: staticServices[index] ? staticServices[index].title : '',
                        is_selected: isChecked,
                        price: price
                    });
                });

                // Collect form data
                var invoiceData = {
                    quote_id: currentQuoteId,
                    invoice_date: $('#inv_date').val(),
                    time_spend: parseFloat($('#inv_total_hours').val()) || 0,
                    payment_method: $('input[name="payment_method"]:checked').val(),
                    grand_total: grandTotal,
                    technician_name: $('#inv_technician_name').val(),
                    services: services
                };

                // Show loader
                $('#dvloader').show();

                // Save invoice
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'POST',
                    url: '{{ route("admin.user.invoice.save") }}',
                    data: invoiceData,
                    success: function (resp) {
                        if (resp.status == 200) {
                            // Download PDF as blob in same page
                            fetch(resp.download_url, {
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                                .then(response => response.blob())
                                .then(blob => {
                                    const url = window.URL.createObjectURL(blob);
                                    const a = document.createElement('a');
                                    a.href = url;
                                    a.download = resp.download_url.split('/').pop() || 'invoice.pdf';
                                    document.body.appendChild(a);
                                    a.click();
                                    window.URL.revokeObjectURL(url);
                                    document.body.removeChild(a);

                                    // Close modal after download
                                    var modal = bootstrap.Modal.getInstance(document.getElementById('invoiceModal'));
                                    modal.hide();

                                    $('#dvloader').hide();
                                })
                                .catch(err => {
                                    alert('Error downloading PDF. Please try again.');
                                    $('#dvloader').hide();
                                });
                        } else {
                            alert('Error saving invoice: ' + (resp.errors || 'Unknown error'));
                            $('#dvloader').hide();
                        }
                    },
                    error: function () {
                        alert('Error saving invoice. Please try again.');
                        $('#dvloader').hide();
                    }
                });
            });

        });

        function change_status(id, Status) {
            var CheckAdmin = '<?php echo Demo_Mode(); ?>';
            if (CheckAdmin == 1) {
                $('#dvloader').show();
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'GET',
                    url: '{{ route("admin.user.show", ':id') }}'.replace(':id', id),
                    data: { id: id },
                    success: function (resp) {
                        $("#dvloader").hide();
                        if (resp.status == 200) {
                            toastr.success(resp.success);
                        } else {
                            toastr.error(resp.errors);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $('#dvloader').hide();
                        toastr.error(errorThrown, textStatus);
                    }
                });
            } else {
                toastr.error('{{__("label.you_have_no_right_to_add_edit_and_delete")}}');
            }
        }

        $(document).on('change', '.status-checkbox', function () {
            var id = $(this).attr('data-id');
            change_status(id);
        });
    </script>
@endsection