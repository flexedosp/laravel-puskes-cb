<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Modul;
use App\Models\Berita;
use App\Models\Visitor;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Models\FeedbackPasien;
use App\Models\PertanyaanPasien;
use Illuminate\Routing\Controller;

class Guests extends Controller
{
    protected $ipAddress;
    protected $browser;
    protected $os;
    protected $accessDate;

    public function __construct(Request $request)
    {
        // Mendapatkan Alamat IP
        $this->ipAddress = $request->ip();

        // Mendapatkan Nama OS dan Nama Browser
        $agent = new Agent();
        $this->browser = $agent->browser();
        $this->os = $agent->platform();

        // Mendapatkan Tanggal Akses
        $this->accessDate = Carbon::now()->toDateString();
        $existingVisitor = Visitor::where('ip_address', $this->ipAddress)
            ->whereDate('access_date', $this->accessDate)
            ->first();

        // Hanya tambahkan entri baru jika tidak ada entri yang sama sebelumnya
        if (!$existingVisitor) {
            $dataVisitor = [
                'ip_address' => $this->ipAddress,
                'os' => $this->os,
                'browser' => $this->browser,
                'access_date' => Carbon::now() // Simpan dengan waktu untuk referensi yang lebih tepat
            ];

            Visitor::create($dataVisitor);
        }
    }
    // BEGIN Parent Function
    public function index()
    {

        $data['titlePage'] = 'Puskesmas Curugbitung | Website Official';
        $data['titleNav'] = 'Beranda';

        $data['dataBerita'] = Berita::orderBy('id', 'desc')->take(3)->get();
        $data['dataModul'] = Modul::orderBy('id', 'desc')->take(2)->get();

        // dd(count($data['dataBerita']));
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

    public function modul(Request $request)
    {
        $data['titlePage'] = 'Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'Modul';

        // Jika user melakukan refresh, hapus session search_query
        if (!$request->input('page')) {
            $request->session()->forget('search_query');
        }

        // Ambil query dari request jika ada
        $searchQuery = $request->input('cariModul');

        // Cek apakah ada request pencarian baru
        if ($searchQuery) {
            // Taruh query ke dalam session
            $request->session()->put('search_query', $searchQuery);
        } elseif ($request->session()->has('search_query')) {
            // Cek apakah user melakukan refresh atau pagination
            $searchQuery = $request->session()->get('search_query');
        }


        // Default query untuk mengambil semua data
        $query = Modul::query();

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('nama', 'like', '%' . $searchQuery . '%');

                // Coba parsing query sebagai tanggal
                try {
                    // Periksa apakah input hanya berupa tahun (YYYY)
                    if (preg_match('/^\d{4}$/', $searchQuery)) {
                        $q->orWhereYear('createdAt', $searchQuery);
                    }
                    // Periksa apakah input berupa bulan dan tahun (YYYY-MM)
                    elseif (preg_match('/^\d{4}-\d{2}$/', $searchQuery)) {
                        [$year, $month] = explode('-', $searchQuery);
                        $q->orWhereYear('createdAt', $year)
                            ->whereMonth('createdAt', $month);
                    }
                    // Periksa apakah input berupa tanggal lengkap (YYYY-MM-DD)
                    elseif (Carbon::createFromFormat('Y-m-d', $searchQuery) !== false) {
                        $tanggal = Carbon::createFromFormat('Y-m-d', $searchQuery);
                        $q->orWhereDate('createdAt', $tanggal);
                    }
                } catch (\Exception $e) {
                    // Jika parsing gagal, biarkan saja
                }
            });
        } else {
            // Jika tidak ada pencarian, atau pencarian sudah selesai, bersihkan session search_query
            $request->session()->forget('search_query');
        }

        // Lakukan pagination setelah menerapkan kondisi
        $data['dataModul'] = $query->paginate(8)->appends(['cariModul' => $searchQuery]);
        return view('guests.modul', $data);
    }

    public function berita(Request $request)
    {
        $data['titlePage'] = 'Berita | Puskesmas Curugbitung';
        $data['titleNav'] = 'Berita';


        // Jika user melakukan refresh, hapus session search_query
        if (!$request->input('page')) {
            $request->session()->forget('search_query');
        }

        // Ambil query dari request jika ada
        $searchQuery = $request->input('cariBerita');

        // Cek apakah ada request pencarian baru
        if ($searchQuery) {
            // Taruh query ke dalam session
            $request->session()->put('search_query', $searchQuery);
        } elseif ($request->session()->has('search_query')) {
            // Cek apakah user melakukan refresh atau pagination
            $searchQuery = $request->session()->get('search_query');
        }


        // Default query untuk mengambil semua data
        $query = Berita::query();

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('nama', 'like', '%' . $searchQuery . '%');

                // Coba parsing query sebagai tanggal
                try {
                    // Periksa apakah input hanya berupa tahun (YYYY)
                    if (preg_match('/^\d{4}$/', $searchQuery)) {
                        $q->orWhereYear('createdAt', $searchQuery);
                    }
                    // Periksa apakah input berupa bulan dan tahun (YYYY-MM)
                    elseif (preg_match('/^\d{4}-\d{2}$/', $searchQuery)) {
                        [$year, $month] = explode('-', $searchQuery);
                        $q->orWhereYear('createdAt', $year)
                            ->whereMonth('createdAt', $month);
                    }
                    // Periksa apakah input berupa tanggal lengkap (YYYY-MM-DD)
                    elseif (Carbon::createFromFormat('Y-m-d', $searchQuery) !== false) {
                        $tanggal = Carbon::createFromFormat('Y-m-d', $searchQuery);
                        $q->orWhereDate('createdAt', $tanggal);
                    }
                } catch (\Exception $e) {
                    // Jika parsing gagal, biarkan saja
                }
            });
        } else {
            // Jika tidak ada pencarian, atau pencarian sudah selesai, bersihkan session search_query
            $request->session()->forget('search_query');
        }

        // Lakukan pagination setelah menerapkan kondisi
        // $data['dataBerita'] = $query->where('deleted_at', null)->where('terbit', 1)->paginate(8)->appends(['cariBerita' => $searchQuery]);
        $data['dataBerita'] = $query->where([
            ['deleted_at', null],
            ['terbit', 2]
        ])->paginate(8)->appends(['cariBerita' => $searchQuery]);
        // Jika tidak ada pencarian, atau pencarian sudah selesai, bersihkan session search_query
        // if (!$searchQuery) {
        //     $request->session()->forget('search_query');
        // }
        // Pass the search query back to the view
        // $data['searchQuery'] = $searchQuery;

        // Jika permintaan adalah AJAX, kita hanya mengembalikan bagian dari halaman yang dibutuhkan
        // if ($request->ajax()) {
        //     // Kembalikan partial view untuk berita dan pagination
        //     $html = view('guests.partials.berita-list', compact('dataBerita'))->render();
        //     $pagination = view('vendor.pagination.bootstrap-5', ['paginator' => $data['dataBerita']])->render();

        //     return response()->json([
        //         'html' => $html,
        //         'pagination' => $pagination
        //     ]);
        // }

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
        return view('guests.detailBerita', $data);
    }

    public function detailModul(Modul $modul)
    {
        $data['titlePage'] = 'Detail Modul | Puskesmas Curugbitung';
        $data['titleNav'] = 'Modul';
        $data['dataModul'] = $modul;
        return view('guests.detailModul', $data);
    }

    public function sendPertanyaan(Request $request){
        $newQuestion = new PertanyaanPasien;
        $newQuestion->name = $request->inputNama;
        $newQuestion->email = $request->inputEmail;
        $newQuestion->no_telp = $request->inputNoTelp;
        $newQuestion->jenis_kelamin = $request->inputJenisKelamin;
        $newQuestion->isi_pertanyaan = $request->inputPertanyaan;
        $newQuestion->created_at = Carbon::now();
        $newQuestion->updated_at = Carbon::now();
        $newQuestion->is_read = 0;

        $checkProcess =$newQuestion->save();
        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }

        
    }
    // END Child Function

    // BEGIN Feedback Pasien
    public function feedbackPasien()
    {
        return view('guests.kritik-saran');
    }

    public function sendFeedbackPasien(Request $request)
    {
        // Buat Variabel Untuk Menampung Data Baru
        $newFeedback = new FeedbackPasien;

        // Masukkan Data Baru
        $newFeedback->nama_fasilitas = $request->inputFasilitas;
        $newFeedback->nilai_pelayanan = $request->inputNilaiFasilitas;
        $newFeedback->nilai_kebersihan = $request->inputNilaiKebersihan;
        $newFeedback->nilai_petugas = $request->inputNilaiPetugas;
        $newFeedback->isi_feedback = $request->inputKritikSaran;
        $newFeedback->nama = $request->inputNama;
        $newFeedback->usia = $request->inputUsia;
        $newFeedback->jenis_kelamin = $request->inputJenisKelamin;
        $newFeedback->email = $request->inputEmail;
        $newFeedback->no_telp = $request->inputNoTelp;
        $newFeedback->is_anonim = $request->inputAnonim;
        $newFeedback->is_read = 0;
        $newFeedback->created_at = Carbon::now();
        $newFeedback->updated_at = Carbon::now();


        // Simpan Data Baru
        $checkProcess = $newFeedback->save();

        // Cek Apakah Data Sudah Tersimpan atau Belum
        if ($checkProcess) {
            return response()->json(['result' => 'success'], 200);
        } else {
            return response()->json(['result' => 'failure'], 500);
        }
    }
    // END Feedback Pasien
}
