@extends('layouts.app')

@section('container')
    <section class="vw-100 vh-auto sectionKonten">
        <h2 class="fw-bold text-center">Halaman Berita</h2>
        <div class="container">
            <form id="searchForm" action="{{ route('guest.berita') }}" method="GET">
                <div id="inputSearchBerita" class="input-group mb-3">
                    <input type="text" class="form-control" id="cariBerita" name="cariBerita" placeholder="Masukkan Judul atau Tanggal . . ."
                        aria-label="Recipient's username" aria-describedby="button-addon2"
                        value="{{ request('cariBerita') }}">
                    <button class="btn btn-outline-primary fs-6" type="submit" id="button-addon2"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

            <div class="d-flex flex-wrap justify-content-center align-items-center">
                @foreach ($dataBerita as $b)
                    <x-card-berita gambar="{{ $b->gambar }}" judul="{{ $b->nama }}"
                        slug="{{ $b->slug }}" date="{{ $b->created_at->toDateString() }}" />
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $dataBerita->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
