@extends('layouts.app')
@section('title' )
@section('content')


                <div class="col-lg-6 order-1 order-lg-2" id="card_record">
                    @foreach ($data as $post)
                        <div class="card">

                            <div class="post-title d-flex align-items-center">
                                <div class="posted-author">
                                    <h6 class="author">{{$post->title}}</h6>
                                </div>
                            </div>

                            <div class="post-content">
                                <p class="post-desc">
                                    {{$post->sub_title}}
                                </p>
                                <p>{{$post->created_at->diffForHumans()}}</p>
                                <div class="post-thumb-gallery">
                                    <figure class="post-thumb">
                                    @if (strpos($post->image, 'postimage') !== false)
                                        <img src="{{asset($post->image)}}" alt="{{ $post->image }}">
                                    @else
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$post->image}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @endif
                                    </figure>
                                </div>
                                <p class="pt-4">{{$post->description}}</p>
                                <div class="post-meta p-0">
                                    @guest
                                    <a>
                                        <i class="chosenHeartIcon align-middle mr-2 far fa-2x fa-heart "></i>
                                        <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                    </a>
                                    @else
                                         @if ($post->isliked->count() > 0)
                                            <a>
                                                <i class="chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart"></i>
                                                <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                            </a>
                                        @else
                                            <a>
                                                <i class="chosenHeartIcon align-middle mr-2 far fa-2x fa-heart"></i>
                                                <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                            </a>
                                        @endif
                                    @endguest
                                   
                                    <ul class="comment-share-meta">
                                        <li>
                                            <a class="text-dark post-comment">
                                                <i class="align-middle mr-2  fa fa-2x fa-comments"></i>'
                                                <span>{{$post->comment->count()}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                @if ($post->bookmark->count() > 0)
                                                    <i class="chosenBookmarkIcon align-middle fa fa-2x fa-bookmark" data-post-id="{{$post->id}}"></i>
                                                @else
                                                    <i class="chosenBookmarkIcon align-middle far fa-2x fa-bookmark" data-post-id="{{$post->id}}"></i>
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <i class="chosenShareIcon align-middle fa fa-2x fa-share" data-post-id="{{$post->id}}"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div>

                                    @guest

                                    @else
                                    <div class="input-group my-4">
                                        <input type="text" class="form-control border-light" data-postid="1" id="comment_input" placeholder="Enter your coment">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary border-light" id="submitComment" type="submit">send</button>
                                        </div>
                                    </div>
                                    @endguest
                                    <div id="comment_tree">
                                        
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
    
    
        //Likes
        $('.chosenHeartIcon').on('click', function(e) {
            e.preventDefault();
            var obj=$(this);
            @guest
                window.location.href = "{{route('login')}}";
            @else
                var postid={{$post->id}};
                $.ajax({
                    url: "{{URL('/')}}/setLike",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'postid':postid
                    },
                    success: function(data){
                        var response=data[1].split(":")[0];
                        var count=data[1].split(":")[1];
                        if(response=='liked'){
                            $(obj).attr('class', 'chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart');
                            $('#count_'+postid).text(count);
                        }else if(response=='dislike'){
                            $(obj).attr('class', 'chosenHeartIcon align-middle mr-2 far fa-2x fa-heart');
                            $('#count_'+postid).text(count);
                        }
                    }

                });
            @endguest
        });
        //Bookmark
        $('.chosenBookmarkIcon').on('click', function(e) {
            e.preventDefault();
            var obj=$(this);
            @guest
                window.location.href = "{{route('login')}}";
            @else
                var postid={{$post->id}};
                
                $.ajax({
                    url: "{{URL('/')}}/sebookmark",
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'postid':postid
                    },
                    success: function(data){
                        var response=data[1].split(":")[0];
                        var count=data[1].split(":")[1];
                        if(response=='liked'){
                            $(obj).attr('class', 'chosenBookmarkIcon align-middle fa fa-2x fa-bookmark');
                        }else if(response=='dislike'){
                            $(obj).attr('class', 'chosenBookmarkIcon align-middle far fa-2x fa-bookmark');
                        }
                    }

                });
            @endguest
        });
    }
</script>
@endsection
