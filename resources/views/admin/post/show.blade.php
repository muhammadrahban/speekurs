@extends('admin.layouts.app')

@section('content')
<style>

    .panel-shadow {
        box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
    }
    .panel-white {
    border: 1px solid #dddddd;
    }
    .panel-white  .panel-heading {
    color: #333;
    background-color: #fff;
    border-color: #ddd;
    }
    .panel-white  .panel-footer {
    background-color: #fff;
    border-color: #ddd;
    }

    .post .post-heading {
    height: 95px;
    padding: 20px 15px;
    }
    .post .post-heading .avatar {
    width: 60px;
    height: 60px;
    display: block;
    margin-right: 15px;
    }
    .post .post-heading .meta .title {
    margin-bottom: 0;
    }
    .post .post-heading .meta .title a {
    color: black;
    }
    .post .post-heading .meta .title a:hover {
    color: #aaaaaa;
    }
    .post .post-heading .meta .time {
    margin-top: 8px;
    color: #999;
    }
    .post .post-image .image {
    width: 100%;
    height: auto;
    }
    .post .post-description {
    padding: 15px;
    }
    .post .post-description p {
    font-size: 14px;
    }
    .post .post-description .stats {
    margin-top: 20px;
    }
    .post .post-description .stats .stat-item {
    display: inline-block;
    margin-right: 15px;
    }
    .post .post-description .stats .stat-item .icon {
    margin-right: 8px;
    }
    .post .post-footer {
    border-top: 1px solid #ddd;
    padding: 15px;
    }
    .post .post-footer .input-group-addon a {
    color: #454545;
    }
    .post .post-footer .comments-list {
    padding: 0;
    margin-top: 20px;
    list-style-type: none;
    }
    .post .post-footer .comments-list .comment {
    display: block;
    width: 100%;
    margin: 20px 0;
    }
    .post .post-footer .comments-list .comment .avatar {
    width: 35px;
    height: 35px;
    }
    .post .post-footer .comments-list .comment .comment-heading {
    display: block;
    width: 100%;
    }
    .post .post-footer .comments-list .comment .comment-heading .user {
    font-size: 14px;
    font-weight: bold;
    display: inline;
    margin-top: 0;
    margin-right: 10px;
    }
    .post .post-footer .comments-list .comment .comment-heading .time {
    font-size: 12px;
    color: #aaa;
    margin-top: 0;
    display: inline;
    }
    .post .post-footer .comments-list .comment .comment-body {
    margin-left: 50px;
    }
    .post .post-footer .comments-list .comment > .comments-list {
    margin-left: 50px;
    }
</style>
<div class="container">

    <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">Post Detail</h2>
        {{-- <a href="{{ route('post.create') }}"><button class="btn btn-warning btn-sm">Add Post</button></a> --}}

    </div>
	<div class="row">
        @foreach ($post as $data)
            <div class="col-sm-12">
                <div class="panel panel-white post panel-shadow">
                    <div class="post-image">
                        <img src="{{ asset($data->image) }}" width="100" class="image" alt="image post">
                    </div>
                    <div class="post-description">
                        <h4>{{ $data->title }}</h4>
                        <p>{{ $data->sub_title }}</p>
                        <div class="stats">
                            <a class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-up icon"></i>{{$data->like->count()}}
                            </a>
                        </div>
                    </div>
                    <div class="post-footer">
                        <ul class="comments-list">
                            @foreach ($data->commentUser as $comment)
                                <li class="comment">
                                    <a class="pull-left" href="#">
                                        <img class="avatar" src="{{asset('image/'.$comment->image)}}" alt="avatar">
                                    </a>
                                    <div class="comment-body">
                                        <div class="comment-heading">
                                            <h4 class="user">{{$comment->name}}</h4>
                                            <h5 class="time">{{$comment->created_at->diffForHumans()}}</h5>
                                        </div>
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                    <div class="float-right">
                                        <a onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                                            <button class="btn btn-sm btn-warning">Remove</button>
                                        </a>
                                        <form id="logout-form" action="{{ route('page.update', $comment->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" value="{{$comment->id}}" name="comment_id">
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
