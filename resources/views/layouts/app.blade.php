{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}


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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor/bootstrap.min.css ')}}    ">
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
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css ')}} ">

    <script src="https://kit.fontawesome.com/79e46b1496.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- header area start -->
    <header>
        <div class="header-top sticky bg-white d-none d-lg-block py-2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-2">
                        <!-- brand logo start -->
                        <div class="brand-logo text-center">
                            <a href="{{ URL('/') }}">
                                <img src="{{ asset('assets/front/images/Speekur_website_logo.png')}}" alt="brand logo">
                            </a>
                        </div>
                        <!-- brand logo end -->
                    </div>

                    <!-- search -->
                    <div class="col-md-4">

                            <!-- header top search start -->
                            <div class="header-top-search">
                                <form class="top-search-box">
                                    <input type="text" placeholder="Search" class="top-search-field">
                                    <button class="top-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                            <!-- header top search end -->

                    </div>
                    <!-- search  end-->

                    @guest
                        <!-- nav links -->
                        <div class="col-md-5 ">
                            <!-- header top navigation start -->
                            <div class="header-top-navigation">
                                <nav>
                                    <ul>
                                        @if (Route::has('register'))
                                            <li ><a href="{{ route('register') }}">Signup</a></li>
                                        @endif
                                        <li ><a href="{{ route('login') }}">Login</a></li>
                                        <li >
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  About
                                                </a>
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
                        <div class="col-md-3">
                            <div class="profile-setting-box">
                                <div class="profile-thumb-small">
                                    <a href="javascript:void(0)" class="profile-triger">
                                        <figure>
                                            <img src="assets/images/profile/profile-small-1.jpg" alt="profile picture">
                                        </figure>
                                    </a>
                                    <div class="profile-dropdown">
                                        <div class="profile-head">
                                            <h5 class="name"><a href="#">{{ Auth::user()->name }}</a></h5>
                                            <a class="mail" href="#">{{ Auth::user()->email }}</a>
                                        </div>
                                        <div class="profile-body">
                                            <ul>
                                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" >
                                                        <i class="flaticon-unlock"></i>Sign out
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                                @foreach (getPage() as $page)
                                                    <li>
                                                        <a href="{{ url('/page', $page->slug) }}">
                                                            <i class="far fa-file"></i>{{ $page->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li> --}}
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <!-- header area start -->
    <header>
        <div class="mobile-header-wrapper sticky d-block d-lg-none">
            <div class="mobile-header position-relative ">
                <div class="mobile-logo">
                    <a href="index.html">
                        <img src="{{ asset('assets/front/images/Speekur_Logo_mobile.png')}}" alt="logo">
                    </a>
                </div>
                <div class="mobile-menu ">
                    <ul>
                        <li>
                            Search....
                            <button class="search-trigger">
                                <i class="search-icon flaticon-search"></i>
                                <i class="close-icon flaticon-cross-out"></i>
                            </button>
                            <div class="mob-search-box">
                                <form class="mob-search-inner">
                                    <input type="text" placeholder="Search Here" class="mob-search-field">
                                    <button class="mob-search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sign-up">
                    <span> Sign up</span>
                </div>
                <div class="mobile-header-profile-menu">
                    <!-- profile picture end -->
                    <div class="profile-thumb profile-setting-box">
                        <a href="javascript:void(0)" class="profile-triger">
                            <figure class="profile-thumb-middle">
                                <img src="{{ asset('assets/front/images/bars-solid.svg')}}" alt="profile picture">
                            </figure>
                        </a>
                        <div class="profile-dropdown text-left">
                           <div class="profile-body">
                                <ul>
                                    <li><a href="profile.html">Home</a></li>
                                    <li><a href="profile.html">About</a></li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- profile picture end -->
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->
    <main>
        <div class="main-wrapper pt-80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 bot_nav">
                        <div class="col-lg-6 offset-md-3 d-flex">
                            <div class="header-top-navigation secondary_nav_bar_left">
                                <nav class="category-nav">
                                    <ul>
                                        @foreach (getCategories() as $key => $value)
                                        <li {{ ($key==0)? 'class=active ': " " }} id="cat_tab_{{ $value->id }}" data-category="{{ $value->id }}"><a   >{{ $value->name }}</a></li>

                                        @endforeach
                                        {{-- <li ><a href="index.html">NEWS</a></li>
                                        <li ><a href="index.html">DISCUSSION</a></li> --}}
                                    </ul>
                                </nav>
                            </div>

                            <div class="d-flex text-nowrap align-items-center">
                                Sort By
                                <select id="sortType" class="bg-transparent border-0y">
                                    <option value="1">Most Recent</option>
                                    <option value="2">Most Liked This Week</option>
                                    <option value="3">Most Liked All Time</option>
                                    <option value="4">Most Comment This Week</option>
                                    <option value="5">Most Comments All Time</option>
                                </select>
                                {{-- <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Sort by resent
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <button class="dropdown-item" type="button">most recent</button>
                                      <button class="dropdown-item" type="button">most liked this week</button>
                                      <button class="dropdown-item" type="button">most liked all time</button>
                                      <button class="dropdown-item" type="button">most comments this week</button>
                                      <button class="dropdown-item" type="button">most comments all time</button>
                                    </div>
                                  </div> --}}
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 order-2 order-lg-1">
                        @guest

                        @else
                            <div class="card widget-item">
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        <li class="unorder-list align-items-center">
                                            <h3 class="list-title"><a href="{{URL('/')}}">home</a></h3>
                                        </li>
                                        <li class="unorder-list align-items-center">
                                            <h3 class="list-title"><a href="{{URL('/bookmark')}}">Bookmark</a></h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </div>

                    @yield('content')

                    <div class="col-lg-3 order-3">
                        <aside class="widget-area">

                            <div class="card widget-item">
                                <h4 class="widget-title mb-4">What's Happening</h4>
                                <div class="widget-body">
                                    <ul class="like-page-list-wrapper">
                                        @foreach (getFeaturedPost() as $post)
                                            <li class="unorder-list align-items-center justify-content-between">
                                                <div class="unorder-list-info pl-0 pr-2">
                                                    <p class="list-title">{{$post->Category->name}} - {{$post->created_at->diffForHumans()}}</p>
                                                    <h3 class="list-subtitle"><a href="{{URL("/").'/singlepost/'. $post->id}}">{{$post->title}}</a></h3>
                                                </div>
                                                <div class="profile-thumb">
                                                    <a href="#">
                                                        <figure class="">
                                                            <img  style="width:70px; border-radius:5px;" src="{{ asset($post->image)}}" alt="profile picture">
                                                        </figure>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
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

    <!-- JS
