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
        <div class="col-md-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">Posts Likes</a></li>
                <li><a data-toggle="pill" href="#Comments">Posts Comments</a></li>
                <li><a data-toggle="pill" href="#Bookmark">Bookmark</a></li>
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                  <h3>Posts Likes</h3>
                  <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Image</th>
                            <th>title</th>
                            <th>sub title</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                    @if (strpos($post->image, 'iframe')==true)
                                        <i class="fa fa-play fa-3x"></i>
                                    @else
                                        <img src="{{asset($post->image)}}" alt="{{ $post->image }}" width="30" height="30" class="rounded-circle">
                                    @endif
                                     <i class=" {{ ($post->featured == '1') ? 'fa fa-star text-primary' : '' }} "></i>
                                    </td>
                                    <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->sub_title }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('post.edit', $post->id)}}" title="Edit"><button class="btn btn-primary btn-sm">EDIT</button></a></td>
                                    <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="Comments" class="tab-pane fade">
                  <h3>Posts Comments</h3>
                  <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Image</th>
                            <th>title</th>
                            <th>sub title</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                    @if (strpos($post->image, 'iframe')==true)
                                        <i class="fa fa-play fa-3x"></i>
                                    @else
                                        <img src="{{asset($post->image)}}" alt="{{ $post->image }}" width="30" height="30" class="rounded-circle">
                                    @endif
                                     <i class=" {{ ($post->featured == '1') ? 'fa fa-star text-primary' : '' }} "></i>
                                    </td>
                                    <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->sub_title }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('post.edit', $post->id)}}" title="Edit"><button class="btn btn-primary btn-sm">EDIT</button></a></td>
                                    <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="Bookmark" class="tab-pane fade">
                  <h3>Bookmark</h3>
                  <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Image</th>
                            <th>title</th>
                            <th>sub title</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                    @if (strpos($post->image, 'iframe')==true)
                                        <i class="fa fa-play fa-3x"></i>
                                    @else
                                        <img src="{{asset($post->image)}}" alt="{{ $post->image }}" width="30" height="30" class="rounded-circle">
                                    @endif
                                     <i class=" {{ ($post->featured == '1') ? 'fa fa-star text-primary' : '' }} "></i>
                                    </td>
                                    <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->sub_title }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td><a href="{{ route('post.edit', $post->id)}}" title="Edit"><button class="btn btn-primary btn-sm">EDIT</button></a></td>
                                    <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <td>
                                            <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
        </div>
    </div>


@endsection
