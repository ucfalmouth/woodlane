define(['jquery', 'theme_woodlane/window'], function($, win) {

  'use strict';

    var scrollToSection = function(section) {
        win.scrollTo(0, $(section).offset().top - 100);
    };

    var handler = function(e) {
        e.preventDefault();
        var url = $(e.currentTarget).attr('href');
        var hash = url.substr(url.indexOf('#'));

        if (win.history.pushState) {
            win.history.pushState(null, null, hash);
        } else {
            win.location.hash = hash;
        }

        scrollToSection(hash);

    };

  return (function() {

    if (win.location.hash) {
        scrollToSection(win.location.hash);
    }
    $('#nav-drawer .is-section').on('click', handler);

  })();

});
