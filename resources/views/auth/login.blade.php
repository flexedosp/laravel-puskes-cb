@extends('layouts.auth')

@section('container-auth')
    <section>
        @if (session('errorLogin'))
            <div class="d-flex justify-content-center mx-auto">
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('errorLogin') }}
                </div>
            </div>
        @endif

        <div id="divLoginAdmin" class="mx-auto bg-white rounded shadow position-absolute top-50 start-50 translate-middle">
            <div id="logoLogin" class="d-flex justify-content-center">
                <img src="/img/logo_curug_bitung.png" class="img-login" alt="Logo Curug Bitung">
                <img src="/img/logo_banten.png" class="img-login" alt="Logo Banten">
                <img src="/img/logo_puskes_cb.png" class="img-login" alt="Logo Puskesmas Curugbitung">
                <img src="/img/logo_kemenkes.png" class="img-login" alt="Logo Kemenkes">
            </div>
            <div id="formLogin">
                <h3 class="fw-bold text-center">Login Admin</h3>
                <form action="{{ route('admin.check') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="emailAdmin" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailAdmin" name="emailAdmin"
                            placeholder="Masukkan email Anda" value="{{ old('emailAdmin') }}">
                    </div>

                    <div class="mb-3">
                        <label for="passwordAdmin" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin"
                            placeholder="Masukkan password Anda" value="{{ old('passwordAdmin') }}">
                        {{-- value="{{ old('passwordAdmin') }}" --}}
                    </div>
                    <!-- Tombol Submit -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
