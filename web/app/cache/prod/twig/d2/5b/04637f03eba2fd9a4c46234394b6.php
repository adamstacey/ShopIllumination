<?php

/* WebIlluminationAdminBundle:Orders:listingDeliveryInformation.html.twig */
class __TwigTemplate_d25b04637f03eba2fd9a4c46234394b6 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-delivery-information-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<h5 class=\"no-margin-top\">Delivery Information</h5>
\t";
        // line 3
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 4
            echo "\t\t<p class=\"important padding-top-5 padding-bottom-5\">Order for collection only</p>
\t";
        } else {
            // line 6
            echo "\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Estimated Delivery:</label></td>
\t\t\t\t<td colspan=\"3\" width=\"80%\">Estimated delivery between <strong>";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "estimatedDeliveryDateRangeStart"), "html", null, true);
            echo "</strong> and <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "estimatedDeliveryDateRangeEnd"), "html", null, true);
            echo "</strong> subject to availability.</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Type:</label></td>
\t\t\t\t<td width=\"30%\">";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryType"), "html", null, true);
            echo "</td>
\t\t\t\t<td rowspan=\"3\" class=\"label\" width=\"20%\"><label>Deliver To:</label></td>
\t\t\t\t<td rowspan=\"3\" width=\"30%\" class=\"uppercase\">";
            // line 15
            ob_start();
            // line 16
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 17
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 18
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 20
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 21
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 22
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 24
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t";
            // line 25
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 26
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t";
            }
            // line 28
            echo "\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
            echo "
\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 29
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Charge:</label></td>
\t\t\t\t<td width=\"20%\">&pound;";
            // line 33
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label>Delivery Post Code:</label></td>
\t\t\t\t<td width=\"20%\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t</table>
\t";
        }
        // line 41
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingDeliveryInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 192,  466 => 190,  457 => 185,  451 => 181,  436 => 170,  422 => 165,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 151,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 327,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 313,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 289,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 281,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 270,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 212,  511 => 210,  505 => 207,  501 => 205,  499 => 204,  496 => 203,  493 => 202,  483 => 197,  480 => 197,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 167,  418 => 166,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 153,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 146,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 64,  227 => 47,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 719,  778 => 704,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 565,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 100,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 90,  276 => 119,  262 => 99,  235 => 80,  232 => 79,  212 => 97,  207 => 44,  143 => 57,  157 => 69,  366 => 278,  340 => 255,  503 => 130,  488 => 200,  475 => 194,  471 => 418,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 155,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 133,  271 => 87,  253 => 110,  233 => 105,  226 => 102,  187 => 65,  150 => 65,  260 => 82,  155 => 123,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 66,  258 => 83,  248 => 109,  242 => 107,  239 => 70,  237 => 107,  174 => 78,  182 => 82,  175 => 62,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 202,  491 => 200,  432 => 170,  203 => 74,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 205,  363 => 157,  359 => 154,  355 => 201,  351 => 200,  347 => 150,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 175,  265 => 116,  251 => 111,  199 => 91,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 40,  168 => 60,  149 => 50,  139 => 44,  240 => 106,  230 => 104,  121 => 31,  257 => 222,  249 => 60,  106 => 40,  334 => 142,  294 => 125,  286 => 121,  277 => 118,  255 => 111,  244 => 82,  214 => 76,  198 => 90,  181 => 82,  167 => 74,  160 => 54,  45 => 9,  487 => 200,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 171,  424 => 167,  415 => 165,  392 => 162,  385 => 268,  376 => 261,  367 => 158,  360 => 156,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 223,  297 => 126,  274 => 117,  256 => 75,  254 => 204,  252 => 112,  231 => 67,  216 => 51,  213 => 97,  202 => 92,  458 => 109,  453 => 97,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 160,  391 => 159,  387 => 209,  384 => 62,  322 => 139,  318 => 138,  300 => 128,  296 => 125,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 71,  243 => 110,  238 => 69,  220 => 26,  201 => 43,  194 => 88,  130 => 49,  100 => 22,  85 => 26,  76 => 31,  112 => 35,  101 => 39,  98 => 38,  272 => 118,  269 => 172,  228 => 105,  221 => 77,  197 => 70,  184 => 64,  138 => 34,  118 => 40,  105 => 36,  66 => 21,  56 => 21,  115 => 29,  83 => 25,  164 => 73,  140 => 47,  58 => 15,  21 => 4,  61 => 23,  36 => 3,  209 => 95,  205 => 75,  196 => 72,  192 => 77,  189 => 86,  178 => 81,  176 => 41,  165 => 75,  161 => 53,  152 => 66,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 48,  123 => 46,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 42,  111 => 38,  107 => 35,  80 => 32,  69 => 30,  60 => 16,  52 => 16,  97 => 29,  95 => 37,  88 => 35,  78 => 24,  75 => 25,  71 => 30,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 123,  282 => 89,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 102,  218 => 100,  159 => 54,  154 => 67,  151 => 66,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 45,  110 => 37,  96 => 34,  93 => 36,  91 => 28,  68 => 29,  65 => 20,  63 => 17,  43 => 13,  50 => 16,  25 => 4,  92 => 36,  86 => 22,  79 => 32,  46 => 13,  37 => 4,  33 => 3,  27 => 2,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 6,  44 => 15,  42 => 7,  34 => 9,  29 => 6,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 101,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 88,  190 => 76,  188 => 86,  185 => 84,  179 => 48,  177 => 61,  171 => 77,  162 => 36,  158 => 69,  156 => 41,  153 => 52,  146 => 49,  142 => 46,  137 => 46,  131 => 44,  126 => 47,  120 => 45,  117 => 41,  103 => 33,  99 => 19,  77 => 31,  74 => 20,  57 => 17,  47 => 27,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 43,  122 => 46,  116 => 39,  113 => 43,  108 => 41,  104 => 40,  102 => 39,  94 => 21,  89 => 31,  87 => 30,  84 => 34,  81 => 33,  73 => 31,  70 => 21,  67 => 29,  62 => 16,  59 => 18,  55 => 17,  51 => 16,  48 => 15,  41 => 5,  38 => 4,  35 => 5,  31 => 8,  28 => 11,);
    }
}
