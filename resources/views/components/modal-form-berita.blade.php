<div>
    <div class="modal fade" id="ModalFormBerita" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalFormBeritaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalFormBeritaLabel">Form Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearViewBerita()"></button>
                </div>
                <div class="modal-body">
                    <form id="formBerita" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3">
                            <label for="inputNama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="inputNama" name="inputNama">
                        </div>
                        <div class="mb-3">
                            <label for="inputGambar" class="form-label">Gambar Header :</label>
                            <input type="file" class="form-control" id="inputGambar" name="inputGambar">
                        </div>
                        <div class="mb-3">
                            <label for="inputDeskripsi">Deskripsi</label>
                            <textarea class="summernote" placeholder="Leave a comment here" id="inputDeskripsi" name="inputDeskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                          <select id="inputTerbit" class="form-select" aria-label="Pilih Status Terbit">
                            <option selected>Pilih Status Terbit</option>
                            <option value="1">Draft</option>
                            <option value="2">Publik</option>
                          </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id="submitFormBerita" type="button" class="mx-3 btn btn-primary" onclick="">Tambah Data</button>
                            <button type="button" class="mx-3 btn btn-secondary" data-bs-dismiss="modal"
                                onclick="clearViewBerita()">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
