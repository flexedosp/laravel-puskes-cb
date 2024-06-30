@extends('layouts.survey')

@section('container')
    <section id="divSurveyAdmin" class="bg-white rounded shadow-sm px-3 mx-auto my-5">
        <div class="d-flex justify-content-center">
            <img src="/img/logo_curug_bitung.png" class="img-survey" alt="Logo Curug Bitung">
            <img src="/img/logo_banten.png" class="img-survey" alt="Logo Banten">
            <img src="/img/logo_puskes_cb.png" class="img-survey" alt="Logo Puskesmas Curugbitung">
            <img src="/img/logo_kemenkes.png" class="img-survey" alt="Logo Kemenkes">
        </div>
        <p class="my-3 fw-bold fs-2 text-center">
            Form Survey Pasien
        </p>
        <div class="container mx-3">
            <form id="formSurvey">
                <div class="mb-3">
                    <label for="inputFasilitas">Pilih Fasilitas</label>
                    <select name="inputFasilitas" id="inputFasilitas">
                        <option value=""></option>
                    </select>
                </div>
                <hr>
                <div class="mb-5">
                    <p>Nilai Fasilitas Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiFasilitas" id="fasilitas1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="fasilitas1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiFasilitas" id="fasilitas2"
                            value="Bagus">
                        <label class="form-check-label" for="fasilitas2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiFasilitas" id="fasilitas3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="fasilitas3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiFasilitas" id="fasilitas4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="fasilitas4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <div class="mb-5">
                    <p>Nilai Layanan Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiLayanan" id="layanan1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="layanan1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiLayanan" id="layanan2"
                            value="Bagus">
                        <label class="form-check-label" for="layanan2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiLayanan" id="layanan3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="layanan3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiLayanan" id="layanan4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="layanan4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <div class="mb-5">
                    <p>Nilai Petugas Puskesmas : </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiPetugas" id="petugas1"
                            value="Sangat Bagus">
                        <label class="form-check-label" for="petugas1">Sangat Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiPetugas" id="petugas2"
                            value="Bagus">
                        <label class="form-check-label" for="petugas2">Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiPetugas" id="petugas3"
                            value="Tidak Bagus">
                        <label class="form-check-label" for="petugas3">Tidak Bagus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inputNilaiPetugas" id="petugas4"
                            value="Sangat Tidak Bagus">
                        <label class="form-check-label" for="petugas4">Sangat Tidak Bagus</label>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="inputKritik&Saran">Berikan Masukan Kritik & Saran Anda : </label>
                    <textarea name="inputKritik" id="inputKritik" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <hr>
                <div class="mb-3">
                    <label for="inputNama">Nama : </label>
                    <input class="form-control" type="text" name="inputNama" id="inputNama">
                </div>
                <div class="mb-3">
                    <label for="inputUsia">Usia : </label>
                    <input class="form-control" type="text" name="inputUsia" id="inputUsia">
                </div>
                <div class="mb-3">
                    <label for="inputJenisKelamin">Jenis Kelamin : </label>
                    <input class="form-control" type="text" name="inputJenisKelamin" id="inputJenisKelamin">
                </div>
                <div class="mb-3">
                    <label for="inputEmail">Nama : </label>
                    <input class="form-control" type="email" name="inputEmail" id="inputEmail">
                </div>
                <div class="mb-3">
                    <label for="inputNoTelp">Nama : </label>
                    <input class="form-control" type="text" name="inputNoTelp" id="inputNoTelp">
                </div>
                <div class="mb-3">
                    <label for="inputAnonim">Nama : </label>
                    <input class="form-control" type="text" name="inputAnonim" id="inputAnonim">
                </div>
            </form>
        </div>
    </section>
@endsection
