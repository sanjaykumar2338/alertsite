@extends('frontend.layout.homepagenew')
@section('content')
    <section class="main-section full-container">
        <div class="container flex l-gap flex-mobile lr-m">
            
            @includeIf('frontend.layout.dashboardsidebar')
            <div class="page-content home">
                <h1 class="page-title">Profile</h1>
                <div class="cmn-form">

                    <style>
                        .alert-danger {
                            color: #721c24;
                            background-color: #f8d7da;
                            border-color: #f5c6cb;
                        }

                        .alert {
                            padding: 2px;
                            margin-bottom: 50px;
                            border: 1px solid transparent;
                            border-radius: 4px;
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
                        </div><br>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success" style="color: green;font-size: 18px;">
                            {{ session('success') }}
                        </div><br>
                    @endif

                    <form name="profile_update" method="post" action="{{route('profile.update')}}">
                        @csrf
                        
                        <div class="form-control-input">
                            <label>First Name:
                            </label>
                            <input type="text" class="l-operator form-control" placeholder="Enter First Name" id="first_name" name="first_name" value="{{auth()->user()->first_name}}">
                        </div>

                        <div class="form-control-input">
                            <label>Last Name:
                            </label>
                            <input type="text" class="l-operator form-control" placeholder="Enter Last Name" id="last_name" name="last_name" value="{{auth()->user()->last_name}}">
                        </div>

                        <div class="form-control-input">
                            <label>Email:
                            </label>
                            <input type="text" class="l-operator form-control" placeholder="Enter Email" id="email" name="email" value="{{auth()->user()->email}}">
                        </div>

                        <div class="form-control-input">
                            <label>Phone:
                            </label>
                            <input type="text" class="l-operator form-control" placeholder="Enter Phone Number" id="phone_number" name="phone_number" value="{{auth()->user()->phone_number}}">
                        </div>

                        <div class="form-control-input">
                            <label>New Password:
                            </label>
                            <input autocomplete="new-password" type="password" class="l-operator form-control" placeholder="Enter new password" id="password" name="password" value="">
                        </div>

                        <div class="form-control-input">
                            <label>Conf. Password:
                            </label>
                            <input autocomplete="new-password" type="password" class="l-operator form-control" placeholder="Confirm new password" id="password_confirmation" name="password_confirmation" value="">
                        </div>

                        <div class="form-control-add">
                            <input type="submit" id="submit" class="l-submit" value="Update">
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

