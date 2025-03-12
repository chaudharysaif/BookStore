<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
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


    <div class="container p-2 mt-3" style="background-color:#f8f8f8">
        <div class="container text-center mt-1">
            <h1 class="fw-semibold" style="font-family:Georgia, 'Times New Roman', Times, serif">CHECKOUT</h1>
            <hr style="border:2px solid black">
        </div>

        {{-- <form class="container p-2" action="/paymentpage" method="GET">
            @csrf --}}
        <div class="container row justify-content-between">
            <div class="col-md-7">

                <div class="container mt-3">
                    <h4 style="font-family:Georgia, 'Times New Roman', Times, serif">Billing Details</h4>
                    <hr>
                </div>

                @if ($bookdata)
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="label">First Name:</label><br>
                                <input class="form-control" required name="checkoutfirstname" type="text"
                                    value="{{ $bookdata->first_name }}" id="labelname">
                            </div>

                            <div class="col-md-6">
                                <label for="label">Last Name:</label><br>
                                <input class="form-control" required name="checkoutlastname" type="text"
                                    value="{{ $bookdata->last_name }}" id="labelname">
                            </div>
                        </div>
                    </div>

                    <div class="container mt-3">
                        <label for="label">Email:</label><br>
                        <input class="form-control" value="{{ $bookdata->email }}" required name="email"
                            type="email" id="labelname">
                    </div>

                    <div class="container mt-3">
                        <label for="label">Address:</label><br>
                        <input class="form-control" required name="address" type="text" id="labelname">
                        <input class="form-control mt-2" required name="address" type="text" id="labelname">
                    </div>

                    <div class="container mt-3">
                        <label for="label">City:</label><br> <input class="form-control" required name="city"
                            type="text" id="labelname">
                    </div>

                    <div class="container mt-3">
                        <label for="label">Zip Code:</label><br>
                        <input class="form-control" required name="zipcode" type="tel" id="labelname">
                    </div>

                    <div class="container mt-4">
                        <label for="label">Phone Number:</label> <input class="form-control" required
                            name="phone_no" type="tel" id="labelname">
                    </div>
                @endif
            </div>

            <div class="col-md-4 p-3" style="border: 1px solid #c9c9c9">
                <h2 class="m-3 fw-semibold text-center" style="font-family:Georgia">Your Order</h2>
                <div class="container">
                    @php $totalPrice = "0" @endphp
                    <table class="table text-center" style="font-size: medium">
                        <thead class="table">
                            <tr>
                                <th>Items</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        @foreach ($bookdata->carts as $cart)
                            @foreach ($cart->books as $book)
                                <tbody>
                                    <tr>
                                        <td class="text-start">
                                            <h6 class="mt-1 mb-0" style="font-family:Georgia"> {{ $book->name }}
                                                x {{ $cart->quantity }} </h6>
                                        </td>
                                        <td>₹ {{ $cart->quantity * $book->price }}</td>
                                        @php $totalPrice = $totalPrice + ( $cart->quantity *  $book->price ) @endphp
                                    </tr>
                                </tbody>
                            @endforeach
                        @endforeach
                    </table>

                    <table class="table text-center mt-5" style="font-size:large">
                        <tbody class="table">
                            <tr>
                                <td>Total</td>
                                <td>₹ {{ $totalPrice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container mt-3">
                    <a href="/paymentpage"><button class="container btn btn-outline-success"
                            style="border-radius: 5px; height:50px">Proceed to pay</button></a>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>

    <footer class="py-3 my-4 mt-5 bg-secondary">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
{{-- <script>
    function totalprice(totalPrice) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            console.log('Total Price Sent:', totalPrice); // Debug log
            url: '/creditcardpage',
            method: "POST",
            data: {
                price: totalPrice
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
</script> --}}

</html>
