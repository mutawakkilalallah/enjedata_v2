<?php

use App\Http\Controllers\AdminPembayaran;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KosmaraController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'dashboard'])->middleware('auth');

Route::get('/person', [PersonController::class, 'index'])->middleware('auth');
Route::get('/person/{uuid}/detail', [PersonController::class, 'show'])->middleware('auth');
Route::get('/person/create', [PersonController::class, 'create'])->middleware('auth');
Route::post('/person/create', [PersonController::class, 'store'])->middleware('auth');
Route::get('/person/{uuid}/edit', [PersonController::class, 'edit'])->middleware('auth');
Route::put('/person/{uuid}/update', [PersonController::class, 'update'])->middleware('auth');

Route::get('/document/{kategory}', [DocumentController::class, 'viewAll'])->middleware('auth');
Route::get('/document/{uuid}/create', [DocumentController::class, 'create'])->middleware('auth');
Route::post('/document/{uuid}/create', [DocumentController::class, 'upload'])->middleware('auth');
Route::get('/document/{id}/delete', [DocumentController::class, 'delete'])->middleware('auth');
Route::get('/document/{id}/download', [DocumentController::class, 'download'])->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/user/create', [UserController::class, 'store'])->middleware('auth');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/user/{id}/update', [UserController::class, 'update'])->middleware('auth');
Route::put('/user/{id}/update-password', [UserController::class, 'updatePassword'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'auth']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/cities/{id}', [WilayahController::class, 'cities']);
Route::get('/districts/{id}', [WilayahController::class, 'districts']);
Route::get('/subdistricts/{id}', [WilayahController::class, 'subdistricts']);

Route::get('/lembaga', [LembagaController::class, 'index'])->middleware('auth');
Route::get('/lembaga/create', [LembagaController::class, 'create'])->middleware('auth');
Route::post('/lembaga/create', [LembagaController::class, 'store'])->middleware('auth');
Route::get('/lembaga/{id}/edit', [LembagaController::class, 'edit'])->middleware('auth');
Route::put('/lembaga/{id}/update', [LembagaController::class, 'update'])->middleware('auth');

Route::get('/kelas', [KelasController::class, 'index'])->middleware('auth');
Route::get('/kelas/create', [KelasController::class, 'create'])->middleware('auth');
Route::post('/kelas/create', [KelasController::class, 'store'])->middleware('auth');
Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->middleware('auth');
Route::put('/kelas/{id}/update', [KelasController::class, 'update'])->middleware('auth');
Route::get('/kelas/{id}', [KelasController::class, 'getKelas']);

Route::get('/pelajar', [PelajarController::class, 'index'])->middleware('auth');
Route::get('/pelajar/{uuid}/create', [PelajarController::class, 'create'])->middleware('auth');
Route::post('/pelajar/{uuid}/create', [PelajarController::class, 'store'])->middleware('auth');
Route::get('/pelajar/{id}/edit', [PelajarController::class, 'edit'])->middleware('auth');
Route::put('/pelajar/{id}/update', [PelajarController::class, 'update'])->middleware('auth');

Route::get('/wilayah', [AsramaController::class, 'index'])->middleware('auth');
Route::get('/wilayah/create', [AsramaController::class, 'create'])->middleware('auth');
Route::post('/wilayah/create', [AsramaController::class, 'store'])->middleware('auth');
Route::get('/wilayah/{id}/edit', [AsramaController::class, 'edit'])->middleware('auth');
Route::put('/wilayah/{id}/update', [AsramaController::class, 'update'])->middleware('auth');

Route::get('/kamar', [KamarController::class, 'index'])->middleware('auth');
Route::get('/kamar/create', [KamarController::class, 'create'])->middleware('auth');
Route::post('/kamar/create', [KamarController::class, 'store'])->middleware('auth');
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->middleware('auth');
Route::put('/kamar/{id}/update', [KamarController::class, 'update'])->middleware('auth');
Route::get('/kamar/{id}', [KamarController::class, 'getKamar']);

Route::get('/santri', [SantriController::class, 'index'])->middleware('auth');
Route::get('/santri/{uuid}/create', [SantriController::class, 'create'])->middleware('auth');
Route::post('/santri/{uuid}/create', [SantriController::class, 'store'])->middleware('auth');
Route::get('/santri/{id}/edit', [SantriController::class, 'edit'])->middleware('auth');
Route::put('/santri/{id}/update', [SantriController::class, 'update'])->middleware('auth');

Route::get('/jabatan', [JabatanController::class, 'index'])->middleware('auth');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->middleware('auth');
Route::post('/jabatan/create', [JabatanController::class, 'store'])->middleware('auth');
Route::get('/jabatan/{id}/edit', [JabatanController::class, 'edit'])->middleware('auth');
Route::put('/jabatan/{id}/update', [JabatanController::class, 'update'])->middleware('auth');

Route::get('/pengurus', [PengurusController::class, 'index'])->middleware('auth');
Route::get('/pengurus/{uuid}/create', [PengurusController::class, 'create'])->middleware('auth');
Route::post('/pengurus/{uuid}/create', [PengurusController::class, 'store'])->middleware('auth');
Route::get('/pengurus/{id}/edit', [PengurusController::class, 'edit'])->middleware('auth');
Route::put('/pengurus/{id}/update', [PengurusController::class, 'update'])->middleware('auth');

Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('auth');
Route::get('/karyawan/{uuid}/create', [KaryawanController::class, 'create'])->middleware('auth');
Route::post('/karyawan/{uuid}/create', [KaryawanController::class, 'store'])->middleware('auth');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->middleware('auth');
Route::put('/karyawan/{id}/update', [KaryawanController::class, 'update'])->middleware('auth');

Route::get('/walisantri', [KosmaraController::class, 'waliSantri']);
Route::get('/kosmara/{niup}/santri', [KosmaraController::class, 'santri']);
Route::get('/kosmara/{id}/bayar', [KosmaraController::class, 'bayar']);
Route::get('/kosmara/{id}/detail', [KosmaraController::class, 'detail']);
Route::get('/kosmara/{id}/cetak-pdf', [KosmaraController::class, 'cetakPDF']);
Route::post('/transaksi', [KosmaraController::class, 'transaksi']);

Route::get('/peserta-kosmara', [AdminPembayaran::class, 'pesertaKosmara']);
Route::get('/laporan-kosmara', [AdminPembayaran::class, 'laporanKosmara']);
Route::post('/peserta-kosmara/create', [AdminPembayaran::class, 'createPesertaKosmara']);
Route::get('/buat-tagihan/{uuid}', [AdminPembayaran::class, 'buatPembayaran']);
Route::post('/buat-tagihan/{uuid}', [AdminPembayaran::class, 'simpanPembayaran']);
Route::get('/pembayaran/{id}/hapus', [AdminPembayaran::class, 'deletePembayaran']);
Route::get('/pembayaran/{id}/lunas-manual', [AdminPembayaran::class, 'lunasManual']);
Route::put('/pembayaran/{id}/lunas-manual', [AdminPembayaran::class, 'lunas']);

Route::get('/invalid', function () {
  return view('invalid');
});
