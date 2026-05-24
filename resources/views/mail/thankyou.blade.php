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
                                Thank You
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
                                We truly appreciate the opportunity to assist you.
                            </p>

                            <hr>

                            <h3>Booking Summary</h3>

                            <table width="100%" cellpadding="8">

                                <tr>
                                    <td width="35%">
                                        <strong>Customer</strong>
                                    </td>

                                    <td>
                                        {{ $details['customer_name'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Booking No</strong>
                                    </td>

                                    <td>
                                        {{ $details['booking_number'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Amount</strong>
                                    </td>

                                    <td>
                                        ${{ $details['service_cost'] }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Date</strong>
                                    </td>

                                    <td>
                                        {{ $details['date'] }}
                                    </td>
                                </tr>

                            </table>

                            <hr>

                            <p>
                                We hope you were satisfied with our service.
                            </p>

                            <p>
                                Your feedback helps us improve and provide
                                even better service in the future.
                            </p>


                            <table width="100%" cellpadding="0" cellspacing="0" style="margin:25px 0;">

                                <tr>
                                    <td align="center">

                                        <a href="{{ route('feedback') }}" style="
                                            background:#4e45b8;
                                            color:#ffffff;
                                            text-decoration:none;
                                            padding:14px 30px;
                                            border-radius:6px;
                                            display:inline-block;
                                            font-weight:bold;">

                                            Share Your Feedback

                                        </a>

                                    </td>
                                </tr>

                            </table>


                            <p>
                                We look forward to assisting you again.
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