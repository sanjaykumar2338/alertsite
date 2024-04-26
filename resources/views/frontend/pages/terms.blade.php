@extends('frontend.layout.homepagenew')

@section('content')
    <!-- ========== End header ========== -->

    <h1 style="text-align: center"> Terms & Conditions </h1>

    <div class="container" style="padding-top: 38px;font-size: 21px;">
        <div class="text">
            {!! @$page->description !!}
        </div>
    </div>
@endsection
