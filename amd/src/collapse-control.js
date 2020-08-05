define(['jquery'], function ($) {

    'use strict';

    return (function () {

        var $topics, $content, $controlWrap, $control;

        if ($('body').is('.editing')) {
            return;
        }

        $topics = $('.course-content .topics');
        $content = $('.course-content .collapse');
        $controlWrap = $('<div class="collapse-control-wrap" />');
        $control = $('<a href="#" class="collapse-control">Collapse/expand all</a>');

        $control.on('click', function (e) {
            e.preventDefault();
            $content.collapse(($content.is(':visible')) ? 'hide' : 'show');
        });

        $controlWrap.append($control);
        $topics.before($controlWrap);

    })();

});
