@extends('frontend.layout.homepagenew')

@section('content')

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
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </div>
    </div>
@endsection
