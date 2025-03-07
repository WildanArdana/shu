<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ada file auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_anggota' => 'required|string',
            'no_anggota' => 'required|string',
        ]);

        // Cek apakah user ada
        $user = User::where('nama_anggota', $request->nama_anggota)
                    ->where('no_anggota', $request->no_anggota)
                    ->first();

        if ($user) {
            Auth::login($user);

            // Redirect berdasarkan role
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Nama anggota atau nomor anggota salah.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
