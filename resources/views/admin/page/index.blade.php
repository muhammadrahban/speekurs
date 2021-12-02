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
        <h2 class="h3 mb-0 text-gray-800">Pages List</h2>
        <a href="{{ route('page.create') }}"><button class="btn btn-warning btn-sm">Add Page</button></a>

    </div>
	<div class="row">
        <div class="col-md-12">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('page.edit', $page->id)}}" title="Edit"><button class="btn btn-primary btn-sm">Edit</button></a></td>
                            <form action="{{ route('page.destroy', $page->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button class="btn btn-danger btn-sm" type="submit">Delete</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>
</div>


@endsection
