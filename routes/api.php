<?php

use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\Api\TestController;
use Illuminate\Support\Facades\Route;

Route::post('v1/grades', GradeController::class)->name('v1.grades');

Route::post('test', TestController::class)->name('test');
