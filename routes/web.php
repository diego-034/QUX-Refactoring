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

// Route::get('/facturas', function () {
//     return view('crudBill');
// });

Route::get('/configuracion', function () {
    return view('configUser');
});

Route::get('/carrito-compras', function () {
    return view('shoppingCar');
});

Route::get('/gestionarProductos', function () {
    return view('crudProduct');
});

Route::get('/crearProductos', function () {
    return view('addProduct');
});

Route::get('/crearFactura', function () {
    return view('addBill');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'ProductsController@index');
Route::post('/productos', 'ProductsController@store');
Route::get('/productos/{id}', 'ProductsController@show');
Route::delete('/productos/{id}', 'ProductsController@destroy');
Route::post('/productos/actualizar/{id}', 'ProductsController@update');
Route::get('/facturas', 'InvoicesController@index');

