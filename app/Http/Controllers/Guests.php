<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guests extends Controller
{

    // Parent Function
    public function index(){
        $data['titlePage'] = 'Beranda';
        $data['titleNav'] = 'Beranda';
        $data['titleCard'] = 'Modul Asuh Anak';
        $data['isiCard'] ='Modul tentang cara pengasuhan anak yang baik. Modul ini penting dipelajari oleh para orang tua.';
        return view('guests.home', $data);
    }

    public function tentangKami(){
        $data['titlePage'] = 'Tentang Kami';
        $data['titleNav'] = 'Tentang Kami';
        return view('guests.tentangKami', $data);
    }

    public function layanan(){
        $data['titlePage'] = 'Layanan';
        $data['titleNav'] = 'Layanan';
        return view('guests.layanan', $data);
    }

    public function modul(){
        $data['titlePage'] = 'Modul';
        $data['titleNav'] = 'Modul';
        return view('guests.modul', $data);
    }

    public function berita(){
        $data['titlePage'] = 'Berita';
        $data['titleNav'] = 'Berita';
        return view('guests.berita', $data);
    }

    public function kontak(){
        $data['titlePage'] = 'Kontak';
        $data['titleNav'] = 'Kontak';
        return view('guests.kontak', $data);
    }

    // Child Function
    public function detailBerita(){
        $data['titlePage'] = 'Detail Berita';
        $data['titleNav'] = 'Berita';
        return view('guests.kontak', $data);
    }
}
