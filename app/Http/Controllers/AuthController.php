<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $pengguna = Pengguna::where('email', $credentials['email'])
            ->where('status_akun', 'aktif')
            ->first();

        // Cek apakah akun ditemukan dan password benar
        if (!$pengguna || !Hash::check($credentials['password'], $pengguna->kata_sandi)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
        }

        // Login pengguna
        Auth::login($pengguna);

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        // ADMIN
        if ($pengguna->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // PETUGAS
        if ($pengguna->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        }

        // MASYARAKAT
        if ($pengguna->role === 'masyarakat') {
            return redirect()->route('dashboard');
        }

        // Jika role tidak dikenali
        Auth::logout();

        return back()->withErrors([
            'email' => 'Role pengguna tidak dikenali.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}