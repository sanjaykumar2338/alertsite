<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="description" content="">

    {{--Intl Tel Input--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/css/intlTelInput.css">
{{--    <link rel="stylesheet" href="{{asset('asset/frontend/css/bootstrap.min.css')}}">--}}

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;display=swap" rel="stylesheet">
    <link id="reset_style" rel="stylesheet" href="{{asset('asset/frontend/test/css/normalize.css')}}"/>
    <link id="layout_main" rel="stylesheet" href="{{asset('asset/frontend/test/css/style.css')}}"/>
    <link id="layout_menu" rel="stylesheet" href="{{asset('asset/frontend/test/css/menu.css')}}"/>
    <link id="mobile_responsive" rel="stylesheet" href="{{asset('asset/frontend/test/css/responsive.css')}}"/>
    <link id="accordion_layout" rel="stylesheet" href="{{asset('asset/frontend/test/css/accordion.css')}}"/>

</head>

<body>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a>
    to improve your experience.</p>
<![endif]-->

<header class="menu-section full-container">
    <div class="container flex f-row flex-m-p nav-flex">
        <div class="logo-con">
            <a href="#">
                <img src="{{ asset('asset/frontend/test/images/branding.png') }}"
                     class="branding"/>
            </a>
        </div>
        <div class="menu-con">
            <div class="menu-tag">
                <ul>
                    <li>
                        <a href="{{ route('track') }}" class="m-hover track">Track
                            <div class="ml-con">
                                <div class="m-layout">
                                    <div class="m-circle">
                                        <div class="inner-cle-track"></div>
                                    </div>
                                    <div class="m-line"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="faqs.html" class="m-hover faqs">FAQs
                            <div class="ml-con">
                                <div class="m-layout">
                                    <div class="m-circle">
                                        <div class="inner-cle-faqs"></div>
                                    </div>
                                    <div class="m-line"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="contact.html" class="m-hover contact">Contact
                            <div class="ml-con">
                                <div class="m-layout">
                                    <div class="m-circle">
                                        <div class="inner-cle-contact"></div>
                                    </div>
                                    <div class="m-line"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="auth.html" class="m-hover login">SignUp/Login
                            <div class="ml-con">
                                <div class="m-layout">
                                    <div class="m-circle">
                                        <div class="inner-cle-login"></div>
                                    </div>
                                    <div class="m-line"></div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

@yield('content')

<!-- ========== Start footer ========== -->

{{--<footer>--}}
<section class="full-container ftr-content">
    <footer class="container b-top">
        <div class="ftr-content flex-m-2">
            <div class="l-cols">
                <img src="{{ asset('asset/frontend/test/images/trackrak.jpg') }}" alt="trackrak"/>
            </div>
            <div class="r-cols">
                <div class="menu-ftr">
                    <div><a class="f-menu" ref="#">TRACK</a></div>
                    <div><a class="f-menu" ref="#">FAQs</a></div>
                    <div><a class="f-menu" ref="#">CONTACT</a></div>
                    <div>@2024 TrackRak, All Right Reserved | Terms & Condition</div>
                </div>
            </div>
        </div>
    </footer>
</section>
{{--</footer>--}}

<!-- ========== End footer ========== -->
<script id="form_fields" type="text/javascript" src="{{ asset('asset/frontend/test/js/script.js') }}"></script>
<script>'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({'tccl.baseHost': 'secureserver.net'}, {'ap': 'cpbh-mt'}, {'server': 'p3plmcpnl499668'}, {'dcenter': 'p3'}, {'cp_id': '7410277'}, {'cp_cache': ''}, {'cp_cl': '6'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script>
<script src='{{ asset('asset/frontend/test/js/scc-c2.min.js') }}'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.6/build/js/intlTelInput.min.js"></script>

@stack('scripts')

</body>
</html>
