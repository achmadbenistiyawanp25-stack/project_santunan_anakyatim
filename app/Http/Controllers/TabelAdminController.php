<?php

namespace App\Http\Controllers;

use App\Models\TabelAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TabelAdminController extends Controller
{
    public function index()
    {
        return response()->json(TabelAdmin::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tabel_admin,username',
            'password' => 'required|min:6',
        ]);

        $admin = TabelAdmin::create([
            'username' => trim($request->username),
            'password' => Hash::make($request->password),
            'status'   => 'aktif',
        ]);

        return response()->json([
            'message' => 'Admin berhasil ditambahkan',
            'data' => $admin
        ], 201);
    }

    public function show($id)
    {
        $admin = TabelAdmin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin tidak ditemukan'], 404);
        }
        return response()->json($admin);
    }

    public function update(Request $request, $id)
    {
        $admin = TabelAdmin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin tidak ditemukan'], 404);
        }

        $request->validate([
            'username' => 'sometimes|unique:tabel_admin,username,' . $id . ',id_admin',
            'password' => 'sometimes|min:6',
        ]);

        $admin->username = $request->username ?? $admin->username;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return response()->json([
            'message' => 'Admin berhasil diperbarui',
            'data' => $admin
        ]);
    }

    public function destroy($id)
    {
        $admin = TabelAdmin::find($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin tidak ditemukan'], 404);
        }
        $admin->delete();

        return response()->json(['message' => 'Admin berhasil dihapus']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = TabelAdmin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Login gagal. Username atau password salah.'
            ], 401);
        }

        // Perbarui waktu login terakhir
        $admin->terakhir_login = now();
        $admin->save();

        return response()->json([
            'message' => 'Login berhasil',
            'data' => $admin
        ]);
    }
}
