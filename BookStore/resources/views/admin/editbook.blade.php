@extends('layouts.admin')

@section('title', 'Edit Book')

@section('content')

    <div class="text-center mt-4">
        <span class="fs-2 p-2" style="border-radius: 5px; background-color:#eaeaea">Update Your Books</span>
    </div>

    <div class="container d-grid mt-4 p-3" style="border: 1px solid #dadada; width:40%">
        @if ($bookdata)
        <form action="/admin/updatebook/{{$bookdata->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="">Book Image:</label>
            <input class="form-control" type="file" name="image" value="{{ $bookdata->image }}" required>
            <br>

            <label for="">Book Name:</label>
            <input class="form-control" type="text" name="name" value="{{ $bookdata->name }}" placeholder="name" required>
            <br>

            <label for="">Price:</label>
            <input class="form-control" type="text" name="price" value="{{ $bookdata->price }}" placeholder="price" required>
            <br>

            <label for="">Category:</label>
            <input class="form-control" type="text" name="category" value="{{ $bookdata->category }}" placeholder="category" required>
            <br>

            <button class="btn btn-success m-auto"> Update Book</button>
        </form>
        @endif
    </div>

@endsection
