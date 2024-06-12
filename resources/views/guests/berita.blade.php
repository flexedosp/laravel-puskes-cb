@extends('layouts.app')

@section('container')
    <section class="vw-100 vh-auto" style="padding-top: 5cm">
        <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Berita" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary fs-6" style="padding: 0px 45px" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>
            @foreach ($dataBerita as $berita)
                <p>
    {{ $berita->id }}
                </p>
            @endforeach
        </div>
    </section>
@endsection