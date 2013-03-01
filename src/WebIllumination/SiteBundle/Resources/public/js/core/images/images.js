$(document).ready(function() {
    $(".lightbox").lightbox();

    $(".etalage").etalage();

    $(document).on("click", ".etalage_magnifier > div > img", function() {
        var $images = [];
        var $activeImage = $(".etalage_smallthumb_active");
        $images.push($activeImage.find("img").attr("src"));
        $activeImage.nextAll().each(function() {
            $images.push($(this).find("img").attr("src"));
        });
        $activeImage.prevAll().each(function() {
            $images.push($(this).find("img").attr("src"));
        });
        $.lightbox($images);
    });
});