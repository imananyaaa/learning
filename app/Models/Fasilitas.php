<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Fasilitas extends Model
{
    protected $table ='fasilitas';


    function handleUploadPoto()
    {
        {
        if (request()->hasFile('foto')) {

            // Hapus foto lama
            if ($this->foto) {

                // app/fasilitas/foto.jpg -> fasilitas/foto.jpg
                $oldFile = str_replace('app/', '', $this->foto);

                if (Storage::exists($oldFile)) {
                    Storage::delete($oldFile);
                }
            }

            // Upload foto baru
            $foto = request()->file('foto');

            $destination = "fasilitas";

            $randomStr = Str::random(5);

            $filename = time() . "-" . $randomStr . "." . $foto->extension();

            $url = $foto->storeAs($destination, $filename);

            $this->foto = "app/" . $url;
        }
    }
    }

    public function Booking()
    {
        return $this->belongsTo(Booking::class, 'id');
    }
}
