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
                        <p class="fw-bold">Nama Responden/Pasien : {{ $dataPertanyaan->nama }}</p>
                        <p class="fw-bold">Usia : {{ $dataPertanyaan->usia }}</p>
                        <p class="fw-bold">Jenis Kelamin : {{ $dataPertanyaan->jenis_kelamin }}</p>
                        <p class="fw-bold">Email : {{ $dataPertanyaan->email }}</p>
                        <p class="fw-bold">No. Telp./HP : {{ $dataPertanyaan->no_telp }}</p>
                        <hr>
                        <p class="fw-bold fs-3">Isi Pertanyaan : </p>
                        <div class="bg-white rounded p-4 shadow-sm">
                            <p class="fw-bold">{{ $dataPertanyaan->isi_pertanyaan }}</p>
                        </div>
                        <hr>
                        <p class="fw-bold">Diisi pada tanggal : {{ $dataPertanyaan->created_at->toDateString() }}</p>
                    </div>
                </div>
            </div>
            <x-footer-admin />
        </div>

    </section>
@endsection