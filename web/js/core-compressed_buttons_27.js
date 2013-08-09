function generateButtons($object) {
    $object.find(".button").each(function () {
        $(this).button({
            icons : {
                primary : $(this).attr("data-icon-primary") ? $(this).attr("data-icon-primary") : null,
                secondary : $(this).attr("data-icon-secondary") ? $(this).attr("data-icon-secondary") : null
            },
            text : $(this).attr("data-icon-only") === "true" ? false : true
        });
        var $dataNotification = $(this).attr("data-notification");
        if (($dataNotification != "") && ($dataNotification != undefined))
        {
            $(this).prepend('<div class="button-notification">'+$dataNotification+'</div>');
        }
    });
    return true;
}

$(document).ready(function() {
    generateButtons($(document));
});