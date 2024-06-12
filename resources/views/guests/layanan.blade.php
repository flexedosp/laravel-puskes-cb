@extends('layouts.app')

@section('container')
    <section id="sectionLayanan" class="vw-100 vh-auto">
        <h2 class="fw-bold text-center">Informasi Layanan Puskesmas</h2>
        <p>Pendaftaran setiap Senin s.d. Sabtu pada pukul 08.00 - 12.00 WIB</p>
        <div id="carouselLayanan" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item rounded bg-body-secondary active">
                    <div class="padCarLay">
                        <p class="text-center fs-5 ">Layanan 24 Jam</p>
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
                        <p class="text-center fs-5 ">Poli Jiwa</p>
                        <p>Jadwal Senin s.d. Sabtu pada pukul 08.00 - 14.00</p>
                        
                    </div>
                </div>
                <div class="carousel-item rounded bg-body-secondary">
                    <div class="padCarLay">
                        <p class="text-center fs-5 ">Poli Jiwa</p>
                        <p>Jadwal Senin s.d. Sabtu pada pukul 08.00 - 14.00</p>
                        
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
        </div>

    </section>
@endsection
