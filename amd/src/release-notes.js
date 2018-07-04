define(['jquery', 'underscore'], function($, _) {

    var getMonthStr = function(i) {
        var arr = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        return arr[i];
    };

    var getDateObj = function(relDate) {

        var now = new Date();
        var obj = {};
        var releaseDate = relDate.split("/").reverse();
        releaseDate[1] = releaseDate[1] - 1;
        releaseDate = new Date(releaseDate[0], releaseDate[1], releaseDate[2]);
        obj.day = releaseDate.getDate();
        obj.month = getMonthStr(releaseDate.getMonth());
        obj.year = releaseDate.getFullYear();
        obj.future = ((now - releaseDate) < 0) ? true : false;
        return obj;
    };


    var validateData = function(data) {
        var filtered = data.filter(function(e) {
            return (e.gsx$date.$t.length && e.gsx$description.$t.length && e.gsx$version.$t.length && e.gsx$title.$t);
        });
        return filtered;
    };

    var buildHtml = function(data, template) {
        var html = '<ul class="release-list">\n';
        _.forEach(data, function(obj) {
            html += template(obj);
        });
        html += "</ul>";
        return html;
    };

    var init = function(template) {
        // Do stuff on page load

        var compiled = _.template(template);
        var $releaseLink = $('.release-notes-link');
        var $overlay = $('.overlay');
        var feedUrl = $releaseLink.data('url');

        $releaseLink.on('click', function(e) {
            e.preventDefault();
            if (!$('.release-list').length) {
                $.ajax({
                    url: feedUrl,
                    cache: false
                }).done(function(data) {
                    var content = data.feed.entry;
                    content = validateData(content);
                    var renderArr = content.map(function(obj) {
                        var rObj = {};
                        rObj.releaseDate = getDateObj(obj.gsx$date.$t);
                        rObj.title = obj.gsx$title.$t;
                        rObj.description = obj.gsx$description.$t;
                        rObj.version = obj.gsx$version.$t;
                        return rObj;
                    });
                    var html = buildHtml(renderArr, compiled);
                    $('.releases-wrap').html(html);
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    var errObj = {
                        'jqxhr': jqXHR,
                        'status': textStatus,
                        'error': errorThrown
                    };
                    $('.loader').remove();
                    $('.fallback').removeClass('hide').data('error', errObj);
                });
            }
            $overlay.addClass('open');
        });
        $overlay.on('click', '.overlay-close', function(e) {
            e.preventDefault();
            $overlay.removeClass('open');
        });

    };

    return {
        init: init
    };
});