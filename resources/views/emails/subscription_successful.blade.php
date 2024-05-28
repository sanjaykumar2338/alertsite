<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            text-align: center;
        }
        .logo {
            display: block;
            margin-bottom: -30px;
            max-width: 88%;
            margin: auto;
            width: 21% !important;
            display: block;
            padding-top: 8px;
            height: 92px;
            max-height: 100px;
        }
        .button {
            background-color: #95bb3c;
            padding: 7px 20px;
            border-radius: 50px;
            font-size: 25px;
            font-weight: bolder;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .footer a {
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        {{-- Logo --}}
        <img src="{{ asset('asset/frontend/test/images/trackrak-logo.png') }}" alt="TrackRak Logo" class="logo" />

        {{-- Content --}}
        <h1>Subscription Successful!</h1>

        <p>You are signed up for our {{ucfirst($plan->title)}} Plan.</p>

        <p>You can now set up your alerts so you never miss out on savings again!</p>

        <a href="{{ route('track') }}" class="button">Start Tracking</a>

        <br><br>
        <strong>TrackRak & Get More Money Back</strong>

        {{-- Footer --}}
        <div class="footer">
            &copy; {{ date('Y') }} TrackRak, All Rights Reserved | <a href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a> | <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
        </div>
    </div>
</body>
</html>
