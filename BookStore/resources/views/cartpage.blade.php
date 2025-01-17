<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
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

    <div class="container">
        <div class="container text-center mt-3">
            <h1 class="fw-semibold" style="font-family:Georgia, 'Times New Roman', Times, serif">CART</h1>
            <hr>
        </div>

        <form class="d-grid" action="/checkoutpage" method="POST">
            @csrf
            @php $totalPrice = "0" @endphp

            <table class="table" style="border: 1px solid #dadada">
                <thead class="table-secondary">
                    <tr class="text-center mx-5">
                        <th>CART ITEMS</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUBTOTAL</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="bookData">
                    @foreach ($bookdata as $books)
                        <tr class="text-center">

                            <td><img src="{{ asset('storage/' . $books->image) }}" alt="" height="125px"
                                    width="75px"></td>

                            <td class="py-5">{{ $books->name }}</td>

                            <td class="py-5" id="price{{ $books->id }}"> ₹ {{ number_format($books->price, 2) }}
                            </td>

                            <td class="py-5"><input class="text-center quantityVal" id="quantity{{ $books->id }}"
                                    type="number" name="quantity" min="1" max="10"
                                    value="{{ $books->quantity }}" placeholder="1" style="width:60px"
                                    onchange="updateCart({{ $books->price }},this,{{ $books->id }})"></td>

                            <td class="py-5" id="subTotalCart{{ $books->id }}">₹
                                {{ number_format($books->quantity * $books->price, 2) }}
                            </td>

                            <td class="" style="width: 125px; padding-top:35px"><a
                                    href="{{ 'delete/' . $books->id }}"><i
                                        class="fs-2 bi bi-x-circle text-success"></i></a></td>

                            @php $totalPrice = $totalPrice + ( $books->quantity *  $books->price ) @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container text-center mt-5" style="width:45%">
                <table class="container table">
                    <thead class="table-secondary">
                        <tr class="text-center">
                            <th colspan="2">CART TOTAL</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr class="text-center">
                            <td>SUBTOTAL</td>
                            <td id="subTotalPrice">
                                ₹ {{ number_format($totalPrice, 2) }}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td>TOTAL</td>
                            <td id="totalPrice">
                                ₹ {{ number_format($totalPrice, 2) }}
                            </td>
                        </tr>

                    </tbody>
                </table>
                <button class="btn btn-outline-success" style="width: 100%; height:60px">Proceed to
                    Checkout</button>
            </div>
        </form>
    </div>

    {{-- <footer class="py-3 mt-5 bg-secondary">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <h5 class="nav-item m-0 pt-2">BookStore</h5>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Books</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Category</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contact</a></li>
        </ul>
        <p class="text-center">Copyright© 2024 Bookstore, Developed and Designed by Chaudhary Saif</p>
    </footer> --}}

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

<script>
    var totalprice = 0;

    function updateCart(price, obj, id) {

        console.log(price * obj.value, id);
        $("#subTotalCart" + id).html("₹" + price * obj.value + ".00");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/cartpage ',
            method: "POST",
            data: {
                cart_id: id,
                quantity: obj.value
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

</html>
