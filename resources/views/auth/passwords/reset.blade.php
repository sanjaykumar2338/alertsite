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

        input[type=text], input[type=password], input[type=email] {
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

        .invalid-feedback{
            color:red;
        }
    </style>

 <div class="container flex l-gap flex-mobile custom-margin-top">
        <div class="cta-sidebar">
            <div><p>Stay on top of <span style="color: #8529cd; width:auto;">Rakuten</span> deals effortlessly with our
                    tracking and alert system. Never miss out on savings again.</p><a
                    href="{{route('register')}}"
                    class="cta-btn">Join Now!</a></div>
            <div><p>Already saving with TrackRak?</p><a
                    href="{{route('login')}}"
                    class="cta-btn">Login Now!</a></div>
        </div>
        <div class="page-content pg-l">
                    <div class="card">
                        <h1 class="page-title">{{ __('Reset Password') }}</h1>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-danger">
                                        @if($message=='The password field confirmation does not match.')
                                            Passwords do not match
                                        @else
                                            {{ $message }}
                                        @endif
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
