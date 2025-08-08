<?php

namespace App\Http\Controllers;

use App\Models\KomentarArtikel;
use Illuminate\Http\Request;

class KomentarArtikelController extends Controller
{
    public function index()
    {
        return response()->json(KomentarArtikel::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_artikel' => 'required|exists:upload_artikel,id_artikel',
            'id_user' => 'required|exists:tabel_user,id_user',
            'tanggal' => 'required|date',
            'text' => 'required|string',
        ]);

        $komentar = KomentarArtikel::create($request->all());
        return response()->json($komentar, 201);
    }

    public function show($id)
    {
        $data = KomentarArtikel::find($id);
        return $data ? response()->json($data) : response()->json(['message' => 'Not Found'], 404);
    }

    public function update(Request $request, $id)
    {
        $data = KomentarArtikel::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $request->validate([
            'id_artikel' => 'sometimes|required|exists:upload_artikel,id_artikel',
            'id_user' => 'sometimes|required|exists:tabel_user,id_user',
            'tanggal' => 'sometimes|required|date',
            'text' => 'sometimes|required|string',
        ]);

        $data->update($request->all());
        return response()->json($data);
    }

    public function destroy($id)
    {
        $data = KomentarArtikel::find($id);
        if (!$data) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
