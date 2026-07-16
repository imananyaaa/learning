<?php


use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\EventController;
use App\Http\Controllers\Frontend\FasilitasController;
use App\Http\Controllers\Frontend\KontakController;
use App\Http\Controllers\Frontend\TentangKamiController;
use App\Http\Controllers\Frontend\UlasanController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index' ]);

Route::get('/tentang-kami',[TentangKamiController::class, 'index' ]);

Route::get('/fasilitas',[FasilitasController::class, 'index' ]);

Route::get('/event',[EventController::class, 'index' ]);

Route::get('/ulasan',[UlasanController::class, 'index' ]);


Route::get('/kontak',[KontakController::class, 'index' ]);
Route::post('/kontak/store',[KontakController::class, 'store' ]);


