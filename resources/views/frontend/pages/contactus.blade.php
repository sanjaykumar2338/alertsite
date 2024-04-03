@extends('frontend.layout.homepagenew')

@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            @includeIf('frontend.layout.sidebar')
            <div class="page-content pg-l">
                <div>
                    
                    <h1 class="page-title">Contact Us
            </h1>
                    {!! $contact->description !!}
                
                </div>
            </div>
        </div>
    </section>

@endsection
