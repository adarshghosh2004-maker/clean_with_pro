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
                                Booking Confirmation
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
                                Thank you for choosing
                                <strong>{{ App_Name() }}</strong>.
                            </p>

                            <p>
                                Your booking details are below:
                            </p>


                            <hr>


                            <h3>Booking Details</h3>

                            <table width="100%" cellpadding="8">

                                <tr>
                                    <td><strong>Customer</strong></td>
                                    <td>{{ $details['customer_name'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Booking No</strong></td>
                                    <td>{{ $details['booking_number'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Date & Time</strong></td>
                                    <td>{{ $details['date'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service</strong></td>
                                    <td>Kitchen Cleaning</td>
                                </tr>

                                <tr>
                                    <td><strong>Address</strong></td>
                                    <td>{{ $details['customer_address'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Mobile</strong></td>
                                    <td>{{ $details['customer_mobile_no'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service Cost</strong></td>
                                    <td>${{ $details['service_cost'] }}</td>
                                </tr>

                            </table>

                            <hr>

                            <h3>Kitchen Cleaning Checklist</h3>

                            <ul>

                                <li>Oven cleaning</li>

                                <li>Stovetop and burner cleaning</li>

                                <li>Rangehood exterior cleaning</li>

                                <li>Splashback cleaning</li>

                                <li>Sink and tap cleaning</li>

                                <li>Bench-top cleaning</li>

                                <li>Cabinet exterior cleaning</li>

                                <li>Switch and handle cleaning</li>

                                <li>Vacuum and floor mopping</li>

                            </ul>


                            <hr>

                            <h3>Important Information</h3>

                            <ul>

                                <li>
                                    Cupboards should be empty if inside
                                    cleaning is required.
                                </li>

                                <li>
                                    Oven should be operational before service.
                                </li>

                                <li>
                                    <strong>Cancellation Policy:</strong> If you cancel or reschedule your service at least 24 hours before the booking date, no charges will apply. If you cancel or reschedule within 24 hours of the booking date, a $60 fine will be charged.
                                </li>

                            </ul>


                            <p>
                                If you have any questions,
                                please contact us.
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
                            {{ Setting_Data()['company_name'] ?? "Clean With Professionals" }}
                            2026

                        </td>

                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>