{{-- shadow-sm position-fixed vw-100 z-3 --}}
<section id="headerNav">
    <div id="upperHeadNav" class="py-3 bg-white d-flex flex-row">
        <img src="/img/logo_curug_bitung.png" class="img-nav" alt="Logo Curug Bitung">
        <img src="/img/logo_banten.png" class="img-nav" alt="Logo Banten">
        <img src="/img/logo_puskes_cb.png" class="img-nav" alt="Logo Puskesmas Curugbitung">
        <img src="/img/logo_kemenkes.png" class="img-nav" alt="Logo Kemenkes">
        <div id="panduanOrtu" class="vw-100 ms-3">
            <p class="fw-semibold ms-auto text-end">Panduan Orang Tua & Anak</p>
            <div class="bg-black w-100 rounded mt-4" style="height: 5%"></div>
        </div>
    </div>
    
</section>

<nav id="lowerHeadNav" class="navbar navbar-expand-lg bg-navbar py-0 ">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
      <button class="ms-auto navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        {{-- navbar-nav  --}}
        <div class="navbar-nav navbarPadding">
            <a class="{{ ($titleNav == 'Beranda') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad" href="<?= route('guest.home') ?>">Beranda</a>
            <a class="{{ ($titleNav == 'Tentang Kami') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.tentangkami') ?>">Tentang Kami</a>
            <a class="{{ ($titleNav == 'Layanan') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.layanan') ?>">Info Layanan</a>
            <a class="{{ ($titleNav == 'Berita') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.berita') ?>">Berita</a>
            <a class="{{ ($titleNav == 'Modul') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.modul') ?>">Modul</a>
            <a class="{{ ($titleNav == 'Kontak') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.kontak') ?>">Kontak</a>
        </div>
      </div>
    </div>
  </nav>

<button type="button" id="feedback" class="btn btn-dark pb-4">Kritik & Saran</button>
