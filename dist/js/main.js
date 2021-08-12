"use strict";

/*
This function apply for toggle click on the menu
*/
(function ($) {
  $.fn.clickToggle = function (func1, func2) {
    var funcs = [func1, func2];
    this.data('toggleclicked', 0);
    this.click(function () {
      var data = $(this).data();
      var tc = data.toggleclicked;
      $.proxy(funcs[tc], this)();
      data.toggleclicked = (tc + 1) % 2;
    });
    return this;
  };
})(jQuery);
/**
 * Animate the back to top button and anchor link
 */
// $('a[href*="#"]')
//   // Remove links that don't actually link to anything
//   .not('[href="#"]')
//   .not('[href="#0"]')
//   .click(function(event) {
//     // On-page links
//     if (
//       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//       && 
//       location.hostname == this.hostname
//     ) {
//       // Figure out element to scroll to
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       // Does a scroll target exist?
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
//         event.preventDefault();
//         $('html, body').animate({
//           scrollTop: target.offset().top
//         }, 1000, function() {
//           // Callback after animation
//           // Must change focus!
//           var $target = $(target);
//           $target.focus();
//           if ($target.is(":focus")) { // Checking if the target was focused
//             return false;
//           } else {
//             $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//             $target.focus(); // Set focus again
//           };
//         });
//       }
//     }
//   });

/**
 * Back to top button
 */


$(window).scroll(function () {
  var getTop = $(window).scrollTop();

  if (getTop > 200) {
    $('#backtotop').addClass('active');
  } else {
    $('#backtotop').removeClass('active');
  }
});
/**
 * @license
 * Copyright LIFT Creations All Rights Reserved.
 * Coding by Nguyen Pham
 *
 * Use of this source code is governed by an MIT-style license that can be
 * found in the LICENSE file at https://baonguyenyam.github.io/cv
 */

'use strict';

(function (window) {
  var last = +new Date();
  var delay = 100; // default delay
  // Manage event queue

  var stack = [];

  function callback() {
    var now = +new Date();

    if (now - last > delay) {
      for (var i = 0; i < stack.length; i++) {
        stack[i]();
      }

      last = now;
    }
  } // Public interface


  var liftDOMChange = function liftDOMChange(fn, newdelay) {
    if (newdelay) delay = newdelay;
    stack.push(fn);
  }; // Naive approach for compatibility


  function naive() {
    var last = document.querySelector('#lift-chat-box');
    var lastlen = last.length;
    var timer = setTimeout(function check() {
      // get current state of the document
      var current = document.querySelector('#lift-chat-box');
      var len = current.length; // if the length is different
      // it's fairly obvious

      if (len != lastlen) {
        // just make sure the loop finishes early
        last = [];
      } // go check every element in order


      for (var i = 0; i < len; i++) {
        if (current[i] !== last[i]) {
          callback();
          last = current;
          lastlen = len;
          break;
        }
      } // over, and over, and over again


      setTimeout(check, delay);
    }, delay);
  } //
  //  Check for mutation events support
  //


  var support = {};
  var el = document.documentElement;
  var remain = 3; // callback for the tests

  function decide() {
    if (support.DOMNodeInserted) {
      window.addEventListener("DOMContentLoaded", function () {
        if (support.DOMSubtreeModified) {
          // for FF 3+, Chrome
          el.addEventListener('DOMSubtreeModified', callback, false);
        } else {
          // for FF 2, Safari, Opera 9.6+
          el.addEventListener('DOMNodeInserted', callback, false);
          el.addEventListener('DOMNodeRemoved', callback, false);
        }
      }, false);
    } else if (document.onpropertychange) {
      // for IE 5.5+
      document.onpropertychange = callback;
    } else {
      // fallback
      naive();
    }
  } // checks a particular event


  function test(event) {
    el.addEventListener(event, function fn() {
      support[event] = true;
      el.removeEventListener(event, fn, false);
      if (--remain === 0) decide();
    }, false);
  } // attach test events


  if (window.addEventListener) {
    test('DOMSubtreeModified');
    test('DOMNodeInserted');
    test('DOMNodeRemoved');
  } else {
    decide();
  } // do the dummy test


  var dummy = document.createElement("div");
  el.appendChild(dummy);
  el.removeChild(dummy); // expose

  window.liftDOMChange = liftDOMChange;
})(window);
/**
 * @license
 * Copyright LIFT Creations All Rights Reserved.
 * Coding by Nguyen Pham
 *
 * Use of this source code is governed by an MIT-style license that can be
 * found in the LICENSE file at https://baonguyenyam.github.io/cv
 */


