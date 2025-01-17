@extends('layouts.admin')

@section('title', 'View Book')

@section('content')

    <div class="text-center mt-4">
        <h1 class="fs-2 p-1 fw-semibold" style="border-radius: 5px;background-color:#eaeaea">ALL BOOKS</h1>
    </div>

    <div class="container mt-3 mb-3 p-3" style="background-color: #f6f6f6">
        <div class="row row-cols-md-5 m-auto justify-content-stretch">

            @foreach ($bookdata as $books)
                <div class="col p-2 text-center" style="flex-grow: 1">
                    <img src="{{ asset('storage/' . $books->image) }}" style="height: 70%; width:70%">
                    <div class="card-body p-2">
                        <h6 class="card-title fw-bold">{{ $books->name }}</h6>
                        <div>
                            <p class="card-text m-1">₹ {{ number_format($books->price, 2) }}</p>
                        </div></a>

                        <div class="justify-content-between">
                            <a href="{{ 'edit/' . $books->id }}"><button class="btn btn-primary">Edit</button></a>
                            <a href="{{ 'delete/' . $books->id }}"><button class="btn btn-danger">Delete</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
