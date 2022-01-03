<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">FoodTrip</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Add Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Chat</a>
                    </li>
                </ul>
                <form class="d-flex" action="{{route('search')}}" method="GET">
                    @csrf
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                @isset($user)
                    <div class="me-2">
                        <a href="/{{ $user->username }}">Welcome {{ $user->username }}!</a>
                    </div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                @endisset

                @if (!Auth::check())
                    <a href="/login" class="btn btn-primary me-2">Log in</a>
                    <a href="/register" class="btn btn-primary">Register</a>
                @endif
            </div>
        </div>
    </nav>
</header>
