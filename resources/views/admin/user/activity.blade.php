@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-between mb-4">
        <div class="col-md-8">
            <h2 class="h3 mb-0 text-gray-800">User Activity</h2>
        </div>
        <div class="col-md-4">
            
            <div class="btn-group w-100">
                <a class="btn btn-outline-secondary btn-sm active" data-toggle="pill" href="#likes" aria-selected="true">Posts Likes</a>
                <a class="btn btn-outline-secondary btn-sm" data-toggle="pill" href="#comments" aria-selected="false">Posts Comments</a>
                <a class="btn btn-outline-secondary btn-sm" data-toggle="pill" href="#bookmark" aria-selected="false">Bookmark</a>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12">
           
              <div class="tab-content">
                <div id="likes" class="tab-pane fade active show">
                    @php
                        $likeDates=array();
                    @endphp
                    @foreach ($post_like as $like)
                        @php
                            if(!in_array(date('Y-m-d', strtotime( $like->created_at )), $likeDates)){
                                array_push($likeDates,date('Y-m-d', strtotime( $like->created_at )));
                                echo date('d F Y', strtotime( $like->created_at ));
                            }
                        @endphp
                        <div class="card border-0 shadow p-2 mb-2">
                            <div class="row">
                                <div class="col-md-1">
                                    @if (strpos($like->image, 'postimage') !== false)
                                        <img src="{{asset($like->image)}}" alt="{{ $like->image }}" class="card-img" style="object-fit:cover; width:100%px;">
                                    @else
                                        <img src="https://i.ytimg.com/vi/{{$like->image}}/hq720.jpg" alt="{{ $like->image }}" class="card-img" style="object-fit:cover; width:100%;">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <label class="d-block mb-0">Post Title</label>
                                    <b>{{ $like->title }}</b>
                                </div>
                                <div class="col-md-2">
                                    <label class="d-block mb-0">Like At</label>
                                    <b>{{ date('h:i a', strtotime( $like->created_at )) }}</b>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="comments" class="tab-pane fade">
                    @php
                        $displayed=array();
                        $commentDates=array();
                    @endphp
                    @foreach ($post_comment as $key => $comment)
                        @php
                            if(!in_array(date('Y-m-d', strtotime( $comment->created_at )), $commentDates)){
                                array_push($commentDates,date('Y-m-d', strtotime( $comment->created_at )));
                                echo date('d F Y', strtotime( $comment->created_at ));
                            }
                       
                            if(!in_array($comment->id, $displayed)){
                                array_push($displayed,$comment->id);
                                if($key>0){
                                    @endphp
                                    </div>
                                    <div class="card border-0 shadow p-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-1">
                                                @if (strpos($comment->image, 'postimage') !== false)
                                                    <img src="{{asset($comment->image)}}" alt="{{ $comment->image }}" class="card-img" style="object-fit:cover; width:100%px;">
                                                @else
                                                    <img src="https://i.ytimg.com/vi/{{$comment->image}}/hq720.jpg" alt="{{ $comment->image }}" class="card-img" style="object-fit:cover; width:100%;">
                                                @endif
                                            </div>
                                            <div class="col-md-11">
                                                <label class="d-block mb-0">Post Title</label>
                                                <b>{{ $comment->title }}</b>
                                            </div>
                                        </div>
                                    @php
                                }else{
                                    @endphp
                                    <div class="card border-0 shadow p-2 mb-2">
                                        <div class="row">
                                            <div class="col-md-1">
                                                @if (strpos($comment->image, 'postimage') !== false)
                                                    <img src="{{asset($comment->image)}}" alt="{{ $comment->image }}" class="card-img" style="object-fit:cover; width:100%px;">
                                                @else
                                                    <img src="https://i.ytimg.com/vi/{{$comment->image}}/hq720.jpg" alt="{{ $comment->image }}" class="card-img" style="object-fit:cover; width:100%;">
                                                @endif
                                            </div>
                                            <div class="col-md-11">
                                                <label class="d-block mb-0">Post Title</label>
                                                <b>{{ $comment->title }}</b>
                                            </div>
                                        </div>
                                    @php
                                }
                            }
                        @endphp
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label class="d-block mb-0">{{ ($comment->parent==0)?'Comment':'Reply' }} At</label>
                                <b>{{ date('h:i a', strtotime( $comment->created_at )) }}</b>
                            </div>
                            <div class="col-md-8">
                                <label class="d-block mb-0">Comment</label>
                                {{ $comment->comment }}
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div id="bookmark" class="tab-pane fade">
                    @php
                        $bookmarkDates=array();
                    @endphp
                    @foreach ($post_bookmark as $bookmark)
                        @php
                            if(!in_array(date('Y-m-d', strtotime( $bookmark->created_at )), $bookmarkDates)){
                                array_push($bookmarkDates,date('Y-m-d', strtotime( $bookmark->created_at )));
                                echo date('d F Y', strtotime( $bookmark->created_at ));
                            }
                        @endphp
                        <div class="card border-0 shadow p-2 mb-2">
                            <div class="row">
                                <div class="col-md-1">
                                    @if (strpos($bookmark->image, 'postimage') !== false)
                                        <img src="{{asset($bookmark->image)}}" alt="{{ $bookmark->image }}" class="card-img" style="object-fit:cover; width:100%px;">
                                    @else
                                        <img src="https://i.ytimg.com/vi/{{$bookmark->image}}/hq720.jpg" alt="{{ $bookmark->image }}" class="card-img" style="object-fit:cover; width:100%;">
                                    @endif
                                </div>
                                <div class="col-md-9">
                                    <label class="d-block mb-0">Post Title</label>
                                    <b>{{ $bookmark->title }}</b>
                                </div>
                                <div class="col-md-2">
                                    <label class="d-block mb-0">Bookmark At</label>
                                    <b>{{ date('h:i a', strtotime( $bookmark->created_at )) }}</b>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
              </div>
        </div>
    </div>
<script>
window.onload=function(){
    
    $('a[data-toggle="pill"]').on('click',function(){
        setTimeout(function(){
            var activeTab_ID=$('.tab-pane.active').attr('id');
            $('a[data-toggle="pill"]').removeClass('active');
            $('a[href="#'+activeTab_ID+'"]').addClass('active');
        },200);
    });
    
}

</script>
@endsection
