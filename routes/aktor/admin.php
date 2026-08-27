<?php

use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FasilitasController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\FasilitasPendukungController;
use App\Http\Controllers\Backend\FasilitasUtamaController;
use App\Http\Controllers\Backend\KontakController;
use App\Http\Controllers\Backend\UlasanController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\PesanController;
use App\Http\Controllers\Backend\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboardController::class, 'index' ]);
Route::resource('fasilitas', FasilitasController::class);

Route::get('/dashboard',[DashboardController::class, 'index' ]);


Route::get('/tentang_kami',[TentangKamiController::class, 'index' ]);
Route::get('/tentang_kami/create',[TentangKamiController::class, 'create' ]);
Route::post('/tentang_kami', [TentangKamiController::class, 'store']);
Route::get('/tentang_kami/show/{id}',[TentangKamiController::class, 'show' ]);
Route::get('/tentang_kami/edit/{id}',[TentangKamiController::class, 'edit' ]);
Route::put('/tentang_kami/update/{id}',[TentangKamiController::class, 'update' ]);


Route::get('/event',[EventController::class, 'index' ]);
Route::get('/event/create',[EventController::class, 'create' ]);
Route::post('/event',[EventController::class, 'store' ]);
Route::get('/event/show/{id}',[EventController::class, 'show' ]);
Route::get('/event/edit/{id}',[EventController::class, 'edit' ]);
Route::put('/event/update/{id}',[EventController::class, 'update' ]);
Route::get('/event/delete/{id}',[EventController::class, 'destroy' ]);


Route::get('/fasilitas-utama',[FasilitasUtamaController::class, 'index' ]);
Route::get('/fasilitas-utama/create',[FasilitasUtamaController::class, 'create' ]);
Route::post('/fasilitas-utama',[FasilitasUtamaController::class, 'store' ]);
Route::get('/fasilitas-utama/show/{id}',[FasilitasUtamaController::class, 'show' ]);
Route::get('/fasilitas-utama/edit/{id}',[FasilitasUtamaController::class, 'edit' ]);
Route::put('/fasilitas-utama/update/{id}',[FasilitasUtamaController::class, 'update' ]);
Route::get('/fasilitas-utama/delete/{id}',[FasilitasUtamaController::class, 'destroy' ]);


Route::get('/fasilitas-pendukung',[FasilitasPendukungController::class, 'index' ]);
Route::get('/fasilitas-pendukung/create',[FasilitasPendukungController::class, 'create' ]);
Route::post('/fasilitas-pendukung',[FasilitasPendukungController::class, 'store' ]);
Route::get('/fasilitas-pendukung/show/{id}',[FasilitasPendukungController::class, 'show' ]);
Route::get('/fasilitas-pendukung/edit/{id}',[FasilitasPendukungController::class, 'edit' ]);
Route::put('/fasilitas-pendukung/update/{id}',[FasilitasPendukungController::class, 'update' ]);
Route::get('/fasilitas-pendukung/delete/{id}',[FasilitasPendukungController::class, 'destroy' ]);


Route::get('/ulasan',[UlasanController::class, 'index' ]);
Route::get('/ulasan/show/{id}',[UlasanController::class, 'show' ]);
Route::get('/ulasan/delete/{id}',[UlasanController::class, 'destroy' ]);
Route::post('/ulasan/import',[UlasanController::class, 'import' ]);


Route::get('/kontak',[KontakController::class, 'index' ]);
Route::get('/kontak/show/{id}',[KontakController::class, 'show' ]);
Route::get('/kontak/create',[KontakController::class, 'create' ]);
Route::post('/kontak',[KontakController::class, 'store' ]);
Route::get('/kontak/edit/{id}',[KontakController::class, 'edit' ]);
Route::put('/kontak/update/{id}',[KontakController::class, 'update' ]);
Route::get('/kontak/delete/{id}',[KontakController::class, 'destroy' ]);


Route::get('/pesan',[PesanController::class, 'index' ]);
Route::get('/pesan/show/{pesanKontak}', [PesanController::class, 'show']);


Route::get('pengguna',[PenggunaController::class, 'index' ]);
Route::post('pengguna',[PenggunaController::class, 'store' ]);
Route::get('pengguna/show/{id}',[PenggunaController::class, 'show' ]);
Route::get('pengguna/edit/{id}',[PenggunaController::class, 'edit' ]);
Route::put('pengguna/update/{id}',[PenggunaController::class, 'update' ]);
Route::get('pengguna/delete/{id}',[PenggunaController::class, 'destroy' ]);
Route::put('pengguna/verifikasi/{pengguna}', [PenggunaController::class, 'verifikasi']);


Route::get('booking',[BookingController::class, 'index' ]);
Route::get('booking/show/{id}', [BookingController::class, 'show']);
Route::put('booking/verifikasi/{booking}', [BookingController::class, 'verifikasi']);
Route::put('booking/ditolak/{booking}', [BookingController::class, 'ditolak']);
Route::put('booking/selesai/{booking}', [BookingController::class, 'selesai']);
Route::put('booking/batal/{booking}', [BookingController::class, 'batal']);
Route::get('booking-selesai', [BookingController::class, 'bookingSelesai']);
Route::get('booking-ditolak', [BookingController::class, 'bookingDitolak']);
Route::get('booking-dibatalkan', [BookingController::class, 'bookingDibatalkan']);
Route::put('/booking/konfirmasi/{id}', [BookingController::class, 'konfirmasi']);
