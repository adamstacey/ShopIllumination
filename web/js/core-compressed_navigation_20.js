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
        var $dialogObject = $('<div class="dialog-container"><div class="loading">Loading...<br /><img src="/bundles/kacsite/"</div></div>');
        var $iframeObject = $('<iframe width="100%" height="100%" src="'+$url+'" />"');
        $iframeObject.load(function() {
            //$dialogObject.height("90%");
            //alert($iframeObject.height());
        });
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


});