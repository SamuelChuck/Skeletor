(function($, window) {
    var arrowWidth = 12;

    $.fn.resizeselect = function(settings) {
        return this.each(function() {

            $(this).change(function() {
                var $this = $(this);

                // create test element
                var text = $this.find("option:selected").text();
                var select = $("<span>").html(text).css({
                    "font-size": $this.css("font-size"), // ensures same size text
                    "visibility": "hidden" // prevents FOUC
                });


                // add to parent, get width, and get out
                select.appendTo($this.parent());
                var width = select.width();
                select.remove();

                // set select width
                $this.width(width + arrowWidth);

                // run on start
            }).change();

        });
    };

    // run by default
    $("select.jet-ajax-search__categories-select").resizeselect()
    // $("select#jet_ajax_search_categories_670b6e1").resizeselect()

})(jQuery, window);