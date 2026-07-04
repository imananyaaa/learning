<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class PenggunaController extends Controller
{
    public function index()
    {

        $data['list_pengguna'] = Pengguna::all();
        return view('backend.pengguna.index', $data);
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
        $pengguna = new Pengguna();
        $pengguna->nik = $request->nik;
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->username = $request->email;
        $pengguna->password = $request->password;
        $pengguna->tanggal_lahir = $request->tanggal_lahir;
        $pengguna->tempat_lahir = $request->tempat_lahir;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_hp = $request->no_hp;
        $pengguna->handleUploadPoto();

        $pengguna->save();

        return redirect('backend/pengguna')->with('success', 'Data Berhasil di Simpan');
    }

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
    public function edit(string $id)
    {

        $data['pengguna'] = Pengguna::find($id);
        return view('backend.pengguna.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->nik = $request->nik;
        $pengguna->nama = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->username = $request->email;
        $pengguna->password = $request->password;
        $pengguna->tanggal_lahir = $request->tanggal_lahir;
        $pengguna->tempat_lahir = $request->tempat_lahir;
        $pengguna->alamat = $request->alamat;
        $pengguna->no_hp = $request->no_hp;
        $pengguna->handleUploadPoto();

        $pengguna->save();

        return redirect('backend/pengguna')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect()->back()->with('danger', 'Data Berhasil Dihapus');
    }

    public function verifikasi(Pengguna $pengguna)
    {
        $pengguna->email = $pengguna->username;
        $pengguna->status = '2';
        $pengguna->save();

        return back()->with('success', 'Data Pengguna Berhasil Di Verifikasi');
    }
}
