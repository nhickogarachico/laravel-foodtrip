<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb mb-3 justify-content-center">
        <li class="breadcrumb-item"><a href="/register/restaurant/step/1" class="active text-decoration-none">Basic
                Information</a></li>
        <li class="breadcrumb-item" aria-current="page">
            @if (session()->has('stepOneData'))
                <a href="/register/restaurant/step/2" class="active text-decoration-none">Restaurant Outlets</a>
            @else
                Restaurant Outlets
            @endif

        </li>
        <li class="breadcrumb-item" aria-current="page">
            @if (session('stepTwoData.restaurantOutlets') && count(session('stepTwoData.restaurantOutlets')) > 0)
                <a href="/register/restaurant/step/3" class="active text-decoration-none">Menu Items</a>
            @else
               Menu Items
            @endif
        </li>
        <li class="breadcrumb-item" aria-current="page">Finish</li>
    </ol>
</nav>
