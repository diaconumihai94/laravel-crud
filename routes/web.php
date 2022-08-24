<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Redirects to the Stock Resource Controller
Route::get('/', function () {
    return redirect('/products');
});

// Route::resource('products', ProductController::class);
Route::get('products', 'ProductController@index');
Route::get('products/create', 'ProductController@create');
Route::get('products/show/{id}', 'ProductController@show');
Route::post('products/store', 'ProductController@store');
Route::get('products/edit/{id}', 'ProductController@edit');
Route::put('products/update/{id}', 'ProductController@update');
Route::delete('products/destroy/{id}', 'ProductController@destroy');
Route::get('products/changeStatus', 'ProductController@changeStatus');

Route::get('auth/login', 'AuthController@index');
Route::post('auth/post-login', 'AuthController@postLogin');
Route::get('auth/registration', 'AuthController@registration');
Route::post('auth/post-registration', 'AuthController@postRegistration');
Route::get('auth/dashboard', 'AuthController@dashboard');
Route::get('auth/logout', 'AuthController@logout');
Route::get('/search', 'SearchController@search')->name('search');

