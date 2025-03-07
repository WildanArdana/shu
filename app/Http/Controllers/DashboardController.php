<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shu;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $data = Shu::all();
        } elseif (Auth::guard('anggota')->check()) {
            $data = Shu::where('no_anggota', Auth::guard('anggota')->user()->no_anggota)->get();
        }

        return view('dashboard', compact('data'));
    }
}
