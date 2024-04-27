@extends('frontend.layout.homepagenew')


@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            
            @includeIf('frontend.layout.sidebar')
            <div class="page-content home">
                <h1 class="page-title" style="width:235px">Track</h1>
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

                    @if(session('success'))
                        <div class="alert alert-success" style="color: green;font-size: 18px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form name="save_track" method="post" action="{{route('track.save')}}">
                        @csrf
                        <div class="form-control-input">
                            <label style="margin-bottom: 21px;">STORE:
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
                                <option value=">=" style="display:none;">Greater than or Equal to</option>
                            </select>
                        </div>

                        <div class="form-control-input">
                            <label>AMOUNT:
                            </label>
                            <select style="width:40% !important;margin-left: 58px !important;" class="l-operator" id="discount_type" name="discount_type">
                                <option value="">--Select--</option>
                                <option value="Percentage">Percent Cash Back</option>
                                <option value="Fixed">Fixed Cash Back</option>
                            </select>
                            &nbsp;
                            <input type="text" class="l-operator form-control" placeholder="Enter Amount" id="price" name="price" style="height: 20px;" oninput="this.value = this.value.replace(/[^\d.]/g, '').replace(/^(\d{0,3})(\.\d{0,2})?.*$/, '$1$2');">

                        </div>

                        <input type="hidden" value="track_page" name="track_page">
                        
                        <div class="form-control-atype">
                            <label style="width: 37%;">ALERT TYPE*:</label>
                            <div style="padding-left: 0px;">
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
                                <span class="footer_note"><i>*US Customers only. Automated alert messages will be sent to the phone number provided. Msg and data rates may apply. Msg frequency may vary. To opt out, text "STOP"</i></span>
                            </div>
                            <br>
                        </div>
                        <div class="form-control-alert-on" style="display:none;">
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
                            <input type="submit" id="submit" class="l-submit" value="Submit">
                        </div>
                    </form>

                    @if(count($all_tracks) > 0)
                    <table class="content-table" style="border-collapse: collapse; margin: 26px 29px; font-size: 0.9em; min-width: 400px; border-radius: 5px 5px 0 0; overflow: hidden; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
                            <thead style="background-color: #95bb3c; color: #000000; text-align: left; font-weight: bold;">
                                <tr>
                                    <th style="padding: 12px 15px;">ID</th>
                                    <th style="padding: 12px 15px;">Store Name</th>
                                    <th style="padding: 12px 15px;">Operator</th>
                                    <th style="padding: 12px 15px;">Discount Type</th>
                                    <th style="padding: 12px 15px;">Amount</th>
                                    <th style="padding: 12px 15px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_tracks as $key=>$track)
                                    <tr>
                                        <td style="padding: 12px 15px;">{{$key+1}}</td>
                                        <td style="padding: 12px 15px;">{{$track->store_name}}</td>
                                        <td style="padding: 12px 15px;">{{$track->operator=='>' ? 'Greater than' : ''}} {{$track->operator=='==' ? 'Equal to' : ''}} {{$track->operator=='>=' ? 'Greater to or Equal to' : ''}}</td>
                                        <td style="padding: 12px 15px;">{{$track->discount_type}}</td>
                                        <td style="padding: 12px 15px;">{{$track->price}}</td>
                                        <td style="padding: 12px 15px;"><a target="_blank" href="{{route('track.edit',$track->id)}}" style="text-decoration: none; color: inherit;">Modify</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @includeIf('frontend.layout.hero-section')

@endsection

