<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Tag\TagController;
use App\Http\Controllers\Backend\User\UserController;
Route::group(['middleware' => ['permission:publish articles|edit articles|delete articles|unpublish articles']], function () {

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Dashboard\DashboardController@index')->name('show');
    });
    Route::resource('categories', CategoryController::class);
    Route::get('/delete/{id}', 'App\Http\Controllers\Backend\Category\CategoryController@delete')->name('category.delete');
    Route::resource('product', ProductController::class);
    Route::resource('tag', TagController::class);
    Route::resource('user', UserController::class);

    Route::prefix('logout')->name('logout.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Auth\LogOutController@logout')->name('logout');
    });
});

Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Auth\LoginController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
});
