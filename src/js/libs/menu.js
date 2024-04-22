jQuery(document).ready(function() {

/**/
(function ($) {
  "use strict";


  var $body = $('body');

  if ($(".has-children--multilevel-submenu").find('.submenu').length) {
    var elm = $(".has-children--multilevel-submenu").find('.submenu');

    elm.each(function () {
      var off = $(this).offset();
      var l = off.left;
      var w = $(this).width();
      var docH = windows.height();
      var docW = windows.width() - 10;
      var isEntirelyVisible = (l + w <= docW);

      if (!isEntirelyVisible) {
        $(this).addClass('left');
      }
    });
  }

  $("#mobile-menu-trigger").on('click', function () {
    $("#mobile-menu-overlay").addClass("active");
    $body.addClass('no-overflow');
  });

  $("#mobile-menu-close-trigger").on('click', function () {
    $("#mobile-menu-overlay").removeClass("active");
    $body.removeClass('no-overflow');
  });

  $(".offcanvas-navigation--onepage ul li a").on('click', function () {
    $("#mobile-menu-overlay").removeClass("active");
    $body.removeClass('no-overflow');
  });

  $body.on('click', function (e) {
    var $target = e.target;
    if (!$($target).is('.mobile-menu-overlay__inner') && !$($target).parents().is('.mobile-menu-overlay__inner') && !$($target).is('#mobile-menu-trigger') && !$($target).is('#mobile-menu-trigger i')) {
      $("#mobile-menu-overlay").removeClass("active");
      $body.removeClass('no-overflow');
    }
  });

  $('.openmenu-trigger').on('click', function (e) {
    e.preventDefault();
    $('.open-menuberger-wrapper').addClass('is-visiable');
  });

  $('.page-close').on('click', function (e) {
    e.preventDefault();
    $('.open-menuberger-wrapper').removeClass('is-visiable');
  });

  $("#open-off-sidebar-trigger").on('click', function () {
    $("#page-oppen-off-sidebar-overlay").addClass("active");
    $body.addClass('no-overflow');
  });

  $("#menu-close-trigger").on('click', function () {
    $("#page-oppen-off-sidebar-overlay").removeClass("active");
    $body.removeClass('no-overflow');
  });



  $("#hidden-icon-trigger").on('click', function () {
    $("#hidden-icon-wrapper").toggleClass("active");
  });

  var $offCanvasNav = $('.offcanvas-navigation'),
    $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');


  $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i></i></span>');

  $offCanvasNav.on('click', 'li a, li .menu-expand', function (e) {
    var $this = $(this);
    if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
      e.preventDefault();
      if ($this.siblings('ul:visible').length) {
        $this.parent('li').removeClass('active');
        $this.siblings('ul').slideUp();
      } else {
        $this.parent('li').addClass('active');
        $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
        $this.closest('li').siblings('li').find('ul:visible').slideUp();
        $this.siblings('ul').slideDown();
      }
    }
  });


})(jQuery);

});