define(['jquery'], function($) {

  'use strict';

  return (function() {

    var $topics, $content, $controlWrap, $control;

    if ($('body').is('.editing')) {
      return;
    }

    $topics = $('.course-content .topics');
    $content = $('.course-content .collapse');
    $controlWrap = $('<div class="collapse-control-wrap" />');
    $control = $('<a href="#" class="collapse-control">Collapse all</a>');

    $content.on('shown.bs.collapse hidden.bs.collapse', function() {
      if (!$content.is(':hidden')) {
        $control.text('Collapse all').data('allexpanded', 'true');
      } else {
        $control.text('Expand all').data('allexpanded', 'false');
      }
    });

    $control.on('click', function(e) {
      e.preventDefault();
      var allOpen = $control.data('allexpanded');
      $content.collapse((allOpen === 'false') ? 'show' : 'hide');
    });

    $controlWrap.append($control);
    $topics.before($controlWrap);

  })();

});
