@extends('layouts.app')

@section('container')
    <section id="sectionLayanan" class="vw-100 vh-auto">
        <h2 class="fw-bold text-center">Informasi Layanan Puskesmas</h2>
        <p class="mb-4 fw-semibold text-center">Perhatian! : Pendaftaran setiap Senin s.d. Sabtu pada pukul 08.00 - 12.00 WIB</p>

        <div class="accordion z-0" id="accordionLayanan">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold" type="button"  data-bs-toggle="collapse" data-bs-target="#collapse1"
                        aria-expanded="true" aria-controls="collapse1">
                        Pelayanan 24 Jam
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionLayanan">
                    <div class="accordion-body">
                        <div class="container">
                            <p class="mb-0 fw-semibold text-center fs-5 ">Layanan 24 Jam</p>
                            <ol>
                                <li>RUANG UGD</li>
                                <li>RUANG INAP</li>
                                <li>PONED :
                                    <ul>
                                        <li>
                                            Persalinan Normal
                                        </li>
                                        <li>
                                            Persalinan Dalam Batas Kewenangan
                                        </li>
                                        <li>
                                            PONED Rujukan Pasien ke RS
                                        </li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Poli - Poli Puskesmas
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                    <div class="accordion-body">
                        <div class="container">

                            <div class="mb-5">
                                <p class="mb-0 fw-semibold fs-5 mb-0 ">Poli Jiwa</p>
                                <p class="mb-0">Jadwal Senin s.d. Sabtu pada pukul 08.00 - 14.00 WIB</p>
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 fw-semibold fs-5 mb-0 ">Poli Kesehatan Anak / MBTS</p>
                                <p class="mb-0">Jadwal Senin-sabtu Pukul 08.00 – 14.00 WIB</p>
                                <p class="mb-0">– Pemeriksaan bayi sakit dan Pemeriksaan balita sakit (MTBS)</p>
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 fw-semibold fs-5 mb-0 ">Poli KESEHATAN IBU dan KB</p>
                                <p class="mb-0">Jadwal Senin-sabtu Pukul 08.00 – 14.00 WIB</p>
                                <p class="mb-0">
                                <ul>
                                    <li>Pemeriksaan ibu hamil</li>
                                    <li>Pelayanan kesehatan calon pengantin</li>
                                    <li>Pelayanan dan konseling KB</li>
                                    <li>Pelayanan dan konseling kesehatan reproduksi</li>
                                    <li>Rujukan ke RS</li>
                                </ul>
                            </div>
                            <div class="mb-5">
                                <p class="mb-0 fw-semibold fs-5 mb-0">
                                    POLI / BP GIGI
                                </p>
                                <p class="mb-0">Jadwal Senin-Sabtu (jam 08.00-14.00 WIB)</p>
                                <ul>
                                    <li>Pengobatan radang gusi
                                    </li>
                                    <li>perawatan saluran akar</li>
                                    <li>pengobatan gangren, abses</li>
                                    <li>Tumpatan/penambalan AG dan ART</li>
                                    <li>Pencabutan gigi susu dan permanen tanpa komplikasi</li>
                                    <li>Rujukan ke RS</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseT3" aria-expanded="false" aria-controls="collapseT3">
                        Fasilitas Klinik
                    </button>
                </h2>
                <div id="collapseT3" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                    <div class="accordion-body">
                        <div class="mb-5">
                            <p class="mb-0 fw-semibold fs-5 mb-0">
                                KLINIK TB PARU
                            </p>
                            <p class="mb-0">Jadwal Senin-sabtu Pukul 08.00 – 14.00 WIB</p>
                            <ul>
                                <li>Pemeriksaan dan pengobatan TB anak</li>
                                <li>Pemeriksaan dan Pengobatan TB dewasa</li>
                            </ul>
                        </div>
                        <div class="mb-5">
                            <p class="mb-0 fw-semibold fs-5 mb-0">
                                KLINIK SANITASI
                            </p>
                            <p class="mb-0">Jadwal Senin-sabtu Pukul 08.00 – 14.00 WIB</p>
                            <ul>
                                <li>Penyehatan rumah</li>
                                <li>Penyediaan air bersih dan air kotor</li>
                                <li>Penyehatan lingkungan kawasan pemukiman</li>
                                <li>Penyehatan lingkungan tempat kerja</li>
                                <li>Penyehatan makanan/minuman</li>
                                <li>Pengamanan pestisida</li>
                                <li>Pengendalian penyakit yang berhubungan dengan lingkungan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Fasilitas Lainnya
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionLayanan">
                    <div class="accordion-body">
                        <div class="mb-3">
                            <p class="mb-0 fw-semibold fs-5">
                                PEMERIKSAAN IVA (Visual Asam Asetat)
                            </p>
                            <p class="mb-0">Jadwal Senin-sabtu Pukul 08.00 – 14.00 WIB</p>
                        </div>
                        <div class="mb-3">
                            <p class="mb-0 fw-semibold fs-5">
                                FARMASI
                            </p>
                            <p class="mb-0">Jadwal Senin-Sabtu (jam 08.00-14.00 WIB)</p>
                            <p class="mb-0">– Pemberian obat sesuai dengan resep dokter</p>
                        </div>
                        <div class="mb-3">
                            <p class="mb-0 fw-semibold fs-5">
                                IMUNISASI
                            </p>
                            <p class="mb-0">Jadwal Senin dan Kamis Pukul 08.00 – 14.00</p>
                            <ul>
                                <li>Imunisasi dasar lengkap</li>
                                <li>Imunisasi TT</li>
                            </ul>
                        </div>
                        <div class="mb-3">
                            <p class="mb-0 fw-semibold fs-5">
                                KONSULTASI GIZI
                            </p>
                            <p class="mb-0">Jadwal Senin- Sabtu  (jam 08.00WIB- 14.00 WIB)</p>
                            <ul>
                                <li>Penanganan balita gizi buruk</li>
                                <li>Penanganan ibu hamil KEK</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- <div id="carouselLayanan" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item rounded bg-body-secondary active">
                    <div class="padCarLay">
                        <p class="mb-0 text-center fs-5 ">Layanan 24 Jam</p>
                        <ol>
                            <li>RUANG UGD</li>
                            <li>RUANG INAP</li>
                            <li>PONED :
                                <ul>
                                    <li>
                                        Persalinan Normal
                                    </li>
                                    <li>
                                        Persalinan Dalam Batas Kewenangan
                                    </li>
                                    <li>
                                        PONED Rujukan Pasien ke RS
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="carousel-item rounded bg-body-secondary">
                    <div class="padCarLay">
                        <p class="mb-0 text-center fs-5 ">Poli Jiwa</p>
                        <p class="mb-0">Jadwal Senin s.d. Sabtu pada pukul 08.00 - 14.00</p>
                        
                    </div>
                </div>
                <div class="carousel-item rounded bg-body-secondary">
                    <div class="padCarLay">
                        <p class="mb-0 text-center fs-5 ">Poli Jiwa</p>
                        <p class="mb-0">Jadwal Senin s.d. Sabtu pada pukul 08.00 - 14.00</p>
                        
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselLayanan" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselLayanan" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}
