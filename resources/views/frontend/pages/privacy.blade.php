@extends('frontend.layout.homepagenew')

@section('content')

<style>
    .main-section {
    padding: 20px;
    box-sizing: border-box;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        margin: auto;
        max-width: 1200px;
    }

    .page-content {
        flex: 1;
        padding: 10px;
        box-sizing: border-box;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .page-content {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .page-content {
            padding: 5px;
        }
    }

</style>

<section class="main-section full-container" style="padding: 20px;">
    <div class="container flex l-gap flex-mobile lr-m" style="max-width: 100%; margin: auto;">
        @includeIf('frontend.layout.sidebar')
        <div class="page-content pg-l" style="flex: 1; padding: 10px; box-sizing: border-box;">
            <h1 class="page-title">Privacy Policy</h1>
            <div>
                {!! $page->description !!}
            </div>
        </div>
    </div>
</section>

@includeIf('frontend.layout.hero-section')

@endsection
