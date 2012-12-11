<?php

/* WebIlluminationAdminBundle:Products:ajaxAddPrice.html.twig */
class __TwigTemplate_714a32b493a6164d5b92bd166a7f4d83 extends Twig_Template
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
        echo "<li class=\"price-container\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" id=\"price-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
\t<table width=\"100%\">
\t\t<tbody>
\t\t\t<tr>
\t\t\t\t<td width=\"9\" rowspan=\"4\">
\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"1\" rowspan=\"4\" class=\"select delete\">
\t\t\t\t\t<input data-index=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"checkbox\" class=\"price-select\" id=\"form-price-select-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"1\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-cost-price-";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Cost (inc. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-recommended-retail-price-";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">RRP (inc. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-markup-percentage-";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Markup (%)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-list-price-";
        // line 14
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Price (inc. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom\"><label for=\"form-price-profit-";
        // line 15
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Profit (inc. VAT)</label></td>
\t\t\t\t<td width=\"1\" rowspan=\"4\">
\t\t\t\t\t<input type=\"hidden\" class=\"price-supplier-id\" id=\"form-price-supplier-id-";
        // line 17
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t<input type=\"hidden\" class=\"price-currency-code\" id=\"form-price-currency-code-";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"GBP\" />
\t\t\t\t\t<input type=\"hidden\" class=\"price-display-order\" id=\"form-price-display-order-";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" data-index=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"price-requires-update\" id=\"form-price-requires-update-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t<input type=\"hidden\" data-index=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"price-id\" id=\"form-price-id-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t<button data-index=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"button ui-button-red action-confirm-delete-price\" data-icon-primary=\"ui-icon-closethick\">Delete</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a cost price.\" class=\"ac price-cost-price full\" id=\"form-price-cost-price-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Cost (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a recommended retail price.\" class=\"ac price-recommended-retail-price full\" id=\"form-price-recommended-retail-price-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"RRP (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-markup-percentage full ui-state-error\" id=\"form-price-markup-percentage-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Markup (%)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" required=\"required\" data-message=\"Please enter a list price.\" class=\"ac price-list-price full\" id=\"form-price-list-price-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Price (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-profit full\" id=\"form-price-profit-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Profit (inc. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-cost-price-excluding-vat-";
        // line 43
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Cost (ex. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-recommended-retail-price-excluding-vat-";
        // line 44
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">RRP (ex. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-percentage-";
        // line 45
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Profit (%)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-list-price-excluding-vat-";
        // line 46
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Price (ex. VAT)</label></td>
\t\t\t\t<td class=\"ac no-padding-bottom no-padding-top\"><label for=\"form-price-profit-excluding-vat-";
        // line 47
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">Profit (ex. VAT)</label></td>
\t\t\t</tr>
\t\t\t<tr>\t\t\t\t\t\t\t\t\t
\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-cost-price-excluding-vat full\" id=\"form-price-cost-price-excluding-vat-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Cost (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-recommended-retail-price-excluding-vat full\" id=\"form-price-recommended-retail-price-excluding-vat-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"RRP (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-profit-percentage full ui-state-error\" id=\"form-price-profit-percentage-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Profit (%)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-list-price-excluding-vat full\" id=\"form-price-list-price-excluding-vat-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Price (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"ac no-padding-top\">
\t\t\t\t\t<input data-index=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"text\" class=\"ac price-profit-excluding-vat full\" id=\"form-price-profit-excluding-vat-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" placeholder=\"Profit (ex. VAT)\" value=\"0.0000\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t</table>
</li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:ajaxAddPrice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 141,  316 => 166,  278 => 120,  250 => 113,  163 => 33,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 175,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 120,  246 => 83,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 71,  212 => 62,  207 => 44,  143 => 45,  157 => 46,  366 => 159,  340 => 160,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 85,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 85,  242 => 108,  239 => 87,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 390,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 24,  208 => 92,  183 => 63,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 81,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 54,  149 => 46,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 85,  181 => 35,  167 => 34,  160 => 51,  45 => 12,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 94,  231 => 83,  216 => 63,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 125,  296 => 124,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 66,  130 => 29,  100 => 74,  85 => 30,  76 => 20,  112 => 33,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 100,  221 => 176,  197 => 51,  184 => 60,  138 => 70,  118 => 21,  105 => 34,  66 => 18,  56 => 32,  115 => 58,  83 => 30,  164 => 52,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 85,  205 => 169,  196 => 57,  192 => 63,  189 => 97,  178 => 59,  176 => 57,  165 => 51,  161 => 49,  152 => 30,  148 => 47,  141 => 44,  134 => 42,  132 => 37,  127 => 53,  123 => 46,  109 => 58,  90 => 52,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 33,  60 => 19,  52 => 13,  97 => 38,  95 => 33,  88 => 22,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 214,  343 => 257,  339 => 144,  335 => 143,  321 => 112,  317 => 140,  314 => 87,  311 => 133,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 99,  245 => 90,  241 => 137,  236 => 106,  222 => 76,  218 => 96,  159 => 32,  154 => 111,  151 => 109,  145 => 45,  136 => 103,  128 => 39,  125 => 63,  119 => 38,  110 => 23,  96 => 27,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 16,  43 => 8,  50 => 5,  25 => 50,  92 => 25,  86 => 24,  79 => 18,  46 => 10,  37 => 3,  33 => 3,  27 => 2,  82 => 21,  72 => 31,  64 => 16,  53 => 14,  49 => 13,  44 => 11,  42 => 13,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 65,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 47,  193 => 104,  190 => 75,  188 => 65,  185 => 47,  179 => 45,  177 => 78,  171 => 75,  162 => 44,  158 => 38,  156 => 31,  153 => 47,  146 => 42,  142 => 60,  137 => 43,  131 => 58,  126 => 34,  120 => 36,  117 => 59,  103 => 69,  99 => 20,  77 => 18,  74 => 21,  57 => 15,  47 => 9,  39 => 10,  32 => 9,  24 => 3,  17 => 1,  135 => 29,  129 => 65,  122 => 33,  116 => 32,  113 => 36,  108 => 25,  104 => 30,  102 => 27,  94 => 25,  89 => 62,  87 => 31,  84 => 23,  81 => 24,  73 => 51,  70 => 19,  67 => 18,  62 => 17,  59 => 40,  55 => 31,  51 => 7,  48 => 12,  41 => 11,  38 => 3,  35 => 9,  31 => 2,  28 => 6,);
    }
}