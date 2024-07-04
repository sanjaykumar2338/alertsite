@extends('frontend.layout.homepagenew')

@section('content')

    <style>

        .text-danger {
            color: #dc3545; /* Red color for indicating danger */
            font-size: 14px; /* Adjust font size as needed */
            margin: 0 0 5px 0; /* Add spacing between the input field and error message */
            display: block; /* Ensure error message appears on a new line */
        }

        .iti.iti--allow-dropdown {
            width: 100%
        }

        .login-title {
            font-size: 4rem;
        }

        form {
            width: 100%
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 7px;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            border-radius: 7px;
            background-color: #d1ddb0;
            color: black;
            font-weight: bold;
            border: none;
        }

        button:disabled {
            background-color: #cccccc; /* Change background color */
            color: #666666; /* Change text color */
            cursor: not-allowed; /* Change cursor style */
        }

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
        }

    </style>

    <section class="main-section full-container">
        <div class="container flex l-gap  flex-mobile">

            @includeIf('frontend.layout.sidebar')

            <div class="page-content pg-l">
                <h1 class="page-title">SIGN UP</h1>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div>
                        <label for="first_name"><b>First Name</b></label>
                        <input value="{{ old('first_name') }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" type="text" id="first_name" placeholder="Enter First Name" name="first_name">
                        @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name"><b>Last Name</b></label>
                        <input value="{{ old('last_name') }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '');" type="text" id="last_name" placeholder="Enter Last Name" name="last_name">
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="mb-2"><b>Phone Number</b></label>
                        <input value="{{ old('phone_number') }}" oninput="this.value = this.value.replace(/[^\d]/g, '');" id="phone_number" type="text" name="phone_number" placeholder="Enter Phone Number">
                        @error('phone_number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('fullPhoneNumberError'))
                            <span class="text-danger" style="margin-top: 2px">{{ session('fullPhoneNumberError') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="uname"><b>Email</b></label>
                        <input value="{{ old('email') }}" type="text" placeholder="Enter Email" name="email">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="psw"><b>Confirm Password</b></label>
                        <input type="password" placeholder="Enter Confirm Password" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <br/>
                        <input type="checkbox" name="agree_terms_and_condition"> By clicking on the Sign Up button below, you agree to our <span style="cursor:pointer;text-decoration: underline;"  onclick="window.location.href = '{{ route('terms') }}';">Terms & Conditions</span> and have read our <span style="cursor:pointer;text-decoration: underline;"   onclick="window.location.href = '{{ route('privacy_policy') }}';">Privacy Policy</span>.
                        @error('agree_terms_and_condition')
                        <span class="text-danger">The agree to Terms and Conditions check box is required.</span>
                        @enderror
                    </div>
                    <br>
                    <input type="submit" id="submit" class="l-submit" value="Sign Up">
                    <br><br>
                    Forgot your password? <a href="{{ route('password.request') }}">Reset Password</a>
                </form>
            </div>

        </div>
    </section>

@endsection
