<?php

namespace App\Http\Controllers;

use App\Models\TbDonasi;
use Illuminate\Http\Request;

class TbDonasiController extends Controller
{
    public function index()
    {
        return response()->json(TbDonasi::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user'      => 'nullable|exists:tabel_user,id_user',
            'nama_donasi'  => 'nullable|string|max:100',
            'tanggal'      => 'nullable|date',
            'nominal'      => 'required|numeric',
            'metode'       => 'required|in:Y,N',
            'jenis_donasi' => 'required|in:anak yatim,anak piatu',
            'status'       => 'required|in:berhasil,gagal',
            'pesan'        => 'nullable|string',
        ]);

        $donasi = TbDonasi::create($validated);

        return response()->json([
            'message' => 'Donasi berhasil ditambahkan.',
            'data' => $donasi
        ], 201);
    }

    public function show($id)
    {
        $donasi = TbDonasi::find($id);

        if (!$donasi) {
            return response()->json(['message' => 'Data donasi tidak ditemukan.'], 404);
        }

        return response()->json($donasi);
    }

    public function update(Request $request, $id)
    {
        $donasi = TbDonasi::find($id);

        if (!$donasi) {
            return response()->json(['message' => 'Data donasi tidak ditemukan.'], 404);
        }

        $validated = $request->validate([
            'id_user'      => 'nullable|exists:tabel_user,id_user',
            'nama_donasi'  => 'nullable|string|max:100',
            'tanggal'      => 'nullable|date',
            'nominal'      => 'nullable|numeric',
            'metode'       => 'nullable|in:Y,N',
            'jenis_donasi' => 'nullable|in:anak yatim,anak piatu',
            'status'       => 'nullable|in:berhasil,gagal',
            'pesan'        => 'nullable|string',
        ]);

        $donasi->update($validated);

        return response()->json([
            'message' => 'Data donasi berhasil diperbarui.',
            'data' => $donasi
        ]);
    }

    public function destroy($id)
    {
        $donasi = TbDonasi::find($id);

        if (!$donasi) {
            return response()->json(['message' => 'Data donasi tidak ditemukan.'], 404);
        }

        $donasi->delete();

        return response()->json(['message' => 'Donasi berhasil dihapus.']);
    }
}
