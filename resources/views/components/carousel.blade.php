@props(['dataBerita'])

<div>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($dataBerita as $d )
            <div class="carousel-item vh-100 active">
                <img src="/img/{{ $d->gambar }}" class="d-block w-100 h-100 img-carousel" alt="Gambar Carousel" style="object-fit: cover;">
                <div class="position-absolute top-50 start-50 translate-middle text-white">
                    <p class="text-center fs-3 fw-bold text-wrap">{{ $d->nama }}</p>
                    <p class="text-center fw-semibold">{{ substr($d->deskripsi, 0, 40) }}</p>
                <a class="d-flex justify-content-center a-text-undecorat-white fs-6" href="/berita/{{ $d->slug }}">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
            {{-- <div class="carousel-item vh-100">
                <img src="/img/puskes_depan_02.png" class="d-block w-100 h-100 img-carousel" alt="Gambar Carousel" style="object-fit: cover;">
                <div class="position-absolute top-50 start-50 translate-middle text-white">
                    <p class="text-center fs-3 fw-bold text-wrap"> 2. Puskesmas Curug Bitung</p>
                    <p class="text-center fw-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore eaque iure dolorem distinctio enim iste.</p>
                    <a class="d-flex justify-content-center a-text-undecorat-white fs-6" href="#">Baca Selengkapnya</a>
                </div>
            </div>
            <div class="carousel-item vh-100">
                <img src="/img/puskes_depan_01.png" class="d-block w-100 h-100 img-carousel" alt="Gambar Carousel" style="object-fit: cover;">
                <div class="position-absolute top-50 start-50 translate-middle text-white">
                    <p class="text-center fs-3 fw-bold text-wrap"> 3. Puskesmas Curug Bitung</p>
                    <p class="text-center fw-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore eaque iure dolorem distinctio enim iste.</p>
                    <a class="d-flex justify-content-center a-text-undecorat-white fs-6" href="#">Baca Selengkapnya</a>
                </div>
            </div> --}}
        </div>
        <button class="carousel-control-prev bg-white" style="top: 38%; height:100px; width:50px" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            <i class="fa-solid fa-chevron-left text-primary fs-1"></i>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next bg-white" style="top: 38%; height:100px; width:50px" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            <i class="fa-solid fa-chevron-right text-primary fs-1"></i>
            <span class="visually-hidden">Next</span>
        </button>
    </div>    
</div>
