function showMainMenuSubMenu() {
    if (!$(this).hasClass("hover")) {
        resetMainMenu();
        $(this).addClass("hover");
        $("#mainMenuGroup"+$(this).attr("data-main-menu-group")).fadeIn(200);
    }
}

function resetMainMenu() {
    $(".main-menu > nav > ul > li > a").removeClass("hover");
    $(".main-menu-group").fadeOut(100);
}

function checkMainMenuSubMenu() {
    if ($(".main-menu-group:visible").length > 0) {
        var $mainMenuGroupX = $(".main-menu-group:visible").offset().left;
        var $mainMenuGroupY = $(".main-menu-group:visible").offset().top - 40;
        var $mainMenuGroupWidth = $(".main-menu-group:visible").outerWidth(true);
        var $mainMenuGroupHeight = $(".main-menu-group:visible").outerHeight(true) + 40;
        var $mainMenuGroupOffsetX = event.pageX - $mainMenuGroupX;
        var $mainMenuGroupOffsetY = event.pageY - $mainMenuGroupY;
        if (($mainMenuGroupOffsetX < 0) || ($mainMenuGroupOffsetY < 0) || ($mainMenuGroupOffsetX > $mainMenuGroupWidth) || ($mainMenuGroupOffsetY > $mainMenuGroupHeight)) {
            resetMainMenu();
        }
    }
}

$(document).ready(function() {
    $(".main-menu > nav > ul > li > a").hoverIntent(showMainMenuSubMenu);

    $(document).on("mousemove", function(){
        checkMainMenuSubMenu();
    });

    $(document).on("click", ".actionClose", function() {
        if ($(this).attr("data-hide-class") != "") {
            $(this).closest("."+$(this).attr("data-hide-class")).remove();
        } else {
            $(this).remove();
        }
    });

    $(document).on("click", ".actionLoadPageDialog", function() {
        var $url = $(this).attr("href");
        var $title = $(this).attr("title");
        var $dialogObject = $('<div class="dialog-container"></div>');
        var $loadingObject = $(".loading-container").clone();
        $loadingObject.removeAttr("style");
        $loadingObject.appendTo($dialogObject);
        var $iframeObject = $("<iframe />");
        $iframeObject.attr({"src": $url, "width": "100%", "height": "100%"});
        $iframeObject.appendTo($dialogObject);
        $iframeObject.load(function() {
            $dialogObject.find(".loading-container").fadeOut(500);
        });
        $dialogObject.dialog({
            close: function(event, ui) {
                $dialogObject.remove();
            },
            modal: true,
            title: $title,
            width: ($(window).width() * 0.8),
            height: ($(window).height() * 0.9)
        });
        return false;
    });
});
