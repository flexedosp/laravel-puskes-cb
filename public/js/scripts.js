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

function cariDataBerita(){
    // Menangani submit form pencarian
    $('#searchForm').on('submit', function (event) {
        event.preventDefault(); // Mencegah form dari submit secara normal

        // Ambil URL dari form action
        var url = $(this).attr('action');
        // Ambil query string dari form
        var query = $(this).serialize();

        // Kirimkan permintaan AJAX
        $.ajax({
            url: url,
            type: 'GET',
            data: query,
            success: function (data) {
                // Perbarui konten berita dan pagination
                $('#beritaContainer').html(data.html);
                $('#paginationLinks').html(data.pagination);
            },
            error: function (xhr) {
                // Tangani kesalahan jika ada
                console.log(xhr.responseText);
            }
        });
    });

    // Menangani klik pada link pagination
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        
        // Ambil URL dari link pagination yang diklik
        var url = $(this).attr('href');
        
        // Kirimkan permintaan AJAX
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                // Perbarui konten berita dan pagination
                $('#beritaContainer').html(data.html);
                $('#paginationLinks').html(data.pagination);
            },
            error: function (xhr) {
                // Tangani kesalahan jika ada
                console.log(xhr.responseText);
            }
        });
    });
}
