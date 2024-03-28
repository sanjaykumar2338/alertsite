@extends('frontend.layout.dashboard')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    .container {
        padding: 2rem 0rem;
    }

    h4 {
        margin: 2rem 0rem 1rem;
    }

    .table-image {
        td, th {
            vertical-align: middle;
        }
    }
</style>


<!-- ========== Start about-us-section ========== -->
<div class="container">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"><i class="nav-icon fas fa-walking"></i> My Track(s)</span>
        <span class="navbar-brand mb-0 h1"><a href="{{route('track.list')}}"><i class="fas fa-arrow-left"></i>Back</a></span>
    </div>
  </nav>
  <div class="row">
    <div class="col-12">

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
          <div class="form-group">
            <label for="exampleFormControlSelect1">Store</label>
            <select class="selectpicker form-control" name="store" id="store" data-live-search="true">
              <option value="" disabled selected>Type store name</option>
              @foreach($stores as $store)
                <option value="{{$store->store_id}}">{{$store->store_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
              <label for="exampleFormControlSelect1">Operator</label>
              <select class="form-control" id="operator" name="operator">
                  <option value=">">Great than</option>
                  <option value="==">Equal to</option>
                  <option value=">=">Greater than or Equal to</option>
              </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">PERCENT</label>
            <select class="form-control" id="discount_type" name="discount_type">
              <option>Fixed</option>
              <option>Percentage</option>
            </select>
          </div>
          
          <div class="form-group">
              <label for="exampleFormControlSelect1">Amount</label>
              <input type="number" class="form-control" id="price" name="price" oninput="this.value = this.value.replace(/[^\d]/g, '');">
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Alert Type</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="email" name="alert_email" id="alert_email">
                <label class="form-check-label" for="flexRadioDefault1">
                  Email
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="text" name="alert_text" id="alert_text">
                <label class="form-check-label" for="flexRadioDefault2">
                  Text
                </label>
              </div>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">ALERT</label>
              <select class="form-control" id="status" name="status">
                  <option value="1">On</option>
                  <option value="0">Off</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection