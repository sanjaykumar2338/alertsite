@extends('frontend.layout.homepagenew')

@section('content')

    <div class="container flex l-gap  flex-mobile">
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
            <h1 class="page-title">CONTACT</h1>
            {!! $contact->description !!}
        </div>
    </div>

@endsection
