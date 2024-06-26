<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_barang',
        'nama_barang',
        'jenis_barang',
        'merek',
        'jumlah',
        'harga',
    ];
}
