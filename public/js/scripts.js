
$(document).ready(function(){
    AOS.init({
        duration: 1500,
        once:true
    })

    $('.navbar-nav a').click(function () {
        if ($('.navbar-toggler').is(':visible')) {
          $('.navbar-collapse').collapse('hide');
        }
      });

})