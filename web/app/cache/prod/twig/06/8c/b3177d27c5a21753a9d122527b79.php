<?php

/* WebIlluminationShopBundle:System:mainMenu.html.twig */
class __TwigTemplate_068cb3177d27c5a21753a9d122527b79 extends Twig_Template
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
        echo "<div class=\"main-menu clearfix\">
\t<nav class=\"container_8\">
\t    <a data-department-id=\"brands\" class=\"button sub-department-link ui-button-dark-grey ui-corner-none ui-corner-tl ui-corner-tr main-menu-button fr\" href=\"Javascript:void(0);\">Brands</a>
\t    <ul class=\"sf-menu clearfix\">
\t    \t";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 6
            echo "\t\t\t\t<li><a data-department-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" class=\"sub-department-link";
            if ($this->getAttribute($this->getContext($context, "loop"), "last")) {
                echo " special";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "department"), "url"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "department"), "menuTitle");
            echo "</a></li>
\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo "\t    </ul>
\t    ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 10
            echo "\t    \t";
            if ($this->getAttribute($this->getContext($context, "department", true), "departments", array(), "any", true, true)) {
                // line 11
                echo "\t    \t\t<div id=\"sub-department-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
                echo "\" class=\"sub-departments\">
\t    \t\t\t";
                // line 12
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "department"), "departments"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["subDepartment"]) {
                    // line 13
                    echo "\t    \t\t\t\t<div class=\"sub-department";
                    if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                        echo " sub-department-last";
                    }
                    echo "\">
\t\t    \t\t\t\t<h4><a href=\"";
                    // line 14
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "subDepartment"), "url"))), "html", null, true);
                    echo "\">";
                    echo $this->getAttribute($this->getContext($context, "subDepartment"), "menuTitle");
                    echo "</a></h4>
\t\t    \t\t\t\t";
                    // line 15
                    if ($this->getAttribute($this->getContext($context, "subDepartment", true), "departments", array(), "any", true, true)) {
                        // line 16
                        echo "\t\t    \t\t\t\t\t<ul>
\t\t\t    \t\t\t\t\t";
                        // line 17
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "subDepartment"), "departments"));
                        foreach ($context['_seq'] as $context["_key"] => $context["subSubDepartment"]) {
                            // line 18
                            echo "\t\t\t\t\t\t\t\t\t\t<li><a href=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department", array("url" => $this->getAttribute($this->getContext($context, "subSubDepartment"), "url"))), "html", null, true);
                            echo "\">";
                            echo $this->getAttribute($this->getContext($context, "subSubDepartment"), "menuTitle");
                            echo "</a></li>
\t\t\t    \t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subSubDepartment'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 20
                        echo "\t\t    \t\t\t\t\t</ul>
\t\t    \t\t\t\t";
                    }
                    // line 21
                    echo "\t
\t\t    \t\t\t</div>
\t\t    \t\t\t";
                    // line 23
                    if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                        // line 24
                        echo "\t\t    \t\t\t\t<div class=\"clear\"></div>
\t\t    \t\t\t";
                    }
                    // line 25
                    echo "\t
\t    \t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subDepartment'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 27
                echo "\t    \t\t\t<div class=\"clear\"></div>
\t    \t\t</div>
\t    \t";
            }
            // line 29
            echo "\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "\t\t<div id=\"sub-department-brands\" class=\"sub-departments brands padding-top-10 padding-bottom-10\">
