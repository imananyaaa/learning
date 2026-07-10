<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasPendukungController extends Controller
{
    public function index()
    {
        $data['list_fasilitas'] = Fasilitas::where('jenis_fasilitas', 'Fasilitas Pendukung')->get();

        return view('backend.fasilitas.fasilitas-pendukung.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.fasilitas.fasilitas-pendukung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fasilitas = New Fasilitas();
        $fasilitas->nama = request('nama');
        $fasilitas->jenis_fasilitas = 'Fasilitas Pendukung';
        $fasilitas->deskripsi = request('deskripsi');
        $fasilitas->status = request('status');
        $fasilitas->handleUploadPoto();
        $fasilitas->save();

        return redirect('backend/fasilitas-pendukung')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['fasilitas'] = Fasilitas::find($id);

        return view('backend.fasilitas.fasilitas-pendukung.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['fasilitas'] = Fasilitas::find($id);

        return view('backend.fasilitas.fasilitas-pendukung.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->nama = request('nama');
        $fasilitas->jenis_fasilitas = 'Fasilitas Pendukung';
        $fasilitas->deskripsi = request('deskripsi');
        $fasilitas->status = request('status');
        $fasilitas->handleUploadPoto();
        $fasilitas->save();

        return redirect('backend/fasilitas-pendukung')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Fasilitas::destroy($id);

        return back();
    }
}
