
$(document).ready(function() {
	'use strict';

	/*--------------------------------------------
	Slick Slider
	--------------------------------------------*/
	$('.gallery-slider').slick({
	  centerMode: true,
	  centerPadding: '100px',
	  dots: true,
	  infinite: false,
	  nextArrow: '<button type="button" class="slick-next"><img src="images/slide-arrow-next.png" /></button>',
	  prevArrow: '<button type="button" class="slick-prev"><img src="images/slide-arrow-prev.png" /></button>',
	  slidesToShow: 1,
	  responsive: [
	    {
	      breakpoint: 991,
	      settings: {
	        centerPadding: '40px',
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        centerPadding: '0'
	      }
	    }
	  ]
	});

	$('.gallery-slider-2').slick({
	  centerMode: true,
	  centerPadding: '0',
	  dots: true,
	  infinite: false,
	  nextArrow: '<button type="button" class="slick-next"><img src="images/slide-arrow-next.png" /></button>',
	  prevArrow: '<button type="button" class="slick-prev"><img src="images/slide-arrow-prev.png" /></button>',
	  slidesToShow: 1,
	  responsive: [
	    {
	      breakpoint: 991,
	      settings: {
	        // centerPadding: '40px',
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        centerPadding: '0'
	      }
	    }
	  ]
	});

	$('.room-thumb').slick({
	  centerMode: true,
	  centerPadding: '0',
	  dots: false,
	  infinite: false,
	  nextArrow: '<button type="button" class="slick-next"><img src="images/slide-arrow-next.png" /></button>',
	  prevArrow: '<button type="button" class="slick-prev"><img src="images/slide-arrow-prev.png" /></button>',
	  slidesToShow: 1,
	});

	var $grid = $('.grid').masonry({
    columnWidth: '.grid-sizer',
	  itemSelector: '.grid-item',
	  percentPosition: true
  });

  $grid.imagesLoaded().progress(function () {
      $grid.masonry('layout');
  });

  $('.toggle-menu').on('click', function(e) {
  	e.preventDefault()
  	$('.hotel-dropdown-menu').slideToggle();
  })


})