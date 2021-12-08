@extends('layouts.app')

@section('title' )

@section('content')


<div class="col-lg-6 order-1 order-lg-2 pt-3" id="card_record">
    @foreach ($bookmark as $post)
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
            
                <div style="flex:4" class="d-felx mt-3 w-100">
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
                    @if (strpos($post->image, 'postimage') !== false)
                    <a class="post-icons mr-3" data-share-link="{{URL('/').'/singlepost/'.$post->id}}" data-title="{{$post->title}}" data-image="{{asset($post->image)}}">
                    @else
                    <a class="post-icons mr-3" data-share-link="{{URL('/').'/singlepost/'.$post->id}}" data-title="{{$post->title}}" data-image="https://i.ytimg.com/vi/{{$post->image}}/hq720.jpg">
                    @endif                                    
                        <i class="chosenShareIcon align-middle fa fa-2x fa-share" data-post-id="25" aria-hidden="true"></i>
                    </a>

                    <form class="float-right" action="" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id}}">
                        <button type="submit" class="btn btn-light text-primary">Remove</button>
                    </form>
                </div>

                

        </div>
    </div>
    @endforeach
</div>
<script>
window.onload=function(){
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
