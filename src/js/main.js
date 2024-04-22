jQuery(document).ready(function() {
  jQuery( ".product_meta" ).insertBefore( ".product_title" );
  jQuery( ".nav-blocks" ).insertAfter( ".search-article" );

  // product zero price js
  var calltel = jQuery('.call-price').data('tel');
  jQuery('.call-price').html('<a href="tel:'+calltel+'">Call for Price</a>');

  // my account page add class
  if(jQuery('body').hasClass('wpmy-account')){
    jQuery('#customer_login').parent().addClass('account-registery-out');
  }

  /*add sticky header class*/
  jQuery(window).scroll(function() {
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 62) {
      jQuery('.site-header').addClass('sticky-header');
      jQuery('body').css('padding-top', headerHeight + 'px');
    } else {
      jQuery('.site-header').removeClass('sticky-header');
      jQuery('body').css('padding-top', '0');
    }
  });
  var headerHeight = jQuery('.site-header').outerHeight();

  /*magnific popup on imagegallery*/
  jQuery('.image-popup-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery:{
      enabled:true
    },
    zoom: {
      enabled: true,
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
      opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  /*slider js*/
  //home banner slider
  jQuery(".slick-banner-slider").slick({ slidesToShow: 1, slidesToScroll: 1, dots: true, infinite: true, autoplay: true, autoplaySpeed: 2000});
  //logo slider
  jQuery(".logo-slides").slick({dots: false, infinite: true, autoplay: true, autoplaySpeed: 4000, arrows: true, speed: 1500, slidesToShow: 5, slidesToScroll: 5, responsive: [{breakpoint: 1199, settings: {slidesToShow: 4, slidesToScroll: 4 } }, {breakpoint: 991, settings: {slidesToShow: 3, slidesToScroll: 3 } }, {breakpoint: 600, settings: {slidesToShow: 2, slidesToScroll: 2 } } , {breakpoint: 480, settings: {slidesToShow: 1, slidesToScroll: 1 } } ]});
  //Location slider
  jQuery(".do-part").slick({ slidesToShow: 1, slidesToScroll: 1, arrows: false, infinite: true, autoplay: true, autoplaySpeed: 1800 });

  //content slider
  var $slider = jQuery('.content-slider');
  var $prevBtn = jQuery('.prev-btn');
  var $nextBtn = jQuery('.next-btn');
  var $arrowContainer = jQuery('.custom-slider-arrows');

  $slider.on('init', function(event, slick){
    var slideCount = slick.slideCount;
    if (slideCount <= 1) {
      $arrowContainer.hide(); // Hide arrow container if there's only one slide
    } else {
      $arrowContainer.show(); // Show arrow container if there's more than one slide
    }
  });

  $slider.slick({
    infinite: true, // Set to true to make it loop
    autoplay: true,
    dots: false,
    arrows: false,
    autoplaySpeed: 2000,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
  
  $prevBtn.on('click', function() {
    $slider.slick('slickPrev');
  });
  $nextBtn.on('click', function() {
    $slider.slick('slickNext');
  });

  /*equalHeights*/
  jQuery.fn.equalHeights = function () {
    var max_height = 0;
    jQuery(this).each(function () {
      max_height = Math.max(jQuery(this).height(), max_height);
    });
    jQuery(this).each(function () {
      jQuery(this).height(max_height);
    });
  };
  jQuery(".trailer-grid-layout .product-item .trailer-item-content .heading-title").equalHeights();
  jQuery(".icon-list .icon-list-box .wc-list-info .wc-col-txt").equalHeights();
  jQuery(".block-category-listing .custom-woo-listing .product-category a img").equalHeights();
  jQuery('.woocommerce .woocommerce ul.products li.product h2').equalHeights();

  jQuery('select.prd-dropdwon').on('change',function(){
    let sel_category     = jQuery('#prd_category').val();
    let sel_trailer_part = jQuery('#prd_trailer_parts').val();
    jQuery.ajax({
      type:'POST',
      url:ajax_script.ajaxurl,
      data:{
        'action' : 'trailer_parts_filter',
        'select_cat' : sel_category,
        'select_trailer' : sel_trailer_part,
      },
      beforeSend: function() {
        jQuery('.trailer-loader').show();
        jQuery('.product-item').hide();
        jQuery('.no-product').hide();

      },
      success:function(response){
        jQuery('.trailer-loader').hide();
        jQuery('.product-grid').html(response);
        jQuery(".trailer-grid-layout .product-item .trailer-item-content .heading-title").equalHeights();
      },
      error: function  (xhr, ajaxOptions, thrownError) {
        console.log(xhr.status);
        console.log(thrownError);
      }
    });
  });

});