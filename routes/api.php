<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/books/search', 'Api\\BookController@search');
Route::put('/cart/{user}', 'Api\\BookController@addToCart');
Route::delete('/cart/{cart}', 'Api\\BookController@deleteFromCart');
