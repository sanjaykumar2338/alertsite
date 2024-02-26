@extends('frontend.layout.homepagelayout')

@section('content')

<!-- ========== End header ========== -->
    <!-- ========== Start banner ========== -->
    <section class="contact-banner">
        <div class="container">
            <div class="text">
                <h4>Contact Us
                </h4>
            </div>
        </div>
    </section>
    <!-- ========== End banner ========== -->




    <section class="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div class="img-style">
                        <div class="set">
                            <div class="icon">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <div class="text">
                                {!! $contact->description !!}
                            </div>
                        </div>

                    </div>


                    <!-- number  -->
                    <div class="contact-d">
                        <h3>{{env('APP_NAME')}}</h3>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <span>
                                + 00 123 456 789</span>

                        </li>

                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Lorem  consectetur adipisicing elit.</span>

                        </li>

                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <span>
                                info@gmail.com

                            </span>

                        </li>

                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 col-12  s-padding">
                    <form action="">
                        <span>REACH US</span>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Last name">
                            </div>

                            <div class="col-md-12">
                                <input type="tel" placeholder="mobile number">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="email address">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="message">
                            </div>
                            <button class="btn-style"> submit</button>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>




    <!-- ========== Start map ========== -->
    <section class="map-section">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52872517.59607392!2d-161.69116940686905!3d36.018281840171966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sin!4v1699385880283!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!-- ========== End map ========== -->
@endsection