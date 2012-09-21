<?php

/* WebIlluminationAdminBundle:Products:updateUniqueProductIdentifiers.html.twig */
class __TwigTemplate_0aa6158166e98cea70d9e967b29ed0ff extends Twig_Template
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
        echo "<section id=\"unique-product-identifiers\" class=\"form ui-helper-hidden\">
\t<h2>Unique Product Identifiers</h2>
\t<div id=\"unique-product-identifiers-confirm-leave\" class=\"ui-widget message ui-helper-hidden\">
\t    <div class=\"ui-state-error ui-corner-all\">
\t    \t<span class=\"ui-icon ui-icon-help\"></span>
\t        <p><strong>WARNING:</strong> You are about to leave this section and you have made changes without updating. Do you want to update before you leave?</p>
\t        <p>
\t        \t<button class=\"button action-update-unique-product-identifiers-section ui-button-green\" data-icon-primary=\"ui-icon-check\">Update</button>
\t        \t<button class=\"button ui-button-red action-leave-unique-product-identifiers\" data-icon-primary=\"ui-icon-closethick\">Continue Without Updating</button>
\t        \t<input type=\"hidden\" value=\"-1\" id=\"unique-product-identifiers-tab-to-redirect-to\" />
\t        \t<input type=\"hidden\" value=\"0\" id=\"unique-product-identifiers-requires-update\" />
\t        </p>
\t    </div>
\t    <div class=\"spacer\"></div>
\t</div>
\t<div class=\"ui-widget info-message\">
\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p>Unique product identifiers uniquely identify a product and are important for the search and comparison engines as it helps them place the product in the best positions. Unique product identifiers also allow users of the site to search for products without having to know your own product code.</p>
\t\t</div>
\t</div>
\t<div class=\"clearfix\">
        <label for=\"form-manufacturer-part-number\" title=\"Product code used by the manufacturer of a product if different to your product code\" class=\"form-label\">MPN<small>Manufacturer Part Number</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-mpn\" class=\"uppercase\" name=\"mpn\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "mpn"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-ean\" title=\"Used in Europe and is a 13 or 14 digit barcode\" class=\"form-label\">EAN<small>European Article Number</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-ean\" class=\"uppercase integer\" name=\"ean\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "ean"), "html", null, true);
        echo "\" maxlength=\"14\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-upc\" title=\"Used in North America a UPC and is a 12 digit barcode\" class=\"form-label\">UPC<small>Universal Product Code</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-upc\" class=\"uppercase integer\" name=\"upc\" value=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "upc"), "html", null, true);
        echo "\" maxlength=\"12\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-jan\" title=\"Used in Japan only and is an 8 or 13 digit barcode\" class=\"form-label\">JAN<small>Japanese Article Number</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-jan\" class=\"uppercase integer\" name=\"jan\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "jan"), "html", null, true);
        echo "\" maxlength=\"13\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-isbn\" title=\"Used to identify books only and is a 10 or 13 digit number\" class=\"form-label\">ISBN<small>International Standard Book Number</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-isbn\" class=\"uppercase integer\" name=\"isbn\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "data"), "product"), "isbn"), "html", null, true);
        echo "\" maxlength=\"13\" /></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
        \t<button class=\"button ui-button-green action-update-unique-product-identifiers-section\" data-icon-primary=\"ui-icon-check\">Update</button>
        \t<button class=\"button ui-button-blue action-lookup-unique-product-identifiers\" data-icon-primary=\"ui-icon-note\">Lookup Unique Product Identifiers</button>
        </div>
    </div>
    <div id=\"dialog-unique-product-identifier\" title=\"Lookup Unique Product Identifiers\" class=\"ui-helper-hidden\">
    \t<div class=\"ui-widget info-message\">
