<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_pembelian',
        'nama_barang',
        'jenis_barang',
        'merek',
        'jumlah',
        'harga',
    ];
}
