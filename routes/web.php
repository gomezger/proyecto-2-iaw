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

/* Route::get('/', function () {
    return view('welcome');
});
 */
Auth::routes();

# para cursadas
Route::get('/cursada/{codigo}', 'MateriasController@agregarCursada')->name('agregar-cursada');
Route::get('/cursada/eliminar/{codigo}', 'MateriasController@eliminarCursada')->name('eliminar-cursada');

# para finales
Route::get('/final/{codigo}/{nota}', 'MateriasController@agregarFinal')->name('agregar-final');
Route::get('/final/eliminar/final/{codigo}', 'MateriasController@eliminarFinal')->name('eliminar-final');

# para materias
Route::get('/', 'MateriasController@index')->name('materias');
Route::post('/agregar-materia', 'PanelController@agregarMateria')->name('agregar-materia');
Route::post('/editar-materia/{codigo}', 'PanelController@editarMateria')->name('editar-materia');
Route::get('/materia/eliminar/{codigo}', 'PanelController@deleteMateria')->name('eliminar-materia');

# panel
Route::get('/panel-materias', 'PanelController@materias')->name('panel-materias');


