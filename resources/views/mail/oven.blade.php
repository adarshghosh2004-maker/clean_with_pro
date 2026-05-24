<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>

<body
    style="margin:0;padding:20px;font-family:'Segoe UI',sans-serif;background:linear-gradient(135deg,#e0e7ff,#f5f7fa);">

    <table align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table align="center" cellpadding="0" cellspacing="0"
                    style="max-width:600px;width:100%;background:#ffffff;border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.1);overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td
                            style="padding:30px;background:linear-gradient(135deg,#6d5dfc,#4e45b8);color:#ffffff;text-align:center;">
                            <h1 style="margin:0;font-size:24px;">
                                🧽 {{ App_Name() }}
                            </h1>
                            <p style="margin-top:8px;">
                                Booking Confirmation 🎉
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:20px 30px;color:#000000">

                            <div style="font-size:16px;line-height:1.8;">

                                <p>
                                    Dear {{ $details['customer_name'] }},<br><br>

                                    Thank you for choosing
                                    <strong>{{ App_Name() }}</strong>
                                    for your cleaning service.
                                </p>

                                <p>
                                    Your booking has been successfully confirmed.
                                    Please find the details below:
                                </p>

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>📋 Booking Details</h3>

                                <strong>Customer:</strong> {{ $details['customer_name']}}<br>
                                <strong>Booking No:</strong> {{ $details['booking_number']}}<br>
                                <strong>Date & Time:</strong> {{ $details['date']}}<br>
                                <strong>Service:</strong> Oven Cleaning<br>
                                <strong>Address:</strong> {{ $details['customer_address']}}<br>
                                <strong>Mobile:</strong> {{ $details['customer_mobile_no']}}<br>
                                <strong>Service Cost:</strong> ${{ $details['service_cost']}}

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🧼 Service Booked</h3>

                                Standard Oven Cleaning + FREE Rangehood Cleaning
                                +
                                <br><br>

                                <strong>💲 Total Amount:</strong>
                                ${{ $details['service_cost'] }}

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>✅ Standard Oven Cleaning Checklist</h3>

                                • Deep cleaning of oven interior<br>
                                • Oven door cleaning inside & outside<br>
                                • Oven glass detailing<br>
                                • Removal of grease & burnt residue<br>
                                • Cleaning oven racks & trays<br>
                                • Wipe down of exterior surfaces<br>
                                • Degreasing around oven edges

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🎁 FREE Rangehood Cleaning Service Includes</h3>

                                • Deep scrubbing of the rangehood<br>
                                • Filter cleaning and degreasing<br>
                                • Cleaning underneath and surrounding areas<br>
                                • Exterior wipe down and detailing<br>
                                • Removal of built-up oil, dust & grime

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>📌 Important Notes</h3>

                                • Please ensure electricity/light is not turned off during the service.<br><br>

                                • Oven must be in working condition and able to heat properly by itself.<br><br>

                                • Any cancellation or rescheduling must be advised at least
                                <strong>24 hours</strong>
                                before booking time.

                                <br><br>

                                If you need anything, just message us 👍

                                <br><br>

                                We look forward to assisting you.

                                <br><br>

                                Kind regards,<br>
                                <strong>{{ App_Name() }}</strong><br>
                                📞 {{ Setting_Data()['contact'] ?? ''}}<br>
                                📧 {{ Setting_Data()['email'] ?? ''}}

                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px;background-color:#f8f8f8;text-align:center;font-size:14px;color:#999;">
                            Copyright &copy; {{ Setting_Data()['company_name'] ?? "Clean With Professionals"}} 2026. All
                            rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>