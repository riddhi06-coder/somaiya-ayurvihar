<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Enquiry</title>
</head>
<body style="margin:0; padding:0; background-color:#f5f7fa; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f7fa; padding:20px;">
        <tr>
            <td align="center">
                
                <!-- Main Container -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                    <!-- Header / Logo -->
                    <tr>
                        <td align="center" style="background:#ffffff; padding:20px;">
                            <a href="https://anvayafoundation.com/somaiya" target="_blank">
                                <img src="https://anvayafoundation.com/somaiya/frontend/assets/img/logo/kj-somaiya-logo.png" 
                                     alt="KJ Somaiya Logo" 
                                     style="max-width:200px;">
                            </a>
                        </td>
                    </tr>

                    <!-- Title -->
                    <tr>
                        <td style="background:#007c9d; color:white; text-align:center; padding:15px;">
                            <h2 style="margin:0; font-size:20px;">New Contact Enquiry</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:25px;">
                            <table width="100%" cellpadding="8" cellspacing="0" style="font-size:14px; color:#333;">
                              
                                <tr>
                                    <td style="padding:25px;">
                                        <table width="100%" cellpadding="8" cellspacing="0" style="font-size:14px; color:#333;">
                                
                                            <tr style="background:#f9fafb;">
                                                <td><b>Name</b></td>
                                                <td>{{ $first_name }} {{ $last_name }}</td>
                                            </tr>
                                
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td>{{ $email }}</td>
                                            </tr>
                                
                                            <tr style="background:#f9fafb;">
                                                <td><b>Mobile Number</b></td>
                                                <td>{{ $mobile_no }}</td>
                                            </tr>
                                
                                            <tr>
                                                <td><b>Message</b></td>
                                                <td>{{ $user_message ?: 'N/A' }}</td>
                                            </tr>
                                
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f3f6; padding:20px; text-align:center; font-size:12px; color:#666;">
                            
                            <p style="margin:0 0 8px;">
                                K J Somaiya Hospital & Research Centre
                            </p>

                            <p style="margin:0 0 8px;">
                                © {{ date('Y') }} All Rights Reserved
                            </p>

                            <p style="margin:0;">
                                <a href="https://anvayafoundation.com/somaiya" 
                                   style="color:#0d6efd; text-decoration:none;">
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