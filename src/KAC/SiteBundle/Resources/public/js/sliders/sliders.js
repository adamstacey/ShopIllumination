$(document).ready(function() {
    $(".slider").rhinoslider({
        randomOrder: true,
        autoPlay: true,
        showTime: 10000,
        showBullets: 'always',
        showControls: 'always',
        showCaptions: 'always',
        controlsMousewheel: false,
        controlsKeyboard: false
    });

    $(".slider-small").rhinoslider({
        showTime: 10000,
        effect: 'turnOver',
        randomOrder: true,
        controlsMousewheel: false,
        controlsKeyboard: false,
        controlsPlayPause: false,
        autoPlay: true,
        showBullets: 'never',
        showControls: 'always',
        slidePrevDirection: 'toTop',
        slideNextDirection: 'toBottom'
    });
});