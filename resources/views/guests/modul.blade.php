@extends('layouts.app')

@section('container')
    <section class="sectionKonten vw-100 vh-auto" >
      <h2 class="fw-bold text-center">Halaman Modul</h2>
        <div class="container">
          <form id="searchForm" action="{{ route('guest.modul') }}" method="GET">
            <div id="inputSearchModul" class="input-group mb-3">
                <input type="text" class="form-control" id="cariModul" name="cariModul" placeholder="Masukkan Judul atau Tanggal" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary fs-6" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
          </form>
              <div class="d-flex flex-wrap justify-content-center align-items-center">
                  @foreach ($dataModul as $m)
                      <x-card-modul gambar="{{ $m->gambar }}" judul="{{ $m->nama }}" deskripsi="{{ $m->deskripsi }}" slug="{{ $m->slug }}" date="{{ $m->created_at->toDateString() }}"/>
                  @endforeach
              </div>

              <div class="d-flex justify-content-center">
                {{ $dataModul->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection