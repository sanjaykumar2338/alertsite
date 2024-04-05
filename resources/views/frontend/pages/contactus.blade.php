@extends('frontend.layout.homepagenew')

@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            @includeIf('frontend.layout.sidebar')
            <div class="page-content pg-l">
                <h1 class="page-title">Contact Us</h1>
                <div>
                    {!! $contact->description !!}
                </div>

                <style>
                    .error{
                        color: red;
                    }
                </style>

                <div class="page-content">
                <div>
                    @if (count($errors) > 0)
                        <div class = "alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="error">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form name="save_track" method="post" action="{{route('contact.save')}}">
                        @csrf
                        
                        <div class="form-control-input">
                            <label>Name:
                            </label>
                            <input type="text" value="{{old('name')}}" class="l-operator" placeholder="Enter Name" id="name" name="name" style=height: 1.2rem !important; color: black !important;">

                        </div>

                        <div class="form-control-input">
                            <label>Email:
                            </label>
                            <input type="text" value="{{old('email')}}"  class="l-operator" placeholder="Enter Email" id="email" name="email" style=height: 1.2rem !important; color: black !important;">

                        </div>

                        <div class="form-control-input">
                            <label>Phone:
                            </label>
                            <input type="text" value="{{old('phone')}}"  class="l-operator" placeholder="Enter Phone" id="phone" name="phone" style=height: 1.2rem !important; color: black !important;">

                        </div>

                        <div class="form-control-input">
                            <label>Message:
                            </label>
                            <textarea cols="8" rows="10" class="l-operator" placeholder="Write your message..." id="message" name="message" style="height: 4.2rem !important; color: black !important;">{{old('message')}}</textarea>
                        </div>

                        <div class="form-control-add" style="margin-left: 122px;">
                            <input type="submit" id="submit" class="l-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection
