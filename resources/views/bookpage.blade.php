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

    <nav class="navbar navbar-expand-lg p-0">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/bookstorelogo.jpg') }}" height="65" width="150"></a>
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorypage">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogpage">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactpage">Contact</a>
                    </li>
                </ul>

                <form action="/searchbook" class="d-flex" role="search" method="GET">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" name="search"
                        value="{{ @$search }}" aria-label="Search" style="height: 30px">

                    <button class="btn btn-outline-secondary p-0 px-2 me-2" type="submit" style="height: 30px">
                        <i class="bi bi-search"></i></button>
                </form>

                <div class="me-3">
                    <a href="/cartpage"><i class="bi bi-bag fs-4 text-dark"></i></a>
                </div>
    
                <div class="me-3">
                    <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-dark"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <h1 class="text-center fw-semibold pt-4 mt-2"
        style="font-family:'Times New Roman', Times, serif ; height:150px; background-color:#eaeaea">“The More You
        Read, <br> the More You Know.”</h1>

    <div class="container mt-4 p-2" style="background-color: #f6f6f6">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        {{-- <div class="row row-cols-md-4 m-auto justify-content-stretch"> --}}

            @foreach ($bookdata as $books)
                <div class="col p-2 text-center">
                    <a href="/bookviewpage/{{ $books->id }}"> <img src="{{ asset('/images/' . $books->image) }}"
                            style="height: 70%; width:80%"></a>
                    <div class="card-body p-2">
                        <h6 class="card-title fw-bold">{{ $books->name }}</h6>
                        <div>
                            <p class="card-text m-1">₹ {{ number_format($books->price, 2) }} /-</p>
                        </div></a>

                        <div class="mt-3">
                            <button class="btn btn-outline-secondary" style="width: 80%"
                                onclick = "bookid( {{ $books->id }} ); success();">Add to
                                cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

<script>
    function bookid(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/bookpage ',
            method: "POST",
            data: {
                id: id
            },
            success: function(data) {
                console.log(data);
            }
        });
    }

    function success() {
        Swal.fire({
            title: "Book Added to Cart!",
            icon: "success",
            draggable: true,
            showConfirmButton: true,
            timer: 1000
        })
    }
</script>

</html>
