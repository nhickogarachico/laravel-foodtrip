<header id="main-header">
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container-fluid">
            <div class="d-flex">
                <a id="brand" class="me-5" href="/">FoodTrip!</a>
                <ul id="secondary-nav" class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">People</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Places</a>
                    </li>
                </ul>
            </div>
            <form id="header-search-form" action="{{ route('search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input id="header-search" class="form-control" name="search" type="search" placeholder="Search"
                        aria-label="Search" autocomplete="off">
                    <button class="btn bg-white" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>

            @if (Auth::check())
                <div>
                    <ul class="navbar-nav align-items-center ms-4">
                        <li class="nav-item dropdown me-1">
                            <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="fas fa-user-friends"></i>
                                <span class="position-absolute top-0 start-100 bg-warning rounded-circle notif-badge">
                                    <span class="visually-hidden">New requests</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <p class="fw-600 dropdown-header">Friend Requests</p>
                                </li>
                                {{-- Friend Requests HERE --}}
                            </ul>
                        </li>
                        <li class="nav-item dropdown ps-2 me-1">
                            <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="fas fa-comment-dots"></i>
                                <span class="position-absolute top-0 start-100  bg-warning rounded-circle notif-badge">
                                    <span class="visually-hidden">New messages</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <div class="dropdown-header d-flex justify-content-between">
                                        <p class="fw-600">Messages</p>
                                        <p class="fs-6">Mark all as Read</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ps-2 me-1">
                            <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="position-absolute top-0 start-100 bg-warning rounded-circle notif-badge">
                                    <span class="visually-hidden">New notifications</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <div class="dropdown-header d-flex justify-content-between">
                                        <p class="fw-600">Notifications</p>
                                        <p class="fs-6">Mark all as Read</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        @isset($user)
                            <li class="nav-item ps-2">
                                <a class="nav-link text-white" href="/{{ $user->username }}">
                                    {{ $user->username }} <img src="{{ $user->avatar }}" alt="sample profile" width="30"
                                        height="30" class="small-avatar ms-2 rounded-circle">
                                </a>
                            </li>
                            <li class="nav-item dropdown ps-2">
                                <a href="#" class="nav-link text-white" id="userSettingsDropdownBtn" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-gear"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end smaller-dropdown-menu"
                                    aria-labelledby="userSettingsDropdownBtn">
                                    <li>
                                        <p class="fw-600 dropdown-header">Account Settings</p>
                                    </li>
                                    <li><a class="dropdown-item dropdown-no-hover link-red-hover" href="#">Account Info</a>
                                    </li>
                                    <li><a class="dropdown-item dropdown-no-hover link-red-hover" href="#">Change
                                            Password</a>
                                    </li>
                                    <li><a class="dropdown-item dropdown-no-hover link-red-hover" href="#">General
                                            Settings</a>
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST" class="mt-2">
                                            @csrf
                                            <button type="submit" class="btn btn-main-red w-100 logout-button">
                                                Log out
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endisset
                    </ul>
                </div>
            @else
                <div>
                    <a href="/login" class="btn btn-light text-main-red link-red-hover me-2">Log in</a>
                    <a href="/register" class="btn btn-light text-main-red link-red-hover">Register</a>
                </div>
            @endif
        </div>
    </nav>
</header>
