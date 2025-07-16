<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ForcePasswordResetController;

Route::get('/', function () {
    return redirect('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Protected Resources with Role Middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('module', ModuleController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('issue', IssueController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('permission', PermissionController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('role', RoleController::class);
});


//Dashboard Controller code

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');



Route::get('/force-reset-password', [ForcePasswordResetController::class, 'show'])->name('force.password.reset');
Route::post('/force-reset-password', [ForcePasswordResetController::class, 'update'])->name('force.password.update');

