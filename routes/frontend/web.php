<?php

/**
 * Route frontend
 *
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('home.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Home\HomeController@index')->name('index');
    Route::get('/category', 'App\Http\Controllers\Frontend\Home\HomeController@category')->name('category');
});

Route::prefix('/cart')->name('cart.')->group(function () {
    Route::get('/cart', 'App\Http\Controllers\Frontend\Cart\CartController@index')->name('show');
    Route::post('/', 'App\Http\Controllers\Frontend\Cart\CartController@addCart')->name('add');
    Route::post('/update', 'App\Http\Controllers\Frontend\Cart\CartController@updateCart')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\Frontend\Cart\CartController@delete')->name('delete');
});

Route::prefix('/detail')->name('detail.')->group(function () {
    Route::get('/product/{slug}', 'App\Http\Controllers\Frontend\SingleProduct\SingleProductController@detail')->name('product');
    Route::post('/', 'App\Http\Controllers\Frontend\SingleProduct\SingleProductController@addToCart')->name('add.cart');
});

Route::prefix('/order')->name('order.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Order\OrderController@index')->name('show');
    Route::post('/create', 'App\Http\Controllers\Frontend\Order\OrderController@create')->name('create');
});

Route::prefix('/contact')->name('contact.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Frontend\Contact\ContactController@index')->name('show');
    Route::post('/create', 'App\Http\Controllers\Frontend\Contact\ContactController@create')->name('create');
});


Route::get('redirect/{driver}', 'App\Http\Controllers\Frontend\Customer\CustomerController@redirectToProvider')->name('login.provider');
Route::get('/callback/{provider}', 'App\Http\Controllers\Frontend\Customer\CustomerController@callback');
Route::post('/logout', 'App\Http\Controllers\Frontend\Customer\CustomerController@logout')->name('customer.logout');
