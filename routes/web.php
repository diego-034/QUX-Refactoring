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
Route::post('/', 'ProductsController@email');


/**
 * 
 * Rutas protegidas por sistema de autenticación
 * 1. perfil de usuario (Todos los usuarios registrados).
 * 2. crear producto (Usuario registrado como administrador).
 * 3. crear factura (Usuario registrado como administrador).
 * 
 * retorna las vistas asignadas que coincidan en la carperta views
*/

Route::get('/perfil', ['middleware' => 'auth', function()
{
    return view('configUser');}]);

Route::get('/crearProductos', ['middleware' => 'auth', function()
{
    return view('addProduct');
}]);

Route::get('/crearFactura', ['middleware' => 'auth', function()
{
    return view('addBill');
}]);


Auth::routes();

/**
 * 
 * Rutas con sus respectivos controladores
 * @param {id} => estos son parámetros de ruta.
 * 
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/productos', 'ProductsController@index');
Route::post('/productos', 'ProductsController@store');
Route::get('/productos/{id}', 'ProductsController@show');
Route::delete('/productos/{id}', 'ProductsController@destroy');
Route::post('/productos/actualizar/{id}', 'ProductsController@update');
Route::get('/facturas', 'InvoicesController@index');
Route::get('/perfil/{id}', 'TypesController@show');
Route::get('/facturas/{id}', 'InvoicesController@show');
Route::delete('/facturas/{id}', 'InvoicesController@destroy');
Route::post('/carrito', 'CarDetailsController@store');
Route::get('/carrito-compras', 'CarsController@show');
Route::get('/registrar/carrito', 'InvoicesController@store');

