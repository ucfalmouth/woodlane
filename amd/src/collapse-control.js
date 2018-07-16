define(['jquery'], function($) {

  'use strict';

  return (function() {

    var $topics = $('.course-content .topics');
    var $content = $('.course-content .collapse');
    var $controlWrap = $('<div class="collapse-control-wrap" />');
    var $control = $('<a href="#" class="collapse-control">Collapse all</a>');

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
