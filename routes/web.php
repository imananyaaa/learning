<?php


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function() {
    include "aktor/user.php";
});

Route::prefix('backend')->group(function() {
    include "aktor/admin.php";
});

Route::prefix('pengguna')->group(function() {
    include "aktor/pengguna.php";
});


Route::get('/add', [LoginController::class, 'test']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginproses']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
