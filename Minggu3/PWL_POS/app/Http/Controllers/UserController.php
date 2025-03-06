<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Menambahkan data baru menggunakan Eloquent
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'), // class untuk mengenkripsi/hash password
        //     'level_id' => 6
        // ];

        // UserModel::insert($data); //Memasukkan atau menambahkan data baru mengguankan Eloquent ORM

        //Merubah data yang sudah ada menggunakan Eloquent
        $data =[
            'nama' => 'Pelanggan Pertama'
        ];

        UserModel::where('username', 'customer-1')->update($data); //Merubah data yang sudah ada menggunakan Eloquent ORM

        //Mengambil semua data menggunakan Eloquent
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
