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

            <div class="cta-sidebar">
                <div><p>Stay on top of <span style="color: #8529cd; width:auto;">Rakuten</span> deals effortlessly with
                        our tracking and alert system. Never miss out on savings again.</p><a
                        href="{{route('register')}}"
                        class="cta-btn">Join Now!</a></div>
                <div><p>Already saving with TrackRak?</p><a
                        href="{{route('login')}}"
                        class="cta-btn">Login Now!</a></div>
            </div>

            <div class="page-content pg-l">
                <h1 class="page-title">SIGNUP</h1>
                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div>
                        <label for="first_name"><b>First Name</b></label>
                        <input value="{{ old('first_name') }}" type="text" id="first_name" placeholder="Enter First Name" name="first_name">
                        @error('first_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="last_name"><b>Last Name</b></label>
                        <input value="{{ old('last_name') }}" type="text" id="last_name" placeholder="Enter Last Name" name="last_name">
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="mb-2"><b>Phone Number</b></label>
                        <input value="{{ old('phone_number') }}" oninput="this.value = this.value.replace(/[^\d]/g, '');" id="phone_number" type="text" name="phone_number">
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

                    <button type="submit" class="btn btn-primary">Sign Up
                    </button>

                </form>
            </div>

        </div>
    </section>

@endsection
