<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.home') }}" class="logo">
                <img
                    src="/img/logo_puskes_cb.png"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="50"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('admin.home') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Konten</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.berita') }}">
                                    <span class="sub-item"
                                        >Berita</span
                                    >
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.modul') }}">
                                    <span class="sub-item"
                                        >Modul</span
                                    >
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if(Auth::user()->status == 1)
                <li class="nav-item">
                    <a href="{{ route('admin.memberadmin') }}">
                        <i class="fas fa-user"></i>
                        <p>Admin</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Feedback Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Pertanyaan Pasien</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->