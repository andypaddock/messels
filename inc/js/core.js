//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend owl.carousel.min.js

jQuery(document).ready(function($) {
  /* ADD CLASS ON LOAD*/

  $("html")
    .delay(1500)
    .queue(function(next) {
      $(this).addClass("loaded");
      next();
    });

    $('#menu-toggle').click(function(){
      $(this).toggleClass('open');
      $('.overlay').toggleClass('open');
    })
    $('.menu-item').click(function(){
      $('.overlay').removeClass('open');
      $('#menu-toggle').removeClass('open');
    })

  //Smooth Scroll

let desiredHeight = $('.navigation').height() + 40;

$(".menu-item a, a.more").on('click', function(e) {
  if (this.hash !== "") {
    e.preventDefault();
    var hash = this.hash;
    
    $('html').animate({
    scrollTop: $(hash).offset().top - desiredHeight
    }, 300, function(){
    //
    });
  }
  });

let mainNavLinks = document.querySelectorAll(".menu-item a");
let mainSections = document.querySelectorAll(".nav-section");

let lastId;
let cur = [];

window.addEventListener("scroll", event => {
  let fromTop = window.scrollY;

  mainNavLinks.forEach(link => {
    let section = document.querySelector(link.hash);

    if (
      section.offsetTop - 100 <= fromTop && section.offsetTop + section.offsetHeight - 100 > fromTop
    ) {
      link.classList.add("active");
    } else {
      link.classList.remove("active");
    }
  });
});
 
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });

  // ========== Controller for lightbox elements

  $(".gallery").each(function() {
    $(this)
      .find(".lightbox-gallery")
      .magnificPopup({
        type: "image",
        gallery: {
          enabled: true
        }
      });
  });

  /* Magnific Popup */

  $(".img-wrapper").each(function(gallery) {
    $(this).magnificPopup({
      delegate: 'a',
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      image: {
        verticalFit: true,
      },
      gallery: {
        enabled: true,
        navigateByImgClick: true,
      },
    });
  });

  $(".post-image a").magnificPopup({
    type: "image",
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: "mfp-no-margins mfp-with-zoom",
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300
    }
  });

	// ============ Carousels
 
	var owlTestimonials = $('.owl-carousel.testimonial-carousel');
 owlTestimonials.owlCarousel({
   loop: true,
   nav: true,
   navText: ["<div class='arrow-left icon'></div>", "<div class='arrow-right icon'></div>"],
   lazyLoad: true,
   dots: false,
   autoplay: false,
   responsive: {
	 0: {
	   items: 1
	 }
   },
 });

 $(".owl-next").click(function () {
   owlTestimonials.trigger('nextPartner.owl.carousel');
 });
 $('.owl-prev').click(function () {
   owlTestimonials.trigger('prevPartner.owl.carousel');
 });

 $(document).ready(function () {

    $('.gallery').magnificPopup({
      delegate: 'a.lightbox-gallery',
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  });

	$(document).ready(function() {
		$('.gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true,
			},
		});
	});

  /* CLASS AND FOCUS ON CLICK */
  $(".menu-item a").click(function() {
   // $(".menu-item a.active").removeClass("active");
    $(this).addClass('active');
  });
  
  $(document).on('click', '.menu-item a', function() {
      $(".menu-item a.active").removeClass("active");
      $(this).addClass('active');
  });

  $(".menu-trigger").click(function() {
    $(".menu-collapse").toggleClass("visible");
    $(".current-menu-item").toggleClass("loaded");
    $(".menu-trigger").toggleClass("opened");
  });
  
  $(".read-more").click(function(e) {
    e.preventDefault();
    $('.read-more-text').addClass('expand');
    $(this).addClass('active');
  });

  $(".tab-trigger").click(function() {
    $(".tab-trigger.active").removeClass("active");
    $(this).addClass("active");
  });

  $(".see-more").click(function() {
    $(this)
      .closest(".camp-summary__item")
      .toggleClass("open");
  });

  // ========== Tab Slider

  var action = false,
    clicked = false;
  var Owl = {
    init: function() {
      Owl.carousel();
    },
    carousel: function() {
      var owl;
      $(document).ready(function() {
        owl = $(".tabs").owlCarousel({
          items: 1,
          center: true,
          nav: false,
          dots: true,
          loop: true,
          margin: 10,
          dotsContainer: ".test",
          navText: ["prev", "next"]
        });
        $(".owl-next").on("click", function() {
          action = "next";
        });
        $(".owl-prev").on("click", function() {
          action = "prev";
        });
        $(".tabs-header").on("click", "li", function(e) {
          owl.trigger("to.owl.carousel", [$(this).index(), 300]);
        });
      });
    }
  };
  $(document).ready(function() {
    Owl.init();
  });

  /***********HERO SLIDER***********/
  var slideCount = $("#slider ul li").length;
  var slideWidth = $("#slider ul li").width();
  var slideHeight = $("#slider ul li").height();
  var sliderUlWidth = slideCount * slideWidth;
  $("#slider ul").css({ width: sliderUlWidth, marginLeft: -slideWidth });
  $("#slider ul li:last-child").prependTo("#slider ul");
  function moveLeft() {
    $("#slider ul").animate(
      {
        left: +slideWidth
      },
      500,
      function() {
        $("#slider ul li:last-child").prependTo("#slider ul");
        $("#slider ul").css("left", "");
      }
    );
  }
  function moveRight() {
    $("#slider ul").animate(
      {
        left: -slideWidth
      },
      500,
      function() {
        $("#slider ul li:first-child").appendTo("#slider ul");
        $("#slider ul").css("left", "");
      }
    );
  }
  $("a.control_prev").click(function() {
    moveLeft();
  });
  $("a.control_next").click(function() {
    moveRight();
  });

  //Tabs
  var initialHeight = $('.services-content-container').find('.services-tab-content').height();
  $('.services-content-container').css('height', (initialHeight + 200))

  $('.services-tab .tab').on('click', function(){
    var selectedTab = $(this).attr('data-tab');
    var tabHeight = $('#' + selectedTab).height();
    $('.services-tab .tab').removeClass('selected');
    $(this).addClass('selected');
    $('.services-tab-content').removeClass('selected');
    $('.services-content-container').css('height', (tabHeight + 200))
    $('#' + selectedTab).addClass('selected');
  })

  //Mobile Menu

  $(".mobileMenu").click(function() {
    $("nav").slideToggle(300);
  });

  var navHeight = $("header").height();
  $(".company-title").css({
    "padding-top": navHeight + "px"
  });


  var acc = document.getElementsByClassName('info-accordion');
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener('click', function() {
			this.classList.toggle('info-active');
			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
				$(this)
					.next('.info-panel')
					.css('padding', '0 1rem');
			} else {
				panel.style.maxHeight = panel.scrollHeight + '32px';
				$(this)
					.next('.info-panel')
					.css('padding', '2rem 3rem');
			}
		});
	}

  $(document).ready(function () {

    $('.parent').magnificPopup({
      delegate: 'a.lightbox-gallery',
      type: 'image',
      gallery: {
        enabled: true
      }
    });
  });

// ========== Add class if in viewport on page load

$.fn.isOnScreen = function () {
  var win = $(window);

  var viewport = {
    top: win.scrollTop(),
    left: win.scrollLeft()
  };
  viewport.right = viewport.left + win.width();
  viewport.bottom = viewport.top + win.height();

  var bounds = this.offset();
  bounds.right = bounds.left + this.outerWidth();
  bounds.bottom = bounds.top + this.outerHeight();

  return !(
    viewport.right < bounds.left ||
    viewport.left > bounds.right ||
    viewport.bottom < bounds.top ||
    viewport.top > bounds.bottom
  );
};

$(".slide-up, .slide-down, .slide-right, .slow-fade").each(function () {
  if ($(this).isOnScreen()) {
    $(this).addClass("active");
  }
});

// ========== Add class on entering viewport

$.fn.isInViewport = function () {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();
  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();
  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on("resize scroll", function () {
  $(".slide-up, .slide-down, .slide-right, .slow-fade").each(function () {
    if ($(this).isInViewport()) {
      $(this).addClass("active");
    }
  });
});





}); //Don't remove ---- end of jQuery wrapper





