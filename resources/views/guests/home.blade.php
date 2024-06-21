@extends('layouts.app')

{{-- @push('banner')
    <section id="bannerOp" class="vw-100 vh-auto text-black">
        <div class="container px-2 container-py-1">
            <div class="d-flex flex-wrap justify-content-center">
                <img data-aos="fade-in" id="gambarOp" src="/img/group_kids.png" alt="Gambar Super Kids">
                <div data-aos="fade-in" id="textOp" class="text-white">
                    <p class="fs-2 fw-bold">Puskesmas Curugbitung</p>
                    <p class="fw-semibold">Selamat datang di website Puskesmas Curugbitung, Lebak, Banten. <br> 
                        Website ini merupakan website informatif terkait layanan Puskesmas. 
                        Website ini juga menyediakan Modul Pengasuhan Positif dan Modul Stimulasi Perkembangan untuk Anak Usia Dini, yang dapat digunakan Ayah Ibu untuk menemani pertumbuhan dan perkembangan anak sesuai usia-nya. 
                        
                        </p>

                    <p class="fw-semibold">
                        Ayo, Ayah dan Bunda! Pelajari dan terapkan agar perjalanan pengasuhan penuh berkesadaran, bahagia dan minim stress. 
                    </p>
                </div>
            </div>
        </div>
    </section>
@endpush --}}

@section('container')

<section class="vw-100 vh-auto">
    <x-carousel :dataBerita="$dataBerita" />
    </section>

    <section id="card-section" class="vw-100 mx-auto px-3">
        <div id="cardContainer" class=" my-5 ">
            <x-card judul="{{ $titleCard }}" isi="{{ $isiCard }}" />
            <x-card judul="{{ $titleCard }}" isi="{{ $isiCard }}" />
        </div>
    </section>
@endsection
