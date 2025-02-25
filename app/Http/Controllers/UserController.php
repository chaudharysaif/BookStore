<?php

namespace App\Http\Controllers;

use App\Models\userdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = userdetail::find(1);
        return $books->books;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Array Practice
    function arrayPractice()
    {
        $arr = [
            'user1' => ['id' => 1, 'name' => 'saif', 'email' => 'saif@gmail.com'],
            'user2' => ['id' => 2, 'name' => 'saad', 'email' => 'saad@gmail.com']
        ];

        $student = Arr::add($arr['user1'], 'age', 22);
        $student = Arr::except($arr, 'user2');
        $student = Arr::only($arr, ['user1', 'user2']);
        $student = Arr::has($arr, 'user1');
        $student = Arr::get($arr, 'user2.email');
        $student = Arr::set($arr, 'user1.age', 22);
        $student = Arr::pluck($arr, 'name');
        $student = Arr::collapse($arr);
        $student = Arr::flatten($arr);
        $student = Arr::shuffle($arr);
        $student = Arr::sort($arr);
        $student = Arr::forget($arr, 'user1');
        $student = Arr::sortRecursive($arr);
        $student = Arr::wrap($arr);
        // $student = Arr::pull($arr , 'user2'); //Pull from og array
        $student = Arr::random($arr);
        $student = Arr::dot($arr);
        // {"data":{"user1.name":"saif","user1.email":"saif@gmail.com","user1.age":22,"user2.name":"saad","user2.email":"saad@gmail.com"}}
        $result = Arr::mapWithKeys($arr, function ($item) {
            return [$item['id'] => $item['name']];
        });

        // Output of Array User
        return response()->json([
            'data' => $student
        ]);


        // New Array with function callback
        $array = [10, 20, 30, 40, 50];

        $result = Arr::random($array);
        $result = Arr::where($array, function ($value) {
            return $value > 25;
        });

        $result = Arr::first($array, function ($value) {
            return $value > 25;
        });

        $result = Arr::last($array, function ($value) {
            return $value > 25;
        });

        $result = Arr::map($array, function ($value) {
            return $value * 5;
        });

        return response()->json([
            'data' => $result
        ]);


        //Divide Array
        $array = ['name' => 'John', 'age' => 25];
        list($keys, $values) = Arr::divide($array);
        print_r($keys); // Output: ['name', 'age']
        print_r($values); // Output: ['John', 25]


        // CrossJoin
        $array1 = [1, 2, 3, 4, 5, 6, 7, 8];
        $array2 = [1, 2, 3, 4, 5, 6, 7, 8];
        $result = Arr::crossJoin($array1, $array2);
        return $result;
    }
}
