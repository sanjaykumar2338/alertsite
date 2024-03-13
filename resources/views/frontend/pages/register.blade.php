@extends('frontend.layout.homepagelayout')

@section('content')

    <style>
        .iti.iti--allow-dropdown {
            width: 100%
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
    <body>

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="imgcontainer">
            <h2>Sign Up</h2>
        </div>

        <div class="container">

            <div>
                <label for="first_name"><b>First Name</b></label>
                <input type="text" id="first_name" placeholder="Enter First Name" name="first_name">
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="last_name"><b>Last Name</b></label>
                <input type="text" id="last_name" placeholder="Enter Last Name" name="last_name">
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-1 mb-3">
                <label for="phone_number" class="mb-2"><b>Phone Number</b></label>
                <br>
                <input id="phone_number" type="text" name="phone_number">
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div>
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email">
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

            <button type="submit" disabled id="intlTelInputFormSubmitBtn" class="btn btn-primary">Sign Up</button>
        </div>
    </form>

    @endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const input = document.querySelector("#phone_number");
                const intlTelInputFormSubmitBtn = document.querySelector("#intlTelInputFormSubmitBtn");

                let intlTelInput = window.intlTelInput(input, {
                    initialCountry: "in",
                    showSelectedDialCode: true,
                    hiddenInput: () => "full_phonenumber",
                    utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/utils.js',
                });

                const validationErrors = [
                    {code: "IS_POSSIBLE", message: "The phone number is possible."},
                    {code: "INVALID_COUNTRY_CODE", message: "Invalid country code."},
                    {code: "TOO_SHORT", message: "Your phone number is too short."},
                    {code: "TOO_LONG", message: "The phone number is too long."},
                    {code: "NOT_VALID_NUMBER", message: "Provided phone number is not valid."},
                    {code: "INCORRECT_NUMBER", message: "Please enter a correct phone number"},
                    {code: "INVALID_LENGTH", message: "Invalid phone number length."},
                ];

                input.addEventListener('input', function (e) {
                    let inputValue = this.value;
                    let cleanedValue = inputValue.replace(/\D/g, '');
                    this.value = cleanedValue;

                    let trimmedText = this.value.trim();
                    let textWithoutSpaces = trimmedText.replace(/\s/g, '');

                    intlTelInputFormSubmitBtn.disabled = true;
                    intlTelInputFormSubmitBtn.innerHTML = validationErrors[5].message;

                    const errorCode = intlTelInput.getValidationError();
                    if (errorCode) {
                        const errorDetails = validationErrors[errorCode];
                        intlTelInputFormSubmitBtn.innerHTML = errorDetails.message;
                    } else if (intlTelInput.isValidNumber()) {
                        intlTelInputFormSubmitBtn.innerHTML = "Sign Up";
                        intlTelInputFormSubmitBtn.disabled = false;
                    } else {
                        intlTelInputFormSubmitBtn.disabled = false;
                    }
                });
            });

        </script>
    @endpush
