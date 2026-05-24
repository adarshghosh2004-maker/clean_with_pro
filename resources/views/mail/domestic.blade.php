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
                                {{ App_Name() }}
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
                                    Dear {{ $details['customer_name'] }},
                                    <br>

                                    Thank you for booking your cleaning service with
                                    <strong>{{ App_Name() }}</strong>.
                                </p>

                                <h3>📌 Booking Confirmation</h3>

                                <strong>Customer:</strong> {{ $details['customer_name']}}<br>
                                <strong>Booking No:</strong> {{ $details['booking_number']}}<br>
                                <strong>Date & Time:</strong> {{ $details['date']}}<br>
                                <strong>Service:</strong> 3 Hours Domestic Cleaning<br>
                                <strong>Address:</strong> {{ $details['customer_address']}}<br>
                                <strong>Mobile:</strong> {{ $details['customer_mobile_no']}}<br>
                                <strong>Service Cost:</strong> ${{ $details['service_cost']}}

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🧹 Cleaning Checklist</h3>

                                <strong>General Areas</strong><br>
                                • Light tidy up<br>
                                • Cobweb removal<br>
                                • Empty bins<br>
                                • Dust skirting / window sills / doors<br>
                                • Dust & clean doors<br>
                                • Clean light switches & power points<br>
                                • Dust reachable surfaces<br>
                                • Clean mirrors<br>
                                • Air freshen (optional)<br>
                                • Vacuum under furniture

                                <br>

                                <strong>🍳 Kitchen</strong><br>
                                • Clean stovetop<br>
                                • Clean rangehood exterior<br>
                                • Wipe benchtops<br>
                                • Clean appliances (exterior)<br>
                                • Clean splashback

                                <br>

                                <strong>🚿 Bathroom</strong><br>
                                • Scrub bath<br>
                                • Scrub shower<br>
                                • Scrub sink<br>
                                • Wipe benches<br>
                                • Clean mirrors<br>
                                • Polish chrome<br>
                                • Wipe cupboard exteriors<br>
                                • Empty bins<br>
                                • Clean toilet

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>⚠️ Important Notes</h3>

                                • Two professional cleaners will attend the service at the same time, and booking will
                                be completed within approximately 1.5 hours.<br>

                                • Additional cleaning time beyond the booked duration will be charged at <strong>$70 per
                                    extra hour</strong>.<br>

                                • Cancellation or rescheduling requests must be made at least <strong>24 hours
                                    prior</strong> to the scheduled service time.

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