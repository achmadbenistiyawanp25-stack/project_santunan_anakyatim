<?php

namespace App\Http\Controllers;

use App\Models\TabelRelawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TabelRelawanController extends Controller
{
    // Ambil semua data relawan
    public function index()
    {
        return response()->json(TabelRelawan::all(), 200);
    }

    // Tampilkan satu data berdasarkan ID
    public function show($id)
    {
        $relawan = TabelRelawan::find($id);
        if (!$relawan) {
            return response()->json(['message' => 'Relawan tidak ditemukan'], 404);
        }
        return response()->json($relawan, 200);
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100|unique:tabel_relawan,username',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $relawan = TabelRelawan::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Relawan berhasil ditambahkan', 'data' => $relawan], 201);
    }

    // Update data relawan
    public function update(Request $request, $id)
    {
        $relawan = TabelRelawan::find($id);
        if (!$relawan) {
            return response()->json(['message' => 'Relawan tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'username' => 'sometimes|required|string|max:100|unique:tabel_relawan,username,' . $id . ',id_relawan',
            'password' => 'nullable|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->filled('username')) {
            $relawan->username = $request->username;
        }

        if ($request->filled('password')) {
            $relawan->password = Hash::make($request->password);
        }

        $relawan->save();

        return response()->json(['message' => 'Relawan berhasil diupdate', 'data' => $relawan], 200);
    }

    // Hapus relawan
    public function destroy($id)
    {
        $relawan = TabelRelawan::find($id);
        if (!$relawan) {
            return response()->json(['message' => 'Relawan tidak ditemukan'], 404);
        }

        $relawan->delete();

        return response()->json(['message' => 'Relawan berhasil dihapus'], 200);
    }
}
