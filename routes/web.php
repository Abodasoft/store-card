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

// ==============================
// ✅ PUBLIC ROUTES
// ==============================


// ==============================
// ✅ ADMIN ROUTES (protected)
// ==============================

Route::prefix('admin')->middleware(['auth'])->group(function () {
<<<<<<< HEAD

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

=======
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
>>>>>>> ff48d98db1bc3b5a65a6c45865e6e318a24e267e
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
