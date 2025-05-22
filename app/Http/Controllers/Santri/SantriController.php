<?php

namespace App\Http\Controllers\Santri;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SantriController extends Controller
{
    public function index()
    {
        // $santri = Santri::with('kelas')->get();
        // return view('Santri.santri', compact('santri'));
        return view('Santri.Santri');
    }

    public function create()
    {
        $users = User::all();
        $kelas = Kelas::all();
        return view('Santri.SantriCreate', compact('users', 'kelas'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_user' => 'required',
    //         'id_kelas' => 'required',
    //         'nama_lengkap' => 'required',
    //         'nama_panggil' => 'required',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required',
    //         'no_telepon' => 'nullable',
    //         'email' => 'nullable|email',
    //         'jenis_kelamin' => 'required|in:L,P',
    //         'pendidikan_asal' => 'required',
    //         'nama_ayah' => 'required',
    //         'pekerjaan_ayah' => 'required',
    //         'no_hp_ayah' => 'required',
    //         'nama_ibu' => 'required',
    //         'pekerjaan_ibu' => 'required',
    //         'no_hp_ibu' => 'required',
    //     ]);

    //     Santri::create([
    //         ...$request->all(),
    //         'status' => 'santri'
    //     ]);

    //     return redirect()->route('santri.santri')->with('success', 'Data santri berhasil ditambahkan.');
    // }

    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);

        $validated = $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_kelas' => 'required|exists:kelas,id',
            'nama_lengkap' => 'required|string|max:50',
            'nama_panggil' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:14',
            'email' => 'required|email|max:50',
            'jenis_kelamin' => 'required|string|max:10',
            'status' => 'required|string|max:10',
            'pendidikan_asal' => 'required|string|max:50',
            'nama_ayah' => 'required|string|max:50',
            'pekerjaan_ayah' => 'required|string|max:30',
            'no_hp_ayah' => 'required|string|max:14',
            'nama_ibu' => 'required|string|max:50',
            'pekerjaan_ibu' => 'required|string|max:30',
            'no_hp_ibu' => 'required|string|max:14',
        ]);

        $santri->update($validated);

        return redirect()->route('santri')->with('success', 'Santri berhasil diupdate.');
    }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        $users = User::all();
        $kelas = Kelas::all();
        return view('Santri.SantriEdit', compact('santri', 'users', 'kelas'));
    }

    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri')->with('success', 'Santri berhasil dihapus.');
    }
}
