<?php

/* WebIlluminationShopBundle:Users:userScript.js.twig */
class __TwigTemplate_8443cf5c40753aeb4790e344e40f9bba extends Twig_Template
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

\t";
        // line 3
        $this->env->loadTemplate("WebIlluminationShopBundle:Users:userFunctions.js.twig")->display($context);
        // line 4
        echo "\t
\t\$(document).ready(function() {
\t\t";
        // line 7
        echo "\t\tvar \$minimumSectionHeight = 0;
\t\t\$(\".sidebar-tabs > ul > li\").each(function() {
\t\t\t\$minimumSectionHeight = \$minimumSectionHeight + \$(this).outerHeight(true);
\t\t});
\t\t\$(\".sidebar-tabs section\").each(function() {
\t\t\t\$(this).css(\"min-height\", \$minimumSectionHeight+\"px\");
\t\t});
\t\t
\t\t";
        // line 16
        echo "\t\t\$(\".sidebar-tabs\").tabs({
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\".form-error\").hide();
\t\t   \t}
\t\t});
                        \t\t
\t\t";
        // line 23
        echo "\t\t\$(\"#form-billing-country-code\").live('change', function() {
\t\t\tif (\$(this).val() == 'IE')
\t\t\t{
\t\t\t\t\$(\"#billing-post-zip-code-container\").hide();
\t\t\t\t\$(\"#same-address-billing\").hide();
\t\t\t\t\$(\"#form-billing-post-zip-code\").val('000');
\t\t\t\t\$(\"#republic-of-ireland-billing-address-message\").fadeIn();
\t\t\t\t\$(\"#form-same-billing-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-billing-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t\t\$(\"#delivery-address\").hide();
\t\t\t} else if (\$(this).val() == 'GB') {
\t\t\t\t\$(\"#republic-of-ireland-billing-address-message\").hide();
\t\t\t\t\$(\"#form-billing-post-zip-code\").val(\"\");
\t\t\t\t\$(\"#form-same-billing-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-same-billing-address > span\").removeClass(\"checked\");
\t\t\t\t\$(\"#billing-post-zip-code-container\").fadeIn();
\t\t\t\t\$(\"#same-address-billing\").fadeIn();
\t\t\t\tresetDeliveryAddress();
\t\t\t\t\$(\"#delivery-address\").show();
\t\t\t}
\t\t});
\t\t\$(\"#form-delivery-country-code\").live('change', function() {
\t\t\tif (\$(this).val() == 'IE')
\t\t\t{
\t\t\t\t\$(\"#delivery-post-zip-code-container\").hide();
\t\t\t\t\$(\"#same-address-delivery\").hide();
\t\t\t\t\$(\"#form-delivery-post-zip-code\").val('000');
\t\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").fadeIn();
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t\t\t\tcopyDeliveryAddressToBillingAddress();
\t\t\t\t\$(\"#delivery-address\").hide();
\t\t\t} else if (\$(this).val() == 'GB') {
\t\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").hide();
\t\t\t\t\$(\"#form-delivery-post-zip-code\").val(\"\");
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-delivery-billing-address > span\").removeClass(\"checked\");
\t\t\t\t\$(\"#delivery-post-zip-code-container\").fadeIn();
\t\t\t\t\$(\"#same-address-delivery\").fadeIn();
\t\t\t\tif (\$(\"#form-billing-country-code\").val() == 'IE')
\t\t\t\t{
\t\t\t\t\tresetBillingAddress();
\t\t\t\t\t\$(\"#delivery-address\").show();
\t\t\t\t}
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 72
        echo "\t\t\$(\"#form-same-delivery-address\").live('change', function() {
\t\t\tif (\$(\"#form-same-delivery-address\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#form-use-billing-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-use-billing-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t\t\$(\"#delivery-address\").hide();
\t\t\t} else {
\t\t\t\t\$(\"#form-use-billing-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-use-billing-address > span\").removeClass(\"checked\");
\t\t\t\t\$(\"#delivery-address\").show();
\t\t\t}
\t\t});
\t\t\$(\"#form-use-billing-address\").live('change', function() {
\t\t\tif (\$(\"#form-use-billing-address\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t\t\$(\"#delivery-address\").hide();
\t\t\t} else {
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").removeClass(\"checked\");
\t\t\t\tresetDeliveryAddress();
\t\t\t\t\$(\"#delivery-address\").show();
\t\t\t}
\t\t});
\t\t\t\t\t\t
\t\t";
        // line 101
        echo "\t\t\$(\".action-save-my-details\").live('click', function() {
\t\t\tvar saveMyDetailsValidator = \$(\"#my-details :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (saveMyDetailsValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_ajax_save_user"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\tfirstName: \$(\"#form-first-name\").val(),
\t   \t\t\t\t\tlastName: \$(\"#form-last-name\").val(),
\t   \t\t\t\t\torganisationName: \$(\"#form-organisation-name\").val(),
\t   \t\t\t\t\ttelephoneDaytime: \$(\"#form-telephone-daytime\").val(),
\t   \t\t\t\t\ttelephoneEvening: \$(\"#form-telephone-evening\").val(),
\t   \t\t\t\t\tmobile: \$(\"#form-mobile\").val(),
\t   \t\t\t\t\temailAddress: \$(\"#form-email-address\").val(),
\t   \t\t\t\t\tpassword: \$(\"#form-password\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem saving your details. Please try again.');
\t\t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t});
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\t\$(\"#message-success-text\").html('Your details were successfully saved.');
\t\t\t\t\t\t\$(\"#message-success\").slideDown(function() {
\t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t});
\t   \t\t\t\t}
\t \t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 146
        echo "\t\t\$(\".action-save-my-addresses\").live('click', function() {
\t\t\tif (\$(\"#form-same-delivery-address\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#form-delivery-first-name\").val(\$(\"#form-billing-first-name\").val());
\t\t\t\t\$(\"#form-delivery-last-name\").val(\$(\"#form-billing-last-name\").val());
\t\t\t\t\$(\"#form-delivery-organisation-name\").val(\$(\"#form-billing-organisation-name\").val());
\t\t\t\t\$(\"#form-delivery-country-code\").val(\$(\"#form-billing-country-code\").val());
\t\t\t\t\$(\"#form-delivery-address-line-1\").val(\$(\"#form-billing-address-line-1\").val());
\t\t\t\t\$(\"#form-delivery-address-line-2\").val(\$(\"#form-billing-address-line-2\").val());
\t\t\t\t\$(\"#form-delivery-town-city\").val(\$(\"#form-billing-town-city\").val());
\t\t\t\t\$(\"#form-delivery-county-state\").val(\$(\"#form-billing-county-state\").val());
\t\t\t\t\$(\"#form-delivery-post-zip-code\").val(\$(\"#form-billing-post-zip-code\").val());
\t\t\t}
\t\t\tvar saveMyAddressesValidator = \$(\"#my-addresses :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (saveMyAddressesValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("users_ajax_save_contact_addresses"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\tbillingFirstName: \$(\"#form-billing-first-name\").val(),
\t   \t\t\t\t\tbillingLastName: \$(\"#form-billing-last-name\").val(),
\t   \t\t\t\t\tbillingOrganisationName: \$(\"#form-billing-organisation-name\").val(),
\t   \t\t\t\t\tbillingCountryCode: \$(\"#form-billing-country-code\").val(),
\t   \t\t\t\t\tbillingAddressLine1: \$(\"#form-billing-address-line-1\").val(),
\t   \t\t\t\t\tbillingAddressLine2: \$(\"#form-billing-address-line-2\").val(),
\t   \t\t\t\t\tbillingTownCity: \$(\"#form-billing-town-city\").val(),
\t   \t\t\t\t\tbillingCountyState: \$(\"#form-billing-county-state\").val(),
\t   \t\t\t\t\tbillingPostZipCode: \$(\"#form-billing-post-zip-code\").val(),
\t   \t\t\t\t\tdeliveryFirstName: \$(\"#form-delivery-first-name\").val(),
\t   \t\t\t\t\tdeliveryLastName: \$(\"#form-delivery-last-name\").val(),
\t   \t\t\t\t\tdeliveryOrganisationName: \$(\"#form-delivery-organisation-name\").val(),
\t   \t\t\t\t\tdeliveryCountryCode: \$(\"#form-delivery-country-code\").val(),
\t   \t\t\t\t\tdeliveryAddressLine1: \$(\"#form-delivery-address-line-1\").val(),
\t   \t\t\t\t\tdeliveryAddressLine2: \$(\"#form-delivery-address-line-2\").val(),
\t   \t\t\t\t\tdeliveryTownCity: \$(\"#form-delivery-town-city\").val(),
\t   \t\t\t\t\tdeliveryCountyState: \$(\"#form-delivery-county-state\").val(),
\t   \t\t\t\t\tdeliveryPostZipCode: \$(\"#form-delivery-post-zip-code\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem saving your addresses. Please try again.');
\t\t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t});
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\$(\"#message-success-text\").html('Your addresses were successfully saved.');
\t\t\t\t\t\t\$(\"#message-success\").slideDown(function() {
\t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t});
\t   \t\t\t\t}
\t \t\t\t});
\t\t\t}
\t\t});\t\t
\t});\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Users:userScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  518 => 227,  452 => 191,  733 => 657,  694 => 620,  688 => 616,  647 => 577,  633 => 565,  612 => 546,  508 => 217,  590 => 345,  582 => 343,  541 => 239,  537 => 314,  533 => 237,  442 => 254,  530 => 163,  504 => 221,  498 => 147,  492 => 208,  482 => 189,  289 => 243,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 502,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 401,  435 => 182,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 200,  456 => 382,  440 => 185,  377 => 125,  313 => 136,  281 => 129,  469 => 199,  426 => 335,  421 => 242,  397 => 171,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 115,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 238,  527 => 477,  346 => 298,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 207,  485 => 417,  445 => 187,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 679,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 203,  465 => 204,  441 => 389,  431 => 183,  396 => 131,  364 => 157,  348 => 154,  336 => 181,  310 => 192,  304 => 120,  18 => 1,  489 => 433,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 181,  417 => 163,  413 => 330,  408 => 368,  388 => 167,  382 => 126,  350 => 211,  315 => 141,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 533,  595 => 267,  581 => 196,  563 => 254,  522 => 229,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 219,  496 => 203,  493 => 219,  483 => 215,  480 => 214,  476 => 213,  474 => 201,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 161,  398 => 160,  389 => 157,  372 => 151,  369 => 150,  357 => 102,  341 => 288,  332 => 150,  328 => 86,  325 => 117,  316 => 166,  278 => 118,  250 => 123,  163 => 112,  523 => 216,  516 => 222,  512 => 211,  506 => 207,  500 => 451,  497 => 211,  494 => 151,  484 => 205,  462 => 133,  447 => 188,  438 => 185,  393 => 257,  373 => 140,  370 => 240,  368 => 221,  361 => 217,  342 => 145,  329 => 146,  326 => 118,  319 => 142,  288 => 102,  229 => 88,  206 => 75,  147 => 41,  227 => 102,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 225,  450 => 354,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 107,  246 => 89,  234 => 119,  217 => 69,  173 => 81,  309 => 108,  285 => 186,  280 => 235,  276 => 94,  262 => 113,  235 => 163,  232 => 175,  212 => 149,  207 => 107,  143 => 50,  157 => 81,  366 => 136,  340 => 160,  503 => 214,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 203,  433 => 167,  416 => 171,  412 => 184,  409 => 103,  404 => 162,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 148,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 157,  187 => 66,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 100,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 114,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 146,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 485,  502 => 156,  495 => 218,  491 => 217,  432 => 176,  203 => 50,  114 => 42,  208 => 93,  183 => 101,  166 => 85,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 153,  375 => 161,  371 => 152,  363 => 135,  359 => 93,  355 => 149,  351 => 131,  347 => 101,  331 => 120,  323 => 146,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 117,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 116,  210 => 82,  180 => 55,  172 => 64,  168 => 44,  149 => 74,  139 => 113,  240 => 99,  230 => 82,  121 => 59,  257 => 125,  249 => 109,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 113,  255 => 193,  244 => 107,  214 => 83,  198 => 62,  181 => 128,  167 => 96,  160 => 77,  45 => 23,  487 => 216,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 176,  415 => 179,  392 => 102,  385 => 154,  376 => 319,  367 => 160,  360 => 310,  352 => 91,  338 => 124,  333 => 210,  327 => 145,  324 => 289,  320 => 168,  297 => 138,  274 => 96,  256 => 111,  254 => 110,  252 => 170,  231 => 104,  216 => 111,  213 => 58,  202 => 76,  458 => 194,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 129,  387 => 229,  384 => 155,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 188,  284 => 120,  270 => 122,  266 => 127,  261 => 70,  247 => 191,  243 => 107,  238 => 107,  220 => 79,  201 => 90,  194 => 101,  130 => 46,  100 => 43,  85 => 24,  76 => 31,  112 => 16,  101 => 30,  98 => 36,  272 => 93,  269 => 115,  228 => 81,  221 => 80,  197 => 158,  184 => 84,  138 => 80,  118 => 92,  105 => 44,  66 => 26,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 3,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 73,  192 => 87,  189 => 119,  178 => 62,  176 => 110,  165 => 57,  161 => 100,  152 => 88,  148 => 77,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 57,  109 => 55,  90 => 59,  54 => 8,  133 => 34,  124 => 42,  111 => 55,  107 => 71,  80 => 22,  69 => 28,  60 => 24,  52 => 17,  97 => 45,  95 => 72,  88 => 34,  78 => 32,  75 => 17,  71 => 42,  464 => 178,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 179,  425 => 165,  420 => 143,  406 => 175,  402 => 343,  399 => 105,  343 => 125,  339 => 152,  335 => 298,  321 => 115,  317 => 123,  314 => 142,  311 => 82,  305 => 135,  291 => 123,  287 => 121,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 121,  236 => 84,  222 => 158,  218 => 99,  159 => 60,  154 => 53,  151 => 75,  145 => 77,  136 => 48,  128 => 83,  125 => 101,  119 => 39,  110 => 40,  96 => 40,  93 => 41,  91 => 27,  68 => 17,  65 => 18,  63 => 37,  43 => 12,  50 => 13,  25 => 8,  92 => 34,  86 => 25,  79 => 30,  46 => 11,  37 => 16,  33 => 9,  27 => 7,  82 => 27,  72 => 33,  64 => 15,  53 => 32,  49 => 16,  44 => 14,  42 => 13,  34 => 3,  29 => 3,  23 => 4,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 86,  215 => 173,  211 => 178,  204 => 91,  200 => 170,  195 => 88,  193 => 46,  190 => 92,  188 => 69,  185 => 65,  179 => 83,  177 => 120,  171 => 80,  162 => 56,  158 => 76,  156 => 108,  153 => 116,  146 => 41,  142 => 55,  137 => 86,  131 => 63,  126 => 61,  120 => 44,  117 => 38,  103 => 68,  99 => 23,  77 => 21,  74 => 30,  57 => 17,  47 => 13,  39 => 4,  32 => 10,  24 => 6,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 57,  113 => 53,  108 => 32,  104 => 31,  102 => 17,  94 => 28,  89 => 31,  87 => 36,  84 => 40,  81 => 22,  73 => 28,  70 => 32,  67 => 25,  62 => 14,  59 => 35,  55 => 23,  51 => 7,  48 => 29,  41 => 15,  38 => 4,  35 => 3,  31 => 8,  28 => 2,);
    }
}
