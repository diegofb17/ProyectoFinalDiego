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

Route::get('/', 'App\Http\Controllers\PaginaPrincipalController@index')->name('paginaPrincipal');
Route::get('/stickerAbierto', 'App\Http\Controllers\PaginaPrincipalController@stickerAbierto')->name('stickerAbierto');
Route::get('/opiniones', 'App\Http\Controllers\PaginaPrincipalController@opiniones')->name('opiniones');
Route::get('/perfiles', 'App\Http\Controllers\PaginaPrincipalController@perfiles')->name('perfiles');
Route::get('/elementosGuardados', 'App\Http\Controllers\PaginaPrincipalController@elementosGuardados')->name('elementosGuardados');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
