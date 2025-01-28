<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TollController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, '__invoke'])->name('home');

Route::get('/toll/{id}', [TollController::class, '__invoke'])->name('showToll');