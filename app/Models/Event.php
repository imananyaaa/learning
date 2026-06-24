<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $table = 'event'; // ← tambahkan ini, sesuai nama tabel di DB

    protected $fillable = [
        'judul',      // sesuai kolom DB yang ada (bukan 'nama')
        'tanggal',
        'waktu',
        'jenis',
        'kuota',
        'lokasi',
        'status',
        'foto',
        'deskripsi',
    ];

    function handleUploadPoto()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "event";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;


        }
    }
}
