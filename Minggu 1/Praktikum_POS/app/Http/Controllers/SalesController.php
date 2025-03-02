<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        // Memanggil view untuk halaman transaksi POS
        return view('sales');
    }
}
