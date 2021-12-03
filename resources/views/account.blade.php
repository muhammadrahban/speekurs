@extends('layouts.app')

@section('title' )

@section('content')
    <form action="{{ route("setaccount") }}" method="post">
        @csrf
    </form>

                <div class="col-lg-6 order-1 order-lg-2" id="card_record">
                    <!-- share box start -->
                    <!-- share box end -->
                    <!-- post status start -->
                    {{-- <div class="card">
                        <!-- post title start -->
                        <div class="post-title d-flex align-items-center">

                            <div class="posted-author">
                                <h6 class="author"><a href="profile.html">merry watson</a></h6>
                            </div>
                        </div>
                        <!-- post title start -->
                        <div class="post-content">
                            <p class="post-desc">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                in their infancy.
                            </p>
                            <div class="post-thumb-gallery">
                                <figure class="post-thumb img-popup">
                                    <a href="{{ asset('assets/front/images/post/post-large-1.jpg')}}">
                                        <img src="{{ asset('assets/front/images/post/post-1.jpg')}}" alt="post image">
                                    </a>
                                </figure>
                            </div>
                            <div class="post-meta">
                                <button class="post-meta-like">
                                    <i class="bi bi-heart-beat"></i>
                                    <span>You and 201 people like this</span>
                                    <strong>201</strong>
                                </button>
                                <ul class="comment-share-meta">
                                    <li>
                                        <a href="{{ Auth::user() ? '12' : '/' }}"><button class="post-comment">
                                            <i class="bi bi-chat-bubble"></i>
                                            <span>41</span>
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
                        </div>
                    </div> --}}
                    <!-- post status end -->


                </div>



@endsection
