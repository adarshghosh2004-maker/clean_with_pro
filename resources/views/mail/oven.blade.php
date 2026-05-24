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
                                <strong>{{ App_Name() }}</strong>
                                for your cleaning service.
                            </p>

                            <p>
                                Your booking has been confirmed.
                                Please find your booking details below:
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
                                    <td>Oven Cleaning</td>
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

                            <h3>Service Booked</h3>

                            <p>
                                Standard Oven Cleaning + FREE Rangehood Cleaning
                            </p>

                            <p>
                                <strong>Total Amount:</strong>
                                ${{ $details['service_cost'] }}
                            </p>

                            <hr>

                            <h3>Standard Oven Cleaning Checklist</h3>

                            <ul>

                                <li>Deep cleaning of oven interior</li>

                                <li>Oven door cleaning inside & outside</li>

                                <li>Oven glass detailing</li>

                                <li>Removal of grease and burnt residue</li>

                                <li>Cleaning oven racks & trays</li>

                                <li>Wipe down of exterior surfaces</li>

                                <li>Degreasing around oven edges</li>

                            </ul>


                            <hr>

                            <h3>FREE Rangehood Cleaning Service Includes</h3>

                            <ul>

                                <li>Deep scrubbing of the rangehood</li>

                                <li>Filter cleaning and degreasing</li>

                                <li>Cleaning underneath and surrounding areas</li>

                                <li>Exterior wipe down and detailing</li>

                                <li>Removal of built-up oil, dust and grime</li>

                            </ul>


                            <hr>

                            <h3>Important Information</h3>

                            <ul>

                                <li>
                                    Please ensure electricity/light remains on during service.
                                </li>

                                <li>
                                    Oven must be in working condition and able to heat properly.
                                </li>

                                <li>
                                    Cancellation or rescheduling requests should be made at least
                                    24 hours before booking time.
                                </li>

                            </ul>


                            <p>
                                If you need any assistance,
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