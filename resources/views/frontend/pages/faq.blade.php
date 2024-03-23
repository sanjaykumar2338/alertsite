@extends('frontend.layout.homepagenew')

@section('content')

    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            <div class="cta-sidebar">
                <div>
                    <p><span class="tagline">TrackRak &<br />Get More<br />Money Back!</span><br />
                        <br />
                        Stay on top of <a style='color: #8529cd; width:auto; font-weight: 600; text-decoration: none;' href="http://tinyurl.com/d98frkfy" target="_blank">Rakuten</a> deals with our alert tool. Never miss out on savings again!<br />
                        <br />
                        Your first alert is <strong>FREE!</strong></p>
                    <a href="#" class="cta-btn">Join now!</a>
                </div>
                <div>
                    <p>Already saving with TrackRak?</p>
                    <a href="#" class="cta-btn">Login now!</a>
                </div>
            </div>
            <div class="page-content pg-l">
                <h1 class="page-title">FAQ <span class="sm-ls">s</span>
                </h1>
                <div class="accordion-app">
                    <button class="accordion"><div class="t-label">Lorem Ipsum is simply dummy</div></button>
                    <div class="panel" style="display: none;">{!! $faq->description !!}</div>
                    <button class="accordion"><div class="t-label">Lorem Ipsum is simply dummy</div></button>
                    <div class="panel" style="display: none;">{!! $faq->description !!}</div>
                    <button class="accordion"><div class="t-label">Lorem Ipsum is simply dummy</div></button>
                    <div class="panel" style="display: none;">{!! $faq->description !!}</div>
                    <button class="accordion"><div class="t-label">Lorem Ipsum is simply dummy</div></button>
                    <div class="panel" style="display: none;">{!! $faq->description !!}</div>
                </div>
            </div>
        </div>
    </section>

    @includeIf('frontend.layout.hero-section')

@endsection
