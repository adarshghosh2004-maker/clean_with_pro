<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>

<body style="margin:0;padding:20px;background:#f5f5f5;font-family:Arial,sans-serif;">

    @php
        $bookingParts = explode(' ', $details['date'], 2);
        $service_date = trim($bookingParts[0] ?? $details['date']);
        $service_time = trim($bookingParts[1] ?? '');
    @endphp

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
                                BOOKING CONFIRMATION
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
                                    <td><strong>Booking Number</strong></td>
                                    <td>{{ $details['booking_number'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Customer Name</strong></td>
                                    <td>{{ $details['customer_name'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Contact Number</strong></td>
                                    <td>{{ $details['customer_mobile_no'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Property Address</strong></td>
                                    <td>{{ $details['customer_address'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service Date</strong></td>
                                    <td>{{ $service_date }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service Time</strong></td>
                                    <td>{{ $service_time }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service Cost</strong></td>
                                    <td>${{ $details['service_cost'] }}</td>
                                </tr>

                            </table>

                            <hr>

                            <h3>Service Booked</h3>

                            <p>
                                Standard Bathroom Cleaning
                            </p>

                            <hr>

                            <h3>STANDARD BATHROOM CLEANING CHECKLIST</h3>

                            <ul>

                                <li>Shower screen cleaning</li>

                                <li>Shower tiles and grout scrubbing</li>

                                <li>Bathtub cleaning</li>

                                <li>Toilet deep cleaning and sanitising</li>

                                <li>Sink and vanity cleaning</li>

                                <li>Mirror polishing</li>

                                <li>Tap and fixture detailing</li>

                                <li>Removal of soap scum and limescale</li>

                                <li>Floor vacuum and mopping</li>

                                <li>Dusting accessible surfaces</li>

                            </ul>

                            <hr>

                            <h3>SPECIAL OFFER</h3>

                            <table width="100%" cellpadding="12" style="background:#f8f8f8;border:1px solid #ddd;">

                                <tr>
                                    <td align="center">

                                        <strong>
                                            2 Bathrooms Cleaning
                                        </strong>

                                        <br><br>

                                        ONLY
                                        <strong>$269</strong>

                                    </td>
                                </tr>

                            </table>

                            <hr>

                            <h3>IMPORTANT NOTES</h3>

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

                            <hr>

                            <h3>PARKING REQUIREMENT</h3>

                            <p>
                                To ensure our team can arrive and begin the service on time,
                                <strong>please ensure suitable parking is available for our cleaning
                                    vehicle at or near the property.</strong>
                            </p>

                            <p>
                                Parking arrangements and any applicable parking costs are the
                                <strong>customer's responsibility.</strong> If a permit or other parking
                                arrangement is required, please have this organised prior to
                                our arrival.
                            </p>

                            <hr>

                            <h3>PAYMENT POLICY</h3>

                            <ul>

                                <li>
                                    <strong>No deposit is required to secure your booking.</strong>
                                </li>

                                <li>
                                    <strong>Payment is due upon completion of the service and can be
                                        made on arrival.</strong>
                                </li>

                            </ul>

                            <hr>

                            <h3>CONTACT DETAILS</h3>

                            <strong>Clean With Professionals</strong>

                            <br>

                            <p>
                                Phone: 0468 406 085
                            </p>

                            <p>
                                Email: info@cleanwithpro.com.au
                            </p>

                            <br>

                            <p>
                                <strong>Thank you for booking with Clean With Professionals.</strong>
                            </p>
                            
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