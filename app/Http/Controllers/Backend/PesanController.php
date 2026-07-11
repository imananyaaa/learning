<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $search = $request->search;

        // Ambil semua kolom kecuali yang tidak perlu dicari
        $columns = collect(Schema::getColumnListing('pesan'))
            ->reject(function ($column) {
                return in_array($column, [
                    'id',
                    'created_at',
                    'updated_at',

                ]);
            });

        $data['list_pesan'] = PesanKontak::when($search, function ($query) use ($search, $columns) {

                $query->where(function ($q) use ($search, $columns) {

                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%{$search}%");
                    }

                });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
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
    public function show(PesanKontak $pesanKontak)
    {

         if ($pesanKontak->status_baca == 0) {
        $pesanKontak->status_baca = 1;
        $pesanKontak->save();
    }

    return view('backend.pesan.show', [
        'pesanKontak' => $pesanKontak
    ]);

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
