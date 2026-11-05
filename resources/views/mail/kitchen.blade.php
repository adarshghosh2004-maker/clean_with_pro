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
                                Thank you for booking your cleaning service with
                                <strong>{{ App_Name() }}.</strong>
                            </p>

                            <p>
                                We are pleased to confirm your upcoming kitchen cleaning service. Please find your
                                booking details and service inclusions below:
                            </p>

                            <hr>

                            <h3>Booking Details</h3>

                            <table width="100%" cellpadding="8">

                                <tr>
                                    <td><strong>Customer Name</strong></td>
                                    <td>{{ $details['customer_name'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Booking Number</strong></td>
                                    <td>{{ $details['booking_number'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Booking Date & Time</strong></td>
                                    <td>{{ $details['date'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service</strong></td>
                                    <td>Kitchen Deep Cleaning</td>
                                </tr>

                                <tr>
                                    <td><strong>Property Address</strong></td>
                                    <td>{{ $details['customer_address'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Customer Mobile Number</strong></td>
                                    <td>{{ $details['customer_mobile_no'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Quote Amount</strong></td>
                                    <td>${{ $details['service_cost'] }}</td>
                                </tr>

                            </table>

                            <hr>

                            <h3>KITCHEN DEEP CLEANING INCLUDES</h3>

                            <p>
                                Our professional kitchen deep cleaning service is designed to remove built-up grease,
                                food residue, dust and grime, leaving your kitchen fresh, clean and hygienic.
                            </p>

                            <h4>Our Deep Clean Includes:</h4>

                            <ul>

                                <li>Kitchen benchtops – deep cleaned and degreased</li>

                                <li><strong>Standard oven cleaning – interior, door, glass, racks & trays</strong></li>

                                <li>Cooktop & stovetop – detailed cleaning and removal of built-up grease</li>

                                <li>Splashback – thoroughly cleaned and degreased</li>

                                <li>Kitchen sink & taps – cleaned and polished</li>

                                <li>Kitchen cabinets & drawers – exterior cleaning and detailing</li>

                                <li>Rangehood – exterior cleaning and degreasing</li>

                                <li>Appliances – exterior surfaces wiped and detailed</li>

                                <li>Removal of visible grease, food residue and grime</li>

                                <li>Cleaning around kitchen edges, corners and accessible areas</li>

                                <li>Kitchen floor – vacuumed/swept and mopped</li>

                                <li>Final wipe-down and detailing for a fresh, clean finish</li>

                            </ul>

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

                            <h3>CANCELLATION & RESCHEDULING POLICY</h3>

                            <p>
                                Any cancellation or rescheduling request must be made <strong>at least
                                    24 hours prior to the scheduled service time.</strong>
                            </p>

                            <p>
                                Requests made with less than 24 hours' notice may be subject to
                                <strong>cancellation charges.</strong>
                            </p>

                            <p>
                                If you need to make any changes to your booking, please contact
                                us as soon as possible.
                            </p>

                            <hr>

                            <p>
                                Thank you for choosing <strong>Clean With Professionals.</strong>
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