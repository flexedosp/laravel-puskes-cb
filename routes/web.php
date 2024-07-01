<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guests;
use Illuminate\Support\Facades\Route;

// BEGIN Main Route | Guest 
Route::get('/', [Guests::class, 'index'])->name('guest.home');

// BEGIN Feedback Pasien
Route::get('/feedback-pasien', [Guests::class, 'feedbackPasien'])->name('guest.formfeedback');
Route::post('/feedback-pasien/send', [Guests::class, 'sendFeedbackPasien'])->name('guest.kirimfeedback');
// END Feedback Pasien

// BEGIN Tentang Kami
Route::get('/tentangkami', [Guests::class, 'tentangKami'])->name('guest.tentangkami');
Route::get('/tentangkami#KepalaPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.kepalapuskes');
Route::get('/tentangkami#StrukturOrganisasi', [Guests::class, 'tentangKami'])->name('guest.tentangkami.strukturorganisasi');
Route::get('/tentangkami#SejarahPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.sejarah');
Route::get('/tentangkami#VisiDanMisi', [Guests::class, 'tentangKami'])->name('guest.tentangkami.visidanmisi');
Route::get('/tentangkami#NilaiDanSlogan', [Guests::class, 'tentangKami'])->name('guest.tentangkami.nilaidanslogan');
Route::get('/tentangkami#TenagaPuskesmas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.tenagapuskesmas');
Route::get('/tentangkami#TinjauFasilitas', [Guests::class, 'tentangKami'])->name('guest.tentangkami.tinjaufasilitas');
// END Tentang Kami

Route::get('/layanan', [Guests::class, 'layanan'])->name('guest.layanan');
Route::match(['get', 'post'], '/berita', [Guests::class, 'berita'])->name('guest.berita');
Route::match(['get', 'post'], '/modul', [Guests::class, 'modul'])->name('guest.modul');

Route::get('/kontak', [Guests::class, 'kontak'])->name('guest.kontak');
Route::post('/send-pertanyaan', [Guests::class, 'sendPertanyaan'])->name('guest.kirimpertanyaan');
// END Main Route | Guest 

// BEGIN Get Data Route | Guest 
Route::get('/berita/{berita:slug}', [Guests::class, 'detailBerita']);
Route::get('/modul/{modul:slug}', [Guests::class, 'detailModul']);
// END Get Data Route | Guest 

// BEGIN Authentication
Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login')->middleware('isAdminActive');
Route::post('/admin-login', [AuthController::class, 'authenticate'])->name('admin.check');
Route::get('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');
// END Authentication

// BEGIN Admin Route
Route::middleware('isAdmin')->group(function () {
    // BEGIN Halaman Admin
    Route::get('/admin-dashboard', [Admin::class, 'index'])->name('admin.home');
    Route::get('/admin-berita', [Admin::class, 'berita'])->name('admin.berita');
    Route::get('/admin-modul', [Admin::class, 'modul'])->name('admin.modul');
    Route::get('/admin-member', [Admin::class, 'adminMember'])->name('admin.memberadmin');
    Route::get('/profile-admin', [Admin::class, 'profileAdmin'])->name('profile.admin');
    Route::get('/admin-list-feedback', [Admin::class, 'feedbackPasien'])->name('feedback.admin');
    Route::get('/admin-list-feedback/get', [Admin::class, 'getAllFeedbackPasien'])->name('getfeedback.admin');
    Route::get('/admin-list-feedback/{feedbackPasien:id}', [Admin::class, 'viewFeedbackPasien'])->name('viewfeedback.admin');
    Route::get('/admin-list-pertanyaan', [Admin::class, 'pertanyaanPasien'])->name('pertanyaan.admin');
    Route::get('/admin-list-pertanyaan/get', [Admin::class, 'getAllPertanyaanPasien'])->name('getpertanyaan.admin');
    Route::get('/admin-list-pertanyaan/{pertanyaanPasien:id}', [Admin::class, 'viewPertanyaanPasien'])->name('viewpertanyaan.admin');
    // END Halaman Admin

    // BEGIN Olah Data Berita
    Route::get('/data-berita', [Admin::class, 'getAllBerita'])->name('data.berita');
    Route::get('/detail-berita', [Admin::class, 'viewBerita'])->name('data.detailberita');
    Route::post('/create-berita', [Admin::class, 'createBerita'])->name('data.createberita');
    Route::post('/update-berita', [Admin::class, 'updateBerita'])->name('data.updateberita');
    Route::post('/delete-berita', [Admin::class, 'deleteBerita'])->name('data.deleteberita');
    // END Olah Data Berita

    // BEGIN Olah Data Modul
    Route::get('/data-modul', [Admin::class, 'getAllModul'])->name('data.modul');
    Route::get('/detail-modul', [Admin::class, 'viewModul'])->name('data.detailmodul');
    Route::post('/create-modul', [Admin::class, 'createModul'])->name('data.createmodul');
    Route::post('/update-modul', [Admin::class, 'updateModul'])->name('data.updatemodul');
    Route::post('/delete-modul', [Admin::class, 'deleteModul'])->name('data.deletemodul');
    // END Olah Data Modul

    // BEGIN Olah Data Member Admin
    Route::get('/data-memberadmin', [Admin::class, 'getAllAdminMember'])->name('data.memberadmin');
    Route::get('/detail-memberadmin', [Admin::class, 'viewMemberAdmin'])->name('data.detailmemberadmin');
    Route::post('/create-memberadmin', [Admin::class, 'createAdminMember'])->name('data.creatememberadmin');
    Route::post('/reset-memberadmin', [Admin::class, 'resetAdminMember'])->name('data.resetmemberadmin');
    Route::post('/update-memberadmin', [Admin::class, 'updateStatusAdminMember'])->name('data.updatestatusmemberadmin');
    Route::post('/delete-memberadmin', [Admin::class, 'deleteAdminMember'])->name('data.deletememberadmin');
    // END Olah Data Member Admin

    // BEGIN Olah Data Profile Admin
    Route::get('/profile-admin/get-data', [Admin::class, 'getProfileAdmin'])->name('detailprofile.admin');
    Route::post('/profile-admin/edit', [Admin::class, 'editAdmin'])->name('editprofile.admin');
    // END Olah Data Profile Admin

});
// END Admin Route
