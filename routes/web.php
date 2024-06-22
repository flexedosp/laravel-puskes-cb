<?php

use App\Http\Controllers\Admin;
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
Route::match(['get', 'post'],'/berita', [Guests::class, 'berita'])->name('guest.berita');
Route::match(['get', 'post'],'/modul', [Guests::class, 'modul'])->name('guest.modul');
Route::get('/kontak', [Guests::class, 'kontak'])->name('guest.kontak');
Route::get('/feedbackpasien',[Guests::class, 'feedback'])->name('guest.feedback');
// END Main Route | Guest 

// BEGIN Get Data Route | Guest 
Route::get('/berita/{berita:slug}', [Guests::class, 'detailBerita']);
Route::get('/modul/{modul:slug}', [Guests::class, 'detailModul']);
// END Get Data Route | Guest 

// BEGIN Admin Route
Route::get('/login', [Admin::class, 'login'])->name('admin.login');
// END Admin Route

