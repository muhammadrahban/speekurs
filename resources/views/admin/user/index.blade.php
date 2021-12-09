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
        <h2 class="h3 mb-0 text-gray-800">Registered Users</h2>
    </div>
	<div class="row">
        @foreach ($users as $user)
        <div class="col-lg-3 col-md-4 col-sm-6 p-0">
            <div class="card shadow-lg border-0 text-center">
                <div class="p-3">
                    <img class="avatar shadow-sm mx-auto mb-4" src="{{ URL('/').'/image/'.$user->image}}" width="70" height="70" />
                    <h5 class="font-weight-bold mb-0 text-dark">{{ ucwords($user->name) }}</h5>
                    <small class="d-block">{{ $user->email }}</small>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between">
                        <small class="d-block">Status<br><b>{!! ($user->status) ? '<span class="text-success"><i class="fa fa-check-circle"></i> Active</span>' : '<span class="text-danger"><i class="fa fa-times-circle"></i> Inactive</span>' !!}</b></small>
                        <small class="d-block">Joining<br><b>{{ $user->created_at->diffForHumans() }}</b></small>
                    </div>
                </div>
                <div class="card-footer p-2">
                    <div class="btn-group w-100">
                        <a class="btn btn-success btn-sm" href="{{ route('admin.user.activity', $user->id)}}" title="Activity">Activity</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit', $user->id)}}" title="Edit">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