\t\t\t<div class=\"ui-state-highlight ui-corner-all\">
\t\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t\t<p>Below is a list of unique product identifiers being used by your competitors. If you would to like use one simply select what type of identifier you would like to use and click the \"Use\" button.</p>
\t\t\t</div>
\t\t</div>
\t\t<div id=\"unique-product-identifier-error-message\" class=\"ui-widget message ui-helper-hidden\">
\t\t    <div class=\"ui-state-error ui-corner-all\">
\t\t    \t<span class=\"ui-icon ui-icon-alert\"></span>
\t\t        <p>Sorry, we could not find any Unique Product Identifiers on the Internet that match this product. Please contact the manufacturer or supplier for this information.</p>
\t\t    </div>
\t\t</div>\t
\t\t";
        // line 61
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "productSearch")) > 0)) {
            // line 62
            echo "\t\t\t<div id=\"listing-unique-product-identifiers\" class=\"listing ui-helper-hidden\">
\t\t\t\t<table width=\"100%\" class=\"data-table\" id=\"data-unique-product-identifiers\"> 
\t\t\t\t    <thead> 
\t\t\t\t        <tr> 
\t\t\t\t            <th class=\"al\">Competitor</th> 
\t\t\t\t            <th class=\"ac\">Unique Product Identifier</th> 
\t\t\t\t            <th class=\"ac\">Type</th> 
\t\t\t\t            <th width=\"1\" class=\"ac\">&nbsp;</th> 
\t\t\t\t        </tr> 
\t\t\t\t    </thead> 
\t\t\t\t    <tbody>
\t\t\t\t    \t";
            // line 73
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "productSearch"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["upi"]) {
                // line 74
                echo "\t\t\t\t    \t\t";
                if ($this->getAttribute($this->getAttribute($this->getContext($context, "upi", true), "product", array(), "any", false, true), "gtin", array(), "any", true, true)) {
                    // line 75
                    echo "\t\t\t\t\t    \t\t<tr>
\t\t\t\t\t    \t\t\t<td class=\"al\"><strong>";
                    // line 76
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "upi", true), "product", array(), "any", false, true), "author", array(), "any", false, true), "name", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "author"), "name"), "html", null, true);
                    } else {
                        echo "Unknown";
                    }
                    echo "</strong>";
                    if ($this->getAttribute($this->getAttribute($this->getContext($context, "upi", true), "product", array(), "any", false, true), "title", array(), "any", true, true)) {
                        echo "<br />";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "title"), "html", null, true);
                    }
                    echo "</td>
\t\t\t\t\t    \t\t\t<td class=\"ac\"><input class=\"ac\" type=\"text\" id=\"unique-product-identifier-";
                    // line 77
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin"), "html", null, true);
                    echo "\" /></td>
\t\t\t\t\t    \t\t\t<td class=\"ac\">
\t\t\t\t\t    \t\t\t\t<select class=\"ac\" id=\"unique-product-identifier-type-";
                    // line 79
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\">
\t\t\t\t\t    \t\t\t\t\t";
                    // line 80
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 8)) {
                        // line 81
                        echo "\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-jan\">JAN</option>
\t\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 10)) {
                        // line 83
                        echo "\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-isbn\">ISBN</option>
\t\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 12)) {
                        // line 85
                        echo "\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-upc\">UPC</option>
\t\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 13)) {
                        // line 87
                        echo "\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-ean\">EAN</option>
\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-isbn\">ISBN</option>
\t\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 14)) {
                        // line 90
                        echo "\t\t\t\t\t\t    \t\t\t\t\t<option value=\"form-ean\">EAN</option>
\t\t\t\t\t\t    \t\t\t\t";
                    }
                    // line 92
                    echo "\t\t\t\t\t\t    \t\t\t\t<option value=\"form-mpn\">MPN</option>
\t\t\t\t\t    \t\t\t\t</select>
\t\t\t\t\t    \t\t\t</td>
\t\t\t\t\t    \t\t\t<td width=\"1\" class=\"ac\"><button rel=\"";
                    // line 95
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"button ui-button-blue action-load-unique-product-identifier\" data-icon-primary=\"ui-icon-tag\">Use</button></td>
\t\t\t\t\t    \t\t</tr>
\t\t\t\t    \t\t";
                }
                // line 98
                echo "\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['upi'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 99
            echo "\t\t\t\t    </tbody> 
