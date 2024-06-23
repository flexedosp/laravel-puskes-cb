<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Modul;
use Illuminate\Http\Request;

class Admin extends Controller
{
    // Main Section Admin
    public function index(){
        $data['titlePage'] = 'Admin Dashboard | Puskesmas Curugbitung';
        $data['titleNav'] ='dashboard';
        return view('admin.dashboard', $data);
    }


    public function berita(){
        $data['titlePage'] = 'Admin Berita | Puskesmas Curugbitung';
        $data['titleNav'] ='berita';
        return view('admin.berita', $data);
    }

    public function getAllBerita(){
        $dataBerita = Berita::all();

        return $dataBerita->toJson();
    }

    public function viewBerita(){

    }

    public function formCreateBerita(){

    }

    public function createBerita(){

    }

    public function formUpdateBerita(){

    }

    public function updateBerita(){

    }

    public function deleteBerita(){

    }

    public function modul(){
        $data['titlePage'] = 'Admin Modul | Puskesmas Curugbitung';
        $data['titleNav'] ='modul';
        return view('admin.modul', $data);
    }

    public function getAllModul(){
        $dataModul = Modul::all();

        return $dataModul->toJson();
    }

    public function viewModul(){

    }

    public function formCreateModul(){

    }

    public function createModul(){

    }

    public function formUpdateModul(){

    }

    public function updateModul(){

    }

    public function deleteModul(){

    }

    public function adminMember(){
        $data['titlePage'] = 'Admin Member | Puskesmas Curugbitung';
        $data['titleNav'] ='dashboard';
        return view('admin.dashboard', $data);
    }

    public function getAllAdminMember(){

    }

    public function viewAdminMember(){

    }

    public function formCreateAdminMember(){

    }

    public function createAdminMember(){

    }

    public function formUpdateAdminMember(){

    }

    public function updateAdminMember(){

    }

    public function deleteAdminMember(){

    }

}
