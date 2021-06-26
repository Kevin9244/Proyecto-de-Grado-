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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register'=>false]);

Route::resource('producto','ProductoController');
Route::resource('tienda','TiendaController');
Route::resource('distribuidor','DistribuidorController');
Route::resource('factura','FacturaController');
Route::resource('facturaDetalle','FacturaDetalleController');
Route::resource('inventario','InventarioController');
Route::resource('tipoProducto','TipoProductoController');

Route::resource('persona','PersonaController');























Route::resource('tiendas', 'TiendaController');

Route::resource('distribuidors', 'DistribuidorController');

Route::resource('tipoProductos', 'TipoProductoController');

Route::resource('productos', 'ProductoController');

Route::resource('inventarios', 'InventarioController');

Route::resource('facturas', 'FacturaController');

Route::resource('facturaDetalles', 'FacturaDetalleController');