<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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


//Dashboard Controller code

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

