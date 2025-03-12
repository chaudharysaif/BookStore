<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
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


    <div class="container">
        @if ($user)
            <div class="p-3" style="border-radius:5px; background-color:#f8f8f8">
                <h1 class="text-center" style=" font-family:'Times New Roman', Times, serif ">My Account</h1>

                <h3 class="text-center" style="font-family:serif; text-transform: uppercase;">
                    {{ $user->first_name }} {{ $user->last_name }}</h3>

                <div>
                    <a class="d-grid" href="/logout">
                        <button class="btn btn-success mt-2 m-auto" style="width:100px">Logout</button></a>
                </div>
            </div>
        @endif

        <div class="row mt-5 justify-content-center">
            <div class="col-md-3 p-0" style="background-color: #f9f9f9; border:1px solid rgb(228, 228, 228)">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-family:Sora, sans-serif">
                    <li class="nav-item" id="accountlink" style="background-color:green">
                        <a class="nav-link mx-3 fs-4" id="accountBtn">Account</a>
                    </li>

                    <li class="nav-item" id="passwordlink">
                        <a class="nav-link mx-3 fs-4" id="passBtn">Change Password</a>
                    </li>

                    <li class="nav-item" id="orderlink">
                        <a class="nav-link mx-3 fs-4" id="orderBtn">Orders</a>
                    </li>

                    <li class="nav-item" id="reviewlink">
                        <a class="nav-link mx-3 fs-4" id="reviewBtn">Reviews</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 p-3" style="background-color: #f9f9f9; border:1px solid rgb(228, 228, 228)">
                <div id="account">
                    <form class="mx-1" action="/profileupdate" method="POST">
                        @csrf
                        @if ($user)
                            <div>
                                <label class="mx-2 fs-5" for="">First name</label>
                                <input class="form-control" type="text" name="firstname"
                                    value="{{ $user->first_name }}" style="width: 70%; background-color:#f2f2f2">
                            </div>

                            <div>
                                <label class="mx-2 fs-5 mt-3" for="">Last name</label>
                                <input class="form-control" type="text" name="lastname"
                                    value="{{ $user->last_name }}" style="width: 70%; background-color:#f2f2f2">
                            </div>

                            <div>
                                <label class="mx-2 fs-5 mt-3" for="">Email</label>
                                <input class="form-control" type="text" name="email"
                                    value="{{ $user->email }}" style="width: 70%; background-color:#f2f2f2">
                            </div>

                            <button class="btn btn-success mt-5 p-2" style="width: 30%">Update Profile</button>
                        @endif
                    </form>
                </div>


                <div id="password">
                    <form class="mx-1" action="/changepassword" method="POST">
                        @csrf
                        <div>
                            <label class="mx-2 fs-5" for="">Current Password</label>
                            <input class="form-control" type="text" name="currentPassword" value=""
                                style="width: 70%; background-color:#f2f2f2">
                        </div>

                        <div>
                            <label class="mx-2 fs-5 mt-3" for="">New Password</label>
                            <input class="form-control" type="text" name="newPassword" value=""
                                style="width: 70%; background-color:#f2f2f2">
                        </div>

                        <div>
                            <label class="mx-2 fs-5 mt-3" for="">Confirm Password</label>
                            <input class="form-control" type="text" name="cPassword" value=""
                                style="width: 70%; background-color:#f2f2f2">
                        </div>

                        <button class="btn btn-success mt-5 p-2" style="width: 30%">Change Password</button>
                    </form>
                </div>

                <div id="order">
                    @if ($user)
                        @php
                            $groupedOrders = $user->order_books->groupBy('order_no');
                            $i = 1;
                        @endphp

                        <div class="container">
                            <div class="row">
                                @foreach ($groupedOrders as $orderNo => $orders)
                                    <div class="col-md-4 mb-4 p-0">
                                        {{-- <a href="/admin/viewdetail/{{ $orderNo }}" style="text-decoration: none"> --}}
                                        <div class="card" style="border: 1px solid #dadada; width:90%">
                                            <div class="card-header text-center fw-semibold"
                                                style="border: 1px solid #dadada">
                                                @php echo "[".$i."]" @endphp Order Number: {{ $orderNo }}
                                            </div>

                                            @php
                                                $statuses = $orders->groupBy('order_status');
                                            @endphp

                                            @foreach ($statuses as $status => $statusOrders)
                                                <div class="card-body text-center p-1">
                                                    @switch($status)
                                                        @case('pending')
                                                            <span
                                                                class="badge bg-danger text-white">{{ ucfirst($status) }}</span>
                                                        @break

                                                        @case('processing')
                                                            <span
                                                                class="badge bg-primary text-white">{{ ucfirst($status) }}</span>
                                                        @break

                                                        @case('completed')
                                                            <span
                                                                class="badge bg-success text-white">{{ ucfirst($status) }}</span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-secondary text-white">Unknown
                                                                Status</span>
                                                    @endswitch
                                                </div>
                                            @endforeach

                                            @php $i++ @endphp
                                        </div>
                                        {{-- </a> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div id="review">
                    <h4>Review will be update soon...!</h4>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-3 bg-secondary text-dark mt-auto">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <h5 class="nav-item m-0 pt-2">BookStore</h5>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Books</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Category</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-dark">Contact</a></li>
        </ul>
        <p class="text-center m-0">Copyright© 2024 Bookstore, Developed and Designed by Chaudhary Saif</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#account').show();
            $('#password').hide();
            $('#order').hide();
            $('#review').hide();

            $('#accountBtn').click(function() {
                $('#accountlink').css('background-color', 'green');
                $('#passwordlink').css('background-color', '#f9f9f9');
                $('#orderlink').css('background-color', '#f9f9f9');
                $('#reviewlink').css('background-color', '#f9f9f9');

                $('#account').show();
                $('#password').hide();
                $('#order').hide();
                $('#review').hide();
            });

            $('#passBtn').click(function() {
                $('#passwordlink').css('background-color', 'green');
                $('#accountlink').css('background-color', '#f9f9f9');
                $('#orderlink').css('background-color', '#f9f9f9');
                $('#reviewlink').css('background-color', '#f9f9f9');

                $('#account').hide();
                $('#password').show();
                $('#order').hide();
                $('#review').hide();
            });

            $('#orderBtn').click(function() {
                $('#orderlink').css('background-color', 'green');
                $('#passwordlink').css('background-color', '#f9f9f9');
                $('#accountlink').css('background-color', '#f9f9f9');
                $('#reviewlink').css('background-color', '#f9f9f9');

                $('#account').hide();
                $('#password').hide();
                $('#order').show();
                $('#review').hide();
            });

            $('#reviewBtn').click(function() {
                $('#orderlink').css('background-color', '#f9f9f9');
                $('#passwordlink').css('background-color', '#f9f9f9');
                $('#accountlink').css('background-color', '#f9f9f9');
                $('#reviewlink').css('background-color', 'green');

                $('#account').hide();
                $('#password').hide();
                $('#order').hide();
                $('#review').show();
            });
        });
    </script>
</body>

</html>
