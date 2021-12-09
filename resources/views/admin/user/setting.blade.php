@extends('admin.layouts.app')

@section('content')
<div class="container">



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="h3 mb-0 text-gray-800">User setting</h2>
    </div>
	<div class="row">
        {{-- <div class="col-md-12">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">Posts Likes</a></li>
                <li><a data-toggle="pill" href="#Comments">Posts Comments</a></li>
                <li><a data-toggle="pill" href="#Bookmark">Bookmark</a></li>
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    @foreach ($post_like as $like)
                        <div class="card p-2">
                            {{ $like->created_at }}
                            {{ $like->title }}
                        </div>
                    @endforeach
                </div>
                <div id="Comments" class="tab-pane fade">
                    @php
                        $displayed=array();
                    @endphp
                    @foreach ($post_comment as $comment)
                        <div class="card p-2">
                            @php
                                if(!in_array($comment->id, $displayed)){
                                   array_push($displayed,$comment->id);
                                   echo $comment->title;
                                }
                            @endphp
                            <hr>
                            {{ $comment->created_at }}
                            {{  $comment->title }}
                        </div>
                    @endforeach

                </div>
                <div id="Bookmark" class="tab-pane fade">
                    @foreach ($post_bookmark as $bookmark)
                        <div class="card p-2">
                            {{ $bookmark->created_at }}
                            {{ $bookmark->title }}
                        </div>
                    @endforeach
                </div>
              </div>
        </div> --}}
    </div>


@endsection
