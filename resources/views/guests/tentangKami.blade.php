@extends('layouts.app')

@section('container')
    <section id="sectionTk" class="vw-100 vh-auto" style="padding-top: 2cm; padding-bottom:3cm">

        <h1 class="fw-bold text-center mb-3">Tentang Kami</h1>
        <div id="KepalaPuskesmas" class="container d-flex flex-wrap justify-content-center py-3">
            <div class="">
                <h3 class="fw-bold">Kepala Puskesmas Curugbitung</h3>
                <p class="fs-5">
                    Saat ini UPTD Puskesmas  Rawat inap Curugbitung dikepalai oleh <strong> H. Ribun.</strong>  Beliau menjabat sejak tahun
                    2014
                    sampai dengan saat ini. <br>Dibawah kepemimpinan beliau, kami yakin mampu memberikan pelayanan
                    kesehatan
                    yang optimal kepada Masyarakat
                    Curugbitung.
                </p>
            </div>
            <img src="/img/tentang_kami/HRibun.png" class="" alt="">
        </div>
        <hr>
        <div id="SejarahPuskesmas" class="container divTk py-3">
            <h3 class="fw-bold">Sejarah Puskesmas Curugbitung</h3>
            <p class="fs-5">
                Secara historis Puskesmas Rawat Inap Curugbitung berdiri pada Tahun 1989 dimana pada saat itu merupakan
                bagian dari Kecamatan Maja. <br>
                Pada tahun 2020, UPTD Puskesmas Rawat Inap Curugbitung menjadi salah satu dari 42 Puskesmas yang
                ditetapkan menjadi Badan Layanan Unit Daerah (BLUD) melalui Keputusan Bupati Lebak Nomor
                900/Kep.520-BPKAD/2019 tanggal 31 Desember 2019 tentang Penetapan Penerapan Tata Kelola BLUD pada UPTD
                Puskesmas di Lingkungan Dinas Kesehatan.
            </p>
        </div>
        <hr>
        <div id="SejarahPuskesmas" class="container divTk py-3">
            <div class="mx-auto row">
                <div class="col-sm-7">
                    <h4 class="fw-bold">Tata Nilai Organisasi</h4>
                    <div class="d-flex justify-content-center">
                      <img src="/img/tentang_kami/Symbol_TataNilaiOrganisasi.png" class="img-fluid " alt="">
                    </div>
                    <table class=" table-borderless bg-transparent">
                        <tbody>
                            <tr>
                                <th class="w-25 align-top" scope="row">B (Bersahaja)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas Tidak membedakan siapapun pasien / pelanggan</td>
                            </tr>
                            <tr>
                                <th class="w-25 align-top" scope="row">I (Inovatif)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas harus mempunyai Inovasi untuk kemajuan Puskesmas</td>
                            </tr>
                            <tr>
                                <th class="w-25 align-top" scope="row">S (Sopan)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas Sopan dalam memberikan Pelayanan</td>
                            </tr>
                            <tr>
                                <th class="w-25 align-top" scope="row">A (Amanah)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas jujur dan bertanggungjawab dalam memberikan Pelayanan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-5">
                    <h4 class="fw-bold">Slogan</h4>
                    <div class="d-flex justify-content-center">
                      <img src="/img/tentang_kami/Symbol_Slogan.png" class="img-fluid " alt="">
                    </div>
                    <p class="fs-5 text-center">
                       "Curugbitung...Bisa!!!"
                    </p>
                </div>
            </div>

        </div>

    </section>
@endsection
