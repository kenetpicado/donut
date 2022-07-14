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

//Route::get('consulta', [ConsultaController::class, 'notas'])->name('consulta.notas');
Route::post('consulta', [ConsultaController::class, 'obtener'])->name('consulta.obtener');

Route::view('/', 'index')->name('index');