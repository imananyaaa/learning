<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;

        // Ambil semua kolom kecuali yang tidak perlu dicari
        $columns = collect(Schema::getColumnListing('pengguna'))
            ->reject(function ($column) {
                return in_array($column, [
                    'id',
                    'created_at',
                    'updated_at',

                ]);
            });

        $data['list_pengguna'] = Pengguna::when($search, function ($query) use ($search, $columns) {

                $query->where(function ($q) use ($search, $columns) {

                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%{$search}%");
                    }

                });

            })
            ->orderByDesc('created_at')
            ->latest()
            ->paginate(10)
            ->withQueryString();


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
