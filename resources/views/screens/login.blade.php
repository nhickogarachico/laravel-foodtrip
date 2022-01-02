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
</head>

<body>

    <main class="form-signin text-center">
        <form class="mb-3" action="/login" method="POST">

            <h1 class="h3 mb-3 fw-normal">Log in</h1>
            @if ($errors->has('credentials'))
                @foreach ($errors->get('credentials') as $message)
                    <p class="text-danger">{{ $message }}</p>
                @endforeach
            @endif
            @csrf
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="email" autofocus name="email">
                <label for="floatingInput">Email address</label>
                @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password"
                    name="password">
                <label for="floatingPassword">Password</label>
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                    @endforeach
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
        </form>
        <p>Don't have an account? <a href="/register">Register here</a></p>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
