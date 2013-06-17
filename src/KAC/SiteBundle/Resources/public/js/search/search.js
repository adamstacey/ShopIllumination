$(document).ready(function() {
    $(document).on("click focus blur keypress keyup keydown", ".search-container input", function() {
        if ($(this).val() == "")
        {
            $(".search-container .icon-dark-red").hide();
        } else {
            $(".search-container .icon-dark-red").show();
        }
    });

    $(document).on("click", ".search-container .icon-dark-red", function() {
        $(".search-container input").val("");
        $(this).hide();
        $(".search-container input").focus();
    });
});
