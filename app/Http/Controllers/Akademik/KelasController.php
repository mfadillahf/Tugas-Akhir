<?php

namespace App\Http\Controllers\Akademik;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        
        $kelas = Kelas::all();
        return view('Akademik.Kelas', compact('kelas'));
    }

    public function create()
    {
        return view('Akademik.KelasCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|max:10'
        ]);

        Kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('Akademik.KelasEdit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|max:10'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
