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
                                    <td>Standard Oven Cleaning</td>
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

                            <h3>STANDARD OVEN CLEANING CHECKLIST</h3>

                            <ul>

                                <li>Deep cleaning of oven interior</li>

                                <li>Oven door cleaning – inside & outside</li>

                                <li>Oven glass detailing</li>

                                <li>Removal of grease & burnt residue</li>

                                <li>Cleaning oven racks & trays</li>

                                <li>Wipe-down of exterior surfaces</li>

                                <li>Degreasing around oven edges</li>

                            </ul>


                            <hr>

                            <h3>FREE RANGEHOOD CLEANING SERVICE INCLUDED</h3>

                            <p>
                                As part of your booking, we are pleased to provide a
                                FREE Rangehood Cleaning Service, including:
                            </p>

                            <ul>

                                <li>Deep scrubbing of the rangehood</li>

                                <li>Filter cleaning and degreasing</li>

                                <li>Cleaning underneath and surrounding areas</li>

                                <li>Exterior wipe-down and detailing</li>

                                <li>Removal of built-up oil, dust & grime</li>

                            </ul>


                            <hr>

                            <h3>PARKING REQUIREMENT</h3>

                            <p>
                                To ensure our team can arrive and begin the service on time,
                                please ensure suitable parking is available for our cleaning
                                vehicle at or near the property.
                            </p>

                            <p>


                                Parking arrangements and any applicable parking costs are the
                                customer's responsibility. If a permit or other parking
                                arrangement is required, please have this organised prior to
                                our arrival.
                            </p>

                            <hr>

                            <h3>CANCELLATION & RESCHEDULING POLICY</h3>

                            <p>
                                Any cancellation or rescheduling request must be made at least
                                24 hours prior to the scheduled service time.
                            </p>

                            <p>
                                Requests made with less than 24 hours' notice may be subject to
                                cancellation charges.
                            </p>

                            <p>
                                If you need to make any changes to your booking, please contact
                                us as soon as possible.
                            </p>


                            <p>
                                Thank you for choosing Clean With Professionals.
                                We appreciate your business and look forward to providing
                                you with a professional and high-quality cleaning service.
                            </p>

                            <br>

                            Kind regards,
                            <br>

                            <strong>Clean With Professionals</strong>

                            <br>

                            0468 406 085

                            <br>

                            info@cleanwithpro.com.au

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