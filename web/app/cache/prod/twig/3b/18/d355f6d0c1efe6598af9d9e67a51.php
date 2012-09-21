<?php

/* WebIlluminationShopBundle:Basket:index.html.twig */
class __TwigTemplate_3b18d355f6d0c1efe6598af9d9e67a51 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::shop.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Your Basket | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<header>
\t\t<h1>Your Shopping Basket</h1>
\t</header>
\t<section class=\"container_6 clearfix\">
\t\t<div class=\"grid_4\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2 id=\"products-found\">Your Bakset Contents</h2>
\t            </header>
\t\t\t\t<section id=\"basket-contents-section\">
\t\t\t\t\t<div class=\"clearfix separator\">
\t\t\t\t\t\t<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "history"), 0))), "html", null, true);
        echo "\" data-icon-primary=\"ui-icon-arrowthick-1-w\" class=\"fl action-continue-shopping button ui-button-blue\">Continue Shopping</a>
\t\t\t\t\t\t<a href=\"Javascript:void(0);\" data-icon-primary=\"ui-icon-closethick\" class=\"fl button-margin action-clear-basket button ui-button-red\">Clear Basket</a>
\t\t\t\t\t\t<a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_secure_checkout"), "html", null, true);
        echo "\" data-icon-primary=\"ui-icon-locked\" class=\"fr action-pay-securely-now button ui-button-green\">Pay Securely Now</a>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div id=\"basket-contents-loading\" class=\"clearfix separator\">
\t\t\t\t\t\t<img class=\"fl\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />
\t\t\t\t\t\t<p>Loading your basket contents&hellip;</p>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"basket-contents\" class=\"clearfix separator ui-helper-hidden\"></div>
\t\t\t\t\t<div id=\"basket-totals-loading\" class=\"clearfix separator\">
\t\t\t\t\t\t<img class=\"fl\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />
\t\t\t\t\t\t<p>Loading the totals of your basket&hellip;</p>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"voucher-code-membership-card-number\" class=\"ar clearfix separator\">
\t\t\t\t\t\t<table align=\"right\" width=\"50%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td colspan=\"4\" class=\"al\">Voucher Code:</td>
\t\t\t\t\t\t\t\t";
        // line 37
        echo "\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<input class=\"uppercase small full\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "discounts"), "voucherCode"), "html", null, true);
        echo "\" type=\"text\" id=\"form-voucher-code\" name=\"voucher-code\" placeholder=\"Voucher Code\" />
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td id=\"delete-voucher-code\" width=\"23\" class=\"ar";
        // line 42
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "discounts"), "voucherCode") == "")) {
            echo " ui-helper-hidden";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t<img width=\"18\" height=\"18\" class=\"link action-delete-voucher-code\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/icons/error-small.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Delete Voucher Code\" />
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td width=\"5\">
\t\t\t\t\t\t\t\t\t<img src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/blank.gif"), "html", null, true);
        echo "\" border=\"0\" width=\"5\" height=\"0\" alt=\"\" />
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td width=\"53\">
\t\t\t\t\t\t\t\t\t<a href=\"Javascript:void(0);\" class=\"small action-redeem-voucher-code button ui-button-green\">Redeem</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
        // line 66
        echo "\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"basket-totals\" class=\"ar clearfix separator ui-helper-hidden\"></div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div class=\"clearfix\">
\t\t\t\t\t\t<a href=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getAttribute($this->getContext($context, "cataloguePageHistory"), "history"), 0))), "html", null, true);
        echo "\" data-icon-primary=\"ui-icon-arrowthick-1-w\" class=\"fl action-continue-shopping button ui-button-blue\">Continue Shopping</a>
\t\t\t\t\t\t<a href=\"Javascript:void(0);\" data-icon-primary=\"ui-icon-closethick\" class=\"fl button-margin action-clear-basket button ui-button-red\">Clear Basket</a>
\t\t\t\t\t\t<a href=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_secure_checkout"), "html", null, true);
        echo "\" data-icon-primary=\"ui-icon-locked\" class=\"fr action-pay-securely-now button ui-button-green\">Pay Securely Now</a>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t";
        // line 79
        echo "\t\t\t\t</section>
