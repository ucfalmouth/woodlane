define(['jquery', 'theme_woodlane/elevio'], function($, elevio) {

    'use strict';

    return (function() {

        var $elevioButton = $('#ls-elevio-trigger');
        var triggerElevio = function(event) {
          if (elevio) {
            event.preventDefault();
            elevio.open();
          }
        };
        if ($elevioButton.length) {
          $elevioButton.on('click', triggerElevio);
        }
      })();
});
