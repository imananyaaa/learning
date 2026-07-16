<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Fasilitas;
use App\Models\PesanKontak;
use App\Models\Event;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data['admin'] = $admin = auth()->guard('admin')->user();

         $stats = [

            'ulasan'      => Ulasan::count(),
            'rating'      => round(Ulasan::avg('rating') ?? 0, 1),

        ];

         $data['ratingDist'] = collect([5, 4, 3, 2, 1])->map(function ($star) use ($stats) {
            $count = Ulasan::where('rating', $star)->count();

            $pct = $stats['ulasan'] > 0
                ? round(($count / $stats['ulasan']) * 100)
                : 0;

            return [
                'star'  => $star,
                'count' => $count,
                'pct'   => $pct
            ];
        });

        $data['fasilitas'] = Fasilitas::count();
        $data['event'] = Event::count();
        $data['ulasan'] = Ulasan::count();
        $data['pesan'] = PesanKontak::count();

        return View('backend.dashboard', $data);
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
}
