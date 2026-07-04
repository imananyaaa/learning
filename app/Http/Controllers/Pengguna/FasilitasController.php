<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Fasilitas;
use App\Models\Tracking;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_fasilitas'] = Fasilitas::where('jenis_fasilitas', 'Fasilitas Utama')->get();
        $data['list_fasilitas_pendukung'] = Fasilitas::where('jenis_fasilitas', 'Fasilitas Pendukung')->get();
        $data['list_booking'] = Booking::orderBy('id', 'desc')->get();
        $data['list_tracking'] = Tracking::all();

        $data['pengguna'] = $pengguna = auth()->guard('pengguna')->user();
        return View('pengguna.fasilitas', $data);
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
        $booking = New Booking();
        $booking->nik = request('nik');
        $booking->kode_booking = request('kode_booking');
        $booking->id_fasilitas = request('id_fasilitas');
        $booking->nama_kegiatan = request('nama_kegiatan');
        $booking->tanggal_mulai = request('tanggal_mulai');
        $booking->tanggal_selesai = request('tanggal_selesai');
        $booking->handleUploadPoto();
        $booking->status = '1';
        $booking->save();

        $tracking = New Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = 'Menunggu Verifikasi';
        $tracking->save();

        return back()->with('success', 'Berhasil melakukan booking fasilitas');
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
