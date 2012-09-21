<?php

/* WebIlluminationAdminBundle:ProductsOld:sectionUniqueProductIdentifiers.html.twig */
class __TwigTemplate_66494deb049a9d78158a4644d0f04a84 extends Twig_Template
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
        echo "<section id=\"unique-product-identifiers\">
    <div class=\"info-message ui-status-highlight\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>Unique product identifiers uniquely identify a product and are important for the search and comparison engines as it helps them place the product in the best positions. Unique product identifiers also allow users of the site to search for products without having to know your own product code.</p>
\t\t<div class=\"clear\"></div>
\t</div>
    <div class=\"clearfix\">
        <label for=\"form-manufacturer-part-number\" title=\"Product code used by the manufacturer of a product if different to your product code\" class=\"form-label\">MPN<small>Manufacturer Part Number</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-mpn\" class=\"uppercase\" name=\"mpn\" value=\"\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-ean\" title=\"Used in Europe and is a 13 or 14 digit barcode\" class=\"form-label\">EAN<small>European Article Number</small></label>
        <div class=\"form-input\"><input type=\"number\" id=\"form-ean\" class=\"uppercase integer\" name=\"ean\" value=\"\" maxlength=\"14\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-upc\" title=\"Used in North America a UPC and is a 12 digit barcode\" class=\"form-label\">UPC<small>Universal Product Code</small></label>
        <div class=\"form-input\"><input type=\"number\" id=\"form-upc\" class=\"uppercase integer\" name=\"upc\" value=\"\" maxlength=\"12\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-jan\" title=\"Used in Japan only and is an 8 or 13 digit barcode\" class=\"form-label\">JAN<small>Japanese Article Number</small></label>
        <div class=\"form-input\"><input type=\"number\" id=\"form-jan\" class=\"uppercase integer\" name=\"jan\" value=\"\" maxlength=\"13\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-isbn\" title=\"Used to identify books only and is a 10 or 13 digit number\" class=\"form-label\">ISBN<small>International Standard Book Number</small></label>
        <div class=\"form-input\"><input type=\"number\" id=\"form-isbn\" class=\"uppercase integer\" name=\"isbn\" value=\"\" maxlength=\"13\" /></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
    \t\t<button class=\"button ui-button-default\">Save</button>
    \t\t<a class=\"button action-lookup-unique-product-identifiers\" href=\"Javascript:void(0);\">Lookup Unique Product Identifiers</a>
        </div>
    </div>
    ";
        // line 34
        echo "\t<div id=\"dialog-unique-product-identifier\" title=\"Lookup Unique Product Identifiers\" class=\"ui-helper-hidden\">
\t\t<div class=\"info-message ui-status-highlight\">
\t\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t\t<p>Below is a list of unique product identifiers being used by your competitors. If you would to like use one simply select what type of identifier you would like to use and click the \"Use\" button.</p>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t";
        // line 40
        if ((twig_length_filter($this->env, $this->getContext($context, "product_search")) > 0)) {
            // line 41
            echo "\t\t\t<table class=\"display\" id=\"data-unique-product-identifiers\"> 
\t\t\t    <thead> 
\t\t\t        <tr> 
\t\t\t            <th class=\"left\">Competitor</th> 
\t\t\t            <th>Unique Product Identifier</th> 
\t\t\t            <th>Type</th> 
\t\t\t            <th>&nbsp;</th> 
\t\t\t        </tr> 
\t\t\t    </thead> 
\t\t\t    <tbody>
\t\t\t    \t";
            // line 51
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "product_search"));
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
                // line 52
                echo "\t\t\t    \t\t";
                if ($this->getAttribute($this->getAttribute($this->getContext($context, "upi", true), "product", array(), "any", false, true), "gtin", array(), "any", true, true)) {
                    // line 53
                    echo "\t\t\t\t    \t\t<tr>
\t\t\t\t    \t\t\t<td>";
                    // line 54
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "upi", true), "product", array(), "any", false, true), "author", array(), "any", false, true), "name", array(), "any", true, true)) {
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "author"), "name"), "html", null, true);
                    } else {
                        echo "Unknown";
                    }
                    echo "</td>
\t\t\t\t    \t\t\t<td class=\"center\"><input type=\"text\" id=\"unique-product-identifier-";
                    // line 55
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin"), "html", null, true);
                    echo "\" /></td>
