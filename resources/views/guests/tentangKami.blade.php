@extends('layouts.app')

@section('container')
    <h1 class="fw-bold text-center mb-3" style="padding-top: 2cm;">Tentang Kami</h1>
    <section id="sectionTk" class="vw-100 vh-auto" style="padding-bottom:3cm">

        <div id="KepalaPuskesmas" class="container divTk py-3">
            <div class="mx-auto row">
                <div class="col-sm-7">
                    <h3 class="fw-bold">Tentang Kepala Puskesmas Curugbitung</h3>
                    <p class="fs-5">
                        Saat ini UPTD Puskesmas Rawat inap Curugbitung dikepalai oleh <strong> H. Ribun.</strong> Beliau
                        menjabat sejak tahun
                        2014
                        sampai dengan saat ini. <br>Dibawah kepemimpinan beliau, kami yakin mampu memberikan pelayanan
                        kesehatan
                        yang optimal kepada Masyarakat
                        Curugbitung.
                    </p>
                </div>
                <div class="col-sm-5 d-flex justify-content-center">
                    <img src="/img/tentang_kami/HRibun.png" class="w-75" alt="">
                </div>
            </div>
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
        <div id="VisiDanMisi" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item carousel-item-custom active">
                <img src="/img/Gambar_1.jpg" class="d-block w-100 h-100 img-carousel-tk" alt="Gambar Background">
                 <div class="position-absolute top-50 start-50 translate-middle text-black">
                    <h4 class="fw-bold text-center">Visi</h4>
                    <p class="text-center carousel-item-list fw-bold text-wrap">“Puskesmas Lintas batas unggulan untuk mewujudkan Lebak sebagai Destinasi Wisata Unggulan Nasional Berbasis Potensi Lokal”</p>
                    </div>
              </div>
              <div class="carousel-item carousel-item-custom">
                <img src="/img/Gambar_1.jpg" class="d-block w-100 h-100 img-carousel-tk" alt="Gambar Background">
                 <div class="position-absolute top-50 start-50 translate-middle text-black">
                    <h4 class="fw-bold text-center">Misi</h4>
                    <ol class="carousel-item-list fw-bold text-wrap" >
                        <li>Memberikan pelayanan kesehatan dasar yang bermutu sesuai standar pelayanan.</li>
                        <li>Memberikan pelayanan kesehatan dasar sesuai dengan kepentingan dan kebutuhan masyarakat.</li>
                        <li>Memberikan kemudahan akses kepada masyarakat di dalam maupun di luar wilayah kerja Puskesmas untuk menjangkau pelayanan kesehatan dasar di Puskesmas.</li>
                    </ol>
                    </div>
              </div>
              <div class="carousel-item carousel-item-custom">
                <img src="/img/Gambar_1.jpg" class="d-block w-100 h-100 img-carousel-tk" alt="Gambar Background">
                 <div class="position-absolute top-50 start-50 translate-middle text-black">
                    <h4 class="fw-bold text-center">Misi</h4>
                    <ol class="carousel-item-list fw-bold text-wrap" start="4">
                        <li>Mendorong dan meningkatkan kesehatan individu, keluarga, dan masyarakat serta lingkungan.</li>
                        <li>Melaksanakan pemberdayaan masyarakat di bidang kesehatan melalui UKBM.</li>
                        <li>Menjalin kerjasama dengan lintas sektor terkait pembangunan wilayah berwawasan kesehatan.</li>
                        <li>Melaksanakan manajemen Puskesmas yang transparan dan akuntabel.</li>
                    </ol>
                    </div>
              </div>
            </div>
            <button class="carousel-control-prev bg-white" style="top: 38%; height:100px; width:50px" type="button" data-bs-target="#VisiDanMisi" data-bs-slide="prev">
                {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                <i class="fa-solid fa-chevron-left text-primary fs-1"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next bg-white" style="top: 38%; height:100px; width:50px" type="button" data-bs-target="#VisiDanMisi" data-bs-slide="next">
                {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                <i class="fa-solid fa-chevron-right text-primary fs-1"></i>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
        <div id="NilaiDanSlogan" class="container divTk py-3 my-3">
            <div class="mx-auto row">
                <div class="col-sm-7">
                    <h4 class="fw-bold">Tata Nilai Organisasi</h4>
                    <div class="d-flex justify-content-center">
                        <img src="/img/tentang_kami/Symbol_TataNilaiOrganisasi.png" class="img-fluid " alt="">
                    </div>
                    <table class=" table-borderless bg-transparent">
                        <tbody>
                            <tr>
                                <th class="align-top" style="width:40%" scope="row">B (Bersahaja)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas Tidak membedakan siapapun pasien / pelanggan</td>
                            </tr>
                            <tr>
                                <th class="align-top" style="width:40%" scope="row">I (Inovatif)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas harus mempunyai Inovasi untuk kemajuan Puskesmas</td>
                            </tr>
                            <tr>
                                <th class="align-top" style="width:40%" scope="row">S (Sopan)</th>
                                <td class="pe-1 align-top"> : </td>
                                <td class="align-top">Petugas Sopan dalam memberikan Pelayanan</td>
                            </tr>
                            <tr>
                                <th class="align-top" style="width:40%" scope="row">A (Amanah)</th>
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
        <div id="TenagaPuskesmas" class=" py-5 my-3 bg-primary">
            <div class="mx-auto container text-white">
                <h4 class="fw-bold text-center">Data Ketenagaan Puskemsas Tahun 2020</h4>
            <div class="row py-4 align-top">
                <div class="col-sm text-center">
                    <p class="fs-5 fw-bold">PNS</p>
                    <p class="fs-5 fw-semibold">26</p>
                </div>
                <div class="col-sm text-center">
                    <p class="fs-5 fw-bold">Tugsus Prov</p>
                    <p class="fs-5 fw-semibold">2</p>
                </div><div class="col-sm text-center">
                    <p class="fs-5 fw-bold">Supporting Staf Kab</p>
                    <p class="fs-5 fw-semibold">29</p>
                </div><div class="col-sm text-center">
                    <p class="fs-5 fw-bold">BLUD</p>
                    <p class="fs-5 fw-semibold">1</p>
                </div>
            </div>
            </div>
        </div>
        <div id="TinjauFasilitas" class="py-3 my-3 container divTk">
            <div class="mx-auto">
                <h4 class="fw-bold">Tinjauan Sarana dan Prasarana</h4>
                <p class="fs-5"> Keadaan saran kesehatan di Wilayah Kerja Puskesmas rawat Inap Curugbitung Kabupaten Lebak sebagai berikut :</p>
                <table class=" table-borderless bg-transparent">
                    <tbody class="fs-5">
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Puskesmas Induk</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">1 Unit</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Puskesmas Pembantu</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">3 Unit</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Poskesdes</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">4 Unit</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Posyandu</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">53 pos</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Posbindu</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">10 pos</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Desa Siaga</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">10 Desa</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Praktek Bidan Swasta Mandiri</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">3</td>
                        </tr>
                        <tr>
                            <th class="align-top table-th-custom-width" scope="row">Klinik Pratama</th>
                            <td class="pe-1 align-top"> : </td>
                            <td class="align-top">1</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>


    </section>
@endsection
