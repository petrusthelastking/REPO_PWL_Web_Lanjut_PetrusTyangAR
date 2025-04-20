<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\QueryException;

class BarangController extends Controller
{
    public function index()
    {
        $activeMenu = 'barang';
        $breadcrumb = (object) [
            'title' => 'Data Barang',
            'list' => ['Home', 'Barang']
        ];
        
    //     $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
    //     return view('barang.index', [
    //         'activeMenu' => $activeMenu,
    //         'breadcrumb' => $breadcrumb,
    //         'kategori' => $kategori
    //     ]);
    // }
    $kategori = KategoriModel::select('kategori_id', 'nama_kategori')->get();

        return view('barang.index', [
            'breadcrumb' => $breadcrumb,
            // 'page'       => $page,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        $barang = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 'kategori_id')->with('kategori');

        $kategori_id = $request->input('filter_kategori');
        if (!empty($kategori_id)) {
            $barang->where('kategori_id', $kategori_id);
        }

        return DataTables::of($barang)
            ->addIndexColumn()
            ->addColumn('aksi', function ($barang) {
                $btn = '<button type="button" onclick="modalAction(\''.url('/barang/'.$barang->barang_id.'/show_ajax').'\')" class="btn btn-info btn-sm">Detail</button>';
                $btn .= '<button type="button" onclick="modalAction(\''.url('/barang/'.$barang->barang_id.'/edit_ajax').'\')" class="btn btn-warning btn-sm">edit</button>';
                $btn .= ' <form method="POST" action="'.url('/barang/'.$barang->barang_id).'" style="display:inline-block">'.csrf_field().method_field('DELETE');
                $btn .= '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah yakin ingin menghapus?\')">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show(string $id)
    // Menampilkan detail barang (harga_jual dan harga_beli ikut ditampilkan)
    {
        // Gunakan with('kategori') agar bisa menampilkan info kategori di detail
        $barang = BarangModel::with('kategori')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Barang',
            'list'  => ['Home', 'Barang', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail barang'
        ];

        $activeMenu = 'barang';

        return view('barang.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    

    public function edit(string $id)
    {
        $barang = BarangModel::find($id);

        // Ambil data kategori untuk select
        $kategori = KategoriModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list'  => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit barang'
        ];

        $activeMenu = 'barang';

        return view('barang.edit', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'barang'     => $barang,
            'kategori'   => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id'  => 'required|integer',
            'barang_kode'  => 'required|string|max:10|unique:m_barang,barang_kode,'.$id.',barang_id',
            'barang_nama'  => 'required|string|max:100',
            'harga_beli'   => 'required|numeric',
            'harga_jual'   => 'required|numeric',
        ]);

        $barang = BarangModel::find($id);
        if (!$barang) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        $barang->update([
            'kategori_id'  => $request->kategori_id,
            'barang_kode'  => $request->barang_kode,
            'barang_nama'  => $request->barang_nama,
            'harga_beli'   => $request->harga_beli,
            'harga_jual'   => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    // Menghapus data barang
    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }

        try {
            BarangModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (QueryException $e) {
            // Jika ada constraint foreign key, dsb.
            return redirect('/barang')->with(
                'error',
                'Data barang gagal dihapus karena masih terdapat data lain yang terkait'
            );
        }
    }

    public function create_ajax()
    {
        $kategori = KategoriModel::all();
        return view('barang.create_ajax')->with('kategori', $kategori);
    }

    public function store_ajax(Request $request)
{
    if ($request->ajax()) {
        $rules = [
            'kategori_id' => ['required', 'integer', 'exists:m_kategori,kategori_id'], // ← table is m_kategori
            'barang_kode' => ['required','string','min:3','max:20','unique:m_barang,barang_kode'],
            'barang_nama' => ['required','string','max:100'],
            'harga_beli'  => ['required','numeric'],
            'harga_jual'  => ['required','numeric'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'   => false,
                'message'  => 'Validasi Gagal.',
                'msgField' => $validator->errors(),
            ], 422);
        }

        BarangModel::create($request->only(['kategori_id','barang_kode','barang_nama','harga_beli','harga_jual']));

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }

    return abort(404);
}
    public function edit_ajax($id)
{
    $barang = BarangModel::find($id);
    $kategori = KategoriModel::all(); // <--- Tambahkan ini

    return view('barang.edit_ajax', compact('barang', 'kategori'));
}


    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_id' => ['required', 'integer', 'exists:kategori,kategori_id'],
                'barang_kode' => ['required', 'min:3', 'max:20', 'unique:m_barang,barang_kode,'.$id.',barang_id'],
                'barang_nama' => ['required', 'string', 'max:100'],
                'harga_beli' => ['required', 'numeric'],
                'harga_jual' => ['required', 'numeric'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $check = BarangModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function confirm_ajax($id)
    {
        $barang = BarangModel::find($id);
        return view('barang.confirm_ajax', ['barang' => $barang]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $barang = BarangModel::find($id);
            if ($barang) {
                $barang->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }

        return redirect('/');
    }

    public function show_ajax(string $id){
        $barang = BarangModel::with('kategori')->find($id);

        return view('barang.show_ajax', ['barang' => $barang]);
    }

    public function import()
    {
        return view('barang.import');
    }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'file_barang' => ['required', 'mimes:xlsx', 'max:1024']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $file = $request->file('file_barang');

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray(null, false, true, true);

            $insert = [];
            if (count($data) > 1) {
                foreach ($data as $index => $value) {
                    if ($index == 1) continue;

                    $insert[] = [
                        'kategori_id' => $value['A'],
                        'barang_kode' => $value['B'],
                        'barang_nama' => $value['C'],
                        'harga_beli' => $value['D'],
                        'harga_jual' => $value['E'],
                        'created_at' => now()
                    ];
                }
            }

            if (count($insert) > 0) {
                BarangModel::insertOrIgnore($insert);
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }

        return redirect('/');
    }

    public function export_excel()
    {
        //Ambil value barang yang akan diexport
        $barang = BarangModel::select(
            'kategori_id',
            'barang_kode',
            'barang_nama',
            'harga_jual',
            'harga_beli'
        )
        ->orderBy('kategori_id')
        ->with('kategori')
        ->get();

        //load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); //ambil sheet aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Harga Jual');
        $sheet->setCellValue('E1', 'Harga Beli');
        $sheet->setCellValue('F1', 'Kategori');

        $sheet->getStyle('A1:F1')->getFont()->setBold(true); // Set header bold

        $no = 1; //Nomor value dimulai dari 1
        $baris = 2; //Baris value dimulai dari 2
        foreach ($barang as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->barang_kode);
            $sheet->setCellValue('C' . $baris, $value->barang_nama);
            $sheet->setCellValue('D' . $baris, $value->harga_jual);
            $sheet->setCellValue('E' . $baris, $value->harga_beli);
            $sheet->setCellValue('F' . $baris, $value->kategori->nama_kategori); //ambil nama kategori
            $no++;
            $baris++;
        }

        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); //set auto size untuk kolom
        }

        $sheet->setTitle('Data Barang'); //set judul sheet
        $writer = IOFactory ::createWriter($spreadsheet, 'Xlsx'); //set writer
        $filename = 'Data_Barang_' . date('Y-m-d_H-i-s') . '.xlsx'; //set nama file

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output'); //simpan file ke output
        exit; //keluar dari scriptA
    }

    public function export_pdf(){
        $barang = BarangModel::select(
            'kategori_id',
            'barang_kode',
            'barang_nama',
            'harga_jual',
            'harga_beli'
        )
        ->orderBy('kategori_id')
        ->orderBy('barang_kode')
        ->with('kategori')
        ->get();

        // use Barryvdh\DomPDF\Facade\Pdf;
        $pdf = PDF::loadView('barang.export_pdf', ['barang' => $barang]);
        $pdf->setPaper('A4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render(); // render pdf

        return $pdf->stream('Data Barang '.date('Y-m-d H-i-s').'.pdf');
    }
}