
        // $(document).ready(function() {
        //     RunSummernote();
        //     TableDataBerita();
        // });

        // function RunSummernote() {
        //     $(".summernote").summernote({
        //         placeholder: "description...",
        //         tabsize: 2,
        //         height: 300,
        //         toolbar: [
        //             // [groupName, [list of button]]
        //             ["style", ["style"]],
        //             ["style", ["bold", "italic", "underline", "clear"]],
        //             ["font", ["strikethrough", "superscript", "subscript"]],
        //             ["fontsize", ["fontname", "fontsize"]],
        //             ["color", ["color"]],
        //             ["para", ["ul", "ol", "paragraph"]],
        //             ["height", ["height"]],
        //             ["insert", ["link", "picture", "video", "table", "hr"]],
        //         ],
        //     });
        // }

        // function TableDataBerita() {
        //     $('#TableBerita').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "https://127.0.0.1:8000/data-berita",
        //         columns: [{
        //                 data: null,
        //                 name: 'no',
        //                 orderable: false,
        //                 searchable: false
        //             }, // Kolom nomor urut
        //             {
        //                 data: 'nama',
        //                 name: 'nama'
        //             },
        //             // Tambahkan kolom lainnya sesuai dengan model Anda
        //         ],
        //         order: [
        //             [1, 'asc']
        //         ], // Order default berdasarkan kolom pertama setelah nomor urut
        //         columnDefs: [{
        //             targets: 0,
        //             render: function(data, type, row, meta) {
        //                 return meta.row + meta.settings._iDisplayStart + 1; // Kalkulasi nomor urut
        //             }
        //         }]
        //     });
        // }
  