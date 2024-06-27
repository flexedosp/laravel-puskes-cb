<div>
    <div class="modal fade" id="ModalFormModul" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalFormModulLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalFormModulLabel">Form Modul</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearFormModul()"></button>
                </div>
                <div class="modal-body">
                    <form id="formDataModul">
                      @csrf
                      <input type="text" id="inputModulId" name="inputModulId" value="" hidden>

                      <div class="mb-3">
                          <label for="inputModulNama" class="form-label">Nama :</label>
                          <input type="text" class="form-control" id="inputModulNama" name="inputModulNama">
                      </div>
                      <div class="mb-3">
                          <label for="inputModulGambar" class="form-label">Gambar Header :</label>
                          <input type="file" class="form-control" id="inputModulGambar" name="inputModulGambar">
                      <div id="previewGambar" class="d-none mt-2">
                          <img id="showPreviewGambar" src="" alt="Preview Gambar" style="width: 300px;height:100%;">
                      </div>
                      </div>
                      <div class="mb-3">
                          <label for="inputModulDeskripsi">Deskripsi</label>
                          <textarea class="summernote" id="inputModulDeskripsi" name="inputModulDeskripsi"></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="inputModulTerbit">Status Terbit</label>

                        <select id="inputModulTerbit" name="inputModulTerbit" class="form-select" aria-label="Pilih Status Terbit">
                          <option selected>Pilih Status</option>
                          <option value="1">Draft</option>
                          <option value="2">Publik</option>
                        </select>
                      </div>
                        <div class="d-flex justify-content-center">
                            <button id="submitFormModul" type="button" class="mx-3 btn btn-primary" onclick="">Tambah Data</button>
                            <button type="button" class="mx-3 btn btn-secondary" data-bs-dismiss="modal"
                                onclick="clearFormModul()">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
