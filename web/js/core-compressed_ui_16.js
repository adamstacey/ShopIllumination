function loadUiFunctions() {
    $(".accordion").accordion({
        header: "div.accordion-item h3",
        icons: { "header": "icon-black icon-465", "activeHeader": "icon-grey icon-466", "headerSelected": "icon-black icon-466" },
        heightStyle: "content",
        collapsible: true
    });

    $(".tabs").tabs();

    $("img[title], span[title], th[title] .button[title]").tooltip({
        track: true
    });
}

$(document).ready(function() {
    loadUiFunctions();
});