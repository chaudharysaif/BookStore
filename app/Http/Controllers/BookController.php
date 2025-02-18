<?php

namespace App\Http\Controllers;

use App\Mail\loginEmail;
use Illuminate\Support\Facades\DB;
use App\Models\book;
use App\Models\userdetail;
use App\Models\user_book;
use App\Models\book_cart;
use App\Models\contact;
use App\Models\cart;
use App\Models\order_book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\select;

class BookController extends Controller
{

    function login(Request $request)
    {
        $request->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ]);

        if ($user = userdetail::where('email', '=', $request->loginEmail)->first()) {

            if (Hash::check($request->loginPassword, $user->password)) {
                Session::put('id', $user->id);
                return redirect('homepage');
            } else {
                return redirect()->back()->with('password', 'Incorrect Password');
            }
        } else {
            return redirect()->back()->with('email', 'Email is not valid');
        }
    }

    function signup(Request $request)
    {
        // $request->validate([
        //     'firstname' => 'required | min:3',
        //     'lastname' => 'required | min:3',
        //     'email' => 'required | email',
        //     'password' => 'required | min:6 | confirmed',
        //     'cpassword' => 'required | min:6 | same:password'

        // ], [
        //     //     'firstname.required' => 'username cant be empty',
        //     //     'firstname.min' => 'name contain minimum 3 letter',
        //     'email.email' => 'email should be in valid form',

        // ]);

        $to = $request->email;
        $subject = "Account Verification Link";
        $msg = "Hello $request->firstname,
            To ensure the security of your account and enjoy the full benefits of BookStore";

        Mail::to($to)->send(new loginEmail($msg, $subject));

        $user = new userdetail();
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($user) {
            return redirect('loginpage');
        }
    }

    function bookview(Request $request)
    {
        $books = book::with('carts')->where('id', $request->id)->get();
        return view('bookviewpage', ['bookdata' => $books]);
    }

    function bookdata()
    {
        $books = book::with('carts')->get();
        return view('bookpage', ['bookdata' => $books]);

        // For each user with many relation
        // $books = userdetail::find(1);
        // return $books->books;
    }

    function categorydata($category)
    {
        $books = book::with('carts')->where('category', $category)->get();
        return view('categorypage', ['bookdata' => $books]);
    }

    function categoryalldata()
    {
        $books = book::with('carts')->get();
        return view('categorypage', ['bookdata' => $books]);
    }

    function addcartcategory(Request $request)
    {
        Session::get('id');
        $user_id = session('id');
        $addcart = new cart();

        $existCart = Cart::where('user_id', $user_id)
            ->where('book_id', $request->id)
            ->first();

        if ($existCart) {
            $addcart->increment('quantity');
        } else {
            $addcart->book_id = $request->id;
            $addcart->quantity = 1;
            $addcart->user_id = $user_id;
            $addcart->userdetail_id = $user_id;
            $addcart->save();
        }

        // Its ptional storing in book_cart for dummy data
        $addbookcart = new book_cart();
        $addbookcart->book_id = $request->id;
        $addbookcart->quantity = 1;
        $addbookcart->cart_id = $addcart->id;
        $addbookcart->save();

        return redirect()->back()->with("status", true);
    }

    function quantityupdate(Request $request)
    {
        $cartitems = cart::find($request->cart_id);
        $cartitems->quantity = $request->quantity;
        $cartitems->save();

        // Its ptional storing in book_cart for dummy data
        $cartquantity = book_cart::where('cart_id', $request->cart_id)->get();
        foreach ($cartquantity as $cartquantities) {
            $cartquantities->quantity = $request->quantity;
            $cartquantities->save();
        }

        return redirect()->back()->with("status", true);
    }

    function cartitems()
    {
        Session::get('id');
        $user_id = session('id');

        $books = Book::select('books.*', 'carts.*') // Include carts data
            ->join('carts', 'books.id', '=', 'carts.book_id')
            ->where('carts.userdetail_id', $user_id)
            ->get();
        return view('cartpage', ['bookdata' => $books]);
    }

    # Relationship Function
    function dummydata()
    {
        Session::get('id');
        $user_id = session('id');
        # One to one
        // $user = userdetail::with('carts')->where('id',"1")->get();
        // return view('usercart', ['userdata' => $user]);

        // Relationship with Where
        // $user = userdetail::with('carts', 'books', 'order_books')
        //     ->whereHas('order_books', function ($query) {
        //         $query->where('order_no', '108722');
        //     })->get();
        // return $user;

        $books = Book::all();
        $sorted = $books->sortByDesc('id')->values();
        $filtered = $sorted->where('price', ">=", 200);
        $sum = $filtered->sum('price');
        $count = $filtered->count();
        return response()->json([
            "data" => $filtered
        ]);

        // $bookcart = DB::table('order_books')
        //     ->join('userdetails', 'order_books.userdetail_id', '=', 'userdetails.id')
        //     ->join('books', 'order_books.userdetail_id', '=', 'books.id')
        //     ->select(
        //         'userdetails.*',
        //         'books.*',
        //         'order_books.*'
        //     )
        //     ->where('order_no', 112233)
        //     ->get();
        // return response()->json([
        //     "data" => $bookcart
        // ]);

        $bookcart = order_book::select('order_no', 'book_id', 'quantity', 'userdetail_id')->with(['users' => function ($query) {
            $query->select('id', 'first_name', 'email');
        }, 'books' => function ($query2) {
            $query2->select('id', 'name', 'image', 'category');
        }])
            ->whereHas('users', function ($user) {
                $user->where('id', '=', 1);
            })
            ->get();

        return response()->json([
            "data" => $bookcart
        ]);
    }


    function delete(Request $request)
    {
        $cart = cart::find($request->id);
        if ($cart) {
            $cart->delete();
        }

        $bookcart = book_cart::where('cart_id', $request->id);

        if ($bookcart) {
            $bookcart->delete();
        }
        return redirect('/cartpage');
    }

    function checkout(Request $request)
    {
        Session::get('id');
        $user_id = session('id');

        $books = userdetail::with('carts.books')->where('id', $user_id)->first();

        # Getting data with relationship
        // $books = Book::select('books.*', 'carts.*') // Include carts data
        //     ->join('carts', 'books.id', '=', 'carts.book_id')
        //     ->where('carts.userdetail_id', $user_id)
        //     ->get();

        return view('checkoutpage', ['bookdata' => $books]);
    }


    function checkoutdetail(Request $request)
    {
        // Session::get('id');
        // $user_id = session('id');

        // $user = userdetail::find($user_id);
        // $user->email = $request->subject;
        // $user->message = $request->message;
        // $user->save();
        // if ($user) {
        //     return redirect('contactpage');
        // }
        return view('paymentpage', 'paymentpage');
    }

    function orderbook(Request $request)
    {
        Session::get('id');
        $user_id = session('id');

        $order_no = rand(000001, 999999);
        if (order_book::where('order_no', $order_no)) {
            $order_no = rand(000001, 999999);
        }

        $cartdata = cart::where('userdetail_id', $user_id)->get();
        foreach ($cartdata as $orderbook) {

            $order = new order_book();
            $order->userdetail_id = $user_id;
            $order->book_id = $orderbook->book_id;
            $order->quantity = $orderbook->quantity;
            $order->order_no = $order_no;
            $order->order_status = "pending";
            $order->save();
        }

        // Deleting the data from cart
        cart::where('userdetail_id', $user_id)->delete();

        if ($order) {
            return redirect('/homepage');
        }
    }

    function searchbook(Request $request)
    {
        $books = book::where('name', 'like', "%$request->search%")->get();
        return view('bookpage', ['bookdata' => $books, 'search' => $request->search]);
    }

    function searchcategory(Request $request)
    {
        $books = book::where('name', 'like', "%$request->search%")->get();
        return view('categorypage', ['bookdata' => $books, 'search' => $request->search]);
    }

    function contact(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->email = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        if ($contact) {
            return redirect('contactpage');
        }
    }

    function profiledata(Request $request)
    {
        Session::get('id');
        $user_id = session('id');

        // $userdata = DB::select("SELECT * from userdetails where userdetails.id = $user_id");
        $userdata = userdetail::with(['order_books.books'])->find($user_id);

        return view('profilepage', ['user' => $userdata]);
    }

    function profileupdate(Request $request)
    {
        Session::get('id');
        $user_id = session('id');

        $user = userdetail::with(['order_books.books'])->find($user_id);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with("status", true);
    }

    function changepassword(Request $request)
    {
        Session::get('id');
        $user_id = session('id');

        $user = userdetail::with(['order_books.books'])->find($user_id);

        if (Hash::check($request->currentPassword, $user->password)) {

            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect()->back()->with("status", true);
        } else {
            echo "Password Incorrect";
        }
    }

    function logout(Request $request)
    {
        Auth::logout();
        return redirect('/loginpage');
    }
}
