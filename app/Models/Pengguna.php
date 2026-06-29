<?php

namespace App\Models;

use App\Models\ModelAuthenticate;
use Illuminate\Support\Str;

class Pengguna extends ModelAuthenticate
{
    public $table = "pengguna";

    function handleUploadPoto()
        {
            if (request()->hasFile('foto')) {
                $foto = request()->file('foto');
                $destination = "Pengguna";
                $randomStr = Str::random(5);
                $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
                $url = $foto->storeAs($destination, $filename);
                $this->foto = "app/" . $url;


            }
        }

}
