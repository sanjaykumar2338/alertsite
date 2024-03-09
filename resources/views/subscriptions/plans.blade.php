@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <section id="pricing" class="pricing-content section-padding">
                <div class="container">

                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('cancel'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('cancel') }}
                        </div>
                    @endif

                    @if(session('unable'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('unable') }}
                        </div>
                    @endif


                    <div class="section-title text-center">
                        <h1 class="fw-bold">Subscription Plans</h1>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                             data-wow-delay="0.1s" data-wow-offset="0">
                            <div class="single-pricing">
                                @if($currentPlanName === 'free')
                                    <span class="price-label fw-bold pe-2 text-black">Subscribed</span>
                                @endif
                                <div class="price-head">
                                    <h2>Free</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <h1 class="price">$0</h1>
                                <h5>Monthly</h5>
                                <ul>
                                    <li class="fw-bold text-center d-block" style="padding-right: 35px">1 Alert</li>
                                </ul>
                                @if($currentPlanName === 'free')
                                    <a
                                        style="background-color: #cb1414; color: white; text-decoration: none; border:none"
                                        href="{{ route('subscription-cancel') }}"
                                    >
                                        UnSubscribe
                                    </a>
                                @else
                                    <a href="{{ route('plan.detail', [$plansArray['free']->id]) }}">
                                        Get Start
                                    </a>
                                @endif
                            </div>
                        </div><!--- END COL -->
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                             data-wow-delay="0.2s" data-wow-offset="0">
                            <div class="single-pricing">
                                @if($currentPlanName === 'basic')
                                    <span class="price-label fw-bold pe-2 text-black">Subscribed</span>
                                @endif
                                <div class="price-head">
                                    <h2>Basic</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <h1 class="price">$4.99</h1>
                                <h5>Monthly</h5>
                                <ul>
                                    <li class="fw-bold text-center d-block" style="padding-right: 35px">5 Alerts</li>
                                </ul>
                                @if($currentPlanName === 'basic')
                                    <a
                                        style="background-color: #cb1414; color: white; text-decoration: none; border:none"
                                        href="{{ route('subscription-cancel') }}"
                                    >
                                        UnSubscribe
                                    </a>
                                @else
                                    <a href="{{ route('plan.detail', [$plansArray['basic']->id]) }}">
                                        Get Start
                                    </a>
                                @endif
                            </div>
                        </div><!--- END COL -->
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                             data-wow-delay="0.3s" data-wow-offset="0">
                            <div class="single-pricing single-pricing-white">
                                @if($currentPlanName === 'premium')
                                    <span class="price-label fw-bold pe-2 text-black">Subscribed</span>
                                @endif
                                <div class="price-head">
                                    <h2>Premium</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span class="price-label text-black">Best</span>
                                <h1 class="price">$9.99</h1>
                                <h5>Monthly</h5>
                                <ul>
                                    <li class="fw-bold text-center d-block" style="padding-right: 35px">10 Alerts</li>
                                </ul>
                                @if($currentPlanName === 'premium')
                                    <a
                                        style="background-color: #cb1414; color: white; text-decoration: none; border:none"
                                        href="{{ route('subscription-cancel') }}"
                                    >
                                        UnSubscribe
                                    </a>
                                @else
                                    <a href="{{ route('plan.detail', [$plansArray['premium']->id]) }}">
                                        Get Start
                                    </a>
                                @endif
                            </div>
                        </div><!--- END COL -->
                    </div><!--- END ROW -->
                </div><!--- END CONTAINER -->
            </section>
        </div>
    </div>
@endsection
