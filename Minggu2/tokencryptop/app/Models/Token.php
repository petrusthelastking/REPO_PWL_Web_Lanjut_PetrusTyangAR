<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal menggunakan Eloquent.
    protected $fillable = ['name', 'price', 'quantity', 'description'];
    // Nama token cryptocurrency
    // Harga per unit token
    // Jumlah token yang tersedia
    // Deskripsi atau informasi tambahan
}
