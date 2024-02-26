@extends('frontend.layout.homepagelayout')

@section('content')


<!-- ========== End header ========== -->
<!-- ========== Start about us heading ========== -->
<section class="about-heading">
    <div class="container">
        <div class="text">
            <h4>about us</h4>

        </div>
    </div>
</section>
<!-- ========== End about us heading ========== -->








<!-- ========== Start about-us-section ========== -->
<section class="about-section">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-12 col-md-12 d-flex align-items-center">
                <div class="text-right">
                    
                   {!! $aboutus->description !!}
                   
                    
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ========== End about-us-section ========== -->




<!-- ========== Start section-2 about ========== -->



@endsection