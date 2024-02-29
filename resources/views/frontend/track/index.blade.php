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
<div class="container" style="max-width: 1230px;">
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"><i class="nav-icon fas fa-walking"></i> My Track(s)</span>
        <span class="navbar-brand mb-0 h1"><a href="{{route('track.add')}}"><i class="nav-icon fas fa-plus"></i> Add New</a></span>
    </div>
  </nav>
  <div class="">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Store</th>
            <th scope="col">Store Name</th>
            <th scope="col">Discount Type(Per/Fixed)</th>
            <th scope="col">On Price Action</th>
            <th scope="col">Operator</th>
            <th scope="col">Alert</th>
            <th scope="col">Alert Type</th>
            <th scope="col">Created On</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if($tracks->count() > 0) 
            @foreach($tracks as $track) 
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$track->store_id}}</td>
                    <td>{{$track->store_name}}</td>
                    <td>{{$track->discount_type}}</td>
                    <td>{{$track->price}}</td>
                    <td>{{$track->operator=='>' ? 'Greater than' : ''}} {{$track->operator=='==' ? 'Equal to' : ''}}</td>
                    <td>{{$track->status==1 ? 'On':'Off'}}</td>
                    <td>{{$track->alert_email ? $track->alert_email.',':''}} {{$track->alert_text}}</td>
                    <td>{{$track->created_at}}</td>
                    <td><a href="{{route('track.edit',$track->id)}}">Edit</a> | <a onclick="return confirm('Are you sure ?')" href="{{route('track.destroy',$track->id)}}">Delete</a></td>
                </tr>
            @endforeach
          @else
            <tr>
                <td colspan="6" style="text-align: center;">No record found </td>
            </tr> 
          @endif  
        </tbody>
      </table>
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