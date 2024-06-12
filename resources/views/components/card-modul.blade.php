<div>
    <div data-aos="flip-right" class="card m-3" style="width: 18rem; height:28rem;">
        <div class="card-img-top">
            <img src="/img/{{ $gambar }}" class="img-fluid" alt="Gambar Berita" style="width: 100%; height: 180px; object-fit: cover;">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $judul }}</h5>
            <p class="card-text bg-body-tertiary rounded p-2">
                {{ (strlen($judul) < 26 ) ? substr($deskripsi, 0, 20) : substr($deskripsi, 0, 30) }}...
            </p>
            <a href="/modul/{{ $slug }}">Baca Selengkapnya</a>
            <hr>
            <p class="card-text"><small class="text-body-secondary">Dibuat pada tanggal {{ $date }}</small></p>
        </div>
    </div>
</div>