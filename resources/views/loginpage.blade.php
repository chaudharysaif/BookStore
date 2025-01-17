<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #input-error {
            border: 1px solid red;
            color: red
        }
    </style>
</head>

<body style="background-image: url(/images/bookhome.jpg); background-size:cover">

    <div class="container p-0"
        style="height: 500px; width: 45%; border-radius: 10px; margin-top: 8%; border:1px solid black; backdrop-filter: blur(5px);">

        <form class="d-grid gap-2 col-lg-8 m-auto" action="loginpage" method="POST">
            @csrf
            <h1 class="text-center mt-4" style="font-weight: 600;">LOGIN</h1>
            <br>

            <div class="mt-1">
                <label for="label">Email:</label>
                <br>
                <input type="text" class="form-control" required placeholder="example@gmail.com" name="loginEmail"
                    aria-describedby="emailHelp" style="width: 100%; background: transparent"
                    id="{{ $errors->first('loginEmail') ? 'input-error' : '' }}">
                <span style="color: blue">
                    @error('loginEmail')
                        {{ $message }}
                    @enderror
                </span>
                @if (session('email'))
                    <div class="alert alert-danger">
                        {{ session('email') }}
                    </div>
                @endif
            </div>
            <div class="mt-4">
                <label for="label">Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" name="loginPassword"
                    style="width: 100%; background: transparent"
                    id="{{ $errors->first('loginPassword') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('loginPassword')
                        {{ $message }}
                    @enderror
                </span>
                @if (session('password'))
                    <div class="alert alert-danger">
                        {{ session('password') }}
                    </div>
                @endif
            </div>
            <div class="mt-1 d-flex justify-content-between">
                <span id="rememberme" style="font-size:small;"><input type="checkbox" name="myEligiblity"
                        unchecked>&nbsp;Remember me</span>
            </div>

            <button type="submit" class="container btn btn-light mt-5"
                style="width: 40%; border-radius: 10px; background: transparent">LOGIN</button>

            <div class="text-center">
                <span>Create an account? <a class="text-light" href="signuppage" style="text-decoration: none">sign
                        up</a></span>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
