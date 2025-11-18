<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::get('simple-route', function () {
    return 'This is a simple route Example of onlinecode.com';
});



// Main pages

Route::view('/', 'home')->name('home');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::view('/account', 'account')->name('account');
Route::view('/settings', 'settings')->name('settings');

// Auth and order pages
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registervalidate', [UserController::class, 'registervalidate'])->name('registervalidate');
Route::post('/loginvalidate', [UserController::class, 'loginValidate'])->name('loginvalidate');

Route::resource('orders', OrderController::class);


Route::view('/add_order', 'add_order')->name('add_order');
Route::view('/edit_order', 'edit_order')->name('edit_order');
//Route::get('/orders_delete/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');