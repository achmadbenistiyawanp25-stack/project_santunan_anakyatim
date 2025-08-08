<?php

namespace App\Http\Controllers;

use App\Models\UploadArtikel;
use Illuminate\Http\Request;

class UploadArtikelController extends Controller
{
    public function index()
    {
        $data = UploadArtikel::all();
        return response()->json([
            'status' => true,
            'message' => 'Data artikel berhasil diambil',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'nullable|numeric|exists:tabel_admin,id_admin',
            'foto' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'jenis' => 'nullable|in:umum,urgensi',
            'tanggal' => 'nullable|date',
            'dana_terkumpul' => 'nullable|integer|min:0',
            'target_dana' => 'nullable|integer|min:0',
        ]);

        $data = UploadArtikel::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function show($id)
    {
        $data = UploadArtikel::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data artikel ditemukan',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = UploadArtikel::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'id_admin' => 'nullable|numeric|exists:tabel_admin,id_admin',
            'foto' => 'nullable|string|max:255',
            'text' => 'nullable|string',
            'jenis' => 'nullable|in:umum,urgensi',
            'tanggal' => 'nullable|date',
            'dana_terkumpul' => 'nullable|integer|min:0',
            'target_dana' => 'nullable|integer|min:0',
        ]);

        $data->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil diperbarui',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = UploadArtikel::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Artikel tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Artikel berhasil dihapus'
        ]);
    }
}
