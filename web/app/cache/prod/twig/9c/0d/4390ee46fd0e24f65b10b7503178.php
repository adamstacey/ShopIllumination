<?php

/* ::shopScript.js.twig */
class __TwigTemplate_9c0d4390ee46fd0e24f65b10b7503178 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script defer=\"defer\" type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t";
        // line 4
        echo "\t\tif (\$.cookie('declinedCookies'))
\t\t{
\t\t\t\$(\"#cookie-policy-disclaimer\").hide();
\t\t}
\t\tif (!\$.cookie('acceptedCookies')) {
\t\t\t\$(\"#cookie-policy\").slideDown();
\t\t} 
\t\t
\t\t";
        // line 13
        echo "\t\t\$(\".action-accept-cookies\").live('click', function() {
\t\t\t\$.cookie('declinedCookies', null);
\t\t\t\$.cookie('acceptedCookies', '1', {
\t\t\t     expires: 28,
\t\t\t     path: '/'
\t\t\t });
\t\t\t \$(\"#cookie-policy\").slideUp();
\t\t});
\t\t
\t\t";
        // line 23
        echo "\t\t\$(\".action-decline-cookies\").live('click', function() {
\t\t\t\$.cookie('acceptedCookies', null);
\t\t\t\$.cookie('declinedCookies', '1', {
\t\t\t     expires: 28,
\t\t\t     path: '/'
\t\t\t });
\t\t\t \$(\"#cookie-policy-disclaimer\").slideUp();
\t\t});
\t\t\$(\"#cookie-policy h2\").live('click', function() {
\t\t\t \$(\"#cookie-policy-disclaimer\").slideDown();
\t\t});
\t\t
\t\t";
        // line 36
        echo "\t\t\$(\".action-cancel-search\").live('click', function() {
\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\$(\".slider-gallery-container\").slideDown();
\t\t\t\$(\"#quick_search\").val(\"\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 44
        echo "\t\t\$(\"#quick_search\").live('keyup', function() {
\t\t\tgetSearchResults();
\t\t});
\t\t\$(\".action-quick-search\").live('click', function() {
\t\t\tgetSearchResults();
\t\t});
\t\t
\t\t";
        // line 52
        echo "\t\tgetBasketSummary();
\t\t\t\t
\t\t";
        // line 55
        echo "\t\t\$(\".action-add-to-basket\").live('click', function() {
\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\$.ajax({
   \t\t\t\ttype: \"GET\",
   \t\t\t\tdataType: \"json\",
   \t\t\t\turl: \"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("basket_ajax_add_to_basket"), "html", null, true);
        echo "\",
   \t\t\t\tdata: {
   \t\t\t\t\tproductId: \$(this).attr(\"data-product-id\"),
   \t\t\t\t\tquantity: \$(\"#quantity-\"+\$(this).attr(\"data-product-id\")).val(),
   \t\t\t\t\tselectedOptions: \$(\"#selected-options-\"+\$(this).attr(\"data-product-id\")).val()
   \t\t\t\t},
   \t\t\t\terror: function(data) {
   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the item to your basket. Please try again.');
\t\t\t\t\t\$(\"#message-error\").fadeIn(function() {
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 15},'slow');
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t});
\t\t      \t},
   \t\t\t\tsuccess: function(data) {
   \t\t\t\t\tgetBasketSummary();
   \t\t\t\t\t\$(\"html, body\").animate({scrollTop: 0},'slow', function() {
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-image\").attr(\"src\", data.thumbnailPath);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-image\").attr(\"alt\", data.header);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-title\").attr(\"href\", data.url);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-title\").html(data.header);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-description\").html(data.quantity+' &times; &pound;'+data.price+\" = &pound;\"+data.subTotal);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup\").dialog('open');
   \t\t\t\t\t\tsetTimeout('\$(\"#shopping-basket-popup\").dialog(\"close\")', 5000);
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
   \t\t\t\t\t});
   \t\t\t\t}
 \t\t\t});
\t\t});
\t\t
\t\t";
        // line 90
        echo "\t\t\$(\"#shopping-basket-popup\").dialog({
