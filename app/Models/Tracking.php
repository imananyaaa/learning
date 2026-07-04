<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tracking extends Model
{
    protected $table ='tracking';


    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}
