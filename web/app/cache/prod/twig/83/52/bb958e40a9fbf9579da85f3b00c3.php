<?php

/* WebIlluminationAdminBundle:Products:updateSeo.html.twig */
class __TwigTemplate_8352bb958e40a9fbf9579da85f3b00c3 extends Twig_Template
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
        echo "<section id=\"seo\" class=\"form ui-helper-hidden\">
\t<h2>Search Engine Optimisation (SEO)</h2>
\t<div id=\"seo-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
\t        <p>
\t        \t<button class=\"button action-update-seo-section ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        \t<button class=\"button ui-button-red action-leave-seo\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
\t        \t<input type=\"hidden\" value=\"-1\" id=\"seo-tab-to-redirect-to\" />
\t        \t<input type=\"hidden\" value=\"0\" id=\"seo-requires-update\" />
\t        </p>
\t    </div>
\t    <div class=\"spacer\"></div>
\t</div>
\t<div class=\"ui-widget info-message\">
\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p>Search engine optimisation (SEO) is critical to the success of your site. It is strongly recommended that all the information in this section is completed.</p>
\t\t</div>
\t</div>
    <div class=\"clearfix\">
        <label for=\"form-page-title\" class=\"form-label\">Page Title<small><span class=\"red\">VERY IMPORTANT</span><br />Title used by the Browser</small></label>
        <div class=\"form-input\"><textarea class=\"maximum-characters\" data-maximum-characters=\"70\" data-maximum-characters-object=\"form-page-title-maximum-characters\" id=\"form-page-title\" name=\"page-title\" rows=\"2\">";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "pageTitle"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-page-title-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-header\" class=\"form-label\">Header<small><span class=\"red\">VERY IMPORTANT</span><br />Main header on the page</small></label>
        <div class=\"form-input\"><textarea id=\"form-header\" name=\"header\" rows=\"2\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "header"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-meta-description\" class=\"form-label\">Meta Description<small><span class=\"red\">VERY IMPORTANT</span><br />Your \"Advert\" in organic search results. Need to include keywords but primarily needs to entice people to click through by using a call to action with benefits (e.g. lowest price, in stock, free delivery, etc).</small></label>
        <div class=\"form-input\"><textarea class=\"maximum-characters\" data-maximum-characters=\"160\" data-maximum-characters-object=\"form-meta-description-maximum-characters\" id=\"form-meta-description\" name=\"meta-description\" rows=\"7\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "metaDescription"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-meta-description-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-search-words\" class=\"form-label\">Search Words<small>Alternative words this product can be found by, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-search-words\" name=\"search-words\" rows=\"2\" class=\"items\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "searchWords"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-alternative-product-codes\" class=\"form-label\">Alternative Product Codes<small>Alternative product codes to search by, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-alternative-product-codes\" name=\"alternative-product-codes\" rows=\"2\" class=\"items\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "alternativeProductCodes"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
    \t<label for=\"form-url\" class=\"form-label\">Internal Web Address<small>Use 7 keywords maximum. Focus on the brand and departments.</small></label>
        <div class=\"form-input\"><textarea class=\"seo-url\" id=\"form-url\" name=\"url\" rows=\"2\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "url"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
        \t<input type=\"hidden\" id=\"form-meta-keywords\" name=\"meta-keywords\" class=\"items\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "metaKeywords"), "html", null, true);
        echo "\" />
        \t<button class=\"button ui-button-green action-update-seo-product-section\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button class=\"button ui-button-blue action-reset-seo\" data-icon-primary=\"ui-icon-refresh\">Reset Seo</button>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:updateSeo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 182,  436 => 171,  422 => 172,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 193,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 119,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 128,  366 => 159,  340 => 160,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 129,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 98,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 94,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 84,  199 => 87,  191 => 149,  170 => 81,  210 => 95,  180 => 128,  172 => 132,  168 => 54,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 88,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 131,  286 => 76,  277 => 241,  255 => 105,  244 => 100,  214 => 113,  198 => 85,  181 => 86,  167 => 137,  160 => 79,  45 => 12,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 173,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 138,  324 => 170,  320 => 168,  297 => 117,  274 => 126,  256 => 86,  254 => 74,  252 => 122,  231 => 114,  216 => 63,  213 => 175,  202 => 169,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 163,  130 => 95,  100 => 74,  85 => 54,  76 => 18,  112 => 79,  101 => 54,  98 => 75,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 51,  184 => 60,  138 => 84,  118 => 93,  105 => 34,  66 => 18,  56 => 32,  115 => 63,  83 => 59,  164 => 80,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 173,  205 => 169,  196 => 93,  192 => 63,  189 => 106,  178 => 59,  176 => 57,  165 => 127,  161 => 49,  152 => 88,  148 => 47,  141 => 105,  134 => 99,  132 => 69,  127 => 93,  123 => 66,  109 => 60,  90 => 72,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 33,  60 => 37,  52 => 13,  97 => 38,  95 => 33,  88 => 66,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 72,  425 => 371,  420 => 68,  406 => 162,  402 => 363,  399 => 214,  343 => 257,  339 => 144,  335 => 143,  321 => 137,  317 => 140,  314 => 87,  311 => 133,  305 => 135,  291 => 124,  287 => 114,  282 => 129,  268 => 125,  264 => 73,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 96,  159 => 32,  154 => 76,  151 => 73,  145 => 45,  136 => 100,  128 => 102,  125 => 63,  119 => 38,  110 => 84,  96 => 27,  93 => 34,  91 => 33,  68 => 48,  65 => 12,  63 => 36,  43 => 25,  50 => 5,  25 => 50,  92 => 25,  86 => 61,  79 => 54,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 19,  72 => 31,  64 => 35,  53 => 10,  49 => 28,  44 => 11,  42 => 24,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 12,  26 => 6,  22 => 2,  224 => 65,  215 => 73,  211 => 90,  204 => 170,  200 => 111,  195 => 47,  193 => 160,  190 => 92,  188 => 146,  185 => 47,  179 => 81,  177 => 146,  171 => 76,  162 => 44,  158 => 91,  156 => 31,  153 => 47,  146 => 42,  142 => 60,  137 => 110,  131 => 58,  126 => 92,  120 => 89,  117 => 59,  103 => 71,  99 => 55,  77 => 44,  74 => 53,  57 => 15,  47 => 9,  39 => 10,  32 => 9,  24 => 6,  17 => 1,  135 => 29,  129 => 95,  122 => 76,  116 => 32,  113 => 36,  108 => 84,  104 => 30,  102 => 27,  94 => 21,  89 => 65,  87 => 31,  84 => 48,  81 => 24,  73 => 50,  70 => 40,  67 => 18,  62 => 17,  59 => 11,  55 => 36,  51 => 7,  48 => 12,  41 => 8,  38 => 3,  35 => 7,  31 => 14,  28 => 6,);
    }
}
