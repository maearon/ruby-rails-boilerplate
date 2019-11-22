(function ($) {
  "use strict";



  $('.popup-youtube, .popup-vimeo').magnificPopup({
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  var review = $('.textimonial_iner');
  if (review.length) {
    review.owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: false,
      responsive: {
        0: {
          margin: 15,
        },
        600: {
          margin: 10,
        },
        1000: {
          margin: 10,
        }
      }
    });
  }
  var best_product_slider = $('.best_product_slider');
  if (best_product_slider.length) {
    best_product_slider.owlCarousel({
      items: 4,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      navText: ["next", "previous"],
      responsive: {
        0: {
          margin: 15,
          items: 1,
          nav: false
        },
        576: {
          margin: 15,
          items: 2,
          nav: false
        },
        768: {
          margin: 30,
          items: 3,
          nav: true
        },
        991: {
          margin: 30,
          items: 4,
          nav: true
        }
      }
    });
  }

  //product list slider
  var product_list_slider = $('.product_list_slider');
  if (product_list_slider.length) {
    product_list_slider.owlCarousel({
      items: 1,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      navText: ["next", "previous"],
      smartSpeed: 1000,
      responsive: {
        0: {
          margin: 15,
          nav: false,
          items: 1
        },
        600: {
          margin: 15,
          items: 1,
          nav: false
        },
        768: {
          margin: 30,
          nav: true,
          items: 1
        }
      }
    });
  }

  if ($('.img-gal').length > 0) {
    $('.img-gal').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  }

  // niceSelect js code
  $(document).ready(function () {
    $('select').niceSelect();
  });

  // menu fixed js code
  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 50) {
      $('.main_menu').addClass('menu_fixed animated fadeInDown');
    } else {
      $('.main_menu').removeClass('menu_fixed animated fadeInDown');
    }
  });

  $('.counter').counterUp({
    time: 2000
  });

  $('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 300,
    infinite: true,
    asNavFor: '.slider-nav-thumbnails',
    autoplay: true,
    pauseOnFocus: true,
    dots: true,
  });

  $('.slider-nav-thumbnails').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider',
    focusOnSelect: true,
    infinite: true,
    prevArrow: false,
    nextArrow: false,
    centerMode: true,
    responsive: [{
      breakpoint: 480,
      settings: {
        centerMode: false,
      }
    }]
  });


  // Search Toggle
  $("#search_input_box").hide();
  $("#search_1").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
  });

  //------- Mailchimp js --------//  
  function mailChimp() {
    $('#mc_embed_signup').find('form').ajaxChimp();
  }
  mailChimp();

  //------- makeTimer js --------//  
  function makeTimer() {

    //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
    var endTime = new Date("27 Sep 2019 12:56:00 GMT+01:00");
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }

    $("#days").html("<span>Days</span>" + days);
    $("#hours").html("<span>Hours</span>" + hours);
    $("#minutes").html("<span>Minutes</span>" + minutes);
    $("#seconds").html("<span>Seconds</span>" + seconds);

  }
// click counter js
(function() {
 
  window.inputNumber = function(el) {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() {
      init($(this));
    });

    function init(el) {

      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if(!min || value >= min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if(!max || value <= max) {
          el[0].value = value++;
        }
      }
    }
  }
})();

inputNumber($('.input-number'));



  setInterval(function () {
    makeTimer();
  }, 1000);

  // click counter js


  // var a = 0;
  // $('.increase').on('click', function(){
     
    

  //   console.log(  $(this).innerHTML='Product Count: '+ a++ );
  // });

 var product_overview = $('#vertical');
 if(product_overview.length){
  product_overview.lightSlider({
    gallery:true,
    item:1,
    verticalHeight:450,
    thumbItem:4,
    slideMargin:0,
    speed:600,
    autoplay: true,
    responsive : [
      {
          breakpoint:991,
          settings: {
              item:1,
            }
      },
      {
          breakpoint:576,
          settings: {
              item:1,
              slideMove:1,
              verticalHeight:350,
            }
      }
  ]
  });
 }

 

 $('.sub-menu ul').hide();
 $(".sub-menu a").click(function () {
   $(this).parent(".sub-menu").children("ul").slideToggle("100");
   $(this).find(".right").toggleClass("ti-plus ti-minus");
 });

 if ($('.new_arrival_iner').length > 0) {
  var containerEl = document.querySelector('.new_arrival_iner');
  var mixer = mixitup(containerEl);
 }
//  $('.controls').on('click', function(){
//   $('.controls').removeClass('add');
//   $('.controls').addClass('add');
//  });

 $('.controls').on('click', function(){
  $(this).addClass('active').siblings().removeClass('active');
 }); 


}(jQuery));