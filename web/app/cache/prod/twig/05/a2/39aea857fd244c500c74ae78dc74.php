<?php

/* WebIlluminationShopBundle:System:index.html.twig */
class __TwigTemplate_05a239aea857fd244c500c74ae78dc74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'slider' => array($this, 'block_slider'),
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
        echo "Worktops, Charcoal Filters, Cooker Hoods, Built-in Microwaves, Integrated Dishwashers, Integrated Washing Machines, Refrigeration, Cleaning Products, Glass Splashbacks, Waste Disposer, Sinks, Taps, Plinth Heaters, Range Cookers, Ducting, Hobs, Ovens, Coffee Machines, Solid Surface Worktops, Kitchen Appliances | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_slider($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"container_8 clearfix\">
\t\t<header>
\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "neff", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/neff-dishwashers.jpg"), "html", null, true);
        echo "\" alt=\"Neff Dishwashers\" /></a>
\t\t\t\t\t\t<h3 class=\"left\">Neff Dishwashers</h3>
\t\t\t\t\t\t<p class=\"left\">A full scale dinner party or a meal for one, a Neff dishwasher can handle anything you need it to. And that includes bulky pans and casserole dishes. Innovations like our unique VarioFlex baskets give you the complete flexibility you need for the way we cook today.</p>
\t\t\t\t\t\t<a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "neff", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\" class=\"button left ui-button-green\">More Details</a>
\t\t\t\t\t</div>
\t\t\t    \t<div class=\"slider-element\">
\t\t\t    \t\t<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "franke", "url" => "sinks-and-taps-kitchen-sinks")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/franke-sinks.jpg"), "html", null, true);
        echo "\" alt=\"Franke Sinks\" /></a>
\t\t\t    \t\t<h3 class=\"right\">Franke Sinks</h3>
\t\t\t    \t\t<p class=\"right\">This superb choice of state-of-the-art new sink designs is offered in a wide range of durable materials, shapes and sizes.</p>
\t\t\t    \t\t<a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "franke", "url" => "sinks-and-taps-kitchen-sinks")), "html", null, true);
        echo "\" class=\"button right ui-button-green\">More Details</a>
\t\t\t    \t</div>
\t\t\t    \t<div class=\"slider-element\">
\t\t\t\t    \t<a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "bosch", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/bosch-dishwashers.jpg"), "html", null, true);
        echo "\" alt=\"Bosch Dishwashers\" /></a>
\t\t\t\t    \t<h3 class=\"left\">Bosch Dishwashers</a></h3>
\t\t\t\t    \t<p class=\"left\">ActiveWater dishwashers use less water. With water consumption at an all time high, it is important to choose a dishwasher that helps preserve this precious resource.</p>
\t\t\t\t    \t<a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "bosch", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\" class=\"button left ui-button-green\">More Details</a>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"slider-element\">
\t\t\t\t    \t<a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "abode", "url" => "sinks-and-taps-kitchen-taps")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/abode-taps.jpg"), "html", null, true);
        echo "\" alt=\"Abode Taps\" /></a>
\t\t\t\t    \t<h3 class=\"right\">Abode Taps</h3>
\t\t\t\t    \t<p class=\"right\">The Abode contemporary kitchen mixer range combines precision perfect engineering with stunning design. Clean lines and effortless control epitomise style and quality… beautifully.</p>
\t\t\t\t    \t<a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "abode", "url" => "sinks-and-taps-kitchen-taps")), "html", null, true);
        echo "\" class=\"button right ui-button-green\">More Details</a>
\t\t\t\t    </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"slider-navigation-container\">
\t\t\t\t\t<div id=\"slider_gallery_navigation\" class=\"slider-navigation\"></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</header>
\t</div>
";
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        // line 41
        echo "\t<section class=\"container_6 clearfix no-padding-top\">
\t\t";
        // line 81
        echo "\t\t<div class=\"grid_6 leading\">
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Popular Departments</h2>
\t            </header>
\t\t\t\t<section class=\"no-padding-bottom\">
\t\t\t\t\t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\">Washing Machines and Dryers</a></h4>
\t\t        \t\t<a href=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/washing-machines-and-dryers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Washing Machines and Dryers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "fridges-and-freezers")), "html", null, true);
        echo "\">Fridges and Freezers</a></h4>
\t\t        \t\t<a href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "fridges-and-freezers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/fridges-and-freezers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Fridges and Freezers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\">Dishwashers</a></h4>
\t\t        \t\t<a href=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/dishwashers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Dishwashers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department no-margin-right\">
\t\t        \t\t<h4><a href=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cookers-and-ovens")), "html", null, true);
        echo "\">Cookers and Ovens</a></h4>
\t\t        \t\t<a href=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cookers-and-ovens")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/cookers-and-ovens.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Cookers and Ovens\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "hobs")), "html", null, true);
        echo "\">Hobs</a></h4>
\t\t        \t\t<a href=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "hobs")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/hobs.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Hobs\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cooker-hoods")), "html", null, true);
        echo "\">Cooker Hoods</a></h4>
