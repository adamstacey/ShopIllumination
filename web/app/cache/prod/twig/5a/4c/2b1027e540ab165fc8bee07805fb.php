<?php

/* WebIlluminationAdminBundle:VoucherCodes:ajaxGetListing.html.twig */
class __TwigTemplate_5a4c2b1027e540ab165fc8bee07805fb extends Twig_Template
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
        echo "<table class=\"data-table\" id=\"data\" width=\"100%\">
\t<thead>
\t\t<tr>
\t\t\t<th width=\"19\" class=\"ac\"><input type=\"checkbox\" class=\"action-select-all\" value=\"1\" /></th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t\t<th class=\"ac\">Code</th>
\t\t\t<th class=\"al\">Description</th>
\t\t\t<th class=\"ac\">Type</th>
\t\t\t<th class=\"ac\">Use</th>
\t\t\t<th class=\"ac\">MOV</th>
\t\t\t<th class=\"ac\">Available</th>
\t\t\t<th class=\"ac\">Creator</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "voucherCodes"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["voucherCode"]) {
            echo "\t
\t\t\t<tr class=\"order ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "activeColour"), "html", null, true);
            echo "\" id=\"voucher-code-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"voucher-code-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" value=\"1\" autocomplete=\"off\" /></td>
\t\t\t\t<td width=\"22\" class=\"ac small ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "activeColour"), "html", null, true);
            echo "\"><img data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"no-border action-update-active\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "voucherCode"), "activeIcon")), "html", null, true);
            echo "\" border=\"0\" alt=\"Active\" /></td>
\t\t\t\t<td class=\"ac small\"><a data-id=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"action-view-voucher-code\" href=\"Javascript:void(0);\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "code"), "html", null, true);
            echo "</strong></a></td>
\t\t\t\t<td class=\"al small\">";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "description"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "discountTypeName"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "discountUseName"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">&pound;";
            // line 25
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "minimumOrderValue"), 2), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "validFromDate"), "d/m/Y"), "html", null, true);
            echo "<br />";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "expiryDate"), "d/m/Y"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "creator"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac no-wrap\">
\t\t\t\t\t<img class=\"action-buttons-spacer\" src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"1\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete-voucher-code\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<button data-id=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-report button\" data-icon-primary=\"ui-icon-document\" data-icon-only=\"true\" data-notification=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "numberUsed"), "html", null, true);
            echo "\">Report</button>
\t\t\t\t\t<button data-id=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-discounts button\" data-icon-primary=\"ui-icon-tag\" data-icon-only=\"true\">Discounts</button>
\t\t\t\t\t<button data-id=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl action-view-voucher-code button\" data-icon-primary=\"ui-icon-gear\" data-icon-only=\"true\">Voucher Code</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "voucherCode"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"10\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 45
            $this->env->loadTemplate("WebIlluminationAdminBundle:VoucherCodes:listingDiscounts.html.twig")->display(array_merge($context, array("voucherCode" => $this->getContext($context, "voucherCode"), "brands" => $this->getContext($context, "brands"), "departments" => $this->getContext($context, "departments"), "products" => $this->getContext($context, "products"))));
            // line 46
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:VoucherCodes:listingVoucherCode.html.twig")->display(array_merge($context, array("voucherCode" => $this->getContext($context, "voucherCode"), "brands" => $this->getContext($context, "brands"), "departments" => $this->getContext($context, "departments"), "products" => $this->getContext($context, "products"))));
            // line 47
            echo "\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucherCode'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 51
        echo "\t</tbody>
</table>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#data :checkbox:not(.no-uniform), #data :radio:not(.no-uniform), #data select:not(.no-uniform), #data :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#data .button\").each(function () {
            \$(this).button({
            \ticons: {
                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
                }, 
               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
        \t});
        \tvar \$dataNotification = \$(this).attr(\"data-notification\");
        \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
        \t{
        \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
        \t}
        });
        \$(\".message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find('.message-close').click(function () {
\t    \t\$(this).parent().fadeOut();
\t    });
\t    
\t    ";
        // line 75
        echo "\t\tvar \$actionButtonsWidth = 0;
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-confirm-delete-voucher-code:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-report:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-discounts:eq(0)\").outerWidth(true);
\t\t\$actionButtonsWidth = \$actionButtonsWidth + \$(\"tr.order button.action-view-voucher-code:eq(0)\").outerWidth(true);
\t\t\$(\".action-buttons-spacer\").width(\$actionButtonsWidth).attr(\"width\", \$actionButtonsWidth);
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:VoucherCodes:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 141,  316 => 166,  278 => 120,  250 => 113,  163 => 33,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 175,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 120,  246 => 83,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 71,  212 => 62,  207 => 44,  143 => 45,  157 => 46,  366 => 159,  340 => 160,  503 => 223,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 155,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 85,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 85,  242 => 108,  239 => 87,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 390,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 24,  208 => 92,  183 => 63,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 81,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 80,  149 => 76,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 85,  181 => 35,  167 => 34,  160 => 32,  45 => 5,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 196,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 94,  231 => 83,  216 => 63,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 197,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 125,  296 => 124,  293 => 239,  290 => 123,  284 => 85,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 66,  130 => 29,  100 => 74,  85 => 30,  76 => 18,  112 => 31,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 100,  221 => 176,  197 => 51,  184 => 55,  138 => 70,  118 => 21,  105 => 34,  66 => 20,  56 => 32,  115 => 58,  83 => 30,  164 => 52,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 97,  178 => 59,  176 => 86,  165 => 51,  161 => 49,  152 => 30,  148 => 47,  141 => 33,  134 => 42,  132 => 37,  127 => 53,  123 => 46,  109 => 58,  90 => 52,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 33,  60 => 19,  52 => 20,  97 => 38,  95 => 33,  88 => 24,  78 => 57,  75 => 15,  71 => 26,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 214,  343 => 257,  339 => 144,  335 => 143,  321 => 112,  317 => 140,  314 => 87,  311 => 133,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 99,  245 => 90,  241 => 137,  236 => 106,  222 => 76,  218 => 96,  159 => 32,  154 => 111,  151 => 109,  145 => 46,  136 => 103,  128 => 25,  125 => 63,  119 => 38,  110 => 23,  96 => 26,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 7,  43 => 8,  50 => 5,  25 => 50,  92 => 25,  86 => 46,  79 => 18,  46 => 10,  37 => 3,  33 => 3,  27 => 2,  82 => 19,  72 => 31,  64 => 16,  53 => 12,  49 => 11,  44 => 5,  42 => 13,  34 => 3,  29 => 9,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 65,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 47,  193 => 104,  190 => 75,  188 => 65,  185 => 47,  179 => 45,  177 => 78,  171 => 75,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 42,  142 => 60,  137 => 55,  131 => 58,  126 => 34,  120 => 83,  117 => 59,  103 => 69,  99 => 20,  77 => 18,  74 => 21,  57 => 13,  47 => 9,  39 => 10,  32 => 9,  24 => 3,  17 => 1,  135 => 29,  129 => 65,  122 => 33,  116 => 32,  113 => 36,  108 => 25,  104 => 39,  102 => 27,  94 => 25,  89 => 62,  87 => 31,  84 => 23,  81 => 24,  73 => 51,  70 => 17,  67 => 40,  62 => 11,  59 => 40,  55 => 31,  51 => 7,  48 => 13,  41 => 8,  38 => 3,  35 => 17,  31 => 2,  28 => 5,);
    }
}
