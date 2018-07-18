define([], function() {

    'use strict';


    // We override the drag and drop functionality because we need a 
    // class on the generated html to style it properly


    /**
    * Process sections after ajax response
    *
    * @param {YUI} Y YUI3 instance
    * @param {array} sectionlist
    * @param {array} response ajax response
    * @param {string} sectionfrom first affected section
    * @param {string} sectionto last affected section
    */
    return (function() {
        M.course.format.process_sections = function(Y, sectionlist, response, sectionfrom, sectionto) {
            var CSS = {
                SECTIONNAME: 'sectionname'
            },
            SELECTORS = {
                SECTIONLEFTSIDE: '.left .section-handle .icon'
            };

            if (response.action == 'move') {
                // If moving up swap around 'sectionfrom' and 'sectionto' so the that loop operates.
                if (sectionfrom > sectionto) {
                    var temp = sectionto;
                    sectionto = sectionfrom;
                    sectionfrom = temp;
                }

                // Update titles and move icons in all affected sections.
                var ele, str, stridx, newstr;

                for (var i = sectionfrom; i <= sectionto; i++) {
                    // Update section title.
                    var content = Y.Node.create('<span class="topic-heading">' + response.sectiontitles[i] + '</span>');
                    sectionlist.item(i).all('.'+CSS.SECTIONNAME).setHTML(content);
                    // Update move icon.
                    ele = sectionlist.item(i).one(SELECTORS.SECTIONLEFTSIDE);
                    str = ele.getAttribute('alt');
                    stridx = str.lastIndexOf(' ');
                    newstr = str.substr(0, stridx +1) + i;
                    ele.setAttribute('alt', newstr);
                    ele.setAttribute('title', newstr); // For FireFox as 'alt' is not refreshed.
                }
            }
        };
    })();
});