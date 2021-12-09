<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Speekur @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/front/images/Speekur_Logo_mobile.png ')}}">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bicon.min.css ')}} ">
    <!-- Flat Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/flaticon.css ')}} ">
    <!-- audio & video player CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/plyr.css ')}} ">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/slick.min.css ')}} ">
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/nice-select.css ')}} ">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/perfect-scrollbar.css ')}} ">
    <!-- light gallery css -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins/lightgallery.min.css ')}} ">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bootstrap.min.css ')}}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css ')}} ">
    <script src="https://kit.fontawesome.com/79e46b1496.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="search_result"></div>
    <!-- header area start -->
    <header class="shadow">
        <div class="header-top sticky bg-white d-none d-lg-block py-2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-4">
                        <div class="brand-logo text-left">
                            <a href="{{ URL('/') }}">
                                <img height="40" src="{{ asset('assets/front/images/Speekur_website_logo.png')}}" alt="brand logo">
                            </a>
                        </div>
                    </div>

                    <!-- search -->
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                            </div>
                            <input name="Search" type="text" placeholder="Search" class="form-control border-muted">
                        </div>
                    </div>
                    <!-- search  end-->

                    @guest
                        <!-- nav links -->
                        <div class="col-md-4">
                            <!-- header top navigation start -->
                            <div class="header-top-navigation text-left text-md-right font-weight-bold">
                                <nav>
                                    <ul>
                                        @if (Route::has('register'))
                                            <li><a class="btn btn-primary" href="{{ route('register') }}">Sign up</a></li>
                                        @endif
                                        <li ><a class="nav-link pr-4" href="{{ route('login') }}">Login</a></li>
                                        <li>
                                            <div class="dropdown">
                                                <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About <i style="font-size: 21px;" class="align-top fa fa-caret-down text-primary"></i></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  @foreach (getPage() as $page)
                                                    <a class="dropdown-item" href="{{ url('/page', $page->slug) }}">{{ $page->title }}</a>
                                                  @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- header top navigation start -->
                        </div>
                        <!-- nav links end -->
                    @else
                        <div class="col-md-4">
                            <div class="header-top-navigation font-weight-bold">
                                <nav>
                                    <ul class="d-flex align-items-center justify-content-end">
                                        <li>
                                            <div class="profile-setting-box text-left">
                                                <div class="dropdown ">
                                                    <a class="d-flex" role="button" type="button" class="btn" data-toggle="dropdown">
                                                        <img class="mx-2" height="40" src="{{URL('/')}}/image/{{Auth::user()->image}}" alt="profile picture">
                                                        <div>
                                                            <span class="mb-0 font-weight-bold text-dark">{{ Auth::user()->name }}</span>
                                                            <small class="d-block text-dark">{{ Auth::user()->email }}</small>
                                                        </div>
                                                        <i style="font-size: 21px;" class="align-top fa fa-caret-down text-primary"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                                                        @foreach (getPage() as $page)
                                                            <a class="dropdown-item px-2" href="{{ url('/page', $page->slug) }}">{{ $page->title }}</a>
                                                        @endforeach
                                                        <a class="dropdown-item px-2"  href="{{ route('profile') }}">
                                                            <i class="fa fa-cog mr-2"></i> Account
                                                        </a>
                                                        <a class="dropdown-item px-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                                            <i class="fa fa-sign-out-alt mr-2"></i> Sign out
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </a>

                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    @endguest


                </div>
            </div>
        </div>
        <div class="mobile-header-wrapper sticky d-block d-lg-none">
            <div class="mobile-header position-relative px-2">
                <div class="mobile-logo">
                    <a href="{{ URL('/') }}">
                        <img height="40" src="{{ asset('assets/front/images/Speekur_Logo_mobile.png')}}" alt="logo">
                    </a>
                </div>
                <div class="mobile-menu ">
                    <ul>
                        <li>
                            <span class="search-trigger">
                                Search....
                                <i class="search-icon flaticon-search"></i>
                                <i class="close-icon flaticon-cross-out"></i>
                            </span>
                            <div class="mob-search-box bg-white">
                                <input name="Search" type="text" placeholder="Search" class="form-control border-light">
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="mobile-header-profile-menu">
                    <!-- profile picture end -->
                    <div class="profile-thumb profile-setting-box">
                        @guest
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">
                                    <span> Sign up</span>
                                </a>
                            @endif
                            <a href="javascript:void(0)" class="profile-triger">
                                <i class="fa fa-2x fa-bars"></i>
                            </a>
                            <div class="profile-dropdown text-left">
                                <div class="profile-body">
                                    <ul>
                                        <li ><a href="{{ route('login') }}">Login</a></li>
                                        @foreach (getPage() as $page)
                                            <li ><a href="{{ url('/page', $page->slug) }}">{{ $page->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="javascript:void(0)" class="profile-triger">
                                <img height="40" class="avatar" src="{{URL('/')}}/image/{{Auth::user()->image}}" alt="profile picture">
                                <i class="fa fa-2x ml-2 align-middle fa-bars"></i>
                            </a>
                            <div class="profile-dropdown text-left">
                                <div class="profile-body">
                                    <ul>
                                        <li>
                                            <div class="profile-head py-0">
                                                <h5>{{ Auth::user()->name }}</h5>
                                                <small>{{ Auth::user()->email }}</small>
                                            </div>
                                        </li>
                                        <li><hr></li>
                                        <li><a href="{{ route('profile') }}"><i class="fa fa-cog"></i>Account</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" >
                                                <i class="fa fa-sign-out-alt"></i>Sign out
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </a>
                                        </li>
                                        <li><hr></li>
                                        @foreach (getPage() as $page)
                                            <li ><a href="{{ url('/page', $page->slug) }}">{{ $page->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </div>
                    <!-- profile picture end -->
                </div>
            </div>
        </div>

        @if (Route::currentRouteName()=='')
        <div class="col-12 sticky nav-bottom bg-white">
             @guest
            <h5 class="mx-auto my-5 col-lg-6 m-0 text-center">
                Keep up with interesting news, opinions and discussions at Speekur.
                <a href="{{ route('register') }}" class="text-primary">Sign up</a> to comment, save and share
            </h5>
            @endguest
            <div class="col-lg-6 offset-md-3 d-block d-md-flex p-0 category-nav">
                <div style="flex:3" class="header-top-navigation">
                    <nav class="font-weight-bold">
                        <ul class="d-flex flex-wrap justify-content-start">
                            @foreach (getCategories() as $key => $value)
                                <li class="mr-4 {{ ($key==0)? 'active':'' }}" id="cat_tab_{{ $value->id }}" data-category="{{ $value->id }}"><a>{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div style="flex:1" class="ml-md-5 ml-0 d-flex text-nowrap align-items-center justify-content-between font-weight-bold">
                    Sort By
                    <select id="sortType" class="text-primary bg-transparent border-0 font-weight-bold">
                        <option value="1">Most Recent</option>
                        <option value="2">Most Liked This Week</option>
                        <option value="3">Most Liked All Time</option>
                        <option value="4">Most Comment This Week</option>
                        <option value="5">Most Comments All Time</option>
                    </select>
                </div>
            </div>
        </div>
        @endif
    </header>
    <!-- header area end -->
    <main>
        <div class="main-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 order-2 order-lg-1">
                        @guest
                        @else
                            <aside class="widget-area side-bar-sticky pt-3">
                                <div class="card p-0">
                                    <ul>
                                        <li class="p-3 unorder-list align-items-center">
                                            <i style="width:35px"  class="fa fa-2x fa-house-user text-center mr-2"></i>
                                            <h6 class="m-0"><a href="{{URL('/')}}">HOME</a></h6>
                                        </li>
                                        <li class="p-3 unorder-list align-items-center">
                                            <i style="width:35px" class="fa fa-2x fa-bookmark text-center mr-2"></i>
                                            <h6 class="m-0"><a href="{{URL('/bookmark')}}">BOOKMARK</a></h6>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        @endguest
                    </div>

                    @yield('content')
                    <div class="col-lg-3 order-3">
                        @if (Route::currentRouteName()=='')
                        <aside class="widget-area side-bar-sticky pt-3">
                            <div class="card p-0">
                                <h5 class="mb-2 p-3">What's Happening</h5>
                                <div class="widget-body">
                                    <ul>

                                        @foreach (getFeaturedPost() as $post)
                                            <li class="unorder-list">
                                                <a href="{{URL('/')}}/singlepost/{{$post->id}}" class="p-3 w-100 widget-list-item d-flex justify-content-between">
                                                    <div class="unorder-list-info pl-0 pr-2">
                                                        <small class="d-block text-muted"><b>{{$post->Category->name}}</b> - {{$post->created_at->diffForHumans()}}</small>
                                                        <h6>{{$post->title}}</h6>
                                                    </div>
                                                    <div class="profile-thumb">
                                                        <figure class="">
                                                            @if (strpos($post->image, 'postimage') !== false)
                                                                <img src="{{asset($post->image)}}" alt="{{ $post->image }}" style="width:70px; border-radius:5px;">
                                                            @else
                                                                <img src="https://i.ytimg.com/vi/{{$post->image}}/hq720.jpg" style="width:70px; border-radius:5px;">
                                                            @endif
                                                        </figure>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="bi bi-finger-index"></i>
    </div>
    <!-- Scroll to Top End -->
    <div class="modal fade" id="shareDialog" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share this post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="border-light rounded d-flex">
                    <img class="rounded" height="70" width="70" style="object-fit:cover;" src="">
                    <div style="flex:4" class="ml-3">
                        <h5></h5>
                        <input readonly class="border-0 p-0 m-0 w-100">
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-start">
                <div class="text-center copy-link">
                    <button type="button" class="btn btn-light share-icon"><i class="fa fa-link"></i></button>
                    <small class="d-block">Copy Link</small>
                </div>
                <div class="text-center share-twitter">
                    <button type="button" class="btn btn-light share-icon"><i class="fab fa-twitter"></i></button>
                    <small class="d-block">Twitter</small>
                </div>
                <div class="text-center share-facebook">
                    <button type="button" class="btn btn-light share-icon"><i class="fa fa-thumbs-up"></i></button>
                    <small class="d-block">Facebook</small>
                </div>
                <div class="text-center share-by-email">
                    <button type="button" class="btn btn-light share-icon"><i class="fa fa-envelope"></i></button>
                    <small class="d-block">Email</small>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- JS
============================================ -->
    <script src="{{asset('assets/front/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{ asset('assets/front/js/vendor/modernizr-3.6.0.min.js ')}}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/front/js/vendor/jquery-3.3.1.min.js ')}}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('assets/front/js/vendor/popper.min.js ')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/front/js/vendor/bootstrap.min.js ')}}"></script>
    <!-- Slick Slider JS -->
    <script src="{{ asset('assets/front/js/plugins/slick.min.js ')}}"></script>
    <!-- nice select JS -->
    {{-- <script src="{{ asset('assets/front/js/plugins/nice-select.min.js ')}}"></script> --}}
    <!-- audio video player JS -->
    <script src="{{ asset('assets/front/js/plugins/plyr.min.js ')}}"></script>
    <!-- perfect scrollbar js -->
    <script src="{{ asset('assets/front/js/plugins/perfect-scrollbar.min.js ')}}"></script>
    <!-- light gallery js -->
    <script src="{{ asset('assets/front/js/plugins/lightgallery-all.min.js ')}}"></script>
    <!-- image loaded js -->
    <script src="{{ asset('assets/front/js/plugins/imagesloaded.pkgd.min.js ')}}"></script>
    <!-- isotope filter js -->
    <script src="{{ asset('assets/front/js/plugins/isotope.pkgd.min.js ')}}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/front/js/main.js ')}}"></script>

     <script type='text/javascript'>

       var height=0;
       height=document.querySelectorAll('.header-top')[0].clientHeight;
       if(height==0){
            height=document.querySelectorAll('.mobile-header-wrapper')[0].clientHeight;
       }
       $('#search_result').css('top',height+'px');
       if($('.nav-bottom').length>0){
            $('.nav-bottom').css('margin-top',height+'px');
            height+=document.querySelectorAll('.nav-bottom')[0].clientHeight;
       }
       $('header').first().css({
           'height':height+'px',
           'width':'100%',
           'position':'fixed',
           'z-index':'1000'
        });
       $('.main-wrapper').parent().css('padding-top',height+'px');
       $('.side-bar-sticky').css('top',height+'px');


        $('#sortType').on('change',function(){
            fetchRecords();
        });
        $(document).ready(function(){
            if($(location).attr("href").indexOf("singlepost")==-1 && $(location).attr("href").indexOf("bookmark")==-1){
                fetchRecords();
            }

            // Search by keyword
             $('input[name="Search"]').on('keyup',function(){
                 if($(this).val().length>3){
                    var search=$(this).val().trim();
                    $.ajax({
                        url: "{{URL('/')}}/search/"+search,
                        type: 'get',
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            var len = 0;
                            $('#search_result').empty();
                            $('#search_result').removeClass('active');
                            if(response['data'] != null){
                                len = response['data'].length;
                            }
                            if(len > 0){
                                var build='';
                                for(var i=0; i<len; i++){
                                    build+='<a href="{{URL("/")}}/singlepost/' + response['data'][i].id +'"><div class="d-flex align-items-center">'+
                                            '<div style="flex:1; padding:10px;"><img class="rounded" src="{{URL("/")}}/'+ response['data'][i].image +'"></div>'+
                                            '<div style="flex:4">'+
                                                '<p class="font-weight-bold mb-0">'+response['data'][i].title +'</p>'+
                                                '<small>'+ timeSince(new Date(response['data'][i].created_at))+'</small>'+
                                            '</div>'+
                                        '</div></a><hr class="my-1">';
                                }
                                $('#search_result').html(build);
                                $('#search_result').addClass('active');
                            }
                        }
                    });
                 }else{
                    $('#search_result').empty();
                    $('#search_result').removeClass('active');
                 }
            });
        });

        $('.category-nav li').on('click',function(){
            var click=$(this);
            $('.category-nav').find('.active').each(function(){
                $(this).removeClass('active');
            });
            $(click).addClass('active');
            fetchRecords();
        });
        function fetchRecords(){

            var selected_cat=$('.category-nav').find('.active').attr('data-category');
            var sort=$('#sortType').val();
            if($(location).attr("href").indexOf("singlepost")>0){
                window.history.pushState({}, document.title, "{{URL('/')}}");
            }

            $.ajax({
                url: "{{URL('/')}}/getpost/"+selected_cat+"/"+sort,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    var len = 0;
                    $('#card_record').empty(); // Empty <tbody>

                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        for(var i=0; i<len; i++){

                            if(response['data'][i].isliked){
                                var like_img='fa fa-2x fa-heart text-primary';
                            }else{
                                var like_img='far fa-2x fa-heart';
                            }

                            if(response['data'][i].bookmark){
                                var bookmark_img='far fa-2x fa-bookmark text-primary';
                            }else{
                                var bookmark_img='far fa-2x fa-bookmark';
                            }

                            var tr_str =
                                '<div class="card p-3">'+
                                    '<h5><a href="{{URL("/")}}/singlepost/' + response['data'][i].id +'">' + response['data'][i].title +'</a></h5>'+
                                    '<p class="my-2">'+response['data'][i].sub_title +'</p>'+
                                ' <div>'+
                                    '<figure>';
                                        var shareAttr="";
                                        if(response['data'][i].image.indexOf("postimage")==-1){
                                            shareAttr='data-share-link="{{URL("/")}}/singlepost/' + response['data'][i].id +'" data-title="' + response['data'][i].title +'" data-image="https://i.ytimg.com/vi/'+ response['data'][i].image +'/hq720.jpg"';
                                            tr_str +='<iframe class="w-100" height="350" src="https://www.youtube.com/embed/'+ response['data'][i].image +'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                        }else{
                                            shareAttr='data-share-link="{{URL("/")}}/singlepost/' + response['data'][i].id +'" data-title="' + response['data'][i].title +'" data-image="{{URL("/")}}/'+ response['data'][i].image +'"';
                                            tr_str +='<a href="{{URL("/")}}/singlepost/' + response['data'][i].id + '"><img class="img-flex rounded w-100" height="350" src="{{URL("/")}}/'+ response['data'][i].image +'" alt="'+ response['data'][i].id +'"></a>';
                                        }
                                tr_str +='</figure>'+
                                        '<div class="d-felx w-100 mt-3">' +
                                            '<a class="post-icons mr-3">' +
                                                '<i class="chosenHeartIcon align-middle mr-2 '+like_img+'" data-post-id="'+ response['data'][i].id + '"></i>' +
                                                '<span id="count_'+ response['data'][i].id + '">'+ response['data'][i]['like'] + '</span>' +
                                            '</a>'+
                                            '<a class="post-icons mr-3" href="{{URL("/")}}/singlepost/' + response['data'][i].id +'">'+
                                                '<i class="align-middle mr-2 far fa-2x fa-comments"></i>' +
                                                '<span>'+ response['data'][i]['comments'] + '</span>'+
                                            '</a>'+
                                            '<a class="post-icons mr-3">'+
                                                '<i class="chosenBookmarkIcon align-middle '+bookmark_img+'" data-post-id="'+ response['data'][i].id + '"></i>'+
                                            '</a>'+
                                            '<a class="post-icons mr-3" '+shareAttr+'>'+
                                                '<i class="chosenShareIcon align-middle fa fa-2x fa-share" data-post-id="'+ response['data'][i].id + '"></i>'+
                                            '</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                            $("#card_record").append(tr_str);
                        }
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
                    }else{
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
                        $("#card_record").append(tr_str);
                    }

                }
            });
        }

        function timeSince(date) {
            var seconds = Math.floor((new Date() - date) / 1000);
            var interval = seconds / 31536000;

            if (interval > 1) {
            return Math.floor(interval) + " years";
            }
            interval = seconds / 2592000;
            if (interval > 1) {
            return Math.floor(interval) + " months";
            }
            interval = seconds / 86400;
            if (interval > 1) {
            return Math.floor(interval) + " days";
            }
            interval = seconds / 3600;
            if (interval > 1) {
            return Math.floor(interval) + " hours";
            }
            interval = seconds / 60;
            if (interval > 1) {
            return Math.floor(interval) + " minutes";
            }
            return Math.floor(seconds) + " seconds";
        }
     </script>
</body>

</html>
