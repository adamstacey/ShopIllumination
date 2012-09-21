<?php

/* WebIlluminationAdminBundle:MembershipCards:ajaxGetListing.html.twig */
class __TwigTemplate_ecaf649dabfad1ca2d55fd949077041c extends Twig_Template
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
\t\t\t<th width=\"22\" class=\"ac\">&nbsp;</th>
\t\t\t<th class=\"ac\">Membership Number</th>
\t\t\t<th class=\"ac\">Assigned</th>
\t\t\t<th class=\"ac\">Available</th>
\t\t\t<th class=\"ac\">&nbsp;</th>
\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "membershipCards"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["membershipCard"]) {
            echo "\t
\t\t\t<tr class=\"membership-card ";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "activeColour"), "html", null, true);
            echo "\" id=\"membership-card-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td width=\"19\" class=\"ac select\"><input data-id=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" class=\"action-select\" id=\"membership-card-id-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" value=\"1\" autocomplete=\"off\" /></td>
\t\t\t\t<td width=\"22\" class=\"ac small ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "activeColour"), "html", null, true);
            echo "\"><img data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"no-border action-update-active\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "membershipCard"), "activeIcon")), "html", null, true);
            echo "\" border=\"0\" alt=\"Active\" /></td>
\t\t\t\t<td class=\"ac small\"><a data-id=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "userId"), "html", null, true);
            echo "\" href=\"Javascript:void(0);\"";
            if (($this->getAttribute($this->getContext($context, "membershipCard"), "userId") > 0)) {
                echo " class=\"action-view-customer\"";
            }
            echo "><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "membershipNumber"), "html", null, true);
            echo "</strong></td>
\t\t\t\t<td class=\"ac small\">";
            // line 18
            if (($this->getAttribute($this->getContext($context, "membershipCard"), "userId") > 0)) {
                echo "Yes";
            } else {
                echo "No";
            }
            echo "</td>
\t\t\t\t<td class=\"ac small\">";
            // line 19
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "validFromDate"), "d/m/Y"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "expiryDate"), "d/m/Y"), "html", null, true);
            echo "</td>
\t\t\t\t<td class=\"ac no-wrap\">
\t\t\t\t\t<img class=\"action-buttons-spacer\" src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/blank.gif"), "html", null, true);
            echo "\" border=\"0\" width=\"1\" height=\"0\" alt=\"\" />
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<button data-id=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tr ui-corner-br button ui-button-red action-confirm-delete-membership-card\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t<button data-id=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none action-view-report button\" data-icon-primary=\"ui-icon-document\" data-icon-only=\"true\" data-notification=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "items"), "html", null, true);
            echo "\">Report</button>
\t\t\t\t\t<button data-id=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none button";
            if (($this->getAttribute($this->getContext($context, "membershipCard"), "userId") > 0)) {
                echo " action-confirm-release-user ui-button-red";
            }
            echo "\" data-icon-primary=\"ui-icon-refresh\" data-icon-only=\"true\">Release Customer</button>
\t\t\t\t\t<button data-id=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none button";
            if (($this->getAttribute($this->getContext($context, "membershipCard"), "userId") == 0)) {
                echo " action-assign-user ui-button-green";
            }
            echo "\" data-icon-primary=\"ui-icon-person\" data-icon-only=\"true\">Assign Customer</button>
\t\t\t\t\t<button data-id=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" data-user-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "userId"), "html", null, true);
            echo "\" class=\"ui-corner-none button";
            if (($this->getAttribute($this->getContext($context, "membershipCard"), "userId") > 0)) {
                echo " action-view-customer ui-button-green";
            }
            echo "\" data-icon-primary=\"ui-icon-contact\" data-icon-only=\"true\">Customer</button>
\t\t\t\t\t<button data-id=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\" class=\"ui-corner-none ui-corner-tl ui-corner-bl action-view-membership-card button\" data-icon-primary=\"ui-icon-gear\" data-icon-only=\"true\">Membership Card</button>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr class=\"ui-helper-hidden more-information\" id=\"more-information-";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "membershipCard"), "id"), "html", null, true);
            echo "\">
