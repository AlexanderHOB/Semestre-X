<?php

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
Route::group(['middleware' => ['guest']], function () {
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login','Auth\LoginController@login')->name('login');
});
Route::group(['middleware' => ['auth']], function () {

    Route::post('/logout','Auth\LoginController@logout')->name('logout');

    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');
    Route::group(['middleware' => ['Almacenero']], function () {
         //Categorias
            Route::get('/categoria', 'CategoriaController@index');
            Route::post('/categoria/registrar', 'CategoriaController@store');
            Route::put('/categoria/actualizar', 'CategoriaController@update');
            Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
            Route::put('/categoria/activar', 'CategoriaController@activar');
            Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');
        //Articulos
            Route::get('/articulo', 'ArticuloController@index');
            Route::post('/articulo/registrar', 'ArticuloController@store');
            Route::put('/articulo/actualizar', 'ArticuloController@update');
            Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
            Route::put('/articulo/activar', 'ArticuloController@activar');
            Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
            Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
            Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        //Proveedor
            Route::get('/proveedor', 'ProveedorController@index');
            Route::post('/proveedor/registrar', 'ProveedorController@store');
            Route::put('/proveedor/actualizar', 'ProveedorController@update');
            Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');
        //Ingreso
            Route::get('/ingreso', 'IngresoController@index');
            Route::post('/ingreso/registrar', 'IngresoController@store');
            Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
            Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        });
    Route::group(['middleware' => ['Vendedor']], function () {
        //Persona
            Route::get('/cliente', 'ClienteController@index');
            Route::post('/cliente/registrar', 'ClienteController@store');
            Route::put('/cliente/actualizar', 'ClienteController@update');
            Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');
        //Ventas
            Route::get('/venta', 'VentaController@index');
            Route::post('/venta/registrar', 'VentaController@store');
            Route::put('/venta/desactivar', 'VentaController@desactivar');
            Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
            Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');

            Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
            Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');

   });
    Route::group(['middleware' => ['Administrador']], function () {
    //Persona
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');
    //roles
        Route::get('/rol', 'RoleController@index');
        Route::get('/rol/selectRol', 'RoleController@selectRol');
    //usuarios
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::put('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');
        //Categorias
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');
    //Articulos
        Route::get('/articulo', 'ArticuloController@index');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::put('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
    //Proveedor
        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');
    //Ingreso
        Route::get('/ingreso', 'IngresoController@index');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
    //Ventas
        Route::get('/venta', 'VentaController@index');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
});
    
    
    
});






Route::get('/home', 'HomeController@index')->name('home');
