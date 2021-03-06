function resetSubmenu() {
    $(".menu-horizontal > li > a.hover").removeClass("hover");
    $(".submenu-container").hide();
}

$(document).on("mousemove", "body", function(e) {
    if ($("div.submenu-container:visible").length > 0) {
        var minX = (parseInt($(document).width()) - parseInt($("div.main-menu nav.container").width())) / 2;
        var maxX = minX + parseInt($("div.main-menu nav.container").width());
        var minY = $("div.main-menu nav.container").position().top;
        var maxY = minY + $("div.submenu-container:visible").height() + $("div.main-menu nav.container").height();
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

$(document).ready(function() {
    $(".main-menu .menu-horizontal > li, .main-menu nav.container > a.ui-button").hoverIntent(function() {
        var $menuLink = $(this).find("> a");
        resetSubmenu();
        var $submenu = $("#" + $(this).data("submenu"));
        var $submenuContainer = $(this).find(".submenu-container");
        if ($submenuContainer.length < 1) {
            $submenuContainer = $(this).next(".submenu-container");
        }
        if ($menuLink.length > 0) {
            $menuLink.addClass("hover");
        }
        $submenu.css({ left: 0 });
        $submenuContainer.show();
        $submenu.show();
    });

    var $menu = $(".main-menu .menu-vertical");
    $menu.menuAim({
        activate: activateSubmenu,
        deactivate: deactivateSubmenu
    });

    function activateSubmenu(row) {
        var $row = $(row);
        $row.find("> a").addClass("hover");
        $row.find("> a span.ui-icon-small").removeClass("icon-small-grey").addClass("icon-small-yellow");
        var $submenu = $("#" + $row.data("submenu"));
        var left = $row.position().left + $row.outerWidth(true) + 1;
        $submenu.css({ left: left });
        $submenu.show();
    }

    function deactivateSubmenu(row) {
        var $row = $(row);
        $row.find("> a").removeClass("hover");
        $row.find("> a span.ui-icon-small").removeClass("icon-small-yellow").addClass("icon-small-grey");
        var $submenu = $("#" + $row.data("submenu"));
        $submenu.hide();
    }
});

