<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/layout', function () {
    return view('layout');
});

Route::get('/', function () {
    return view('homePage');
})->name('homePage');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/FAQ', function () {
    return view('FAQ');
})->name('FAQ');


Route::get('/notebooks',[App\Http\Controllers\ProductController::class,'notebooks'])
->name('notebooks');

Route::get('/pens',[App\Http\Controllers\ProductController::class,'pens'])
->name('pens');

Route::get('/desk-accessories',[App\Http\Controllers\ProductController::class,'deskAccessories'])
->name('deskAccessories');



Route::group(['middleware' => 'isAdmin'], function () {

    Route::get('/showProduct', [App\Http\Controllers\ProductController::class,'view'])
    ->name('showProduct');
 
    Route::get('/addProduct', function () {
     return view('addProduct');
     })->name('addProduct');;
 
    Route::post('/addProduct/store',[App\Http\Controllers\ProductController::class,'add'])
     ->name('addProduct.store');
    
    Route::delete('/deleteProduct/{id}',[App\Http\Controllers\ProductController::class,'delete'])
     ->name('deleteProduct');
 
     Route::get('/editProduct/{id}',[App\Http\Controllers\ProductController::class,'edit'])
     ->name('editProduct');
 
     Route::post('/updateProduct',[App\Http\Controllers\ProductController::class,'update'])
     ->name('updateProduct');
 
 });


Route::post('/addCart',[App\Http\Controllers\CartController::class,'addcart'])
->name('addCart');

Route::get('/myCart',[App\Http\Controllers\CartController::class,'view'])
->name('myCart');

Route::post('/removeCartItem/{id}', [App\Http\Controllers\CartController::class, 'removeCartItem'])
->name('removeCartItem');



Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])
->name('payment.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
->name('logout');
