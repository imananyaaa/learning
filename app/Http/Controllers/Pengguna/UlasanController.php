<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_ulasan'] = Ulasan::all();
        $data['pengguna'] = $pengguna = auth()->guard('pengguna')->user();
        return view('pengguna.ulasan',$data);
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
        $ulasan = New Ulasan();
        $ulasan->nik = request('nik');
        $ulasan->rating = request('rating');
        $ulasan->komentar = request('komentar');
        $ulasan->save();

        return back()->with('success', 'Terima Kasih Monyet Ulasan Berhasil Dikirim');
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
