<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Resume Submission</title>
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
                            <h2 style="margin:0; font-size:20px;">New Resume Submission</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:25px; font-size:14px; color:#333; line-height:1.6;">

                            <p>A new application has been submitted with the following details:</p>

                            <table width="100%" cellpadding="10" cellspacing="0" style="margin-top:15px; border:1px solid #eee; border-radius:6px;">
                                <tr style="background:#f9fafb;">
                                    <td width="35%"><b>Position Applied For</b></td>
                                    <td>{{ $job_title }}</td>
                                </tr>
                                <tr>
                                    <td><b>Name</b></td>
                                    <td>{{ $name }}</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td><b>Email</b></td>
                                    <td>{{ $email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Message</b></td>
                                    <td>{{ $user_message ?: '—' }}</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td><b>Resume</b></td>
                                    <td>{{ $resume_name }} (attached)</td>
                                </tr>
                            </table>

                            <p style="margin-top:25px;">The resume file is attached to this email.</p>

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