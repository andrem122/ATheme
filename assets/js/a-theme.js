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
    //check if elememts to be animated are in the viewport
    function isInViewport(ele) {
      //get the element to be checked
      var $ele = $(ele);
      //get the scroll position of the page
      var scrollEle = (navigator.userAgent.toLowerCase().indexOf('webkit') !== -1) ? 'body' : 'html';
      var viewportTop = $(scrollEle).scrollTop();
      var viewportBottom = viewportTop + $window.height();

      //get the position of the element
      var eleTop;
      var eleBottom;
      if($ele.offset() !== undefined) {
        eleTop = Math.round($ele.offset().top);
        eleBottom = eleTop + $ele.height();
      }


      //compare values and return true or false
      return ((eleTop < viewportBottom) && (eleBottom > viewportTop));
    }
    //resizes the flip card height based on children height
    function resizeWithChildren(cards, front, back) {
      //get the elements
      cards = document.getElementsByClassName(cards);
      var faces = [document.getElementsByClassName(front), document.getElementsByClassName(back)];
      var heights = [];
      var totalHeight = 0;

      //get the height of children for each card
      //get height with largest value
      var i;
      var j;
      var x;
      var l = faces.length;
      for(x = 0; x < l; x++) {
        var face = faces[x];
        for(i = 0; i < face.length; i++) {
          var y = face[i].children.length;
          for(j = 0; j < y; j++) {
            //get margins in addition to height
            var currentChild = face[i].children[j];
            var style = currentChild.currentStyle || window.getComputedStyle(currentChild);
            var totalMargin = parseFloat(style.marginTop.replace(/px/gi, '')) + parseFloat(style.marginBottom.replace(/px/gi, ''));
            //add margin to height
  	        totalHeight += totalMargin + currentChild.offsetHeight;
            totalMargin = 0;
          }
          heights.push(totalHeight);
          totalHeight = 0;
        }
      }
      //split heights into two arrays: front and back
      var backHeights = heights.splice(heights.length / 2);
      var frontHeights = heights;
      //compare front and back height values
      //get the larger of the two for each card
      l = frontHeights.length;
      var maxHeightsCard = [];
      var maxHeight = 0;
      for(i = 0; i < l; i++) {
        maxHeight = (frontHeights[i] > backHeights[i]) ? frontHeights[i] : backHeights[i];
        maxHeightsCard.push(maxHeight);
      }
      //compare with card height
      l = cards.length;
      for(i = 0; i < l; i++) {
        //if the height of the children is within 20px of
        //the card height, set the height of the card to
        //20px larger than the children height
        if(cards[i].offsetHeight - 20 < maxHeightsCard[i]) {
          cards[i].style.height = maxHeightsCard[i] + 20 + 'px';
        } else if (cards[i].offsetHeight - maxHeightsCard[i] > 20) {
          cards[i].style.height = maxHeightsCard[i] + 20 + 'px';
        }
      }
    }

    function skillBarAnimation(ele, children, attr) {
      //get the elements
      var $ele = $(ele);
      var $children = (children) ? $ele.children(children) : '';

      //if the animation has already occurred
      //stop any further animation
      if($children.hasClass('animation-finish') || $ele.hasClass('animation-finish')) {
        return;
    }
      //check if the element is in the viewport
      if(isInViewport($ele)) {
        $children.each(function(i) {
          //grab the data-atheme-params attribute value and parse it
          //since it is a JSON string
          var params = JSON.parse($ele.eq(i).attr(attr));
          //add the class animation-finish to prevent any further animation
          $children.eq(i).addClass('animation-finish');
          //animate the skill bar
          $children.eq(i).animate({width: params.percent}, 400);
        });
      }
    }
    //call the function resizeWithChildren when the window
    //loads or is resized
    $window.on('load resize', function() {
      resizeWithChildren('atheme-card', 'front-content', 'back-content');
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
    $window.on('scroll load', function() {
      //call the skillBarAnimation function
      skillBarAnimation('.atheme-skill-bar', '.bar', 'data-atheme-params');

      //make the nav bar appear as the user scrolls 50% of the page
      if($(this).scrollTop() >= ($(document).height() - $(window).height()) * 0.50) {
        $nav.addClass('sticky ' + athemeClass);
      } else {
        $nav.removeClass('sticky header-top-in-a header-top-in-admin-a header-top-in-admin-mobile-a');
      }
    });
  });
})(jQuery);
