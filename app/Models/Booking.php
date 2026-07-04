<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $table ='booking';


    function handleUploadPoto()
    {
        if (request()->hasFile('file_proposal')) {
            $file_proposal = request()->file('file_proposal');
            $destination = "booking";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $file_proposal->extension();
            $url = $file_proposal->storeAs($destination, $filename);
            $this->file_proposal = "app/" . $url;


        }
    }

    public function Pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'nik');
    }

    public function Fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }

    public function tracking()
    {
        return $this->belongsTo(Tracking::class, 'id_booking');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($booking){

            $booking->kode_booking =
                'BOOK-' .
                date('Ymd') .
                '-' .
                strtoupper(Str::random(5));

        });
    }
}
