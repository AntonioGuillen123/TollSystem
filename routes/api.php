<?php

use App\Http\Controllers\Api\TollController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tollTicket/{id}', [TollController::class, '__invoke'])->name('createTollTicket');