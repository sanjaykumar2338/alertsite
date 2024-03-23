@extends('frontend.layout.homepagenew')

@section('content')

    <div class="container custom-margin-top" style="display: flex; justify-content: space-between;">
        <div>
            <div class="cta-sidebar">
                <div>
                    <p><span class="tagline">TrackRak &amp;<br>Get More<br>Money Back!</span><br>
                        <br>
                        Stay on top of <a style="color: #8529cd; width:auto; font-weight: 600; text-decoration: none;" href="http://tinyurl.com/d98frkfy" target="_blank">Rakuten</a> deals with our alert tool. Never miss out on savings again!<br>
                        <br>
                        Your first alert is <strong>FREE!</strong></p>
                    <a href="{{route('register')}}" class="cta-btn">Join now!</a>
                </div>
                <div>
                    <p>Already saving with TrackRak?</p>
                    <a href="{{route('login')}}" class="cta-btn">Login now!</a>
                </div>
            </div>
        </div
        >

        <div style="width: 100%">
            <div class="cta-sidebar" style="font-size: 1.2rem; width: 89%; height: 86%">
                {!! $homepage->description !!}
            </div>
        </div>
    </div>

@endsection
