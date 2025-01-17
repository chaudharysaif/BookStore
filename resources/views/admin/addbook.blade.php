@extends('layouts.admin')

@section('title', 'Add Book')

@section('content')

    <div class="text-center mt-4">
        <span class="fs-2 p-2" style="border-radius: 5px; background-color:#eaeaea">Add New Books</span>
    </div>

    <div class="container d-grid mt-4 p-3" style="border: 1px solid #dadada; width:90%">
        <form action="/admin/addbook" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Book Image:</label>
            <input class="form-control" type="file" name="image" required>
            <br>

            <label for="">Book Name:</label>
            <input class="form-control" type="text" name="name" placeholder="name" required>
            <br>

            <label for="">Price:</label>
            <input class="form-control" type="text" name="price" placeholder="price" required>
            <br>

            <label for="">Category:</label>
            <input class="form-control" type="text" name="category" placeholder="category" required>
            <br>

            <button class="btn btn-success m-auto"> Add Book</button>
        </form>
    </div>

@endsection
