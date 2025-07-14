<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/', [StoreController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
