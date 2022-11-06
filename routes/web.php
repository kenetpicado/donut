<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ResultController;

/* Redirect To */
Route::get('/', function () {
    return redirect()->route('home');
});

/* To Show Main Views */
Route::controller(MainController::class)->group(function () {
    Route::get('home', 'index')->name('home');
    Route::get('range', 'range')->name('range');
});

/* To Proccess Results */
Route::controller(ResultController::class)->group(function () {
    Route::post('result-grades', 'grades')->name('grades');
    Route::post('result-grades-range', 'grades_range')->name('grades.range');
});

Route::view('/terms', 'main.terms')->name('terms');
