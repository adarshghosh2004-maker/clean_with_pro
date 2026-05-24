<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>

<body style="margin:0;padding:20px;background:#f5f5f5;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" border="0"
                    style="background:#ffffff;border:1px solid #e5e5e5;">

                    <!-- Header -->

                    <tr>
                        <td align="center" style="background:#4e45b8;padding:25px;color:#ffffff;">

                            <h1 style="margin:0;font-size:24px;">
                                {{ App_Name() }}
                            </h1>

                            <p style="margin:10px 0 0;">
                                Quote Request Received
                            </p>

                        </td>
                    </tr>


                    <!-- Content -->

                    <tr>
                        <td style="padding:30px;color:#333;line-height:1.7;">

                            <p>
                                Dear {{ $details['customer_name'] }},
                            </p>

                            <p>
                                Thank you for submitting your quote request with
                                <strong>{{ App_Name() }}</strong>.
                            </p>

                            <p>
                                We have received your details and our team will review your
                                request shortly. One of our representatives will contact you
                                within 24 hours to discuss your requirements and provide a
                                tailored quote.
                            </p>

                            <hr>

                            @if ($details['is_special_offer'])
                            <table width="100%" cellpadding="15" style="background:#fff3cd;border:1px solid #ffc107;border-radius:4px;margin-bottom:20px;">
                                <tr>
                                    <td style="color:#856404;">
                                        <strong style="font-size:16px;">Special Offer Request</strong>
                                        <p style="margin:8px 0 0;">You've shown interest in our special offers. Our team will contact you shortly with exclusive deals and promotions tailored to your needs.</p>
                                    </td>
                                </tr>
                            </table>
                            @endif

                            <h3>Your Submission Details</h3>

                            <table width="100%" cellpadding="8">

                                <tr>
                                    <td width="35%"><strong>Service</strong></td>
                                    <td>{{ $details['service_name'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Preferred Date</strong></td>
                                    <td>{{ $details['date'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Preferred Time</strong></td>
                                    <td>{{ $details['time'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Suburb</strong></td>
                                    <td>{{ $details['suburb'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Contact</strong></td>
                                    <td>{{ $details['phone'] }}</td>
                                </tr>

                            </table>

                            <hr>

                            <p>
                                If you have any urgent queries, please feel free to
                                contact us.
                            </p>

                            <br>

                            Regards,
                            <br>

                            <strong>{{ App_Name() }}</strong>

                            <br>

                            {{ Setting_Data()['contact'] ?? '' }}

                            <br>

                            {{ Setting_Data()['email'] ?? '' }}

                        </td>
                    </tr>


                    <!-- Footer -->

                    <tr>
                        <td align="center" style="padding:20px;background:#fafafa;color:#777;font-size:13px;">

                            Copyright ©
                            {{ Setting_Data()['company_name'] ?? "Clean With Professionals"}}
                            2026.
                            All rights reserved.

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
