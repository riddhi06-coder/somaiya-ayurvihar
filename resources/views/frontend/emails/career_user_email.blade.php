<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Application Received</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f7fa; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f7fa; padding:20px;">
        <tr>
            <td align="center">

                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                    <!-- Logo -->
                    <tr>
                        <td align="center" style="padding:20px;">
                            <a href="https://anvayafoundation.com/somaiya" target="_blank">
                                <img src="https://anvayafoundation.com/somaiya/frontend/assets/img/logo/kj-somaiya-logo.png"
                                     alt="KJ Somaiya Logo" style="max-width:200px;">
                            </a>
                        </td>
                    </tr>

                    <!-- Header -->
                    <tr>
                        <td style="background:#007c9d; color:white; text-align:center; padding:15px;">
                            <h2 style="margin:0; font-size:20px;">Application Received</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:25px; font-size:14px; color:#333; line-height:1.6;">

                            <p>Dear {{ $name }},</p>

                            <p>
                                Thank you for applying for the position of
                                <b>{{ $job_title }}</b>. This is to acknowledge that we have
                                received your details and resume.
                            </p>

                            <p>
                                Our team will review your submission and get back to you if your
                                profile matches our requirements.
                            </p>

                            @if (!empty($user_message))
                            <table width="100%" cellpadding="10" cellspacing="0" style="margin-top:20px; border:1px solid #eee; border-radius:6px;">
                                <tr style="background:#f9fafb;">
                                    <td><b>Your Message</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $user_message }}</td>
                                </tr>
                            </table>
                            @endif

                            <p style="margin-top:30px;">
                                If you have any questions, feel free to contact us.
                            </p>

                            <p>Thank you for your interest.</p>

                            <p style="margin-top:30px;">
                                Regards,<br>
                                <b>K J Somaiya Hospital Team</b>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f3f6; padding:20px; text-align:center; font-size:12px; color:#666;">
                            <p style="margin:0 0 8px;">K J Somaiya Hospital &amp; Research Centre</p>
                            <p style="margin:0 0 8px;">&copy; {{ date('Y') }} All Rights Reserved</p>
                            <p style="margin:0;">
                                <a href="https://anvayafoundation.com/somaiya" style="color:#0d6efd; text-decoration:none;">
                                    Visit Website
                                </a>
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>