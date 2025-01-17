<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        header {

            color: black;
            text-align: center;
            padding: 1em;
            margin-top: 10%;
        }

        header h1 {
            margin: 0;
            font-size: 1.6em;
        }

        header p {
            margin: 5px 0 0;
            font-size: 1.2em;
        }

        main {
            display: flex;
            justify-content: space-around;
            max-width: 1000px;
            margin: 20px auto;
        }

        .payment-option {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(173, 173, 173, 0.1);
            width: 30%;
        }

        h2 {
            color: rgb(18, 99, 213);
            margin-bottom: 10px;
        }

        img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        button {
            background-color: rgb(60, 196, 230);
            color: rgb(12, 9, 9);
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
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
                        <a class="nav-link" href="contactpage">Contact</a>
                    </li>
                </ul>

                <div class="mx-2">
                    <a href="#"><i id="cart" class="bi bi-bag fs-4 text-dark"></i></a>
                </div>

                <div class="mx-2">
                    <a href="/profilepage"><i class="bi bi-person-circle fs-4 text-secondary"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <header>
        <h1>Payment Modes</h1>
        <p>Please choose a payment method:</p>
    </header>

    <main>
        <section class="payment-option" id="creditCard">
            <h2>Credit Card</h2>
            <img src="/images/credit.jpg" alt="Credit Card Icon">
            <p>Securely pay with your credit card.</p>
            <a href="/creditcardpage">
                <button onclick="selectPaymentOption()">Select</button></a>
        </section>

        <section class="payment-option" id="paypal">
            <h2>PayPal</h2>
            <img src="/images/paypal.jpg" alt="PayPal Icon">
            <p>Use your PayPal account for a quick and easy payment.</p>
            <a href="/">
                <button onclick="success()">Select</button></a>
        </section>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function success() {
            Swal.fire({
                title: "Drag me!",
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
</body>


</html>
