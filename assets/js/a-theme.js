(function($) {
  $(function() {
    var $window = $(window);
    var $body = $('body');
    var $nav = $body.find('header.top');
    var $headerTop = $('header.top');
    var $mobileMenuButton = $headerTop.find('.mobile-menu-button');
    var $subButton = $nav.find('button.mobile-submenu-button');
    var $mobileMenu = $headerTop.find('.mobile-menu');
    var i;
    //mobile menu
    $mobileMenuButton.click(function(){
      $mobileMenu.slideToggle(200);
    });
    //submenus
    $subButton.click(function() {
      var $submenu = $(this).parent().find('> ul.sub-menu');
      $submenu.slideToggle(200);
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
      //scrollTop takes the position from the TOP of the element relative to another element
      if($(this).scrollTop() >= ($(document).height() - $(window).height()) * 0.50) {
        $nav.addClass('sticky ' + athemeClass);
      } else {
        $nav.removeClass('sticky ' + athemeClass);
      }
    });
  });
})(jQuery);
