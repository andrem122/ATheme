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
    //check if elememts to be animated are in the viewport
    function isInViewport(ele) {
      //get the element to be checked
      var $ele = $(ele);
      //get the scroll position of the page
      var scrollEle = (navigator.userAgent.toLowerCase().indexOf('webkit') !== -1) ? 'body' : 'html';
      var viewportTop = $(scrollEle).scrollTop();
      var viewportBottom = viewportTop + $window.height();

      //get the position of the element
      var eleTop = Math.round($ele.offset().top);
      var eleBottom = eleTop + $ele.height();


      //compare values and return true or false
      return ((eleTop < viewportBottom) && (eleBottom > viewportTop));
    }

    function skillBarAnimation(ele, children, attr) {
      //get the element
      var $ele = $(ele);
      var $children = (children) ? $ele.children(children) : '';

      //if the animation has finished,
      //then stop any further animation
      if($children.hasClass('animation-finish') || $ele.hasClass('animation-finish')) {
        return;
      }

      //check if the element is in the viewport,
      //then add the animation class
      if(isInViewport($ele)) {
        if(children) {
          $children.each(function(i) {
            //grab the data-atheme-params attribute value and parse it
            //since it is a JSON string
            var params = JSON.parse($ele.eq(i).attr(attr));
            $children.eq(i).addClass('animation-finish');
            $children.eq(i).animate({width: params.percent}, 400);
          });
        } else {
          $ele.each(function(i) {
            var params = JSON.parse($ele.eq(i).attr(attr));
            $ele.eq(i).addClass('animation-finish');
            $ele.eq(i).animate({width: params.percent}, 700);
          });
        }
      }
    }
    //call the addAnimation function as soon as the user scrolls
    $window.scroll(function() {
      skillBarAnimation('.atheme-skill-bar', '.bar', 'data-atheme-params');
    });
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
