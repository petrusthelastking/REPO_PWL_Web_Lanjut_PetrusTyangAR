<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function index(){
        return "Selamat Datang";
    }

    function about(){
        return 'NIM : 2341720227 <br> Nama : Petrus Tyang Agung Rosario';
    }

    public function articles($id){
        return 'Halaman artikel dengan ID'.$id;
    }
    
}
