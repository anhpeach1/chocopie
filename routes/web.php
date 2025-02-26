<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('home');
})->name('welcome');

Route::get('/dashboard', function () {
    if (Auth::user()->userType == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif (Auth::user()->userType == 'user') {
        return redirect()->route('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');
// Profile Routes
Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

//User
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});


//Admin
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});