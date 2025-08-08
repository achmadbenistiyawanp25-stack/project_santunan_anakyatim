<?php

namespace App\Http\Controllers;

use App\Models\RekapPenyalur;
use Illuminate\Http\Request;

class RekapPenyalurController extends Controller
{
    public function index()
    {
        $data = RekapPenyalur::with(['admin', 'relawan', 'user'])->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_admin' => 'required|exists:tabel_admin,id_admin',
            'id_relawan' => 'required|exists:tabel_relawan,id_relawan',
            'id_user' => 'required|exists:tabel_user,id_user',
            'tanggal' => 'required|date',
            'nama_anak' => 'required|string|max:100',
            'nominal' => 'required|numeric',
            'donasi_masuk' => 'required|numeric',
            'donasi_keluar' => 'required|numeric',
            'nama_penyalur' => 'required|string|max:100',
            'no_rekening' => 'required|string|max:30',
            'bukti_tasaruf' => 'required|string|max:255',
            'status' => 'required|in:berhasil,gagal',
        ]);

        $rekap = RekapPenyalur::create($validated);
        return response()->json($rekap, 201);
    }

    public function show($id)
    {
        $rekap = RekapPenyalur::with(['admin', 'relawan', 'user'])->findOrFail($id);
        return response()->json($rekap);
    }

    public function update(Request $request, $id)
    {
        $rekap = RekapPenyalur::findOrFail($id);

        $validated = $request->validate([
            'id_admin' => 'required|exists:tabel_admin,id_admin',
            'id_relawan' => 'required|exists:tabel_relawan,id_relawan',
            'id_user' => 'required|exists:tabel_user,id_user',
            'tanggal' => 'required|date',
            'nama_anak' => 'required|string|max:100',
            'nominal' => 'required|numeric',
            'donasi_masuk' => 'required|numeric',
            'donasi_keluar' => 'required|numeric',
            'nama_penyalur' => 'required|string|max:100',
            'no_rekening' => 'required|string|max:30',
            'bukti_tasaruf' => 'required|string|max:255',
            'status' => 'required|in:berhasil,gagal',
        ]);

        $rekap->update($validated);
        return response()->json($rekap);
    }

    public function destroy($id)
    {
        $rekap = RekapPenyalur::findOrFail($id);
        $rekap->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
