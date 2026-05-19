<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Invoice {{ $invoice_number }}</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    @page {
      size: A4 portrait;
      margin-top: 12mm;
      margin-bottom: 12mm;
      margin-left: 14mm;
      margin-right: 14mm;
    }

    html,
    body {
      font-family: DejaVu Sans, Arial, sans-serif;
      font-size: 8px;
      line-height: 1.4;
      color: #222;
      margin: 20px;
    }

    /* ── HEADER ── */
    .header-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 8px;
      border-bottom: 2px solid #003366;
    }

    .header-table td {
      vertical-align: middle;
      padding: 0 3px 6px 3px;
    }

    .header-logo-cell {
      text-align: center;
      vertical-align: middle;
    }

    .header-logo-cell img {
      max-height: 80px;
      max-width: 200px;
    }

    .contact-info {
      margin-bottom: -40px;
      font-size: 8px;
      color: #444;
      line-height: 1.75;
    }

    .link {
      color: #003366;
    }

    .company-block {
      text-align: right;
    }

    .company-block h2 {
      color: #003366;
      font-size: 11px;
      font-weight: bold;
      margin-bottom: 2px;
    }

    .company-block p {
      font-size: 7px;
      color: #444;
      line-height: 1.75;
    }

    .invoice-meta {
      font-size: 7.5px;
      line-height: 1.75;
    }

    .invoice_size {
      font-size: 13px;
      line-height: 1.75;
      color: #003366;
      font-weight: bold;
    }

    /* ── BOX ── */
    .box {
      border: 1px solid #999;
      padding: 6px 8px;
      vertical-align: top;
    }

    .customer-box,
    .technician-box {
      height: 150px;
    }

    .acknowledgement-box,
    .services-box {
      height: 225px;
    }

    .payment-box,
    .time-box {
      height: 60px;
    }

    .box-title {
      font-size: 6.5px;
      font-weight: bold;
      color: #003366;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      border-bottom: 1px solid #ddd;
      padding-bottom: 3px;
      margin-bottom: 5px;
    }

    .box p {
      font-size: 7.5px;
      line-height: 1.75;
    }

    /* ── SECTION TABLES ── */
    .section-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .section-table td {
      vertical-align: top;
    }

    /* ── SERVICES TABLE ── */
    .services-table {
      width: 100%;
      border-collapse: collapse;
    }

    .services-table thead tr {
      background-color: #003366;
      color: #fff;
    }

    .services-table th {
      padding: 4px 6px;
      font-size: 6.5px;
      border: 0.5px solid #002244;
      text-align: left;
    }

    .services-table th:first-child,
    .services-table td:first-child {
      text-align: center;
      width: 22px;
    }

    .services-table th:last-child,
    .services-table td:last-child {
      text-align: right;
      width: 50px;
    }

    .services-table td {
      padding: 4px 6px;
      font-size: 7.5px;
      border: 0.5px solid #ddd;
    }

    .services-table tbody tr:nth-child(even) {
      background: #f7f9fc;
    }

    .services-table tfoot td {
      background: #edf2f7;
      font-weight: bold;
      padding: 5px 6px;
      border: 0.5px solid #aaa;
      font-size: 7.5px;
    }

    .services-table tfoot td:last-child {
      color: #003366;
    }

    .checkbox {
      display: inline-block;
      width: 9px;
      height: 9px;
      border: 1px solid #555;
      text-align: center;
      line-height: 9px;
      font-size: 9px;
    }

    /* ── SIGNATURE ── */
    .sig-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 4px;
      margin-bottom: 20px;
    }

    .sig-table td {
      text-align: center;
      padding-top: 18px;
      width: 50%;
    }

    .sig-line {
      width: 70%;
      margin: 0 auto;
      border-top: 1px solid #333;
      padding-top: 3px;
      font-size: 7px;
      font-weight: bold;
      color: #333;
    }

    /* ── CONDITIONS ── */
    .conditions {
      border: 1px solid #999;
      padding: 6px 10px;
      margin-bottom: 6px;
    }

    .conditions ol {
      padding-left: 13px;
      font-size: 7px;
      color: #444;
      line-height: 1.9;
    }

    /* ── FOOTER ── */
    .footer {
      text-align: center;
      border-top: 1px solid #ddd;
      padding-top: 5px;
      font-size: 7px;
      color: #999;
      line-height: 1.7;
    }
  </style>
