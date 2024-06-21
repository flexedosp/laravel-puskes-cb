<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Modul;
use Illuminate\Http\Request;

class Guests extends Controller
{

    // BEGIN Parent Function
    public function index()
    {

        $data['titlePage'] = 'Puskesmas Curugbitung | Website Official';
        $data['titleNav'] = 'Beranda';

        $data['dataBerita'] = Berita::orderBy('id', 'asc')->take(3)->get();
        $data['dataModul'] = Modul::orderBy('id', 'asc')->take(2)->get();

        $data['titleCard'] = 'Modul Asuh Anak';
        $data['isiCard'] = 'Modul tentang cara pengasuhan anak yang baik. Modul ini penting dipelajari oleh para orang tua.';
        return view('guests.home', $data);
    }

    public function tentangKami()
    {
        $data['titlePage'] = 'Tentang Kami | Puskesmas Curugbitung';
        $data['titleNav'] = 'Tentang Kami';
        return view('guests.tentangKami', $data);
    }

    public function layanan()
    {
        $data['titlePage'] = 'Layanan | Puskesmas Curugbitung';
        $data['titleNav'] = 'Layanan';
        return view('guests.layanan', $data);
    }

    public function modul()
    {
        $data['titlePage'] = 'Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'Modul';
        $data['dataModul'] = Modul::all();
        return view('guests.modul', $data);
    }

    public function berita()
    {
        $data['titlePage'] = 'Berita | Puskesmas Curugbitung';
        $data['titleNav'] = 'Berita';
        $data['dataBerita'] = Berita::all();

        return view('guests.berita', $data);
    }

    public function kontak()
    {
        $data['titlePage'] = 'Kontak | Puskesmas Curugbitung';
        $data['titleNav'] = 'Kontak';
        return view('guests.kontak', $data);
    }
    // END Parent Function


    // BEGIN Child Function
    public function detailBerita(Berita $berita)
    {
        $data['titlePage'] = 'Detail Berita | Puskesmas Curugbitung';
        $data['titleNav'] = 'Berita';
        $data['dataBerita'] = $berita;
        return view('guests.detailberita', $data);
    }

    public function detailModul(Modul $modul)
    {
        $data['titlePage'] = 'Detail Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'Modul';
        $data['dataModul'] = $modul;
        return view('guests.detailmodul', $data);
    }
    // END Child Function

}
