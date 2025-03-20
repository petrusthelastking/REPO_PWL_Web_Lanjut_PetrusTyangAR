<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
   //Menambahkan atau Memasukkan data baru menggunakan Query Builder
//    public function index()
//    {
//         // $data = [
//         //     'kode_kategori' => 'SNK',
//         //     'nama_kategori' => 'Snack/Makanan Ringan',
//         //     'created_at' => now()
//         // ];

//         // DB::table('m_kategori')->insert($data);
//         // return 'Insert data baru berhasil';

//         //Merubah data yang sudah ada menggunakan Query Builder
//         // $row = DB::table('m_kategori')->where('kode_kategori', 'SNK')->update(['nama_kategori' => 'Camilan']);
//         // return 'Update data berhasil, jumlah data yang diupdate: '.$row. ' baris';

//         //Menghapus data yang sudah ada menggunakan Query Builder
//         // $row = DB::table('m_kategori')->where('kode_kategori', 'SNK')->delete();
//         // return 'Delete data berhasil, jumlah data yang dihapus: '.$row. ' baris';

//         //Mengambil data menggunakan Query Builder
//         $data = DB::table('m_kategori')->get();
//         return view('kategori', ['data' => $data]);
// }
        //----------------------------------------------------------------Jobsheet 4---------------------------------------------------------------
    // public function index(KategoriDataTable $dataTable){
    //     return $dataTable->render('kategori.index');
    // }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){
        KategoriModel::create([
            'kode_kategori' => $request->kodeKategori,
            'nama_kategori' => $request->namaKategori
        ]);

        return redirect('/kategori');
    }
}