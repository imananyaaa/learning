<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_kontak'] = Kontak::all();
        $data['pengguna'] = $pengguna = auth()->guard('pengguna')->user();
        return view('pengguna.kontak',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesan_kontak = New PesanKontak();
        $pesan_kontak->nama = request('nama');
        $pesan_kontak->email = request('email');
        $pesan_kontak->telepon = request('telepon');
        $pesan_kontak->tujuan = request('tujuan');
        $pesan_kontak->pesan = request('pesan');
        $pesan_kontak->save();

        return back()->with('success', 'Terimakasih, Pesan Anda Berhasil Dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