</head>

<body>

  <!-- ══ HEADER ══ -->
  <table class="header-table">
    <tr>
      <td width="28%">
        <div class="contact-info">
          <div><strong>Ph:</strong> {{ Setting_Data()['contact'] ?? '' }}</div>
          <div class="link">{{ Setting_Data()['email'] ?? '' }}</div>
          <div class="link">{{ Setting_Data()['website'] ?? '' }}</div>
        </div>
      </td>
      <td width="44%" class="header-logo-cell">
        @php
      $logoPath = Tab_Icon();
      $logoData = '';
      if (filter_var($logoPath, FILTER_VALIDATE_URL)) {
        $logoContent = @file_get_contents($logoPath);
        if ($logoContent !== false) {
        $mimeType = getimagesizefromstring($logoContent)['mime'] ?? 'image/png';
        $logoData = 'data:' . $mimeType . ';base64,' . base64_encode($logoContent);
        } else {
        $logoData = $logoPath;
        }
      } else {
        $logoData = $logoPath;
      }
      @endphp
        @if($logoData)
      <img src="{{ $logoData }}" alt="Company Logo">
      <div class="invoice_size"><strong>Invoice:</strong> {{ $invoice_number }}</div>
    @endif
      </td>
      <td width="28%" class="company-block">
        <h2>{{ Setting_Data()['company_name'] ?? '' }}</h2>
        <p>ABN {{ Setting_Data()['abn_number'] ?? '' }}</p>
        <p>ACN {{ Setting_Data()['acn_number'] ?? '' }}</p>
        <p>{{ Setting_Data()['address'] ?? '' }}</p>
        <div class="invoice-meta">
          <div><strong>Date:</strong> {{ $invoice_date }}</div>
        </div>
      </td>
    </tr>
  </table>

  <!-- ══ CUSTOMER + TECHNICIAN ══ -->
  <table class="section-table">
    <tr>
      <td width="50%" style="padding-right:4px;">
        <div class="box customer-box">
          <div class="box-title">Customer Details</div>
          <p><strong>Name:</strong> {{ $quote->name }}</p>
          <p><strong>Address:</strong> {{ $quote->suburb ?? '-' }}</p>
          <p><strong>Ph:</strong> {{ $quote->phone ?? '-' }}</p>
          <p><strong>Booking Data:</strong>
            {{ $quote->date ? \Carbon\Carbon::parse($quote->date)->format('d M Y') : '-' }}
          </p>
        </div>
      </td>
      <td width="50%" style="padding-left:4px;">
        <div class="box technician-box">
          <div class="box-title">Technician</div>
          <p>
            {{ $invoice && $invoice->technician_name ? $invoice->technician_name : ($admin ? $admin->user_name : 'N/A') }}
          </p>
          <div style="margin-top:6px;">
            <div class="box-title">Bank Details</div>
            <p>S and N maintenance</p>
            <p>BSB : 013593 &nbsp;&nbsp; <br>ACC : 805715126</p>
          </div>
        </div>
      </td>
    </tr>
  </table>

  <!-- ══ ACKNOWLEDGEMENT + SERVICES ══ -->
  <table class="section-table">
    <tr>
      <td width="33%" style="padding-right:4px;">
        <div class="box acknowledgement-box">
          <p style="margin-bottom:5px;">(1) I acknowledge pre-existing damage and accept responsibility.</p>
          <p style="margin-bottom:5px;">(2) Services completed satisfactorily.</p>
          <p>Customer Signature: ____________</p>
          <p style="text-align:center; color:#cc0000; font-weight:bold; margin-top:8px; font-size:7px;">Thank you for
            your business.</p>
        </div>
      </td>
      <td width="67%" style="padding-left:4px;">
        <div class="box services-box">
          <div class="box-title">Select Services</div>
          <table class="services-table">
            <thead>
              <tr>
                <th>&#10003;</th>
                <th>Service</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              @php
        $staticServices = [
          ['id' => 1, 'title' => 'Domestic Cleaning'],
          ['id' => 2, 'title' => 'End of Lease Cleaning'],
          ['id' => 3, 'title' => 'Carpet Cleaning'],
          ['id' => 4, 'title' => 'Oven Cleaning'],
          ['id' => 5, 'title' => 'Tile Grouting'],
          ['id' => 6, 'title' => 'Mould Treatment'],
          ['id' => 7, 'title' => 'Bathroom/Kitchen Cleaning '],
        ];
        $grandTotal = 0;

        // Build a lookup map from services array by static ID
        $serviceMap = [];
        foreach ($services as $svc) {
          $serviceMap[$svc['id']] = $svc;
        }
        @endphp
              @foreach($staticServices as $index => $service)
            @php
          $staticId = $service['id'];
          $matchedService = $serviceMap[$staticId] ?? null;
          $val = $matchedService ? $matchedService['is_selected'] : 0;
          $isChecked = ($val == 1 || $val === "1" || $val === true);
          $price = (float) ($matchedService['price'] ?? 0);
          if ($isChecked) {
          $grandTotal += $price;
          }
        @endphp
            <tr>
            <td>@if($isChecked)<span class="checkbox">&#10003;</span>@else<span class="checkbox"></span>@endif</td>
            <td>{{ $service['title'] }}</td>
            <td>{{ $isChecked ? '$' . number_format($price, 2) : '' }}</td>
            </tr>
        @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td colspan="2" style="text-align:right;">Grand Total</td>
                <td>${{ number_format($invoice ? $invoice->total : $grandTotal, 2) }}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </td>
    </tr>
  </table>

  <!-- ══ PAYMENT + TIME ══ -->
  <table class="section-table">
    <tr>
      <td width="50%" style="padding-right:4px;">
        <div class="box payment-box">
          <div class="box-title">Payment Method</div>
          <p style="font-size:9px; margin-top:2px;">
            @if($invoice && $invoice->payment_type == 1)
        &#9744; CASH &nbsp;&nbsp;&nbsp;&nbsp; &#9745; CARD &nbsp;&nbsp;&nbsp;&nbsp; &#9744; BANK TRANSFER
      @elseif($invoice && $invoice->payment_type == 2)
        &#9744; CASH &nbsp;&nbsp;&nbsp;&nbsp; &#9744; CARD &nbsp;&nbsp;&nbsp;&nbsp; &#9745; BANK TRANSFER
      @else
        &#9745; CASH &nbsp;&nbsp;&nbsp;&nbsp; &#9744; CARD &nbsp;&nbsp;&nbsp;&nbsp; &#9744; BANK TRANSFER
      @endif
          </p>
        </div>
      </td>
      <td width="50%" style="padding-left:4px;">
        <div class="box time-box">
          <div class="box-title">Given Services</div>
          <p style="font-size:8px; margin-top:2px;">
            {{ $invoice ? $invoice->description : 'N/A' }}
          </p>
        </div>
      </td>
    </tr>
  </table>

  <!-- ══ SIGNATURES ══ -->
  <table class="sig-table">
    <tr>
      <td>
        <div class="sig-line">Customer Signature</div>
      </td>
      <td>
        <div class="sig-line">Technician Signature</div>
      </td>
    </tr>
  </table>

  <!-- ══ CONDITIONS ══ -->
  <div class="conditions">
    <div class="box-title">Condition of Contract</div>
    <ol>
      <li>Company means cleaner and agents.</li>
      <li>Work carried out to highest standards.</li>
      <li>Company not liable for shrinkage.</li>
      <li>Colour fading cannot be restored.</li>
      <li>Quotes by phone are estimates.</li>
      <li>Complaints not accepted after 7 days.</li>
    </ol>
  </div>

  <!-- ══ FOOTER ══ -->
  <div class="footer">
    <p>Thank you for choosing Clean With Professionals</p>
    <p>Generated: {{ now()->format('d M Y H:i') }}</p>
  </div>

</body>

</html>