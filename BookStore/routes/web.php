<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

#Dashboard
// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

#Dashboard
Route::get('admin/dashboard', [AdminController::class, 'useralldata']);

#View Details
Route::get('admin/vieworder/{id}', [AdminController::class, 'userorder']);
Route::get('admin/viewdetail/{order_no}', [AdminController::class, 'orderdetail']);
Route::post('admin/updatestatus', [AdminController::class, 'updatestatus']);

# Admin Category
Route::view('admin/category', 'admin/category');

#Add Book
Route::view('admin/addbook', 'admin/addbook');
Route::post('admin/addbook', [AdminController::class, 'addbook']);

#View Book
Route::get('admin/viewbook', [AdminController::class, 'viewbook']);

#Edit
Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/updatebook', [AdminController::class, 'updatebook']);

#Delete
Route::get('admin/delete/{id}', [AdminController::class, 'delete']);

#Middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

#Loginpage
Route::view('loginpage', 'loginpage');
Route::post('loginpage', [BookController::class, 'login']);

#Signuppage
Route::view('signuppage', 'signuppage');
Route::post('signuppage', [BookController::class, 'signup']);

#Homepage
Route::view('homepage', 'homepage');

#Blogpage
Route::view('blogpage', 'blogpage');

#Bookview
Route::get('bookviewpage/{id}',  [BookController::class, 'bookview']);

#Bookpage
Route::get('bookpage', [BookController::class, 'bookdata']);
Route::post('bookpage', [BookController::class, 'addcartcategory']);
Route::get('searchbook', [BookController::class, 'searchbook']);

#Categorypage
Route::get('categorypage', [BookController::class, 'categoryalldata']);
Route::get('categorypage/{category}', [BookController::class, 'categorydata']);
Route::post('categorypage', [BookController::class, 'addcartcategory']);
Route::get('searchcategory', [BookController::class, 'searchcategory']);

#Cartpage
Route::get('dummydata', [BookController::class, 'dummydata']);
Route::get('cartpage', [BookController::class, 'cartitems']);
Route::post('cartpage', [BookController::class, 'quantityupdate']);

#Delete
Route::get('delete/{id}', [BookController::class, 'delete']);

#Checkoutpage
Route::post('checkoutpage', [BookController::class, 'checkout']);

# Paymentpage
// Route::get('paymentpage', [BookController::class, 'checkoutdetail']);
Route::view('paymentpage', 'paymentpage');

#CreditcardPage
Route::view('creditcardpage', 'creditcardpage');

# Orderbook
Route::get('orderbook', [BookController::class, 'orderbook']);

#Contactpage
Route::view('contactpage', 'contactpage');

#Profilepage
Route::get('profilepage', [BookController::class, 'profiledata']);
Route::post('profileupdate', [BookController::class, 'profileupdate']);
Route::post('changepassword', [BookController::class, 'changepassword']);

#Fetching Book data from resource with many to many
Route::resource('user', UserController::class);

#Logout
Route::get('logout', [BookController::class, 'logout']);
