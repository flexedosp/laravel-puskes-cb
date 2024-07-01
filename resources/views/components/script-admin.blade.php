<script>
    $(document).ready(function() {
        RunSummernote();
        TableDataBerita();
        TableDataModul();
        DataTableFeedbackPasien();
        DataTablePertanyaanPasien();
        TableDataMemberAdmin();
        checkGambar();
        checkGambarAdmin();
    });

    function RunSummernote() {
        $(".summernote").summernote({
            placeholder: "description...",
            tabsize: 2,
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style', 'codeview']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr']]
            ],
        });
        $(".dropdown-toggle").dropdown();
    }

    function checkGambar() {
        $('#inputGambar').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPreviewGambar').attr('src', e.target.result).show();
                };
                $("#previewGambar").removeClass("d-none");
                reader.readAsDataURL(file);
            }
        });
    }

    //#region Bagian Berita
    function TableDataBerita() {
        $('#TableBerita').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('data.berita') }}",
            columns: [{
                    data: 'count',
                    name: 'no'
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <button class="btn btn-primary view-btn ms-2"  data-bs-toggle="modal" data-bs-target="#ModalViewBerita" onclick="ViewBerita(${data})" >View</button>
                        <button class="btn btn-warning edit-btn ms-2"  data-bs-toggle="modal" data-bs-target="#ModalFormBerita" onclick="ViewEditBerita(${data})">Edit</button>
                        <button class="btn btn-danger delete-btn ms-2" onclick="deleteBerita(${data})">Delete</button>
                    `;
                    }
                },
                {
                    data: 'nama',
                    name: 'nama',
                },
                {
                    data: 'terbit',
                    name: 'nama',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        if (data == 1) {
                            return `<span class="badge text-bg-secondary">Draft</span>`;
                        } else if (data == 2) {
                            return `<span class="badge text-bg-success">Publik</span>`;
                        }
                    }
                }

            ],
            order: [
                [1, 'asc']
            ], // Order default berdasarkan kolom pertama setelah nomor urut
            columnDefs: [{
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
                }
            }],
        });
    }

    function ViewBerita(id) {

        $.ajax({
            url: "{{ route('data.detailberita') }}",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                $("#judulBerita").html(data.nama);
                $("#penulisBerita").html("Penulis : " + data.created_by);

                let getDate = new Date(data.created_at);
                let setFormatDate = getDate.getFullYear() + "-" + (getDate.getMonth() < 10 ? "0" + getDate
                    .getMonth() : getDate.getMonth()) + "-" + (getDate.getDate() < 10 ? "0" + getDate
                    .getDate() : getDate.getDate());
                $("#tanggalBerita").html("Tanggal Pembuatan : " + setFormatDate);
                $("#gambarBerita").attr("src", "/img/berita/" + data.gambar);
                $("#deskripsiBerita").html(data.deskripsi);

            }
        })

    }

    function clearViewBerita() {
        $("#judulBerita").html(" ");
        $("#penulisBerita").html(" ");
        $("#tanggalBerita").html(" ");
        $("#gambarBerita").attr("src", " ");
        $("#deskripsiBerita").html(" ");
    }

    function ViewTambahBerita() {
        $("#ModalFormBeritaLabel").html("Tambah Berita");
        $("#submitFormBerita").html("Tambah Data");
        $("#submitFormBerita").attr('onclick', 'TambahBerita()');
    }


    function TambahBerita() {
        var getForm = $("#formDataBerita").get(0);
        var formData = new FormData(getForm);
        // console.log("----------------");
        // formData.forEach(function(value, key) {
        //     console.log(key, value);
        // });
        Swal.fire({
            title: "Data akan di tambah!",
            text: "Apakah anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.createberita') }}",
                    method: "POST",
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil ditambah!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil ditambah! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal ditambah!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function ViewEditBerita(id) {
        $.ajax({
            url: "{{ route('data.detailberita') }}",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#ModalFormBeritaLabel").html("Edit Berita");
                $("#submitFormBerita").html("Edit Data");
                $("#inputBeritaId").val(data.id);
                $("#inputBeritaNama").val(data.nama);

                $('#inputBeritaDeskripsi').summernote({
                    height: 300, // Set the height of the editor
                    // Other Summernote configurations can be added here
                });

                // Set the content of the Summernote editor
                $('#inputBeritaDeskripsi').summernote('code', data.deskripsi);

                $("#inputBeritaTerbit").val(data.terbit);
                $('#showPreviewGambar').attr('src', '/img/berita/' + data.gambar);
                $("#previewGambar").removeClass("d-none");
                $("#submitFormBerita").attr('onclick', 'editBerita()');


            }
        })
    }

    function editBerita() {
        var getForm = $("#formDataBerita").get(0);
        var formData = new FormData(getForm);
        console.log("----------------");
        // formData.forEach(function(value, key) {
        //     console.log(key, value);
        // });
        Swal.fire({
            title: "Data akan diubah!",
            text: "Apakah anda sudah yakin untuk mengubah data ini?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.updateberita') }}",
                    method: "POST",
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil diedit!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil diubah! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal diedit!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function clearFormBerita() {
        $("#ModalFormBeritaLabel").html(" ");
        $("#submitFormBerita").html(" ");
        $("#inputBeritaId").val(" ");
        $("#inputBeritaNama").val(" ");
        $('#inputBeritaDeskripsi').summernote('code', " ");
        $("#inputBeritaTerbit").val(" ");
        $('#showPreviewGambar').attr('src', ' ')
        $("#previewGambar").addClass("d-none");

    }

    function deleteBerita(id) {
        Swal.fire({
            title: "Data akan dihapus!",
            text: "Apakah anda sudah yakin untuk menghapus data ini?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.deleteberita') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: {
                        id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil dihapus!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil dihapus! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal dihapus!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    //#endregion Bagian Berita

    //#region Bagian Modul
    function TableDataModul() {
        $('#TableModul').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('data.modul') }}",
            columns: [{
                    data: 'count',
                    name: 'no'
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <button class="btn btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#ModalViewModul" onclick="ViewModul(${data})" >View</button>
                        <button class="btn btn-warning edit-btn"  data-bs-toggle="modal" data-bs-target="#ModalFormModul" onclick="ViewEditModul(${data})">Edit</button>
                        <button class="btn btn-danger delete-btn" onclick="deleteModul(${data})">Delete</button>
                    `;
                    }
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'terbit',
                    name: 'nama',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        if (data == 1) {
                            return `<span class="badge text-bg-secondary">Draft</span>`;
                        } else if (data == 2) {
                            return `<span class="badge text-bg-success">Publik</span>`;
                        }
                    }
                }

            ],
            order: [
                [1, 'asc']
            ], // Order default berdasarkan kolom pertama setelah nomor urut
            columnDefs: [{
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
                }
            }]
        });
    }

    function ViewModul(id) {

        $.ajax({
            url: "{{ route('data.detailmodul') }}",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#judulModul").html(data.nama);
                $("#penulisModul").html("Penulis : " + data.created_by);

                let getDate = new Date(data.created_at);
                let setFormatDate = getDate.getFullYear() + "-" + (getDate.getMonth() < 10 ? "0" + getDate
                    .getMonth() : getDate.getMonth()) + "-" + (getDate.getDate() < 10 ? "0" + getDate
                    .getDate() : getDate.getDate());
                $("#tanggalModul").html("Tanggal Pembuatan : " + setFormatDate);
                $("#gambarModul").attr("src", "/img/modul/" + data.gambar);
                $("#deskripsiModul").html(data.deskripsi);

            }
        })

    }

    function clearViewModul() {
        $("#judulModul").html(" ");
        $("#penulisModul").html(" ");
        $("#tanggalModul").html(" ");
        $("#gambarModul").attr("src", " ");
        $("#deskripsiModul").html(" ");
    }

    function ViewTambahModul() {
        $("#ModalFormModulLabel").html("Tambah Modul");
        $("#submitFormModul").html("Tambah Data");
        $("#submitFormModul").attr('onclick', 'TambahModul()');
    }

    function TambahModul() {
        var getForm = $("#formDataModul").get(0);
        var formData = new FormData(getForm);
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
        });
        Swal.fire({
            title: "Data akan di tambah!",
            text: "Apakah anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.createmodul') }}",
                    method: "POST",
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil ditambah!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil ditambah! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal ditambah!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function ViewEditModul(id) {
        $.ajax({
            url: "{{ route('data.detailmodul') }}",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#ModalFormModulLabel").html("Edit Modul");
                $("#submitFormModul").html("Edit Data");
                $("#inputModulId").val(data.id);
                $("#inputModulNama").val(data.nama);

                $('#inputModulDeskripsi').summernote({
                    height: 300, // Set the height of the editor
                    // Other Summernote configurations can be added here
                });

                // Set the content of the Summernote editor
                $('#inputModulDeskripsi').summernote('code', data.deskripsi);

                $("#inputModulTerbit").val(data.terbit);
                $('#showPreviewGambar').attr('src', '/img/modul/' + data.gambar);
                $("#previewGambar").removeClass("d-none");
                $("#submitFormModul").attr('onclick', 'editModul()');


            }
        })
    }

    function editModul() {
        var getForm = $("#formDataModul").get(0);
        var formData = new FormData(getForm);
        // console.log("----------------");
        // formData.forEach(function(value, key) {
        //     console.log(key, value);
        // });
        Swal.fire({
            title: "Data akan diubah!",
            text: "Apakah anda sudah yakin untuk mengubah data ini?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.updatemodul') }}",
                    method: "POST",
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil diedit!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil diubah! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal diedit!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function clearFormModul() {
        $("#ModalFormModulLabel").html(" ");
        $("#submitFormModul").html(" ");
        $("#inputModulId").val(" ");
        $("#inputModulNama").val(" ");
        $('#inputModulDeskripsi').summernote('code', " ");
        $("#inputModulTerbit").val(" ");
        $('#showPreviewGambar').attr('src', ' ')
        $("#previewGambar").addClass("d-none");

    }

    function deleteModul(id) {
        Swal.fire({
            title: "Data akan dihapus!",
            text: "Apakah anda sudah yakin untuk menghapus data ini?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.deletemodul') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: {
                        id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil dihapus!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil dihapus! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.modul') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal dihapus!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }
    //#endregion Bagian Modul

    //#region Bagian Admin (For Super Admin)
    function TableDataMemberAdmin() {
        $('#TableMemberAdmin').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('data.memberadmin') }}",
            columns: [{
                    data: 'count',
                    name: 'no'
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <button class=" mx-1 btn btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#ModalViewMemberAdmin" onclick="ViewMemberAdmin(${data})" >View</button>
                        <button class=" mx-1 btn btn-warning delete-btn" onclick="resetPassword(${data})">Reset Password</button>
                        <button class=" mx-1 btn btn-secondary delete-btn" onclick="changeStatus(${data})">Ubah Status</button>
                        <button class=" mx-1 btn btn-danger delete-btn" onclick="deleteMember(${data})">Delete</button>
                    `;
                    }
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'name',
                    name: 'name'
                }

            ],
            order: [
                [1, 'asc']
            ], // Order default berdasarkan kolom pertama setelah nomor urut
            columnDefs: [{
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
                }
            }],
            fixedColumns: {
                leftColumns: 1
            }
        });
    }

    function ViewMemberAdmin(id) {

        $.ajax({
            url: "{{ route('data.detailmemberadmin') }}",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#namaAdmin").html("Nama : " + data.name);
                $("#usernameAdmin").html("Username : " + data.username);
                $("#jenisKelaminAdmin").html("Jenis Kelamin : " + ((data.jenis_kelamin == "1") ? "Pria" :
                    "Wanita"));
                $("#statusMemberAdmin").html("Status : " + ((data.status == "1") ? "Super Admin" :
                    "Admin"));

                let getDate = new Date(data.created_at);
                let setFormatDate = getDate.getFullYear() + "-" + (getDate.getMonth() < 10 ? "0" + getDate
                    .getMonth() : getDate.getMonth()) + "-" + (getDate.getDate() < 10 ? "0" + getDate
                    .getDate() : getDate.getDate());
                $("#tanggalMemberAdmin").html("Tanggal Akun Dibuat : " + setFormatDate);
                // $("#gambarMemberAdmin").attr("src", "/img/admin/" + data.gambar);

            }
        })

    }

    function clearViewMemberAdmin() {
        $("#namaAdmin").html(" ");
        $("#usernameAdmin").html(" ");
        $("#jenisKelaminAdmin").html(" ");
        $("#statusMemberAdmin").attr("src", " ");
        $("#tanggalMemberAdmin").html(" ");
    }

    function ViewTambahMemberAdmin() {
        $("#ModalFormMemberAdminLabel").html("Tambah Member Admin");
        $("#submitFormMemberAdmin").html("Tambah Data");
        $("#submitFormMemberAdmin").attr('onclick', 'TambahMemberAdmin()');
    }

    function TambahMemberAdmin() {

        var getIdForm = $("#formDataMemberAdmin").get(0);
        var formData = new FormData(getIdForm);
        // console.log("----------------");
        // formData.forEach(function(value, key) {
        //     console.log(key, value);
        // });
        Swal.fire({
            title: "Data akan di tambah!",
            text: "Apakah anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.creatememberadmin') }}",
                    method: "POST",
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil ditambah!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Data tidak berhasil ditambah! <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Data batal ditambah!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function resetPassword(id) {
        Swal.fire({
            title: "Password Akan Direset!",
            text: "Pastikan ini permintaan dari yang bersangkutan. Jika tidak, lakukan persetujuan dulu!",
            icon: "warning",
            confirmButtonText: "Sudah Disetujui",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Belum Disetujui",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.resetmemberadmin') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: {
                        id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Password berhasil direset",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Tidak berhasil reset password <br>" + result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Lakukan persetujuan dengan yang bersangkutan!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }

    function clearFormMemberAdmin() {
        $("#ModalFormMemberAdminLabel").html(" ");
        $("#submitFormMemberAdmin").html("Tambah Data");
        $("#submitFormMemberAdmin").attr('onclick', 'TambahMemberAdmin()');
    }

    async function changeStatus(id) {
        let cekStatus = 0;
        const {
            value: status
        } = await Swal.fire({
            title: "Ubah Status Admin",
            input: "select",
            inputOptions: {
                superadmin: "Super Admin",
                admin: "Admin"
            },
            inputPlaceholder: "Pilih status",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ubah",
            showCancelButton: true,
            inputValidator: (value) => {
                return new Promise((resolve) => {


                    if (value == "superadmin") {
                        cekStatus = 1;
                    } else if (value == "admin") {
                        cekStatus = 2;
                    }

                    $.ajax({
                        url: "{{ route('data.detailmemberadmin') }}",
                        method: "GET",
                        dataType: "json",
                        data: {
                            id
                        },
                        success: function(data) {
                            if (cekStatus != data.status) {
                                resolve();
                            } else {
                                resolve(
                                    "Status yang anda pilih sama dengan sebelumnya!"
                                );
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                title: "Error",
                                width: 800,
                                text: "Keterangan : <br>" + textStatus + ". " +
                                    jqXHR
                                    .responseText +
                                    ". " + errorThrown,
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            });
                        }
                    })

                });
            }
        });
        if (status) {
            Swal.fire({
                title: "Perubahan Statsu Admin!",
                text: "Status Admin akan berubah. Anda sudah yakin?",
                icon: "warning",
                confirmButtonText: "Ya",
                confirmButtonColor: "#3085d6",
                showDenyButton: true,
                denyButtonText: "Tidak",
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('data.updatestatusmemberadmin') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content') // Include the CSRF token
                        },
                        data: {
                            id: id,
                            status: cekStatus
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.result == "success") {
                                Swal.fire({
                                    title: "Sukses",
                                    text: "Status berhasil diubah",
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    showCancelButton: false,
                                    allowOutsideClick: false,
                                    confirmButtonColor: "#42f20d",
                                }).then((result) => {
                                    window.location.replace(
                                        '{{ route('admin.memberadmin') }}');
                                });
                            } else {
                                Swal.fire({
                                    title: "Gagal",
                                    html: "<span>Tidak berhasil ubah status admin <br>" +
                                        result
                                        .message + " </span>",
                                    icon: "error",
                                    confirmButtonText: "OK",
                                    showCancelButton: false,
                                    allowOutsideClick: false,
                                    confirmButtonColor: "#fa0000",
                                }).then((result) => {
                                    window.location.replace(
                                        '{{ route('admin.memberadmin') }}');
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                title: "Error",
                                width: 800,
                                text: "Keterangan : <br>" + textStatus + ". " + jqXHR
                                    .responseText +
                                    ". " + errorThrown,
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            });
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire({
                        title: "Batal",
                        text: "Lakukan persetujuan dengan yang bersangkutan!",
                        icon: "error",
                        confirmButtonText: "OK",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonColor: "#fa0000",
                    });
                }

            });
        }
    }

    function deleteMember(id) {
        Swal.fire({
            title: "Akun Akan Dihapus!",
            text: "Anda sudah yakin untuk menghapus akun admin ini?",
            icon: "question",
            confirmButtonText: "Hapus",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Batal",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('data.deletememberadmin') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: {
                        id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Akun berhasil dihapus!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Akun tidak berhasil dihapus! <br>" +
                                    result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('admin.memberadmin') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR
                                .responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Akun batal dihapus",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }

        });
    }
    //#endregion Bagian Admin (For Super Admin)

    //#region Profile Admin
    function showEditProfile() {
        $.ajax({
            url: "{{ route('detailprofile.admin') }}",
            dataType: "json",
            method: "GET",
            success: function(data) {
                $("#idAdmin").val(data.id);
                $("#editNamaAdmin").val(data.name);
                $("#inputJenisKelaminAdmin").val(data.jenis_kelamin);
                let getUsername = data.username.split("@");
                $("#editUsernameAdmin").val(getUsername[0]);
                $("#showGambarAdmin").attr("src", "/img/profile/" + data.gambar);
            }
        })
    }

    function clearEditProfile() {
        $("#editNamaAdmin").val(" ");
        $("#editUsernameAdmin").val(" ");
        $("#editPasswordAdmin").val(" ");
        $("#inputJenisKelaminAdmin").val(" ");
        $("#showGambarAdmin").attr("src", " ");
    }

    function checkGambarAdmin() {
        $('#editGambarAdmin').on('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showGambarAdmin').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });
    }

    function ubahProfileAdmin() {
        let getFormData = $("#FormEditProfileAdmin").get(0);
        const formData = new FormData(getFormData);
        //   console.log("----------------");
        // formData.forEach(function(value, key) {
        //     console.log(key, value);
        // });
        //   console.log("----------------");

        Swal.fire({
            title: "Perubahan Profil Admin!",
            text: "Profil admin akan diubah. Anda sudah yakin?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('editprofile.admin') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include the CSRF token
                    },
                    data: formData,
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Profil berhasil diubah",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('profile.admin') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: "<span>Tidak berhasil ubah profil admin <br>" +
                                    result
                                    .message + " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace(
                                    '{{ route('profile.admin') }}');
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text: "Keterangan : <br>" + textStatus + ". " + jqXHR.responseText +
                                ". " + errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    }
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Batal Melakukan Perubahan Profil!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }
        });
    }
    //#endregion Profile Admin

    //#region Pertanyaan Pasien
    function DataTablePertanyaanPasien(){
        $('#TableDataPertanyaan').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('getpertanyaan.admin') }}",
            columns: [{
                    data: 'count',
                    name: 'no'
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <a href="/admin-list-pertanyaan/${data}" class="btn btn-primary">View Detail</a>
                    `;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row, meta){
                        return `${new Date(data).toLocaleDateString()}`;
                    }
                }

            ],
            order: [
                [1, 'asc']
            ], // Order default berdasarkan kolom pertama setelah nomor urut
            columnDefs: [{
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
                }
            }],
            fixedColumns: {
                leftColumns: 1
            }
        });
    }
    //#endregion Pertanyaan Pasien

    //#region Feedback Pasien
    function DataTableFeedbackPasien(){
        $('#TableDataFeedback').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('getfeedback.admin') }}",
            columns: [{
                    data: 'count',
                    name: 'no'
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <a href="/admin-list-feedback/${data}" class="btn btn-primary">View Detail</a>
                    `;
                    }
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row, meta){
                        return `${new Date(data).toLocaleDateString()}`;
                    }
                }

            ],
            order: [
                [1, 'asc']
            ], // Order default berdasarkan kolom pertama setelah nomor urut
            columnDefs: [{
                targets: 0,
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
                }
            }],
            fixedColumns: {
                leftColumns: 1
            }
        });
    }
    //#endregion Feedback Pasien

</script>
