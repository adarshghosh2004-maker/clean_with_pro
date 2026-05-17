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
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content invoice-modal-content">

      {{-- Header --}}
      <div class="modal-header invoice-modal-header">
        <h5 class="modal-title mb-0" id="invoiceModalLabel">
          <i class="fa-solid fa-file-invoice me-2"></i> MAD ABOUT CLEANING
        </h5>
        <small>Invoice Form</small>
      </div>

      {{-- Body --}}
      <div class="modal-body p-4">

        {{-- Company Info (static) --}}
        <div class="mb-3">
          <strong>S & N MAINTENANCE PTY LTD</strong><br>
          ABN: 123456789<br>
          Address: Melbourne VIC<br>
          Phone: 0400 000 000<br>
          Bank: BSB 013593 | ACC 80571526
        </div>

        {{-- Customer Info --}}
        <h6>Customer Details</h6>
        <div class="row mb-3">
          <div class="col-md-6">
            <label>Name</label>
            <input type="text" class="form-control" name="customer_name" value="Tozan">
          </div>
          <div class="col-md-6">
            <label>Address</label>
            <input type="text" class="form-control" name="customer_address" value="8 Pisa St, Fraser Rise">
          </div>
          <div class="col-md-6 mt-2">
            <label>Phone</label>
            <input type="text" class="form-control" name="customer_phone">
          </div>
          <div class="col-md-6 mt-2">
            <label>Email</label>
            <input type="email" class="form-control" name="customer_email">
          </div>
        </div>

        {{-- Technician Info --}}
        <h6>Technician</h6>
        <input type="text" class="form-control mb-3" name="technician_name" value="Charmy">

        {{-- Services List with Checkboxes --}}
        <h6>Select Services</h6>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Select</th>
              <th>Service</th>
              <th>Hours</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="checkbox" name="services[]" value="Domestic Cleaning" checked></td>
              <td>Domestic Cleaning</td>
              <td><input type="number" class="form-control" name="hours_domestic" value="3"></td>
              <td><input type="number" class="form-control" name="price_domestic" value="174"></td>
              <td><input type="number" class="form-control" name="total_domestic" value="174"></td>
            </tr>
            <tr>
              <td><input type="checkbox" name="services[]" value="Carpet Cleaning"></td>
              <td>Carpet Cleaning</td>
              <td><input type="number" class="form-control" name="hours_carpet"></td>
              <td><input type="number" class="form-control" name="price_carpet"></td>
              <td><input type="number" class="form-control" name="total_carpet"></td>
            </tr>
            <!-- Add more services as needed -->
          </tbody>
        </table>

        {{-- Payment Info --}}
        <h6>Payment</h6>
        <div class="row mb-3">
          <div class="col-md-6">
            <label>Payment Method</label>
            <select class="form-select" name="payment_method">
              <option>Cash</option>
              <option>Card</option>
              <option>Bank Transfer</option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Total Amount</label>
            <input type="number" class="form-control" name="grand_total" value="174">
          </div>
        </div>

        {{-- Carpet Condition --}}
        <h6>Carpet Condition</h6>
        <textarea class="form-control mb-3" name="carpet_condition">No stains, no damage</textarea>

        {{-- Contract Terms --}}
        <h6>Condition of Contract</h6>
        <textarea class="form-control mb-3" name="contract_terms">
