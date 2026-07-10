<?php

namespace App\Imports;

use App\Models\Ulasan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UlasanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Ulasan([
            'nama'      => $row['nama'],
            'email'     => $row['email'],
            'no_hp'     => $row['no_hp'],
            'alamat'    => $row['alamat'],
            'rating'    => $row['rating'],
            'komentar'  => $row['komentar'],
        ]);

    }
}