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

Route::get('/', function () {
    return view('home');
});

Route::get('/perfil', function () {
    return view('configUser');
});

// Route::get('/productos', function () {
//     return view('products');
// });

Route::get('/ver-producto', function () {
    return view('viewProduct');
});

Route::get('/carrito-compras', function () {
    return view('shoppingCar');
});

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'ProductsController@index');
