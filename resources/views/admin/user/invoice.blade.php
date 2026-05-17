<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $invoice_number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 13px;
            color: #333;
            background: #fff;
        }

        /* ── Header ── */
        .inv-header {
            background: #0f3460;
            color: #fff;
            padding: 30px 40px;
        }
        .inv-header-row {
            width: 100%;
        }
        .inv-header-row td {
            vertical-align: top;
        }
        .company-name {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .company-url {
            font-size: 11px;
            opacity: .7;
            margin-top: 3px;
        }
        .inv-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            text-align: right;
        }
        .inv-meta {
            margin-top: 8px;
            width: 100%;
            border-collapse: collapse;
        }
        .inv-meta td {
            padding: 2px 6px;
            font-size: 12px;
            color: #fff;
        }
        .inv-meta .label { opacity: .65; text-align: right; }
        .inv-meta .value { font-weight: 700; text-align: left; }

        /* ── Status pill ── */
        .status-pill {
            display: inline-block;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }
        .status-0 { background: #fff3cd; color: #856404; }
        .status-1 { background: #d1e7dd; color: #0f5132; }
        .status-2 { background: #cfe2ff; color: #084298; }

        /* ── Body ── */
        .body-wrap { padding: 28px 40px; }

        /* ── Info grid ── */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .info-table td { vertical-align: top; width: 50%; padding-right: 16px; }
        .info-table td:last-child { padding-right: 0; }

        .info-card {
            background: #f8f9fa;
            border-left: 4px solid #0f3460;
            padding: 14px 16px;
        }
        .section-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #0f3460;
            font-weight: 700;
            margin-bottom: 8px;
            padding-bottom: 4px;
            border-bottom: 1px solid #dee2e6;
        }
        .client-name   { font-size: 15px; font-weight: 700; color: #1a1a2e; margin-bottom: 4px; }
        .client-detail { font-size: 12px; color: #555; line-height: 1.8; }

        .summary-row {
            display: table;
            width: 100%;
            font-size: 12px;
            padding: 4px 0;
            border-bottom: 1px dashed #dee2e6;
        }
        .summary-row:last-child { border-bottom: none; }
        .summary-label { display: table-cell; color: #888; width: 50%; }
        .summary-value { display: table-cell; font-weight: 600; color: #222; text-align: right; }

        /* ── Items table ── */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        .items-table thead th {
            background: #0f3460;
            color: #fff;
            padding: 9px 12px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .05em;
            text-align: left;
        }
        .items-table thead th:last-child { text-align: right; }
        .items-table tbody td {
            padding: 10px 12px;
            border-bottom: 1px solid #e9ecef;
            font-size: 13px;
        }
        .items-table tbody td:last-child { text-align: right; font-weight: 700; }
        .items-table tbody tr:nth-child(even) { background: #f8f9fa; }

        /* ── Total box ── */
        .total-wrap { text-align: right; margin-bottom: 24px; }
        .total-box  {
            display: inline-block;
            width: 240px;
            background: #f8f9fa;
            padding: 14px 16px;
        }
        .total-row {
            display: table;
            width: 100%;
            font-size: 13px;
            padding: 4px 0;
        }
        .total-row .tl { display: table-cell; color: #888; }
        .total-row .tr { display: table-cell; text-align: right; font-weight: 600; }
        .total-row.grand {
            border-top: 2px solid #0f3460;
            margin-top: 6px;
            padding-top: 10px;
            font-size: 15px;
        }
        .total-row.grand .tl,
        .total-row.grand .tr { font-weight: 700; color: #0f3460; }

        /* ── Message / Reply ── */
        .msg-label  { font-size: 10px; text-transform: uppercase; letter-spacing: .08em; color: #0f3460; font-weight: 700; margin-bottom: 6px; }
        .msg-box    { background: #f0f4ff; border-left: 4px solid #0f3460; padding: 12px 14px; font-size: 13px; color: #444; line-height: 1.7; margin-bottom: 16px; }
        .reply-box  { background: #fff8e1; border-left: 4px solid #f59e0b; padding: 12px 14px; font-size: 13px; color: #555; line-height: 1.7; margin-bottom: 16px; }

        /* ── Footer ── */
        .inv-footer {
            border-top: 1px solid #e9ecef;
            padding: 14px 40px;
            font-size: 11px;
            color: #aaa;
        }
        .inv-footer table { width: 100%; border-collapse: collapse; }
        .inv-footer td:last-child { text-align: right; }
    </style>
</head>
<body>

{{-- ── HEADER ── --}}
<div class="inv-header">
    <table class="inv-header-row" style="width:100%; border-collapse:collapse;">
        <tr>
            <td>
                <div class="company-name">{{ config('app.name', 'Your Company') }}</div>
                <div class="company-url">{{ config('app.url') }}</div>
            </td>
            <td style="text-align:right;">
                <div class="inv-title">Invoice</div>
                <table class="inv-meta" style="margin-left:auto;">
                    <tr>
                        <td class="label">Invoice No.</td>
                        <td class="value">{{ $invoice_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">Date</td>
                        <td class="value">{{ $invoice_date }}</td>
                    </tr>
                    <tr>
                        <td class="label">Due Date</td>
                        <td class="value">{{ $due_date }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status</td>
                        <td class="value">
                            <span class="status-pill status-{{ $quote->status }}">
                                {{ $status_label }}
                            </span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

{{-- ── BODY ── --}}
<div class="body-wrap">

    {{-- Bill-To + Summary --}}
    <table class="info-table">
        <tr>
            <td>
                <div class="info-card">
                    <div class="section-label">Bill To</div>
                    <div class="client-name">{{ $quote->name }}</div>
                    <div class="client-detail">{{ $quote->email }}</div>
                    <div class="client-detail">{{ $quote->phone ?? '-' }}</div>
                    <div class="client-detail">{{ $quote->suburb ?? '-' }}</div>
                </div>
            </td>
            <td>
                <div class="info-card">
                    <div class="section-label">Quote Summary</div>
                    <div class="summary-row">
                        <span class="summary-label">Service</span>
                        <span class="summary-value">{{ $quote->service->title ?? '-' }}</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Scheduled Date</span>
                        <span class="summary-value">
                            {{ $quote->date ? \Carbon\Carbon::parse($quote->date)->format('d M Y') : '-' }}
                        </span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Scheduled Time</span>
                        <span class="summary-value">{{ $quote->time ?? '-' }}</span>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    {{-- Service Items Table --}}
    <div class="section-label" style="margin-bottom:8px;">Service Details</div>
    <table class="items-table">
        <thead>
            <tr>
                <th style="width:35%;">Service</th>
                <th>Suburb</th>
                <th>Date</th>
                <th>Time</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $quote->service->title ?? '-' }}</td>
                <td>{{ $quote->suburb ?? '-' }}</td>
                <td>{{ $quote->date ? \Carbon\Carbon::parse($quote->date)->format('d M Y') : '-' }}</td>
                <td>{{ $quote->time ?? '-' }}</td>
                <td>{{ $quote->amount ? '$' . number_format($quote->amount, 2) : '-' }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Total --}}
    @if($quote->amount)
    <div class="total-wrap">
        <div class="total-box">
            <div class="total-row">
                <span class="tl">Subtotal</span>
                <span class="tr">${{ number_format($quote->amount, 2) }}</span>
            </div>
            <div class="total-row">
                <span class="tl">Tax (0%)</span>
                <span class="tr">$0.00</span>
            </div>
            <div class="total-row grand">
                <span class="tl">Total Due</span>
                <span class="tr">${{ number_format($quote->amount, 2) }}</span>
            </div>
        </div>
    </div>
    @endif

    {{-- Customer Message --}}
    @if($quote->msg)
    <div class="msg-label">Customer Message</div>
    <div class="msg-box">{{ $quote->msg }}</div>
    @endif

    {{-- Admin Reply --}}
    @if($quote->reply)
    <div class="msg-label">Admin Reply / Notes</div>
    <div class="reply-box">{{ $quote->reply }}</div>
    @endif

</div>

{{-- ── FOOTER ── --}}
<div class="inv-footer">
    <table>
        <tr>
            <td>Generated on {{ now()->format('d M Y, H:i') }}</td>
            <td>{{ $invoice_number }} &bull; {{ config('app.name') }}</td>
        </tr>
    </table>
</div>

</body>
</html>