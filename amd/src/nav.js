define(['jquery'], function($) {

	'use strict';

	// top level navigation: target for attaching menu and click behaviour
	var $navTarget = $('.list-group:not(.m-t-1)');

	// menu addition target and "on this page" html
	var $navNamePrependTarget = $('.is-section:first()', $navTarget);
	var $prependHTML = '<a class="not-section list-group-item list-group-item-action" data-key="onthispage"><div class="m-l-0">On this page</div></a>';
	var $headerHeight = $( 'header[role="banner"]').height();

	// attach "on this page" html to top of menu
	$($navNamePrependTarget).before($prependHTML);

	// add toggle behaviour to "on this page"
	var $onThisPageToggle = $('a[data-key="onthispage"]', $navTarget);
	$( $onThisPageToggle ).on('click', function() {
		$(this).toggleClass('collapsed').siblings('.is-section').toggle();
	});

	// do not activate behaviour in editing mode
	if($('body').not('.editing')) {
	
		// bind click behaviour
		var $clickTargets = $('.is-section', $navTarget);
		$( $clickTargets ).on('click', function() {
			toggleContent(this,$headerHeight);
		});

		/* toggle content function vars:
		$t = target element ID
		$h = page header height (used to calculate scrollTop offset)
		*/
		var toggleContent = function(t,h) {

			// specific target to check/toggle
			var $target = t.hash;

			// toggle hidden content pane open
			var $contentTarget = $('.collapse', $target);
			$contentTarget.collapse('show');

			// once toggled open, scroll element to top of screen (minus height of header)
			$([document.documentElement, document.body]).animate({
				scrollTop: $($target).offset().top - h
			}, 250);
		};
	}

});
  