\t\t\tautoOpen: false,
\t\t\twidth: 400,
\t\t\tshow: \"fade\",
\t\t\thide: \"fade\",
\t\t\tresizable: false
\t\t});
\t\t\$(\".action-close-shopping-basket-popup\").live('click', function() {
\t\t\t\$(\"#shopping-basket-popup\").dialog('close');
\t\t});
\t\t
\t\t\$(\".search-box\").live(\"mouseover mouseenter click focus\", function() {
\t\t\t\$(this).addClass(\"search-box-interacting\");
\t\t});
\t\t\$(\".search-box\").live(\"mouseout mouseleave blur\", function() {
\t\t\t\$(this).removeClass(\"search-box-interacting\");
\t\t});
\t\t\$(\".search-box\").live(\"focus\", function() {
\t\t\t\$(this).addClass(\"search-box-glowing\");
\t\t});
\t\t\$(\".search-box\").live(\"blur\", function() {
\t\t\t\$(this).removeClass(\"search-box-glowing\");
\t\t});
\t\t
\t\t\$(\".sub-department-link span\").each(function() {
\t\t\t\$(this).parent(\"a\").addClass(\"single-line\");
\t\t});
\t\t\$(\"body\").mousemove(function(e) {
\t\t\tvar minimumX = ((parseInt(\$(document).width()) - 980) / 2);
\t\t\tif ((e.pageY < 136) || ((e.pageX < minimumX) || (e.pageX > (minimumX + 980))))
\t\t\t{
\t\t\t\t\$(\"div.sub-departments:visible\").slideUp(200);
\t\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t\t}
\t\t});
\t\t\$(\".sub-department-link\").live('mouseover mouseenter', function(e) {
\t\t\tvar \$departmentId = \$(this).attr(\"data-department-id\");
\t\t\tvar \$menuLinkPosition = 0;
\t\t\tvar \$menuLinkCentre = 0;
\t\t\tif (\$departmentId == 'brands')
\t\t\t{
\t\t\t\tvar \$menuLinkPosition = \$(this).position();
\t\t\t\tvar \$menuLinkCentre = \$menuLinkPosition.left + (\$(this).width() / 2);
\t\t\t} else {
\t\t\t\tvar \$menuLinkPosition = \$(this).parent(\"li\").position();
\t\t\t\tvar \$menuLinkCentre = \$menuLinkPosition.left + (\$(this).parent(\"li\").width() / 2);
\t\t\t}
\t\t\tvar \$subDepartmentX = \$menuLinkCentre - (\$(\"#sub-department-\"+\$departmentId).width() / 2) + 5;
\t\t\tif (\$subDepartmentX < 0)
\t\t\t{
\t\t\t\t\$subDepartmentX = 0;
\t\t\t}
\t\t\tif ((\$subDepartmentX + \$(\"#sub-department-\"+\$departmentId).width()) > 979)
\t\t\t{
\t\t\t\t\$subDepartmentX = 979 - \$(\"#sub-department-\"+\$departmentId).width();
\t\t\t}
\t\t\t\$(\"#sub-department-\"+\$departmentId).css(\"margin-left\", \$subDepartmentX+\"px\");
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\$(this).parent(\"li\").addClass(\"active\");
\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t\t\$(\"div.sub-departments\").each(function() {
\t\t\t\tif (\$(this).attr(\"id\") == \"sub-department-\"+\$departmentId)
\t\t\t\t{
\t\t\t\t\t\$(this).slideDown(400);
\t\t\t\t} else {
\t\t\t\t\t\$(this).slideUp(200);
\t\t\t\t}
\t\t\t});
\t\t});
\t\t\$(\".sub-departments:visible\").live('mouseleave', function() {
\t\t\t\$(this).slideUp(200);
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t});
\t\t\$(\"body\").live('mouseenter', function() {
\t\t\t\$(\"div.sub-departments:visible\").slideUp(200);
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t});
\t\t\$(\".sub-department\").live('mouseover mouseenter', function() {
\t\t\t\$(this).addClass(\"sub-department-active\");
\t\t});
\t\t\$(\".sub-department\").live('mouseleave', function() {
\t\t\t\$(this).removeClass(\"sub-department-active\");
\t\t});
\t\t\$(\".brand\").live('mouseover mouseenter', function() {
\t\t\t\$(this).addClass(\"brand-active\");
\t\t});
\t\t\$(\".brand\").live('mouseleave', function() {
\t\t\t\$(this).removeClass(\"brand-active\");
\t\t});
\t\t\$(\".action-close-large-image\").live('click', function() {
\t\t\t\$(\"#large-image-container\").fadeOut();
\t\t});
\t});
\t
\t";
        // line 187
        echo "\tfunction getSearchResults()
\t{
\t\tif (\$(\"#quick_search\").val().length >= 3)
\t\t{
\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\$(\".slider-gallery-container\").slideUp();
\t\t\t\$(\"#search-results-title\").html('Search Results: \"'+\$(\"#quick_search\").val()+'\"');
\t\t\t\$(\"#search-container, .search-box-container\").expose({
    \t\t\tcolor: \"#000000\",
    \t\t\topacity: \"0.6\"
    \t\t});
\t\t\t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\turl: \"";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_search"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
   \t\t\t\t\tsearch: \$(\"#quick_search\").val()
   \t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\t\t\$(\".slider-gallery-container\").slideDown();
\t      \t\t\t\$(\"#ajax-loading\").hide();
\t      \t\t\t\$.mask.close();
\t      \t\t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\$(\"#search-results\").html(data);
\t\t\t\t\t\$(\"#search-container\").slideDown(function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t});
\t\t\t\t}
\t\t\t});
\t\t} else {
\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\$(\".slider-gallery-container\").slideDown();
\t\t\t\$.mask.close();
\t\t}
\t}
\t
\t";
        // line 225
        echo "\tfunction getBasketSummary()
\t{
\t\t\$(\"#basket-summary-loading\").hide();
\t\t\$(\"#basket-summary-content\").show();
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("basket_ajax_get_basket_summary"), "html", null, true);
        echo "\",
\t\t\terror: function(data) {
      \t\t\t\$(\"#basket-summary-content\").html('<p>Your basket could not be loaded at this time.</p>');
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#basket-summary-content\").html(data);
\t\t\t\t\$(\"#basket-summary-loading\").hide();
\t\t\t\t\$(\"#basket-summary-content\").fadeIn();
\t\t\t}
\t\t});
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "::shopScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  430 => 154,  378 => 129,  365 => 124,  518 => 227,  452 => 191,  733 => 657,  694 => 620,  688 => 616,  647 => 577,  633 => 565,  612 => 546,  508 => 217,  590 => 345,  582 => 343,  541 => 239,  537 => 314,  533 => 237,  442 => 254,  530 => 163,  504 => 221,  498 => 147,  492 => 208,  482 => 189,  289 => 243,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 502,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 401,  435 => 182,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 163,  456 => 382,  440 => 185,  377 => 125,  313 => 136,  281 => 129,  469 => 199,  426 => 335,  421 => 242,  397 => 136,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 115,  400 => 137,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 238,  527 => 477,  346 => 298,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 207,  485 => 417,  445 => 187,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 128,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 679,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 166,  465 => 204,  441 => 389,  431 => 183,  396 => 131,  364 => 157,  348 => 154,  336 => 181,  310 => 192,  304 => 84,  18 => 1,  489 => 433,  486 => 168,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 148,  417 => 163,  413 => 330,  408 => 368,  388 => 167,  382 => 126,  350 => 211,  315 => 141,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 533,  595 => 267,  581 => 196,  563 => 254,  522 => 229,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 219,  496 => 203,  493 => 219,  483 => 215,  480 => 214,  476 => 213,  474 => 201,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 161,  398 => 160,  389 => 157,  372 => 151,  369 => 150,  357 => 102,  341 => 288,  332 => 104,  328 => 86,  325 => 117,  316 => 166,  278 => 118,  250 => 123,  163 => 112,  523 => 216,  516 => 222,  512 => 211,  506 => 207,  500 => 451,  497 => 211,  494 => 151,  484 => 205,  462 => 133,  447 => 155,  438 => 185,  393 => 257,  373 => 140,  370 => 126,  368 => 125,  361 => 217,  342 => 145,  329 => 146,  326 => 118,  319 => 142,  288 => 80,  229 => 60,  206 => 52,  147 => 41,  227 => 102,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 225,  450 => 156,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 71,  246 => 208,  234 => 119,  217 => 69,  173 => 81,  309 => 86,  285 => 186,  280 => 78,  276 => 94,  262 => 113,  235 => 163,  232 => 61,  212 => 149,  207 => 107,  143 => 50,  157 => 28,  366 => 136,  340 => 160,  503 => 214,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 203,  433 => 167,  416 => 145,  412 => 184,  409 => 141,  404 => 162,  390 => 312,  362 => 146,  358 => 284,  356 => 122,  353 => 266,  349 => 148,  345 => 113,  306 => 107,  271 => 95,  253 => 68,  233 => 204,  226 => 59,  187 => 47,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 100,  169 => 66,  301 => 254,  298 => 83,  292 => 243,  267 => 114,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 146,  182 => 72,  175 => 146,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 485,  502 => 156,  495 => 218,  491 => 217,  432 => 176,  203 => 50,  114 => 42,  208 => 53,  183 => 46,  166 => 85,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 138,  395 => 103,  383 => 130,  379 => 153,  375 => 161,  371 => 152,  363 => 135,  359 => 93,  355 => 149,  351 => 131,  347 => 101,  331 => 120,  323 => 146,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 76,  265 => 231,  251 => 111,  199 => 51,  191 => 33,  170 => 116,  210 => 82,  180 => 45,  172 => 64,  168 => 44,  149 => 74,  139 => 113,  240 => 99,  230 => 200,  121 => 59,  257 => 225,  249 => 109,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 77,  255 => 193,  244 => 65,  214 => 55,  198 => 62,  181 => 128,  167 => 96,  160 => 77,  45 => 17,  487 => 216,  481 => 167,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 176,  415 => 179,  392 => 102,  385 => 154,  376 => 319,  367 => 160,  360 => 123,  352 => 91,  338 => 124,  333 => 210,  327 => 145,  324 => 99,  320 => 168,  297 => 138,  274 => 96,  256 => 69,  254 => 110,  252 => 170,  231 => 104,  216 => 111,  213 => 58,  202 => 76,  458 => 194,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 132,  387 => 229,  384 => 155,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 82,  290 => 188,  284 => 79,  270 => 122,  266 => 127,  261 => 70,  247 => 66,  243 => 107,  238 => 63,  220 => 57,  201 => 90,  194 => 101,  130 => 46,  100 => 30,  85 => 60,  76 => 10,  112 => 16,  101 => 8,  98 => 36,  272 => 75,  269 => 115,  228 => 81,  221 => 80,  197 => 158,  184 => 84,  138 => 80,  118 => 10,  105 => 25,  66 => 23,  56 => 36,  115 => 42,  83 => 24,  164 => 61,  140 => 24,  58 => 35,  21 => 4,  61 => 18,  36 => 11,  209 => 150,  205 => 146,  196 => 73,  192 => 87,  189 => 158,  178 => 44,  176 => 110,  165 => 57,  161 => 100,  152 => 125,  148 => 77,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 57,  109 => 55,  90 => 21,  54 => 14,  133 => 34,  124 => 73,  111 => 89,  107 => 71,  80 => 35,  69 => 24,  60 => 15,  52 => 17,  97 => 45,  95 => 29,  88 => 34,  78 => 55,  75 => 21,  71 => 30,  464 => 157,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 179,  425 => 165,  420 => 147,  406 => 175,  402 => 343,  399 => 105,  343 => 112,  339 => 152,  335 => 298,  321 => 115,  317 => 123,  314 => 142,  311 => 82,  305 => 135,  291 => 123,  287 => 121,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 121,  236 => 84,  222 => 158,  218 => 99,  159 => 60,  154 => 117,  151 => 75,  145 => 77,  136 => 48,  128 => 58,  125 => 101,  119 => 39,  110 => 34,  96 => 28,  93 => 28,  91 => 27,  68 => 29,  65 => 44,  63 => 17,  43 => 10,  50 => 13,  25 => 4,  92 => 34,  86 => 39,  79 => 30,  46 => 8,  37 => 8,  33 => 9,  27 => 6,  82 => 27,  72 => 17,  64 => 16,  53 => 15,  49 => 16,  44 => 10,  42 => 23,  34 => 11,  29 => 8,  23 => 5,  19 => 2,  40 => 4,  20 => 2,  30 => 7,  26 => 6,  22 => 4,  224 => 86,  215 => 187,  211 => 54,  204 => 91,  200 => 170,  195 => 50,  193 => 46,  190 => 48,  188 => 69,  185 => 65,  179 => 83,  177 => 120,  171 => 40,  162 => 119,  158 => 76,  156 => 108,  153 => 116,  146 => 41,  142 => 55,  137 => 86,  131 => 63,  126 => 61,  120 => 72,  117 => 90,  103 => 68,  99 => 23,  77 => 34,  74 => 52,  57 => 19,  47 => 11,  39 => 11,  32 => 6,  24 => 5,  17 => 1,  135 => 51,  129 => 70,  122 => 26,  116 => 57,  113 => 53,  108 => 32,  104 => 9,  102 => 17,  94 => 27,  89 => 26,  87 => 36,  84 => 21,  81 => 22,  73 => 28,  70 => 20,  67 => 8,  62 => 25,  59 => 17,  55 => 16,  51 => 15,  48 => 15,  41 => 14,  38 => 9,  35 => 8,  31 => 13,  28 => 5,);
    }
}