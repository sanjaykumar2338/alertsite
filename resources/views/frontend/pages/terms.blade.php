@extends('frontend.layout.homepagelayout')

@section('content')
<!-- ========== End header ========== -->

    <div class="conflicts-heading">
        <div class="container">
            <div class="text">
                <h4> Track </h4>
            </div>
        </div>
    </div>
    
    <div class="container" style="padding-top: 38px;font-size: 21px;">
            <div class="text">
                {!! $terms->description !!}
            </div>
    </div>
@endsection