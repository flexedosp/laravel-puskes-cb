$(document).ready(function () {
    AOS.init({
        duration: 1500,
        once: true,
    });

    $("#navTk").click(function () {
        if ($(".navbar-toggler").is(":visible")) {
            $(".navbar-collapse").collapse("hide");
        }
    });
    $(".nav-effect").click(function () {
        if ($(".navbar-toggler").is(":visible")) {
            $(".navbar-collapse").collapse("hide");
        }
    });

    scrollEffect();
    // cariDataBerita();

    $(window).on("load", function () {
        if (window.location.hash) {
            var hash = window.location.hash;
            var defaultOffset = 100; // Sesuaikan dengan kebutuhan

            setTimeout(function () {
                // Gulir ke target dengan offset setelah halaman sepenuhnya dimuat
                $("html, body").animate(
                    {
                        scrollTop: $(hash).offset().top - defaultOffset,
                    },
                    400
                );
            }, 10); // Memberikan sedikit waktu untuk memastikan halaman selesai memuat
        }
    });
    $(".scroll-link").on("click", function (event) {
        var targetId = $(this).attr("href").split("#");
        var getTargetId = targetId[1];
        var offset = $(this).data("offset") || 0;

        // Cek jika target ada di halaman yang sama
        if ($(targetId).length) {
            // event.preventDefault(); // Mencegah default action hanya jika target ada di halaman yang sama
            scrollHref(getTargetId, offset);
        }
    });
});

function toggleCard(card) {
    card.classList.toggle('active');
}

function scrollEffect() {
    var navbar = $("#lowerHeadNav");
    // var navbarBrand = $(".navbar-brand");
    var sectionOffset = $("#mainContainer").offset().top;

    $(window).scroll(function () {
        if ($(window).scrollTop() >= sectionOffset) {
            navbar.addClass("shadow-sm position-fixed vw-100 top-0 z-index-1000 py-2");
            // navbarBrand.addClass("d-inline").removeClass("d-none");
        } else {
            navbar.removeClass(
                "shadow-sm position-fixed vw-100 top-0 z-index-1000 py-2"
            );
            // navbarBrand.removeClass("d-inline").addClass("d-none");
        }

        // if ($(window).scrollTop() >= sectionOffset) {
        //     navbar.addClass("shadow-sm position-fixed vw-100 top-0 z-3");
        // } else {
        //     navbar.removeClass("shadow-sm position-fixed vw-100 top-0 z-3");
        // }
    });
}

function scrollHref(targetId, offset) {
    var targetElement = $("#" + targetId);

    if (targetElement.length) {
        var elementPosition = targetElement.offset().top;
        var offsetPosition = elementPosition - offset;

        // Scroll dengan animasi
        $("html, body").animate(
            {
                scrollTop: offsetPosition,
            },
            400
        ); // Durasi dalam milidetik
    }
}

function sendPertanyaan(){
    checkForm();
    if (checkForm()) {
        let getFormData = $("#formPertanyaanPasien").get(0);
        const formData = new FormData(getFormData);
        console.log("----------------");
        formData.forEach(function (value, key) {
            console.log(key, value);
        });
        console.log("----------------");

        Swal.fire({
            title: "Form Akan Disubmit!",
            text: "Anda sudah yakin dengan pengisian formnya?",
            icon: "question",
            confirmButtonText: "Ya",
            confirmButtonColor: "#3085d6",
            showDenyButton: true,
            denyButtonText: "Tidak",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/send-pertanyaan",
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Include the CSRF token
                    },
                    data: formData,
                    processData: false, // Required for FormData
                    contentType: false, // Required for FormData
                    success: function (data) {
                        if (data.result == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Form Berhasil Disubmit!",
                                icon: "success",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#42f20d",
                            }).then((result) => {
                                window.location.replace("/");
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html:
                                    "<span>Form Tidak Berhasil Disubmit! <br>" +
                                    result.message +
                                    " </span>",
                                icon: "error",
                                confirmButtonText: "OK",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonColor: "#fa0000",
                            }).then((result) => {
                                window.location.replace("/");
                            });
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            title: "Error",
                            width: 800,
                            text:
                                "Keterangan : <br>" +
                                textStatus +
                                ". " +
                                jqXHR.responseText +
                                ". " +
                                errorThrown,
                            icon: "error",
                            confirmButtonText: "OK",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: "#fa0000",
                        });
                    },
                });
            } else if (result.isDenied) {
                Swal.fire({
                    title: "Batal",
                    text: "Silahkan cek kembali form!",
                    icon: "error",
                    confirmButtonText: "OK",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: "#fa0000",
                });
            }
        });
    }else{
        Swal.fire({
            title: "Terdeteksi Form Kosong",
            text: "Silahkan cek kembali form feedback.",
            icon: "error",
            confirmButtonText: "OK",
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonColor: "#fa0000",
        });
    }   
}

function checkForm() {
    // Variabel untuk menandai apakah semua input terisi
    let allFilled = true;

    // Iterasi melalui semua input, textarea, dan select di dalam form
    $("#formPertanyaanPasien")
        .find("input, textarea, select")
        .each(function () {
            if ($.trim($(this).val()) === "") {
                allFilled = false; // Set flag ke false
            }
        });

    // Jika ada input yang kosong, hentikan proses pengiriman form
    if (!allFilled) {
        return false;
    }
    return true;
}


// function cariDataBerita(){
//     // Menangani submit form pencarian
//     $('#searchForm').on('submit', function (event) {
//         event.preventDefault(); // Mencegah form dari submit secara normal

//         // Ambil URL dari form action
//         var url = $(this).attr('action');
//         // Ambil query string dari form
//         var query = $(this).serialize();

//         // Kirimkan permintaan AJAX
//         $.ajax({
//             url: url,
//             type: 'GET',
//             data: query,
//             success: function (data) {
//                 // Perbarui konten berita dan pagination
//                 $('#beritaContainer').html(data.html);
//                 $('#paginationLinks').html(data.pagination);
//             },
//             error: function (xhr) {
//                 // Tangani kesalahan jika ada
//                 console.log(xhr.responseText);
//             }
//         });
//     });

//     // Menangani klik pada link pagination
//     $(document).on('click', '.pagination a', function (event) {
//         event.preventDefault();
        
//         // Ambil URL dari link pagination yang diklik
//         var url = $(this).attr('href');
        
//         // Kirimkan permintaan AJAX
//         $.ajax({
//             url: url,
//             type: 'GET',
//             success: function (data) {
//                 // Perbarui konten berita dan pagination
//                 $('#beritaContainer').html(data.html);
//                 $('#paginationLinks').html(data.pagination);
//             },
//             error: function (xhr) {
//                 // Tangani kesalahan jika ada
//                 console.log(xhr.responseText);
//             }
//         });
//     });
// }
