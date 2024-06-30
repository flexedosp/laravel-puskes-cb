@props(['dataBerita'])

<div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            {{-- @php $counter = 1; @endphp  --}}
            {{-- {{ $counter === 1 ? 'active' : '' }} --}}
            <div class="carousel-item vh-100 active">
                <img src="/img/tentang_kami/pengurus_puskesmas.jpeg" class="d-block w-100 h-100 img-carousel" alt="Gambar Carousel" style="object-fit: cover;">
                <div class="position-absolute top-50 start-50 translate-middle text-white">
                    <p class="text-center fs-1 fw-bold text-wrap">Selamat Datang di Website<br> Puskesmas Curugbitung</p>
                    <p class="text-center fs-3 fw-semibold">Curugbitung...bisa!</p>
                </div>
            </div>
            @foreach ($dataBerita as $d )
            <div class="carousel-item vh-100 ">
                <img src="/img/{{ $d->gambar }}" class="d-block w-100 h-100 img-carousel" alt="Gambar Carousel" style="object-fit: cover;">
                <div class="position-absolute top-50 start-50 translate-middle text-white">
                    <p class="text-center fs-3 fw-bold text-wrap">{{ $d->nama }}</p>
                    <p class="text-center fw-semibold">{{ substr($d->deskripsi, 0, 40) }}...</p>
                <a class="d-flex justify-content-center a-text-undecorat-white fs-6" href="/berita/{{ $d->slug }}">Baca Selengkapnya</a>
                </div>
            </div>
            {{-- @php $counter++; @endphp --}}
            @endforeach
            
        </div>
        @if($dataBerita)
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
        @endif
    </div>    
</div>
