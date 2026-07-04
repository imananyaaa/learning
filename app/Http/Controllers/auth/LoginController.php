<?php
// FILE: app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login(){
        return View ('auth.login');
    }


    public function loginproses(){

        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){
            return redirect('backend');
        }

        if (auth()->guard('pengguna')->attempt(['email' => request('email'), 'password' => request('password')])){
            return redirect('pengguna');
        }

        return redirect('login')->with('danger', 'Login Gagal');
    }

    public function logout(){
		auth()->guard('admin')->logout();
		auth()->guard('pengguna')->logout();
        return redirect('/');
    }

    function test(){
		$user= New Admin();
		$user->nama= 'Admin LC';
		$user->email= 'admin@learningcenter.com';
		$user->username= 'admin@learningcenter.com';
		$user->password='admin123';
		$user->save();

		return "Berhasil";


	}
}
