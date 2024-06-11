<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Route;

Route::get('/', [Guests::class, 'index']);
Route::get('/tentangkami', [Guests::class, 'tentangKami']);
Route::get('/layanan', [Guests::class, 'layanan']);
Route::get('/modul', [Guests::class, 'modul']);
Route::get('/kontak', [Guests::class, 'kontak']);
Route::get('/login', [Admin::class, 'login']);

