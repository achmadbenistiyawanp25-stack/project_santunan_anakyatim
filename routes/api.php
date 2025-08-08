<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TabelAdminController;
use App\Http\Controllers\TabelUserController;
use App\Http\Controllers\TabelRelawanController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\UploadArtikelController;
use App\Http\Controllers\KomentarArtikelController;
use App\Http\Controllers\LaporanDonasiController;
use App\Http\Controllers\PengajuanAnakController;
use App\Http\Controllers\TbDonasiController;
use App\Http\Controllers\Api\AdminLoginController;
use App\Http\Controllers\RekapPenyalurController;
use App\Http\Controllers\NotifikasiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/admin/login', [AdminLoginController::class, 'login']);
// Route::middleware('auth:sanctum')->post('/admin/logout', [AdminLoginController::class, 'logout']);


// Route RESTful API Resources
Route::apiResource('admin', TabelAdminController::class);
Route::apiResource('user', TabelUserController::class);
Route::apiResource('relawan', TabelRelawanController::class);
Route::apiResource('anak', DataAnakController::class);
Route::apiResource('dokumentasi', DokumentasiController::class);
Route::apiResource('artikel', UploadArtikelController::class);
Route::apiResource('komentar', KomentarArtikelController::class);
Route::apiResource('laporan-donasi', LaporanDonasiController::class);
Route::apiResource('pengajuan-anak', PengajuanAnakController::class);
Route::apiResource('donasi', TbDonasiController::class);
Route::apiResource('rekap-penyalur', RekapPenyalurController::class);
Route::apiResource('notifikasi', NotifikasiController::class);
