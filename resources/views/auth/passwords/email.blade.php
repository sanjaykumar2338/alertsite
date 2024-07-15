@extends('frontend.layout.homepagenew')

@section('content')

 <style>
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

    input[type=email]{
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 7px;
    }
 </style>
<section class="main-section full-container">
    <div class="container flex l-gap flex-mobile lr-m">
        @includeIf('frontend.layout.sidebar')
        <div class="page-content pg-l">
              <div class="card">
                        <h1 class="page-title">{{ __('Reset Password') }}</h1>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert" style="color:red;">
                                    @if('We have emailed your password reset link.'==session('status'))
                                    Please check your email for a link to reset your password. Go here to <a style="color: red;" href="{{route('login')}}">login</a>.
                                    @else
                                        {{ session('status') }}
                                    @endif
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" class="form-control" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row mb-10">
                                    <div class="col-md-6 offset-md-4">
                                        <input type="submit" id="submit" class="l-submit" value="{{ __('Reset') }}">
                                        <button style="display:none;" type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
</section>
@endsection
