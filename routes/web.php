<?php

use App\Models\Room;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DurasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisKamarController;
use App\Http\Controllers\JumlahKamarController;
use App\Http\Controllers\KeuanganController;

Route::get('/',[HomepageController::class,'index']);

// Other Layouts
Route::get('/login',[LoginController::class,'index'])->name('login')->Middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/register',[RegisterController::class,'index'])->Middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/sewa-{id}',[SewaController::class,'index'])->Middleware('auth');
Route::post('/sewa',[SewaController::class,'store']);

// Admin Layouts Start
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/admin',[BerandaController::class,'index'])->middleware('admin');

// Penghuni
Route::get('/penghuni',[PenghuniController::class,'index'])->middleware('admin');
Route::get('/penghuni/review-{id}',[PenghuniController::class,'showDataWaiting'])->middleware('admin');
Route::get('/penghuni/extend-{id}',[PenghuniController::class,'showDataExtend'])->middleware('admin');
Route::get('/penghuni/perpanjang-{id}-diterima',[PenghuniController::class,'addExtend'])->middleware('admin');
Route::get('/penghuni/perpanjang-{id}-ditolak',[PenghuniController::class,'rejectExtend'])->middleware('admin');
Route::get('/penghuni/sewa-{id}-diterima',[PenghuniController::class,'addTenant'])->middleware('admin');
Route::get('/penghuni/sewa-{id}-ditolak',[PenghuniController::class,'rejectTenant'])->middleware('admin');

// Jenis Kamar
Route::get('/jnsKamar',[JenisKamarController::class,'index'])->middleware('admin');
Route::get('/jnsKamar/tambah-kategori',[JenisKamarController::class,'showFormTambah'])->middleware('admin');
Route::get('/jnsKamar/edit-kategori-{category}',[JenisKamarController::class,'showFormEdit'])->middleware('admin');

Route::post('/jnsKamar/tambah-kategori',[JenisKamarController::class,'store'])->middleware('admin');
Route::post('/jnsKamar/edit-kategori-{category}',[JenisKamarController::class,'update'])->middleware('admin');
Route::delete('/jnsKamar/delete-kategori-{category}', [JenisKamarController::class, 'destroy'])->middleware('admin');

// Jumlah Kamar
Route::get('/jmlhKamar',[JumlahKamarController::class,'index'])->middleware('admin');
Route::get('/jmlhKamar/tambah-kamar',[JumlahKamarController::class,'showFormTambah'])->middleware('admin');
Route::get('/jmlhKamar/edit-kamar-{room}',[JumlahKamarController::class,'showFormEdit'])->middleware('admin');

Route::post('/jmlhKamar/tambah-kamar',[JumlahKamarController::class,'store'])->middleware('admin');
Route::post('/jmlhKamar/edit-kamar-{room}',[JumlahKamarController::class,'update'])->middleware('admin');
Route::get('/jmlhKamar/delete-kamar-{room}',[JumlahKamarController::class,'destroy'])->middleware('admin');

// Keuangan
Route::get('/keuangan',[KeuanganController::class,'index'])->middleware('admin');
Route::get('/generate-pdf',[KeuanganController::class,'generatePDF'])->middleware('admin');

// Admin Layouts End

// User Layouts
Route::get('/user',[ProfilController::class, 'index'])->middleware('user');
Route::get('/keluhan',[KeluhanController::class,'index'])->middleware('user');

Route::get('/durasi',[DurasiController::class,'index'])->middleware('user');
Route::get('/durasi/perpanjang',[DurasiController::class,'showFormPerpanjang'])->middleware('user');
Route::post('/perpanjang',[DurasiController::class,'perpanjangSewa'])->Middleware('user');
