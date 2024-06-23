<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Route;

// BEGIN Main Route | Guest 
Route::get('/', [Guests::class, 'index'])->name('guest.home');

// BEGIN Tentang Kami
Route::get('/tentangkami', [Guests::class, 'tentangKami'])->name('guest.tentangkami');
Route::get('/tentangkami#KepalaPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.kepalapuskes');
Route::get('/tentangkami#SejarahPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.sejarah');
Route::get('/tentangkami#VisiDanMisi', [Guests::class, 'tentangKami'])->name('guest.tentangkami.visidanmisi');
Route::get('/tentangkami#NilaiDanSlogan', [Guests::class, 'tentangKami'])->name('guest.tentangkami.nilaidanslogan');
Route::get('/tentangkami#TenagaPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.tenagapuskesmas');
Route::get('/tentangkami#TinjauFasilitas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.tinjaufasilitas');
// END Tentang Kami

Route::get('/layanan', [Guests::class, 'layanan'])->name('guest.layanan');
Route::match(['get', 'post'], '/berita', [Guests::class, 'berita'])->name('guest.berita');
Route::match(['get', 'post'], '/modul', [Guests::class, 'modul'])->name('guest.modul');
Route::get('/kontak', [Guests::class, 'kontak'])->name('guest.kontak');
Route::get('/feedbackpasien', [Guests::class, 'feedback'])->name('guest.feedback');
// END Main Route | Guest 

// BEGIN Get Data Route | Guest 
Route::get('/berita/{berita:slug}', [Guests::class, 'detailBerita']);
Route::get('/modul/{modul:slug}', [Guests::class, 'detailModul']);
// END Get Data Route | Guest 

// BEGIN Authentication
Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login')->middleware('isAdminActive');
Route::post('/admin-login', [AuthController::class, 'authenticate'])->name('admin.check');
Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');
// END Authentication

// BEGIN Admin Route
Route::middleware('isAdmin')->group(function () {
    Route::get('/admin-dashboard', [Admin::class, 'index'])->name('admin.home');
    Route::get('/admin-berita', [Admin::class, 'berita'])->name('admin.berita');
    Route::get('/admin-modul', [Admin::class, 'modul'])->name('admin.modul');
    Route::get('/admin-member', [Admin::class, 'adminMember'])->name('admin.member');


    Route::get('/data-berita', [Admin::class, 'getAllBerita'])->name('data.berita');
    Route::get('/data-modul', [Admin::class, 'getAllModul'])->name('data.modul');
});
// END Admin Route
