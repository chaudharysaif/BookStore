<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
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
                        <a class="nav-link" aria-current="page" href="homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bookpage">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorypage">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogpage">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Contact</a>
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

    <div class="" style="height:250px; border-radius:5px; background-color:#eaeaea">
        <h1 class="text-center pt-5" style="font-size:4vw; font-family:'Times New Roman', Times, serif ">Contact With Us
        </h1>

        <div class="container mt-5">

            <div class="card mb-3 m-auto" style="max-width: 100%;height: 501px;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="images/bookcarousel2.jpg" class="img-fluid rounded-start" alt="..."
                            style="height: 500px;width: 625px;">
                    </div>

                    <div class="col-md-6">
                        <div class="card-body p-0">

                            <form action="contactpage" method="POST">
                                @csrf
                                <div class="container mt-3">
                                    <label for="label">Name:</label>
                                    <br>
                                    <input type="text" class="form-control" required placeholder="name"
                                        name="name" style="width: 100%;">
                                </div>

                                <div class="container mt-3">
                                    <label for="label">Email:</label>
                                    <br>
                                    <input type="email" class="form-control" required placeholder="example@gmail.com"
                                        aria-describedby="emailHelp" id="email" name="email" style="width: 100%;">
                                </div>

                                <div class="container mt-3">
                                    <label for="label">Subject:</label>
                                    <br>
                                    <input type="text" class="form-control" required placeholder="subject"
                                        name="subject" style="width: 100%;">
                                </div>

                                <div class="container mt-3">
                                    <label for="label">Message:</label><br>
                                    <textarea class="form-control" required name="message" type="text" id="labelname"
                                        style="width: 100%; height: 150px;"></textarea>
                                </div>
                                <button class="btn btn-success mt-4 mx-3">submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 550px"></div>

    <footer class="py-3 mt-5 bg-secondary">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <h5 class="nav-item m-0 pt-2">BookStore</h5>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Books</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Category</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body active">Contact</a></li>
        </ul>
        <p class="text-center">Copyright© 2024 Bookstore, Developed and Designed by Chaudhary Saif</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
