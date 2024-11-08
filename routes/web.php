<?php

use App\Http\Controllers\AdminController2;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// routes admin
Route::middleware(['auth', CheckRole::class .  ':admin'])->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController2::class, 'dashboard'])->name('admin.dashboard');

    // // Route untuk manajemen user
    // Route::get('/admin/users', [AdminController::class, 'userManagement'])->name('admin.users');
    // Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    // Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    // Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    // Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    // Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});
