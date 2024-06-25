<script>
    $(document).ready(function() {
        RunSummernote();
        TableDataBerita();
        TableDataModul();
        checkGambar();
    });

    function RunSummernote() {
        $(".summernote").summernote({
            placeholder: "description...",
            tabsize: 2,
            height: 300,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr']]
            ],
        });
    }

    function checkGambar() {
        $('#inputGambar').on('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
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
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
        });
        Swal.fire({
            title: "Data akan di tambah!",
            text: "Apakah anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Yes",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "No",
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
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Data tidak berhasil ditambah!",
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
                            text: "Keterangan : " + textStatus + ". " + jqXHR.responseText + ". " + errorThrown,
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
                $("#inputId").val(data.id);
                $("#inputNama").val(data.nama);

                $('#inputDeskripsi').summernote({
    height: 300, // Set the height of the editor
    // Other Summernote configurations can be added here
  });

  // Set the content of the Summernote editor
  $('#inputDeskripsi').summernote('code', data.deskripsi);

                $("#inputTerbit").val(data.terbit);
                $('#showPreviewGambar').attr('src', '/img/berita/' + data.gambar);
                $("#previewGambar").removeClass("d-none");
        $("#submitFormBerita").attr('onclick', 'editBerita()');


            }
        })
    }
    function editBerita(){
        var getForm = $("#formDataBerita").get(0);
        var formData = new FormData(getForm);
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
        });
        Swal.fire({
            title: "Data akan diubah!",
            text: "Apakah anda sudah yakin untuk mengubah data ini?",
            icon: "question",
            confirmButtonText: "Yes",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "No",
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
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Data tidak berhasil diedit!",
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
                            text: "Keterangan : " + textStatus + ". " + jqXHR.responseText + ". " + errorThrown,
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
        $('#showPreviewGambar').attr('src','')
                $("#previewGambar").addClass("d-none");

    }

    function deleteBerita(id) {
        Swal.fire({
            title: "Data akan dihapus!",
            text: "Apakah anda sudah yakin untuk menghapus data ini?",
            icon: "question",
            confirmButtonText: "Yes",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "No",
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
                    success: function(data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data berhasil dihapus!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace('{{ route('admin.berita') }}');
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Data tidak berhasil dihapus!",
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
                            text: "Keterangan : " + textStatus + ". " + jqXHR.responseText + ". " + errorThrown,
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
                        if (data == 2) {
                            return `<span class="badge text-bg-secondary">Draft</span>`;
                        } else if (data == 1) {
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
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });
        var nama = $('#inputNama').val();

        // Mendapatkan file yang diunggah (gambar)
        var gambar = $('#inputGambar')[0].files[0];

        // Mendapatkan konten HTML dari Summernote
        var deskripsi = $('#inputDeskripsi').summernote('code');

        // Mendapatkan nilai dari select Status Terbit
        var terbit = $('#inputTerbit').val();

        // Menampilkan data yang didapatkan di console (untuk keperluan debug)
        // console.log('Nama:', nama);
        // console.log('Gambar:', gambar);
        // console.log('Deskripsi:', deskripsi);
        // console.log('Status Terbit:', terbit);

        var getIdForm = document.getElementById("#formModul")
        var formData = new FormData(getIdForm);
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
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


            }
        })
    }

    function clearFormModul() {
        $("#ModalFormModulLabel").html(" ");
        $("#submitFormModul").html(" ");

    }

    function deleteModul(id) {

    }
    //#endregion Bagian Modul

    //#region Bagian Admin (For Super Admin)
    function TableDataMemberAdmin() {
        $('#TableMemberAdmin').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [{
                    data: 'count',
                    name: 'no'
                    // orderable: false,
                    // searchable: false
                }, // Kolom nomor urut
                // Tambahkan kolom lainnya sesuai dengan model Anda
                {
                    data: 'id',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `
                        <button class="btn btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#ModalViewMemberAdmin" onclick="ViewMemberAdmin(${data})" >View</button>
                        <button class="btn btn-warning edit-btn"  data-bs-toggle="modal" data-bs-target="#ModalFormMemberAdmin" onclick="ViewEditMemberAdmin(${data})">Edit</button>
                        <button class="btn btn-danger delete-btn" onclick="deleteModul(${data})">Delete</button>
                    `;
                    }
                },
                {
                    data: 'nama',
                    name: 'nama'
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
            url: "",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#judulMemberAdmin").html(data.nama);
                $("#penulisMemberAdmin").html("Penulis : " + data.created_by);

                let getDate = new Date(data.created_at);
                let setFormatDate = getDate.getFullYear() + "-" + (getDate.getMonth() < 10 ? "0" + getDate
                    .getMonth() : getDate.getMonth()) + "-" + (getDate.getDate() < 10 ? "0" + getDate
                    .getDate() : getDate.getDate());
                $("#tanggalMemberAdmin").html("Tanggal Pembuatan : " + setFormatDate);
                $("#gambarMemberAdmin").attr("src", "/img/admin/" + data.gambar);
                $("#deskripsiMemberAdmin").html(data.deskripsi);

            }
        })

    }

    function clearViewMemberAdmin() {
        $("#judulMemberAdmin").html(" ");
        $("#penulisMemberAdmin").html(" ");
        $("#tanggalMemberAdmin").html(" ");
        $("#gambarMemberAdmin").attr("src", " ");
        $("#deskripsiMemberAdmin").html(" ");
    }

    function ViewTambahMemberAdmin() {
        $("#ModalFormMemberAdminLabel").html("Tambah MemberAdmin");
        $("#submitFormMemberAdmin").html("Tambah Data");
        $("#submitFormMemberAdmin").attr('onclick', 'TambahMemberAdmin()');
    }

    function TambahMemberAdmin() {
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });
        var nama = $('#inputNama').val();

        // Mendapatkan file yang diunggah (gambar)
        var gambar = $('#inputGambar')[0].files[0];

        // Mendapatkan konten HTML dari Summernote
        var deskripsi = $('#inputDeskripsi').summernote('code');

        // Mendapatkan nilai dari select Status Terbit
        var terbit = $('#inputTerbit').val();

        // Menampilkan data yang didapatkan di console (untuk keperluan debug)
        // console.log('Nama:', nama);
        // console.log('Gambar:', gambar);
        // console.log('Deskripsi:', deskripsi);
        // console.log('Status Terbit:', terbit);

        var getIdForm = document.getElementById("#formMemberAdmin")
        var formData = new FormData(getIdForm);
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
        });
    }

    function ViewEditMemberAdmin(id) {
        $.ajax({
            url: "",
            method: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $("#ModalFormMemberAdminLabel").html("Edit Member Admin");


            }
        })
    }

    function clearFormMemberAdmin() {
        $("#ModalFormMemberAdminLabel").html(" ");
        $("#submitFormMemberAdmin").html(" ");

    }

    function deleteMember(id) {

    }
    //#endregion Bagian Admin (For Super Admin)
</script>
