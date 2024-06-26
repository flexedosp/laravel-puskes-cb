<div>
    <div class="modal fade" id="ModalFormBerita" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalFormBeritaLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalFormBeritaLabel">Form Berita</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearFormBerita()"></button>
                </div>
                <div class="modal-body">
                    <div style="padding: 80px 100px">
                        <form id="formDataBerita">
                          @csrf
                          <input type="text" id="inputBeritaId" name="inputBeritaId" value="" hidden>

                            <div class="mb-3">
                                <label for="inputBeritaNama" class="form-label">Nama :</label>
                                <input type="text" class="form-control" id="inputBeritaNama" name="inputBeritaNama">
                            </div>
                            <div class="mb-3">
                                <label for="inputBeritaGambar" class="form-label">Gambar Header :</label>
                                <input type="file" class="form-control" id="inputBeritaGambar" name="inputBeritaGambar">
                            <div id="previewGambar" class="d-none mt-2">
                                <img id="showPreviewGambar" src="" alt="Preview Gambar" style="width: 300px;height:100%;">
                            </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputBeritaDeskripsi">Deskripsi</label>
                                <textarea class="summernote" id="inputBeritaDeskripsi" name="inputBeritaDeskripsi"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputBeritaTerbit">Status Terbit</label>

                              <select id="inputBeritaTerbit" name="inputBeritaTerbit" class="form-select" aria-label="Pilih Status Terbit">
                                <option selected>Pilih Status</option>
                                <option value="1">Draft</option>
                                <option value="2">Publik</option>
                              </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button id="submitFormBerita" type="button" class="mx-3 btn btn-primary" onclick="">Tambah Data</button>
                                <button type="button" class="mx-3 btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="clearFormBerita()">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
