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

                                @if(!empty($details['carpet_rooms_booked']))
                                    <tr>
                                        <td><strong>Area / Number of Carpeted Rooms to be Cleaned</strong></td>
                                        <td>{{ $details['carpet_rooms_booked'] }} Rooms</td>
                                    </tr>
                                @endif

                            </table>

                            <hr>

                            <h3>SERVICE BOOKED</h3>

                            <p>
                                <strong>Carpet Steam Cleaning</strong>
                            </p>

                            <hr>

                            <h3>CARPET STEAM CLEANING CHECKLIST</h3>

                            <ul>

                                <li>Vacuuming of all carpet areas</li>

                                <li>Pre-treatment of stains & high-traffic areas</li>

                                <li>Deep steam extraction cleaning</li>

                                <li>Spot stain removal treatment</li>

                                <li>Odour neutralising treatment</li>

                                <li>Carpet fibre grooming for even finish</li>

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

                            <h3>IMPORTANT NOTES</h3>

                            <ul>

                                <li>
                                    We do not guarantee 100% removal of pet hair, but we will use the best possible
                                    techniques to achieve maximum results.
                                </li>

                                <li>
                                    If heavy pet hair removal or hand scrubbing is required, it will be charged as an
                                    additional service.
                                </li>

                                <li>
                                    Some stains (old, permanent, or chemical) may not be fully removable.
                                </li>

                                <li>
                                    We are not responsible for pre-existing discolouration or carpet wear.
                                </li>

                                <li>
                                    Furniture marks or shade differences may remain after cleaning.
                                </li>

                                <li>
                                    Any cancellation or rescheduling must be advised at least 24 hours before the
                                    booking time.
                                </li>

                            </ul>

                            <hr>

                            <h3>CONTACT DETAILS</h3>

                            Kind regards,
                            <br>

                            <strong>Clean With Professionals</strong>

                            <br>

                            0468 406 085

                            <br>

                            info@cleanwithpro.com.au

                            <p>
                                Thank you for booking with <strong>Clean With Professionals.</strong>
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