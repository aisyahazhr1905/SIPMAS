<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seksi;
use Illuminate\Http\Request;

class SeksiController extends Controller
{
    public function index()
    {
        $seksi = Seksi::latest('id_seksi')->get();

        return view('admin.seksi.index', compact('seksi'));
    }

    public function create()
    {
        return view('admin.seksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_seksi' => 'required|string|max:100',
            'penanggung_jawab' => 'required|string|max:100',
        ]);

        Seksi::create([
            'nama_seksi' => $request->nama_seksi,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()
            ->route('admin.seksi.index')
            ->with('success', 'Data seksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $seksi = Seksi::findOrFail($id);

        return view('admin.seksi.edit', compact('seksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_seksi' => 'required|string|max:100',
            'penanggung_jawab' => 'required|string|max:100',
        ]);

        $seksi = Seksi::findOrFail($id);

        $seksi->update([
            'nama_seksi' => $request->nama_seksi,
            'penanggung_jawab' => $request->penanggung_jawab,
        ]);

        return redirect()
            ->route('admin.seksi.index')
            ->with('success', 'Data seksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $seksi = Seksi::findOrFail($id);

        $seksi->delete();

        return redirect()
            ->route('admin.seksi.index')
            ->with('success', 'Data seksi berhasil dihapus.');
    }
}