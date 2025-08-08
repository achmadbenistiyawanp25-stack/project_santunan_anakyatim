<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiController extends Controller {
    // GET /api/notifikasi
    public function index() {
        return Notifikasi::with('user')->get();
    }

    // POST /api/notifikasi
    public function store(Request $request) {
        $validated = $request->validate([
            'id_user' => 'nullable|exists:tabel_user,id_user',
            'judul' => 'nullable|string|max:255',
            'isi' => 'nullable|string',
            'status' => 'in:terbaca,belum terbaca',
            'waktu' => 'nullable|date',
        ]);

        $notifikasi = Notifikasi::create($validated);
        return response()->json($notifikasi, 201);
    }

    // GET /api/notifikasi/{id}
    public function show($id) {
        $notifikasi = Notifikasi::with('user')->findOrFail($id);
        return response()->json($notifikasi);
    }

    // PUT /api/notifikasi/{id}
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'id_user' => 'nullable|exists:tabel_user,id_user',
            'judul' => 'nullable|string|max:255',
            'isi' => 'nullable|string',
            'status' => 'in:terbaca,belum terbaca',
            'waktu' => 'nullable|date',
        ]);

        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->update($validated);

        return response()->json($notifikasi);
    }

    // DELETE /api/notifikasi/{id}
    public function destroy($id) {
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->delete();

        return response()->json(['message' => 'Notifikasi dihapus.']);
    }
}
