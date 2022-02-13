<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb mb-3 justify-content-center">
        <li class="breadcrumb-item"><a href="/register/restaurant/step/1" class="active text-decoration-none">Basic
                Information</a></li>
        <li class="breadcrumb-item" aria-current="page">
            @if (Request::path() === 'register/restaurant/step/2')
                <a href="/register/restaurant/step/2" class="active text-decoration-none">Restaurant Outlets</a>
            @else
                Restaurant Outlets
            @endif

        </li>
        <li class="breadcrumb-item" aria-current="page">Additional Information</li>
        <li class="breadcrumb-item" aria-current="page">Finish</li>
    </ol>
</nav>
