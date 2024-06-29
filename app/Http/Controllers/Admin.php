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
        $dataBerita = Berita::all()->filter(function ($item) {
            return $item->deleted_by == null && $item->deleted_at == null;
        })->toArray();
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
        $description = $request->inputBeritaDeskripsi;

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
        if ($request->hasFile('inputBeritaGambar')) {
            $imageName = time() . '.' . $request->inputBeritaGambar->extension();
            $request->inputBeritaGambar->move(public_path('img/berita'), $imageName);
        } else {
            $imageName = "default_content.png";
        }

        $judul_lowercase = strtolower($request->inputBeritaNama);
        $slug = str_replace(' ', '-', $judul_lowercase);

        $checkProses = Berita::create([
            'nama' => $request->inputBeritaNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputBeritaTerbit,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);
        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }


    public function updateBerita(Request $request)
    {
        $post = Berita::find($request->inputBeritaId);
        // dd($post);
        $description = $request->inputBeritaDeskripsi;

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

        try {
            if ($request->hasFile('inputBeritaGambar') && $request->file('inputBeritaGambar')->isValid()) {
                $imagePath = public_path('img/berita/' . $post->gambar);
                if (!is_null($post->gambar)) {
                    $imagePath = public_path('img/berita/' . $post->gambar);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
                $imageName = time() . '.' . $request->inputBeritaGambar->extension();
                $request->inputBeritaGambar->move(public_path('img/berita'), $imageName);
            } else {
                $imageName = $post->gambar;
            }
        } catch (\Exception $e) {
            $imageName = $post->gambar;
        }

        $slug = $post->nama;
        if ($post->nama != $request->inputBeritaNama) {
            $judul_lowercase = strtolower($request->inputBeritaNama);
            $slug = str_replace(' ', '-', $judul_lowercase);
        }

        $checkProses = $post->update([
            'nama' => $request->inputBeritaNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputBeritaTerbit,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now()
        ]);

        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function deleteBerita(Request $request)
    {
        $dataBerita = Berita::find($request->id);

        $dom = new DOMDocument();
        $dom->loadHTML($dataBerita->deskripsi, 9);
        $images = $dom->getElementsByTagName('img');

        // Untuk menghapus gambar di deskripsi berita
        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($dataBerita->gambar != "default_content.png") {
            $imagePath = public_path('img/berita/' . $dataBerita->gambar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $cekProses = $dataBerita->update([
            'deleted_by' => Auth::user()->name,
            'deleted_at' => Carbon::now()
        ]);

        if ($cekProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function modul()
    {
        $data['titlePage'] = 'Admin Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'modul';
        return view('admin.modul-admin', $data);
    }

    public function getAllModul()
    {
        $dataModul = Modul::all()->filter(function ($item) {
            return $item->deleted_by == null && $item->deleted_at == null;
        })->toArray();
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
        $description = $request->inputModulDeskripsi;

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
        if ($request->hasFile('inputModulGambar')) {
            $imageName = time() . '.' . $request->inputModulGambar->extension();
            $request->inputModulGambar->move(public_path('img/modul'), $imageName);
        } else {
            $imageName = "default_content.png";
        }

        $judul_lowercase = strtolower($request->inputModulNama);
        $slug = str_replace(' ', '-', $judul_lowercase);

        $checkProses = Modul::create([
            'nama' => $request->inputModulNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputModulTerbit,
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);
        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }


    public function updateModul(Request $request)
    {
        $post = Modul::find($request->inputModulId);
        // dd($post);
        $description = $request->inputModulDeskripsi;

        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {

            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:img/berita/') === 0) {

                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/img/modul/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $description = $dom->saveHTML();

        // Handle file upload

        try {
            if ($request->hasFile('inputModulGambar') && $request->file('inputModulGambar')->isValid()) {
                $imagePath = public_path('img/modul/' . $post->gambar);
                if (!is_null($post->gambar)) {
                    $imagePath = public_path('img/modul/' . $post->gambar);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
                $imageName = time() . '.' . $request->inputModulGambar->extension();
                $request->inputModulGambar->move(public_path('img/modul'), $imageName);
            } else {
                $imageName = $post->gambar;
            }
        } catch (\Exception $e) {
            $imageName = $post->gambar;
        }

        $slug = $post->nama;
        if ($post->nama != $request->inputModulNama) {
            $judul_lowercase = strtolower($request->inputModulNama);
            $slug = str_replace(' ', '-', $judul_lowercase);
        }

        $checkProses = $post->update([
            'nama' => $request->inputModulNama,
            'deskripsi' => $description,
            'gambar' => $imageName,
            'slug' => $slug,
            'terbit' => $request->inputModulTerbit,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now()
        ]);

        if ($checkProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function deleteModul(Request $request)
    {
        $dataModul = Modul::find($request->id);

        $dom = new DOMDocument();
        $dom->loadHTML($dataModul->deskripsi, 9);
        $images = $dom->getElementsByTagName('img');

        // Untuk menghapus gambar di deskripsi Modul
        foreach ($images as $key => $img) {

            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');


            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($dataModul->gambar != "default_content.png") {
            $imagePath = public_path('img/modul/' . $dataModul->gambar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $cekProses = $dataModul->update([
            'deleted_by' => Auth::user()->name,
            'deleted_at' => Carbon::now()
        ]);

        if ($cekProses) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function adminMember()
    {
        $data['titlePage'] = 'Admin Member | Puskesmas Curugbitung';
        $data['titleNav'] = 'dashboard';
        return view('admin.dashboard', $data);
    }

    public function getAllAdminMember(Request $request)
    {
        $dataAdmin = User::all()->filter(function ($item) {
            return $item->deleted_by == null && $item->deleted_at == null;
        })->toArray();
        foreach ($dataAdmin as $index => &$berita) {
            $berita['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($dataAdmin)->make(true);
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
