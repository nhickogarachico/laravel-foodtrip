@extends('layouts.main')

@section('title', $user->first_name . ' ' . $user->last_name . ' | Profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="cover-photo" class="card position-relative">
                    <img class="card-img-top" src="{{ $user->cover }}" alt="{{ $user->username }} cover photo">
                    <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar"
                        class="rounded-circle profile-avatar border border-5 border-white">
                    <div class="card-body">
                        <div id="cover-info">
                            <div>
                                <div class="d-flex align-items-center mb-1 profile-header-info">
                                    <p class="card-title fs-4 m-0 me-2">{{ $user->first_name }} {{ $user->last_name }}
                                    </p>
                                    @if (!is_null($user->address))
                                        <div class="d-flex align-items-center">
                                            <i class=" fas fa-map-marker-alt me-1 text-main-red "></i>
                                            <p>{{ $user->address }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="profile-buttons">
                                    <button class="btn btn-main-red ">Add Friend</button>
                                    <button class="btn btn-main-red ">Send Message</button>
                                </div>

                            </div>
                            <div class="socials">
                                <p class="fw-600 ">SOCIALS</p>
                                <div>
                                    @if (!is_null($user->fb_id))
                                        <a href="facebook.com/{{ $user->fb_id }}"><i
                                                class="fab fa-facebook-square fs-3 me-2 text-fb-color "></i></a>
                                    @endif
                                    @if (!is_null($user->twitter_id))
                                        <a href="twitter.com/{{ $user->twitter_id }}"><i
                                                class="fab fa-twitter-square fs-3 me-2 text-twitter-color "></i></a>
                                    @endif
                                    @if (!is_null($user->ig_id))
                                        <a href="instagram.com/{{ $user->ig_id }} "><i
                                                class="fab fa-instagram-square fs-3 me-2 text-ig-color "></i></a>
                                    @endif
                                    @if (!is_null($user->yt_id))
                                        <a href="youtube.com/{{ $user->yt_id }}"><i
                                                class="fab fa-youtube-square fs-3 me-2 text-yt-color "></i></a>
                                    @endif
                                    @if (is_null($user->fb_id) && is_null($user->twitter_id) && is_null($user->ig_id) && is_null($user->yt_id))
                                        <p class="fst-italic">No socials</p>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex ">
                                <div class="text-center me-3 ">
                                    <p class="fw-600 fs-4 ">{{ $user->friends->count() }}</p>
                                    <p class="text-main-red ">FRIENDS</p>
                                </div>
                                <div class="text-center me-3 ">
                                    <p class="fw-600 fs-4 ">{{ $user->posts->count() }}</p>
                                    <p class="text-main-red ">POSTS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="card mt-3 ">
                    <div id="profile-nav " class="card-body p-0">
                        <ul class="nav justify-content-center ">
                            <li class="nav-item py-3 bottom-border-main-red">
                                <a href="./profile-timeline.html "
                                    class="nav-link text-main-red link-red-hover ">Timeline</a>
                            </li>
                            <li class="nav-item py-3">
                                <a href="./profile-about.html " class="nav-link text-main-red link-red-hover ">About</a>
                            </li>
                            <li class="nav-item py-3  ">
                                <a href="./profile-friends-list.html "
                                    class="nav-link text-main-red link-red-hover ">Friends</a>
                            </li>
                            <li class="nav-item py-3 ">
                                <a href="# " class="nav-link text-main-red link-red-hover ">Photos</a>
                            </li>
                            <li class="nav-item py-3 ">
                                <a href="# " class="nav-link text-main-red link-red-hover ">Videos</a>
                            </li>
                            <li class="nav-item py-3 ">
                                <a href="# " class="nav-link text-main-red link-red-hover ">Trips</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
        </div>

        {{-- Posts --}}
        <div class="row mt-3 ">
            <div class="col first-col ">
                <div class="card py-3 mb-3 ">
                    <div class="card-body ">
                        <div class="card-title d-flex justify-content-between ">
                            <p class="fs-5 fw-600 mb-1 ">About me</p>
                            <a href="# "><i class="fas fa-ellipsis-h "></i></a>
                        </div>
                        <div class="mb-3 ">
                            <p class="card-text ">{{ $user->bio }}</p>
                        </div>
                        <div class="d-flex mb-2 ">
                            <p class="info-col fw-600 ">Joined</p>
                            <p>{{ $user->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="d-flex mb-2 ">
                            <p class="info-col fw-600 ">Address</p>
                            <p>{{ $user->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="card py-3 mb-3 ">
                    <div class="card-body ">
                        <div class="card-title d-flex justify-content-between mb-3 ">
                            <div>
                                <p class="fs-5 fw-600 mb-3 d-inline ">Friends</p>
                                <p class="fs-6 fw-600 text-main-red d-inline ">{{ $user->friends->count() }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">

                                <div class=" d-flex align-items-center ">
                                    <img src="./images/assets/profile-pic-4.jpg " alt class="small-avatar rounded-circle ">
                                    <div class="ms-2 ">
                                        <p class="fw-600 info-text ">Nick Fury</p>
                                        <p class="info-text ">2 friends in common</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Add Friend</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">

                                <div class=" d-flex align-items-center ">
                                    <img src="./images/assets/profile-pic-5.png " alt class="small-avatar rounded-circle ">
                                    <div class="ms-2 ">
                                        <p class="fw-600 info-text ">Happy Hogan</p>
                                        <p class="info-text ">3 friends in common</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Add Friend</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">

                                <div class=" d-flex align-items-center ">
                                    <img src="./images/assets/profile-pic-6.jpg " alt class="small-avatar rounded-circle ">
                                    <div class="ms-2 ">
                                        <p class="fw-600 info-text ">Pepper Potts</p>
                                        <p class="info-text ">5 friends in common</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Add Friend</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">

                                <div class=" d-flex align-items-center ">
                                    <img src="./images/assets/profile-pic-7.jpg " alt class="small-avatar rounded-circle ">
                                    <div class="ms-2 ">
                                        <p class="fw-600 info-text ">Natasha Romanoff</p>
                                        <p class="info-text ">2 friends in common</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Add Friend</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">

                                <div class=" d-flex align-items-center ">
                                    <img src="./images/assets/profile-pic-8.jpeg " alt class="small-avatar rounded-circle ">
                                    <div class="ms-2 ">
                                        <p class="fw-600 info-text ">Clint Barton</p>
                                        <p class="info-text ">2 friends in common</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Add Friend</button>
                                </div>
                            </div>

                            <div class="mt-4 ">
                                <button class="btn btn-main-red p-1 info-text w-100 ">See all Friends</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- For responsive -->
                <div class="profile-timeline-responsive ">
                    <div class="card py-3 mb-3 ">
                        <div class="card-body ">
                            <div class="card-title d-flex justify-content-between ">
                                <p class="fs-5 fw-600 mb-1 ">Favorite Restaurants</p>
                                <a href="# "><i class="fas fa-ellipsis-h "></i></a>
                            </div>
                            <div>
                                <div class="d-flex mt-2 align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center ">
                                        <img src="./images/assets/resto-logo-1.png " alt
                                            class="small-avatar rounded-circle ">
                                        <div class="mx-1 ">
                                            <a href="# " class="fw-600 info-text text-decoration-none ">The Red Cafe</a>
                                            <p class="info-text ">Visited <span class="fw-600 text-main-red ">5</span>
                                                times</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                    </div>
                                </div>
                                <div class="d-flex mt-2 align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center ">
                                        <img src="./images/assets/resto-logo-2.png " alt
                                            class="small-avatar rounded-circle ">
                                        <div class="mx-1 ">
                                            <a href="# " class="fw-600 info-text text-decoration-none ">Spicy Duck</a>
                                            <p class="info-text ">Visited <span class="fw-600 text-main-red ">2</span>
                                                times</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                    </div>
                                </div>
                                <div class="d-flex mt-2 align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center ">
                                        <img src="./images/assets/resto-logo-3.png " alt
                                            class="small-avatar rounded-circle ">
                                        <div class="mx-1 ">
                                            <a href="# " class="fw-600 info-text text-decoration-none ">Beijing on
                                                Grove</a>
                                            <p class="info-text ">Visited <span class="fw-600 text-main-red ">2</span>
                                                times</p>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                    </div>
                                </div>
                                <button class="btn btn-main-red p-1 info-text w-100 mt-3 ">Explore more
                                    Restaurants</button>
                            </div>
                        </div>
                    </div>


                    <div class="card py-3 ">
                        <div class="card-body ">
                            <div class="card-title d-flex justify-content-between ">
                                <p class="fs-5 fw-600 mb-1 ">Favorite Places</p>
                                <a href="# "><i class="fas fa-ellipsis-h "></i></a>
                            </div>
                            <div class="d-flex mb-2 justify-content-between ">
                                <p class="info-col fw-600 ">Pampanga</p>
                                <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                            </div>
                            <div class="d-flex mb-2 justify-content-between ">
                                <p class="info-col fw-600 ">Manila</p>
                                <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <p class="info-col fw-600 ">Cebu</p>
                                <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                            </div>
                            <button class="btn btn-main-red p-1 info-text w-100 mt-3 ">Explore more Places</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts -->
            <div class="col-lg-8 col-xl-6 ">
                @foreach ($posts as $post)
                    <x-post-component :post="$post" />
                @endforeach
            </div>

            <div class="col third-col-profile-responsive ">
                <div class="card py-3 mb-3 ">
                    <div class="card-body ">
                        <div class="card-title d-flex justify-content-between ">
                            <p class="fs-5 fw-600 mb-1 ">Favorite Restaurants</p>
                            <a href="# "><i class="fas fa-ellipsis-h "></i></a>
                        </div>
                        <div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">
                                <div class="d-flex align-items-center ">
                                    <img src="./images/assets/resto-logo-1.png " alt class="small-avatar rounded-circle ">
                                    <div class="mx-1 ">
                                        <a href="# " class="fw-600 info-text text-decoration-none ">The Red Cafe</a>
                                        <p class="info-text ">Visited <span class="fw-600 text-main-red ">5</span>
                                            times</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">
                                <div class="d-flex align-items-center ">
                                    <img src="./images/assets/resto-logo-2.png " alt class="small-avatar rounded-circle ">
                                    <div class="mx-1 ">
                                        <a href="# " class="fw-600 info-text text-decoration-none ">Spicy Duck</a>
                                        <p class="info-text ">Visited <span class="fw-600 text-main-red ">2</span>
                                            times</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                </div>
                            </div>
                            <div class="d-flex mt-2 align-items-center justify-content-between ">
                                <div class="d-flex align-items-center ">
                                    <img src="./images/assets/resto-logo-3.png " alt class="small-avatar rounded-circle ">
                                    <div class="mx-1 ">
                                        <a href="# " class="fw-600 info-text text-decoration-none ">Beijing on Grove</a>
                                        <p class="info-text ">Visited <span class="fw-600 text-main-red ">2</span>
                                            times</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-main-red p-1 info-text ">Like Page</button>
                                </div>
                            </div>
                            <button class="btn btn-main-red p-1 info-text w-100 mt-3 ">Explore more Restaurants</button>
                        </div>
                    </div>
                </div>

                <div class="card py-3 ">
                    <div class="card-body ">
                        <div class="card-title d-flex justify-content-between ">
                            <p class="fs-5 fw-600 mb-1 ">Favorite Places</p>
                            <a href="# "><i class="fas fa-ellipsis-h "></i></a>
                        </div>
                        <div class="d-flex mb-2 justify-content-between ">
                            <p class="info-col fw-600 ">Pampanga</p>
                            <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                        </div>
                        <div class="d-flex mb-2 justify-content-between ">
                            <p class="info-col fw-600 ">Manila</p>
                            <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <p class="info-col fw-600 ">Cebu</p>
                            <button class="btn btn-main-red p-1 info-text ">See Restaurants</button>
                        </div>
                        <button class="btn btn-main-red p-1 info-text w-100 mt-3 ">Explore more Places</button>
                    </div>
                </div>
            </div>

        </div>
        {{-- Original code --}}
        <div class="row py-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar" width="100" height="100">
                        <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <p>&commat;{{ $user->username }}</p>
                        <p>{{ $user->birthday }}</p>
                        <p>{{ $user->bio }}</p>
                        <p>joined {{ $user->created_at->diffForHumans() }}</p>

                        @if (Auth::check() && Auth::user()->username == $user->username)
                            <a href="/{{ $user->username }}/edit" class="btn btn-primary">Edit Profile</a>
                        @endif

                        @if (Auth::check() && Auth::user()->username != $user->username)
                            <x-add-friend-button :user-second="$user" />
                        @endif
                        <div>
                            <a href="/{{ $user->username }}/friend-requests">Friend Requests</a>
                        </div>
                        <div>
                            <a href="/{{ $user->username }}/friends">Friends</a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-9">
                @if (Auth::check() && Auth::user()->username == $user->username)
                    <div class="mb-3">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="/posts" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea name="content" rows="3" class="form-control mb-2"
                                placeholder="Add new post"></textarea>
                            @if ($errors->has('content'))
                                @foreach ($errors->get('content') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            @endif
                            <p>Attach image</p>
                            <input class="form-control" type="file" id="postImage" accept="image/*" name="postImage"
                                onChange="readURL(this)">
                            <img id="img" src="#" alt="test" width="150" height="150">
                            <div>
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>

                    </div>
                @endif
                <h5 class="mb-3">Posts</h5>
                <div>
                    @foreach ($posts as $post)
                        <x-post-component :post="$post" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
