<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_pengguna'] = Pengguna::all();
        return view ('backend.pengguna.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['pengguna'] = Pengguna::find($id);
        return view('backend.pengguna.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */

    public function verifikasi($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $pengguna->status = 'aktif';

        $pengguna->save();

        return redirect()->back()
                ->with('success','Pengguna berhasil diverifikasi.');
    }

}
