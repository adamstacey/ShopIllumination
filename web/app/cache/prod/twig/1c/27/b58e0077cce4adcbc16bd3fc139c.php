<?php

/* WebIlluminationAdminBundle:ProductsOld:sectionDimensions.html.twig */
class __TwigTemplate_1c27b58e0077cce4adcbc16bd3fc139c extends Twig_Template
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
        echo "<section id=\"dimensions\">
\t<div class=\"info-message ui-status-highlight\">
\t\t<span class=\"info-message-icon ui-icon ui-icon-info\"></span>
\t\t<p>In order to calculate the most accurate costings and timings for deliveries it is important to include the latest dimensions of a product.</p>
\t\t<div class=\"clear\"></div>
\t</div>
    <div class=\"clearfix\">
        <label for=\"form-weight\" class=\"form-label\">Weight<small>Enter a weight (kg)</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-weight\" class=\"decimal\" name=\"weight\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "weight"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-length\" class=\"form-label\">Length<small>Enter the boxed length of the product (mm)</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-length\" class=\"decimal\" name=\"length\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "length"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-width\" class=\"form-label\">Width<small>Enter the boxed width of the product (mm)</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-width\" class=\"decimal\" name=\"width\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "width"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <label for=\"form-height\" class=\"form-label\">Height<small>Enter the boxed height of the product (mm)</small></label>
        <div class=\"form-input\"><input type=\"text\" id=\"form-height\" class=\"decimal\" name=\"height\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "height"), "html", null, true);
        echo "\" /></div>
    </div>
    <div class=\"clearfix\">
        <div class=\"form-input buttons no-margin-bottom\">
    \t\t<button class=\"button ui-button-default\">Save</button>
    \t\t<a class=\"button action-unit-converter\" href=\"Javascript:void(0);\">Unit Converter</a>
        </div>
    </div>
    ";
        // line 30
        echo "\t<div id=\"dialog-unit-converter\" title=\"Unit Converter\" class=\"form ui-helper-hidden\">
\t\t<p>Enter the values you would like converting and click the \"Save\" button.</p>
        <div class=\"clearfix\">
            <label for=\"form-weight-conversion\" class=\"form-label\">Weight<small>Enter a weight</small></label>
            <div class=\"form-input\">
            \t<input type=\"text\" id=\"form-weight-conversion\" class=\"decimal\" name=\"weight\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "weight"), "html", null, true);
        echo "\" />
            \t<select id=\"form-weight-unit\">
            \t\t<option value=\"0.45359\">Pounds (lbs)</option>
            \t\t<option value=\"0.028349\">Ounces (oz)</option>
            \t\t<option value=\"0.001\">Grams (g)</option>
            \t\t<option value=\"0.000001\">Milligrams (mg)</option>
            \t\t<option value=\"0.0002\">Carat</option>
            \t\t<option value=\"6.35\">Stone</option>
            \t</select>
            </div>
        </div>
        <div class=\"clearfix\">
            <label for=\"form-length-conversion\" class=\"form-label\">Length<small>Enter the boxed length of the product</small></label>
            <div class=\"form-input\">
            \t<input type=\"text\" id=\"form-length-conversion\" class=\"decimal\" name=\"length\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "length"), "html", null, true);
        echo "\" />
            \t<select id=\"form-length-unit\">
            \t\t<option value=\"10\">Centimetres (cm)</option>
            \t\t<option value=\"1000\">Metres (m)</option>
            \t\t<option value=\"25.4\">Inches (in)</option>
            \t\t<option value=\"304.8\">Foot (ft)</option>
            \t\t<option value=\"914.4\">Yard (yd)</option>
            \t</select>
            </div>
        </div>
        <div class=\"clearfix\">
            <label for=\"form-width-conversion\" class=\"form-label\">Width<small>Enter the boxed width of the product</small></label>
            <div class=\"form-input\">
            \t<input type=\"text\" id=\"form-width-conversion\" class=\"decimal\" name=\"width\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "width"), "html", null, true);
        echo "\" />
            \t<select id=\"form-width-unit\">
            \t\t<option value=\"10\">Centimetres (cm)</option>
            \t\t<option value=\"1000\">Metres (m)</option>
            \t\t<option value=\"25.4\">Inches (in)</option>
            \t\t<option value=\"304.8\">Foot (ft)</option>
            \t\t<option value=\"914.4\">Yard (yd)</option>
            \t</select>
            </div>
        </div>
        <div class=\"clearfix\">
            <label for=\"form-height-conversion\" class=\"form-label\">Height<small>Enter the boxed height of the product</small></label>
            <div class=\"form-input\">
            \t<input type=\"text\" id=\"form-height-conversion\" class=\"decimal\" name=\"height\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "height"), "html", null, true);
        echo "\" />
            \t<select id=\"form-height-unit\">
            \t\t<option value=\"10\">Centimetres (cm)</option>
            \t\t<option value=\"1000\">Metres (m)</option>
            \t\t<option value=\"25.4\">Inches (in)</option>
            \t\t<option value=\"304.8\">Foot (ft)</option>
            \t\t<option value=\"914.4\">Yard (yd)</option>
            \t</select>
            </div>
        </div>
