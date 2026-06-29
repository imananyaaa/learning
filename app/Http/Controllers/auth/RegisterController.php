<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// ============================================================
// FILE: app/Http/Controllers/Auth/RegisterController.php
// FUNGSI: Handle registrasi user baru
// ============================================================

class RegisterController extends Controller
{

    public function index() {
         return view('auth.register');
    }

    public function store() {

    $pengguna = New Pengguna();
    $pengguna->nik = request('nik');
    $pengguna->nama = request('nama');
    $pengguna->username = request('username');
    $pengguna->password = request('password');
    $pengguna->alamat = request('alamat');
    $pengguna->no_hp = request('no_hp');
    $pengguna->tempat_lahir = request('tempat_lahir');
    $pengguna->tanggal_lahir = request('tanggal_lahir');
    $pengguna->status = '1';
    $pengguna->handleUploadPoto();
    $pengguna->save();

    return redirect('login')->with('success', 'Akun Anda berhasil di Daftarkan');

    }

}
