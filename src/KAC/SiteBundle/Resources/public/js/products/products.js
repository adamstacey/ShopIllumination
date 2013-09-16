$(document).ready(function() {
    $(".actionAddToBasket").on('click', function() {
        var $quantityInput = $(this).parent().find("input.quantity"),
            $el = $(this).parent();

        $("#purchasingLoading"+$el.attr("data-variant-id")).show();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: $el.attr("data-basket-url"),
            data: {
                productId: $el.attr("data-product-id"),
                variantId: $el.attr("data-variant-id"),
                quantity: $quantityInput.val()
            },
            error: function(data) {
                $("#purchasingLoading"+$el.attr("data-variant-id")).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading"+$el.attr("data-variant-id")).hide();
                updateBasketSummary(data.summary_html);
                updateProductInfo($el.attr("data-variant-id"), data.product_html);
            }
        });
    });

    $(".actionQuickAddToBasket").on('click', function() {
        var quantity = $(this).attr("data-quantity");
        var productId = $(this).attr("data-product-id");
        var variantId = $(this).attr("data-variant-id");
        var basketUrl = $(this).attr("data-basket-url");

        $("#purchasingLoading"+variantId).show();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: basketUrl,
            data: {
                productId: productId,
                variantId: variantId,
                quantity: quantity
            },
            error: function(data) {
                $("#purchasingLoading"+variantId).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading"+variantId).hide();
                updateBasketSummary(data.summary_html);
                updateSmallProductInfo(variantId, data.small_product_html);
            }
        });
    });

    $(".actionAddNonProductToBasket").on('click', function() {
        var $quantityInput = $(this).parent().find("input.quantity"),
            $el = $(this).parent();

        $("#purchasingLoading"+$el.attr("data-id")).show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: $el.attr("data-basket-url"),
            data: {
                productId: $el.attr("data-id"),
                variantId: $el.attr("data-id"),
                deliveryBand: $el.attr("data-delivery-band"),
                url: $el.attr("data-url"),
                unitCost: $el.attr("data-unit-cost"),
                productCode: $el.attr("data-product-code"),
                header: $el.attr("data-header"),
                brand: $el.attr("data-brand"),
                description: $el.attr("data-description"),
                quantity: $quantityInput.val()
            },
            error: function(data) {
                $("#purchasingLoading"+$el.attr("data-id")).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading"+$el.attr("data-id")).hide();
                updateBasketSummary(data.summary_html);
                updateProductInfo($el.attr("data-id"), data.product_html);
            }
        });
    });

    $('#basket-summary').hoverIntent({
        timeout: 500,
        over: function() {
            if(parseInt($(this).find('.dropdown-summary').attr("data-items"), 10) > 0)
            {
                $(this).addClass('expanded').find('.dropdown-summary').show();
            }
        },
        out: function() {
            $(this).removeClass('expanded').find('.dropdown-summary').hide();
        }
    });

    $(document).on('click', ".action-delete-basket-item", function() {
        $.ajax({
            type: "GET",
            url: $(this).attr("data-url"),
            data: {
                basketItemId: $(this).attr("data-basket-item-id")
            },
            success: function(data) {
                updateBasketSummary();
            }
        });
    });

    $(document).on('click', "#basket-summary .action-clear-basket", function() {
        $.ajax({
            type: "GET",
            url: $(this).attr("data-url"),
            success: function(data) {
                updateBasketSummary();
            }
        });
    });
});
//function updateBasketSummary() {
//    var $el = $("#basket-summary");
//
//    $.ajax({
//        type: "GET",
//        url: $el.attr("data-url"),
//        success: function(data) {
//            $el.html(data);
//            generateButtons($el);
//            if(parseInt($(this).find('.dropdown-summary').attr("data-items"), 10) > 0)
//            {
//                $(this).addClass('expanded').find('.dropdown-summary').show();
//            } else {
//                $el.removeClass('expanded').find('.dropdown-summary').hide();
//            }
//        }
//    });
//}

function updateBasketSummary(html) {
    var $el = $("#basket-summary");
    var callback = function(data) {
        $el.html(data);
        generateButtons($el);
        if(parseInt($(this).find('.dropdown-summary').attr("data-items"), 10) > 0)
        {
            $(this).addClass('expanded').find('.dropdown-summary').show();
        } else {
            $el.removeClass('expanded').find('.dropdown-summary').hide();
        }
    };


    if(html === undefined)
    {
        $.ajax({
            type: "GET",
            url: $el.attr("data-url"),
            success: callback
        });
    } else {
        callback(html);
    }
}

function updateProductInfo(variantId, html) {
    var $el = $(".basket-product-info[data-variantid="+variantId+"]");
    var callback = function(html) {
        if($el.length > 0) {
            $el.html(html);
            generateButtons($el);
        }
    };


    if(html === undefined)
    {
        callback('');
    } else {
        callback(html);
    }
}

function updateSmallProductInfo(variantId, html) {
    var $el = $(".small-basket-product-info[data-variantid="+variantId+"]");
    var callback = function(html) {
        if($el.length > 0) {
            $el.html(html);
            generateButtons($el);
        }
    };

    if(html === undefined)
    {
        callback('');
    } else {
        callback(html);
    }
}
