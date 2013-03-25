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
});