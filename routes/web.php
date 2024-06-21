<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Route;

// BEGIN Main Route | Guest 
Route::get('/', [Guests::class, 'index'])->name('guest.home');
Route::get('/tentangkami', [Guests::class, 'tentangKami'])->name('guest.tentangkami');
Route::get('/tentangkami#scrollspyHeading1', [Guests::class, 'tentangKami'])->name('guest.tentangkami.sejarah');
Route::get('/layanan', [Guests::class, 'layanan'])->name('guest.layanan');
Route::get('/berita', [Guests::class, 'berita'])->name('guest.berita');
Route::get('/modul', [Guests::class, 'modul'])->name('guest.modul');
Route::get('/kontak', [Guests::class, 'kontak'])->name('guest.kontak');
// END Main Route | Guest 

// BEGIN Get Data Route | Guest 
Route::get('/berita/{berita:slug}', [Guests::class, 'detailBerita']);
Route::get('/modul/{modul:slug}', [Guests::class, 'detailModul']);
// END Get Data Route | Guest 

// BEGIN Admin Route
Route::get('/login', [Admin::class, 'login'])->name('admin.login');
// END Admin Route

