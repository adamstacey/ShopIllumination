$(document).ready(function() {
    $(".lightbox").lightbox();

    $(".etalage").etalage();

    $(".slider").nivoSlider({
        randomStart: true,
        effect: "fade",
        pauseTime: 5000
    });

    $(document).on("click", ".etalage_magnifier > div > img", function() {
        if ($(".etalage_small_thumbs").length > 0)
        {
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
        } else {
            $.lightbox($(this).attr("src"));
        }
    });
});