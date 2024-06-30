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
                    <div class="mx-auto my-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="true"
                                    onclick="clearEditProfile()">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4" id="edit-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#edit-profile-tab-pane" type="button" role="tab"
                                    aria-controls="edit-profile-tab-pane" aria-selected="false"
                                    onclick="showEditProfile()">Edit
                                    Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="bg-white border tab-pane fade show active" style="height: 200" id="profile-tab-pane"
                                role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <div class="container py-5 mx-4 d-flex">
                                    <div class="me-5">
                                        <img src="/img/profile/{{ $dataAdmin->gambar }}" class=" rounded" alt=""
                                            srcset="" style="width:200px;height:100%;">
                                    </div>
                                    <div class="me-5">
                                        <p id="namaAdmin" class="fw-semibold">Nama : {{ $dataAdmin->name }}</p>
                                        <p id="usernameAdmin" class="fw-semibold">Username : {{ $dataAdmin->username }}</p>
                                        <p id="statusAdmin" class="fw-semibold">Status Admin :
                                            {{ $dataAdmin->status == 1 ? 'Super Admin' : 'Admin' }}</p>
                                        <p id="jenisKelaminAdmin" class="fw-semibold">Jenis Kelamin :
                                            {{ $dataAdmin->jenis_kelamin == 1 ? 'Pria' : 'Wanita' }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="bg-white border tab-pane fade" id="edit-profile-tab-pane" role="tabpanel"
                                aria-labelledby="edit-profile-tab" tabindex="0">
                                <div class="container py-5 mx-4 d-flex">
                                    <div id="previewGambarAdmin" class="me-5">
                                        <img src="" class="rounded" id="showGambarAdmin"
                                            alt="Gambar Profil Admin" style="width:400px;height:100%;">
                                    </div>
                                    <div class="me-5">
                                        <form id="FormEditProfileAdmin">
                                            @csrf
                                            <input type="text" name="idAdmin" id="idAdmin" value="" hidden>
                                            <div class="mb-3">
                                                <label for="editNamaAdmin">Nama : </label>
                                                <input type="text" id="editNamaAdmin" name="editNamaAdmin" value=""
                                                    class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editUsernameAdmin">Username : </label>
                                                <div class="input-group">
                                                    <input type="text" id="editUsernameAdmin" name="editUsernameAdmin"
                                                        value="" class="form-control" aria-describedby="basic-addon2">
                                                        <span class="input-group-text" id="basic-addon2">@pcb.com</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputJenisKelaminAdmin" class="form-label">Jenis kelamin : </label>
                                                <select id="inputJenisKelaminAdmin" name="inputJenisKelaminAdmin"
                                                    class="form-select" aria-label="Pilih Jenis Kelamin">
                                                    <option selected>Pilih Jenis Kelamin</option>
                                                    <option value="1">Pria</option>
                                                    <option value="2">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editPasswordAdmin">Password : </label>
                                                <input type="password" id="editPasswordAdmin" name="editPasswordAdmin"
                                                    value="" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editGambarAdmin">Gambar Profile : </label>
                                                <input type="file" id="editGambarAdmin" name="editGambarAdmin"
                                                     class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary px-3" onclick="ubahProfileAdmin()">Ubah
                                                    Profil</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer-admin />
        </div>

    </section>
@endsection
