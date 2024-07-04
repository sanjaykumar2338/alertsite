@extends('frontend.layout.homepagenew')
@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            
            @includeIf('frontend.layout.dashboardsidebar')
            <div class="page-content home">
                <h1 class="page-title">Track</h1>
                @if(empty($currentPlanName))
                    <div class="" role="alert" style="">
                        In order to start tracking, you must <a href="plans">SIGN UP FOR A PLAN</a>.
                    </div>
                    <br>
                @endif

                <div class="cmn-form">
                    <style>
                        .selectpicker option {
                            border: none;
                            background-color: white;
                            outline: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            color: black;
                            font-size: 1rem;
                            margin: 0;
                            padding-left: 0;
                            margin-top: -20px;
                            background: none;
                        }

                        select.selectpicker {
                            border: none;
                            background-color: #FFFFFF !important;
                            outline: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            color: black;
                            height: 2.5rem;
                            font-size: 1rem;
                            margin: 0;
                            padding-left: 0.7rem;
                            padding-top: 3px !important;
                            padding-bottom: 3px !important;
                            margin-top: -20px;
                            background: none;
                            width: 76.5%;
                        }
                        .alert {
                            padding: 2px;
                            margin-bottom: 50px;
                            border: 1px solid transparent;
                            border-radius: 4px;
                        }

                        .alert-danger {
                            color: #721c24;
                            background-color: #f8d7da;
                            border-color: #f5c6cb;
                        }

                        #select2-store-container{
                            padding-top: 12px !important;
                        }

                        .select2-selection{
                            height: 50px !important;
                        }

                        .selection{
                            height: 35px !important;
                        }

                        .select2-container{
                           
                            height: 43px !important;
                        }
                    </style>

                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert" style="">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('plan_error'))
                        <div class="alert alert-danger" role="alert" style="">
                            You have set your maximum number of alerts. Please visit your <a href="{{route('track.list')}}" target="_blank">My Account</a> page to edit or remove current alerts, or <a href="{{route('plans')}}" target="_blank">UPGRADE YOUR PLAN</a>.
                        </div>
                    @endif

                    @if(session('no_plan_error'))
                        <div class="alert alert-danger" role="alert" style="">
                            To set up alerts, you must <a href="{{route('plans')}}">sign up for one of our plans</a>. We even have a FREE plan so you can try TrackRak out!                           
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success" style="color: green;font-size: 18px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form name="save_track" method="post" action="{{route('track.save')}}">
                        @csrf
                        <div class="form-control-input">
                            <label style="margin-bottom: 0px;">STORE:
                            </label>
                            <select name="store" id="store" class="l-store selectpicker">
                                <option value="" disabled selected>Loading Stores...</option>
                            </select>
                        </div>

                        <div class="form-control-input" style="display:none;">
                            <label>OPERATOR:
                            </label>
                            <select class="l-operator" id="operator" name="operator">
                                <option selected value=">">Greater than</option>
                                <option value="==">Equal to</option>
                            </select>
                        </div>

                        <div class="form-control-input">
                            <label>AMOUNT:
                            </label>
                            <select style="" class="l-operator" id="discount_type" name="discount_type">
                                <option value="">--Select--</option>
                                <option value="Percentage">Percent Cash Back</option>
                                <option value="Fixed">Fixed Cash Back</option>
                            </select>
                            &nbsp;
                            <input type="text" class="l-operator form-control" placeholder="Enter Amount" id="price" name="price" oninput="this.value = this.value.replace(/[^\d.]/g, '').replace(/^(\d{0,3})(\.\d{0,2})?.*$/, '$1$2');">

                        </div>
                        

                        <input type="hidden" value="track_page" name="track_page">
                        
                        <div class="form-control-atype">
                            <label style="width: 37%;">ALERT TYPE:</label>
                            <div style="padding-left: 0px;">
                                <div class="box-container">
                                    <input type="radio" value="email" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" onclick="singleSelection(this)">
                                    <div class="box-label">Email</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" value="text" onclick="singleSelection(this)">
                                    <div class="box-label">Text/SMS*</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" checked="1" value="both"
                                           onclick="singleSelection(this)">
                                    <div class="box-label">Both</div>
                                </div>
                                <span class="footer_note"><i>*US Customers only. Automated alert messages will be sent to the phone number provided. Msg and data rates may apply. Msg frequency may vary. To opt out, text "STOP"</i></span>
                            </div>
                            <br>
                        </div>

                        <div class="form-control-alert-on" style="display:none;">
                            <div class="alert-lable-container">
                             <label>ALERT:
                             </label>
                            </div>

                            <div class="alert-input-switcher" style="display:none;">
                                <label class="switch">
                                    <input type="checkbox" id="status" name="status" class="l-alert_on" checked value="1">
                                    <div class="slider round">
                                        <div class="on-label">ON</div>
                                        <div class="off-label">OFF</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-control-add">
                            <input type="submit" id="submit" class="l-submit" value="Submit">
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
</section>
<script>
    document.getElementById('store').addEventListener('change', function() {
        var storeId = this.value;
        if (storeId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/check_store/' + storeId, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if(!response.exist){
                        alert(response.message);
                    }
                    // You can further handle the response here
                } else {
                    alert('Request failed. Please try again later.');
                }
            };
            xhr.send();
        }
    });
</script>

@includeIf('frontend.layout.hero-section')

@endsection

