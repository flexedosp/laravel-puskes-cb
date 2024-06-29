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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="edit-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#edit-profile-tab-pane" type="button" role="tab"
                                aria-controls="edit-profile-tab-pane" aria-selected="false">Edit Profile</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel"
                            aria-labelledby="profile-tab" tabindex="0">
                            <img src="" class=" rounded" alt="" srcset=""
                                style="width:400px;height:100%;">
                            <p id="namaAdmin" class="fw-semibold"></p>
                            <p id="usernameAdmin" class="fw-semibold"></p>
                            <p id="statusAdmin" class="fw-semibold"></p>
                            <p id="jenisKelaminAdmin" class="fw-semibold"></p>

                        </div>
                        <div class="tab-pane fade" id="edit-profile-tab-pane" role="tabpanel"
                            aria-labelledby="edit-profile-tab" tabindex="0">
                        <form id="FormEditMemberAdmin">

                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer-admin />
        </div>

    </section>
@endsection
