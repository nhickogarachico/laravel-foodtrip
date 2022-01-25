<header id="mobile-header">
    <div class="d-flex">
        <nav class="navbar">
            <div>

                @if (Auth::check())
                    <a href="#profileSideMenu" role="button" data-bs-toggle="offcanvas" role="button"
                        aria-expanded="false">
                        <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar"
                            class="small-avatar ms-2 rounded-circle">
                    </a>

                    <!-- Off canvas side menu -->
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="profileSideMenu"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <div>
                                <a href="/{{ $user->username }}" class="text-decoration-none">
                                    <img src="{{ $user->avatar }}" alt="sample profile"
                                        class="small-avatar ms-2 rounded-circle">
                                </a>
                                <p class="ms-2 d-inline"><a href="#"
                                        class="text-decoration-none">{{ $user->username }}</a></p>
                            </div>

                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>

                        </div>
                        <div class="offcanvas-body">
                            <div class="mb-3">
                                <p>Explore</p>
                                <ul class="sidemenu-content">
                                    <li><a href="#" class="text-decoration-none">People</a></li>
                                    <li><a href="#" class="text-decoration-none">Food</a></li>
                                    <li><a href="#" class="text-decoration-none">Places</a></li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <p>Profile</p>
                                <ul class="sidemenu-content">
                                    <li><a href="#" class="text-decoration-none">Friend Requests</a></li>
                                    <li><a href="#" class="text-decoration-none">Messages</a></li>
                                    <li><a href="#" class="text-decoration-none">Notifications</a></li>
                                </ul>
                            </div>
                            <div>
                                <p>Account Settings</p>
                                <ul class="sidemenu-content">
                                    <li><a href="#" class="text-decoration-none">Account Info</a></li>
                                    <li><a href="#" class="text-decoration-none">Change Password</a></li>
                                    <li><a href="#" class="text-decoration-none">General Settings</a></li>
                                </ul>
                            </div>
                        </div>
                        <form action="/logout" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-main-red w-100 logout-button">
                                Log out
                            </button>
                        </form>
                    </div>
                @else
                    <a id="brand" href="#">FoodTrip!</a>
                @endif
            </div>
        </nav>
        <form class="flex-fill position-relative" action="{{ route('search') }}" method="GET">
            @csrf
            <input id="mobile-search" type="search" name="search" placeholder="Search" aria-label="Search"
                autocomplete="off">
            <button id="header-search-button" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <nav class="navbar fixed-bottom justify-content-center">
        <ul class="navbar-nav flex-row">
            <li class="navbar-item me-5">
                <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-user-friends"></i>
                    <span class="position-absolute top-0 start-100 bg-warning rounded-circle notif-badge">
                        <span class="visually-hidden">New requests</span>
                    </span>
                </a>
            </li>
            <li class="navbar-item me-5">
                <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-comment-dots"></i>
                    <span class="position-absolute top-0 start-100 bg-warning rounded-circle notif-badge">
                        <span class="visually-hidden">New messages</span>
                    </span>
                </a>
            </li>
            <li class="navbar-item me-5">
                <a class="nav-link text-white position-relative" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="position-absolute top-0 start-100 bg-warning rounded-circle notif-badge">
                        <span class="visually-hidden">New notifications</span>
                    </span>
                </a>
            </li>
            <li class="navbar-item">
                <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fas fa-gear"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>
