<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            // Jika sudah login, redirect ke halaman home
            return redirect('/');
        }

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if ($request->ajax() || $request->wantsJson()) {
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        // Untuk non-AJAX fallback
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return redirect()->back()->withErrors(['login' => 'Username atau Password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register()
    {
        $levels = LevelModel::select('level_id', 'level_nama')->get();
        return view('auth.register', compact('levels'));
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'level_id' => 'required|exists:m_level,level_id',
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama'     => 'required|string|max:100',
            'password' => 'required|min:6|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'msgField' => $validator->errors()
            ]);
        }

        $user = UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => $request->password, // diasumsikan sudah otomatis bcrypt di Model
        ]);

        Auth::login($user);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi Berhasil',
            'redirect' => url('/')
        ]);
    }
}