\t\t\t";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 33
            echo "\t\t\t\t<div class=\"brand ";
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 1)) {
                echo " brand-first";
            }
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                echo " brand-last";
            }
            echo "\">
    \t\t\t\t<h4>
    \t\t\t\t\t";
            // line 35
            if ($this->getAttribute($this->getAttribute($this->getContext($context, "brand", true), "logo", array(), "any", false, true), "thumbnailPath", array(), "any", true, true)) {
                echo "<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "brand"), "url"))), "html", null, true);
                echo "\"><img class=\"fl\" src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getContext($context, "brand"), "logo"), "thumbnailPath")), "html", null, true);
                echo "\" border=\"0\" alt=\"";
                echo $this->getAttribute($this->getContext($context, "brand"), "brand");
                echo "\" width=\"48\" height=\"23\" /></a>";
            }
            // line 36
            echo "    \t\t\t\t\t<a class=\"text\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "brand"), "url"))), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "brand"), "brand");
            echo "</a>
    \t\t\t\t</h4>
    \t\t\t</div>
    \t\t\t";
            // line 39
            if ((($this->getAttribute($this->getContext($context, "loop"), "index") % 4) == 0)) {
                // line 40
                echo "    \t\t\t\t<div class=\"clear\"></div>
    \t\t\t";
            }
            // line 42
            echo "\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 43
        echo "\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t</nav>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:System:mainMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 369,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 196,  501 => 194,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 49,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 99,  273 => 228,  263 => 107,  246 => 100,  234 => 197,  217 => 69,  173 => 104,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 36,  207 => 152,  143 => 71,  157 => 46,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 256,  271 => 104,  253 => 212,  233 => 204,  226 => 64,  187 => 61,  150 => 114,  260 => 91,  155 => 45,  223 => 40,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 111,  174 => 32,  182 => 72,  175 => 55,  144 => 25,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 151,  114 => 26,  208 => 92,  183 => 75,  166 => 119,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 227,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 33,  170 => 143,  210 => 93,  180 => 55,  172 => 54,  168 => 52,  149 => 96,  139 => 114,  240 => 99,  230 => 93,  121 => 41,  257 => 225,  249 => 74,  106 => 79,  334 => 283,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 101,  167 => 127,  160 => 50,  45 => 15,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 319,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 127,  216 => 95,  213 => 117,  202 => 35,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 354,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 223,  261 => 228,  247 => 208,  243 => 211,  238 => 107,  220 => 79,  201 => 113,  194 => 148,  130 => 20,  100 => 43,  85 => 34,  76 => 23,  112 => 16,  101 => 33,  98 => 37,  272 => 118,  269 => 108,  228 => 126,  221 => 39,  197 => 112,  184 => 60,  138 => 23,  118 => 92,  105 => 23,  66 => 17,  56 => 21,  115 => 17,  83 => 59,  164 => 29,  140 => 24,  58 => 6,  21 => 4,  61 => 24,  36 => 3,  209 => 116,  205 => 174,  196 => 66,  192 => 81,  189 => 109,  178 => 145,  176 => 69,  165 => 101,  161 => 100,  152 => 88,  148 => 55,  141 => 93,  134 => 21,  132 => 47,  127 => 74,  123 => 23,  109 => 38,  90 => 20,  54 => 12,  133 => 104,  124 => 42,  111 => 87,  107 => 39,  80 => 12,  69 => 22,  60 => 15,  52 => 6,  97 => 13,  95 => 37,  88 => 27,  78 => 30,  75 => 11,  71 => 19,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 343,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 186,  241 => 43,  236 => 187,  222 => 96,  218 => 105,  159 => 27,  154 => 43,  151 => 43,  145 => 77,  136 => 100,  128 => 30,  125 => 88,  119 => 18,  110 => 15,  96 => 30,  93 => 35,  91 => 37,  68 => 9,  65 => 8,  63 => 25,  43 => 14,  50 => 18,  25 => 8,  92 => 28,  86 => 25,  79 => 18,  46 => 9,  37 => 4,  33 => 9,  27 => 2,  82 => 24,  72 => 10,  64 => 16,  53 => 37,  49 => 14,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 5,  19 => 2,  40 => 6,  20 => 2,  30 => 12,  26 => 3,  22 => 3,  224 => 65,  215 => 173,  211 => 178,  204 => 61,  200 => 111,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 108,  179 => 92,  177 => 105,  171 => 31,  162 => 62,  158 => 132,  156 => 57,  153 => 97,  146 => 89,  142 => 52,  137 => 92,  131 => 31,  126 => 92,  120 => 22,  117 => 50,  103 => 27,  99 => 67,  77 => 54,  74 => 21,  57 => 13,  47 => 15,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 48,  129 => 89,  122 => 72,  116 => 81,  113 => 41,  108 => 36,  104 => 14,  102 => 17,  94 => 21,  89 => 40,  87 => 19,  84 => 18,  81 => 27,  73 => 28,  70 => 17,  67 => 20,  62 => 41,  59 => 37,  55 => 14,  51 => 15,  48 => 26,  41 => 5,  38 => 12,  35 => 16,  31 => 5,  28 => 4,);
    }
}