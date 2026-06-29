<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FasilitasController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\KontakController;
use App\Http\Controllers\Backend\UlasanController;
use App\Http\Controllers\Backend\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index' ]);
Route::resource('fasilitas', FasilitasController::class);

Route::get('/dashboard',[DashboardController::class, 'index' ]);



Route::get('/event',[EventController::class, 'index' ]);
Route::get('/event/create',[EventController::class, 'create' ]);
Route::post('/event',[EventController::class, 'store' ]);
Route::get('/event/show/{id}',[EventController::class, 'show' ]);
Route::get('/event/edit/{id}',[EventController::class, 'edit' ]);
Route::put('/event/update/{id}',[EventController::class, 'update' ]);
Route::get('/event/delete/{id}',[EventController::class, 'destroy' ]);


Route::get('/fasilitas',[FasilitasController::class, 'index' ]);
Route::get('/fasilitas/create',[FasilitasController::class, 'create' ]);
Route::post('/fasilitas',[FasilitasController::class, 'store' ]);
Route::get('/fasilitas/show/{id}',[FasilitasController::class, 'show' ]);
Route::get('/fasilitas/edit/{id}',[FasilitasController::class, 'edit' ]);
Route::put('/fasilitas/update/{id}',[FasilitasController::class, 'update' ]);
Route::get('/fasilitas/delete/{id}',[FasilitasController::class, 'destroy' ]);


Route::get('/ulasan',[UlasanController::class, 'index' ]);
Route::get('/ulasan/show/{id}',[UlasanController::class, 'show' ]);
Route::get('/ulasan/delete/{id}',[UlasanController::class, 'destroy' ]);


Route::get('/kontak',[KontakController::class, 'index' ]);



Route::get('/pengguna',[PenggunaController::class, 'index' ]);
Route::get('/pengguna/show/{id}',[PenggunaController::class, 'show' ]);
Route::get('/pengguna/verifikasi/{id}',[PenggunaController::class, 'verifikasi' ]);
