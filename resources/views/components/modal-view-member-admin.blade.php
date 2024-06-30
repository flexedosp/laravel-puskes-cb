<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div class="modal fade" id="ModalViewMemberAdmin" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalViewMemberAdminLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalViewMemberAdminLabel">View Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearViewMemberAdmin()"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div id="previewGambarMemberAdmin" class="d-flex justify-content-center my-3 d-none">
                            <img id="gambarMemberAdmin" src="" alt="Gambar Admin"
                                style="height: 100%; width:600px" />
                        </div>
                        <p id="namaAdmin" class="mb-0 fw-bold fs-3"></p>
                        <p id="jenisKelaminAdmin" class="mb-0 fw-semibold"></p>
                        <p id="statusMemberAdmin" class="mb-0 fw-semibold"></p>
                        <p id="tanggalMemberAdmin" class="mb-0 fw-semibold"></p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="clearViewMemberAdmin()">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
