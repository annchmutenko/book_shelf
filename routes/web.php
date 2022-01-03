<?php

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

Route::get('/', 'Front\\HomeController@index')->name('front.home');
Route::get('/about', 'Front\\HomeController@about')->name('front.about');

Route::prefix('categories')->group(function() {
    Route::get('/', 'Front\\CategoryController@categories')->name('front.categories');
    Route::get('/{id}', 'Front\\CategoryController@showCategory')->name('front.categories.show');
});

Route::prefix('genres')->group(function() {
    Route::get('/', 'Front\\CategoryController@genres')->name('front.genres');
    Route::get('/{id}', 'Front\\CategoryController@showGenre')->name('front.genres.show');
});

Route::middleware('auth:web')->group(function() {
    Route::get('/settings', 'Front\\ProfileController@index')->name('front.profile.settings');
    Route::put('/settings', 'Front\\ProfileController@update')->name('front.profile.update');

    Route::get('/cart', 'Front\\ProfileController@cart')->name('front.profile.cart');
    Route::get('/make-order', 'Front\\ProfileController@makeOrder')->name('front.profile.maker-order');
    Route::post('/make-order', 'Front\\ProfileController@createOrder')->name('front.profile.create-order');
    Route::get('/orders', 'Front\\ProfileController@orders')->name('front.profile.orders');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => 'admin_access:admin'
], function() {
    Route::get('/', function() {
        return view('back.home');
    })->name('dashboard');
    Route::resource('orders', 'Back\\OrderController')->only('index', 'edit', 'update', 'destroy');
    Route::resource('users', 'Back\\UserController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('books', 'Back\\BookController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('genres', 'Back\\GenreController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    Route::resource('categories', 'Back\\CategoryController')->only('index', 'store', 'create', 'edit', 'update', 'destroy');
});

Route::get('/books/{slug}', 'Front\\BookController@show')->name('front.books.show');

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('front.profile');
