<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-restaurant-page.css') }}">
    @stack('styles')
</head>

<body>
    <div id="app">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto my-5">
                        <div class="text-center">
                            <a href="/" class="fw-900 text-main-red text-decoration-none fs-3">FoodTrip</a>
                            <h1 class="mb-3">Create Restaurant Page</h1>
                        </div>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-3 justify-content-center">
                                <li class="breadcrumb-item"><a href="#" class="active text-decoration-none">Basic
                                        Information</a></li>
                                <li class="breadcrumb-item" aria-current="page">Restaurant Outlets</li>
                                <li class="breadcrumb-item" aria-current="page">Additional Information</li>
                                <li class="breadcrumb-item" aria-current="page">Finish</li>
                            </ol>
                        </nav>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    @stack('scripts')
</body>

</html>
