<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-image: url("pay.jpg");
            background-repeat: no-repeat;
            background-size: cover;

            width: 100%;
            height: 100vh;
        }

        .input {

            position: relative;
        }

        .input i {

            position: absolute;
            top: 11px;
            left: 11px;
            color: #989898;
        }

        .input input {

            text-indent: 25px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-0">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#"><img src="{{ asset('storage/bookstorelogo.jpg') }}" height="65" width="150"></a>
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
                        <a class="nav-link" href="bookpage">Books</a>
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

                <div class="me-3">
                    <a href="/cartpage"><i class="bi bi-bag fs-4 text-dark"></i></a>
                </div>
    
                <div class="me-3">
                    <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-dark"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 align="center" style="margin-top: 5%">Credit Payment</h1>
        <div class="card m-auto mt-4 p-2" style="width: 30rem">

            <div class="card-body">

                <div class="card-body payment-card-body">

                    <span class="font-weight-normal card-text">Card Number</span><br>
                    <div class="input">

                        <i class="fa fa-credit-card"></i>
                        <input type="text" class="form-control" placeholder="0000 0000 0000 0000" required>

                    </div>

                    <div class="row mt-3 mb-3">

                        <div class="">

                            <span class="font-weight-normal card-text">Expiry Date</span>
                            <div class="input">

                                <i class="fa fa-calendar"></i>
                                <input type="text" class="form-control" placeholder="MM/YY" required>

                            </div> <br>

                            <span class="font-weight-normal card-text">CVC/CVV</span>
                            <div class="input">

                                <i class="fa fa-lock"></i>
                                <input type="text" class="form-control" placeholder="000" required>

                            </div> <br>

                            <span class="font-weight-normal card-text">Total</span>
                            <div class="input">

                                <input type="text" class="form-control" value="" required>

                            </div>
                        </div>


                    </div>

                    <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured
                        with ssl
                        certificate</span>

                </div>

                <div class="text-center">
                    <a href="/orderbook" onclick="myfunc()" class="btn btn-primary px-5">Pay</a>
                </div>
            </div>
        </div>
    </div>
    <script text="javascript/text">
        function myfunc() {
            Swal.fire({
                title: "Payment Successfull!",
                text: "Thankyou , Your Order Confirm Successfully",
                icon: "primary"
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
