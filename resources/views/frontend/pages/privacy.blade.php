
@extends('frontend.layout.homepagenew')

@section('content')

<style>
    /* Ensure padding on all devices */
    .content-wrapper {
        padding-left: 5px;
        padding-right: 5px;
    }

    /* Additional styling for mobile devices */
    @media (max-width: 767px) {
        .content-wrapper {
            padding-left: 5px;
            padding-right: 5px;
        }
    }

    /* Adjust padding on larger screens if needed */
    @media (min-width: 768px) {
        .content-wrapper {
            padding-left: 15px;
            padding-right: 15px;
        }
    }
</style>

<section class="main-section full-container">
    <div class="container flex l-gap flex-mobile lr-m">
        @includeIf('frontend.layout.sidebar')
        <div class="page-content pg-l" style="width:700px;">
            <h1 class="page-title">Privacy Policy</h1>
            <div>
                {!! $page->description !!}
            </div>
        </div>
    </div>
</section>

@includeIf('frontend.layout.hero-section')

@endsection




