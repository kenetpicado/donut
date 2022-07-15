<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

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

Route::post('consulta', [ConsultaController::class, 'obtener'])->name('consulta.obtener');
Route::post('rango', [ConsultaController::class, 'rango'])->name('consulta.rango');

Route::view('terminos-y-condiciones', 'terminos')->name('terminos');
Route::view('/', 'index')->name('index');
Route::view('rango', 'rango')->name('rango');