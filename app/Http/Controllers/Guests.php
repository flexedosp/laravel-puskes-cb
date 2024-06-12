<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class Guests extends Controller
{

    // BEGIN Parent Function
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
$data['dataBerita'] = Berita::all();

        return view('guests.berita', $data);
    }

    public function kontak(){
        $data['titlePage'] = 'Kontak';
        $data['titleNav'] = 'Kontak';
        return view('guests.kontak', $data);
    }
    // END Parent Function


    // BEGIN Child Function
    public function detailBerita(Berita $berita){
        $data['titlePage'] = 'Detail Berita';
        $data['titleNav'] = 'Berita';
$data['dataBerita'] = $berita;
        // Data Berita

        // $dataBerita = Berita::find()
        // $data['judulBerita'] = 
        return view('guests.detailberita', $data);
    }

    public function detailModul($slug){
        $data['titlePage'] = 'Detail Modul';
        $data['titleNav'] = 'Modul';
        return view('guests.detailmodul', $data);
    }
    // END Child Function

}
