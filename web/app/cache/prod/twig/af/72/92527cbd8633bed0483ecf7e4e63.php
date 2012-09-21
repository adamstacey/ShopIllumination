<?php

/* WebIlluminationAdminBundle:Products:updatePrices.html.twig */
class __TwigTemplate_af7292527cbd8633bed0483ecf7e4e63 extends Twig_Template
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
        echo "<section id=\"prices\" class=\"form ui-helper-hidden\">
\t<h2>Prices</h2>
\t<div class=\"clearfix\">
\t\t<h3>Price Setings</h3>
\t\t<div class=\"clearfix\">
\t        <label for=\"form-hide-price\" class=\"form-label\">Hide Price<small>Hide price for this product?</small></label>
\t        <div class=\"form-input\"><label><input type=\"radio\" name=\"hide-price\" id=\"form-hide-price-1\" value=\"1\"";
        // line 7
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "hidePrice") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"hide-price\" id=\"form-hide-price-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "hidePrice") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t    <div id=\"show-price-out-of-hours-container\" class=\"";
        // line 9
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "hidePrice") == 0)) {
            echo "ui-helper-hidden ";
        }
        echo "clearfix\">
\t        <label for=\"form-show-price-out-of-hours\" class=\"form-label\">Show Price Out of Hours<small>Show price out of hours?</small></label>
\t        <div class=\"form-input\"><label><input type=\"radio\" name=\"show-price-out-of-hours\" id=\"form-show-price-out-of-hours-1\" value=\"1\"";
        // line 11
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "showPriceOutOfHours") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"show-price-out-of-hours\" id=\"form-show-price-out-of-hours-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "showPriceOutOfHours") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t\t<div class=\"clearfix\">
\t        <label for=\"form-membership-card-discount-available\" class=\"form-label\">Discount with Membership<small>Discount with membership card?</small></label>
\t        <div class=\"form-input\" id=\"form-membership-card-discount-available\"><label><input type=\"radio\" name=\"membership-card-discount-available\" id=\"form-membership-card-discount-available-1\" value=\"1\"";
        // line 15
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "membershipCardDiscountAvailable") == 1)) {
            echo " checked=\"checked\"";
        }
        echo " /> Yes</label> <label><input type=\"radio\" name=\"membership-card-discount-available\" id=\"form-membership-card-discount-available-0\" value=\"0\"";
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "membershipCardDiscountAvailable") == 0)) {
            echo " checked=\"checked\"";
        }
        echo " /> No</label></div>
\t    </div>
\t    <div id=\"maximum-membership-card-discount-container\" class=\"";
        // line 17
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "membershipCardDiscountAvailable") == 0)) {
            echo "ui-helper-hidden ";
        }
        echo "clearfix\">
\t        <label for=\"form-maximum-membership-card-discount\" class=\"form-label\">Membership Discount (%)<small>Maximum membership discount</small></label>
\t        <div class=\"form-input\"><input type=\"text\" id=\"form-maximum-membership-card-discount\" name=\"maximum-membership-card-discount\" class=\"decimal\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "maximumMembershipCardDiscount"), 2), "html", null, true);
        echo "\" /></div>
