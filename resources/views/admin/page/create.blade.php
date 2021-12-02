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
            @if ($Page)
            <h1 class="h3 mb-0 text-gray-800">Edit Page</h1>
            @else
            <h1 class="h3 mb-0 text-gray-800">Add Page</h1>
            @endif
        </div>

        @if ($Page)
            <form method="POST" action="{{ route('page.update', $Page->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="formGroupTitleInput">Page Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $Page->title }}" id="formGroupTitleInput" placeholder="Page Title">
                </div>
                <div class="form-group">
                    <label>Page Body</label>
                    <textarea type="text" class="form-control" name="body" id="editor">{{ $Page->body }}</textarea>
                </div>
                <label for="formGroupfeaturedInput" class="float-left"><input type="checkbox" name="featured" id="formGroupfeaturedInput" {{ ($Page->status == 1) ? 'checked' : '' }}> Active Page </label>
                <button type="submit" class="btn btn-warning btn-sm float-right">Update</button>
            </form>
        @else
            <form method="POST" action="{{ route('page.store') }}">
                @csrf
                <div class="form-group">
                    <label for="formGroupTitleInput">Page Title</label>
                    <input type="text" class="form-control" name="title" id="formGroupTitleInput" placeholder="Page Title">
                </div>
                <div class="form-group">
                    <label>Page Body</label>
                    <textarea type="text" class="form-control" name="body" id="editor"></textarea>
                </div>
                <label for="formGroupfeaturedInput" class="float-left"><input type="checkbox" name="featured" id="formGroupfeaturedInput" > Active Page </label>
                <button type="submit" class="btn btn-warning btn-sm float-right">Submit</button>
            </form>
        @endif

    </div>
    <!-- /.container-fluid -->
@endsection