'use strict';

(function (funcName, baseObj) {
  funcName = funcName || "LIFTReady";
  baseObj = baseObj || window;
  var readyList = [];
  var readyFired = false;
  var readyEventHandlersInstalled = false;

  function ready() {
    if (!readyFired) {
      readyFired = true;

      for (var i = 0; i < readyList.length; i++) {
        readyList[i].fn.call(window, readyList[i].ctx);
      }

      readyList = [];
    }
  }

  function readyStateChange() {
    if (document.readyState === "complete") {
      ready();
    }
  }

  baseObj[funcName] = function (callback, context) {
    if (typeof callback !== "function") {
      throw new TypeError("callback for LIFTReady(fn) must be a function");
    }

    if (readyFired) {
      setTimeout(function () {
        callback(context);
      }, 1);
      return;
    } else {
      readyList.push({
        fn: callback,
        ctx: context
      });
    }

    if (document.readyState === "complete") {
      setTimeout(ready, 1);
    } else if (!readyEventHandlersInstalled) {
      if (document.addEventListener) {
        document.addEventListener("DOMContentLoaded", ready, false);
        window.addEventListener("load", ready, false);
      } else {
        document.attachEvent("onreadystatechange", readyStateChange);
        window.attachEvent("onload", ready);
      }

      readyEventHandlersInstalled = true;
    }
  };
})("LIFTReady", window);
/*
* Button Search active/deactive
*/


$("header.site-header .search-submit-toggle").clickToggle(function () {
  $(this).parents('.search-form').toggleClass('active');
}, function () {
  $(this).parents('.search-form').toggleClass('active');
});
/*
* Button Close active/deactive
*/

$("header.site-header:not(.search-sticky) .search-submit-close").clickToggle(function () {
  $(this).parents('.search-form').toggleClass('active');
  $(this).parents('#header').toggleClass('search-active');
}, function () {
  $(this).parents('.search-form').toggleClass('active');
  $(this).parents('#header').toggleClass('search-active');
});
$("header.site-header.search-sticky .search-submit-close").clickToggle(function () {
  $(this).parents('.search-form').toggleClass('active');
}, function () {
  $(this).parents('.search-form').toggleClass('active');
});
/*
* Menu Toggle
*/

$("header.site-header .navbar-toggler:not(.navbar-offcanvas)").clickToggle(function () {
  $(this).parents('header').toggleClass('toggle', 0);
}, function () {
  $(this).parents('header').toggleClass('toggle', 0);
});
/*
* Menu Offcanvas
*/

$("header.site-header .navbar-toggler.navbar-offcanvas").clickToggle(function () {
  $(this).toggleClass('collapsed');
  $(this).parents('header').find('.primary-menu-container').toggleClass('open');
}, function () {
  $(this).toggleClass('collapsed');
  $(this).parents('header').find('.primary-menu-container').toggleClass('open');
});
/**
 * File primary-navigation.js.
 *
 * Required to open and close the mobile navigation.
 */

/**
 * Toggle an attribute's value
 *
 * @param {Element} el - The element.
 * @param {boolean} withListeners - Whether we want to add/remove listeners or not.
 * @since Twenty Twenty-One 1.0
 */

function LIFT_____ToggleAriaExpanded(el, withListeners) {// if ( 'true' !== el.getAttribute( 'aria-expanded' ) ) {
  // 	// el.setAttribute( 'aria-expanded', 'true' );
  // 	LIFT_____SubmenuPosition( el.parentElement );
  // 	if ( withListeners ) {
  // 		document.addEventListener( 'click', LIFT_____CollapseMenuOnClickOutside );
  // 	}
  // } else {
  // 	// el.setAttribute( 'aria-expanded', 'false' );
  // 	if ( withListeners ) {
  // 		document.removeEventListener( 'click', LIFT_____CollapseMenuOnClickOutside );
  // 	}
  // }
}

