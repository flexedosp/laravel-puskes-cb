<?php

namespace App\Http\Controllers;

use DOMDocument;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Modul;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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



    public function createBerita(Request $request)
    {
        $description = $request->inputDeskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/img/berita/" . time() . $key . '.png';


            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();

        // Handle file upload
        if ($request->hasFile('inputGambar')) {
            $imageName = time() . '.' . $request->inputGambar->extension();
            $request->gambar->move(public_path('img/berita'), $imageName);
        } else {
            $imageName = "default_content.png";
        }

        $judul_lowercase = strtolower($request->inputNama);
        $slug = str_replace(' ', '-', $judul_lowercase);

        $checkProses = Berita::create([
            'nama' => $request->inputNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputTerbit,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);

        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'failure'], 500);
    }


    public function updateBerita(Request $request)
    {
        $post = Berita::find($request->id);
        $description = $request->inputDeskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:img/berita/') === 0) {

                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/img/berita/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        // Handle file upload
        if ($request->hasFile('inputGambar') && $request->file('inputGambar')->isValid()) {
            $imagePath = public_path('img/berita/' . $post->gambar);
            
            if (!is_null($post->gambar)) {
                $imagePath = public_path('img/berita/' . $post->gambar);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        

            $imageName = time() . '.' . $request->inputGambar->extension();
            $request->gambar->move(public_path('img/berita'), $imageName);
        } else {
            $imageName = $post->gambar;
        }

        if ($post->nama != $request->inputNama) {
            $judul_lowercase = strtolower($request->inputNama);
            $slug = str_replace(' ', '-', $judul_lowercase);
        }

        $checkProses = $post->update([
            'nama' => $request->inputNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputTerbit,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);

        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'failure'], 500);
    }

    public function deleteBerita(Request $request)
    {
        $dataBerita = Berita::find($request->id);

        $dom = new DOMDocument();
        $dom->loadHTML($dataBerita->description, 9);
        $images = $dom->getElementsByTagName('img');

        // Untuk menghapus gambar di deskripsi berita
        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $imagePath = public_path('img/berita/' . $dataBerita->gambar);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $cekProses = $dataBerita->update([
            'deleted_by' => Auth::user()->name,
            'deleted_at' => Carbon::now()
        ]);

        if ($cekProses) {
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'failure'], 500);
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

        return response()->json($dataModul);
    }


    public function createModul(Request $request)
    {
        $description = $request->inputDeskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/img/modul/" . time() . $key . '.png';


            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();

        // Handle file upload
        if ($request->hasFile('inputGambar')) {
            $imageName = time() . '.' . $request->inputGambar->extension();
            $request->gambar->move(public_path('img/modul'), $imageName);
        } else {
            $imageName = "default_content.png";
        }

        $judul_lowercase = strtolower($request->inputNama);
        $slug = str_replace(' ', '-', $judul_lowercase);

        $checkProses = Modul::create([
            'nama' => $request->inputNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputTerbit,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);

        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        }
        return response()->json(['result' => 'failure'], 500);
    }


    public function updateModul(Request $request)
    {
    }

    public function deleteModul(Request $request)
    {
    }

    public function adminMember()
    {
        $data['titlePage'] = 'Admin Member | Puskesmas Curugbitung';
        $data['titleNav'] = 'dashboard';
        return view('admin.dashboard', $data);
    }

    public function getAllAdminMember(Request $request)
    {
        $id = $request->id;
        $dataModul = User::find($id);

        if (!$dataModul) {
            return response()->json(['message' => 'Modul not found'], 404);
        }

        return response()->json($dataModul);
    }

    public function viewAdminMember(Request $request)
    {
    }


    public function createAdminMember(Request $request)
    {
    }


    public function updateAdminMember(Request $request)
    {
    }

    public function deleteAdminMember(Request $request)
    {
    }
}
