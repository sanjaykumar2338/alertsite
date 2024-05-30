<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }
		* {
			box-sizing: border-box;
		}
		h1 {
			margin: 10px 0 15px;
			font-size: 28px;
			line-height: normal;
			text-align: center;
		}
		p {
			margin: 0 0 10px;
			font-size: 16px;
			text-align: center;
			line-height: normal;
		}
        .email-container {
			width: 100%;
			max-width: 600px;
			margin: 0 auto;
			padding: 40px 20px;
			border: 1px solid #eaeaea;
			border-radius: 10px;
			text-align: center;
		}
        .logo {
			margin: auto;
			display: block;
			padding: 15px 0;
			width: 125px;
			height: auto;
		}
        .button {
			background-color: #95bb3c;
			padding: 10px 30px;
			border-radius: 50px;
			font-size: 24px;
			font-weight: bolder;
			color: white;
			text-decoration: none;
			display: inline-block;
			margin: 20px 0;
			line-height: normal;
		}
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
		.footer p {
			font-size: 14px;
			margin: 0 0 5px;
			line-height: normal;
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

        <p><strong>TrackRak & Get More Money Back</strong></p>

        {{-- Footer --}}       
        <div class="footer">
            <p>&copy; {{ date('Y') }} TrackRak, All Rights Reserved</p>
			<p> <a href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a> | <a href="{{ url('/privacy-policy') }}">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>
