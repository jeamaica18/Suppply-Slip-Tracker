<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\AuthController;

// Admin Login Route
Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return view(view: 'auth.login');
    })->name('admin.login');
});     

// Main Login Route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Single Login Processing Route
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route to dashboard
Route::get('/dashboard', function () {
    return view('auth.dashboard');
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout(); 
    return redirect('/login');
})->name('logout');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', function () {
    return view('auth.profile');
})->name('profile');

//Search Route
Route::get('/search', [SearchController::class, 'index'])->name('search.items');