\t</div>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t
\t\t\t";
        // line 90
        echo "\t\t\t\$(\"#dialog-unit-converter\").dialog({
\t\t\t\tautoOpen: false,
\t\t\t\tmodal: true,
\t\t\t\twidth: 700,
\t\t\t\tshow: \"fade\",
\t\t\t\thide: \"fade\",
\t\t\t\tbuttons: [
    \t\t\t\t{
        \t\t\t\ttext: \"Save\",
        \t\t\t\tclick: function() {
        \t\t\t\t\t\$(\"#form-weight\").val(parseFloat(\$(\"#form-weight-conversion\").val()) * parseFloat(\$(\"#form-weight-unit\").val()));
\t\t\t\t\t\t\t\$(\"#form-length\").val(parseFloat(\$(\"#form-length-conversion\").val()) * parseFloat(\$(\"#form-length-unit\").val()));
\t\t\t\t\t\t\t\$(\"#form-width\").val(parseFloat(\$(\"#form-width-conversion\").val()) * parseFloat(\$(\"#form-width-unit\").val()));
\t\t\t\t\t\t\t\$(\"#form-height\").val(parseFloat(\$(\"#form-height-conversion\").val()) * parseFloat(\$(\"#form-height-unit\").val()));
        \t\t\t\t\t\$(this).dialog(\"close\");
        \t\t\t\t}
    \t\t\t\t}
\t\t\t\t]
\t\t\t}).parents('.ui-dialog').find(\".ui-dialog-titlebar-close\").after('<div/>');
\t\t\t
\t\t\t";
        // line 111
        echo "\t\t\t\$(\".action-unit-converter\").live('click', function() {
\t\t\t\t\$(\"#form-weight-conversion\").val(\$(\"#form-weight\").val());
\t\t\t\t\$(\"#form-length-conversion\").val(\$(\"#form-length\").val());
\t\t\t\t\$(\"#form-width-conversion\").val(\$(\"#form-width\").val());
\t\t\t\t\$(\"#form-height-conversion\").val(\$(\"#form-height\").val());
\t\t\t\t\$(\"#dialog-unit-converter\").dialog(\"open\");
\t\t\t\treturn false;
\t\t\t});
\t\t\t\t\t\t
\t\t\t";
        // line 121
        echo "\t\t\t";
        if ((((($this->getAttribute($this->getContext($context, "product"), "weight") <= 0) && ($this->getAttribute($this->getContext($context, "product"), "length") <= 0)) && ($this->getAttribute($this->getContext($context, "product"), "width") <= 0)) && ($this->getAttribute($this->getContext($context, "product"), "height") <= 0))) {
            // line 122
            echo "\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-error\");
\t\t\t";
        } elseif ((((($this->getAttribute($this->getContext($context, "product"), "weight") > 0) && ($this->getAttribute($this->getContext($context, "product"), "length") <= 0)) && ($this->getAttribute($this->getContext($context, "product"), "width") <= 0)) && ($this->getAttribute($this->getContext($context, "product"), "height") <= 0))) {
            // line 124
            echo "\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-highlight\");
\t\t\t";
        } else {
            // line 126
            echo "\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-success\");
\t\t\t";
        }
        // line 128
        echo "\t\t\t\$(\"#form-weight, #form-length, #form-width, #form-height\").change(function() {
\t\t\t\t\$(\"#tab-dimensions\").removeClass(\"ui-status-success\").removeClass(\"ui-status-highlight\").removeClass(\"ui-status-error\");
\t\t\t\tif ((parseFloat(\$(\"#form-weight\").val()) <= 0) && (parseFloat(\$(\"#form-length\").val()) <= 0) && (parseFloat(\$(\"#form-width\").val()) <= 0) && (parseFloat(\$(\"#form-height\").val()) <= 0))
\t\t\t\t{
\t\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-error\");
\t\t\t\t} else if ((parseFloat(\$(\"#form-weight\").val()) <= 0) && (parseFloat(\$(\"#form-length\").val()) <= 0) && (parseFloat(\$(\"#form-width\").val()) <= 0) && (parseFloat(\$(\"#form-height\").val()) <= 0)) {
\t\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-highlight\");
\t\t\t\t} else {
\t\t\t\t\t\$(\"#tab-dimensions\").addClass(\"ui-status-success\");
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t});
\t</script>
</section>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:ProductsOld:sectionDimensions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 165,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 174,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 181,  310 => 131,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 102,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 166,  278 => 120,  250 => 69,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 106,  361 => 156,  342 => 274,  329 => 94,  326 => 171,  319 => 90,  288 => 81,  229 => 67,  206 => 54,  147 => 76,  227 => 179,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 83,  234 => 79,  217 => 182,  173 => 142,  309 => 250,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 96,  232 => 78,  212 => 72,  207 => 44,  143 => 114,  157 => 46,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 99,  345 => 97,  306 => 248,  271 => 92,  253 => 85,  233 => 78,  226 => 64,  187 => 66,  150 => 36,  260 => 91,  155 => 48,  223 => 116,  186 => 103,  169 => 102,  301 => 85,  298 => 100,  292 => 82,  267 => 78,  258 => 84,  248 => 68,  242 => 89,  239 => 70,  237 => 80,  174 => 58,  182 => 60,  175 => 40,  144 => 75,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 53,  114 => 42,  208 => 57,  183 => 65,  166 => 122,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 104,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 92,  307 => 90,  303 => 109,  299 => 152,  295 => 87,  283 => 249,  279 => 78,  275 => 76,  265 => 155,  251 => 84,  199 => 90,  191 => 147,  170 => 57,  210 => 72,  180 => 128,  172 => 124,  168 => 122,  149 => 108,  139 => 50,  240 => 98,  230 => 93,  121 => 22,  257 => 71,  249 => 74,  106 => 63,  334 => 269,  294 => 83,  286 => 76,  277 => 241,  255 => 90,  244 => 67,  214 => 87,  198 => 68,  181 => 37,  167 => 50,  160 => 32,  45 => 24,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 103,  352 => 100,  338 => 235,  333 => 71,  327 => 194,  324 => 170,  320 => 168,  297 => 151,  274 => 80,  256 => 86,  254 => 74,  252 => 120,  231 => 88,  216 => 64,  213 => 175,  202 => 65,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 165,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 82,  238 => 196,  220 => 74,  201 => 58,  194 => 63,  130 => 29,  100 => 74,  85 => 11,  76 => 45,  112 => 45,  101 => 54,  98 => 53,  272 => 118,  269 => 237,  228 => 118,  221 => 176,  197 => 51,  184 => 55,  138 => 73,  118 => 21,  105 => 56,  66 => 35,  56 => 32,  115 => 75,  83 => 49,  164 => 100,  140 => 43,  58 => 6,  21 => 4,  61 => 18,  36 => 18,  209 => 85,  205 => 169,  196 => 57,  192 => 43,  189 => 54,  178 => 59,  176 => 126,  165 => 121,  161 => 49,  152 => 90,  148 => 30,  141 => 33,  134 => 42,  132 => 90,  127 => 47,  123 => 46,  109 => 58,  90 => 13,  54 => 13,  133 => 104,  124 => 24,  111 => 20,  107 => 35,  80 => 28,  69 => 33,  60 => 37,  52 => 20,  97 => 38,  95 => 33,  88 => 13,  78 => 19,  75 => 44,  71 => 42,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 154,  291 => 124,  287 => 123,  282 => 138,  268 => 94,  264 => 73,  259 => 150,  245 => 119,  241 => 66,  236 => 106,  222 => 62,  218 => 65,  159 => 130,  154 => 111,  151 => 109,  145 => 105,  136 => 103,  128 => 41,  125 => 47,  119 => 33,  110 => 86,  96 => 37,  93 => 74,  91 => 48,  68 => 26,  65 => 8,  63 => 38,  43 => 8,  50 => 6,  25 => 50,  92 => 17,  86 => 46,  79 => 36,  46 => 68,  37 => 20,  33 => 12,  27 => 9,  82 => 27,  72 => 18,  64 => 7,  53 => 21,  49 => 31,  44 => 10,  42 => 18,  34 => 13,  29 => 53,  23 => 3,  19 => 2,  40 => 3,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 73,  211 => 106,  204 => 98,  200 => 157,  195 => 73,  193 => 104,  190 => 62,  188 => 48,  185 => 47,  179 => 45,  177 => 52,  171 => 54,  162 => 44,  158 => 38,  156 => 31,  153 => 30,  146 => 110,  142 => 56,  137 => 55,  131 => 49,  126 => 91,  120 => 83,  117 => 43,  103 => 69,  99 => 62,  77 => 18,  74 => 27,  57 => 14,  47 => 20,  39 => 8,  32 => 13,  24 => 6,  17 => 1,  135 => 96,  129 => 49,  122 => 40,  116 => 70,  113 => 36,  108 => 44,  104 => 17,  102 => 40,  94 => 54,  89 => 57,  87 => 64,  84 => 11,  81 => 24,  73 => 18,  70 => 9,  67 => 40,  62 => 29,  59 => 30,  55 => 25,  51 => 70,  48 => 21,  41 => 17,  38 => 3,  35 => 17,  31 => 2,  28 => 11,);
    }
}