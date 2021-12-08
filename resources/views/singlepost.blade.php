@extends('layouts.app')
@section('title' )
@section('content')


                <div class="col-lg-6 order-1 order-lg-2 pt-3" id="card_record">
                    @foreach ($data as $post)
                    <div class="card p-3">
                        <h5>{{$post->title}}</h5>
                        <p class="my-2">{{$post->sub_title}}</p> 
                        <p>{{$post->created_at->diffForHumans()}}</p>
                        <div>
                            <figure>
                            @if (strpos($post->image, 'postimage') !== false)
                                <img class="img-flex rounded w-100" src="{{asset($post->image)}}" alt="{{ $post->image }}">
                            @else
                                <iframe class="w-100" height="350" src="https://www.youtube.com/embed/{{$post->image}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                            </figure>
                            <p class="pt-4">{{$post->description}}</p>
                            <div class="d-felx w-100 mt-3">
                                @guest
                                <a class="post-icons mr-3">
                                    <i class="chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart" data-post-id="{{$post->id}}" aria-hidden="true"></i>
                                    <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                </a>
                                @else
                                    @if ($post->isliked->count() > 0)
                                    <a class="post-icons mr-3">
                                        <i class="chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart text-primary" data-post-id="{{$post->id}}" aria-hidden="true"></i>
                                        <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                    </a>
                                    @else
                                    <a class="post-icons mr-3">
                                        <i class="chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart" data-post-id="{{$post->id}}" aria-hidden="true"></i>
                                        <span id="count_{{$post->id}}">{{$post->like->count()}}</span>
                                    </a>
                                    @endif
                                @endguest
                                <a class="post-icons mr-3"><i class="align-middle mr-2 far fa-2x fa-comments" aria-hidden="true"></i><span>{{$post->comment->count()}}</span></a>

                                @if ($post->bookmark->count() > 0)
                                    <a class="post-icons mr-3"><i class="chosenBookmarkIcon align-middle far fa-2x fa-bookmark text-primary" data-post-id="{{$post->id}}" aria-hidden="true"></i></a>
                                @else
                                    <a class="post-icons mr-3"><i class="chosenBookmarkIcon align-middle far fa-2x fa-bookmark" data-post-id="{{$post->id}}" aria-hidden="true"></i></a>
                                @endif

                                @if (strpos($post->image, 'postimage') !== false)
                                <a class="post-icons mr-3" data-share-link="{{URL('/').'/singlepost/'.$post->id}}" data-title="{{$post->title}}" data-image="{{asset($post->image)}}">
                                @else
                                <a class="post-icons mr-3" data-share-link="{{URL('/').'/singlepost/'.$post->id}}" data-title="{{$post->title}}" data-image="https://i.ytimg.com/vi/{{$post->image}}/hq720.jpg">
                                @endif                                    
                                    <i class="chosenShareIcon align-middle fa fa-2x fa-share" data-post-id="25" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            @guest
                            @else
                            <div class="input-group mt-4">
                                <div class="input-group-prepend">
                                    <img class="mr-2" height="40" src="{{URL('/')}}/image/{{Auth::user()->image}}" alt="profile picture">
                                </div>
                                <input type="text" class="form-control border-light" data-postid="1" id="comment_input" placeholder="Write a comment...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary border-light" id="submitComment" type="submit">send</button>
                                </div>
                            </div>
                            @endguest
                            <div id="comment_tree">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- post status end -->
                </div>
