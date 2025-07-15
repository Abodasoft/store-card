<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ✅ استدعاء AdminController بالمسار الكامل
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes (محمي بـ Middleware)
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // ✅ لوحة التحكم الرئيسية
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // ✅ التصنيفات
    Route::post('/category/add', [AdminController::class, 'addCategory'])->name('admin.category.add');
    Route::post('/category/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.category.edit');
    Route::get('/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.category.delete');

    // ✅ المنتجات
    Route::post('/product/add', [AdminController::class, 'addProduct'])->name('admin.product.add');
    Route::post('/product/edit/{id}', [AdminController::class, 'editProduct'])->name('admin.product.edit');
    Route::get('/product/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');
});


/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
