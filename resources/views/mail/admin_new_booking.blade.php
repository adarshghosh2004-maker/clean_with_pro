<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>

<body style="margin:0;padding:0;background:#f5f5f5;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f5f5f5;">
        <tr>
            <td align="center" style="padding:20px;">

                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                    style="max-width: 600px; background:#ffffff;border:1px solid #e5e5e5; margin: 0 auto;">

                    <!-- Header -->

                    <tr>
                        <td align="center" style="background:#4e45b8;padding:25px;color:#ffffff;">

                            <h1 style="margin:0;font-size:24px;">
                                {{ App_Name() }}
                            </h1>

                            <p style="margin:10px 0 0;">
                                New Booking Request
                            </p>

                        </td>
                    </tr>


                    <!-- Content -->

                    <tr>
                        <td style="padding:30px;color:#333;line-height:1.7;">

                            <p>
                                Hello Admin,
                            </p>

                            <p>
                                A new booking request has been submitted on
                                <strong>{{ App_Name() }}</strong>.
                                Please review the details below.
                            </p>

                            <hr>

                            <h3>Customer Details</h3>

                            <table width="100%" cellpadding="8">

                                <tr>
                                    <td width="35%"><strong>Name</strong></td>
                                    <td>{{ $details['customer_name'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td style="word-break: break-all;">{{ $details['email'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td>{{ $details['phone'] }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Service</strong></td>
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

                            </table>

                            <hr>

                            <p>
                                Please log in to the admin panel to view and manage this request.
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
