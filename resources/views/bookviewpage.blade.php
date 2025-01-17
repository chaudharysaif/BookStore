<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BookStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/books">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categorypage">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogpage">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactpage">Contact</a>
                    </li>
                </ul>

                <div class="mx-2">
                    <a href="/cartpage"><i class="bi bi-bag fs-4 text-dark"></i></a>
                </div>

                <div class="mx-2">
                    <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-dark"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <h1 class="container text-center fw-semibold pt-3 m-auto"
        style="font-family:'Times New Roman', Times, serif ; height:90px; background-color:#eaeaea">Your Book</h1>

    <div class="container mt-4 p-3" style="background-color: #f6f6f6">
        @foreach ($bookdata as $books)
            <div class="row p-2">

                <div class="col-md-6 text-center m-auto">
                    <img src="{{ asset('storage/' . $books->image) }}" width="60%">
                </div>

                <div class="col-md-6 m-auto">
                    <div class="card-body p-2">
                        <h4 class="card-title fw-bold m-3">Name: {{ $books->name }}</h4>
                        <h4 class="card-title m-3">Author:</h4>
                        <h4 class="card-text m-3">Price: ₹ {{ $books->price }}</h4>

                        <div class="mt-2">
                            <button class="btn btn-outline-secondary m-3" style="width: 50%"
                                onclick = "bookid( {{ $books->id }} )">Add to
                                cart</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <footer class="py-3 mt-5 bg-secondary">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <h5 class="nav-item m-0 pt-2">BookStore</h5>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body active">Books</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Category</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact</a></li>
        </ul>
        <p class="text-center">Copyright© 2024 Bookstore, Developed and Designed by Chaudhary Saif</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

<script>
    function bookid(id) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/bookpage',
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
            }
        });

        alert("Your items added in cart");
    }
</script>

</html>
