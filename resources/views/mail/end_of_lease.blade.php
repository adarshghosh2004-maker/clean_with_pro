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
                            style="padding:30px;background:linear-gradient(135deg,#6d5dfc,#4e45b8);color:#fff;text-align:center;">
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
                        <td style="padding:20px 30px;color:#000;">

                            <div style="font-size:16px;line-height:1.8;">

                                <p>
                                    Dear {{ $details['customer_name']}} 👋<br>

                                    Thank you for booking with
                                    <strong>{{ App_Name() }}</strong>.
                                </p>

                                <h3>📌 BOOKING CONFIRMATION</h3>

                                <strong>Customer:</strong> {{ $details['customer_name']}}<br>
                                <strong>Booking No:</strong> {{ $details['booking_number']}}<br>
                                <strong>Date & Time:</strong> {{ $details['date']}}<br>
                                <strong>Service:</strong> End of Lease Cleaning<br>
                                <strong>Address:</strong> {{ $details['customer_address']}}<br>
                                <strong>Mobile:</strong> {{ $details['customer_mobile_no']}}<br>
                                <strong>Service Cost:</strong> ${{ $details['service_cost']}}

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🛡️ BOND BACK GUARANTEE</h3>

                                ✔ 100% Bond Back Guarantee<br>
                                ✔ Free re-clean if agent is not satisfied<br>
                                ✔ Valid for 7 days<br>
                                ✔ Receipt provided for agent

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🧼 CLEANING CHECKLIST</h3>

                                <strong>Bedrooms & Living Areas</strong><br>
                                • Doors & skirting dusting<br>
                                • Windows (inside only)<br>
                                • Blinds (dust only)<br>
                                • Light fittings & switches<br>
                                • Built-in cabinets & wardrobes<br>
                                • Reachable cobweb removal<br>
                                • Wall marks (major marks only)

                                <br>

                                <strong>Bathrooms</strong><br>
                                • Shower screens, tiles & grout<br>
                                • Bathtub & toilet<br>
                                • Basin, vanity & mirrors<br>
                                • Cupboards (inside & outside)<br>
                                • Tap, shower head & stainless steel polish<br>
                                • Exhaust fan dusting

                                <br>

                                <strong>Kitchen</strong><br>
                                • Oven, cooktop, rangehood & filters<br>
                                • Splashback & benchtops<br>
                                • Pantry & cupboards (inside/outside)<br>
                                • Sink & taps

                                <br>

                                <strong>Floors</strong><br>
                                • Vacuum all floors<br>
                                • Mop hard floors<br>
                                • Carpet steam cleaning

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>➕ EXTRA SERVICES (if required)</h3>

                                • Balcony cleaning – $50<br>
                                • Wall spot cleaning – price on inspection<br>
                                • Full wall wash – $10–$15 per wall<br>
                                • Outside windows – $10 each<br>
                                • Garage wash – $50<br>
                                • Flea treatment – $120<br>
                                • Carpet deodoriser – $10 each<br>
                                • Mould cleaning – depends on condition

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>⚠️ IMPORTANT NOTES</h3>

                                • Property must be empty<br>
                                • Power & hot water must be available<br>
                                • No rubbish removal<br>
                                • Pet hair removal is best effort only<br>
                                • Customer to arrange parking<br>
                                • Pay on arrival 💳

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>⚠️ EXCLUSIONS</h3>

                                • Ceilings<br>
                                • Stickers, adhesive tape, paint marks<br>
                                • Front & back yard<br>
                                • Appliances (Fridge, Microwave, Washing Machine, TV, Speaker, etc.)

                                <hr style="margin:20px 0;border:none;border-top:1px solid #eee;">

                                <h3>🚪 AFTER CLEANING</h3>

                                Only real estate agent should enter after cleaning to keep bond guarantee valid.

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
                        <td style="padding:20px;background:#f8f8f8;text-align:center;font-size:14px;color:#999;">
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