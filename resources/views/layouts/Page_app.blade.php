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


    @yield('content')



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
    <script src="{{ asset('assets/front/js/plugins/nice-select.min.js ')}}"></script>
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
        $(document).ready(function(){
            fetchRecords(1);
            // Search by userid
            // $('#but_search').click(function(){
            //     var userid = Number($('#search').val().trim());
            //     if(userid > 0){
            //         fetchRecords(userid);
            //     }
            // });

            // $('.chosenHeartIcon').click(function(){
            $('#card_record').on('click', '.chosenHeartIcon', function(e) {
                e.preventDefault();
                var src_active = 'image/icon/heart_active.png';
                var src_noactive = 'image/icon/heart.png';
                // console.log(e);
                console.log($(this).attr('alt'));
                if ($(this).attr('src') == src_noactive){
                    $(this).attr('src', src_active);
                } else {
                    // console.log(e.src);
                    $(this).attr('src', src_noactive);
                }
            });
        });

        function fetchRecords(id){
        $.ajax({
            url: 'getpost/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                // console.log(response['data'][1].category_id);
                var len = 0;
                $('#card_record').empty(); // Empty <tbody>

                $('#cat_tab_1').removeClass('active');
                $('#cat_tab_2').removeClass('active');
                $('#cat_tab_3').removeClass('active');
                if(response['data'][1].category_id == 1){
                    $('#cat_tab_1').addClass('active');
                }else if(response['data'][1].category_id == 2){
                    $('#cat_tab_2').addClass('active');
                }else if(response['data'][1].category_id == 3){
                    $('#cat_tab_3').addClass('active');
                }

                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){
                        var tr_str =
                            '<div class="card">'+
                                '<div class="post-title d-flex align-items-center">'+
                                '<div class="posted-author">'+
                                        '<h6 class="author"><a href="./singlepost/' + response['data'][i].id +'">' + response['data'][i].title +'</a></h6>'+
                                    '</div>'+
                                '</div>'+
                            ' <div class="post-content">'+
                                    '<p class="post-desc">'+
                                        response['data'][i].sub_title +
                                    '</p>'+
                                    '<div class="post-thumb-gallery">' +
                                        '<figure class="post-thumb img-popup">' +
                                             '<a href="./singlepost/' + response['data'][i].id + '">'+
                                                '<img src=" '+ response['data'][i].image +' " alt="'+ response['data'][i].id +'">'+
                                            '</a>'+
                                        '</figure>'+
                                    '</div>' +
                                    '<div class="post-meta">' +
                                        '<button class="post-meta-like">' +
                                            '<img src=" image/icon/heart.png" class="chosenHeartIcon" width="24" height="24" />' +
                                            '<p style="float: right; margin-left: 10px;">201</p>' +
                                        '</button>'+
                                        '<ul class="comment-share-meta">' +
                                            '<li>'+
                                                '<a href="{{ Auth::user() ? '12' : '/' }}"><button class="post-comment">'+
                                                    '<i class="bi bi-chat-bubble"></i>' +
                                                    '<span>41</span>'+
                                                '</button>'+
                                                '</a>'+
                                            '</li>'+
                                            '<li>'+
                                                '<button class="post-bookmark">'+
                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">'+
                                                            '<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>'+
                                                            '<path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>'+
                                                    '</svg>'+
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
                }else{
                    var tr_str = "<tr>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                    "</tr>";
                    $("#card_record").append(tr_str);
                }

            }
        });
        }
     </script>

</body>

</html>
