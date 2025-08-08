<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function __construct()
    {
        Dokumentasi::unguard();
    }

    public function index()
    {
        return response()->json(Dokumentasi::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'            => 'nullable|integer',
            'id_admin'           => 'nullable|integer',
            'id_relawan'         => 'nullable|integer',
            'jenis_dokumentasi'  => 'nullable|in:dokumentasi umum,dokumentasi urgensi',
            'tanggal'            => 'required|date',
            'tempat'             => 'required|string',
            'nominal'            => 'nullable|numeric',
            'upload_foto'        => 'nullable|string',
            'keterangan'         => 'nullable|string',
        ]);

        $data = Dokumentasi::create($request->all());

        return response()->json([
            'message' => 'Data dokumentasi berhasil disimpan.',
            'data' => $data
        ], 201);
    }

    public function show($id)
    {
        $data = Dokumentasi::where('id_dokumentasi', $id)->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Dokumentasi::where('id_dokumentasi', $id)->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $request->validate([
            'id_user'            => 'nullable|integer',
            'id_admin'           => 'nullable|integer',
            'id_relawan'         => 'nullable|integer',
            'jenis_dokumentasi'  => 'nullable|in:dokumentasi umum,dokumentasi urgensi',
            'tanggal'            => 'sometimes|required|date',
            'tempat'             => 'sometimes|required|string',
            'nominal'            => 'nullable|numeric',
            'upload_foto'        => 'nullable|string',
            'keterangan'         => 'nullable|string',
        ]);

        $data->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diperbarui.',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = Dokumentasi::where('id_dokumentasi', $id)->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
