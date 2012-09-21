<?php

/* WebIlluminationAdminBundle:Admin:leftMenu.html.twig */
class __TwigTemplate_fa8ae0483d6f1eacfc3b1e58a6f032a4 extends Twig_Template
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
        echo "<li class=\"";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "brands")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("brands"), "html", null, true);
        echo "\" class=\"navicon-box\">Brands</a></li>
<li class=\"";
        // line 2
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "products")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products"), "html", null, true);
        echo "\" class=\"navicon-barcode\">Products</a></li>
<li class=\"";
        // line 3
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_categories")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_categories"), "html", null, true);
        echo "\" class=\"navicon-cabinet\">Categories</a></li>
<li class=\"";
        // line 4
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_groups")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_groups"), "html", null, true);
        echo "\" class=\"navicon-menu\">Groups</a></li>
<li class=\"";
        // line 5
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_features")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_features"), "html", null, true);
        echo "\" class=\"navicon-notepad\">Features</a></li>
<li class=\"";
        // line 6
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_options")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_options"), "html", null, true);
        echo "\" class=\"navicon-pulldown\">Options</a></li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Admin:leftMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 41,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 121,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 45,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 43,  105 => 18,  66 => 49,  56 => 16,  115 => 21,  83 => 24,  164 => 50,  140 => 104,  58 => 6,  21 => 4,  61 => 11,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 88,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 57,  141 => 55,  134 => 99,  132 => 30,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 24,  111 => 20,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 30,  97 => 34,  95 => 17,  88 => 13,  78 => 16,  75 => 15,  71 => 43,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 15,  93 => 61,  91 => 14,  68 => 9,  65 => 8,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 20,  33 => 12,  27 => 11,  82 => 13,  72 => 20,  64 => 12,  53 => 8,  49 => 9,  44 => 5,  42 => 4,  34 => 3,  29 => 2,  23 => 5,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 2,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 60,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 17,  94 => 103,  89 => 20,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 9,  67 => 43,  62 => 37,  59 => 21,  55 => 14,  51 => 6,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 2,  28 => 3,);
    }
}
