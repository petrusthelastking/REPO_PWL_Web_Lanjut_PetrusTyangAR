<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    // Menampilkan daftar token
    public function index()
    {
        $tokens = Token::all();// Mengambil semua token dari database
        return view('tokens.index', compact('tokens'));
    }

    // Menampilkan form untuk menambahkan token baru
    public function create()
    {
        return view('tokens.create');
    }

    // Menyimpan data token baru ke database
    public function store(Request $request)
    {
        //Validasi data penting (name, price, quantity)
        $request->validate([
            'name'     => 'required', // Nama token harus ada
            'price'    => 'required|numeric', // Harga harus berupa angka
            'quantity' => 'required|integer', // Jumlah harus berupa integer
        ]);

        //embuat record token baru dengan data yang divalidasi
        Token::create($request->all());
        return redirect()->route('tokens.index')
                         ->with('success', 'Token berhasil ditambahkan.');
    }

    // Menampilkan detail token tertentu
    public function show(Token $token)
    {
        return view('tokens.show', compact('token'));
    }

    // Menampilkan form untuk mengedit token
    public function edit(Token $token)
    {
        return view('tokens.edit', compact('token'));
    }

    // Memperbarui data token di database
    public function update(Request $request, Token $token)
    {
        //Validasi data update
        $request->validate([
            'name'     => 'required',
            'price'    => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

         //Memperbarui record token dengan data baru
        $token->update($request->all());
        return redirect()->route('tokens.index')
                         ->with('success', 'Token berhasil diperbarui.');
    }

    // Menghapus token dari database
    public function destroy(Token $token)
    {
        //Menghapus token dari database
        $token->delete();
        return redirect()->route('tokens.index')
                         ->with('success', 'Token berhasil dihapus.');
    }
}
