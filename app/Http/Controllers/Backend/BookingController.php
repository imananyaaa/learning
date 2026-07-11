<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['booking_masuk'] = Booking::where('status', '1')->count();

        $data['list_booking'] = $this->getBooking($request, [1,2]);
        return view('backend.booking.index', $data);
    }

    public function bookingSelesai(Request $request)
    {
        $data['list_booking'] = $this->getBooking($request, [4]);
        return view('backend.booking.selesai', $data);
    }

    public function bookingDitolak(Request $request)
    {
         $data['list_booking'] = $this->getBooking($request, [3]);
        return view('backend.booking.ditolak', $data);
    }


    public function show(string $id)
    {
        $data['booking'] = Booking::find($id);
        return view('backend.booking.show', $data);
    }


    public function verifikasi(Booking $booking)
    {
        $booking->catatan = request('catatan') ;
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
        $booking->catatan = request('catatan') ;
        $booking->status = '3';
        $booking->save();

        $tracking = New Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = 'Ditolak';
        $tracking->save();

        return redirect('backend/booking-ditolak')->with('success', 'Data Booking Berhasil Di Tolak');
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


    public function konfirmasi(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->catatan = $request->catatan;

        if ($request->aksi == 'terima') {
            $booking->status = 2;
            $statusTracking = 'Diterima';
        } else {
            $booking->status = 3;
            $statusTracking = 'Ditolak';
        }

        $booking->save();

        $tracking = new Tracking();
        $tracking->id_booking = $booking->id;
        $tracking->status = $statusTracking;
        $tracking->save();

        return redirect()->back()
            ->with('success', 'Booking berhasil dikonfirmasi.');
    }

    private function getBooking(Request $request, array $status)
    {
        $search = $request->search;

        $columns = collect(Schema::getColumnListing('booking'))
            ->reject(function ($column) {
                return in_array($column, [
                    'id',
                    'created_at',
                    'updated_at',
                ]);
            });

        return Booking::whereIn('status', $status)
            ->when($search, function ($query) use ($search, $columns) {

                $query->where(function ($q) use ($search, $columns) {

                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%{$search}%");
                    }

                });

            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();
    }
}
