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

      <form name="save_track" method="post" action="{{route('track.update', $track->id)}}">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Store</label>
            <select class="selectpicker form-control" name="store" id="store" data-live-search="true">
              @foreach($stores as $store)
                <option {{$track->store_id==$store->store_id ? 'selected':''}} value="{{$store->store_id}}">{{$store->store_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Discount Type</label>
            <select class="form-control" id="discount_type" name="discount_type">
              <option {{$track->discount_type=='Fixed' ? 'selected':''}}>Fixed</option>
              <option {{$track->discount_type=='Percentage' ? 'selected':''}}>Percentage</option>
            </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Operator</label>
              <select class="form-control" id="operator" name="operator">
                  <option {{$track->operator=='>' ? 'selected':''}} value=">">> (Great than)</option>
                  <option {{$track->operator=='==' ? 'selected':''}} value="==">== (Equal to)</option>
              </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Price</label>
              <input type="number" value="{{$track->price}}" class="form-control" id="price" name="price">
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Alert Type</label>
              <div class="form-check">
                <input class="form-check-input" {{$track->alert_email=='email' ? 'checked':''}} type="checkbox" value="email" name="alert_email" id="alert_email">
                <label class="form-check-label" for="flexRadioDefault1">
                  Email
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" {{$track->alert_text=='text' ? 'checked':''}} type="checkbox" value="text" name="alert_text" id="alert_text">
                <label class="form-check-label" for="flexRadioDefault2">
                  Text
                </label>
              </div>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control" id="status" name="status">
                  <option value="1" {{$track->status=='1' ? 'selected':''}}>Active</option>
                  <option value="0" {{$track->status=='0' ? 'selected':''}}>In-Active</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection