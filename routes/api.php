<?php

use App\Http\Controllers\Api\GradeController;
use Illuminate\Support\Facades\Route;

Route::post('v1/grades', GradeController::class);
