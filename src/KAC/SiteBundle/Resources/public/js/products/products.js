$(document).ready(function() {
    $(".actionAddToBasket").on('click', function() {
        var $quantityInput = $(this).parent().find("input.quantity"),
            $el = $(this).parent();

        $("#ajax-loading").show();
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

    $('#basket-summary').hover(function() {
        $(this).find('.dropdown-summary').show();
        $(this).addClass('expanded');
    }, function() {
        $(this).find('.dropdown-summary').hide();
        $(this).removeClass('expanded');
    });

    function selectWorktopThickness(worktopThickness) {
        $("table.data-table tbody.updatable tr").hide();
        $("table.data-table tbody.updatable tr").removeClass("even odd");
        $("table.data-table tbody.updatable tr[data-worktop-thickness='"+worktopThickness+"']").show();
        $("table.data-table tbody.updatable tr:visible:even").addClass("even");
        $("table.data-table tbody.updatable tr:visible:odd").addClass("odd");
    }

    selectWorktopThickness($("input[name='worktop-thickness']").val());

    $("input[name='worktop-thickness']").on("change", function() {
        selectWorktopThickness($(this).val());
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
        }
    });
}
