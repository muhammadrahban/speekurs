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
            @if ($Category)
            <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
            @else
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            @endif

        </div>

        @if ($Category)
            <form method="POST" action="{{ route('category.update', $Category->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                <label for="formGroupExampleInput">Category Name</label>
                <input type="text" class="form-control" name="cat_name" value="{{ $Category->name }}" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <button type="submit" class="btn btn-warning btn-sm float-right">Update</button>
            </form>
        @else
            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <div class="form-group">
                <label for="formGroupExampleInput">Category Name</label>
                <input type="text" class="form-control" name="cat_name" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <button type="submit" class="btn btn-warning btn-sm float-right">Submit</button>
            </form>
        @endif

    </div>
    <!-- /.container-fluid -->
@endsection
