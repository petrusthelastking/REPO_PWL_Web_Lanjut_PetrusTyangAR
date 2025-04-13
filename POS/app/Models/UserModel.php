<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    //=================================================================Jobsheet 3============================================================
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan di model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan


    //=================================================================Jobsheet 4============================================================
    //Menambahkan variabel $fillable untuk mendaftarkan atribut (nama kolom) yang bisa diisi ketika melakukan insert atau update ke database.
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    //Menghilangkan kolom password pada variabel $fillable, menandakan variabel password tidak bisa diisi ketika melakukan insert atau update ke database.
    // protected $fillable = ['level_id', 'username', 'nama'];

    //================================================================Jobsheet 7============================================================
     protected $hidden = ['password']; // jangan ditampilkan saat select

     protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash

    public function level(): BelongsTo //Menunjukkan bahwa setiap user memiliki relasi belongsTo dengan tabel LevelModel, dihubungkan melalui level_id.
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

}