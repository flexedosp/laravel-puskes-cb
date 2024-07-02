@extends('layouts.app')

@section('container')

    <section class="vw-100 vh-auto">
        <x-carousel :dataBerita="$dataBerita" />
    </section>

    @if (count($dataModul) >= 1)
        <p class="fw-bold fs-4 text-center mt-5">Modul Kesehatan Terkini!</p>
        <section id="card-section" class="vw-100 mx-auto  px-3">
            <div id="cardContainer" class=" mx-auto">
                @foreach ($dataModul as $m)
                    <x-card :judul="$m->nama" :isi="substr($m->deskripsi, 0, 40)" :gambar="$m->gambar" :slug="$m->slug" :tgl="'Dibuat tanggal ' . $m->created_at->toDateString()" />
                @endforeach
            </div>
        </section>

        <div class="d-flex justify-content-center">
            <a href="{{ route('guest.modul') }}" class="btn btn-primary text-decoration-none mt-3 mb-5">Cek Selengkapnya</a>
        </div>
    @else
        <section class="vw-100 vh-50 mx-auto px-3 py-5 my-5">
            <div class="d-flex justify-content-center">
                <p class="fs-3 fw-bold text-wrap text-center">Nantikan Modul Kesehatan dari Puskesmas Curugbitung</p>
            </div>
        </section>
    @endif
@endsection
