<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';

     protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'alamat',
        'rating',
        'komentar',
    ];

    public function Pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'nik');
    }
}
