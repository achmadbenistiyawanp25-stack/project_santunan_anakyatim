<?php

namespace App\Http\Controllers;

use App\Models\PengajuanAnak;
use Illuminate\Http\Request;

class PengajuanAnakController extends Controller
{
    // Menampilkan semua data pengajuan anak
    public function index()
    {
        return response()->json(PengajuanAnak::all());
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'nullable|exists:tabel_user,id_user',
            'nama_anak' => 'required|string|max:100',
            'status' => 'required|in:anak yatim,anak piatu',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'nama_pendamping' => 'nullable|string|max:100',
            'nama_wali' => 'nullable|string|max:100',
            'foto_kk' => 'nullable|string|max:255',
            'surat_kematian' => 'nullable|string|max:255',
            'nama_pengaju' => 'nullable|string|max:100',
            'no_pengaju' => 'nullable|string|max:15',
        ]);

        $data = PengajuanAnak::create($validated);
        return response()->json($data, 201);
    }

    // Menampilkan detail pengajuan anak tertentu
    public function show($id)
    {
        $data = PengajuanAnak::find($id);
        return $data ? response()->json($data) : response()->json(['message' => 'Not Found'], 404);
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        $data = PengajuanAnak::find($id);
        if (!$data) return response()->json(['message' => 'Not Found'], 404);

        $validated = $request->validate([
            'id_user' => 'nullable|exists:tabel_user,id_user',
            'nama_anak' => 'sometimes|string|max:100',
            'status' => 'sometimes|in:anak yatim,anak piatu',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'sometimes|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'nama_pendamping' => 'nullable|string|max:100',
            'nama_wali' => 'nullable|string|max:100',
            'foto_kk' => 'nullable|string|max:255',
            'surat_kematian' => 'nullable|string|max:255',
            'nama_pengaju' => 'nullable|string|max:100',
            'no_pengaju' => 'nullable|string|max:15',
        ]);

        $data->update($validated);
        return response()->json($data);
    }

    // Menghapus data
    public function destroy($id)
    {
        $data = PengajuanAnak::find($id);
        if (!$data) return response()->json(['message' => 'Not Found'], 404);

        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
