<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="modal fade" id="ModalViewModul" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalViewModulLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalViewModulLabel">View Modul</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearViewModul()"></button>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <p id="judulModul" class="mb-0 fw-bold fs-3"></p>
                    <p id="penulisModul" class="mb-0 fw-semibold"></p>
                    <p id="tanggalModul" class="mb-0 fw-semibold"></p>
                    <div class="d-flex justify-content-center my-3">
                      <img id="gambarModul" src="" alt="Gambar Modul" style="height: 100%; width:600px" />
                    </div>
                    <p id="deskripsiModul" class="fw-semibold"></p>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearViewModul()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
