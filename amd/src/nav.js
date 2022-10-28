define(['jquery'], function($) {

	'use strict';

	// top level navigation: target for attaching menu and click behaviour
	var $navTarget = $('.list-group:not(.m-t-1)');

	// menu addition target and "on this page" html
	var $navNamePrependTarget = $('.is-section:first()', $navTarget);

	// ensure code only runs on pages where 'is-section' element exists in menu
	if($navNamePrependTarget.length > 0) {

		var $prependHTML = '<a class="not-section list-group-item list-group-item-action" data-key="onthispage"><div class="m-l-0">On this page</div></a>';
		var $headerHeight = $( 'header[role="banner"]').height();

		// attach "on this page" html to top of menu
		$($navNamePrependTarget).before($prependHTML);

		// add toggle behaviour to "on this page"
		var $onThisPageToggle = $('a[data-key="onthispage"]', $navTarget);
		$( $onThisPageToggle ).on('click', function() {
			$(this).toggleClass('collapsed').siblings('.is-section').toggle();
		});

		// navigation menu items
		var $menuItems = $('.is-section', $navTarget);

		// toggle content function vars:
		// $t = target element ID
		// $h = page header height (used to calculate scrollTop offset)
		var toggleContent = function(t,h) {

			// specific target to check/toggle
			var $target = t.hash;

			// open hidden content pane
			$('.collapse', $target).addClass('show');

			// change direction of toggle arrow on collapsed elements
			$('.collapse-header:is(.collapsed)', $target).removeClass('collapsed');

			// once toggled open, scroll element to top of screen (minus height of header)
			$([document.documentElement, document.body]).animate({
				scrollTop: $($target).offset().top - h
			}, 250);
		};

		// do not activate behaviour in editing mode
		if($('body').not('.editing')) {

			// bind click behaviour
			$( $menuItems ).on('click', function() {
				toggleContent(this,$headerHeight);

				// add 'is-active' class to current element and remove from siblings
				$(this).addClass('is-active').siblings().removeClass('is-active');
			});

			// on page load, detect if #section-* in URL and toggle, scroll and set matching nav link to 'is-active'
			if(window.location.hash.length > 0 && window.location.hash.match(/section\-[0-9]/)) {

				// check for href containing hash
				$menuItems.each(function() {

					// continue if menu item matches the hash target
					if($(this)[0].href.match(window.location.hash)) {

						// set nav link as active and toggle page content open
						$(this).addClass('is-active');
						toggleContent(window.location,$headerHeight);
						return false;
					}
				});

			// otherwise highlight the first entry (only when courses are active)
			} else if(window.location.href.match(/\/course\//)) {
				$menuItems.first().addClass('is-active');
			}

			// scrolling content updates the 'is-active' state (optional on/off)
			var $enableScrollDetection = false;
			if( $enableScrollDetection ) {

				// function to detect matching content (using ID) as it scrolls into viewport
				$.fn.inViewport = function() {

					var $elementTop = $(this).offset().top,
						$elementBottom = $elementTop + $(this).outerHeight(),
						$viewportTop = $(window).scrollTop(),
						$viewportBottom = $viewportTop + $(window).height();

					return $elementBottom > $viewportTop && $elementTop < $viewportBottom;
				};

				// slow down the resize/scroll response to improve browser performance
				var $timer;
				$(window).on('resize scroll', function() {
					if($timer) {
						window.clearTimeout($timer);
					}
					$timer = window.setTimeout(function() {

						// bind viewport check for matching ID of each menu item
						$menuItems.each(function() {

							// update the 'is-active' menu class as page element/ID's scroll into viewport
							if($(this.hash).inViewport()) {
								$(this).addClass('is-active').siblings().removeClass('is-active');
							}
						});

					}, 10);
				});
			}
		}
	}
});