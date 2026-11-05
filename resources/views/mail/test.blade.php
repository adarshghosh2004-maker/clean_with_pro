<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>{{ $details['title'] }}</title>
</head>

<body style="margin:0;padding:20px;background:#f4f6f8;font-family:Arial,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff;border-radius:8px;border:1px solid #e5e5e5;">

                    <tr>
                        <td style="background:#4e45b8;padding:25px;text-align:center;color:#fff;">
                            <h2 style="margin:0;">{{ App_Name() }}</h2>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;color:#333;line-height:1.8;font-size:15px;">

                            <p>Hello,</p>

                            <p>
                                Thank you for choosing <strong>{{ App_Name() }}</strong>.
                                This email confirms that our email service is configured and operating successfully.
                            </p>

                            <p>
                                If you have any questions or require assistance, feel free to contact our team.
                            </p>

                            <p>
                                Regards,<br>
                                <strong>{{ App_Name() }} Team</strong>
                            </p>

                        </td>
                    </tr>

                    <tr>
                        <td style="background:#f7f7f7;padding:15px;text-align:center;color:#777;font-size:12px;">
                            Copyright &copy; {{ Setting_Data()['company_name'] ?? "Clean With Professionals"}} 2026. All rights reserved.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>