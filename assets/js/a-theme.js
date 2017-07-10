(function($) {
  $(function() {
    var $window = $(window);
    var $nav = $('header.top');
    var $headerTop = $('header.top');
    var $mobileMenuButton = $headerTop.find('.mobile-menu-button');
    var $mobileMenu = $headerTop.find('.mobile-menu');
    //mobile menu
    $mobileMenuButton.click(function(){
      $mobileMenu.slideToggle(200);
    });
    //header animation
    $window.scroll(function() {
      if($(this).scrollTop() >= 500) {
        $nav.addClass('sticky header-top-in-a')
        .removeClass('header-top-out-a');
      } else {
        $nav.removeClass('sticky header-top-in-a');
      }
    });
  });
})( jQuery );
