<?php

namespace App\Http\Controllers;

use App\Models\LaporanDonasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaporanDonasiController extends Controller
{
    // public function index()
    // {

    //     return response()->json(LaporanDonasi::all());
    // }

    public function index()
{
    $laporan = LaporanDonasi::all();

    $totalDonasi = $laporan->sum('total_donasi');
    $jumlahAnak = $laporan->sum('jumlah_anak');
    $jumlahPenyalur = $laporan->sum('jumlah_penyalur');

    $grafikDonasi = $laporan
        ->groupBy(function ($item) {
            return Carbon::parse($item->waktu)->format('F');
        })
        ->map(function ($group) {
            return [
                'jumlah' => $group->sum('total_donasi'),
            ];
        })
        ->map(function ($item, $key) {
            return [
                'bulan' => $key,
                'jumlah' => $item['jumlah'],
            ];
        })
        ->values();

    return response()->json([
        'totalDonasi' => $totalDonasi,
        'jumlahAnak' => $jumlahAnak,
        'jumlahPenyalur' => $jumlahPenyalur,
        'grafikDonasi' => $grafikDonasi,
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|exists:tabel_admin,id_admin',
            'id_relawan' => 'required|exists:tabel_relawan,id_relawan',
            'total_donasi' => 'required|numeric',
            'jumlah_anak' => 'required|integer',
            'jumlah_penyalur' => 'required|integer',
        ]);

        $laporan = LaporanDonasi::create($request->all());

        return response()->json($laporan, 201);
    }

    public function show($id)
    {
        $data = LaporanDonasi::find($id);
        return $data ? response()->json($data) : response()->json(['message' => 'Not Found'], 404);
    }

    public function update(Request $request, $id)
    {
        $data = LaporanDonasi::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $request->validate([
            'id_admin' => 'sometimes|required|exists:tabel_admin,id_admin',
            'id_relawan' => 'sometimes|required|exists:tabel_relawan,id_relawan',
            'total_donasi' => 'sometimes|required|numeric',
            'jumlah_anak' => 'sometimes|required|integer',
            'jumlah_penyalur' => 'sometimes|required|integer',
        ]);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = LaporanDonasi::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }

    public function filterByMonth(Request $request)
    {
        $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000',
        ]);

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data = LaporanDonasi::whereMonth('waktu', $bulan)
            ->whereYear('waktu', $tahun)
            ->get();

        return response()->json($data);
    }
}
