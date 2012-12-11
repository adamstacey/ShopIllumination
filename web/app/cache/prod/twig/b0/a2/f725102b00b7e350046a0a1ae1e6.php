<?php

/* WebIlluminationAdminBundle:Brands:updateSeo.html.twig */
class __TwigTemplate_b0a2f725102b00b7e350046a0a1ae1e6 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "pageTitle"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-page-title-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-header\" class=\"form-label\">Header<small><span class=\"red\">VERY IMPORTANT</span><br />Main header on the page</small></label>
        <div class=\"form-input\"><textarea id=\"form-header\" name=\"header\" rows=\"2\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "header"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-meta-description\" class=\"form-label\">Meta Description<small><span class=\"red\">VERY IMPORTANT</span><br />Your \"Advert\" in organic search results. Need to include keywords but primarily needs to entice people to click through by using a call to action with benefits (e.g. lowest price, in stock, free delivery, etc).</small></label>
        <div class=\"form-input\"><textarea class=\"maximum-characters\" data-maximum-characters=\"160\" data-maximum-characters-object=\"form-meta-description-maximum-characters\" id=\"form-meta-description\" name=\"meta-description\" rows=\"7\">";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "metaDescription"), "html", null, true);
        echo "</textarea><p class=\"maximum-characters-message\" id=\"form-meta-description-maximum-characters\"></p></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-search-words\" class=\"form-label\">Search Words<small>Alternative words this brand can be found by, separated by a comma</small></label>
        <div class=\"form-input\"><textarea id=\"form-search-words\" name=\"search-words\" rows=\"2\" class=\"items\">";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "searchWords"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
    \t<label for=\"form-url\" class=\"form-label\">Internal Web Address<small>Use 7 keywords maximum. Focus on the brand and departments.</small></label>
        <div class=\"form-input\"><textarea class=\"seo-url\" id=\"form-url\" name=\"url\" rows=\"2\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "url"), "html", null, true);
        echo "</textarea></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
        \t<input type=\"hidden\" id=\"form-meta-keywords\" name=\"meta-keywords\" class=\"items\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "brand"), "metaKeywords"), "html", null, true);
        echo "\" />
        \t<button class=\"button ui-button-green action-update-seo-section\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button class=\"button ui-button-blue action-reset-seo\" data-icon-primary=\"ui-icon-refresh\">Reset Seo</button>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Brands:updateSeo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 261,  225 => 121,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 205,  288 => 123,  229 => 67,  206 => 71,  147 => 120,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 68,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 99,  262 => 77,  235 => 129,  232 => 67,  212 => 66,  207 => 44,  143 => 114,  157 => 45,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 145,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 39,  223 => 79,  186 => 63,  169 => 48,  301 => 65,  298 => 100,  292 => 98,  267 => 78,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 31,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 88,  208 => 60,  183 => 58,  166 => 43,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 90,  303 => 109,  299 => 107,  295 => 87,  283 => 249,  279 => 120,  275 => 240,  265 => 155,  251 => 75,  199 => 90,  191 => 42,  170 => 59,  210 => 72,  180 => 152,  172 => 45,  168 => 52,  149 => 62,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 76,  249 => 74,  106 => 24,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 90,  244 => 110,  214 => 73,  198 => 100,  181 => 82,  167 => 73,  160 => 41,  45 => 11,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 80,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 64,  213 => 97,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 88,  296 => 100,  293 => 125,  290 => 86,  284 => 85,  270 => 122,  266 => 114,  261 => 228,  247 => 88,  243 => 110,  238 => 107,  220 => 26,  201 => 58,  194 => 99,  130 => 36,  100 => 68,  85 => 30,  76 => 18,  112 => 31,  101 => 28,  98 => 74,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 68,  184 => 64,  138 => 39,  118 => 36,  105 => 29,  66 => 18,  56 => 32,  115 => 58,  83 => 23,  164 => 51,  140 => 38,  58 => 15,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 57,  192 => 67,  189 => 49,  178 => 61,  176 => 41,  165 => 76,  161 => 58,  152 => 125,  148 => 32,  141 => 56,  134 => 105,  132 => 37,  127 => 53,  123 => 51,  109 => 30,  90 => 19,  54 => 8,  133 => 100,  124 => 97,  111 => 32,  107 => 24,  80 => 24,  69 => 18,  60 => 16,  52 => 14,  97 => 21,  95 => 26,  88 => 65,  78 => 56,  75 => 55,  71 => 19,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 84,  268 => 94,  264 => 93,  259 => 150,  245 => 119,  241 => 70,  236 => 107,  222 => 62,  218 => 65,  159 => 34,  154 => 124,  151 => 43,  145 => 41,  136 => 103,  128 => 27,  125 => 35,  119 => 33,  110 => 39,  96 => 35,  93 => 33,  91 => 33,  68 => 42,  65 => 12,  63 => 36,  43 => 25,  50 => 14,  25 => 7,  92 => 45,  86 => 15,  79 => 54,  46 => 13,  37 => 3,  33 => 12,  27 => 11,  82 => 18,  72 => 14,  64 => 16,  53 => 34,  49 => 28,  44 => 15,  42 => 24,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 12,  26 => 6,  22 => 4,  224 => 66,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 98,  188 => 55,  185 => 54,  179 => 53,  177 => 52,  171 => 52,  162 => 46,  158 => 125,  156 => 130,  153 => 30,  146 => 110,  142 => 46,  137 => 55,  131 => 41,  126 => 40,  120 => 26,  117 => 32,  103 => 78,  99 => 34,  77 => 44,  74 => 23,  57 => 13,  47 => 7,  39 => 18,  32 => 9,  24 => 6,  17 => 1,  135 => 107,  129 => 53,  122 => 48,  116 => 47,  113 => 57,  108 => 84,  104 => 39,  102 => 23,  94 => 63,  89 => 32,  87 => 30,  84 => 20,  81 => 60,  73 => 52,  70 => 40,  67 => 19,  62 => 16,  59 => 22,  55 => 14,  51 => 28,  48 => 15,  41 => 21,  38 => 9,  35 => 7,  31 => 14,  28 => 5,);
    }
}