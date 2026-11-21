<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required|in:warga,petugas,lurah,admin',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CARI AKUN
        |--------------------------------------------------------------------------
        |
        | Bisa login menggunakan:
        | - Email
        | - NIK
        |
        */

        $pengguna = Pengguna::where(function ($query) use ($credentials) {

            $query->where('email', $credentials['email'])
                  ->orWhere('nik', $credentials['email']);

        })
        ->where('role', $credentials['role'])
        ->where('status_akun', 'aktif')
        ->first();


        /*
        |--------------------------------------------------------------------------
        | CEK AKUN DAN PASSWORD
        |--------------------------------------------------------------------------
        */

        if (
            !$pengguna ||
            !Hash::check(
                $credentials['password'],
                $pengguna->kata_sandi
            )
        ) {

            return back()
                ->withErrors([
                    'email' => 'Akun, password, atau role yang dipilih tidak sesuai.',
                ])
                ->withInput();

        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN
        |--------------------------------------------------------------------------
        */

        Auth::login(
            $pengguna,
            $request->boolean('remember')
        );

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT SESUAI ROLE
        |--------------------------------------------------------------------------
        */

        // ADMIN
        if ($pengguna->role === 'admin') {

            return redirect()->route('admin.dashboard');

        }


        // PETUGAS
        if ($pengguna->role === 'petugas') {

            return redirect()->route('petugas.dashboard');

        }


        // WARGA
        if ($pengguna->role === 'warga') {

            return redirect()->route('warga.dashboard');

        }


        // LURAH
        if ($pengguna->role === 'lurah') {

            return redirect()->route('lurah.dashboard');

        }


        /*
        |--------------------------------------------------------------------------
        | JIKA ROLE TIDAK DIKENALI
        |--------------------------------------------------------------------------
        */

        Auth::logout();

        return back()
            ->withErrors([
                'email' => 'Role pengguna tidak dikenali.',
            ])
            ->withInput();
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}