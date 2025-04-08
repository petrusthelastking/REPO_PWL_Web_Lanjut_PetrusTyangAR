<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    protected $fillable = ['kode_kategori', 'nama_kategori', 'deskripsi','created_at', 'updated_at'];

    public function barang(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'kategori_id', 'kategori_id');
    }
}