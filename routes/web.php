<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'bookShow']);

Route::get('/login', function(){
    return view('login');
})->middleware('guest')->name("login");
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/about-us', function(){
    return view('about');
});

Route::get('/all-books', [BookController::class, 'show']);
Route::get('/all-books/categories-{name}', [BookController::class, 'showBookByCategory']);
Route::get('/all-books/stock-avaible-only', [BookController::class, 'showBookAvaible']);
Route::get('/all-books/ordered-by-newest', [BookController::class, 'showBookNewest']);
Route::get('/all-books/ordered-by-lowest-price', [BookController::class, 'showBookLowestPrice']);
Route::get('/all-books/ordered-by-top-selling', [BookController::class, 'showBookTopSelling']);
Route::get('/books/{id}', [BookController::class, 'detailAndRecomend']);
Route::get('/search%20books', [BookController::class, 'searchBook']);
Route::get('/all-books/price-search', [BookController::class, 'showBookBasedOnPrice']);

Route::get('/contact-us', function(){
    return view('conttact');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/success', function(){
    return view('successOrder');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/log-out', [LoginController::class, 'logout']);

Route::post('/register/regist',[registerController::class,'Register']);

Route::group(['middleware'=>'auth'], function(){
    Route::resource('cart', CartController::class);
    Route::patch('/empty/{id}', [CartController::class, 'empty']);
    Route::resource('cartDetail', DetailController::class);
    Route::resource('shippingaddress', ShippingAddressController::class);
    Route::resource('shipping', ShippingController::class);
    Route::resource('payment', PaymentController::class);
    Route::post('/order/billing', [TransactionController::class, 'store']);
    Route::get('/checkout', [CartController::class, 'checkout']);
    Route::get('/payment-proof', [UploadController::class, 'upload']);
    Route::post('/upload/process', [UploadController::class. 'process']);

    Route::get('/history', [TransactionController::class, 'history']);
    Route::get('/history/{id}', [TransactionController::class, 'historyDetail']);
});
