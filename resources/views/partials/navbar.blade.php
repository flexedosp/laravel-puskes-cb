
<section id="headerNav" class="shadow-lg position-fixed vw-100">
    <div class="py-2" style="padding-left:100px;padding-right:100px">
        <img src="/img/logo_curug_bitung.png" class="img-nav" alt="Logo Curug Bitung">
        <img src="/img/logo_banten.png" class="img-nav" alt="Logo Banten">
        <img src="/img/logo_kemenkes.png" class="img-nav" alt="Logo Kemenkes">
    </div>
    <nav class="navbar-expand-lg bg-navbar">
        <div class="navbarPadding d-flex flex-row ">
            <a class="{{ ($titlePage == 'Beranda') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad" href="/">Beranda</a>
            <a class="{{ ($titlePage == 'Tentang Kami') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/tentangkami">Tentang Kami</a>
            <a class="{{ ($titlePage == 'Layanan') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/layanan">Info Layanan</a>
            <a class="{{ ($titlePage == 'Modul') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/modul">Modul</a>
            <a class="{{ ($titlePage == 'Kontak') ? 'nav-url-active' : 'nav-url' }} nav-url-undecorat nav-url-pad " href="/kontak">Kontak</a>
        </div>
    </nav>
</section>
