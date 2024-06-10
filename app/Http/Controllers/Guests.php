<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guests extends Controller
{
    public function index(){
        $data['titlePage'] = 'Beranda';
        return view('guests.home', $data);
    }

    public function tentangKami(){
        $data['titlePage'] = 'Tentang Kami';
        return view('guests.home', $data);
    }

    public function layanan(){
        $data['titlePage'] = 'Layanan';
        return view('guests.home', $data);
    }

    public function modul(){
        $data['titlePage'] = 'Modul';
        return view('guests.home', $data);
    }

    public function kontak(){
        $data['titlePage'] = 'Kontak';
        return view('guests.home', $data);
    }
}
