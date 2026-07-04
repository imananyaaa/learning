<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_pesan'] = PesanKontak::all();
        return view ('backend.pesan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kontak = New PesanKontak();
        $kontak->whatsapp = request('whatsapp');
        $kontak->email = request('email');
        $kontak->alamat = request('alamat');
        $kontak->maps = request('maps');
        $kontak->save();

        return redirect('backend/pesan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data['pesan'] = PesanKontak::find($id);
        return view('backend.pesan.show', $data);

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
