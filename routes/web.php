<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes (Cleaned)
|--------------------------------------------------------------------------
*/

// 🔹 Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Public routes only (no login, no admin)
Route::get('/categories', [CategoryController::class, 'list'])->name('categories.list');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
