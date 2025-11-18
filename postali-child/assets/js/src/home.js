/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	function scrollFade() {
        var fadeElements = document.getElementsByClassName('scrollTarget');
        //var fadeTarget = document.getElementsByClassName('scrollFade');
        //var viewportBottom = window.scrollY + window.innerHeight;

        for (var index = 0; index < fadeElements.length; index++) {
            var element = fadeElements[index];
            var rect = element.getBoundingClientRect();

            var elementFourth = rect.height/4;
            var fadeInPoint = window.innerHeight - (elementFourth * 1.25);
            var fadeOutPoint = -(rect.height/2);

            if (rect.top <= fadeInPoint) {
                $( "#fade-img-target" ).addClass('scrollFade--visible');
                $( "#fade-img-target" ).addClass('scrollFade--animate');
                $( "#fade-img-target" ).removeClass('scrollFade--hidden');
            } else {
                $( "#fade-img-target" ).removeClass('scrollFade--visible');
                $( "#fade-img-target" ).addClass('scrollFade--hidden');
            }

            if (rect.top <= fadeOutPoint) {
                $( "#fade-img-target" ).removeClass('scrollFade--visible');
                $( "#fade-img-target" ).addClass('scrollFade--hidden');
            }
        }
    }

	$.fn.isInViewport = function() {
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight();

		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();

		return elementBottom > viewportTop && elementTop < viewportBottom;
	};

    $.fn.isTopViewport = function() {
		var elementTop = $(this).offset().top;
		var viewportTop = $(window).scrollTop();

		return elementTop == viewportTop;
	}; 

	$(window).on('scroll', function() {	
        if ($('#scroll-toggle').isInViewport()) {
			$( "#fade-img-target" ).addClass("show-img");
			scrollFade();
		} else if ($('#scroll-toggle-off').isInViewport()) {
			$( "#fade-img-target" ).removeClass("show-img");
		} else {
			$( "#fade-img-target" ).removeClass("show-img");
		}

		if ($('.fixed-section').isInViewport()) {
			$( "#child-page-anchor" ).addClass("fixed-column");
		} else if ($('.fixed-section-off').isInViewport()) {
			$( "#child-page-anchor" ).removeClass("fixed-column");
		} else {
			$( "#child-page-anchor" ).removeClass("fixed-column");
		}
	});

});