@extends('layouts.feedback')

@section('container')
    <section id="divFeedbackAdmin" class="bg-white rounded shadow px-3 mx-auto my-5">
        <div class="d-flex justify-content-center">
            <img src="/img/logo_curug_bitung.png" class="img-feedback" alt="Logo Curug Bitung">
            <img src="/img/logo_banten.png" class="img-feedback" alt="Logo Banten">
            <img src="/img/logo_puskes_cb.png" class="img-feedback" alt="Logo Puskesmas Curugbitung">
            <img src="/img/logo_kemenkes.png" class="img-feedback" alt="Logo Kemenkes">
        </div>
        <p class="my-3 fw-bold fs-2 text-center">
            Form Feedback Pasien
        </p>
        <div class="container mx-3 px-4">
            <form id="formFeedback">
                @csrf
                <div class="mb-3">
                    <label for="inputFasilitas">Pilih Nama Fasilitas Yang Ingin Dinilai</label>
                    <select class="form-select" name="inputFasilitas" id="inputFasilitas">
                        <option selected>Pilih Fasilitas</option>
                        <option value="Ruang UGD">Ruang UGD</option>
                        <option value="Ruang Inap">Ruang Inap</option>
                        <option value="PONED">PONED</option>
                        <option value="Poli Jiwa">Poli Jiwa</option>
                        <option value="Poli Kesehatan Anak / MTS">Poli Kesehatan Anak / MTS</option>
                        <option value="Poli Kesehatan Ibu dan KB">Poli Kesehatan Ibu dan KB</option>
                        <option value="Poli / BP Gigi">Poli / BP Gigi</option>
                        <option value="Klinik TB Paru">Klinik TB Paru</option>
                        <option value="Klinik Sanitasi">Klinik Sanitasi</option>
                        <option value="Pemeriksaan IVA (Visual Asam Asetat)">Pemeriksaan IVA (Visual Asam Asetat)</option>
                        <option value="Farmasi">Farmasi</option>
                        <option value="Imunisasi">Imunisasi</option>
                        <option value="Konsultasi Gizi">Konsultasi Gizi</option>
                    </select>
                </div>
                <hr>
                <div class="mb-5">
                    <p>Nilai Fasilitas Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiFasilitas" id="fasilitas1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="fasilitas1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiFasilitas" id="fasilitas2"
                            value="Bagus">
                        <label class="form-check-label" for="fasilitas2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiFasilitas" id="fasilitas3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="fasilitas3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiFasilitas" id="fasilitas4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="fasilitas4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <div class="mb-5">
                    <p>Nilai Layanan Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiLayanan" id="layanan1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="layanan1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiLayanan" id="layanan2"
                            value="Bagus">
                        <label class="form-check-label" for="layanan2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiLayanan" id="layanan3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="layanan3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiLayanan" id="layanan4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="layanan4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <div class="mb-5">
                    <p>Nilai Kebersihan Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiKebersihan"
                            id="kebersihan1" value="Sangat Bagus">
                        <label class="form-check-label" for="kebersihan1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiKebersihan"
                            id="kebersihan2" value="Bagus">
                        <label class="form-check-label" for="kebersihan2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiKebersihan"
                            id="kebersihan3" value="Tidak Bagus">
                        <label class="form-check-label" for="kebersihan3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiKebersihan"
                            id="kebersihan4" value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="kebersihan4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <div class="mb-5">
                    <p>Nilai Petugas Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiPetugas" id="petugas1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="petugas1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiPetugas" id="petugas2"
                            value="Bagus">
                        <label class="form-check-label" for="petugas2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiPetugas" id="petugas3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="petugas3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" required type="radio" name="inputNilaiPetugas" id="petugas4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="petugas4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="inputKritikSaran">Berikan Masukan Kritik & Saran Anda : </label>
                    <textarea name="inputKritikSaran" id="inputKritikSaran" class="form-control" cols="30" rows="10"
                        required></textarea>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="inputNama">Nama : </label>
                    <input class="form-control" type="text" name="inputNama" id="inputNama" required>
                </div>
                <div class="mb-3">
                    <label for="inputUsia">Usia : </label>
                    <input class="form-control" type="text" name="inputUsia" id="inputUsia" required>
                </div>
                <div class="mb-3">
                    <label for="inputJenisKelamin">Jenis Kelamin : </label>
                    <select name="inputJenisKelamin" id="inputJenisKelamin" class="form-control" required>
                        <option selected>Pilih Jenis Kelamin</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputEmail">Email : </label>
                    <input class="form-control" type="email" name="inputEmail" id="inputEmail" required>
                </div>
                <div class="mb-3">
                    <label for="inputNoTelp">No. Telp : </label>
                    <input class="form-control" type="text" name="inputNoTelp" id="inputNoTelp" required>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="inputAnonim" id="inputAnonim" value="1">
                    <label for="inputAnonim">Pilih jika anda ingin menjadi Anonim</label>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" class="btn btn-primary w-50" onclick="submitFeedback()">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
