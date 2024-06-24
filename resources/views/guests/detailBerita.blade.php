@extends('layouts.app')

@section('container')
    <section id="detailBerita" class="container">
        <p class="fs-2 fw-bold mb-1">{{ $dataBerita->nama }}</p>
        <p class="fw-normal">Penulis {{ $dataBerita->created_by }} | Dibuat pada tanggal {{ $dataBerita->created_at->toDateString() }}</p>
       <div class="d-flex justify-content-center my-3">
           <img src="/img/{{ $dataBerita->gambar }}" class="rounded" style="width: 500px; height:auto" alt="">
       </div>
        <p class="font-semibold px-3">{{ $dataBerita->deskripsi }}</p>
    </section>
@endsection
