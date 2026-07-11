<?php

use App\Http\Controllers\Pengguna\DashboardController;
use App\Http\Controllers\Pengguna\EventController;
use App\Http\Controllers\Pengguna\FasilitasController;
use App\Http\Controllers\Pengguna\KontakController;
use App\Http\Controllers\Pengguna\TentangKamiController;
use App\Http\Controllers\Pengguna\UlasanController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index' ]);
Route::get('/tentang-kami',[TentangKamiController::class, 'index' ]);


Route::get('/fasilitas',[FasilitasController::class, 'index' ]);
Route::post('/fasilitas',[FasilitasController::class, 'store' ]);
Route::get('/fasilitas/batal/{id}',[FasilitasContoller::class, 'destroy' ]);

Route::get('/event',[EventController::class, 'index' ]);
Route::get('/event/show/{id}',[EventController::class, 'show' ]);

Route::get('/ulasan',[UlasanController::class, 'index' ]);
Route::post('/ulasan',[UlasanController::class, 'store' ]);

Route::get('/kontak',[KontakController::class, 'index' ]);