function LIFT_____CollapseMenuOnClickOutside(event) {
  if (!document.getElementById('site-navigation').contains(event.target)) {
    document.getElementById('site-navigation').querySelectorAll('.sub-menu-toggle').forEach(function (button) {
      button.setAttribute('aria-expanded', 'false');
    });
  }
}
/**
 * Changes the position of submenus so they always fit the screen horizontally.
 *
 * @param {Element} li - The li element.
 */


function LIFT_____SubmenuPosition(li) {
  var subMenu = li.querySelector('ul.sub-menu'),
      rect,
      right,
      left,
      windowWidth;

  if (!subMenu) {
    return;
  }

  rect = subMenu.getBoundingClientRect();
  right = Math.round(rect.right);
  left = Math.round(rect.left);
  windowWidth = Math.round(window.innerWidth);

  if (right > windowWidth) {
    subMenu.classList.add('submenu-reposition-right');
  } else if (document.body.classList.contains('rtl') && left < 0) {
    subMenu.classList.add('submenu-reposition-left');
  }
}
/**
 * Handle clicks on submenu toggles.
 *
 * @param {Element} el - The element.
 */


function ___ExpandSubMenu(el) {
  // jshint ignore:line
  // Close other expanded items.
  el.closest('nav').querySelectorAll('.sub-menu-toggle').forEach(function (button) {
    if (button == el) {
      var m = button.closest('.menu-item').querySelector('.sub-menu');
      m.classList.toggle("active");
      button.classList.toggle("active");
    }
  }); // Toggle aria-expanded on the button.

  LIFT_____ToggleAriaExpanded(el, true); // On tab-away collapse the menu.
  // el.parentNode.querySelectorAll( 'ul > li:last-child > a' ).forEach( function( linkEl ) {
  // 	linkEl.addEventListener( 'blur', function( event ) {
  // 		if ( ! el.parentNode.contains( event.relatedTarget ) ) {
  // 			el.setAttribute( 'aria-expanded', 'false' );
  // 		}
  // 	} );
  // } );
}

(function () {
  /**
   * Menu Toggle Behaviors
   *
   * @param {string} id - The ID.
   */
  var navMenu = function navMenu(id) {
    var wrapper = document.body,
        // this is the element to which a CSS class is added when a mobile nav menu is open
    mobileButton = document.getElementById(id + '-mobile-menu');

    if (mobileButton) {
      mobileButton.onclick = function () {
        wrapper.classList.toggle(id + '-navigation-open');
        wrapper.classList.toggle('lock-scrolling');
        LIFT_____ToggleAriaExpanded(mobileButton);
        mobileButton.focus();
      };
    }
    /**
     * Trap keyboard navigation in the menu modal.
     * Adapted from TwentyTwenty
     */


    document.addEventListener('keydown', function (event) {
      var modal, elements, selectors, lastEl, firstEl, activeEl, tabKey, shiftKey, escKey;

      if (!wrapper.classList.contains(id + '-navigation-open')) {
        return;
      }

      modal = document.querySelector('.' + id + '-navigation');
      selectors = 'input, a, button';
      elements = modal.querySelectorAll(selectors);
      elements = Array.prototype.slice.call(elements);
      tabKey = event.keyCode === 9;
      shiftKey = event.shiftKey;
      escKey = event.keyCode === 27;
      activeEl = document.activeElement; // eslint-disable-line @wordpress/no-global-active-element

      lastEl = elements[elements.length - 1];
      firstEl = elements[0];

      if (escKey) {
        event.preventDefault();
        wrapper.classList.remove(id + '-navigation-open', 'lock-scrolling');
        LIFT_____ToggleAriaExpanded(mobileButton);
        mobileButton.focus();
      }

      if (!shiftKey && tabKey && lastEl === activeEl) {
        event.preventDefault();
        firstEl.focus();
      }

      if (shiftKey && tabKey && firstEl === activeEl) {
        event.preventDefault();
        lastEl.focus();
      } // If there are no elements in the menu, don't move the focus


      if (tabKey && firstEl === lastEl) {
        event.preventDefault();
      }
    });
    /**
     * Close menu and scroll to anchor when an anchor link is clicked.
     * Adapted from TwentyTwenty.
     */

    document.addEventListener('click', function (event) {
      // If target onclick is <a> with # within the href attribute
      if (event.target.hash && event.target.hash.includes('#')) {
        wrapper.classList.remove(id + '-navigation-open', 'lock-scrolling');
        LIFT_____ToggleAriaExpanded(mobileButton); // Wait 550 and scroll to the anchor.

        setTimeout(function () {
          var anchor = document.getElementById(event.target.hash.slice(1));
          anchor.scrollIntoView();
        }, 550);
      }
    });
    document.getElementById('site-navigation').querySelectorAll('.menu-wrapper > .menu-item-has-children').forEach(function (li) {
      li.addEventListener('mouseenter', function () {
        this.querySelector('.sub-menu-toggle').setAttribute('aria-expanded', 'true');
        LIFT_____SubmenuPosition(li);
      });
      li.addEventListener('mouseleave', function () {
        this.querySelector('.sub-menu-toggle').setAttribute('aria-expanded', 'false');
      });
    });
  };

  window.addEventListener('load', function () {
    new navMenu('primary');
  });
})();
/**
 * File responsive-embeds.js.
 *
 * Make embeds responsive so they don't overflow their container.
 */

