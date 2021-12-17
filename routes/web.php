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
Route::get('/pagina_principal', 'App\Http\Controllers\PaginaPrincipalController@index')->name('paginaPrincipal');

//Sticker Abierto
Route::get('/sticker_abierto/{id}', 'App\Http\Controllers\StickerAbiertoController@stickerAbierto')->name('stickerAbierto');
Route::get('/anadir_sticker', 'App\Http\Controllers\AnadirStickerController@anadirSticker')->name('anadirSticker');
Route::post('/store_sticker', 'App\Http\Controllers\StoreStickerController@storeSticker')->name('storeSticker');
Route::get('/editar_sticker/{id}', 'App\Http\Controllers\EditarStickerController@editarSticker')->name('editarSticker');
Route::post('/update_sticker', 'App\Http\Controllers\UpdateStickerController@updateSticker')->name('updateSticker');
Route::get('/store_opinion', 'App\Http\Controllers\StickerAbiertoController@stickerAbierto')->name('storeOpinion');
Route::get('/opiniones/{id}', 'App\Http\Controllers\OpinionController@opiniones')->name('opiniones');
Route::get('/anadir_elemento_favorito/{id}','App\Http\Controllers\AddFavoriteElementController@addFavoriteElement')->name('addFavoriteElement');
Route::get('/borrar_elemento_favorito/{id}','App\Http\Controllers\DeleteFavoriteElementController@deleteFavoriteElement')->name('deleteFavoriteElement');
Route::get('/borrar_post/{id}','App\Http\Controllers\DeletePostController@deletePost')->name('deletePost');

//Perfiles
Route::get('/perfiles/{id}', 'App\Http\Controllers\PerfilController@perfiles')->name('perfiles');
Route::get('/seguir_usuario/{id}', 'App\Http\Controllers\SeguirUsuarioController@seguirUsuario')->name('seguirUsuario');
Route::get('/dejar_seguir_usuario/{id}', 'App\Http\Controllers\DejarSeguirUsuarioController@dejarSeguirUsuario')->name('dejarSeguirUsuario');
Route::get('/elementos_guardados', 'App\Http\Controllers\ElementoGuardadoController@elementosGuardados')->name('elementosGuardados');
Route::get('/editar_perfil', 'App\Http\Controllers\EditarPerfilController@editarPerfil')->name('editarPerfil');
Route::post('/update_profile', 'App\Http\Controllers\UpdateProfileController@updateProfile')->name('updateProfile');

//Configuracion
Route::get('/configuracion', 'App\Http\Controllers\ConfiguracionController@configuracion')->name('configuracion');
Route::get('/administrar_cuenta', 'App\Http\Controllers\AdministrarCuentaController@administrarCuenta')->name('administrarCuenta');

//Busqueda
Route::get('/busqueda', 'App\Http\Controllers\BusquedaController@busqueda')->name('busqueda');
Route::post('/mostrarBusqueda', 'App\Http\Controllers\BusquedaController@mostrarBusqueda')->name('mostrarBusqueda');

//Avisos legales
Route::get('/cookies', 'App\Http\Controllers\AvisoLegalController@cookies')->name('cookies');
Route::get('/privacidad', 'App\Http\Controllers\AvisoLegalController@privacidad')->name('privacidad');
Route::get('/terminos', 'App\Http\Controllers\AvisoLegalController@terminos')->name('terminos');
