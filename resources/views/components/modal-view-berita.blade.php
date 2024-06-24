<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="modal fade" id="ModalViewBerita" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalViewBeritaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalViewBeritaLabel">View Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearViewBerita()"></button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <p id="judulBerita" class="mb-0 fw-bold fs-3"></p>
                    <p id="penulisBerita" class="mb-0 fw-semibold"></p>
                    <p id="tanggalBerita" class="mb-0 fw-semibold"></p>
                    <div class="d-flex justify-content-center my-3">
                      <img id="gambarBerita" src="" alt="Gambar Berita" style="height: 100%; width:600px" />
                    </div>
                    <p id="deskripsiBerita" class="fw-semibold"></p>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearViewBerita()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
