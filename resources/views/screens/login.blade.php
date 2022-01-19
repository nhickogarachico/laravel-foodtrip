<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>

    <main>
        <div class="row">
            <div id="left" class="col-lg-6">
                <div class="left-landing"></div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <form id="landing-form" class="text-center bg-white rounded shadow p-5" action="/login" method="POST">
                    <div class="mb-5">
                        <h1 class="fw-900 text-main-red">FoodTrip!</h1>
                        <p>Social media for Filipino food and travel enthusiasts</p>
                    </div>
                    <h3 class="mb-3">Log In</h3>
                    @if ($errors->has('credentials'))
                        @foreach ($errors->get('credentials') as $message)
                            <p class="text-danger">{{ $message }}</p>
                        @endforeach
                    @endif
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="floatingEmail" name="email" type="email" placeholder="email" value="{{ old('email') }}" autofocus>
                        <label for="floatingEmail">Email</label>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <button class="btn btn-main-red w-100 mb-3">Login</button>
                    <div>
                        <p>Does not have an account? <a href="/register" class="text-decoration-none">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