\t    </div>
\t    <div class=\"clearfix\">
\t        <div class=\"form-input-long buttons\">
\t        \t<button class=\"button ui-button-green action-update-price-settings-section\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        </div>
\t    </div>
\t    <h3>Prices</h3>
\t\t<div id=\"price-loading-error\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\">
\t\t    <div class=\"ui-state-error no-margin-top ui-corner-all\">
\t\t    \t<span class=\"ui-icon ui-icon-alert\"></span>
\t\t        <p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the prices. Please contact support and advise.</p>
\t\t    </div>
\t\t</div>
\t\t<div id=\"ajax-prices-loading\" class=\"ac\">
\t\t\t<p>Loading prices, please wait&hellip;</p>
\t\t\t<p><img alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p>
\t\t</div>
\t\t<div id=\"ajax-prices\" class=\"ui-helper-hidden\"></div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:updatePrices.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 153,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 313,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 223,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 255,  312 => 190,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 459,  501 => 160,  499 => 204,  496 => 203,  493 => 219,  483 => 440,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 172,  229 => 67,  206 => 70,  147 => 71,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 41,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 191,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 248,  271 => 104,  253 => 203,  233 => 204,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 60,  301 => 85,  298 => 180,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 90,  144 => 40,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 85,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 227,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 187,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 143,  210 => 95,  180 => 49,  172 => 47,  168 => 49,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 29,  257 => 225,  249 => 74,  106 => 20,  334 => 269,  294 => 131,  286 => 171,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 62,  181 => 86,  167 => 86,  160 => 79,  45 => 8,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 154,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 320,  352 => 225,  338 => 235,  333 => 71,  327 => 204,  324 => 289,  320 => 168,  297 => 261,  274 => 126,  256 => 86,  254 => 74,  252 => 218,  231 => 106,  216 => 178,  213 => 175,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 172,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 170,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 211,  238 => 107,  220 => 64,  201 => 90,  194 => 59,  130 => 95,  100 => 27,  85 => 20,  76 => 18,  112 => 30,  101 => 68,  98 => 18,  272 => 118,  269 => 237,  228 => 197,  221 => 93,  197 => 169,  184 => 155,  138 => 116,  118 => 93,  105 => 35,  66 => 11,  56 => 15,  115 => 63,  83 => 27,  164 => 80,  140 => 39,  58 => 6,  21 => 5,  61 => 14,  36 => 9,  209 => 173,  205 => 63,  196 => 93,  192 => 52,  189 => 106,  178 => 145,  176 => 148,  165 => 127,  161 => 49,  152 => 42,  148 => 41,  141 => 34,  134 => 114,  132 => 69,  127 => 30,  123 => 66,  109 => 60,  90 => 62,  54 => 18,  133 => 94,  124 => 22,  111 => 27,  107 => 75,  80 => 22,  69 => 22,  60 => 42,  52 => 16,  97 => 38,  95 => 17,  88 => 24,  78 => 16,  75 => 25,  71 => 49,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 284,  425 => 371,  420 => 277,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 137,  317 => 123,  314 => 87,  311 => 133,  305 => 186,  291 => 174,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 105,  159 => 55,  154 => 76,  151 => 126,  145 => 77,  136 => 101,  128 => 47,  125 => 106,  119 => 41,  110 => 92,  96 => 26,  93 => 35,  91 => 22,  68 => 44,  65 => 12,  63 => 22,  43 => 11,  50 => 5,  25 => 7,  92 => 35,  86 => 61,  79 => 26,  46 => 20,  37 => 21,  33 => 13,  27 => 9,  82 => 19,  72 => 31,  64 => 35,  53 => 21,  49 => 28,  44 => 25,  42 => 12,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 8,  22 => 5,  224 => 65,  215 => 73,  211 => 101,  204 => 99,  200 => 111,  195 => 54,  193 => 163,  190 => 92,  188 => 54,  185 => 149,  179 => 92,  177 => 146,  171 => 50,  162 => 83,  158 => 81,  156 => 43,  153 => 47,  146 => 122,  142 => 35,  137 => 38,  131 => 58,  126 => 92,  120 => 32,  117 => 84,  103 => 38,  99 => 55,  77 => 18,  74 => 19,  57 => 11,  47 => 29,  39 => 18,  32 => 16,  24 => 7,  17 => 1,  135 => 64,  129 => 75,  122 => 76,  116 => 31,  113 => 80,  108 => 26,  104 => 28,  102 => 19,  94 => 32,  89 => 59,  87 => 28,  84 => 57,  81 => 56,  73 => 26,  70 => 52,  67 => 17,  62 => 17,  59 => 18,  55 => 34,  51 => 15,  48 => 31,  41 => 24,  38 => 3,  35 => 15,  31 => 14,  28 => 6,);
    }
}
