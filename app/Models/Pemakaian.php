<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'pemakai',
        'tanggal',
        'jumlah',
    ];
}
