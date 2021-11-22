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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/paginaPrincipal', 'App\Http\Controllers\PaginaPrincipalController@index')->name('paginaPrincipal');
Route::get('/stickerAbierto/{id}', 'App\Http\Controllers\PaginaPrincipalController@stickerAbierto')->name('stickerAbierto');
Route::post('/storeOpinion', 'App\Http\Controllers\PaginaPrincipalController@storeOpinion')->name('storeOpinion');
Route::get('/opiniones/{id}', 'App\Http\Controllers\PaginaPrincipalController@opiniones')->name('opiniones');
Route::get('/perfiles', 'App\Http\Controllers\PaginaPrincipalController@perfiles')->name('perfiles');
Route::get('/elementosGuardados', 'App\Http\Controllers\PaginaPrincipalController@elementosGuardados')->name('elementosGuardados');
Route::get('/editarPerfil', 'App\Http\Controllers\PaginaPrincipalController@editarPerfil')->name('editarPerfil');
Route::get('/anadirSticker', 'App\Http\Controllers\PaginaPrincipalController@anadirSticker')->name('anadirSticker');
Route::post('/storeSticker', 'App\Http\Controllers\PaginaPrincipalController@storeSticker')->name('storeSticker');
Route::get('/configuracion', 'App\Http\Controllers\PaginaPrincipalController@configuracion')->name('configuracion');
Route::get('/busqueda', 'App\Http\Controllers\PaginaPrincipalController@busqueda')->name('busqueda');
Route::get('/administrarCuenta', 'App\Http\Controllers\PaginaPrincipalController@administrarCuenta')->name('administrarCuenta');