/**
 * Add max-width & max-height to <iframe> elements, depending on their width & height props.
 *
 * @since 2021
 *
 * @return {void}
 */


function LIFT___ResponsiveEmbeds() {
  var proportion, parentWidth; // Loop iframe elements.

  document.querySelectorAll('iframe').forEach(function (iframe) {
    // Only continue if the iframe has a width & height defined.
    if (iframe.width && iframe.height) {
      // Calculate the proportion/ratio based on the width & height.
      proportion = parseFloat(iframe.width) / parseFloat(iframe.height); // Get the parent element's width.

      parentWidth = parseFloat(window.getComputedStyle(iframe.parentElement, null).width.replace('px', '')); // Set the max-width & height.

      iframe.style.maxWidth = '100%';
      iframe.style.maxHeight = Math.round(parentWidth / proportion).toString() + 'px';
    }
  });
} // Run on initial load.


LIFT___ResponsiveEmbeds(); // Run on resize.

window.onresize = LIFT___ResponsiveEmbeds;
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * This is the source file for what is minified in the twenty_twenty_one_skip_link_focus_fix() PHP function.
 *
 * Learn more: https://git.io/vWdr2
 */

(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener('hashchange', function () {
      var id = location.hash.substring(1),
          element;

      if (!/^[A-z0-9_-]+$/.test(id)) {
        return;
      }

      element = document.getElementById(id);

      if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
          element.tabIndex = -1;
        }

        element.focus();
      }
    }, false);
  }
})();

