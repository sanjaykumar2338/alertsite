@extends('frontend.layout.homepagelayout')

@section('content')

    <style>
        .pricing-content{}
        .single-pricing{
            background:#fff;
            padding:40px 20px;
            border-radius:5px;
            position:relative;
            z-index:2;
            border:1px solid #eee;
            box-shadow: 0 10px 40px -10px rgba(0,64,128,.09);
            transition:0.3s;
        }
        @media only screen and (max-width:480px) {
            .single-pricing {margin-bottom:30px;}
        }
        .single-pricing:hover{
            box-shadow:0px 60px 60px rgba(0,0,0,0.1);
            z-index:100;
            transform: translate(0, -10px);
        }
        .price-label {
            color: #fff;
            background: #ffaa17;
            font-size: 16px;
            width: 100px;
            margin-bottom: 15px;
            display: block;
            -webkit-clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0% 100%, 0 50%, 0% 0%);
            clip-path: polygon(100% 0%, 90% 50%, 100% 100%, 0% 100%, 0 50%, 0% 0%);
            margin-left: -20px;
            position: absolute;
        }
        .price-head h2 {
            font-weight: 600;
            margin-bottom: 0px;
            text-transform: capitalize;
            font-size: 26px;
        }
        .price-head span {
            display: inline-block;
            background:#ffaa17;
            width: 6px;
            height: 6px;
            border-radius: 30px;
            margin-bottom: 20px;
            margin-top: 15px;
        }
        .price {
            font-weight: 500;
            font-size: 50px;
            margin-bottom: 0px;
        }
        .single-pricing{}
        .single-pricing h5 {
            font-size: 14px;
            margin-bottom: 0px;
            text-transform: uppercase;
        }
        .single-pricing ul{
            list-style: none;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .single-pricing ul li{line-height: 35px;}
        .single-pricing a {
            background:none;
            border: 2px solid #ffaa17;
            border-radius: 5000px;
            color: #ffaa17;
            display: inline-block;
            font-size: 16px;
            overflow: hidden;
            padding:10px 45px;
            text-transform: capitalize;
            transition: all 0.3s ease 0s;
        }
        .single-pricing a:hover, .single-pricing a:focus{
            background:#ffaa17;
            color:#fff;
            border: 2px solid #ffaa17;
        }
        .single-pricing-white{background: #232434}
        .single-pricing-white ul li{color:#fff;}
        .single-pricing-white h2{color:#fff;}
        .single-pricing-white h1{color:#fff;}
        .single-pricing-white h5{color:#fff;}

    </style>

    <div class="container mt-2 mb-5">
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


                    <div class="section-title text-center mb-3">
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
