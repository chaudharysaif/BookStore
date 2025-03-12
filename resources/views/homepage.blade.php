@extends('layouts.base')

@section('content')
    <div>
        <h1 class="text-center mt-2 fw-bold mt-5" style="font-family: Georgia, 'Times New Roman', Times, serif">Best
            Selling Books</h1>

        <p class="text-center m-auto" style="width: 70%">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Fuga sit aperiam error vel sed repellendus sequi nobis voluptates eligendi porro ullam cumque, ex non
            dolorum totam dolorem! Dicta, quam ipsam.
        </p>
    </div>

    <div class="m-auto mt-2 text-center">
        <div class="row m-auto justify-content-center">
            <div class="col m-4 p-0" style="width:250px">
                <img src="/images/book1.jpg" alt="" style="height: 350px; width:250px">
                <div class="card-body p-2">
                    <h6 class="card-title fw-bold">ZERO To ONE</h6>
                    <p class="card-text m-1">₹ 250.00 /-</p>
                    <a href=""> <button class="btn btn-success">Add to cart</button> </a>
                </div>
            </div>

            <div class="col m-4" style="width:250px">
                <img src="/images/book2.jpg" alt="" style="height: 350px; width:250px">
                <div class="card-body p-2">
                    <h6 class="card-title fw-bold">The Book Of Lost Names</h6>
                    <p class="card-text m-1">₹ 175.00 /-</p>
                    <a href=""> <button class="btn btn-success">Add to cart</button> </a>
                </div>
            </div>

            <div class="col m-4" style="width:250px">
                <img src="/images/book3.jpg" alt="" style="height: 350px; width:250px">
                <div class="card-body p-2">
                    <h6 class="card-title fw-bold">RICH DAD POOR DAD</h6>
                    <p class="card-text m-1">₹ 270.00 /-</p>
                    <a href=""> <button class="btn btn-success">Add to cart</button> </a>
                </div>
            </div>

            <div class="col m-4" style="width:250px">
                <img src="/images/book4.jpg" alt="" style="height: 350px; width:250px">
                <div class="card-body p-2">
                    <h6 class="card-title fw-bold">The Name Of The Wind</h6>
                    <p class="card-text m-1">₹ 180.00 /-</p>
                    <a href=""> <button class="btn btn-success">Add to cart</button> </a>
                </div>
            </div>

        </div>
    </div>

    <div class="mt-4 p-3" style="background-color: #f6f6f6">
        <div class="row p-4">
            <div class="col-md-5 text-center m-auto">
                <img src="/images/books8.jpg" alt="" width="70%">
            </div>

            <div class="col-md-7 m-auto" style="font-family:Georgia, 'Times New Roman', Times, serif">
                <div>
                    <h1>THE SECRET GAMES</h1>
                    <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis officiis illum, similique id
                        animi odit maiores, beatae nulla quod molestias sequi maxime? Facere natus architecto nemo at rem
                        amet quidem!</h5>
                    <h5 class="mt-3">₹ 200.00 /-</h5>
                </div>
            </div>

        </div>
        <div class="text-center">
            <div class="mt-2">
                <a href="/bookpage"><button class="btn btn-outline-secondary m-3" style="width: 25%">More Books</button></a>
            </div>
        </div>
    </div>


    <div class="mt-5 p-3 justify-content-end" style="background-color: #dadada">
        <div class="row">

            <div class="col-md-4 text-center m-auto">
                <h1 class="fw-bolder">What Readers Are Saying</h1>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accu santium doloremque lauda ntium
                </p>
            </div>

            <div class="col-md-7">
                <div class="row">

                    <div class="col-lg-3 bg-light m-3" style="border-radius: 10px; width:325px">
                        <img class="rounded-circle p-3" src="/images/reader1.jpg" alt="" height="120" width="120">
                        <h2 class="fw-normal">Mike Sendler</h2>
                        <p>Some representative placeholder content for the three columns of text below the carousel.
                            This is the first column.
                        </p>
                    </div>

                    <div class="col-lg-3 bg-light m-3" style="border-radius: 10px; width:325px">
                        <img class="rounded-circle p-3" src="/images/reader2.jpg" alt="" height="120"
                            width="120">
                        <h2 class="fw-normal">Adam Sotsobe</h2>
                        <p>Some representative placeholder content for the three columns of text below the carousel.
                            This is the first column.
                        </p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-3 bg-light m-3" style="border-radius: 10px; width:325px">
                        <img class="rounded-circle p-3" src="/images/reader3.jpg" alt="" height="120"
                            width="120">
                        <h2 class="fw-normal">Chris Myers</h2>
                        <p>Some representative placeholder content for the three columns of text below the carousel.
                            This is
                            the first column.
                        </p>
                    </div>

                    <div class="col-lg-3 bg-light m-3" style="border-radius: 10px; width:325px">
                        <img class="rounded-circle p-3" src="/images/reader4.jpg" alt="" height="120"
                            width="120">
                        <h2 class="fw-normal">John Titor</h2>
                        <p>Some representative placeholder content for the three columns of text below the carousel.
                            This is
                            the first column.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
