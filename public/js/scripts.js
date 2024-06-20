$(document).ready(function () {
    AOS.init({
        duration: 1500,
        once: true,
    });

    $(".navbar-nav a").click(function () {
        if ($(".navbar-toggler").is(":visible")) {
            $(".navbar-collapse").collapse("hide");
        }
    });

    scrollEffect();
});

function scrollEffect() {
    var navbar = $("#lowerHeadNav");
    var sectionOffset = $("#mainContainer").offset().top;

    $(window).scroll(function () {
        if ($(window).scrollTop() >= sectionOffset) {
            navbar.addClass("shadow-sm position-fixed vw-100 top-0 z-3 py-2");
        } else {
            navbar.removeClass("shadow-sm position-fixed vw-100 top-0 z-3 py-2");
        }

        // if ($(window).scrollTop() >= sectionOffset) {
        //     navbar.addClass("shadow-sm position-fixed vw-100 top-0 z-3");
        // } else {
        //     navbar.removeClass("shadow-sm position-fixed vw-100 top-0 z-3");
        // }
    });
}
