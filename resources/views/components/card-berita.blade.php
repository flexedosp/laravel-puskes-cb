<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div data-aos="flip-right" class="card m-3" style="width: 18rem; min-height:100%;">
        <img src="/img/berita/{{ $gambar }}" class="card-img-top" alt="Gambar Berita">
        <div class="card-body">
            <p class="card-title fs-6 fw-bold mb-4 lh-sm">{{ $judul }}</p>
          {{-- <p class="card-text bg-body-tertiary rounded p-2">{{ (strlen($judul) > 48) ? substr($deskripsi, 0, 20) : substr($deskripsi, 0, 40) }}...</p> --}}
          <a class="btn btn-sm btn-primary text-decoration-none mb-2 fw-semibold"  href="/berita/{{ $slug }}">Baca Selengkapnya</a>
          <hr >
          <p class="card-text"><small class="text-body-secondary">Dibuat pada tanggal {{ $date }}</small></p>
        </div>
      </div>
</div>