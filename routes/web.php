<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'verified', 'active'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/pos/dashboard', function () {
        return view('pos.dashboard');
    })->middleware('role:cashier')->name('pos.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/admin/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])
    ->middleware(['auth', 'verified', 'active', 'role:admin'])->name('admin.users.index');

Route::get('/admin/users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])
    ->middleware(['auth', 'verified', 'active', 'role:admin'])->name('admin.users.create');

Route::post('/admin/users', [\App\Http\Controllers\Admin\UserController::class, 'store'])
    ->middleware(['auth', 'verified', 'active', 'role:admin'])->name('admin.users.store');

Route::patch('/admin/users/{user}/toggle-active', [\App\Http\Controllers\Admin\UserController::class, 'toggleActive'])
    ->middleware(['auth', 'verified', 'active', 'role:admin'])->name('admin.users.toggle-active');

Route::middleware(['auth', 'verified', 'active', 'role:admin'])->group(function () {

    Route::get('/admin/products', [ProductController::class, 'index'])
        ->name('admin.products.index');

    Route::get('/admin/products/create', [ProductController::class, 'create'])
        ->name('admin.products.create');

    Route::post('/admin/products', [ProductController::class, 'store'])
        ->name('admin.products.store');
        Route::put('/admin/products/{product}', [ProductController::class, 'update'])
    ->name('admin.products.update');
        Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])
    ->name('admin.products.edit');

});