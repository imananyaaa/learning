<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_kontak'] = Kontak::all();
        return view ('backend.kontak.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('backend.kontak.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kontak = New Kontak();
        $kontak->telepon = request('telepon');
        $kontak->whatsapp = request('whatsapp');
        $kontak->instagram = request('instagram');
        $kontak->lalitude = request('latitude');
        $kontak->longitude = request('longitude');
        $kontak->save();

        return redirect('backend/kontak');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['kontak'] = Kontak::find($id);
        return view('backend.kontak.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kontak'] = Kontak::find($id);
        return view('backend.kontak.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kontak = New Kontak();
        $kontak->telepon = request('telepon');
        $kontak->whatsapp = request('whatsapp');
        $kontak->instagram = request('instagram');
        $kontak->lalitude = request('latitude');
        $kontak->longitude = request('longitude');
        $kontak->save();

        return redirect('backend/kontak');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kontak::destroy($id);

        return back();
    }
}
