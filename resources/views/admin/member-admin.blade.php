@extends('layouts.admin')

@section('container-admin')
    <section>
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
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
                <!-- Navbar Header -->
                <x-navbar-admin />
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="ms-auto">
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFormMemberAdmin" onclick="ViewMember()">Tambah Member Admin</button>
                    </div>
                    <div class="my-4">
                        <table id="TableMemberAdmin" class="table table-striped shadow-sm">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Aksi</td>
                                    <td>Username</td>
                                    <td>Nama</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <x-modal-view-member-admin />
            <x-modal-form-member-admin />
            <x-footer-admin />
        </div>

    </section>

@endsection