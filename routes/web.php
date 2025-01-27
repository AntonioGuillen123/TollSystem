<?php

use App\Http\Controllers\TollController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/toll', [TollController::class, '__invoke'])->name('listOfTolls');