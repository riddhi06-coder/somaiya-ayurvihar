<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doctor Appointment Request Received</title>
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
                            <h2 style="margin:0; font-size:20px;">Doctor Appointment Request Received</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:25px; font-size:14px; color:#333; line-height:1.6;">

                            <p>Dear {{ $patient_name }},</p>

                            <p>
                                Thank you for requesting an appointment with us. 
                                This is to acknowledge that we have received your request.
                            </p>

                            <p>
                                Our team will contact you shortly to confirm your appointment.
                            </p>

                            <!-- Details Box -->
                            <table width="100%" cellpadding="10" cellspacing="0" style="margin-top:25px; border:1px solid #eee; border-radius:6px;">
                                <tr style="background:#f9fafb;">
                                    <td><b>Speciality</b></td>
                                    <td>{{ $speciality }}</td>
                                </tr>
                                <tr>
                                    <td><b>Doctor</b></td>
                                    <td>{{ $doctor_name }}</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td><b>Preferred Appointment Date</b></td>
                                    <td>{{ \Carbon\Carbon::parse($appointment_date)->format('d/m/Y') }}</td>
                                </tr>
                                
                                <tr style="background:#f9fafb;">
                                    <td><b>Appointment Slot</b></td>
                                    <td>{{ $slot }}</td>
                                </tr>
                                
                            </table>

                            <p style="margin-top:30px;">
                                If you have any questions, feel free to contact us.
                            </p>

                            <p>Thank you for choosing us.</p>

                            <p style="margin-top:30px;"> 
                                Regards,<br>
                                <b>K J Somaiya Hospital Team</b>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f3f6; padding:20px; text-align:center; font-size:12px; color:#666;">
                            <p style="margin:0 0 8px;">K J Somaiya Hospital & Research Centre</p>
                            <p style="margin:0 0 8px;">© {{ date('Y') }} All Rights Reserved</p>
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