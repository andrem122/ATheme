(function($) {
  $(function() {
    var $headerTop = $('header.top');
    var $mobileMenuButton = $headerTop.find('.mobile-menu-button');
    var $mobileMenu = $headerTop.find('.mobile-menu');
    $mobileMenuButton.click(function(){
      $mobileMenu.slideToggle(200);
    });
  });
})( jQuery );
