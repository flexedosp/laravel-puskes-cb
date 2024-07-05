<div>
    <div data-aos="flip-right" class="card m-3" style="width: 18rem; min-height:100%;">
        <div class="card-img-top">
            <img src="/img/modul/{{ $gambar }}" class="img-fluid" alt="Gambar Berita" style="width: 100%; height: 180px; object-fit: cover;">
        </div>
        <div class="card-body">
            <p class="card-title fs-6 fw-bold mb-4 lh-sm">{{ $judul }}</p>
            {{-- <p class="card-text bg-body-tertiary rounded p-2">
                {{ (strlen($judul) < 26 ) ? substr($deskripsi, 0, 20) : substr($deskripsi, 0, 40) }}...
            </p>             --}}
            <a class="btn btn-sm btn-primary text-decoration-none mb-2 fw-semibold"  href="/modul/{{ $slug }}">Baca Selengkapnya</a>
            <hr>
            <p class="card-text"><small class="text-body-secondary">Dibuat pada tanggal {{ $date }}</small></p>
        </div>
    </div>
</div>