Customer responsible for valuables.
Technician not liable for pre-existing damage.
Payment due immediately after service.
        </textarea>

        {{-- Signatures --}}
        <div class="row mt-4">
          <div class="col-md-6">
            <label>Customer Signature</label>
            <input type="text" class="form-control" name="customer_signature">
          </div>
          <div class="col-md-6">
            <label>Technician Signature</label>
            <input type="text" class="form-control" name="technician_signature">
          </div>
        </div>

      </div>

      {{-- Footer --}}
      <div class="modal-footer invoice-modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
          <i class="fa-solid fa-xmark me-1"></i> Close
        </button>
        <button type="submit" class="btn btn-primary btn-sm">
          <i class="fa-solid fa-save me-1"></i> Save Invoice
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
            border-radius: 14px;
            overflow: hidden;
        }

        .invoice-modal-header {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: #fff;
        }

        .invoice-modal-footer {
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .inv-top-banner {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: #fff;
        }

        .inv-company-name {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .inv-company-url {
            font-size: 11px;
            opacity: .65;
        }

        .inv-meta-table {
            border-collapse: collapse;
        }

        .inv-meta-table td {
            padding: 2px 8px;
            font-size: 12px;
            color: #fff;
        }

        .inv-meta-label {
            opacity: .65;
            text-align: right;
        }

        .inv-meta-value {
            font-weight: 700;
            text-align: left;
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

        .inv-info-card {
            background: #f8f9fa;
            border-left: 4px solid #0f3460;
            border-radius: 0 8px 8px 0;
            padding: 14px 18px;
            height: 100%;
        }

        .inv-section-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #0f3460;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .inv-client-name {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 4px;
        }

        .inv-client-detail {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
        }

        .inv-summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 4px 0;
            border-bottom: 1px dashed #dee2e6;
        }

        .inv-summary-row:last-child {
            border-bottom: none;
        }

        .inv-summary-row span {
            color: #888;
        }

        .inv-items-table {
            border-collapse: collapse;
        }

        .inv-items-table thead th {
            background: #0f3460;
            color: #fff;
            font-size: 12px;
            padding: 10px 14px;
            border: none;
        }

        .inv-items-table tbody td {
            padding: 10px 14px;
            border-bottom: 1px solid #e9ecef;
            font-size: 13px;
        }

        .inv-items-table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .inv-total-box {
            width: 250px;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 14px 18px;
        }

        .inv-total-row {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            padding: 4px 0;
        }

        .inv-total-row.total {
            border-top: 2px solid #0f3460;
            margin-top: 6px;
            padding-top: 10px;
            font-size: 15px;
            font-weight: 700;
            color: #0f3460;
        }

        .inv-msg-box {
            background: #f0f4ff;
            border-left: 4px solid #0f3460;
            border-radius: 0 8px 8px 0;
            padding: 12px 16px;
            font-size: 13px;
            color: #444;
            line-height: 1.7;
        }

        .inv-reply-box {
            background: #fff8e1;
            border-left: 4px solid #f59e0b;
            border-radius: 0 8px 8px 0;
            padding: 12px 16px;
            font-size: 13px;
            color: #555;
            line-height: 1.7;
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
            $(document).on('click', '.btn-open-invoice', function () {

                var userId = $(this).data('id');

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
                    url: '{{ url("admin/user") }}/' + userId + '/invoice-data',
                    success: function (resp) {
                        if (resp.status == 200) {

                            // Header
                            $('#modalInvoiceNumber').text(resp.invoice_number);
                            $('#mInvNumber').text(resp.invoice_number);
                            $('#mInvDate').text(resp.invoice_date);
                            $('#mDueDate').text(resp.due_date);

                            // Status badge
                            $('#mStatus')
                                .text(resp.status_label)
                                .attr('class', 'inv-status-badge ' + resp.status_class);

                            // Client info
                            $('#mName').text(resp.name);
                            $('#mEmail').text(resp.email);
                            $('#mPhone').text(resp.phone);
                            $('#mSuburb').text(resp.suburb);

                            // Summary
                            $('#mService').text(resp.service);
                            $('#mDate').text(resp.date);
                            $('#mTime').text(resp.time);

                            // Table row
                            $('#tService').text(resp.service);
                            $('#tSuburb').text(resp.suburb);
                            $('#tDate').text(resp.date);
                            $('#tTime').text(resp.time);
                            $('#tAmount').text(resp.amount ? '$' + resp.amount : '-');

                            // Amount block
                            if (resp.amount) {
                                $('#totalSubtotal').text('$' + resp.amount);
                                $('#totalDue').text('$' + resp.amount);
                                $('#amountBlock').removeClass('d-none');
                            } else {
                                $('#amountBlock').addClass('d-none');
                            }

                            // Message
                            if (resp.msg) {
                                $('#mMsg').text(resp.msg);
                                $('#msgBlock').removeClass('d-none');
                            } else {
                                $('#msgBlock').addClass('d-none');
                            }

                            // Reply
                            if (resp.reply) {
                                $('#mReply').text(resp.reply);
                                $('#replyBlock').removeClass('d-none');
                            } else {
                                $('#replyBlock').addClass('d-none');
                            }

                            // Download button
                            $('#btnDownloadPdf').attr('href', resp.download_url).removeClass('d-none');

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