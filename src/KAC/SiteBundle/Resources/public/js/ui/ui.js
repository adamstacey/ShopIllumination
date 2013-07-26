function loadUiFunctions() {
    $(".accordion").accordion({
        header: "div.accordion-item h3",
        icons: { "header": "icon-black icon-466", "activeHeader": "icon-grey icon-467", "headerSelected": "icon-black icon-467" },
        heightStyle: "content",
        collapsible: true
    });

    $(".tabs").tabs();

    $("img[title], span[title], th[title], .button[title]").tooltip({
        track: true
    });
}

$(document).ready(function() {
    loadUiFunctions();

    $(document).on("click", ".accordion-header-buttons .button", function() {
        var $accordionItemIndex = $(".accordion-item .accordion-header-buttons").index($(this).closest(".accordion-header-buttons"));
        $(this).closest(".accordion").accordion( "option", "active", $accordionItemIndex);
    });
});