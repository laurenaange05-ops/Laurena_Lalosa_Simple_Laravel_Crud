<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;

Route::resource('visitors', VisitorController::class);
Route::get('/', [VisitorController::class, 'index']);