var LIFT_APP = {
  // Break points
  xs: 0,
  sm: 576,
  md: 768,
  lg: 992,
  xl: 1200,
  xxl: 1400,
  lift_admin_toolbar: function lift_admin_toolbar() {
    if ($('body.admin-control').length) {
      $('#page').append('<div id="admin-space"></div>');
    }
  },
  lift_clear_canvas_menu: function lift_clear_canvas_menu(e) {
    $('header.site-header .menu-offcanvas-' + e).removeAttr('style');
  },
  lift_gen_canvas_menu: function lift_gen_canvas_menu(e) {
    // Off canvas menu toggle
    var getHeaderNormal = $('header#header').outerHeight(true);

    if ($('header#header .navbar').hasClass('navbar-expand-' + e)) {
      $('header.site-header .menu-offcanvas-' + e).css({
        'top': getHeaderNormal + 'px'
      });
    } else {
      $('header.site-header .menu-offcanvas-' + e).removeAttr('style');
    }
  },
  lift_hover_menu: function lift_hover_menu(e) {
    // Menu hover with breakpoint
    $('header.site-header .navbar-expand-' + e + ' #site-navigation li.menu-item-has-children').hover(function () {
      $(this).addClass('menu-hover');
    }, function () {
      $(this).removeClass('menu-hover');
    });
  },
  lift_fixed_header: function lift_fixed_header() {
    // Fixed header will be add padding to the html element
    var getHeader = $('header#header.fixed-top').outerHeight(true);

    if (getHeader) {
      $('html').css({
        'padding-top': getHeader + 'px'
      });
    }
  },
  lift_toggle_ofcanvas: function lift_toggle_ofcanvas() {
    // When toggle menu scrolled
    if ($('header#header:not(.fixed-top)')) {
      $('header#header .navbar-toggler.navbar-offcanvas').addClass('collapsed');
      $('header#header .primary-menu-container').removeClass('open');
    }
  },
  lift_active_header: function lift_active_header() {
    // When window is scrolled
    var st = $(window).scrollTop();

    if (st > 0) {
      $('header#header.fixed-top').addClass('active');
      LIFT_APP.lift_toggle_ofcanvas();
    } else {
      $('header#header.fixed-top').removeClass('active');
    }
  },
  lift_canvas_header: function lift_canvas_header() {
    LIFT_APP.lift_gen_canvas_menu('all');

    if ($(window).width() < LIFT_APP.sm) {
      LIFT_APP.lift_gen_canvas_menu('sm');
    } else {
      LIFT_APP.lift_clear_canvas_menu('sm');
    }

    if ($(window).width() <= LIFT_APP.md) {
      LIFT_APP.lift_gen_canvas_menu('md');
    } else {
      LIFT_APP.lift_clear_canvas_menu('md');
    }

    if ($(window).width() <= LIFT_APP.lg) {
      LIFT_APP.lift_gen_canvas_menu('lg');
    } else {
      LIFT_APP.lift_clear_canvas_menu('lg');
    }

    if ($(window).width() <= LIFT_APP.xl) {
      LIFT_APP.lift_gen_canvas_menu('xl');
    } else {
      LIFT_APP.lift_clear_canvas_menu('xl');
    }

    if ($(window).width() <= LIFT_APP.xxl) {
      LIFT_APP.lift_gen_canvas_menu('xxl');
    } else {
      LIFT_APP.lift_clear_canvas_menu('xxl');
    }
  },
  lift_get_header_hover: function lift_get_header_hover() {
    // TODO: read this one again 
    if ($(window).width() > 0) {
      LIFT_APP.lift_hover_menu('keep');
    }

    if ($(window).width() >= LIFT_APP.sm) {
      LIFT_APP.lift_hover_menu('sm');
    }

    if ($(window).width() >= LIFT_APP.md) {
      LIFT_APP.lift_hover_menu('md');
    }

    if ($(window).width() >= LIFT_APP.lg) {
      LIFT_APP.lift_hover_menu('lg');
    }

    if ($(window).width() >= LIFT_APP.xl) {
      LIFT_APP.lift_hover_menu('xl');
    }

    if ($(window).width() >= LIFT_APP.xxl) {
      LIFT_APP.lift_hover_menu('xxl');
    }
  }
}; ///////////////////////////////////////////////////
// INIT APP 
///////////////////////////////////////////////////

liftDOMChange(function () {});
$(function () {
  LIFT_APP.lift_fixed_header();
});
$(document).ready(function () {
  LIFT_APP.lift_fixed_header();
  LIFT_APP.lift_canvas_header();
  LIFT_APP.lift_get_header_hover();
  LIFT_APP.lift_admin_toolbar();
});
$(window).scroll(function () {
  LIFT_APP.lift_active_header();
});
$(window).resize(function () {
  LIFT_APP.lift_fixed_header();
  LIFT_APP.lift_canvas_header();
  LIFT_APP.lift_get_header_hover();
});
//# sourceMappingURL=main.js.map
