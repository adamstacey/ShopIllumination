function resetSubmenu() {
    $(".menu-horizontal > li > a.hover").removeClass("hover");
    $(".submenu-container").hide();
}

$(document).on("mousemove", "body", function(e) {
    if ($("div.submenu-container:visible").length > 0) {
        var minX = (parseInt($(document).width()) - parseInt($("div.main-menu nav").width())) / 2;
        var maxX = minX + parseInt($("div.main-menu nav").width());
        var minY = $("div.main-menu nav").position().top;
        var maxY = minY + $("div.submenu-container:visible").height() + $("div.main-menu nav").height();
        if (((e.pageY < minY) || (e.pageY > maxY)) || ((e.pageX < minX) || (e.pageX > maxX))) {
            resetSubmenu();
        }
    }
});

$(document).on("click", ".actionLoadPageDialog", function() {
    var $url = $(this).attr("href");
    var $title = $(this).attr("title");
    var $dialogObject = $('<div class="dialog-container"><div class="loading">Loading...<br /><img src="/bundles/kacsite/"</div></div>');
    var $iframeObject = $('<iframe width="100%" height="100%" src="'+$url+'" />"');
    $iframeObject.appendTo($dialogObject);
    $dialogObject.appendTo("body");
    $dialogObject.dialog({
        close: function(event, ui) {
            $dialogObject.remove();
        },
        modal: true,
        title: $title,
        width: 980,
        height: ($(window).height() * 0.8)
    });
    return false;
});

$(document).on("click", ".actionLoadDialog", function() {
    var $dialogObject = $($(this).data("dialog-object"));
    var dialogWidth = 600;
    if (parseInt($(this).data("dialog-width")) > 0) {
        dialogWidth = parseInt($(this).data("dialog-width"));
    }
    $dialogObject.dialog({
        close: function(event, ui) {
            $(this).dialog("close");
        },
        modal: true,
        width: dialogWidth
    });
    return false;
});

$(document).on("click", ".actionClose", function() {
    if ($(this).attr("data-hide-class") != "") {
        $(this).closest("."+$(this).attr("data-hide-class")).remove();
    } else {
        $(this).remove();
    }
});

$(document).ready(function() {
    $("ul.sf-menu").superfish().supposition();

    $("ul.sf-menu > li > a").hover(function() {
        resetSubmenu();
    });

    $(".main-menu nav > a.ui-button").hoverIntent(function() {
        resetSubmenu();
        var $submenu = $("#" + $(this).data("submenu"));
        var $submenuContainer = $(this).next(".submenu-container");
        $submenu.css({ left: 0 });
        $submenuContainer.show();
        $submenu.show();
    });
});

