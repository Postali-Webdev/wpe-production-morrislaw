/**
 * Practice Area Parent Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$.fn.isInViewport = function() {
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight();

		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();

		return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	
	$.fn.isTopViewport = function() {
		var elementTop = $(this).offset().top;
		//var elementBottom = elementTop + $(this).outerHeight();

		var viewportTop = $(window).scrollTop();
		//var viewportBottom = viewportTop + $(window).height();

		//return elementBottom > viewportTop && elementTop < viewportBottom;
		return elementTop == viewportTop;
	}; 

	$(window).on('scroll', function() {	
		if ($('.fixed-section').isInViewport()) {
			$( "#child-page-anchor" ).addClass("fixed-column");
		} else if ($('.fixed-section-off').isInViewport()) {
			$( "#child-page-anchor" ).removeClass("fixed-column");
		} else {
			$( "#child-page-anchor" ).removeClass("fixed-column");
		}
	});

});