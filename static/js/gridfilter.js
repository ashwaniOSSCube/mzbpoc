
var $ = jQuery;
(function ($) {
    $('.filterList .js_optionfilter_option').click(function() {
        ELEMENTS.onlineShop.gridfilters.selectFilter(this);
    });

    $('.filterList .js_genderfilter_option').click(function() {
        if($(this).hasClass('active')) {
            var parent = $(this).parents('.js_filterparent');
            ELEMENTS.onlineShop.gridfilters.resetFilter(parent, this);
        } else {
            ELEMENTS.onlineShop.gridfilters.selectFilter(this);
        }
    });



    $('.filterList .js_reset_filter').on('click', function() {
        var parent = $(this).parents('.js_filterparent');
        ELEMENTS.onlineShop.gridfilters.resetFilter(parent, this);
    });
    $('.resetAll').on('click', function() {
        ELEMENTS.onlineShop.gridfilters.resetAllFilters();
    })
})(jQuery);


if(!ELEMENTS) {
    var ELEMENTS = {};
}
if(!ELEMENTS.onlineShop) {
    ELEMENTS.onlineShop = {};
}

ELEMENTS.onlineShop.gridfilters = {};

ELEMENTS.onlineShop.gridfilters.selectFilter = function(option) {
    var parent = $(option).parents('.js_filterparent');
    parent.addClass("active");
    $(parent).children('.js_options').hide();
    $(parent).children('.js_optionvaluefield').val($(option).attr('rel'));

    $(parent).find('.js_curent_selection_text').html($(option).html());

    $(parent).find('.js_icon').addClass('js_reset_filter');

    ELEMENTS.onlineShop.gridfilters.submitForm();
};

ELEMENTS.onlineShop.gridfilters.resetFilter = function(parent, icon) {
    parent.removeClass('active');
    $(parent).children('.js_optionvaluefield').each(function(index, value) {
        $(value).val($(value).attr("rel"));
    });

    if(icon) {
        $(icon).removeClass('js_reset_filter');
        $(icon).removeClass('active');
    }

    ELEMENTS.onlineShop.gridfilters.submitForm();
};

ELEMENTS.onlineShop.gridfilters.resetAllFilters = function() {
    $('#js_filterfield input').val('');
    ELEMENTS.onlineShop.gridfilters.submitForm();
};

ELEMENTS.onlineShop.gridfilters.submitForm = function() {
    $('#js_filterfield').submit();
};