\t\t\t\t</table>
\t\t\t</div>
\t\t";
        }
        // line 103
        echo "\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:updateUniqueProductIdentifiers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  644 => 211,  600 => 205,  593 => 203,  584 => 197,  569 => 192,  455 => 153,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 358,  510 => 227,  472 => 207,  456 => 202,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 124,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 160,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 366,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 162,  373 => 163,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 122,  229 => 67,  206 => 70,  147 => 119,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 161,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 128,  366 => 159,  340 => 160,  503 => 223,  488 => 159,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 191,  416 => 185,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 129,  301 => 85,  298 => 100,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 90,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 202,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 85,  423 => 167,  419 => 166,  411 => 215,  407 => 182,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 132,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 87,  210 => 103,  180 => 128,  172 => 132,  168 => 54,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 88,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 131,  286 => 76,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 100,  181 => 86,  167 => 86,  160 => 79,  45 => 12,  487 => 199,  481 => 155,  479 => 117,  477 => 430,  468 => 154,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 156,  352 => 100,  338 => 235,  333 => 71,  327 => 138,  324 => 170,  320 => 168,  297 => 118,  274 => 126,  256 => 86,  254 => 74,  252 => 122,  231 => 106,  216 => 63,  213 => 175,  202 => 169,  458 => 139,  453 => 177,  448 => 149,  437 => 172,  434 => 87,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 117,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 68,  194 => 163,  130 => 95,  100 => 74,  85 => 54,  76 => 18,  112 => 79,  101 => 34,  98 => 33,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 51,  184 => 95,  138 => 84,  118 => 93,  105 => 35,  66 => 11,  56 => 32,  115 => 63,  83 => 59,  164 => 80,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 173,  205 => 169,  196 => 93,  192 => 63,  189 => 106,  178 => 59,  176 => 57,  165 => 127,  161 => 49,  152 => 79,  148 => 47,  141 => 105,  134 => 54,  132 => 76,  127 => 93,  123 => 46,  109 => 73,  90 => 30,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 12,  60 => 9,  52 => 7,  97 => 38,  95 => 33,  88 => 66,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 72,  425 => 371,  420 => 68,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 144,  335 => 143,  321 => 137,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 124,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 105,  159 => 32,  154 => 76,  151 => 73,  145 => 77,  136 => 100,  128 => 102,  125 => 63,  119 => 38,  110 => 38,  96 => 62,  93 => 34,  91 => 33,  68 => 48,  65 => 12,  63 => 36,  43 => 25,  50 => 5,  25 => 50,  92 => 30,  86 => 61,  79 => 54,  46 => 5,  37 => 20,  33 => 12,  27 => 9,  82 => 19,  72 => 31,  64 => 35,  53 => 11,  49 => 28,  44 => 11,  42 => 24,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 6,  22 => 2,  224 => 65,  215 => 73,  211 => 101,  204 => 99,  200 => 111,  195 => 47,  193 => 160,  190 => 98,  188 => 146,  185 => 99,  179 => 92,  177 => 146,  171 => 76,  162 => 83,  158 => 81,  156 => 80,  153 => 47,  146 => 42,  142 => 56,  137 => 55,  131 => 58,  126 => 74,  120 => 45,  117 => 59,  103 => 71,  99 => 36,  77 => 18,  74 => 53,  57 => 15,  47 => 9,  39 => 10,  32 => 9,  24 => 6,  17 => 1,  135 => 64,  129 => 75,  122 => 76,  116 => 32,  113 => 36,  108 => 84,  104 => 30,  102 => 27,  94 => 61,  89 => 65,  87 => 31,  84 => 48,  81 => 24,  73 => 50,  70 => 40,  67 => 18,  62 => 17,  59 => 11,  55 => 8,  51 => 7,  48 => 12,  41 => 4,  38 => 3,  35 => 7,  31 => 14,  28 => 6,);
    }
}
