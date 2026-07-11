<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Fasilitas;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

         // ambil tanggal yang sudah digunakan
        $booking = Booking::whereIn('status',[1,2])
            ->get();


        $tanggal_block = [];


        foreach($booking as $item){

            $mulai = Carbon::parse($item->tanggal_mulai);
            $selesai = Carbon::parse($item->tanggal_selesai);


            while($mulai <= $selesai){

            $tanggal_block[$item->id_fasilitas][] =
                $mulai->format('Y-m-d');


            $mulai->addDay();
        }

        }


        $data['tanggal_block'] = $tanggal_block;

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
        $booking->handleUploadFile();
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
       $booking = Booking::find($id);

        if ($booking->file_proposal) {

            $oldFile = str_replace('app/', '', $booking->file_proposal);

            if (Storage::exists($oldFile)) {
                Storage::delete($oldFile);
            }
        }

        $booking->delete();


        return back()->with('success', 'Berhasil membatalkan booking fasilitas');
    }
}
