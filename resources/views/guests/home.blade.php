@extends('layouts.app')

@push('banner')
    <section id="bannerOp" class="vw-100 vh-100 text-black">
        <div class="container px-2 container-py-1">
            <div class="d-flex flex-wrap justify-content-center">
                <img id="gambarOp" src="/img/group_kids.png" alt="Gambar Super Kids">
                <div id="textOp" class="text-white">
                    <p class="fs-2 fw-bold">Puskesmas Curugbitung</p>
                    <p class="fw-semibold">Selamat datang di website Puskesmas Curugbitung. Selain info dan layanan mengenai puskesmas, kami menyediakan modul tumbuh kembang anak. Modul tersebut terdapat dua bagian yaitu modul pengasuahn anak dan modul tumbuh kembang.</p>

                    <p class="fw-semibold">
                        Ayo bunda dan ayah, pelajari cara epngasuhan anak dan tumbuh kembang anak sesuai dengan usia anak bunda dan ayah ya.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endpush

@section('container')

<section class="vw-100 vh-100">
    <x-carousel />
    </section>

    <section id="card-section" class="vw-100 mx-auto px-3">
        <div id="cardContainer" class=" my-5 ">
            <x-card judul="{{ $titleCard }}" isi="{{ $isiCard }}" />
            <x-card judul="{{ $titleCard }}" isi="{{ $isiCard }}" />
        </div>
    </section>
@endsection
