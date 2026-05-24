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
                                    Dear {{ $details['customer_name'] }},<br>

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
                                <strong>Service:</strong> Carpet Steam Cleaning<br>
                                <strong>Address:</strong> {{ $details['customer_address']}}<br>
                                <strong>Mobile:</strong> {{ $details['customer_mobile_no']}}<br>
                                <strong>Service Cost:</strong> ${{ $details['service_cost']}}

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🧽 Service Booked</h3>

                                Carpet Steam Cleaning

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>✅ Carpet Steam Cleaning Checklist</h3>

                                • Vacuuming of all carpet areas<br>
                                • Pre-treatment of stains & high-traffic areas<br>
                                • Deep steam extraction cleaning<br>
                                • Spot stain removal treatment<br>
                                • Odour neutralising treatment<br>
                                • Carpet fibre grooming for even finish

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>📌 Important Notes</h3>

                                • Quote provided is estimated only — final price may vary depending on carpet size,
                                condition, and quality.<br>

                                • We do not guarantee 100% removal of pet hair, but we will use the best possible
                                techniques to achieve maximum results.<br>

                                • If heavy pet hair removal or hand scrubbing is required, it will be charged as an
                                additional service.<br>

                                • Some stains (old, permanent, or chemical) may not be fully removable.<br>

                                • We are not responsible for pre-existing discolouration or carpet wear.<br>

                                • Furniture marks or shade differences may remain after cleaning.<br>

                                • Any cancellation or rescheduling must be advised at least
                                <strong>24 hours</strong>
                                before booking time.

                                <br>

                                If you need anything, just message us 👍

                                <br>

                                We look forward to assisting you.

                                <br>

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