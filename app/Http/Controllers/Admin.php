<?php

namespace App\Http\Controllers;

use DOMDocument;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Modul;
use App\Models\Berita;
use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FeedbackPasien;
use App\Models\PertanyaanPasien;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    protected $countUnreadPertanyaan;
    protected $countUnreadFeedback;
    public function __construct()
    {
       $this->countUnreadPertanyaan = PertanyaanPasien::where('is_read', 0)->count();
        $this->countUnreadFeedback = FeedbackPasien::where('is_read', 0)->count();
        // $data['countUnreadPertanyaan'] = PertanyaanPasien::where('is_read', 0)->count();
        // $data['countUnreadFeedback'] = FeedbackPasien::where('is_read', 0)->count();
    }

    // Main Section Admin
    public function index()
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['titlePage'] = 'Admin Dashboard | Puskesmas Curugbitung';
        $data['titleNav'] = 'dashboard';

        // Mendapatkan data dari database (misalnya, tabel 'visitors')
        $data['visitor'] = Visitor::select('access_date')->get();

        // Mengelompokkan data berdasarkan access_date dan menghitung jumlahnya
        $data['visitorGroup']= $data['visitor']->groupBy('access_date')->map(function ($items) {
            return [
                'access_date' => $items[0]->access_date,
                'jumlah' => count($items),
            ];
        })->values()->all();

        $data['countBerita'] =Berita::where('deleted_at', null)->count();
        $data['countModul'] =Modul::where('deleted_at', null)->count();
        $data['countVisitor'] =Visitor::count();

        return view('admin.dashboard', $data);
    }


    public function berita()
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
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
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
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
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['titlePage'] = 'Admin Member | Puskesmas Curugbitung';
        $data['titleNav'] = 'admins';
        return view('admin.member-admin', $data);
    }

    public function getAllAdminMember()
    {
        $dataAdmin = User::all()->filter(function ($item) {
            return $item->deleted_at == null && $item->id != Auth::user()->id;
        })->toArray();
        foreach ($dataAdmin as $index => &$admin) {
            $admin['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($dataAdmin)->make(true);
    }

    public function viewMemberAdmin(Request $request)
    {
        $dataAdmin = User::find($request->id);

        if (!$dataAdmin) {
            return response()->json(['message' => 'Modul not found'], 404);
        }

        return response()->json($dataAdmin);
    }


    public function createAdminMember(Request $request)
    {
        $makeAdmin = new User;

        $makeAdmin->name = $request->inputMemberAdminNama;
        $makeAdmin->username = strtolower($request->inputMemberAdminUsername) . "@pcb.com";
        $makeAdmin->jenis_kelamin = $request->inputMemberAdminJenisKelamin;
        $makeAdmin->status = $request->inputMemberAdminStatus;
        $makeAdmin->gambar = "default_user.jpg";
        $makeAdmin->password = Hash::make('password123');

        $checkProcess = $makeAdmin->save();
        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }


    public function resetAdminMember(Request $request)
    {
        $getAdmin = User::find($request->id);

        $getAdmin->password = Hash::make('password123');
        $getAdmin->updated_at = Carbon::now();
        $checkProcess = $getAdmin->save();

        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function updateStatusAdminMember(Request $request)
    {
        $getAdmin = User::find($request->id);

        $getAdmin->status = $request->status;
        $checkProcess = $getAdmin->save();

        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    public function deleteAdminMember(Request $request)
    {
        $getAdmin = User::find($request->id);
        if ($getAdmin->gambar != "default_content.png") {
            $imagePath = public_path('img/modul/' . $getAdmin->gambar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $checkProcess = $getAdmin->delete();
        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }


    // Profile Admin
    public function profileAdmin()
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $id = Auth::user()->id;
        $data['titlePage'] = 'Profile Admin';
        $data['dataAdmin'] = User::find($id);
        return view('admin.profile-admin', $data);
    }

    public function getProfileAdmin()
    {
        $id = Auth::user()->id;
        $dataAdmin = User::find($id);
        return response()->json($dataAdmin);
    }

    public function editAdmin(Request $request)
    {
        $getAdmin = User::find($request->idAdmin);

        $hash = $request->editPasswordAdmin;
        if ($hash) {
            $setPassword = Hash::make($hash);
            $getAdmin->password = $setPassword;
        } else {
            $getAdmin->password = $getAdmin->password;
        }

        try {
            if ($request->hasFile('editGambarAdmin') && $request->file('editGambarAdmin')->isValid()) {
                $imagePath = public_path('img/profile/' . $getAdmin->gambar);
                if (!is_null($getAdmin->gambar)) {
                    if ($getAdmin->gambar != "default_user.jpg") {
                        if (File::exists($imagePath)) {
                            File::delete($imagePath);
                        }
                    }
                }
                $imageName = time() . '.' . $request->editGambarAdmin->extension();
                $request->editGambarAdmin->move(public_path('img/profile'), $imageName);
            } else {
                $imageName = $getAdmin->gambar;
            }
        } catch (\Exception $e) {
            $imageName = $getAdmin->gambar;
        }

        if ($request->editUsernameAdmin) {
            $setUsername = $request->editUsernameAdmin . "@pcb.com";
        } else {
            $setUsername = $getAdmin->username;
        }

        $getAdmin->name = $request->editNamaAdmin;
        $getAdmin->username = $setUsername;
        $getAdmin->jenis_kelamin = $request->inputJenisKelaminAdmin;
        $getAdmin->gambar = $imageName;

        $checkProcess = $getAdmin->save();
        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }

    //Kuesioner

    public function feedbackPasien()
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['titlePage'] = 'List Feedback Pasien | Puskesmas Curugbitung';
        $data['titleNav'] = 'feedback';
        return view('admin.feedback-admin', $data);
    }

    public function getAllFeedbackPasien()
    {
        $data = FeedbackPasien::all()->toArray();
        foreach ($data as $index => &$d) {
            $d['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($data)->make(true);
    }

    public function viewFeedbackPasien(FeedbackPasien $feedbackPasien)
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['dataFeedback'] = FeedbackPasien::find($feedbackPasien->id);
        if ($data['dataFeedback']->is_read == 0) {
           $data['dataFeedback']->is_read = 1;
           $data['dataFeedback']->save();
        }
        $data['titlePage'] = 'Data Feedback Pasien | Puskesmas Curugbitung';
        $data['titleNav'] = 'feedback';

        return view('admin.viewfeedback-admin', $data);
    }

    public function pertanyaanPasien()
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
    $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['titlePage'] = 'List Feedback Pasien | Puskesmas Curugbitung';
        $data['titleNav'] = 'pertanyaan';

        return view('admin.pertanyaan-admin', $data);
    }

    public function getAllPertanyaanPasien()
    {
        $data = PertanyaanPasien::all()->toArray();
        foreach ($data as $index => &$d) {
            $d['count'] = $index + 1; // $index + 1 untuk memulai dari 1, bukan 0
        }
        return DataTables::of($data)->make(true);
    }

    public function viewPertanyaanPasien(PertanyaanPasien $pertanyaanPasien)
    {
        $data['countUnreadPertanyaan'] = $this->countUnreadPertanyaan;
        $data['countUnreadFeedback'] = $this->countUnreadFeedback;
        $data['dataPertanyaan'] = PertanyaanPasien::find($pertanyaanPasien->id);
        if ($data['dataPertanyaan']->is_read == 0) {
            $data['dataPertanyaan']->is_read = 1;
            $data['dataPertanyaan']->save();
        }
        $data['titlePage'] = 'Data Pertanyaan Pasien | Puskesmas Curugbitung';
        $data['titleNav'] = 'pertanyaan';

        return view('admin.viewpertanyaan-admin', $data);
    }
}
