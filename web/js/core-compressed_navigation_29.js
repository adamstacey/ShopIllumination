
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
});

