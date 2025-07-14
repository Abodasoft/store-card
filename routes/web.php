<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// 🔹 User dashboard (protected)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

// 🔹 عرض منتجات تصنيف معين (public)
// ✅ أبقي فقط عرض منتجات التصنيف للمستخدمين
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');


// ==============================
// ✅ ADMIN ROUTES ONLY
// ==============================

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 🔹 إدارة التصنيفات (admin only)
    Route::resource('categories', CategoryController::class);

    // 🔹 إدارة المنتجات (admin only)
    Route::resource('products', ProductController::class);
});
