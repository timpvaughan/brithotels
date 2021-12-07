(function ($) {
	"use strict";

	$(document).ready(function () {
		'use strict';

		//console.log(brithotels_obj);

		/*--------------------------------------------
		Slick Slider
		--------------------------------------------*/
		$('.gallery-slider').slick({
			centerMode: true,
			centerPadding: '100px',
			dots: true,
			infinite: false,
			nextArrow: '<button type="button" class="slick-next"><img src="'+brithotels_obj.slick_next_img_url+'" /></button>',
			prevArrow: '<button type="button" class="slick-prev"><img src="'+brithotels_obj.slick_prev_img_url+'" /></button>',
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
			nextArrow: '<button type="button" class="slick-next"><img src="'+brithotels_obj.slick_next_img_url+'" /></button>',
			prevArrow: '<button type="button" class="slick-prev"><img src="'+brithotels_obj.slick_prev_img_url+'" /></button>',
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
			//nextArrow: '<button type="button" class="slick-next"><img src="images/slide-arrow-next.png" /></button>',
			//prevArrow: '<button type="button" class="slick-prev"><img src="images/slide-arrow-prev.png" /></button>',
			nextArrow: '<button type="button" class="slick-next"><img src="'+brithotels_obj.slick_next_img_url+'" /></button>',
			prevArrow: '<button type="button" class="slick-prev"><img src="'+brithotels_obj.slick_prev_img_url+'" /></button>',
			slidesToShow: 1,
		});

		var $toggle_menu_mode = 0;
		//$('.toggle-menu').data('mode', 0);
		
		//$toggle_menu_mode = parseInt($('.toggle-menu').data('mode'));
		//console.log($toggle_menu_mode);

		
		
		$('.toggle-menu').on('click', function (e) {
			e.preventDefault();
			
			//var $toggle_menu_mode_t = parseInt($('.toggle-menu').data('mode'));
			//console.log($toggle_menu_mode);
			
			if($toggle_menu_mode === 1){
				$('.hotel-dropdown-menu').slideUp('2000', "swing", function () {
					// Animation complete.
					//$('.toggle-menu').data('mode', 1);
					$toggle_menu_mode = 0;
				});
			}
			else{
				$('.hotel-dropdown-menu').slideDown('2000', "swing", function () {
					// Animation complete.
					//$('.toggle-menu').data('mode', 0);
					$toggle_menu_mode = 1;
				});
			}
			
			/*
			$('.hotel-dropdown-menu').slideToggle('2000', "swing", function () {
				// Animation complete.
			});
			*/

			//$('.hotel-dropdown-menu').toggleClass('hotel-dropdown-menu-show');
		});
		
		$('.hamburger-menu input[type=checkbox]').change(function() {
			if($toggle_menu_mode === 1){
				$('.hotel-dropdown-menu').slideUp('2000', "swing", function () {
					// Animation complete.
					//$('.toggle-menu').data('mode', 1);
					$toggle_menu_mode = 0;
				});
			}
			
			/*
			$('.hotel-dropdown-menu').slideDown('2000', "swing", function () {
				// Animation complete.
			});
			*/
			
			//console.log('checked');
			/*
			if(this.checked) {
				var returnVal = confirm("Are you sure?");
				$(this).prop("checked", returnVal);
			}
			$('#textbox1').val(this.checked);   
			*/
        });

		/*var $grid = $('.grid').masonry({
			columnWidth: '.grid-sizer',
			itemSelector: '.grid-item',
			percentPosition: true
		});

		$grid.imagesLoaded().progress(function () {
			$grid.masonry('layout');
		});*/


		//console.log('hi there');
		// This will create a single gallery from all elements that have class "gallery-item"
		$('.photo-gallery').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'img', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled:true
				},
				callbacks: {
					elementParse: function(qw) {
						//console.log('hi there');
						qw.src = qw.el.attr('data-fullsrc');
					}
				}
			});
		});


		$('#hotel-list-book-now').on('click', function (e) {
			e.preventDefault();

			//console.log('scroll clicked');

			$('html, body').animate({
				//scrollTop: $($(this).attr('href')).offset().top
				scrollTop: parseInt($('#hotel-list-wrap').offset().top - 0)
			}, 2000, 'swing');

		});


	});//end dom ready

})(jQuery);