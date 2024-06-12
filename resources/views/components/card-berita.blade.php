<div>
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
    <div data-aos="flip-right" class="card m-3" style="width: 18rem; height:24rem;">
        <img src="/img/{{ $gambar }}" class="card-img-top" alt="Gambar Berita">
        <div class="card-body">
            <h5 class="card-title">{{ $judul }}</h5>
          <p class="card-text bg-body-tertiary rounded p-2">{{ (strlen($judul) > 48) ? substr($deskripsi, 0, 20) : substr($deskripsi, 0, 40) }}...</p>
          <a href="/berita/{{ $slug }}">Baca Selengkapnya</a>
          <hr>
          <p class="card-text"><small class="text-body-secondary">Dibuat pada tanggal {{ $date }}</small></p>
        </div>
      </div>
</div>