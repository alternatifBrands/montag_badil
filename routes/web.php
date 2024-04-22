<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\HomeController;


Route::get('/login',[AuthController::class,'loginView'])->name('login');
Route::post('/login', [AuthController::class,'loginMethod'])->name('login.post');

Route::get('/register',[AuthController::class,'registerView'])->name('register');
Route::post('/register', [AuthController::class,'registerMethod'])->name('register.post');

Route::get('/forget-password', [AuthController::class,'forgetPasswordView'])->name('forget');
Route::post('/forget-password', [AuthController::class,'forgetPasswordMethod'])->name('forget.post');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPasswordView'])->name('reset');
Route::post('/reset-password', [AuthController::class, 'resetPasswordMethod'])->name('reset.post');


Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/brand/{id}',[HomeController::class, 'show'])->name('brand.details');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});