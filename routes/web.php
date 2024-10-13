<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); });

Route::get('/shop', function () {
    return view('shop.shop');
});

Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/otwlogin', [AuthController::class, 'otwlogin'])->name('otwlogin');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/otwregister', [AuthController::class, 'otwregister'])->name('otwregister');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
