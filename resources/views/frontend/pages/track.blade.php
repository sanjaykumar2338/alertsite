@extends('frontend.layout.homepagenew')

@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            <div class="cta-sidebar">
                <div>
                    <p><span class="tagline">TrackRak &amp;<br>Get More<br>Money Back!</span><br>
                        <br>
                        Stay on top of <a style='color: #8529cd; width:auto; font-weight: 600; text-decoration: none;'
                                          href="http://tinyurl.com/d98frkfy" target="_blank">Rakuten</a> deals with our
                        alert tool. Never miss out on savings again!<br>
                        <br>
                        Your first alert is <strong>FREE!</strong></p>
                    <a href="{{route('register')}}" class="cta-btn">Join now!</a>
                </div>
                <div>
                    <p>Already saving with TrackRak?</p>
                    <a href="{{route('login')}}" class="cta-btn">Login now!</a>
                </div>
            </div>
            <div class="page-content home">
                <div>
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

                    <form name="save_track" method="post" action="{{route('track.save')}}">
                        @csrf
                        <div class="form-control-input">
                            <label>STORE:
                            </label>
                            <select name="store" id="store" class="l-store selectpicker">
                                <option value="" disabled selected>Type store name</option>
                                @foreach($stores as $store)
                                    <option value="{{$store->store_id}}">{{$store->store_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control-input">
                            <label>OPERATOR:
                            </label>
                            <select class="l-operator" id="operator" name="operator">
                                <option value=">">Greater than</option>
                                <option value="==">Equal to</option>
                                <option value=">=">Greater than or Equal to</option>
                            </select>
                        </div>

                        <div class="form-control-input">
                            <label>PERCENT/CASH AMOUNT;
                            </label>
                            <select class="l-operator" id="discount_type" name="discount_type">
                                <option value="">--Select--</option>
                                <option value="Percentage">Percent Cash Back</option>
                                <option value="Fixed">Fixed Cash Back</option>
                            </select>
                        </div>

                        <div class="form-control-input amount_div">
                            <label>Amount
                            </label>
                           <input type="text" class="l-operator" placeholder="Enter Amount" id="price" name="price" style="width: 73.3% !important;height: 1.2rem !important; color: black !important;" oninput="this.value = this.value.replace(/[^\d]/g, '');">
                        </div>

                        <div class="form-control-atype">
                            <label>ALERT TYPE:
                            </label>
                            <div>
                                <div class="box-container">
                                    <input type="radio" value="email" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" onclick="singleSelection(this)">
                                    <div class="box-label">Email</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" value="text" onclick="singleSelection(this)">
                                    <div class="box-label">Text/SMS</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_type" id="alert_checkbox[]"
                                           class="l-alert_checkbox" checked="1" value="both"
                                           onclick="singleSelection(this)">
                                    <div class="box-label">Both</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-control-alert-on">
                            <div class="alert-lable-container">
                             <label>ALERT:
                             </label>
                            </div>

                            <div class="alert-input-switcher">
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
                            <label>ADD ANOTHER</label>
                            <button id="add" class="l-add">
                                <span class="icom-p">+</span>
                            </button>
                            <input type="submit" id="submit" class="l-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @includeIf('frontend.layout.hero-section')

@endsection

