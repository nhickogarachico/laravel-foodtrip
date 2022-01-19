<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
                <form id="landing-form" class="text-center bg-white rounded shadow p-5" action="/register" method="POST">
                    @csrf
                    <div class="mb-5">
                        <h1 class="fw-900 text-main-red">FoodTrip!</h1>
                        <p>Social media for Filipino food and travel enthusiasts</p>
                    </div>
                    <h3 class="mb-3">Create your Account</h3>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="floatingFirstName" type="text" placeholder="first name" name="firstName" value="{{old('firstName')}}" autofocus>
                        <label for="floatingFirstName">First Name</label>
                        @if ($errors->has('firstName'))
                            @foreach ($errors->get('firstName') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="floatingLastName" type="text" name="lastName" value="{{old('lastName')}}" placeholder="last name">
                        <label for="floatingLastName">Last Name</label>
                        @if ($errors->has('lastName'))
                            @foreach ($errors->get('lastName') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="floatingUsername" type="text" name="username" value="{{old('username')}}" placeholder="username">
                        <label for="floatingUsername">Username</label>
                        @if ($errors->has('username'))
                            @foreach ($errors->get('username') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="floatingEmail" type="email" name="email" value="{{old('email')}}" placeholder="email">
                        <label for="floatingEmail">Email</label>
                        @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" id="floatingPassword" name="password" value="{{old('password')}}" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        @if ($errors->has('password'))
                            @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                    </div>
                    <button class="btn btn-main-red w-100 mb-3">Register</button>
                    <div>
                        <p>Already have an account? <a href="/login" class="text-decoration-none">Login here.</a></p>
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
