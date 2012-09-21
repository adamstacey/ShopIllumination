<?php

/* WebIlluminationAdminBundle:Brands:updatePricesScript.js.twig */
class __TwigTemplate_c4d57b279a957504696878832bd31f96 extends Twig_Template
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
        // line 2
        echo "\$(\"input[name=hide-prices]\").change(function() {
    if (\$(this).val() === '1') {
        \$(\"#show-prices-out-of-hours-container\").fadeIn();
    } else {
        \$(\"#show-prices-out-of-hours-container\").fadeOut();
    }
});

";
        // line 11
        echo "\$(\"input[name=membership-card-discount-available]\").change(function() {
    if (\$(this).val() === '1') {
        \$(\"#maximum-membership-card-discount-container\").fadeIn();
    } else {
        \$(\"#maximum-membership-card-discount-container\").fadeOut();
    }
});

";
        // line 20
        echo "\$(\".action-update-price-settings-section\").live('click', function() {
\t\$.ajax({
\t\ttype: \"POST\",
\t\tdataType: \"json\",
\t\turl: \"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update_price_settings_section")), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\$(\"#ajax_loading\").show();
\t\t},
\t\tdata: {
\t\t\tid: ";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "id"), "html", null, true);
        echo ",
\t\t\thidePrices: \$(\"input[name='hide-prices']:checked\").val(),
\t\t\tshowPricesOutOfHours: \$(\"input[name='show-prices-out-of-hours']:checked\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"input[name='membership-card-discount-available']:checked\").val(),
\t\t\tmaximumMembershipCardDiscount: \$(\"#form-maximum-membership-card-discount\").val()
\t\t},
\t\terror: function(data) {
\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\tfinishInteractions();
\t    },
\t\tsuccess: function(data) {
\t\t\tif (data.response == 'success')
\t\t\t{
\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " was updated.\");
\t\t\t} else {
\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem saving the ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t}
\t\t\tfinishInteractions();
\t\t}
\t});
});

\$(\".sidebar-tabs\").bind(\"tabsselect\", function(event, ui) {
\tif (\$(\"input.price-requires-update[value='1']\").length > 0)
\t{
\t\t\$(\"#prices .message\").hide();
\t\t\$(\".form-error\").remove();
\t\t\$(\"#price-leave-prices-button\").attr(\"data-tab-index\", ui.index);
\t\t\$(\"#prices-tab-to-redirect-to\").val(ui.index);
\t\t\$(\"#price-confirm-leave\").fadeIn();
\t\t\$(\"html, body\").animate({scrollTop: \$(\"#prices\").offset().top + 35},'slow');
\t\treturn false;
\t}
\treturn true;
});

\$(\".action-leave-prices\").live('click', function() {
\t\$(\"input.price-requires-update\").val(\"0\");
\t\$(\"input.price-id[value='0']\").each(function(index) {
\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\$(\"#price-\"+\$elementIndex).remove();
\t});
\t\$(\"#prices .message\").hide();
\t\$(\".form-error\").remove();
\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(this).attr(\"data-tab-index\")));
\t\$(\"html, body\").animate({scrollTop: \$(\"#prices\").offset().top + 35},'slow');
});";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Brands:updatePricesScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 246,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 69,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 92,  319 => 90,  288 => 81,  229 => 67,  206 => 54,  147 => 116,  227 => 179,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 194,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 77,  235 => 64,  232 => 67,  212 => 56,  207 => 44,  143 => 114,  157 => 46,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 70,  233 => 78,  226 => 64,  187 => 65,  150 => 36,  260 => 72,  155 => 39,  223 => 79,  186 => 63,  169 => 48,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 107,  239 => 70,  237 => 188,  174 => 60,  182 => 62,  175 => 40,  144 => 31,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 88,  208 => 60,  183 => 49,  166 => 45,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 107,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 201,  199 => 90,  191 => 147,  170 => 42,  210 => 72,  180 => 63,  172 => 45,  168 => 54,  149 => 62,  139 => 31,  240 => 193,  230 => 104,  121 => 31,  257 => 71,  249 => 74,  106 => 24,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 94,  198 => 152,  181 => 82,  167 => 41,  160 => 41,  45 => 11,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 258,  297 => 84,  274 => 80,  256 => 211,  254 => 74,  252 => 112,  231 => 105,  216 => 64,  213 => 175,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 110,  238 => 196,  220 => 26,  201 => 58,  194 => 50,  130 => 28,  100 => 74,  85 => 30,  76 => 45,  112 => 85,  101 => 16,  98 => 19,  272 => 118,  269 => 237,  228 => 104,  221 => 176,  197 => 51,  184 => 55,  138 => 32,  118 => 21,  105 => 73,  66 => 49,  56 => 32,  115 => 86,  83 => 61,  164 => 50,  140 => 33,  58 => 6,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 57,  192 => 67,  189 => 54,  178 => 61,  176 => 44,  165 => 128,  161 => 39,  152 => 126,  148 => 32,  141 => 33,  134 => 99,  132 => 94,  127 => 53,  123 => 46,  109 => 18,  90 => 13,  54 => 13,  133 => 104,  124 => 25,  111 => 78,  107 => 38,  80 => 60,  69 => 12,  60 => 14,  52 => 30,  97 => 38,  95 => 14,  88 => 64,  78 => 23,  75 => 55,  71 => 43,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 84,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 66,  236 => 106,  222 => 62,  218 => 65,  159 => 130,  154 => 42,  151 => 109,  145 => 105,  136 => 103,  128 => 27,  125 => 28,  119 => 33,  110 => 38,  96 => 18,  93 => 33,  91 => 33,  68 => 46,  65 => 45,  63 => 22,  43 => 24,  50 => 5,  25 => 4,  92 => 17,  86 => 17,  79 => 27,  46 => 20,  37 => 20,  33 => 12,  27 => 11,  82 => 55,  72 => 51,  64 => 10,  53 => 37,  49 => 28,  44 => 10,  42 => 4,  34 => 3,  29 => 11,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 5,  26 => 2,  22 => 2,  224 => 66,  215 => 57,  211 => 106,  204 => 98,  200 => 157,  195 => 159,  193 => 57,  190 => 98,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 122,  153 => 30,  146 => 110,  142 => 56,  137 => 55,  131 => 30,  126 => 91,  120 => 88,  117 => 46,  103 => 20,  99 => 19,  77 => 18,  74 => 53,  57 => 15,  47 => 29,  39 => 18,  32 => 16,  24 => 6,  17 => 2,  135 => 30,  129 => 29,  122 => 27,  116 => 25,  113 => 24,  108 => 84,  104 => 17,  102 => 23,  94 => 27,  89 => 16,  87 => 64,  84 => 30,  81 => 24,  73 => 18,  70 => 11,  67 => 43,  62 => 37,  59 => 18,  55 => 14,  51 => 15,  48 => 5,  41 => 4,  38 => 3,  35 => 8,  31 => 13,  28 => 11,);
    }
}
