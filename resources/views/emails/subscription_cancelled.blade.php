<!DOCTYPE html>
<html>
<head>
</head>
<body style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; padding: 40px 20px; border: 1px solid #eaeaea; border-radius: 10px; text-align: center;">
        <!-- Logo -->
        <img src="{{ asset('asset/frontend/test/images/trackrak-logo.png') }}" alt="TrackRak Logo" style="margin: auto; display: block; padding: 15px 0; width: 125px; height: auto;" />

        <p style="margin: 0 0 10px; font-size: 16px; line-height: normal;">Your subscription has been cancelled. If you have any feedback, please let us know.</p>

        Thanks,<br>
        {{ config('app.name') }}
        <!-- Footer -->
        <div style="text-align: center; margin-top: 20px; font-size: 14px; color: #555;">
            <p style="font-size: 14px; margin: 0 0 5px; line-height: normal; text-align: center;">&copy; {{ date('Y') }} TrackRak, All Rights Reserved</p>
            <p style="font-size: 14px; margin: 0 0 5px; line-height: normal; text-align: center;">
                <a href="{{ url('/terms-and-conditions') }}" style="color: #555; text-decoration: none; text-align: center;">Terms & Conditions</a> |
                <a href="{{ url('/privacy-policy') }}" style="color: #555; text-decoration: none; text-align: center;">Privacy Policy</a>
            </p>
        </div>
    </div>
</body>
</html>
