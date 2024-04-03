@extends('frontend.layout.homepagenew')

@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            @includeIf('frontend.layout.sidebar')
            <div class="page-content">
                <div>
                    
                    {!! $homepage->description !!}
                
                </div>
            </div>
        </div>
    </section>

    @includeIf('frontend.layout.hero-section')
    
@endsection
