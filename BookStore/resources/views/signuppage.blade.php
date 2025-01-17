<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
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

<body style="background-image: url(/images/bookhome.jpg); background-size:cover;">

    <div class="container p-4"
        style=" width: 45%; border-radius: 10px; border:1px solid black; margin-top:5%; backdrop-filter:blur(5px);">
        <form class="d-grid gap-2 col-lg-8 m-auto" action="signuppage" method="POST">
            @csrf
            <h1 class="text-center mt-1 mb-0" style="font-weight: 600;">SIGN UP</h1>
            <br>
            <div>
                <label for="label">First name:</label>
                <br>
                <input type="text" class="form-control" required placeholder="first name" name="firstname"
                    style="width: 100%; background: transparent"
                    id="{{ $errors->first('firstname') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('firstname')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mt-3">
                <label for="label">Last name:</label>
                <br>
                <input type="text" class="form-control" required placeholder="last name" name="lastname"
                    style="width: 100%; background: transparent" id="{{ $errors->first('lastname') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('lastname')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mt-3">
                <label for="label">Email:</label>
                <br>
                <input type="email" class="form-control" required placeholder="example@gmail.com"
                    aria-describedby="emailHelp" name="email" style="width: 100%; background: transparent"
                    id="{{ $errors->first('email') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class=" mt-3">
                <label for="label">Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" name="password"
                    style="width: 100%; background: transparent" id="{{ $errors->first('password') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class=" mt-3">
                <label for="label">Confirm Password:</label>
                <br>
                <input type="password" class="form-control" required placeholder="password" name="cpassword"
                    style="width: 100%;background: transparent" id="{{ $errors->first('cpassword') ? 'input-error' : '' }}">
                <span style="color: red">
                    @error('cpassword')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="container btn btn-light mt-4"
                style="width: 40%; border-radius: 10px ;background: transparent">SIGNUP</button>

            <div class="text-center">
                <span>Already have an account? <a class="text-light" href="loginpage"
                        style="text-decoration:none">login</a></span>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
