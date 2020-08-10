(function($) {
  "use strict";

  // toggle mobile menu
  $('#hamburger').click(function() {
    $(this).toggleClass('active');
    $('#header-menu').toggleClass('active');
  });

  // max mega menu
  function megaMenuOverides() {
    var winWidth = $(window).width();
    if($('#header-menu .mega-menu-wrap').length) {
      $('#header-main').addClass('mega-menu');      
    } else {
      $('#header-menu').addClass('default-menu');
    }
  }
  megaMenuOverides();
  $(window).resize(function() {
    megaMenuOverides();
  });

}(jQuery));
