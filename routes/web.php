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

Route::get('/','InicioController@index');
Route::resource('equipos','EquiposController');
Route::resource('jugadores','JugadoresController');

/*
Route::get('equipos', function () {
    return  view('equipos.index');
});

Route::get('equipos/create', function () {
    return  view('equipos.create');
});

Route::get('equipos/{id}/show', function ($id) {
    return  view('equipos.show')->with('id',$id);
});

Route::get('equipos/{id}/edit', function ($id) {
    return  view('equipos.edit')->with('id',$id);
});

// rutas para jugadores



Route::get('jugadores', function () {
    return  view('jugadores.index');
});

Route::get('jugadores/create', function () {
    return  view('jugadores.create');
});

Route::get('jugadores/{id}/show', function () {
    return  view('jugadores.show');
});

Route::get('jugadores/{id}/edit', function () {
    return  view('jugadores.edit');
});
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
