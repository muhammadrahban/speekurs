@extends('admin.layouts.app')

@section('content')
<div class="container">

    <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">User Activity</h2>

    </div>
	<div class="row">
        <div class="offset-md-1 col-md-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">User All Comment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        <div class="offset-md-1 col-md-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>


@endsection