<script>
window.onload=function(){
    $('#submitComment').on('click',function(){
        var message=$('#comment_input').val();
        if(message.trim()!=""){
            var postid=$('#comment_input').attr('data-postid');
            $.ajax({
                type:"post",
                url:'{{URL('/')}}/setComment',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'postid':postid,
                    'comment':message,
                    'p_comment':0
                },
                success: function(data){
                    $('#comment_input').val("");
                    if(data=='success'){
                        getComments(postid);
                    }
                }
            })
        }
    });

    function getComments(postid){
        $.ajax({
            type:"post",
            url:"{{URL('/')}}/getComments",
            data: {
                "_token": "{{ csrf_token() }}",
                'postid':postid
            },
            beforeSend:function(){
                $('#comment_tree').html('<i class="fa fa-circle-notch fa-spin"></i>');
            },
            success: function(data){
                var build='';
                var currentParent="";
                for(var i=0;i<data.length;i++){
                    if(data[i]['parent_comment_id']==0){
                      
                        if(currentParent!=data[i]['parent_comment_id']){
                            currentParent=data[i]['parent_comment_id'];
                            
                                build+='<div class="row mx-0 comment-parent">'+
                                        '<div class="comment-line"></div>'+
                                        '<div class="col-1 p-0">'+
                                            '<img height="30" class="avatar" src="{{URL('/')}}/image/'+data[i]['users'][0]['image']+'">'+
                                            
                                        '</div>'+
                                        '<div class="col-11 mb-3">'+
                                            '<p class="font-weight-bold mb-0">'+data[i]['users'][0]['name']+' <small class="text-muted">'+ timeSince(new Date(data[i]['created_at']))+'</small></p>'+
                                            '<p class="mb-0">'+data[i]['comment']+'</p>'+
                                            '<div class="text-muted"><a data-comment-id="'+data[i]['id']+'"><i class="fa fa-heart"></i> <span>0</span></a> <a>Reply</a></div>'+
                                        '</div>';
                            
                        }else{
                            @guest
                            @else
                                if(i>0){
                                    build+='<div class="col-12 mx-0 row ml-4">'+
                                                '<div class="input-group w-100">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<img class="mr-2" height="30" src="{{URL('/')}}/image/{{Auth::user()->image}}" alt="profile picture">'+
                                                    '</div>'+
                                                    '<input type="text" class="form-control border-light" id="comment_reply_'+data[i]['id']+'" placeholder="Write a comment...">'+
                                                    '<div class="input-group-append">'+
                                                        '<button class="btn btn-outline-secondary border-light" type="button" data-parent="'+data[i]['id']+'" data-relay-to="'+data[i]['post_id']+'">send</button>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div></div>';
                                }
                                build+='<div class="row mx-0 comment-parent">'+
                                    '<div class="comment-line"></div>'+
                                    '<div class="col-1 p-0">'+
                                        '<img height="30" class="avatar" src="{{URL('/')}}/image/'+data[i]['users'][0]['image']+'">'+
                                        
                                    '</div>'+
                                    '<div class="col-11 mb-3">'+
                                        '<p class="font-weight-bold mb-0">'+data[i]['users'][0]['name']+' <small class="text-muted">'+ timeSince(new Date(data[i]['created_at']))+'</small></p>'+
                                        '<p class="mb-0">'+data[i]['comment']+'</p>'+
                                        '<div class="text-muted"><a data-comment-id="'+data[i]['id']+'"><i class="fa fa-heart"></i> <span>0</span></a> <a>Reply</a></div>'+
                                    '</div>';
                            @endguest
                        }
                      
                    }else{
                        build+='<div class="child col-12 row mx-0 ml-4">'+
                                    '<div class="col-1 p-0">'+
                                        '<img height="30" class="avatar" src="{{URL('/')}}/image/'+data[i]['users'][0]['image']+'">'+
                                        '<div class="comment-line"></div>'+
                                    '</div>'+
                                    '<div class="col-11">'+
                                        '<p class="font-weight-bold mb-0">'+data[i]['users'][0]['name']+' <small class="text-muted">'+ timeSince(new Date(data[i]['created_at']))+'</small></p>'+
                                        '<p class="mb-0">'+data[i]['comment']+'</p>'+
                                        '<div class="text-muted"><a data-comment-id="'+data[i]['id']+'"><i class="fa fa-heart"></i> <span>0</span></a></div>'+
                                    '</div>'+
                                '</div>';
                    }
                }
                $('#comment_tree').html(build);

                $('*[data-relay-to]').on('click',function(){
                    var postid=$(this).attr('data-relay-to');
                    var parentcomment=$(this).attr('data-parent');
                    var message=$('#comment_reply_'+parentcomment).val();
                    if(message.trim()!=""){
                        $.ajax({
                            type:"post",
                            url:'{{URL('/')}}/setComment',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'postid':postid,
                                'comment':message,
                                'p_comment':parentcomment
                            },
                            success: function(data){
                                $('#comment_reply_'+parentcomment).val("");
                                if(data=='success'){
                                    getComments(postid);
                                }
                            }
                        })
                    }
                });
            }
        })
    }
    setTimeout(function(){
        getComments({{$post->id}});
    },1000);


    //Likes
    $('.chosenHeartIcon').on('click', function(e) {
        e.preventDefault();
        var obj=$(this);
        @guest
            window.location.href = "{{route('login')}}";
        @else
            var postid=$(obj).attr('data-post-id');
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
                        $(obj).attr('class', 'chosenHeartIcon align-middle mr-2 fa fa-2x fa-heart text-primary');
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
            var postid=$(this).attr('data-post-id');

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
                        $(obj).attr('class', 'chosenBookmarkIcon align-middle far fa-2x fa-bookmark text-primary');
                    }else if(response=='dislike'){
                        $(obj).attr('class', 'chosenBookmarkIcon align-middle far fa-2x fa-bookmark');
                    }
                }

            });
        @endguest
    });

    //Share
    $('a[data-share-link]').on('click',function(){
        var link=$(this).attr('data-share-link');
        var title=$(this).attr('data-title');
        var image=$(this).attr('data-image');
        $('#shareDialog .modal-body').find('input').val(link);
        $('#shareDialog .modal-body').find('h5').text(title);
        $('#shareDialog .modal-body').find('img').attr('src',image);
        $('#shareDialog').modal('show');
    });
    $('.copy-link').on('click',function(){
        var obj=$(this);
        var link=$('#shareDialog .modal-body').find('input').val();
        navigator.clipboard.writeText(link).then(function() {
            $(obj).find('small').text('Copied')
            setTimeout(function(){
                $(obj).find('small').text('Copy Link');
            },3000);
        }, function(err) {
            alert('Async: Could not copy link');
        });
    });
    $('.share-twitter').on('click',function(){
        var link=$('#shareDialog .modal-body').find('input').val();
        var title=$('#shareDialog .modal-body').find('h5').text();
        var url='http://www.twitter.com/intent/tweet?url='+link+'&text='+title;
        window.open(url,'_blank');
    });
    $('.share-facebook').on('click',function(){
        var link=$('#shareDialog .modal-body').find('input').val();
        var title=$('#shareDialog .modal-body').find('h5').text();
        var url='http://www.facebook.com/sharer/sharer.php?u='+link+'&t='+title;
        window.open(url,'_blank');
    });
    $('.share-by-email').on('click',function(){
        var link=$('#shareDialog .modal-body').find('input').val();
        var title=$('#shareDialog .modal-body').find('h5').text();
        var url='mailto:?subject=Speekur&body='+title+',%0D%0A%0D%0ATo view the article please click the following link: '+link;
        window.open(url,'_blank');
    });
}
</script>
@endsection