\t        </div>
\t    </div>
\t    <div class=\"grid_2 fr\"> 
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Your Delivery</h2>
\t            </header>
\t\t\t\t<section id=\"your-delivery-section\">
\t\t\t\t\t<div id=\"basket-delivery-options-loading\" class=\"ac clearfix\">
\t\t\t\t\t\t<img src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />
\t\t\t\t\t\t<p>Loading your delivery options&hellip;</p>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"basket-delivery-options\" class=\"clearfix ui-helper-hidden\"></div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t    ";
        // line 115
        echo "\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 118
    public function block_javascripts($context, array $blocks = array())
    {
        // line 119
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 120
        $this->env->loadTemplate("WebIlluminationShopBundle:Basket:indexScript.js.twig")->display(array_merge($context, array("basket" => $this->getContext($context, "basket"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Basket:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 110,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 169,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 196,  501 => 194,  499 => 204,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 118,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 71,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 99,  273 => 86,  263 => 107,  246 => 100,  234 => 98,  217 => 69,  173 => 58,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 177,  207 => 152,  143 => 71,  157 => 115,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 256,  271 => 104,  253 => 203,  233 => 204,  226 => 64,  187 => 143,  150 => 114,  260 => 91,  155 => 116,  223 => 179,  186 => 159,  169 => 66,  301 => 85,  298 => 180,  292 => 243,  267 => 109,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 111,  174 => 68,  182 => 72,  175 => 98,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 151,  114 => 66,  208 => 92,  183 => 75,  166 => 119,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 227,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 149,  170 => 143,  210 => 93,  180 => 55,  172 => 53,  168 => 52,  149 => 47,  139 => 114,  240 => 99,  230 => 93,  121 => 41,  257 => 225,  249 => 74,  106 => 46,  334 => 269,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 101,  167 => 127,  160 => 50,  45 => 5,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 339,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 114,  216 => 95,  213 => 175,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 220,  261 => 228,  247 => 88,  243 => 211,  238 => 107,  220 => 79,  201 => 87,  194 => 148,  130 => 45,  100 => 43,  85 => 14,  76 => 23,  112 => 30,  101 => 33,  98 => 37,  272 => 118,  269 => 108,  228 => 97,  221 => 93,  197 => 169,  184 => 56,  138 => 104,  118 => 92,  105 => 26,  66 => 24,  56 => 17,  115 => 39,  83 => 59,  164 => 44,  140 => 41,  58 => 6,  21 => 4,  61 => 14,  36 => 6,  209 => 173,  205 => 63,  196 => 59,  192 => 81,  189 => 106,  178 => 145,  176 => 69,  165 => 63,  161 => 61,  152 => 88,  148 => 55,  141 => 34,  134 => 79,  132 => 47,  127 => 74,  123 => 23,  109 => 38,  90 => 72,  54 => 15,  133 => 104,  124 => 42,  111 => 87,  107 => 39,  80 => 24,  69 => 22,  60 => 21,  52 => 6,  97 => 31,  95 => 37,  88 => 29,  78 => 16,  75 => 28,  71 => 25,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 186,  241 => 89,  236 => 187,  222 => 96,  218 => 105,  159 => 117,  154 => 43,  151 => 56,  145 => 77,  136 => 100,  128 => 47,  125 => 106,  119 => 34,  110 => 19,  96 => 15,  93 => 35,  91 => 24,  68 => 13,  65 => 12,  63 => 22,  43 => 4,  50 => 12,  25 => 7,  92 => 28,  86 => 25,  79 => 18,  46 => 20,  37 => 3,  33 => 14,  27 => 2,  82 => 33,  72 => 22,  64 => 22,  53 => 37,  49 => 28,  44 => 25,  42 => 12,  34 => 16,  29 => 2,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 12,  26 => 3,  22 => 5,  224 => 65,  215 => 173,  211 => 101,  204 => 61,  200 => 111,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 149,  179 => 92,  177 => 59,  171 => 120,  162 => 62,  158 => 132,  156 => 57,  153 => 56,  146 => 89,  142 => 52,  137 => 38,  131 => 58,  126 => 92,  120 => 22,  117 => 50,  103 => 27,  99 => 67,  77 => 54,  74 => 19,  57 => 9,  47 => 13,  39 => 3,  32 => 15,  24 => 2,  17 => 1,  135 => 48,  129 => 34,  122 => 72,  116 => 27,  113 => 38,  108 => 36,  104 => 35,  102 => 17,  94 => 42,  89 => 40,  87 => 61,  84 => 37,  81 => 27,  73 => 28,  70 => 9,  67 => 20,  62 => 20,  59 => 37,  55 => 14,  51 => 15,  48 => 26,  41 => 5,  38 => 4,  35 => 3,  31 => 4,  28 => 2,);
    }
}