\t\t\t\t<td colspan=\"10\" class=\"no-padding\">
\t\t\t\t\t<div class=\"more-information-container no-padding-top\">
\t\t\t\t\t\t<div class=\"spacer\">
\t\t\t\t\t\t\t<button class=\"action-close-more-information button ui-button-blue full ui-corner-none ui-corner-bl ui-corner-br\" data-icon-primary=\"ui-icon-triangle-1-n\" data-icon-secondary=\"ui-icon-triangle-1-n\">CLOSE INFORMATION PANEL</button>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t";
            // line 39
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingMembershipCard.html.twig")->display(array_merge($context, array("membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 40
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingCustomer.html.twig")->display(array_merge($context, array("membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 41
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingAssignUser.html.twig")->display(array_merge($context, array("contacts" => $this->getContext($context, "contacts"), "membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 42
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingConfirmReleaseUser.html.twig")->display(array_merge($context, array("membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 43
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingReport.html.twig")->display(array_merge($context, array("membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 44
            echo "\t\t\t\t\t\t";
            $this->env->loadTemplate("WebIlluminationAdminBundle:MembershipCards:listingConfirmDelete.html.twig")->display(array_merge($context, array("membershipCard" => $this->getContext($context, "membershipCard"))));
            // line 45
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['membershipCard'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 49
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
        // line 73
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
        return "WebIlluminationAdminBundle:MembershipCards:ajaxGetListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 261,  225 => 121,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 205,  288 => 123,  229 => 105,  206 => 71,  147 => 120,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 106,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 99,  262 => 86,  235 => 129,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 40,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 145,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 39,  223 => 79,  186 => 63,  169 => 44,  301 => 65,  298 => 100,  292 => 98,  267 => 57,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 31,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 41,  208 => 64,  183 => 58,  166 => 43,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 249,  279 => 120,  275 => 240,  265 => 155,  251 => 89,  199 => 90,  191 => 42,  170 => 59,  210 => 72,  180 => 152,  172 => 45,  168 => 52,  149 => 62,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 24,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 90,  244 => 110,  214 => 73,  198 => 100,  181 => 82,  167 => 73,  160 => 41,  45 => 5,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 228,  247 => 88,  243 => 110,  238 => 107,  220 => 26,  201 => 69,  194 => 99,  130 => 106,  100 => 56,  85 => 30,  76 => 18,  112 => 25,  101 => 28,  98 => 75,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 68,  184 => 64,  138 => 28,  118 => 36,  105 => 29,  66 => 18,  56 => 15,  115 => 58,  83 => 28,  164 => 51,  140 => 38,  58 => 15,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 67,  189 => 49,  178 => 61,  176 => 41,  165 => 76,  161 => 58,  152 => 125,  148 => 32,  141 => 56,  134 => 105,  132 => 54,  127 => 53,  123 => 51,  109 => 84,  90 => 19,  54 => 8,  133 => 54,  124 => 52,  111 => 32,  107 => 24,  80 => 24,  69 => 41,  60 => 16,  52 => 14,  97 => 21,  95 => 37,  88 => 21,  78 => 23,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 170,  268 => 94,  264 => 93,  259 => 150,  245 => 119,  241 => 204,  236 => 107,  222 => 62,  218 => 77,  159 => 34,  154 => 124,  151 => 50,  145 => 29,  136 => 103,  128 => 27,  125 => 98,  119 => 26,  110 => 44,  96 => 35,  93 => 34,  91 => 33,  68 => 13,  65 => 12,  63 => 40,  43 => 13,  50 => 14,  25 => 7,  92 => 45,  86 => 15,  79 => 54,  46 => 10,  37 => 3,  33 => 7,  27 => 4,  82 => 18,  72 => 14,  64 => 16,  53 => 12,  49 => 11,  44 => 15,  42 => 13,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 194,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 98,  188 => 153,  185 => 40,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 130,  153 => 30,  146 => 110,  142 => 46,  137 => 55,  131 => 41,  126 => 40,  120 => 26,  117 => 58,  103 => 31,  99 => 36,  77 => 27,  74 => 49,  57 => 13,  47 => 7,  39 => 18,  32 => 9,  24 => 5,  17 => 1,  135 => 105,  129 => 53,  122 => 48,  116 => 47,  113 => 57,  108 => 84,  104 => 39,  102 => 23,  94 => 41,  89 => 22,  87 => 30,  84 => 20,  81 => 60,  73 => 20,  70 => 17,  67 => 19,  62 => 16,  59 => 22,  55 => 14,  51 => 7,  48 => 15,  41 => 8,  38 => 21,  35 => 17,  31 => 13,  28 => 5,);
    }
}
