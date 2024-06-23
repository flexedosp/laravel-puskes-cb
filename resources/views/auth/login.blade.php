@extends('layouts.auth')

<section>
    <div class="mx-auto bg-white rounded shadow" style="top: 35%; width:60vw; height:auto;">
        <div id="logoLogin" class="d-flex justify-content-center">
            <img src="/img/logo_curug_bitung.png" class="img-nav" alt="Logo Curug Bitung">
            <img src="/img/logo_banten.png" class="img-nav" alt="Logo Banten">
            <img src="/img/logo_puskes_cb.png" class="img-nav" alt="Logo Puskesmas Curugbitung">
            <img src="/img/logo_kemenkes.png" class="img-nav" alt="Logo Kemenkes">
        </div>
        <div id="formLogin">
            <h3 class="fw-bold text-center">Login Admin</h3>
            <form action="{{ route('admin.check') }}" method="POST">

                <!-- Email -->
                <div class="mb-3">
                    <label for="emailAdmin" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailAdmin" name="emailAdmin"
                        placeholder="Masukkan email Anda" required>
                </div>

                <div class="mb-3">
                    <label for="passwordAdmin" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin"
                        placeholder="Masukkan password Anda" required>
                </div>

                

                <!-- Tombol Submit -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-75">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>
