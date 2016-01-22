/**
 * Created with JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:29
 * To change this template use File | Settings | File Templates.
 */

var $ = jQuery;
var shop = {

    /**
     * use ajax loading?
     */
    ajaxReload: false,

    /**
     * use infinite scrolling?
     */
    infiniteScroll: false,

    /**
     * constructor
     */
    init: function() {

        /**
         * add to cart via ajax request
         * @todo check response
         */
        var initAjaxAddToCartQuantity = function() {

            // hook on submit
            jQuery('.add-to-car-quantity').submit(function(e) {
                e.preventDefault();

                // get target
                var form = jQuery(this).fadeTo(0.5, 0.8);

                // ajax request
                jQuery.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: jQuery(this).serialize()
                }).done(function(response) {
                    form.fadeTo(0.5, 1);

                    jQuery('#header .cart_details').replaceWith( response.snippet.snippetHeader );

                    jQuery.gritter.add({
                        title: response.title,
                        text: response.text,
                        image: response.image
                    });
                });
            });
        };


        /**
         * add to cart via ajax request
         * @todo check response
         */
        var initAjaxAddToCart = function() {

            // ajax feature enabled?
            if(shop.ajaxReload == false)
            {
                return;
            }

            shop.getProductListElement().on('click', '.add-to-cart', function(e) {
                e.preventDefault();

                // get target
                var target = jQuery(this).attr('href');

                // ajax request
                jQuery.ajax({
                    type: "GET",
                    url: target
                }).done(function(response) {

                    jQuery('#header .cart_details').replaceWith( response.snippet.snippetHeader );

                    jQuery.gritter.add({
                        title: response.title,
                        text: response.text,
                        image: response.image
                    });
                });
            });
        };



        /**
         * add to wishlist via ajax request
         * @todo check response
         */
        var initAjaxAddToWishlist = function() {

            jQuery('.add-to-wishlist').click(function(e) {
                e.preventDefault();

                // get target
                var target = jQuery(this).attr('href');

                // ajax request
                jQuery.ajax({
                    type: "GET",
                    url: target
                }).done(function(response) {
                    jQuery.gritter.add({
                        title: response.title,
                        text: response.text,
                        image: response.image
                    });
                });
            });
        };


        /**
         * ajax filter
         */
        var initAjaxFilterChanged = function() {
            console.log("init filter changed");

            // trigger change event
            shop.getAjaxFilterElement().find('.checkbox').click(function(e) {
                e.preventDefault();
                var checkbox = jQuery(this).find('input[type=checkbox]');
                checkbox.attr('checked', !checkbox.attr('checked'));
                checkbox.trigger('change');
            });

            shop.getAjaxFilterElement().find('.js_optionfilter_option').click(function(e) {
                e.preventDefault();
                var filterOption = jQuery(e.currentTarget);
                filterOption.parents('.js_filterparent').find('.js_optionvaluefield').attr('value', filterOption.attr('rel'));
                reloadFilter();
            });

            shop.getAjaxFilterElement().find('.js_reset_filter').click(function(e) {
                e.preventDefault();
                var filterOption = jQuery(e.currentTarget);
                var optionValueField = filterOption.parents('.js_filterparent').find('.js_optionvaluefield');
                optionValueField.attr('value', optionValueField.attr('rel'));
                reloadFilter();
            });




            // filter changed
            shop.getAjaxFilterElement().find('input[type=checkbox]').change(reloadFilter);
        };

        var reloadFilter = function() {
            // init
            var form = jQuery('#js_filterfield');
            var container = jQuery('#content .container').fadeTo(0.5, 0.5);
            var url = form.attr('action') + "?" + form.serialize();

            // visualize
            jQuery(this).parents('.checkbox').toggleClass('checked');

            // ajax reload or full load?
            if(shop.ajaxReload)
            {
                // load new page
                jQuery.ajax({
                    url: url,
                    success: function(response) {
                        container.html(response);
                        initAjaxAddToCart();
                        initAjaxFilterChanged();
                        container.fadeTo(0.5, 1);
                        // add link from ajax call to the history
                        if(window.history.pushState) {
                            window.history.pushState(null, url, url);
                        } else {
                            jQuery.address.value(url);
                        }
                    }
                });
            }
            else
            {
                form.submit();
            }
        };



        /**
         * enable infinite scrolling
         * @param container
         */
        var infiniteScrollLoading = false;
        var infiniteLoadingIndicator = jQuery('<div class="infinity-loading"></div>');
        var initInfiniteScroll = function() {

            // ajax feature enabled?
            if(shop.infiniteScroll == false)
            {
                return;
            }


            // init
            var products = shop.getProductListElement();
            products.infiniteScroll({
                threshold: 800,
                onEnd: function() {
                    console.log('No more results!');
                },
                onBottom: function(callback) {

                    console.log("bottom...");

                    // already loading?
                    if(infiniteScrollLoading)
                    {
                        return;
                    }


                    // init
                    var pagination = shop.getPaginationElement();
                    var page = pagination.find('.active').last().next('.page').addClass("active");
                    var list = shop.getProductListElement();

                    if(page.length > 0)
                    {
                        // show loading indicator
                        list.append(infiniteLoadingIndicator);

                        var link = page.find('a').attr('href') + "&infinity=1";
                        console.log(link);

                        // load more
                        infiniteScrollLoading = true;
                        jQuery.get(link, function(data) {
                            list.find('.infinity-loading').remove();

                            var insert = jQuery(data);
                            list.append(insert);

                            infiniteScrollLoading = false;

                            callback(true);
                        });
                    }
                    else
                    {
                        callback(true);
                    }


                }
            });
        };


        /**
         * Remove a cart item
         */
        var initAjaxRemoveFromCart = function() {

            jQuery('.cart-list-items-remove .action').click(function(e) {
                e.preventDefault();

                // get target
                var target = jQuery(this).attr('href');

                // ajax request
                jQuery.ajax({
                    type: "POST",
                    url: target
                }).done(function(response) {

                    jQuery('#header .cart_details').replaceWith( response.snippet.snippetHeader );

                    jQuery.gritter.add({
                        title: response.title,
                        text: response.text,
                        image: response.image
                    });
                });

                // remove html
                jQuery(this).parents('tr').fadeOut();
            });

        };

        /**
         * Update cart items
         */
        var initCartUpdate = function() {

            jQuery('#js-cart-form .cart-quantity').change(function() {
                jQuery('#js-cart-checkout').hide();
                jQuery('#js-cart-update').show();
            });

            jQuery('#js-cart-update-button').click(function(e) {
                e.preventDefault();
                jQuery('#js-cart-form').submit();
            });

        };

        /**
         *
         */
        var initAjaxCartItemComments = function () {

            /**
             *
             */
            var handleLinks = function () {

                jQuery('#cart-list-items .cart-list-items-comment .comment-text').each(function () {
                    if(jQuery(this).html() == '')
                    {
                        // empty comment, hide text and show add link
                        jQuery(this).hide();
                        jQuery(this).next('.link').show();
                    }
                    else
                    {
                        jQuery(this).show();
                        jQuery(this).next('.link').hide();
                    }
                });

            };
            handleLinks();

            // add new comment
            jQuery('#cart-list-items .cart-list-items-comment .link').click(function (e) {

                e.preventDefault();

                var editor = jQuery(this).prevAll('.comment-editor').show().focus();
                jQuery(this).hide();

            });

            // edit existing comment
            jQuery('#cart-list-items .cart-list-items-comment .comment-text').click(function () {

                var item = jQuery(this).hide();
                var editor = jQuery(this).prev('.comment-editor').show().focus();

            });

            // save comment
            jQuery('#cart-list-items .cart-list-items-comment .comment-editor').blur(function () {

                var editor = jQuery(this).hide();
                var item = jQuery(this).next('.comment-text').show();

                item.html( editor.val() );

                // get target
                var form = jQuery(this).closest("form");

                // ajax indicator
                var indicator = jQuery(this).parents('tr').addClass('activity');

                // ajax request
                jQuery.ajax({
                    type: "POST",
                    url: jQuery(form).attr('action'),
                    data: jQuery(this).serialize()
                }).done(function(response) {

                    jQuery('#header .cart_details').replaceWith( response.snippet.snippetHeader );

                    indicator.removeClass('activity');

                    jQuery.gritter.add({
                        title: response.title,
                        text: response.text,
                        image: response.image
                    });

                    handleLinks();
                });

            });

        }


        var initProductSearch = function() {
            $( "#search .searchterm" ).autocomplete({
                source: language + "/action/shop/search",
                minLength: 3,
                select: function( event, ui ) {
                    window.location.href = window.location.protocol + "//" + window.location.hostname + ui.item.url;
                }
            });
        }

        // init list page feature
        initAjaxAddToCart();
        initAjaxFilterChanged();
        initInfiniteScroll();

        // init detail page feature
        initAjaxAddToCartQuantity();
        initAjaxAddToWishlist();

        // init cart page feature
        initAjaxRemoveFromCart();
        initAjaxCartItemComments();
        initCartUpdate();

        initProductSearch();

    },


    /**
     * return the product list html element from the current view
     * @returns {*}
     */
    getProductListElement: function() {
        return jQuery('#js-productlist');
    },


    /**
     * return the pagination html element from the current view
     * @returns {*}
     */
    getPaginationElement: function() {
        return jQuery('#js-pagination');
    },


    /**
     * return the filter html element from the current view
     * @returns {*}
     */
    getAjaxFilterElement: function() {
        return jQuery('#js_filterfield');
    }

};


// init shop system
jQuery(document).ready(function() {
    shop.init();
});