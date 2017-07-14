(function($) {
  $(function() {
    var $window = $(window);
    var $body = $('body');
    var $bodyContainer = $body.find('.body-container');
    var $loader = $body.find('div.loader');
    var $nav = $body.find('header.top');
    var $headerTop = $('header.top');
    var $mobileMenuButton = $headerTop.find('.mobile-menu-button');
    var $subButton = $nav.find('button.mobile-submenu-button');
    var $mobileMenu = $headerTop.find('.mobile-menu');
    var i;
    //loading screen
    $window.on('load', function() {
      $loader.css('opacity', 0);
      $bodyContainer.addClass('fade-in')
      .css('opacity', 1);
      //set loader to display none to prevent
      //interference with other elements
      setTimeout(function() {
        $loader.css('display', 'none');
      }, 200);
    });
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
    var bool = false;
    var l = bodyClasses.length;
    for(i = 0; i < l; i++) {
      //search array for admin-bar class
      athemeClass = 'header-top-in-a';
      if(bodyClasses[i] === 'admin-bar') {
        bool = true;
        athemeClass = 'header-top-in-admin-a';
        //mobile menu animation adjusted for fixed wp-admin bar
        if(window.innerWidth > 600 && window.innerWidth <= 782) {
          athemeClass = 'header-top-in-admin-mobile-a';
        } else if(window.innerWidth <= 600) {
          athemeClass = 'header-top-in-a';
        }
        break;
      }
    }
    $window.resize(function() {
      if(bool === true) {
        $nav.removeClass('sticky header-top-in-a header-top-in-admin-a header-top-in-admin-mobile-a');
        athemeClass = 'header-top-in-admin-a';
        if(window.innerWidth > 600 && window.innerWidth <= 782) {
          athemeClass = 'header-top-in-admin-mobile-a';
        } else if(window.innerWidth <= 600) {
          athemeClass = 'header-top-in-a';
        }
      }
    });
    //header animation
    $window.scroll(function() {
      //scrollTop takes the position from the TOP of the element relative to another element
      if($(this).scrollTop() >= ($(document).height() - $(window).height()) * 0.50) {
        $nav.addClass('sticky ' + athemeClass);
      } else {
        $nav.removeClass('sticky header-top-in-a header-top-in-admin-a header-top-in-admin-mobile-a');
      }
    });
  });
})(jQuery);
