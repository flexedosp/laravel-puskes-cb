<script>
    $(document).ready(function() {
        RunSummernote();
        TableDataBerita();
        TableDataModul();
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

    //#region Bagian Berita
    function TableDataBerita() {
        $('#TableBerita').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.berita') }}",
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
                        <button class="btn btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#ModalViewBerita" onclick="ViewBerita(${data})" >View</button>
                        <button class="btn btn-warning edit-btn"  data-bs-toggle="modal" data-bs-target="#ModalFormBerita" onclick="ViewEditBerita(${data})">Edit</button>
                        <button class="btn btn-danger delete-btn" onclick="deleteBerita(${data})">Delete</button>
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
                let setFormatDate =  getDate.getFullYear() + "-"+ (getDate.getMonth() < 10 ? "0" + getDate.getMonth() : getDate.getMonth() ) + "-" + (getDate.getDate() < 10 ? "0" + getDate.getDate() : getDate.getDate());
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

        var getIdForm = document.getElementById("#formBerita")
        var formData = new FormData(getIdForm);
        console.log("----------------");
        formData.forEach(function(value, key) {
            console.log(key, value);
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


            }
        })
    }

    function clearFormBerita() {
        $("#ModalFormBeritaLabel").html(" ");
        $("#submitFormBerita").html(" ");

    }

    function deleteBerita(id) {

    }

    //#endregion Bagian Berita

    //#region Bagian Modul
    function TableDataModul() {
        $('#TableModul').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data.modul') }}",
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
                        <button class="btn btn-primary view-btn"  data-bs-toggle="modal" data-bs-target="#ModalViewModul" onclick="ViewModul(${data})" >View</button>
                        <button class="btn btn-warning edit-btn"  data-bs-toggle="modal" data-bs-target="#ModalFormModul" onclick="ViewEditModul(${data})">Edit</button>
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
                let setFormatDate =  getDate.getFullYear() + "-"+ (getDate.getMonth() < 10 ? "0" + getDate.getMonth() : getDate.getMonth() ) + "-" + (getDate.getDate() < 10 ? "0" + getDate.getDate() : getDate.getDate());
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
            ajax: "{{ route('data.member-admin') }}",
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
            url: "{{ route('data.detailadmin') }}",
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
                let setFormatDate =  getDate.getFullYear() + "-"+ (getDate.getMonth() < 10 ? "0" + getDate.getMonth() : getDate.getMonth() ) + "-" + (getDate.getDate() < 10 ? "0" + getDate.getDate() : getDate.getDate());
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
            url: "{{ route('data.detailadmin') }}",
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
