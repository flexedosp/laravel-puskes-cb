@extends('layouts.admin')

@section('container-admin')
    <section>
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <x-navbar-admin />
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="container py-5"> 
                        <p class="fw-bold">Nama Responden/Pasien : {{ $dataFeedback->nama }}</p>
                        <p class="fw-bold">Usia : {{ $dataFeedback->usia }}</p>
                        <p class="fw-bold">Jenis Kelamin : {{ $dataFeedback->jenis_kelamin }}</p>
                        <p class="fw-bold">Email : {{ $dataFeedback->email }}</p>
                        <p class="fw-bold">No. Telp./HP : {{ $dataFeedback->no_telp }}</p>
                        <hr>
                        <p class="fw-bold fs-3 mb-3">Penilaian Responden</p>
                        <p class="fw-bold">Nama Fasilitas : {{ $dataFeedback->nama_fasilitas }}</p>
                        <p class="fw-bold">Nilai Fasilitas : {{ $dataFeedback->nilai_fasilitas }}</p>
                        <p class="fw-bold">Nilai Pelayanan : {{ $dataFeedback->nilai_pelayanan }}</p>
                        <p class="fw-bold">Nilai Kebersihan : {{ $dataFeedback->nilai_kebersihan }}</p>
                        <p class="fw-bold">Nilai Petugas : {{ $dataFeedback->nilai_petugas }}</p>
                        <p class="fw-bold">Isi Feedback : {{ $dataFeedback->isi_feedback }}</p>
                        <hr>
                        <p class="fw-bold">Diisi pada tanggal : {{ $dataFeedback->created_at->toDateString() }}</p>
                    </div>
                </div>
            </div>
            <x-footer-admin />
        </div>

    </section>
@endsection