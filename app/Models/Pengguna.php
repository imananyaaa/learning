<?php

namespace App\Models;


use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;

class Pengguna extends ModelAuthenticate
{

	public $table = "pengguna";
    protected $primaryKey = 'nik';
	public $incrementing = false;

	function handleUploadPoto()
    {
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "pengguna";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;


        }
    }

    public function Ulasan()
    {
        return $this->belongsTo(Ulasan::class, 'nik');
    }

}
