@extends('frontend.layout.homepagelayout')

@section('content')

<section class="slider-Product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0 affter">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner" style="height: 600px;">
                        <div class="carousel-item active">
                            <img src="asset/frontend/images/employee-discount.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/frontend/images/Employee-Discount-Programs-1024x627.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="Justice">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="left-text">
                        {!! $homepage->description !!}
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    @endsection