<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    //CRUD
//listado
    Route::get('/products', 'ProductController@index');
    //formulario
    Route::get('/products/create', 'ProductController@create');
    //registrar 
    Route::post('/products', 'ProductController@store');
    //editar producto
    Route::get('/products/{id}/edit', 'ProductController@edit'); 
    //actualizar producto
    Route::post('/products/{id}/edit', 'ProductController@update'); 
    //ELiminar producto
    Route::post('/products/{id}/delete', 'ProductController@destroy');

    //otra manera
    //Route::delete('/admin/products/{id}', 'ProductController@destroy');
}); 
 
/*
METODOS REPRESENTATIVOS DE POST
PUT
PATCH
DELETE
*/