============================================ -->

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

    <script src="{{asset('assets/front/js/vendor/jquery-3.3.1.min.js')}}"></script>

     <script type='text/javascript'>

        $('#sortType').on('change',function(){

            fetchRecords();
        });
        $(document).ready(function(){
            if($(location).attr("href").indexOf("singlepost")==-1){
                fetchRecords();
            }

            // Search by userid
            // $('#but_search').click(function(){
            //     var userid = Number($('#search').val().trim());
            //     if(userid > 0){
            //         fetchRecords(userid);
            //     }
            // });


           

            
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
                            var src_active = '{{URL("/")}}/image/icon/heart_active.png';
                            var src_noactive = '{{URL("/")}}/image/icon/heart.png';
                            var bookmark_active = '{{URL("/")}}/image/icon/bookmark_active.png';
                            var bookmark_noactive = '{{URL("/")}}/image/icon/bookmark.png';
                            if(response['data'][i].isliked){
                                var like_img=src_active;
                            }else{
                                var like_img=src_noactive;
                            }

                            if(response['data'][i]['bookmark']){
                                var bookmark_img=bookmark_active;
                            }else{
                                var bookmark_img=bookmark_noactive;
                            }

                            var tr_str =
                                '<div class="card">'+
                                    '<div class="post-title d-flex align-items-center">'+
                                    '<div class="posted-author">'+
                                            '<h6 class="author"><a href="{{URL("/")}}/singlepost/' + response['data'][i].id +'">' + response['data'][i].title +'</a></h6>'+
                                        '</div>'+
                                    '</div>'+
                                ' <div class="post-content">'+
                                        '<p class="post-desc">'+
                                            response['data'][i].sub_title +
                                        '</p>'+
                                        '<div class="post-thumb-gallery">' +
                                            '<figure class="post-thumb img-popup">' +
                                                '<a href="{{URL("/")}}/singlepost/' + response['data'][i].id + '">'+
                                                    '<img src="{{URL("/")}}/'+ response['data'][i].image +' " alt="'+ response['data'][i].id +'">'+
                                                '</a>'+
                                            '</figure>'+
                                        '</div>' +
                                        '<div class="post-meta">' +
                                            '<button class="post-meta-like">' +
                                                '<img src="'+like_img+'" data-post-id="'+ response['data'][i].id + '" class="chosenHeartIcon" width="24" height="24" />' +
                                                '<p style="float: right; margin-left: 10px;" id="count_'+ response['data'][i].id + '">'+ response['data'][i]['like'] + '</p>' +
                                            '</button>'+
                                            '<ul class="comment-share-meta">' +
                                                '<li>'+
                                                    '<a href="{{URL("/")}}/singlepost/' + response['data'][i].id +'"><button class="post-comment">'+
                                                        '<i class="bi bi-chat-bubble"></i>' +
                                                        '<span>'+ response['data'][i]['comments'] + '</span>'+
                                                    '</button>'+
                                                    '</a>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<button class="post-bookmark">'+
                                                        '<img src="'+bookmark_img+'" data-post-id="'+ response['data'][i].id + '" class="chosenBookmarkIcon" width="24" height="24" />'+
                                                    '</button>'+
                                                '</li>'+
                                                '<li>'+
                                                    '<button class="post-share">'+
                                                        '<i class="bi bi-share"></i>'+
                                                    '</button>'+
                                                '</li>'+
                                            '</ul>'+
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
                                var src_active = '{{URL("/")}}/image/icon/heart_active.png';
                                var src_noactive = '{{URL("/")}}/image/icon/heart.png';
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
                                            $(obj).attr('src', '{{URL("/")}}/image/icon/heart_active.png');
                                            $('#count_'+postid).text(count);
                                        }else if(response=='dislike'){
                                            $(obj).attr('src', '{{URL("/")}}/image/icon/heart.png');
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
                                var bookmark_active = '{{URL("/")}}/image/icon/bookmark_active.png';
                                var bookmark_noactive = '{{URL("/")}}/image/icon/bookmark.png';
                                var postid=$(this).attr('data-post-id');
                                
                                $.ajax({
                                    url: "{{URL('/')}}/sebookmark",
                                    type: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        'postid':postid
                                    },
                                    success: function(data){
                                        alert(data);
                                        var response=data[1].split(":")[0];
                                        var count=data[1].split(":")[1];
                                        if(response=='liked'){
                                            $(obj).attr('src', '{{URL("/")}}/image/icon/bookmark_active.png');
                                        }else if(response=='dislike'){
                                            $(obj).attr('src', '{{URL("/")}}/image/icon/bookmark.png');
                                        }
                                    }

                                });
                            @endguest
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

        function getComments(postid){
            $.ajax({
                type:"post",
                url:"{{URL('/')}}/getComments",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'postid':postid
                },
                success: function(data){
                    //console.log(data);

                    var build='<div class="comment-parent">';
                    for(var i=0;i<data.length;i++){
                        if(data[i]['parent_comment_id']==0){
                            build+='<div class="row b-t-1">'+
                                    '<div class="col-1"><img class="avatar" src="{{URL('/')}}/image/'+data[i]['users'][0]['image']+'"></div>'+
                                    '<div class="col-11">'+
                                        '<p class="font-weight-bold mb-0">'+data[i]['users'][0]['name']+'</p>'+
                                        '<p class="mb-0">'+data[i]['comment']+'</p>'+
                                        '<small>'+ timeSince(new Date(data[i]['created_at']))+'</small>'+
                                    '</div>'+
                                '</div>';
                            @guest
                            @else
                                build+='<div class="col-11 offset-1">'+
                                    '<div class="input-group w-100">'+
                                        '<input type="text" class="form-control border-0" id="comment_reply_'+data[i]['id']+'" placeholder="Reply">'+
                                        '<div class="input-group-append">'+
                                            '<button class="btn btn-outline-success" type="button" data-parent="'+data[i]['id']+'" data-relay-to="'+data[i]['post_id']+'">send</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
                            @endguest
                        }else{
                            build+='<div class="child row ml-4">'+
                                        '<div class="col-1"><img class="avatar" src="{{URL('/')}}/image/'+data[i]['users'][0]['image']+'"></div>'+
                                        '<div class="col-11">'+
                                            '<p class="font-weight-bold mb-0">'+data[i]['users'][0]['name']+'</p>'+
                                            '<p class="mb-0">'+data[i]['comment']+'</p>'+
                                            '<small>'+ timeSince(new Date(data[i]['created_at']))+'</small>'+
                                        '</div>'+
                                    '</div>';
                        }

                    }
                    build+='</div>';
                    //console.log(data);
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
     </script>

</body>

</html>
