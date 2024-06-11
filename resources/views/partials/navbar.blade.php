
<section id="headerNav" class="shadow-sm position-fixed vw-100 z-3">
    <div class="py-3 bg-white d-flex flex-row" style="padding-left:100px;padding-right:50px">
        <img src="/img/logo_curug_bitung.png" class="img-nav" alt="Logo Curug Bitung">
        <img src="/img/logo_banten.png" class="img-nav" alt="Logo Banten">
        <img src="/img/logo_kemenkes.png" class="img-nav" alt="Logo Kemenkes">
        <div class="vw-100 ms-3">
            <p class="fw-semibold ms-auto text-end">Panduan Orang Tua & Anak</p>
            <div class="bg-black w-100 rounded mt-4" style="height: 5%"></div>
        </div>
    </div>
    <nav class="navbar-expand-lg bg-navbar">
        <div class="navbarPadding d-flex flex-row fw-semibold ">
            <a class="{{ ($titleNav == 'Beranda') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad" href="/">Beranda</a>
            <a class="{{ ($titleNav == 'Tentang Kami') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/tentangkami">Tentang Kami</a>
            <a class="{{ ($titleNav == 'Layanan') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/layanan">Info Layanan</a>
            <a class="{{ ($titleNav == 'Berita') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/berita">Berita</a>
            <a class="{{ ($titleNav == 'Modul') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/modul">Modul</a>
            <a class="{{ ($titleNav == 'Kontak') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/kontak">Kontak</a>
        </div>
    </nav>
</section>

<button type="button" id="feedback" class="btn btn-dark pb-4">Kritik & Saran</button>
