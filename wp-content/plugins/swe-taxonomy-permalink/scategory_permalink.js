/* Hikari Category Permalink */
(function ($) {
    $.fn.sCategoryPermalink = function (options) {
        $(this).append('<input type="hidden" name="scategory_permalink" id="scategory_permalink" />');
        var obj = this;

        return this.each(function () {
            $(this).find('.tabs-panel label input[type=checkbox]').each(function () {
                var label = $(this).parent('label');
                var li = $(label).parent('li');

                var link = '&nbsp;<a class="scategory_link">Permalink</a>';

                label.after(link);
                $('.scategory_link', li).bind('click', onClick);
                $('input', label).bind('change', onChange);
                li.hover(onMouseOver, onMouseOut);

                if (options.current == this.value) {
                    label.css('fontWeight', 'bold');
                    $('#scategory_permalink').val(options.current);
                }
            });
        });

        function onClick(event) {
            deselectAll();

            var current = $(this).prev('label').find('input').val();

            $('#in-popular-'+options.taxonomy+'-' + current + ',#in-'+options.taxonomy+'-' + current).each(function () {
                $(this).parent('label').css('fontWeight', 'bold');
                $(this).attr('checked', true);
            });

            $('#scategory_permalink').val(current);
            event.preventDefault();
        }

        function onChange() {
            var current = $('#scategory_permalink').val();
            if (!this.checked && current == this.value) {
                deselectAll();
                $('#scategory_permalink').val('');
            }
        }

        function onMouseOver() {
            $(this).find('a.scategory_link:first').show();
        }

        function onMouseOut() {
            $(this).find('a.scategory_link').hide();
        }

        function deselectAll() {
            $('ul li label', obj).css('fontWeight', '');
        }
    }
})(jQuery);
