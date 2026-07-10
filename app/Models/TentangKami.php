<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TentangKami extends Model
{
    protected $table = 'tentang_kami'; // ← tambahkan ini, sesuai nama tabel di DB

    protected $fillable = [
        'visi',      // sesuai kolom DB yang ada (bukan 'nama')
        'misi',
        'sejarah',
        'foto',
    ];

    function handleUploadPoto()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "tentang_kami";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
        }
    }
}
