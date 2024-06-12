@extends('layouts.app')

@section('container')
    <section class="vw-100 vh-auto" style="padding-top: 5cm">
        <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Berita" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary fs-6" style="padding: 0px 45px" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
              </div>

              <div class="d-flex flex-wrap justify-content-center align-items-center">
                  @foreach ($dataBerita as $b)
                      <x-card-berita gambar="{{ $b->gambar }}" judul="{{ $b->nama }}" deskripsi="{{ $b->deskripsi }}" slug="{{ $b->slug }}" date="{{ $b->createdAt }}"/>
                  @endforeach
              </div>

            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link disabled" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item">
                        <a class="page-link disabled" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </section>
@endsection