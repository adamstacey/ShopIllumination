$(document).ready(function() {
    $(".actionAddToBasket").on('click', function() {
        var $quantityInput = $(this).parent().find("input.quantity"),
            $el = $(this).parent();

        $("#ajax-loading").show();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: $el.attr("data-basket-url"),
            data: {
                productId: $el.attr("data-product-id"),
                variantId: $el.attr("data-variant-id"),
                quantity: $quantityInput.val()
            },
            error: function(a, b, c) {
                console.log('error', a, b,c );
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(a, b, c) {
                updateBasketSummary();
                $("html, body").animate({scrollTop: 0},'slow', function() {
                    setTimeout(function() {
                        $('.dropdown-summary').hide();
                        $('#basket-summary').removeClass('expanded');
                    }, 5000);
                });
            }
        });
    });

    $(".actionAddNonProductToBasket").on('click', function() {
        var $quantityInput = $(this).parent().find("input.quantity"),
            $el = $(this).parent();

        $("#ajax-loading").show();
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
            error: function(a, b, c) {
                console.log('error', a, b,c );
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(a, b, c) {
                console.log('success', a, b,c );
                updateBasketSummary();
                $("html, body").animate({scrollTop: 0},'slow', function() {
                    $('.dropdown-summary').show();
                    $('#basket-summary').addClass('expanded');
                    setTimeout(function() {
                        $('.dropdown-summary').hide();
                        $('#basket-summary').removeClass('expanded');
                    }, 5000);
                });
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
function updateBasketSummary() {
    var $el = $("#basket-summary");

    $.ajax({
        type: "GET",
        url: $el.attr("data-url"),
        success: function(data) {
            $el.html(data);
            generateButtons($el);
            if(parseInt($(this).find('.dropdown-summary').attr("data-items"), 10) > 0)
            {
                $(this).addClass('expanded').find('.dropdown-summary').show();
            } else {
                $el.removeClass('expanded').find('.dropdown-summary').hide();
            }
        }
    });
}
