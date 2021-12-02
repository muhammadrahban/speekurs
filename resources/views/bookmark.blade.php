@extends('layouts.app')

@section('title' )

@section('content')


                <div class="col-lg-6 order-1 order-lg-2" >
                    <!-- share box start -->
                    <!-- share box end -->
                    <!-- post status start -->
                    @foreach ($bookmark as $post)
                        <div class="card">
                            <!-- post title start -->
                            <div class="post-title d-flex align-items-center">

                                <div class="posted-author">
                                    <h6 class="author">{{$post->title}}</h6>
                                </div>
                            </div>
                            <!-- post title start -->
                            <div class="post-content">
                                <p class="post-desc">
                                    {{$post->sub_title}}
                                </p>
                                <p>{{$post->created_at->diffForHumans()}}</p>
                                <div class="post-thumb-gallery">
                                    <figure class="post-thumb">
                                        <img src="{{ asset($post->image)}}" alt="post image">
                                    </figure>
                                </div>
                                <p class="pt-4">{{$post->description}}</p>
                                <div class="post-meta">
                                    <button class="post-meta-like">

                                        @if ($post->isliked->count() > 0)
                                            <img src="{{URL("/")}}/image/icon/heart_active.png" data-post-id="{{$post->id}}" class="chosenHeartIcon" width="24" height="24" />

                                        @else
                                            <img src="{{URL("/")}}/image/icon/heart.png" data-post-id="{{$post->id}}" class="chosenHeartIcon" width="24" height="24" />

                                        @endif
                                        {{-- <img src="like_img" data-post-id="{{$post->id}}" class="chosenHeartIcon" width="24" height="24" /> --}}
                                        <p style="float: right; margin-left: 10px;" id="count_{{$post->id}}">{{$post->like->count()}}</p>
                                    </button>
                                    <ul class="comment-share-meta">
                                        <li>
                                            <a href="{{URL("/")}}/singlepost/{{$post->id}}"><button class="post-comment">
                                                <i class="bi bi-chat-bubble"></i>
                                                <span>0</span>
                                            </button>
                                            </a>
                                        </li>
                                        <li>
                                            <button class="post-bookmark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button class="post-share">
                                                <i class="bi bi-share"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    @guest

                                    @else
                                    <div class="input-group my-4">
                                        <input type="text" class="form-control" data-postid="1" id="comment_input" placeholder="Enter your coment">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success" id="submitComment" type="submit">send</button>
                                        </div>
                                    </div>
                                    @endguest
                                    <div id="comment_tree">
                                        <!--loop for all comments-->
                                        {{-- <div class="comment-parent">
                                            <div class="row">
                                                <div class="col-1"><img class="avatar" src="userimage.png"></div>
                                                <div class="col-11">
                                                    <p class="font-weight-bold mb-0">User Name</p>
                                                    <p class="mb-0">User Name</p>
                                                    <small>Time ago</small>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control " id="comment_reply_1" placeholder="Reply">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-success" type="button" data-relay-to="1">send</button>
                                                </div>
                                            </div>
                                            <!--loop for all comments replies-->
                                            <div class="child row ml-4">
                                                <div class="col-1"><img class="avatar" src="userimage.png"></div>
                                                <div class="col-11">
                                                    <p class="font-weight-bold mb-0">User Name</p>
                                                    <p class="mb-0">User Name</p>
                                                    <small>Time ago</small>
                                                </div>
                                            </div>

                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- post status end -->


                </div>
<script>
    window.onload=function(){
        getComments({{$post->id}});
    }

</script>
@endsection
