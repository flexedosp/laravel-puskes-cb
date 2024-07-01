{{-- shadow-sm position-fixed vw-100 z-3 --}}
<section id="headerNav">
    <div id="upperHeadNav" class="py-3 bg-upper-navbar d-flex flex-row">
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

<nav id="lowerHeadNav" class="navbar navbar-expand-lg bg-navbar py-0 navbar-transition-effect">
    <div class="container-fluid mx-3">
        <a id="navbarLogo" class="navbar-brand" href="/"><img src="/img/logo_puskes_cb.png" class="navbar-logo" alt="Logo Puskesmas Curugbitung">
        </a>
      <button class="ms-auto navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        {{-- navbar-nav  --}}
        <div class="navbar-nav navbarPadding">
            <a class="{{ ($titleNav == 'Beranda') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-effect nav-url-pad" href="<?= route('guest.home') ?>">Beranda</a>
            {{-- <a class="{{ ($titleNav == 'Tentang Kami') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="<?= route('guest.tentangkami') ?>">Tentang Kami</a> --}}
            <div class="{{ ($titleNav == 'Tentang Kami') ? 'fw-bold nav-url-active' : 'nav-url' }}  dropdown">
              <a class="nav-url-undecorat nav-url-pad dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tentang Kami
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.kepalapuskes') ?>">Tentang Kepala Puskesmas</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.strukturorganisasi') ?>">Struktur Organisasi</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.sejarah') ?>">Sejarah Puskesmas</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.visidanmisi') ?>">Visi Dan Misi</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.nilaidanslogan') ?>">Tata Nilai Organisasi & Slogan</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.tenagapuskesmas') ?>">Ketenagaan Puskesmas</a></li>
                <li><a class="dropdown-item nav-effect scroll-link" data-offset="100" href="<?= route('guest.tentangkami.tinjaufasilitas') ?>">Tinjau Sarana & Prasarana</a></li>
              </ul>
            </div>
            <a class="{{ ($titleNav == 'Layanan') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-effect  nav-url-pad " href="<?= route('guest.layanan') ?>">Info Layanan</a>
            <a class="{{ ($titleNav == 'Berita') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-effect nav-url-pad " href="<?= route('guest.berita') ?>">Berita</a>
            <a class="{{ ($titleNav == 'Modul') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-effect nav-url-pad " href="<?= route('guest.modul') ?>">Modul</a>
            <a class="{{ ($titleNav == 'Kontak') ? 'fw-bold nav-url-active' : 'nav-url' }} nav-url-undecorat nav-effect nav-url-pad " href="<?= route('guest.kontak') ?>">Kontak</a>
        </div>
      </div>
    </div>
  </nav>

<a id="feedback" class="btn btn-dark pb-4 text-decoration-none" href="<?= route('guest.formfeedback') ?>" target="_blank">Kritik & Saran</a>
