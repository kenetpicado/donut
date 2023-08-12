<?php

use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'grades');

Route::resource('grades', GradeController::class);
