<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;

class Admin extends Controller
{
    // Main Section Admin
    public function index()
    {
        $data['titlePage'] = 'Admin Dashboard | Puskesmas Curugbitung';
        $data['titleNav'] = 'dashboard';
        return view('admin.dashboard', $data);
    }


    public function berita()
    {
        $data['titlePage'] = 'Admin Berita | Puskesmas Curugbitung';
        $data['titleNav'] = 'berita';
        return view('admin.berita-admin', $data);
    }

    public function getAllBerita()
    {
        $dataBerita = Berita::all()->toArray();
        foreach ($dataBerita as $index => &$berita) {
            $berita['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($dataBerita)->make(true);
    }

    public function viewBerita(Request $request)
    {
        $id = $request->id;
    $dataBerita = Berita::find($id);

    if (!$dataBerita) {
        return response()->json(['message' => 'Berita not found'], 404);
    }

    return response()->json($dataBerita);;
    }

    public function formCreateBerita()
    {
    }

    public function createBerita(Request $request)
    {

    }

    public function formUpdateBerita()
    {
    }

    public function updateBerita()
    {
    }

    public function deleteBerita()
    {
    }

    public function modul()
    {
        $data['titlePage'] = 'Admin Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'modul';
        return view('admin.modul-admin', $data);
    }

    public function getAllModul()
    {
        $dataModul = Modul::all()->toArray();
        foreach ($dataModul as $index => &$modul) {
            $modul['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($dataModul)->make(true);
    }

    public function viewModul(Request $request)
    {
        $id = $request->id;
        $dataModul = Modul::find($id);
    
        if (!$dataModul) {
            return response()->json(['message' => 'Modul not found'], 404);
        }
    
        return response()->json($dataModul);;
    }

    public function formCreateModul()
    {
    }

    public function createModul()
    {
    }

    public function formUpdateModul()
    {
    }

    public function updateModul()
    {
    }

    public function deleteModul()
    {
    }

    public function adminMember()
    {
        $data['titlePage'] = 'Admin Member | Puskesmas Curugbitung';
        $data['titleNav'] = 'dashboard';
        return view('admin.dashboard', $data);
    }

    public function getAllAdminMember()
    {
    }

    public function viewAdminMember()
    {
    }

    public function formCreateAdminMember()
    {
    }

    public function createAdminMember()
    {
    }

    public function formUpdateAdminMember()
    {
    }

    public function updateAdminMember()
    {
    }

    public function deleteAdminMember()
    {
    }
}
