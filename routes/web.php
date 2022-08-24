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

Route::get('/', [ConsultaController::class, 'inicio']);
Route::get('/rango', [ConsultaController::class, 'inicio_rango']);
Route::view('/terminos', 'terminos');

Route::post('notas', [ConsultaController::class, 'get_notas']);
Route::post('notas-rango', [ConsultaController::class, 'get_notas_rango']);