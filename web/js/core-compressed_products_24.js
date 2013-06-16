$(document).ready(function() {
    $(".action-add-to-basket").on('click', function() {
        $("#ajax-loading").show();
        $.ajax({
            type: "GET",
            dataType: "json",
            url: $(this).attr("data-basket-url"),
            data: {
                productId: $(this).attr("data-product-id"),
                variantId: $(this).attr("data-variant-id"),
                quantity: $("#quantity-"+$(this).attr("data-product-id")).val(),
                selectedOptions: $("#selected-options-"+$(this).attr("data-product-id")).val()
            },
            error: function(data) {
                console.log(data);
                $("#message-error-text").html('Sorry, there was a problem adding the item to your basket. Please try again.');
                $("#message-error").fadeIn(function() {
                    $("html, body").animate({scrollTop: $("#message-error").offset().top - 15},'slow');
                    $("#ajax-loading").hide();
                });
            },
            success: function(data) {
                updateBasketSummary();
                $("html, body").animate({scrollTop: 0},'slow', function() {
                    $("#shopping-basket-popup-image").attr("src", data.thumbnailPath);
                    $("#shopping-basket-popup-image").attr("alt", data.header);
                    $("#shopping-basket-popup-title").attr("href", data.url);
                    $("#shopping-basket-popup-title").html(data.header);
                    $("#shopping-basket-popup-description").html(data.quantity+' &times; &pound;'+data.price+" = &pound;"+data.subTotal);
                    $("#shopping-basket-popup").dialog('open');
                    setTimeout('$("#shopping-basket-popup").dialog("close")', 5000);
                    $("#ajax-loading").hide();
                });
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
        }
    });
}