<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tracking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['list_booking'] = Booking::all();
        return view('backend.booking.index', $data);
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
        //
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

    public function verifikasi(Booking $booking)
    {
        $booking->status = '2';
        $booking->save();

        $tracking = New Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = 'Diterima';
        $tracking->save();

        return back()->with('success', 'Data Booking Berhasil Di Verifikasi');
    }

    public function ditolak(Booking $booking)
    {
        $booking->status = '3';
        $booking->save();

        $tracking = New Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = 'Ditolak';
        $tracking->save();

        return back()->with('success', 'Data Booking Berhasil Di Tolak');
    }

    public function selesai(Booking $booking)
    {
        $booking->status = '4';
        $booking->save();

        $tracking = New Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = 'Selesai';
        $tracking->save();

        return back()->with('success', 'Data Booking Berhasil Di Selesaikan');
    }
}
