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
                                Thank you for booking with
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
                                    <td>End of Lease Cleaning</td>
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

                            <h3>Bond Back Guarantee</h3>

                            <ul>
                                <li>100% Bond Back Guarantee</li>
                                <li>Free re-clean if agent is not satisfied</li>
                                <li>Valid for 7 days</li>
                                <li>Receipt provided for agent</li>
                            </ul>

                            <hr>

                            <h3>Cleaning Checklist</h3>

                            <strong>Bedrooms & Living Areas</strong>

                            <ul>
                                <li>Doors & skirting dusting</li>
                                <li>Windows (inside only)</li>
                                <li>Blinds (dust only)</li>
                                <li>Light fittings & switches</li>
                                <li>Built-in cabinets & wardrobes</li>
                                <li>Reachable cobweb removal</li>
                                <li>Wall marks (major marks only)</li>
                            </ul>

                            <strong>Bathrooms</strong>

                            <ul>
                                <li>Shower screens, tiles & grout</li>
                                <li>Bathtub & toilet</li>
                                <li>Basin, vanity & mirrors</li>
                                <li>Cupboards (inside & outside)</li>
                                <li>Tap, shower head & stainless steel polish</li>
                                <li>Exhaust fan dusting</li>
                            </ul>

                            <strong>Kitchen</strong>

                            <ul>
                                <li>Oven, cooktop, rangehood & filters</li>
                                <li>Splashback & benchtops</li>
                                <li>Pantry & cupboards (inside/outside)</li>
                                <li>Sink & taps</li>
                            </ul>

                            <strong>Floors</strong>

                            <ul>
                                <li>Vacuum all floors</li>
                                <li>Mop hard floors</li>
                                <li>Carpet steam cleaning</li>
                            </ul>

                            <hr>

                            <h3>Extra Services (if required)</h3>

                            <ul>
                                <li>Balcony cleaning – $50</li>
                                <li>Wall spot cleaning – price on inspection</li>
                                <li>Full wall wash – $10–$15 per wall</li>
                                <li>Outside windows – $10 each</li>
                                <li>Garage wash – $50</li>
                                <li>Flea treatment – $120</li>
                                <li>Carpet deodoriser – $10 each</li>
                                <li>Mould cleaning – depends on condition</li>
                            </ul>

                            <hr>

                            <h3>Important Information</h3>

                            <ul>
                                <li>Property must be empty</li>
                                <li>Power & hot water must be available</li>
                                <li>No rubbish removal</li>
                                <li>Pet hair removal is best effort only</li>
                                <li>Customer to arrange parking</li>
                                <li>Payment on arrival</li>
                            </ul>

                            <hr>

                            <h3>Exclusions</h3>

                            <ul>
                                <li>Ceilings</li>
                                <li>Stickers, adhesive tape, paint marks</li>
                                <li>Front & back yard</li>
                                <li>Appliances (Fridge, Microwave, Washing Machine, TV, Speaker, etc.)</li>
                            </ul>

                            <hr>

                            <h3>After Cleaning</h3>

                            <p>
                                Only the real estate agent should enter after cleaning
                                to keep the bond guarantee valid.
                            </p>

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