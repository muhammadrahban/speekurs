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
        <h2 class="h3 mb-0 text-gray-800">Categories List</h2>
        {{-- <a href="{{ route('category.create') }}"><button class="btn btn-warning btn-sm">Add Category</button></a> --}}

    </div>
	<div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr style="background-color:{{ ($user->status) ? 'rgba(198,219,210,0.5)' : 'rgba(255,0,0,0.5)' }};">

                            <td>{{ $user->id }}</td>
                            <td> <img src="{{ URL('/').'//image/'.$user->image  }}" width="24" height="24" /></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->status) ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                             <td><a href="{{ route('admin.user.activity', $user->id)}}" title="Activity"><button class="btn btn-success btn-sm">Activity</button></a></td>
                             <td><a href="{{ route('admin.user.edit', $user->id)}}" title="Edit"><button class="btn btn-primary btn-sm">Edit</button></a></td>
                            {{--<form action="{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button class="btn btn-danger btn-sm" type="submit">Delete</button></td>
                            </form> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
</div>


@endsection
