<?php

/* WebIlluminationAdminBundle:ProductsOld:ajaxGetStatisticsReferrers.html.twig */
class __TwigTemplate_6ec2e32c67c07cba662091979c21710d extends Twig_Template
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
        echo "<div id=\"chart-yesterday-referrers\" class=\"fl\"></div>
<div id=\"chart-week-to-date-referrers\" class=\"fl\"></div>
<div id=\"chart-month-to-date-referrers\" class=\"fl\"></div>
<div id=\"chart-year-to-date-referrers\" class=\"fl\"></div>
<div class=\"clear\"></div>

";
        // line 50
        echo "<script defer=\"defer\" type=\"text/javascript\">
\t
\t";
        // line 53
        echo "\tgoogle.load(\"visualization\", \"1\", {\"packages\": [\"corechart\"], \"callback\": loadCharts});
\t
\tfunction loadCharts()
\t{
\t\tdrawYesterdayReferrersChart();
\t\tdrawWeekToDateReferrersChart();
  \t\tdrawMonthToDateReferrersChart();
  \t\tdrawYearToDateReferrersChart();
\t}
\t
\t\tfunction drawYesterdayReferrersChart()
\t\t{
\t\tvar data = new google.visualization.DataTable();
        data.addColumn('string', 'Referrer');
\t\tdata.addColumn('number', 'Visits');
        data.addRows(";
        // line 68
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "yesterday")), "html", null, true);
        echo ");
        
        ";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "yesterday"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["referrer"]) {
            // line 71
            echo "        \tdata.setValue(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 0, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "source"), "html", null, true);
            echo "');
\t\t\tdata.setValue(";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 1, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "visits"), "html", null, true);
            echo ");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['referrer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 74
        echo "
\t\tvar chart = new google.visualization.PieChart(document.getElementById('chart-yesterday-referrers'));
        chart.draw(data, {width: 310, height: 200, is3D: true, sliceVisibilityThreshold: 1/50, pieSliceText: 'none', title: 'Referrers for Yesterday'});
\t\t}
\t\t
\t\tfunction drawWeekToDateReferrersChart()
\t\t{
\t\tvar data = new google.visualization.DataTable();
        data.addColumn('string', 'Referrer');
\t\tdata.addColumn('number', 'Visits');
        data.addRows(";
        // line 84
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "week_to_date")), "html", null, true);
        echo ");
        
        ";
        // line 86
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "week_to_date"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["referrer"]) {
            // line 87
            echo "        \tdata.setValue(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 0, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "source"), "html", null, true);
            echo "');
\t\t\tdata.setValue(";
            // line 88
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 1, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "visits"), "html", null, true);
            echo ");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['referrer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 90
        echo "
\t\tvar chart = new google.visualization.PieChart(document.getElementById('chart-week-to-date-referrers'));
        chart.draw(data, {width: 310, height: 200, is3D: true, sliceVisibilityThreshold: 1/50, pieSliceText: 'none', title: 'Referrers for the Week to Date'});
\t\t}
\t\t
\t\tfunction drawMonthToDateReferrersChart()
\t\t{
\t\tvar data = new google.visualization.DataTable();
        data.addColumn('string', 'Referrer');
\t\tdata.addColumn('number', 'Visits');
        data.addRows(";
        // line 100
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "month_to_date")), "html", null, true);
        echo ");
        
        ";
        // line 102
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "month_to_date"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["referrer"]) {
            // line 103
            echo "        \tdata.setValue(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 0, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "source"), "html", null, true);
            echo "');
\t\t\tdata.setValue(";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 1, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "visits"), "html", null, true);
            echo ");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['referrer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 106
        echo "
\t\tvar chart = new google.visualization.PieChart(document.getElementById('chart-month-to-date-referrers'));
        chart.draw(data, {width: 310, height: 200, is3D: true, sliceVisibilityThreshold: 1/50, pieSliceText: 'none', title: 'Referrers for the Month to Date'});
\t\t}
\t\t
\t\tfunction drawYearToDateReferrersChart()
\t\t{
\t\tvar data = new google.visualization.DataTable();
        data.addColumn('string', 'Referrer');
\t\tdata.addColumn('number', 'Visits');
        data.addRows(";
        // line 116
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "year_to_date")), "html", null, true);
        echo ");
        
        ";
        // line 118
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getContext($context, "statistics"), "source"), "year_to_date"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["referrer"]) {
            // line 119
            echo "        \tdata.setValue(";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 0, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "source"), "html", null, true);
            echo "');
