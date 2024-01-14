<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berobat extends Model
{
    use HasFactory;
    protected $table = 'berobats';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'no_urut',
        'pengirim',
        'alamat_pengirim',
        'tanggal_masuk',
        'tanggal_keluar'
    ];
}
