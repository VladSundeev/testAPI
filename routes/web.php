<?php

use App\Http\Controllers\Api\GoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//API
Route::get('/goods', [GoodController::class, 'index']);
Route::get('/goods/{id}', [GoodController::class, 'show']);