\t\t\tdata.setValue(";
            // line 120
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index0"), "html", null, true);
            echo ", 1, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "referrer"), "visits"), "html", null, true);
            echo ");
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['referrer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 122
        echo "
\t\tvar chart = new google.visualization.PieChart(document.getElementById('chart-year-to-date-referrers'));
        chart.draw(data, {width: 310, height: 200, is3D: true, sliceVisibilityThreshold: 1/50, pieSliceText: 'none', title: 'Referrers for the Year to Date'});
\t\t}
\t\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:ProductsOld:ajaxGetStatisticsReferrers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 69,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 171,  319 => 90,  288 => 81,  229 => 67,  206 => 54,  147 => 76,  227 => 179,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 83,  234 => 79,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 77,  235 => 64,  232 => 78,  212 => 72,  207 => 44,  143 => 114,  157 => 46,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 85,  233 => 78,  226 => 64,  187 => 65,  150 => 36,  260 => 72,  155 => 39,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 107,  239 => 70,  237 => 80,  174 => 58,  182 => 60,  175 => 40,  144 => 75,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 42,  208 => 57,  183 => 49,  166 => 45,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 147,  170 => 57,  210 => 72,  180 => 63,  172 => 45,  168 => 54,  149 => 41,  139 => 34,  240 => 81,  230 => 104,  121 => 22,  257 => 71,  249 => 74,  106 => 63,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 94,  198 => 64,  181 => 37,  167 => 56,  160 => 32,  45 => 19,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 166,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 120,  231 => 105,  216 => 64,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 165,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 82,  238 => 196,  220 => 74,  201 => 58,  194 => 63,  130 => 29,  100 => 74,  85 => 11,  76 => 45,  112 => 19,  101 => 16,  98 => 15,  272 => 118,  269 => 237,  228 => 118,  221 => 176,  197 => 51,  184 => 55,  138 => 73,  118 => 21,  105 => 84,  66 => 22,  56 => 32,  115 => 21,  83 => 29,  164 => 100,  140 => 33,  58 => 6,  21 => 4,  61 => 18,  36 => 18,  209 => 95,  205 => 169,  196 => 57,  192 => 43,  189 => 54,  178 => 59,  176 => 44,  165 => 128,  161 => 39,  152 => 90,  148 => 30,  141 => 33,  134 => 88,  132 => 30,  127 => 87,  123 => 46,  109 => 18,  90 => 13,  54 => 13,  133 => 104,  124 => 24,  111 => 20,  107 => 18,  80 => 60,  69 => 12,  60 => 14,  52 => 20,  97 => 38,  95 => 31,  88 => 13,  78 => 19,  75 => 72,  71 => 9,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 66,  236 => 106,  222 => 62,  218 => 65,  159 => 130,  154 => 42,  151 => 109,  145 => 105,  136 => 103,  128 => 27,  125 => 47,  119 => 33,  110 => 86,  96 => 37,  93 => 74,  91 => 34,  68 => 71,  65 => 8,  63 => 22,  43 => 8,  50 => 6,  25 => 50,  92 => 17,  86 => 17,  79 => 27,  46 => 68,  37 => 20,  33 => 12,  27 => 8,  82 => 27,  72 => 18,  64 => 7,  53 => 13,  49 => 15,  44 => 10,  42 => 18,  34 => 3,  29 => 53,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 66,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 159,  193 => 104,  190 => 62,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 110,  142 => 56,  137 => 55,  131 => 30,  126 => 91,  120 => 88,  117 => 43,  103 => 20,  99 => 19,  77 => 18,  74 => 53,  57 => 14,  47 => 5,  39 => 8,  32 => 6,  24 => 6,  17 => 1,  135 => 30,  129 => 49,  122 => 27,  116 => 70,  113 => 24,  108 => 84,  104 => 17,  102 => 40,  94 => 54,  89 => 16,  87 => 64,  84 => 11,  81 => 24,  73 => 18,  70 => 9,  67 => 8,  62 => 21,  59 => 18,  55 => 14,  51 => 70,  48 => 11,  41 => 4,  38 => 3,  35 => 8,  31 => 2,  28 => 5,);
    }
}
