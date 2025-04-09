<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // implementasi class Authenticatable

class UserModel extends Authenticatable
{
    use HasFactory;


    //=================================================================Jobsheet 3============================================================
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


    //=================================================================Jobsheet 4============================================================
    //Menambahkan variabel $fillable untuk mendaftarkan atribut (nama kolom) yang bisa diisi ketika melakukan insert atau update ke database.
    protected $fillable = ['level_id', 'username', 'nama', 'password' , 'profile_photo']; //Menambahkan kolom profile_photo pada variabel $fillable, menandakan kolom profile_photo bisa diisi ketika melakukan insert atau update ke database.
    
    //Menghilangkan kolom password pada variabel $fillable, menandakan variabel password tidak bisa diisi ketika melakukan insert atau update ke database.
    // protected $fillable = ['level_id', 'username', 'nama'];

    //================================================================Jobsheet 7============================================================
    protected $hidden = ['password']; // jangan ditampilkan saat select

    protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash
    
    // protected $fillable = ['level_id', 'username', 'nama'];
    //Praktikum 2.7 langkah 1
            /**
     * Relasi ke tabel level
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Mendapatkan nama role
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }


    public function stok(): HasMany {
        return $this->hasMany(StokModel::class, 'user_id', 'user_id');
    }

    public function penjualan(): HasMany {
        return $this->hasMany(PenjualanModel::class, 'user_id', 'user_id');
    }
}