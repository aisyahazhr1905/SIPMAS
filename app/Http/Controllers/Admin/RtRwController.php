<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RtRw;
use Illuminate\Http\Request;

class RtRwController extends Controller
{
    public function index()
    {
        $rtRw = RtRw::latest('id_rt_rw')->get();

        return view('admin.rt_rw.index', compact('rtRw'));
    }

    public function create()
    {
        return view('admin.rt_rw.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rt' => 'required|string|max:5',
            'no_rw' => 'required|string|max:5',
            'nama_ketua' => 'required|string|max:100',
        ]);

        RtRw::create([
            'no_rt' => $request->no_rt,
            'no_rw' => $request->no_rw,
            'nama_ketua' => $request->nama_ketua,
        ]);

        return redirect()
            ->route('admin.rt_rw.index')
            ->with('success', 'Data RT/RW berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rtRw = RtRw::findOrFail($id);

        return view('admin.rt_rw.edit', compact('rtRw'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rt' => 'required|string|max:5',
            'no_rw' => 'required|string|max:5',
            'nama_ketua' => 'required|string|max:100',
        ]);

        $rtRw = RtRw::findOrFail($id);

        $rtRw->update([
            'no_rt' => $request->no_rt,
            'no_rw' => $request->no_rw,
            'nama_ketua' => $request->nama_ketua,
        ]);

        return redirect()
            ->route('admin.rt_rw.index')
            ->with('success', 'Data RT/RW berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rtRw = RtRw::findOrFail($id);

        $rtRw->delete();

        return redirect()
            ->route('admin.rt_rw.index')
            ->with('success', 'Data RT/RW berhasil dihapus.');
    }
}