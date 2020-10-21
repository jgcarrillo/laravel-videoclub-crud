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

Route::get('/', 'HomeController@getHome');

// Rutas accesibles SOLO por usuarios autenticados
Route::group(['middleware' => 'auth'], function(){
    Route::get('catalog','CatalogController@getIndex');
    Route::get('catalog/show/{id}', 'CatalogController@getShow');
    Route::get('catalog/create', 'CatalogController@getCreate');
    Route::get('catalog/edit/{id}', 'CatalogController@getEdit');

    // Formularios
    Route::post('catalog', 'CatalogController@postCreate');

    // Formulario con actualizacion
    Route::put('catalog/edit/{id}', 'CatalogController@putEdit');

    Route::put('catalog/rented/{id}', 'CatalogController@putRented');

    Route::delete('catalog/{id}', 'CatalogController@deleteMovie');
});

// Rutas para AUTH, no hacen falta rutas específicas, se controlan todas desde aquí
Auth::routes();

