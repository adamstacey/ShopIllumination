$(document).ready(function() {
    $(document).on("click", ".actionToggleMoreInfo", function() {
        var $icon = $(this).find(".ui-icon");
        if ($icon.hasClass("icon-466")) {
            $(".more-info-container").slideDown();
            $icon.removeClass("icon-466").addClass("icon-467");
        } else {
            $(".more-info-container").slideUp();
            $icon.removeClass("icon-467").addClass("icon-466");
        }
    });

    $(document).on("click", ".actionAddToBasket", function() {
        var quantity = $(this).parent().find("input.quantity").val();
        if (!quantity) {
            quantity = 1;
        }
        var productId = $(this).parent().attr("data-product-id");
        var variantId = $(this).parent().attr("data-variant-id");
        var basketUrl = $(this).parent().attr("data-basket-url");

        $("#purchasingLoading" + variantId).show();
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
                $("#purchasingLoading" + variantId).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading" + variantId).hide();
                updateBasketSummary(data.summary_html);
                updateProductInfo(variantId, data.product_html);
            }
        });
    });

    $(document).on("click", ".actionQuickAddToBasket", function() {
        var quantity = $(this).attr("data-quantity");
        if (!quantity) {
            quantity = 1;
        }
        var productId = $(this).attr("data-product-id");
        var variantId = $(this).attr("data-variant-id");
        var basketUrl = $(this).attr("data-basket-url");

        $("#purchasingLoading" + variantId).show();
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
                $("#purchasingLoading" + variantId).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading" + variantId).hide();
                updateBasketSummary(data.summary_html);
                updateSmallProductInfo(variantId, data.small_product_html);
            }
        });
    });

    $(document).on("click", ".actionAddNonProductToBasket", function() {
        var quantity = $(this).attr("data-quantity");
        $el = $(this).parent();
        if (!quantity) {
            quantity = $el.find("input.quantity").val();
        }
        if (!quantity) {
            quantity = 1;
        }

        $("#purchasingLoading" + $el.attr("data-id")).show();
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
                quantity: quantity
            },
            error: function(data) {
                $("#purchasingLoading" + $el.attr("data-id")).hide();
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                $("#purchasingLoading" + $el.attr("data-id")).hide();
                updateBasketSummary(data.summary_html);
                updateProductInfo($el.attr("data-id"), data.product_html);
            }
        });
    });

    $("#basket-summary").hoverIntent({
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

    $(document).on("click", ".action-delete-basket-item", function() {
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

    $(document).on("click", "#basket-summary .action-clear-basket", function() {
        $.ajax({
            type: "GET",
            url: $(this).attr("data-url"),
            success: function(data) {
                $(".small-basket-product-info, .basket-product-info").hide();
                updateBasketSummary();
            }
        });
    });
});

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

    if (html === undefined) {
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
            $el.html(html).show();
            generateButtons($el);
        }
    };

    if (html === undefined)
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
            $el.html(html).show();
            generateButtons($el);
        }
    };

    if (html === undefined)
    {
        callback('');
    } else {
        callback(html);
    }
}

window.onbeforeunload = function () {
    updateBasketSummary();
}