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

// ✅ Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// ✅ User dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth routes
require __DIR__.'/auth.php';

// ✅ Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ✅ عرض التصنيفات للعامة (بدون تعديل أو حذف)
Route::get('/categories', [CategoryController::class, 'list'])->name('categories.list');

// ✅ مجموعة admin للوحة التحكم والعمليات المحمية
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // CRUD التصنيفات
    Route::resource('categories', CategoryController::class);

    // CRUD المنتجات
    Route::resource('products', ProductController::class);
    
    Route::get('/categories/{category}/products', [CategoryController::class, 'products'])->name('categories.products');

});
