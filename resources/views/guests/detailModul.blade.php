@extends('layouts.app')

@section('container')
    <section id="detailModul" class="container">
        <p class="fs-2 fw-bold mb-1">{{ $dataModul->nama }}</p>
        <p class="fw-normal">Penulis {{ $dataModul->createdBy }} | Dibuat pada tanggal {{ $dataModul->createdAt }}</p>
       <div class="d-flex justify-content-center my-3">
           <img src="/img/{{ $dataModul->gambar }}" class="rounded" style="width: 500px; height:auto" alt="">
       </div>
        <p class="font-semibold px-3">{{ $dataModul->deskripsi }}</p>
    </section>
@endsection
