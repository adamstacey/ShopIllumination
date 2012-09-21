<?php

/* WebIlluminationAdminBundle:BrandsOld:ajaxAddGuarantee.html.twig */
class __TwigTemplate_460fb19dbe875461da6ff76b1bb65adf extends Twig_Template
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
        echo "<li class=\"guarantee-container\" data-index=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" id=\"guarantee-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
\t<table width=\"100%\">
\t\t<tbody>
\t\t\t<tr>
\t\t\t\t<td width=\"9\">
\t\t\t\t\t<img class=\"draggable\" width=\"9\" height=\"17\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/icons/draggable.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Drag to re-order\" />
\t\t\t\t</td>
\t\t\t\t<td width=\"1\" class=\"delete\">
\t\t\t\t\t<input data-index=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" type=\"checkbox\" class=\"guarantee-delete\" id=\"form-guarantee-delete-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"1\" />
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<select autocomplete=\"off\" class=\"guarantee-type\" id=\"form-guarantee-type-id-";
        // line 12
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
\t\t        \t\t<option value=\"\">- Select Type -</option>
\t\t        \t\t";
        // line 14
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "guarantee_types"));
        foreach ($context['_seq'] as $context["_key"] => $context["guarantee_type"]) {
            // line 15
            echo "\t                \t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "guarantee_type"), "id"), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "guarantee_type"), "guaranteeType");
            echo "</option>
\t            \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guarantee_type'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "\t\t        \t</select>
\t\t\t\t</td>
\t\t\t\t<td width=\"140\">
\t\t        \t<select autocomplete=\"off\" class=\"guarantee-length\" id=\"form-guarantee-length-id-";
        // line 20
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
\t\t        \t\t<option value=\"\">- Select Length -</option>
\t\t        \t\t";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "guarantee_lengths"));
        foreach ($context['_seq'] as $context["_key"] => $context["guarantee_length"]) {
            // line 23
            echo "\t                \t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "guarantee_length"), "id"), "html", null, true);
            echo "\">";
            echo $this->getAttribute($this->getContext($context, "guarantee_length"), "guaranteeLength");
            echo "</option>
\t            \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guarantee_length'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 25
        echo "\t\t        \t</select>
\t\t\t\t</td>
\t\t\t\t<td width=\"1\">
\t\t\t\t\t<input type=\"hidden\" class=\"guarantee-display-order\" id=\"form-guarantee-display-order-";
        // line 28
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" />
\t\t\t\t\t<input type=\"hidden\" data-index=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"guarantee-requires-update\" id=\"form-guarantee-requires-update-";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"1\" />
\t\t\t\t\t<input type=\"hidden\" class=\"guarantee-id\" id=\"form-guarantee-id-";
        // line 30
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" value=\"0\" />
\t\t\t\t\t<a href=\"Javascript:void(0);\" data-index=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\" class=\"button ui-button-delete action-delete-guarantee\" data-icon-primary=\"ui-icon-closethick\">Delete</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t</table>
</li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:BrandsOld:ajaxAddGuarantee.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  301 => 101,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 71,  239 => 70,  237 => 69,  174 => 35,  182 => 37,  175 => 84,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 34,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 99,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 74,  199 => 41,  191 => 125,  170 => 110,  210 => 47,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 26,  240 => 191,  230 => 182,  121 => 20,  257 => 222,  249 => 119,  106 => 27,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 152,  216 => 51,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 97,  284 => 195,  270 => 37,  266 => 36,  261 => 77,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 35,  85 => 30,  76 => 23,  112 => 37,  101 => 25,  98 => 29,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 21,  56 => 16,  115 => 18,  83 => 11,  164 => 50,  140 => 57,  58 => 15,  21 => 4,  61 => 18,  36 => 4,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 36,  176 => 57,  165 => 75,  161 => 58,  152 => 110,  148 => 33,  141 => 50,  134 => 42,  132 => 53,  127 => 53,  123 => 34,  109 => 63,  90 => 32,  54 => 8,  133 => 95,  124 => 21,  111 => 29,  107 => 16,  80 => 60,  69 => 9,  60 => 20,  52 => 16,  97 => 24,  95 => 33,  88 => 12,  78 => 29,  75 => 20,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 72,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 47,  151 => 73,  145 => 56,  136 => 25,  128 => 25,  125 => 123,  119 => 114,  110 => 17,  96 => 33,  93 => 23,  91 => 33,  68 => 9,  65 => 12,  63 => 26,  43 => 7,  50 => 6,  25 => 6,  92 => 28,  86 => 31,  79 => 21,  46 => 5,  37 => 3,  33 => 16,  27 => 2,  82 => 30,  72 => 22,  64 => 8,  53 => 17,  49 => 9,  44 => 5,  42 => 12,  34 => 9,  29 => 6,  23 => 3,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 4,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 71,  177 => 114,  171 => 64,  162 => 105,  158 => 72,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 43,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 37,  99 => 36,  77 => 25,  74 => 27,  57 => 19,  47 => 14,  39 => 8,  32 => 8,  24 => 6,  17 => 1,  135 => 50,  129 => 52,  122 => 122,  116 => 41,  113 => 112,  108 => 31,  104 => 30,  102 => 14,  94 => 33,  89 => 53,  87 => 25,  84 => 11,  81 => 20,  73 => 18,  70 => 28,  67 => 20,  62 => 17,  59 => 25,  55 => 18,  51 => 15,  48 => 25,  41 => 4,  38 => 3,  35 => 7,  31 => 2,  28 => 6,);
    }
}
