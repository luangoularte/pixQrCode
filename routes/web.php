<?php

use App\Http\Controllers\PixController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PixController::class, 'index']);