\t\t\t\t    \t\t\t<td class=\"center\">
\t\t\t\t    \t\t\t\t<select id=\"unique-product-identifier-type-";
                    // line 57
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\">
\t\t\t\t    \t\t\t\t\t";
                    // line 58
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 8)) {
                        // line 59
                        echo "\t\t\t\t\t    \t\t\t\t\t<option value=\"form-jan\">JAN</option>
\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 10)) {
                        // line 61
                        echo "\t\t\t\t\t    \t\t\t\t\t<option value=\"form-isbn\">ISBN</option>
\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 12)) {
                        // line 63
                        echo "\t\t\t\t\t    \t\t\t\t\t<option value=\"form-upc\">UPC</option>
\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 13)) {
                        // line 65
                        echo "\t\t\t\t\t    \t\t\t\t\t<option value=\"form-ean\">EAN</option>
\t\t\t\t\t    \t\t\t\t\t<option value=\"form-isbn\">ISBN</option>
\t\t\t\t\t    \t\t\t\t";
                    } elseif ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "upi"), "product"), "gtin")) == 14)) {
                        // line 68
                        echo "\t\t\t\t\t    \t\t\t\t\t<option value=\"form-ean\">EAN</option>
\t\t\t\t\t    \t\t\t\t";
                    }
                    // line 70
                    echo "\t\t\t\t\t    \t\t\t\t<option value=\"form-mpn\">MPN</option>
\t\t\t\t    \t\t\t\t</select>
\t\t\t\t    \t\t\t</td>
\t\t\t\t    \t\t\t<td class=\"center\"><button rel=\"";
                    // line 73
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" class=\"button action-load-unique-product-identifier\">Use</button></td>
\t\t\t\t    \t\t</tr>
\t\t\t    \t\t";
                }
                // line 76
                echo "\t\t\t\t\t";
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
            // line 77
            echo "\t\t\t    </tbody> 
\t\t\t</table>
\t\t";
        } else {
            // line 80
            echo "\t\t    <div class=\"product-warning ui-status-error no-margin-bottom\">
\t\t\t\t<span class=\"product-warning-icon ui-icon ui-icon-circle-close\"></span>
\t\t\t\t<p>Sorry, we could not find any Unique Product Identifiers on the Internet that match the product code for this product.<br />Please contact the supplier for this information.</p>
\t\t\t\t<div class=\"clear\"></div>
\t\t\t</div>
\t\t";
        }
        // line 86
        echo "\t</div>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t
\t\t\t";
        // line 91
        echo "\t\t\t\$(\".action-load-unique-product-identifier\").live('click', function() {
\t\t\t\t\$(\"#\"+\$(\"#unique-product-identifier-type-\"+\$(this).attr(\"rel\")).val()).val(\$(\"#unique-product-identifier-\"+\$(this).attr(\"rel\")).val());
\t\t\t\t\$(\"#dialog-unique-product-identifier\").dialog(\"close\");
\t\t\t});
\t\t\t
\t\t\t";
        // line 97
        echo "\t\t\t\$(\"#dialog-unique-product-identifier\").dialog({
