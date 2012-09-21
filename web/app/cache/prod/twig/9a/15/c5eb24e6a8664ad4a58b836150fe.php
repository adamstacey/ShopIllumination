<?php

/* WebIlluminationAdminBundle:System:contactEmailAddress.html.twig */
class __TwigTemplate_9a15c5eb24e6a8664ad4a58b836150fe extends Twig_Template
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
        echo "<li class=\"contact-email-address-container\" data-contact-id=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" id=\"contact-email-address-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tbody>
\t\t\t\t<tr>
\t\t\t\t\t<td width=\"9\">
\t\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"1\" class=\"delete\">
\t\t\t\t\t\t<input data-contact-id=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" type=\"checkbox\" class=\"contact-email-address-field contact-email-address-select\" id=\"form-contact-email-address-select-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"1\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"210\">
\t\t\t\t\t\t<select data-contact-id=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" autocomplete=\"off\" class=\"contact-email-address-field contact-email-address-contact-email-address-type-id full\" id=\"form-contact-email-address-contact-email-address-type-id-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\">
\t\t\t        \t\t<option value=\"\">- Select Email Address Type -</option>
\t\t\t        \t\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "contactEmailAddressTypes"));
        foreach ($context['_seq'] as $context["_key"] => $context["contactEmailAddressType"]) {
            // line 16
            echo "\t\t                \t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contactEmailAddressType"), "id"), "html", null, true);
            echo "\"";
            if ($this->getAttribute($this->getContext($context, "data", true), "contactEmailAddressTypeId", array(), "any", true, true)) {
                if (($this->getAttribute($this->getContext($context, "contactEmailAddressType"), "id") == $this->getAttribute($this->getContext($context, "data"), "contactEmailAddressTypeId"))) {
                    echo " selected=\"selected\"";
                }
            }
            echo ">";
            echo $this->getAttribute($this->getContext($context, "contactEmailAddressType"), "contactEmailAddressType");
            echo "</option>
\t\t            \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contactEmailAddressType'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 18
        echo "\t\t\t        \t</select>
\t\t\t\t\t</td>
\t\t\t\t\t<td>
\t\t\t        \t<input data-contact-id=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" type=\"email\" class=\"lowercase contact-email-address-field contact-email-address-email full\" placeholder=\"Email Address\" id=\"form-contact-email-address-email-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"";
        if ($this->getAttribute($this->getContext($context, "data", true), "email", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "email"), "html", null, true);
        }
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td width=\"1\">
\t\t\t\t\t\t<input type=\"hidden\" class=\"contact-email-address-display-order\" id=\"form-contact-email-address-display-order-";
        // line 24
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t<input type=\"hidden\" data-contact-id=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"contact-email-address-requires-update\" id=\"form-contact-email-address-requires-update-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t\t<input type=\"hidden\" data-contact-id=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"contact-email-address-id\" id=\"form-contact-email-address-id-";
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" value=\"";
        if ($this->getAttribute($this->getContext($context, "data", true), "id", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "data"), "id"), "html", null, true);
        } else {
            echo "0";
        }
        echo "\" />
\t\t\t\t\t\t<button data-contact-id=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getContext($context, "contactId"), "html", null, true);
        echo "\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "index"), "html", null, true);
        echo "\" class=\"button ui-button-red action-confirm-delete-contact-email-address\" data-icon-primary=\"ui-icon-closethick\" data-icon-only=\"true\">Delete</button>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</tbody>
\t\t</table>
\t</div>
</li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:contactEmailAddress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 213,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 192,  466 => 190,  457 => 185,  451 => 181,  436 => 171,  422 => 167,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 641,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 210,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 421,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 178,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 235,  276 => 119,  262 => 115,  235 => 80,  232 => 106,  212 => 174,  207 => 44,  143 => 57,  157 => 68,  366 => 158,  340 => 255,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 118,  253 => 110,  233 => 105,  226 => 103,  187 => 65,  150 => 65,  260 => 82,  155 => 67,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 224,  258 => 114,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 78,  182 => 82,  175 => 62,  144 => 119,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 202,  491 => 201,  432 => 375,  203 => 92,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 159,  363 => 157,  359 => 154,  355 => 201,  351 => 200,  347 => 150,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 119,  265 => 116,  251 => 218,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 53,  168 => 52,  149 => 50,  139 => 41,  240 => 108,  230 => 104,  121 => 31,  257 => 222,  249 => 60,  106 => 40,  334 => 142,  294 => 125,  286 => 121,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 50,  45 => 9,  487 => 199,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 171,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 158,  360 => 156,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 112,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 168,  458 => 109,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 165,  391 => 159,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 126,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 56,  85 => 26,  76 => 31,  112 => 25,  101 => 37,  98 => 75,  272 => 118,  269 => 117,  228 => 105,  221 => 77,  197 => 89,  184 => 64,  138 => 27,  118 => 59,  105 => 38,  66 => 16,  56 => 19,  115 => 58,  83 => 18,  164 => 51,  140 => 74,  58 => 15,  21 => 4,  61 => 15,  36 => 10,  209 => 95,  205 => 169,  196 => 72,  192 => 87,  189 => 86,  178 => 79,  176 => 41,  165 => 75,  161 => 70,  152 => 125,  148 => 43,  141 => 45,  134 => 60,  132 => 102,  127 => 48,  123 => 39,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 60,  111 => 38,  107 => 35,  80 => 55,  69 => 30,  60 => 16,  52 => 16,  97 => 55,  95 => 37,  88 => 21,  78 => 32,  75 => 55,  71 => 53,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 101,  218 => 100,  159 => 54,  154 => 124,  151 => 66,  145 => 47,  136 => 103,  128 => 29,  125 => 98,  119 => 45,  110 => 42,  96 => 34,  93 => 36,  91 => 36,  68 => 29,  65 => 23,  63 => 17,  43 => 6,  50 => 18,  25 => 4,  92 => 36,  86 => 22,  79 => 29,  46 => 13,  37 => 4,  33 => 7,  27 => 2,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 11,  44 => 15,  42 => 19,  34 => 3,  29 => 3,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 13,  26 => 2,  22 => 2,  224 => 101,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 164,  190 => 76,  188 => 153,  185 => 83,  179 => 48,  177 => 61,  171 => 136,  162 => 36,  158 => 125,  156 => 49,  153 => 67,  146 => 64,  142 => 42,  137 => 46,  131 => 44,  126 => 40,  120 => 45,  117 => 92,  103 => 33,  99 => 19,  77 => 21,  74 => 20,  57 => 17,  47 => 27,  39 => 10,  32 => 9,  24 => 4,  17 => 1,  135 => 38,  129 => 43,  122 => 26,  116 => 58,  113 => 57,  108 => 41,  104 => 24,  102 => 57,  94 => 21,  89 => 67,  87 => 30,  84 => 34,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 15,  59 => 18,  55 => 13,  51 => 13,  48 => 15,  41 => 23,  38 => 18,  35 => 5,  31 => 4,  28 => 11,);
    }
}
