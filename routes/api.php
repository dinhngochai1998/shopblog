<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Tag\TagController;
use App\Http\Controllers\Api\User\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('category', CategoryController::class);
Route::delete('/update/{id}', 'App\Http\Controllers\Api\Category\CategoryController@updateCate')->name('category.delete');
Route::delete('/delete/{id}', 'App\Http\Controllers\Api\Category\CategoryController@delete')->name('category.delete');
Route::resource('product', ProductController::class);

Route::resource('tag', TagController::class);
Route::resource('user', UserController::class);
Route::Post('/user/update/{id}', 'App\Http\Controllers\Api\User\UserController@updateUser')->name('update');
