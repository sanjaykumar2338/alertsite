@extends('frontend.layout.homepagelayout')

@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            <div class="cta-sidebar">
                <div><p>Stay on top of <span style='color: #8529cd; width:auto;'>Rakuten</span> deals effortlessly with
                        our
                        tracking and alert system. Never miss out on savings again.</p><a
                        href="https://www.rakuten.com/r/CARRIE21277?eeid=28187&amp;fbclid=IwAR1nvZOOBFIuGjHq-IaiM73dK8iVQaHBqHWOpa--7xWwPwdWYhSXTdoTMVw"
                        class="cta-btn">Join Now!</a></div>
                <div><p>Already saving with TrackRak?</p><a
                        href="https://www.rakuten.com/r/CARRIE21277?eeid=28187&amp;fbclid=IwAR1nvZOOBFIuGjHq-IaiM73dK8iVQaHBqHWOpa--7xWwPwdWYhSXTdoTMVw"
                        class="cta-btn">Login Now!</a></div>
            </div>
            <div class="page-content home">
                <div>
                    <form method="post">
                        <div class="form-control-input">
                            <label>
                                STORE
                                <sup>
                                    <div class="q-ask">?</div>
                                </sup>
                            </label>
                            <input type="input" name="store[]" id="store[]" class="l-store"/></div>
                        <div class="form-control-input">
                            <label>
                                OPERATOR
                                <sup>
                                    <div class="q-ask">?</div>
                                </sup>
                            </label>
                            <select name="operator[]" id="operator[]" class="l-operator">
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                            </select>
                        </div>
                        <div class="form-control-input">
                            <label>PERCENT <sup>
                                    <div class="q-ask">?</div>
                                </sup>
                            </label>
                            <input type="input" name="percent[]" id="percent[]" class="l-percent"/>
                        </div>
                        <div class="form-control-atype">
                            <label>ALERT TYPE <sup><span class="q-ask">?</span></sup></label>
                            <div>
                                <div class="box-container">
                                    <input type="radio" name="alert_checkbox[]" id="alert_checkbox[]"
                                           class="l-alert_checkbox" value="1"
                                           onClick="singleSelection(this)"
                                    />
                                    <div class="box-label">Email</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_checkbox[]" id="alert_checkbox[]"
                                           class="l-alert_checkbox" value="2"
                                           onClick="singleSelection(this)"
                                    />
                                    <div class="box-label">Text/SMS</div>
                                </div>
                                <div class="box-container">
                                    <input type="radio" name="alert_checkbox[]" id="alert_checkbox[]"
                                           class="l-alert_checkbox" checked="1" value="3"
                                           onClick="singleSelection(this)"
                                    />
                                    <div class="box-label">Both</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-control-alert-on">
                            <label>ALERT <sup><span class="q-ask">?</span></sup></label>
                            <label class="switch">
                                <input type="checkbox"
                                       name="alert_on[]"
                                       id="alert_on[]"
                                       class="l-alert_on"
                                       checked=""/>
                                <div class="slider round">
                                    <div class="on-label">ON</div>
                                    <div class="off-label">OFF</div>
                                </div>
                            </label></div>
                        <div class="form-control-add"><label>ADD ANOTHER</label>
                            <button id="add" class="l-add"><span class="icom-p">+</span></button>
                            <input type="submit" id="submit" class="l-submit" value="Submit"/></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="hero-section full-container">
        <div class="container">
            <div class="hero-column flex-m-2">
                <div class="hero-main">
                    <div class="h-icon">1</div>
                    <div class="h-con bcccf">SIGN UP FOR TRACKAPAK TODAY!</div>
                </div>
                <div class="hero-main">
                    <div class="h-icon">2</div>
                    <div class="h-con adfd">SIGN UP YOUR ALERT USING OUR SIMPLE FORM.</div>
                </div>
                <div class="hero-main">
                    <div class="h-icon">3</div>
                    <div class="h-con fcdbb">GET ALERTS, START SAVING!</div>
                </div>
            </div>
        </div>
    </section>
@endsection
