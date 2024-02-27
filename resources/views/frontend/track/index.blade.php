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
        <span class="navbar-brand mb-0 h1"><a href="{{route('track.add')}}"><i class="nav-icon fas fa-plus"></i> Add New</a></span>
    </div>
  </nav>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Store Name</th>
            <th scope="col">Discount Type(Per/Fixed)</th>
            <th scope="col">On Price Action</th>
            <th scope="col">Status</th>
            <th scope="col">Created On</th>
          </tr>
        </thead>
        <tbody>
          @if($tracks->count() > 0) 
            @foreach($tracks as $track) 
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
          @else
            <tr>
                <td colspan="6" style="text-align: center;">No record found </td>
            </tr  
          @endif  
        </tbody>
      </table>
    </div>
  </div>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        @if ($tracks->previousPageUrl())
            <a href="{{ $orders->previousPageUrl() }}"><< Previous</a>
        @endif
        
        @if ($tracks->nextPageUrl())
            <a href="{{ $orders->nextPageUrl() }}">Next >></a>
        @endif
    </div>
  </nav>
</div>
@endsection