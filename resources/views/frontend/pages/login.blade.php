@extends('frontend.layout.homepagenew')

@section('content')

    <style>

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

        .Login-form-submit-section {
            margin-top: 13px;
            font-weight: bolder;
            display: flex;
            align-content: center;
            gap: 5px;
        }

        .create-account-hover:hover {
            cursor: pointer;
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
                <h1 class="page-title">Login</h1>

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    @if(session('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                    @endif

                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Username" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit" class="btn btn-primary">Login</button>

                    <div class="Login-form-submit-section">
                        <span>Haven't created account yet ?</span>
                        <span class="create-account-hover"><a href="{{ route('register.form') }}">Create Account</a></span>
                    </div>
                    <a href="{{ route('password.request') }}">Forget Password!</a>
                </form>
            </div>
        </div>
    </section>

@endsection
