<div>
    <div class="modal fade" id="ModalFormMemberAdmin" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="ModalFormMemberAdminLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ModalFormMemberAdminLabel">Form Member Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="clearFormMemberAdmin()"></button>
                </div>
                <div class="modal-body">
                    <div style="padding: 80px 100px">
                        <form id="formDataMemberAdmin">
                            @csrf
                            <input type="text" id="inputMemberAdminId" name="inputMemberAdminId" value=""
                                hidden>

                            <div class="mb-3">
                                <label for="inputMemberAdminNama" class="form-label">Nama :</label>
                                <input type="text" class="form-control" id="inputMemberAdminNama"
                                    name="inputMemberAdminNama">
                            </div>
                            <div class=" mb-3">
                                <label for="inputMemberAdminUsername" class="form-label">Username :</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inputMemberAdminUsername"
                                        name="inputMemberAdminUsername" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2">@pcb.com</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputMemberAdminJenisKelamin" class="form-label">Jenis kelamin :</label>
                                <select id="inputMemberAdminJenisKelamin" name="inputMemberAdminJenisKelamin"
                                    class="form-select" aria-label="Pilih Jenis Kelamin">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="1">Pria</option>
                                    <option value="2">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputMemberAdminStatus" class="form-label">Status :</label>
                                <select id="inputMemberAdminStatus" name="inputMemberAdminStatus"
                                    class="form-select" aria-label="Pilih Status">
                                    <option selected>Pilih Status</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button id="submitFormMemberAdmin" type="button" class="mx-3 btn btn-primary"
                            onclick="">Tambah Data</button>
                        <button type="button" class="mx-3 btn btn-secondary" data-bs-dismiss="modal"
                            onclick="clearFormMemberAdmin()">Tutup</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
