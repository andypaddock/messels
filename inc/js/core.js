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

$(document).ready(function () {
  if ($('.tabbed-section').length) {
    $(".tabbed-section__head--tab:nth-child(1)").addClass("active");
    $(".tabbed-section__body--item:nth-child(1)").addClass("visible");
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




  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
$(window).scroll(function () {
   $('.flex-link').each(function () {
      if (isScrolledIntoView(this) === true) {
          $(this).addClass('in-view')
      }
   });
});
$(".tabbed-section__head--tab").click(function (e) {
  var selectedTab = $(this).attr("data-tab");
  $(".tabbed-section__head--tab.active").removeClass('active');
  $(this).addClass('active');
  $(".tabbed-section__body--item.visible").removeClass('visible');
  $(".tabbed-section__body--item." + selectedTab).addClass('visible');
});

$(".js-toggle-trigger").click(function (e) {
  e.preventDefault();
  $('.js-toggle-target.open').slideUp(300);
  $('.js-toggle-target.open').removeClass('open ');
  $(this).siblings('.js-toggle-target').slideDown(300);
  $(this).siblings('.js-toggle-target').addClass('open');
  $('.js-toggle-parent.active').removeClass('active');
  $(this).closest('.js-toggle-parent').addClass('active');
  
  setTimeout(scrollToTop, 400);
});
$('#checker').change(function() {
  if ($(this).is(':checked')) {
    $('.checkbox').addClass('checked');
  } else {
    $('.checkbox').removeClass('checked');
  }
});



$('#main-menu-toggle').click(function(){
  $(this).toggleClass('opened');
  $('.nav-holder').toggleClass('opened');
})




$(".toggle-block label").click(function () {
  var otherLabels = $(this).parent().siblings(".item").find("label");
  otherLabels.removeClass("collapsed");
  otherLabels.next().slideUp();
  $(this).toggleClass("collapsed");
  $(this).next().slideToggle();
});






}); //Don't remove ---- end of jQuery wrapper




