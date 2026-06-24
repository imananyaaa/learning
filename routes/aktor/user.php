<?php

use App\Http\Controllers\Frontend\DashboardContoller;
use App\Http\Controllers\Frontend\EventContoller;
use App\Http\Controllers\Frontend\FasilitasContoller;
use App\Http\Controllers\Frontend\KontakContoller;
use App\Http\Controllers\Frontend\TentangKamiContoller;
use App\Http\Controllers\Frontend\UlasanContoller;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardContoller::class, 'index' ]);
Route::get('/tentang-kami',[TentangKamiContoller::class, 'index' ]);
Route::get('/fasilitas',[FasilitasContoller::class, 'index' ]);
Route::get('/event',[EventContoller::class, 'index' ]);
Route::get('/ulasan',[UlasanContoller::class, 'index' ]);
Route::get('/kontak',[KontakContoller::class, 'index' ]);


