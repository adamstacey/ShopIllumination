<?php

/* WebIlluminationAdminBundle:Orders:ajaxGetOrderInformation.html.twig */
class __TwigTemplate_fbdac0562c73faa77f0685f3ab134480 extends Twig_Template
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
        echo "<div class=\"clearfix separator\">
\t<table class=\"sub-data-table\" width=\"100%\">
\t\t<tr>
\t\t\t<th class=\"al\">Product</th>
\t\t\t<th class=\"ac\">Code</th>
\t\t\t<th class=\"ac\" colspan=\"5\" width=\"1\">Price</th>
\t\t</tr>
\t\t";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 9
            echo "\t\t\t<tr>
\t\t\t\t<td>
\t\t\t\t\t<strong>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "</strong>
\t\t\t\t\t";
            // line 12
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                // line 13
                echo "\t\t\t\t\t\t<br />
\t\t\t\t\t\t";
                // line 14
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["selectedOptionLabel"]) {
                    // line 15
                    echo "\t\t\t\t\t\t\t";
                    if (($this->getContext($context, "selectedOptionLabel") != "")) {
                        // line 16
                        echo "\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                        echo $this->getContext($context, "selectedOptionLabel");
                        if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                            echo "<br />";
                        }
                        // line 17
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 18
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedOptionLabel'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 19
                echo "\t\t\t\t\t";
            }
            // line 20
            echo "\t\t\t\t</td>
\t\t\t\t<td class=\"ac\"><strong>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
            echo "</strong></td>
\t\t\t\t<td width=\"1\" class=\"ac\">";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
            echo "</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&times;</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
            // line 24
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
            echo "</td>
\t\t\t\t<td width=\"1\" class=\"ac\">=</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&pound;";
            // line 26
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 29
        echo "\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
            // line 30
            echo "\t\t\t<tr>
\t\t\t\t<td><a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_privilege_card"), "html", null, true);
            echo "\">Ride Direct Privilege Card</a></td>
\t\t\t\t<td class=\"ac\"><strong>PRIVILEGE</strong></td>
\t\t\t\t<td width=\"1\" class=\"ac\">1</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&times;</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&pound;1.00</td>
\t\t\t\t<td width=\"1\" class=\"ac\">=</td>
\t\t\t\t<td width=\"1\" class=\"ac\">&pound;1.00</td>
\t\t\t</tr>
\t\t";
        }
        // line 40
        echo "\t</table>
</div>
<div class=\"clearfix no-margin-bottom\">
\t<table class=\"sub-data-table\" align=\"right\">
\t\t";
        // line 44
        if (($this->getAttribute($this->getContext($context, "order"), "recommendedRetailPrice") > $this->getAttribute($this->getContext($context, "order"), "subTotal"))) {
            // line 45
            echo "\t\t\t<tr>
\t\t\t\t<td class=\"al\"><strong>RRP (inc. VAT):</strong></td>
\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
            // line 47
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "recommendedRetailPrice"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 50
        echo "\t\t<tr>
\t\t\t<td class=\"al\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 52
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "subTotal"), 2), "html", null, true);
        echo "</strong></td>
\t\t</tr>
\t\t";
        // line 54
        if (($this->getAttribute($this->getContext($context, "order"), "savings") > 0)) {
            // line 55
            echo "\t\t\t<tr>
\t\t\t\t<td class=\"al\"><strong>You Save:</strong></td>
\t\t\t\t<td width=\"1\" class=\"price free ar\">&pound;";
            // line 57
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "savings"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 60
        echo "\t\t<tr>
\t\t\t<td class=\"al\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t";
        // line 62
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 63
            echo "\t\t\t\t<td width=\"1\" class=\"important\">Collection</td>\t\t
\t\t\t";
        } else {
            // line 64
            echo "\t\t\t\t
\t\t\t\t";
            // line 65
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCharge") == 0)) {
                // line 66
                echo "\t\t\t\t\t<td width=\"1\" class=\"price free ar\">FREE</td>
\t\t\t\t";
            } else {
                // line 68
                echo "\t\t\t\t\t<td width=\"1\" class=\"price ar\">&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
                echo "</td>
\t\t\t\t";
            }
            // line 70
            echo "\t\t\t";
        }
        // line 71
        echo "\t\t</tr>
\t\t";
        // line 72
        if (($this->getAttribute($this->getContext($context, "order"), "discount") > 0)) {
            // line 73
            echo "\t\t\t<tr>
\t\t\t\t<td class=\"al\"><strong>Discount:</strong></td>
\t\t\t\t<td width=\"1\" class=\"discount ar\">&pound;";
            // line 75
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "discount"), 2), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t";
        }
        // line 78
        echo "\t\t<tr>
\t\t\t<td class=\"al\"><strong>Total to Pay (inc. VAT):</strong></td>
\t\t\t<td width=\"1\" class=\"price ar\"><strong>&pound;";
        // line 80
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "html", null, true);
        echo "</strong></td>
\t\t</tr>
\t</table>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:ajaxGetOrderInformation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 80,  273 => 86,  263 => 83,  246 => 81,  234 => 78,  217 => 77,  173 => 60,  309 => 113,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 74,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 52,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 64,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 31,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 68,  170 => 59,  210 => 47,  180 => 59,  172 => 60,  168 => 58,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 119,  106 => 26,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 76,  198 => 71,  181 => 89,  167 => 50,  160 => 54,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 44,  85 => 14,  76 => 21,  112 => 37,  101 => 24,  98 => 33,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 30,  105 => 34,  66 => 21,  56 => 21,  115 => 29,  83 => 11,  164 => 63,  140 => 43,  58 => 6,  21 => 4,  61 => 23,  36 => 10,  209 => 75,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 63,  176 => 62,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 45,  134 => 60,  132 => 53,  127 => 56,  123 => 52,  109 => 63,  90 => 37,  54 => 19,  133 => 40,  124 => 33,  111 => 29,  107 => 35,  80 => 34,  69 => 17,  60 => 15,  52 => 16,  97 => 39,  95 => 32,  88 => 26,  78 => 25,  75 => 25,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 50,  145 => 47,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 48,  96 => 22,  93 => 40,  91 => 30,  68 => 27,  65 => 18,  63 => 16,  43 => 14,  50 => 18,  25 => 7,  92 => 21,  86 => 19,  79 => 32,  46 => 13,  37 => 3,  33 => 10,  27 => 2,  82 => 22,  72 => 18,  64 => 8,  53 => 31,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 11,  23 => 3,  19 => 1,  40 => 13,  20 => 3,  30 => 9,  26 => 8,  22 => 2,  224 => 88,  215 => 78,  211 => 106,  204 => 98,  200 => 71,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 64,  162 => 55,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 48,  103 => 29,  99 => 19,  77 => 25,  74 => 31,  57 => 16,  47 => 15,  39 => 19,  32 => 8,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 37,  108 => 30,  104 => 45,  102 => 61,  94 => 33,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 22,  70 => 19,  67 => 26,  62 => 24,  59 => 22,  55 => 20,  51 => 70,  48 => 23,  41 => 24,  38 => 12,  35 => 9,  31 => 8,  28 => 11,);
    }
}