\t\t        \t\t<a href=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cooker-hoods")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/cooker-hoods.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Cooker Hoods\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "sinks-and-taps")), "html", null, true);
        echo "\">Sinks and Taps</a></h4>
\t\t        \t\t<a href=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "sinks-and-taps")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/sinks-and-taps.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Sinks and Taps\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department no-margin-right\">
\t\t        \t\t<h4><a href=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "compact-appliances")), "html", null, true);
        echo "\">Compact Appliances</a></h4>
\t\t        \t\t<a href=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "compact-appliances")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/compact-appliances.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Compact Appliances\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"clear\"></div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 126
    public function block_javascripts($context, array $blocks = array())
    {
        // line 127
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t\$(\".special-offer .features-link\").click(function() {
\t\t\t\tif (\$(this).html() == '+ Show Features')
\t\t\t\t{
\t\t\t\t\t\$(\".special-offer .features-link\").html('- Hide Features');
\t\t\t\t\t\$(\".special-offer .features\").slideDown();
\t\t\t\t} else {
\t\t\t\t\t\$(\".special-offer .features-link\").html('+ Show Features');
\t\t\t\t\t\$(\".special-offer .features\").slideUp();
\t\t\t\t}
\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:System:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 369,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 196,  501 => 194,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 49,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 41,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 99,  273 => 228,  263 => 107,  246 => 100,  234 => 197,  217 => 69,  173 => 104,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 177,  207 => 152,  143 => 71,  157 => 46,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 256,  271 => 104,  253 => 212,  233 => 204,  226 => 64,  187 => 61,  150 => 114,  260 => 91,  155 => 45,  223 => 179,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 111,  174 => 68,  182 => 72,  175 => 55,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 151,  114 => 26,  208 => 92,  183 => 75,  166 => 119,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 227,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 149,  170 => 143,  210 => 93,  180 => 55,  172 => 54,  168 => 52,  149 => 96,  139 => 114,  240 => 99,  230 => 93,  121 => 41,  257 => 225,  249 => 74,  106 => 79,  334 => 283,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 101,  167 => 127,  160 => 50,  45 => 15,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 319,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 127,  216 => 95,  213 => 117,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 354,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 223,  261 => 228,  247 => 208,  243 => 211,  238 => 107,  220 => 79,  201 => 113,  194 => 148,  130 => 45,  100 => 43,  85 => 34,  76 => 23,  112 => 30,  101 => 33,  98 => 37,  272 => 118,  269 => 108,  228 => 126,  221 => 93,  197 => 112,  184 => 60,  138 => 107,  118 => 92,  105 => 23,  66 => 17,  56 => 21,  115 => 39,  83 => 59,  164 => 44,  140 => 41,  58 => 6,  21 => 4,  61 => 24,  36 => 3,  209 => 116,  205 => 174,  196 => 66,  192 => 81,  189 => 109,  178 => 145,  176 => 69,  165 => 101,  161 => 100,  152 => 88,  148 => 55,  141 => 93,  134 => 79,  132 => 47,  127 => 74,  123 => 23,  109 => 38,  90 => 20,  54 => 12,  133 => 104,  124 => 42,  111 => 87,  107 => 39,  80 => 31,  69 => 22,  60 => 15,  52 => 6,  97 => 72,  95 => 37,  88 => 27,  78 => 30,  75 => 29,  71 => 19,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 343,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 186,  241 => 89,  236 => 187,  222 => 96,  218 => 105,  159 => 117,  154 => 43,  151 => 43,  145 => 77,  136 => 100,  128 => 30,  125 => 88,  119 => 34,  110 => 40,  96 => 30,  93 => 35,  91 => 37,  68 => 18,  65 => 12,  63 => 25,  43 => 14,  50 => 18,  25 => 8,  92 => 28,  86 => 25,  79 => 18,  46 => 9,  37 => 4,  33 => 9,  27 => 2,  82 => 24,  72 => 22,  64 => 16,  53 => 37,  49 => 14,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 5,  19 => 2,  40 => 12,  20 => 2,  30 => 12,  26 => 3,  22 => 3,  224 => 65,  215 => 173,  211 => 178,  204 => 61,  200 => 111,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 108,  179 => 92,  177 => 105,  171 => 120,  162 => 62,  158 => 132,  156 => 57,  153 => 97,  146 => 89,  142 => 52,  137 => 92,  131 => 31,  126 => 92,  120 => 22,  117 => 50,  103 => 27,  99 => 67,  77 => 54,  74 => 21,  57 => 13,  47 => 15,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 48,  129 => 89,  122 => 72,  116 => 81,  113 => 41,  108 => 36,  104 => 35,  102 => 17,  94 => 21,  89 => 40,  87 => 19,  84 => 18,  81 => 27,  73 => 28,  70 => 17,  67 => 20,  62 => 41,  59 => 37,  55 => 14,  51 => 15,  48 => 26,  41 => 5,  38 => 12,  35 => 16,  31 => 5,  28 => 4,);
    }
}
