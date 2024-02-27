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
        <span class="navbar-brand mb-0 h1"><i class="nav-icon fas fa-shopping-bag"></i> My Track(s)</span>
        <span class="navbar-brand mb-0 h1"><a href="{{route('track.list')}}"><i class="nav-icon fas fa-prev"></i>Back</a></span>
    </div>
  </nav>
  <div class="row">
    <div class="col-12">
      <form>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Store</label>
            <select class="form-control" id="store" name="store">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Discount Type</label>
            <select class="form-control" id="discount_type" name="discount_type">
              <option>Fixed</option>
              <option>Percentage</option>
            </select>
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Price</label>
              <input type="number" class="form-control" id="price" name="price">
          </div>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Status</label>
              <select class="form-control" id="status" name="status">
                  <option>Active</option>
                  <option>In-Active</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection