<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\book;
use App\Models\book_cart;
use App\Models\userdetail;
use App\Models\user_book;
use App\Models\contact;
use App\Models\cart;
use App\Models\image;
use App\Models\order_book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    function useralldata()
    {
        $userdata = userdetail::all();
        return view('admin/dashboard', ['users' => $userdata]);
    }

    function userorder(Request $request)
    {
        $userdata = userdetail::with(['order_books.books'])->find($request->id);
        // return $userorder;
        return view('admin/vieworder', ['user' => $userdata]);
    }

    function orderdetail(Request $request)
    {
        // $userdata = userdetail::with(['order_books.books'])
        //     ->whereHas('order_books', function ($query) use ($request) {
        //         $query->where('order_no', $request->order_no);
        //     })->first();
        // return $userorder;
        // return view('admin/viewdetail', ['user' => $userdata]);

        $userdata = DB::table('order_books')
            ->join('userdetails', 'order_books.userdetail_id', '=', 'userdetails.id')
            ->join('books', 'order_books.book_id', '=', 'books.id')
            ->select(
                'userdetails.id as user_id',
                'userdetails.first_name as first_name',
                'userdetails.last_name as last_name',
                'userdetails.email as user_email',
                'order_books.order_no',
                'order_books.quantity',
                'order_books.order_status as status',
                'books.id as book_id',
                'books.name as book_name',
                'books.price'
            )
            ->where('order_books.order_no', $request->order_no)->get();

        return view('admin/viewdetail', ['user' => $userdata]);
    }

    function addbook(Request $request)
    {
        $imagename = $request->image->getClientOriginalName();
        $path = $request->file('image')->storeAs('public', $imagename);
        $image_name_array = explode("/", $path);
        $image_name = $image_name_array[1];

        $bookdata = new book();
        $bookdata->image = $image_name;
        $bookdata->name = $request->name;
        $bookdata->price = $request->price;
        $bookdata->category = $request->category;
        $bookdata->save();

        return redirect()->back()->with("status", true);
    }

    function viewbook()
    {
        $books = book::with('carts')->get();
        return view('admin/viewbook', ['bookdata' => $books]);
    }

    function delete(Request $request)
    {
        // $deleted = DB::select("DELETE FROM carts WHERE id = $id");
        // $book = book::find($request->id);
        // if ($book) {
        //     $book->delete();
        // }

        return redirect('admin/viewbook');
    }

    function edit(Request $request)
    {
        $book = book::find($request->id);
        return view('admin/editbook', ['bookdata' => $book]);
    }

    function updatebook(Request $request)
    {
        $book = book::find($request->id);

        $imagename = $request->image->getClientOriginalName();
        $path = $request->file('image')->storeAs('public', $imagename);
        $image_name_array = explode("/", $path);
        $image_name = $image_name_array[1];

        $book->image = $image_name;
        $book->name = $request->name;
        $book->price = $request->price;
        $book->category = $request->category;
        $book->save();
        return redirect('admin/viewbook');
    }

    function updatestatus(Request $request)
    {
        // $status = order_book::where('order_no', $request->order_no)->update(['order_status' => $request->status]);
        // $status->save();
        // return redirect()->back()->with("status", true);

        $order = order_book::where('order_no', $request->order_no)->update(['order_status' => $request->status]);

        return redirect()->back()->with("status", true);
    }
}
