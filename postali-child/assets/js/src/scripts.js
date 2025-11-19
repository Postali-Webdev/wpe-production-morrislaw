/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	var docWidth = $(document).outerWidth();
  	
    //Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#menu-main-menu, #menu-main-menu-berkeley').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu, #menu-main-menu-berkeley').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu, #menu-main-menu-berkeley').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu li.menu-item-has-children a, #menu-main-menu-berkeley li.menu-item-has-children a').click(function() {
		// $(this).preventDefault();
		$(this).siblings('.sub-menu').slideToggle(400);
		$(this).parent().toggleClass('toggle-background');
		$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	});
	$('#menu-main-menu li.menu-item-has-children, #menu-main-menu-berkeley li.menu-item-has-children').click(function() {
		$(this).find('.sub-menu').slideToggle(400);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-icon-chevron-right').toggleClass('toggle-rotate');
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
    });


	// Updates search field value
	$( document ).ready( function() {
		$( '.search button' ).html('<img src="/wp-content/uploads/2022/01/icon-search.svg" class="search-icon" id="search-button-icon">');
		$( '.search button' ).attr('name', 'Search');
		$( 'input#search-field' ).attr('placeholder', '');
	});

	$('img.search-icon').click(function() {
		$(this).parent().toggleClass('toggleSearch');
		$(this).toggleClass('hide');
		$(this).siblings().toggleClass('hide');
		$(this).parent().next('.menu-item-search_bar').toggleClass('hide');
		$(this).parents('.menu-item-search').toggleClass('toggleSearch', 1500, 'linear');
		$(this).parents('.menu-item-search').prevAll().toggleClass('fade');
	});

	// Closes all menus when anything outside the menu is clicked.
	$( document ).on( 'click', function() {
		$( '#menu-main-menu > .menu-item-has-children > .sub-menu > .menu-item-has-children > a, #menu-main-menu-berkeley > .menu-item-has-children > .sub-menu > .menu-item-has-children > a' ).removeClass( 'open' ).next( '.sub-menu' ).slideUp( 200 );
	});

	$( '#menu-main-menu *, #menu-main-menu-berkeley *' ).on( 'click', function( e ) {
		e.stopPropagation();
	});

	// In-Page Nav Buttons
	$( window ).on("scroll", function() {
        $('#back-to-top').addClass('fade-in').fadeIn(500);
		$('#mini-logo').addClass('fade-in').fadeIn(2000);
    });
	
	//Text Highlighter Function
	highlight();

	$(window).on("scroll", function(){
		highlight();
	});

	function highlight(){
		var scroll = $(window).scrollTop();
		var height = $(window).height();

		$(".highlight").each(function(){
			var pos = $(this).offset().top;
			if (scroll+height >= pos) {
			$(this).addClass("active");
			} 
		});
	} 

	//Cross-browser smooth scroll option
	$(document).ready(function(){
		$("a").on('click', function(event) {
		  if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			$('html, body').animate({
			  scrollTop: $(hash).offset().top
			}, 800, function(){
			  window.location.hash = hash;
			});
		  }
		});
	  });

	  //keeps menu expanded so user can tab through sub-menu, then closes menu after user tabs away from last child
	  $(document).ready(function() {
        // open submenu when user tabs into it
		if( docWidth > 992 ) {
			$('.menu-item-has-children').on('focusin', function() {
				var subMenu = $(this).find('.sub-menu');
				subMenu.css({'display' : 'block', 'opacity' : '1'});
				// removes dropdown when tabbed away from last element in submenu
				$(this).find('.sub-menu > li:last-child').on('focusout', function() {
					subMenu.removeAttr('style') 
				});
				// removes dropdown on reverse tabbing
				$(this).on('focusout', function(e) {
					$(this).on('keydown', function(e) {
						if( e.shiftKey && $(e.target).siblings().hasClass('sub-menu') ) {
							subMenu.removeAttr('style')
						}
					});
				})
			})
		}
    });

	$('.filter-btn').on('click', function() {
		var activeList = $(this).attr('data-list');
		$('#' + activeList).slideToggle('medium').css('display', 'grid');
		$(this).toggleClass('active');
	});

	$('.filter-option').on('click', function() {
		$(this).toggleClass('active');
		if( $('.filter-option.active').length ) {
			$('.clear-filters').removeClass('inactive');
		}  else if( !$('.filter-option.active').length && !$('.clear-filters.inactive').length ) {
			$('.clear-filters').addClass('inactive');
		}
	})

	$('.clear-filters').on('click', function() {
		if( !$('.clear-filters.inactive').length ) {
			$('.clear-filters').addClass('inactive');
		}
		if( $('.filter-option.active').length ) {
			$('.filter-option').removeClass('active');
		}
	});

	if( docWidth > 992) {
		var bannerHidden = false;
		var lastScrollTop = 0;
		$(window).on('scroll', function(e) {
	
			var userPosition = $(this).scrollTop();
	
			if( userPosition > 0 && !bannerHidden) {
				$('#header-bottom').addClass('hidden');
				bannerHidden = true;
			} else if ( userPosition == 0 && bannerHidden) {
				$('#header-bottom').removeClass('hidden');;
				bannerHidden = false;
			}
			
			if( userPosition > lastScrollTop) {
				$('#header-top_right').addClass('hidden');
			}
			if ( userPosition < lastScrollTop ) {
				$('#header-top_right').removeClass('hidden');
			}
			lastScrollTop = userPosition;
		});
	}

});

scrollCue.init();
scrollCue.update();