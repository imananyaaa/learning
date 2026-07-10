<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_tentang_kami'] = TentangKami::all();
        return view ('backend.tentang_kami.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('backend.tentang_kami.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tentang_kami = New TentangKami();
        $tentang_kami->visi = request('visi');
        $tentang_kami->misi = request('misi');
        $tentang_kami->sejarah = request('sejarah');
        $tentang_kami->handleUploadPoto();
        $tentang_kami->save();

        return redirect('backend/tentang_kami');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['tentang_kami'] = TentangKami::find($id);
        return view('backend.tentang_kami.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['tentang_kami'] = TentangKami::find($id);
        return view('backend.tentang_kami.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tentang_kami = TentangKami::find($id);
        $tentang_kami->visi = request('visi');
        $tentang_kami->misi = request('misi');
        $tentang_kami->sejarah = request('sejarah');
        $tentang_kami->handleUploadPoto();
        $tentang_kami->save();

        return redirect('backend/tentang_kami');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         TentangKami::destroy($id);

        return back();
    }
}