\t\t\t\tautoOpen: false,
\t\t\t\tmodal: true,
\t\t\t\twidth: 900,
\t\t\t\tshow: \"fade\",
\t\t\t\thide: \"fade\",
\t\t\t\tbuttons: [
    \t\t\t\t{
        \t\t\t\ttext: \"Close\",
        \t\t\t\tclick: function() {
        \t\t\t\t\t\$(this).dialog(\"close\");
        \t\t\t\t}
    \t\t\t\t}
\t\t\t\t]
\t\t\t}).parents('.ui-dialog').find(\".ui-dialog-titlebar-close\").after('<div/>');
\t\t\t";
        // line 112
        if ((twig_length_filter($this->env, $this->getContext($context, "product_search")) > 0)) {
            // line 113
            echo "\t\t\t\t\$('#data-unique-product-identifiers').dataTable().fnDestroy();
\t\t\t\t\$('#data-unique-product-identifiers').dataTable({
\t\t\t\t\t\"bJQueryUI\": true,
\t\t\t\t\t\"sScrollY\": \"300px\",
\t\t\t\t\t\"bPaginate\": false,
\t\t\t\t\t\"aaSorting\": [[ 0, \"asc\" ]],
\t\t\t\t\t\"aoColumns\": [
\t\t\t\t\t\tnull,
\t\t\t\t\t\tnull,
\t\t\t\t\t\tnull,
\t\t\t\t\t\t{ \"bSortable\": false }
\t\t\t\t\t]
\t\t\t\t});
\t\t\t";
        }
        // line 127
        echo "\t\t\t\t
\t\t\t";
        // line 129
        echo "\t\t\t\$(\".action-lookup-unique-product-identifiers\").live('click', function() {
\t\t\t\t\$(\"#dialog-unique-product-identifier\").dialog(\"open\");
\t\t\t\t";
        // line 131
        if ((twig_length_filter($this->env, $this->getContext($context, "product_search")) > 0)) {
            // line 132
            echo "\t\t\t\t\t";
            // line 133
            echo "\t\t\t\t\t\$('#data-unique-product-identifiers').dataTable().fnDraw();
\t\t\t\t\t\$(\"#dialog-unique-product-identifier\").css(\"height\", \$(\"#dialog-unique-product-identifier\").height() + 10);
\t\t\t\t\t\$('#data-unique-product-identifiers').dataTable().fnDraw();
\t\t\t\t";
        }
        // line 137
        echo "\t\t\t\treturn false;
\t\t\t});
\t\t\t
\t\t\t\$(\"#form-mpn, #form-ean, #form-upc, #form-jan, #form-isbn\").change(function() {
\t\t\t\t\$(\"#tab-unique-product-identifiers\").removeClass(\"ui-status-success\").removeClass(\"ui-status-highlight\");
\t\t\t\tif ((\$(\"#form-mpn\").val() == \"\") && (\$(\"#form-ean\").val() == \"\") && (\$(\"#form-upc\").val() == \"\") && (\$(\"#form-jan\").val() == \"\") && (\$(\"#form-isbn\").val() == \"\"))
\t\t\t\t{
\t\t\t\t\t\$(\"#tab-unique-product-identifiers\").addClass(\"ui-status-highlight\");
\t\t\t\t} else {
\t\t\t\t\t\$(\"#tab-unique-product-identifiers\").addClass(\"ui-status-success\");
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t});
\t</script>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:ProductsOld:sectionUniqueProductIdentifiers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 166,  278 => 120,  250 => 69,  163 => 77,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 171,  319 => 90,  288 => 81,  229 => 67,  206 => 112,  147 => 76,  227 => 129,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 83,  234 => 79,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 78,  212 => 72,  207 => 44,  143 => 73,  157 => 46,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 85,  233 => 132,  226 => 64,  187 => 66,  150 => 44,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 89,  239 => 70,  237 => 80,  174 => 58,  182 => 91,  175 => 40,  144 => 75,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 42,  208 => 113,  183 => 65,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 147,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 80,  149 => 76,  139 => 50,  240 => 98,  230 => 93,  121 => 61,  257 => 71,  249 => 74,  106 => 63,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 68,  181 => 37,  167 => 50,  160 => 32,  45 => 24,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 120,  231 => 131,  216 => 64,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 165,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 82,  238 => 196,  220 => 74,  201 => 58,  194 => 63,  130 => 29,  100 => 74,  85 => 11,  76 => 45,  112 => 45,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 118,  221 => 176,  197 => 51,  184 => 55,  138 => 70,  118 => 21,  105 => 56,  66 => 35,  56 => 32,  115 => 58,  83 => 49,  164 => 100,  140 => 43,  58 => 6,  21 => 4,  61 => 41,  36 => 3,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 97,  178 => 59,  176 => 86,  165 => 121,  161 => 49,  152 => 90,  148 => 30,  141 => 33,  134 => 68,  132 => 33,  127 => 47,  123 => 46,  109 => 58,  90 => 52,  54 => 13,  133 => 104,  124 => 24,  111 => 57,  107 => 35,  80 => 28,  69 => 33,  60 => 37,  52 => 20,  97 => 38,  95 => 33,  88 => 13,  78 => 19,  75 => 44,  71 => 42,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 137,  236 => 106,  222 => 62,  218 => 65,  159 => 130,  154 => 111,  151 => 109,  145 => 105,  136 => 103,  128 => 41,  125 => 63,  119 => 32,  110 => 86,  96 => 54,  93 => 53,  91 => 48,  68 => 17,  65 => 8,  63 => 38,  43 => 8,  50 => 7,  25 => 50,  92 => 17,  86 => 46,  79 => 36,  46 => 68,  37 => 20,  33 => 12,  27 => 9,  82 => 21,  72 => 18,  64 => 12,  53 => 14,  49 => 31,  44 => 5,  42 => 18,  34 => 13,  29 => 2,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 12,  26 => 2,  22 => 4,  224 => 127,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 73,  193 => 104,  190 => 62,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 42,  142 => 56,  137 => 55,  131 => 49,  126 => 91,  120 => 83,  117 => 59,  103 => 69,  99 => 62,  77 => 18,  74 => 27,  57 => 14,  47 => 20,  39 => 4,  32 => 13,  24 => 6,  17 => 1,  135 => 96,  129 => 65,  122 => 40,  116 => 70,  113 => 36,  108 => 28,  104 => 55,  102 => 40,  94 => 25,  89 => 57,  87 => 64,  84 => 22,  81 => 24,  73 => 51,  70 => 9,  67 => 40,  62 => 29,  59 => 40,  55 => 25,  51 => 34,  48 => 13,  41 => 17,  38 => 3,  35 => 17,  31 => 2,  28 => 11,);
    }
}
