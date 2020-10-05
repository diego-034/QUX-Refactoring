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



// Route::get('/facturas', function () {
//     return view('crudBill');
// });

Route::get('/perfil', ['middleware' => 'auth', function()
{
    return view('configUser');}]);

Route::get('/crearProductos', ['middleware' => 'auth', function()
{
    return view('addProduct');
}]);
// Route::get('profile', ['middleware' => 'auth', function()
// {
//     // Solo los usuarios autenticados pueden entrar...
// }]);
//

Route::get('/carrito-compras', function () {
    return view('shoppingCar');
});

Route::get('/crearFactura', ['middleware' => 'auth', function()
{
    return view('addBill');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'ProductsController@index');
Route::post('/productos', 'ProductsController@store');
Route::get('/productos/{id}', 'ProductsController@show');
Route::delete('/productos/{id}', 'ProductsController@destroy');
Route::post('/productos/actualizar/{id}', 'ProductsController@update');
Route::get('/facturas', 'InvoicesController@index');

