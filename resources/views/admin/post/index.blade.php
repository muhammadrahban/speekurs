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
        <h2 class="h3 mb-0 text-gray-800">Posts List</h2>
        <a href="{{ route('post.create') }}"><button class="btn btn-warning btn-sm">Add Post</button></a>
    </div>
    @foreach ($posts as $post)
    <div class="card border-0 shadow-lg mb-3">
        <div class="row no-gutters">
            <div class="col-md-3 position-ralative" style=" min-height:150px;">
                @if (strpos($post->image, 'postimage') !== false)
                    <img src="{{asset($post->image)}}" alt="{{ $post->image }}" class="card-img h-100 position-absolute" style="object-fit:cover;">
                @else
                    <img src="https://i.ytimg.com/vi/{{$post->image}}/hq720.jpg" alt="{{ $post->image }}" class="card-img h-100 position-absolute" style="object-fit:cover;">
                @endif
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title mb-2 font-weight-bold text-dark">{{ ucfirst($post->title) }}</h5>
                    <p class="card-text mb-2">{{ ucfirst($post->sub_title) }}</p>
                    <div class="d-flex justify-content-between flex-wrap">
                        <span>
                            Last Modify {{ $post->updated_at->diffForHumans() }}
                        </span>
                        <div class="d-flex">
                            <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                            <a href="{{ route('post.edit', $post->id)}}" class="btn btn-primary btn-sm ml-2">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
