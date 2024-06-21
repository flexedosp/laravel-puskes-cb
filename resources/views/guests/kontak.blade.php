@extends('layouts.app')

@section('container')
<section class="vw-100 h-auto">
  <div class="d-flex flex-wrap justify-content-center container-padding w-100">
    <div class="m-3">
      <h3 class="fw-bold">Lokasi</h3>
      <iframe id="gMapsKontak" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.1473597056831!2d106.41285812856961!3d-6.44672556697024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420ced9a5111ff%3A0x84d5f4c6d305c0f4!2sPuskesmas%20Curugbitung!5e0!3m2!1sid!2sid!4v1718815209753!5m2!1sid!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <p></p>
    </div>
    <div id="formKontak" class="m-3">
      <h3 class="fw-bold text-center">Silahkan isi form di bawah ini</h3>
      <form class="px-4 py-3">
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
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary w-75">Submit</button>
              </div>
            </form>
      </div>
  </div>
</section>
@endsection