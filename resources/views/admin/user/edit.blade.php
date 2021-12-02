@extends('admin.layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br />
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        </div>

        <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="formGroupNameInput">User Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="formGroupNameInput" placeholder="Example input">
            </div>
            <div class="form-group">
                <label for="formGroupEmailInput">User email</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" id="formGroupEmailInput" placeholder="Example input">
            </div>

            <div class="form-group">
                <label for="formStatus">
                    <input id="formStatus" type="checkbox" name="status" value="1" {{ ($user->status) ? 'checked' : '' }}>
                    User Status
                </label>
            </div>
            <button type="submit" class="btn btn-warning btn-sm float-right">Update</button>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
