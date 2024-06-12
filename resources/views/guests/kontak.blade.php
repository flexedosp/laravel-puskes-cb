@extends('layouts.app')

@section('container')
<section class="vw-100 h-auto">
  <div id="formKontak">
    <form class="rounded shadow px-4 py-3">
          <h2 class="fw-bold text-center">Silahkan isi form di bawah ini</h2>
            <div class="mb-3">
              <label for="inputNama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="inputNama">
            </div>
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email </label>
              <input type="email" class="form-control" id="inputEmail">
            </div>
            <div class="mb-3">
              <label for="inputTanya" class="form-label">Pertanyaan / Komentar</label>
              <textarea class="form-control" id="inputTanya" name="inputTanya" cols="30" rows="10"></textarea>
            </div>
            <button type="button" class="btn btn-primary">Submit</button>
          </form>
    </div>
</section>
@endsection