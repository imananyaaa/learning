<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        // Ambil semua kolom kecuali yang tidak perlu dicari
        $columns = collect(Schema::getColumnListing('event'))
            ->reject(function ($column) {
                return in_array($column, [
                    'id',
                    'created_at',
                    'updated_at',

                ]);
            });

        $data['list_event'] = Event::when($search, function ($query) use ($search, $columns) {

                $query->where(function ($q) use ($search, $columns) {

                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', "%{$search}%");
                    }

                });

            })
            ->latest()
            ->paginate(10)
            ->withQueryString();


        return view ('backend.event.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = New Event();
        $event->judul = request('judul');
        $event->tanggal = request('tanggal');
        $event->waktu = request('waktu');
        $event->jenis = request('jenis');
        $event->kuota = request('kuota');
        $event->lokasi = request('lokasi');
        $event->status = request('status');
        $event->handleUploadPoto();
        $event->deskripsi = request('deskripsi');
        $event->save();

        return redirect('backend/event');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['event'] = Event::find($id);
        return view('backend.event.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['event'] = Event::find($id);
        return view('backend.event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->judul = request('judul');
        $event->tanggal = request('tanggal');
        $event->waktu = request('waktu');
        $event->jenis = request('jenis');
        $event->kuota = request('kuota');
        $event->lokasi = request('lokasi');
        $event->status = request('status');
        $event->handleUploadPoto();
        $event->deskripsi = request('deskripsi');
        $event->save();

        return redirect('backend/event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if ($event->foto) {

            $oldFile = str_replace('app/', '', $event->foto);

            if (Storage::exists($oldFile)) {
                Storage::delete($oldFile);
            }
        }

        $event->delete();

        return back();
    }
}
