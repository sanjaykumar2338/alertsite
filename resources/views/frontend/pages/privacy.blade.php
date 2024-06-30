@extends('frontend.layout.homepagenew')

@section('content')

<section class="main-section full-container">
    <div class="container flex l-gap flex-mobile lr-m">
        @includeIf('frontend.layout.sidebar')
        <div class="page-content pg-l" style="width:600;">
            <h1 class="page-title">Privacy Policy</h1>
            </h1>
            <div>
                {!! @$page->description !!}
            </div>
        </div>
    </div>
</section>

@includeIf('frontend.layout.hero-section')

@endsection


