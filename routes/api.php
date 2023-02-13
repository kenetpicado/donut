<?php

use App\Http\Controllers\Api\GradeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::post('v1/grades', GradeController::class);

Route::post('test', TestController::class);
