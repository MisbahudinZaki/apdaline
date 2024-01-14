<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekomendasi extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id',
        'no_urut',
        'pengirim',
        'alamat_pengirim',
        'jenis',
        'tanggal_masuk',
    ];
}
