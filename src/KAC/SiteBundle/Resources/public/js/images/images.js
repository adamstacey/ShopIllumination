$(document).ready(function() {
    $(".lightbox").lightbox();

    $(".etalage").etalage({
        autoplay: false,
        smallthumbs_position: 'bottom',
        thumb_image_width: 271,
        thumb_image_height: 271,
        source_image_width: 800,
        source_image_height: 800,
        small_thumbs: 3,
        zoom_area_width: 293,
        zoom_area_height: 293,
        smallthumb_hide_single: false,
        smallthumb_inactive_opacity: 1
    });

    $(".etalage-inset").etalage({
        autoplay: false,
        smallthumbs_position: 'bottom',
        thumb_image_width: 200,
        thumb_image_height: 200,
        source_image_width: 400,
        source_image_height: 400,
        small_thumbs: 3,
        zoom_area_width: 222,
        zoom_area_height: 222,
        smallthumb_inactive_opacity: 1
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