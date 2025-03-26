<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'lavel_id'; //Mendefinisikan primary key dari tabel yang digunakan
}
