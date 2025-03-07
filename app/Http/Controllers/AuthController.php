<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shu;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string',
            'no_anggota' => 'required|string',
        ]);

        $nama_input = strtolower(trim($request->input('nama_anggota')));
        $no_anggota = strtolower(trim($request->input('no_anggota')));

        // Cek admin berdasarkan nama depan atau nama lengkap dan no anggota
        $admin = User::whereRaw("LOWER(TRIM(no_anggota)) = ?", [$no_anggota])
                    ->where(function ($query) use ($nama_input) {
                        $query->whereRaw("LOWER(TRIM(nama_anggota)) LIKE ?", ["$nama_input%"])
                              ->orWhereRaw("LOWER(TRIM(nama_anggota)) = ?", [$nama_input]);
                    })
                    ->first();
        
        // Cek anggota berdasarkan nama depan atau nama lengkap dan no anggota
        $anggota = Shu::whereRaw("LOWER(TRIM(no_anggota)) = ?", [$no_anggota])
                    ->where(function ($query) use ($nama_input) {
                        $query->whereRaw("LOWER(TRIM(nama_anggota)) LIKE ?", ["$nama_input%"])
                              ->orWhereRaw("LOWER(TRIM(nama_anggota)) = ?", [$nama_input]);
                    })
                    ->first();

        if ($admin) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashboard.admin');
        }

        if ($anggota) {
            Auth::guard('anggota')->login($anggota);
            return redirect()->route('dashboard.anggota');
        }

        return back()->withErrors(['error' => 'Nama anggota atau nomor anggota salah.']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('anggota')->check()) {
            Auth::guard('anggota')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
