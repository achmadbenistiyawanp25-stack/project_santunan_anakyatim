<?php

namespace App\Http\Controllers;

use App\Models\DataAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DataAnakController extends Controller
{
    public function index()
    {
        try {
            $data = DataAnak::all()->map(function ($item) {
                $item->foto_kk = $item->foto_kk ?? 'Belum diunggah';
                $item->surat_kematian = $item->surat_kematian ?? 'Belum diunggah';
                $item->status = $item->status ?? 'Tidak diketahui';
                $item->no_rekening = $item->no_rekening ?? 'Belum ada';
                $item->nama_pengaju = $item->nama_pengaju ?? 'Belum diisi';
                $item->no_pengaju = $item->no_pengaju ?? 'Belum diisi';

                $item->created_at = optional($item->created_at)->format('d-m-Y H:i');
                $item->updated_at = optional($item->updated_at)->format('d-m-Y H:i');

                return $item;
            });

            return response()->json([
                'status' => true,
                'message' => 'Data anak berhasil diambil',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            Log::error('Gagal memuat data anak: ' . $th->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Gagal memuat data anak: ' . $th->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'tempat_tanggallahir' => 'nullable|string|max:100',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'asal_sekolah' => 'nullable|string|max:255',
            'nama_pendamping' => 'nullable|string|max:100',
            'nama_wali' => 'nullable|string|max:100',
            'foto_kk' => 'nullable|string|max:255',
            'surat_kematian' => 'nullable|string|max:255',
            'status' => 'nullable|in:anak yatim,anak piatu',
            'nama_pengaju' => 'nullable|string|max:100',
            'no_pengaju' => 'nullable|string|max:15',
            'no_rekening' => 'nullable|string|max:20',
        ]);

        $data = $request->only([
            'nama_lengkap',
            'tempat_tanggallahir',
            'jenis_kelamin',
            'alamat',
            'asal_sekolah',
            'nama_pendamping',
            'nama_wali',
            'foto_kk',
            'surat_kematian',
            'status',
            'nama_pengaju',
            'no_pengaju',
            'no_rekening',
        ]);

        $data['id_admin'] = $request->input('id_admin');
        $data['id_relawan'] = $request->input('id_relawan');
        $data['id_pengaju'] = $request->input('id_pengaju');

        $created = DataAnak::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Data anak berhasil ditambahkan',
            'data' => $created
        ], 201);
    }

    public function show($id)
    {
        $data = DataAnak::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data anak tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail data anak ditemukan',
            'data' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = DataAnak::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data anak tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama_lengkap' => 'sometimes|required|string|max:100',
            'jenis_kelamin' => 'sometimes|required|in:laki-laki,perempuan',
        ]);

        $data->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data anak berhasil diperbarui',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = DataAnak::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data anak tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data anak berhasil dihapus'
        ]);
    }
}
