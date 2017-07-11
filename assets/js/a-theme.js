(function($) {
  $(function() {
    var $window = $(window);
    var $body = $('body');
    var $nav = $body.find('header.top');
    var $headerTop = $('header.top');
    var $mobileMenuButton = $headerTop.find('.mobile-menu-button');
    var $mobileMenu = $headerTop.find('.mobile-menu');
    var i;
    //mobile menu
    $mobileMenuButton.click(function(){
      $mobileMenu.slideToggle(200);
    });
    //loop through body classes
    var bodyClasses = $body.attr('class').split(' ');
    var athemeClass;
    var l = bodyClasses.length;
    for(i = 0; i < l; i++) {
      //search array for admin-bar class
      athemeClass= 'header-top-in-a';
      if(bodyClasses[i] === 'admin-bar') {
        athemeClass = 'header-top-in-admin-a';
        break;
      }
    }
    //header animation
    $window.scroll(function() {
      if($(this).scrollTop() >= 500) {
        $nav.addClass('sticky ' + athemeClass);
      } else {
        $nav.removeClass('sticky ' + athemeClass);
      }
    });
  });
})( jQuery );
