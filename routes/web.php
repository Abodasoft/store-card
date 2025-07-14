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

<<<<<<< HEAD
// 🔹 Public routes only (no login, no admin)
Route::get('/categories', [CategoryController::class, 'list'])->name('categories.list');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
=======
// 🔹 User dashboard (protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 🔹 Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Auth routes
require __DIR__.'/auth.php';

// 🔹 Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ==============================
// ✅ PUBLIC ROUTES
// ==============================


// ==============================
// ✅ ADMIN ROUTES (protected)
// ==============================

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
>>>>>>> ce845e06f6da104f5a06b6e7dc241c30d3d54c2e
