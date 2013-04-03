$(document).ready(function() {
    $(".main-menu > nav > ul > li > a").hover(function(){
        $(this).addClass("hover");
        $("#mainMenuGroup"+$(this).attr("data-main-menu-group")).show();
    }, function(){
        $(this).removeClass("hover");
        $("#mainMenuGroup"+$(this).attr("data-main-menu-group")).hide();
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
