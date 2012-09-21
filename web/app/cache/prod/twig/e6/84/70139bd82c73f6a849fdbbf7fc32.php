<?php

/* WebIlluminationAdminBundle:Orders:index.html.twig */
class __TwigTemplate_e68470139bd82c73f6a849fdbbf7fc32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::admin.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'leftmenu' => array($this, 'block_leftmenu'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Orders  | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_leftmenu($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("leftmenu", $context, $blocks);
        echo "
\t";
        // line 5
        $this->env->loadTemplate("WebIlluminationAdminBundle:Brands:leftMenu.html.twig")->display($context);
        echo "  
";
    }

    // line 7
    public function block_header($context, array $blocks = array())
    {
        // line 8
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t<h2>Orders</h2>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    <section class=\"container_6 clearfix no-padding-top\">
    \t<div class=\"grid_6\">
    \t\t<div id=\"order-confirm-delete-orders\" class=\"ui-helper-hidden ui-widget following message confirmation-message no-margin no-padding\">
\t\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t\t\t    \t<div class=\"fl no-margin no-padding\">
\t\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the selected orders below?</p>
\t\t\t    \t</div>
\t\t\t        <div class=\"fr no-margin no-padding\">
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-delete-orders\">Cancel</a>
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-orders\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t\t        </div>
\t\t\t        <div class=\"clear\"></div>
\t\t\t    </div>
\t\t\t</div>
    \t\t<div class=\"portlet\">
\t\t\t\t<header>
\t\t\t\t\t<button id=\"filter-results-button\" class=\"button ui-button-blue fr action-filter-results\" data-icon-primary=\"ui-icon-triangle-1-s\">Filter Results</button>
\t                <h2 id=\"listing-count\"><img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />Loading&hellip;</h2>
\t            </header>
\t\t\t\t<section class=\"no-padding\">
\t\t\t\t\t";
        // line 33
        $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingFilter.html.twig")->display($context);
        // line 34
        echo "\t\t\t\t\t";
        $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingSettings.html.twig")->display(array_merge($context, array("settings" => $this->getContext($context, "settings"))));
        // line 35
        echo "\t\t\t\t\t<div id=\"listing-pagination-top\" class=\"listing-pagination ui-helper-hidden\"></div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div id=\"listing-loading\">
\t\t\t\t\t\t<p class=\"ac\"><img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"listing\" class=\"ui-helper-hidden\"></div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div id=\"listing-pagination-bottom\" class=\"listing-pagination ui-helper-hidden\"></div>
\t\t        \t<div class=\"clear\"></div>
\t\t        \t";
        // line 45
        $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:listingToolbar.html.twig")->display($context);
        // line 46
        echo "\t\t\t\t</section>
\t        </div>
\t\t</div>
\t</section>
\t<div id=\"order-document\" title=\"View Document\" class=\"ui-helper-hidden\">
\t\t<iframe width=\"100%\" height=\"560\" src=\"\"></iframe>
\t</div>
";
    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        // line 55
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 56
        $this->env->loadTemplate("WebIlluminationAdminBundle:Orders:indexScript.js.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 80,  273 => 86,  263 => 83,  246 => 81,  234 => 78,  217 => 77,  173 => 60,  309 => 113,  285 => 90,  280 => 103,  276 => 101,  262 => 99,  235 => 90,  232 => 89,  212 => 75,  207 => 74,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 121,  475 => 116,  471 => 115,  467 => 114,  463 => 112,  433 => 107,  416 => 106,  412 => 104,  409 => 103,  404 => 100,  390 => 99,  362 => 97,  358 => 95,  356 => 94,  353 => 266,  349 => 91,  345 => 89,  306 => 86,  271 => 75,  253 => 72,  233 => 68,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 52,  223 => 116,  186 => 63,  169 => 66,  301 => 84,  298 => 100,  292 => 98,  267 => 81,  258 => 76,  248 => 73,  242 => 89,  239 => 70,  237 => 79,  174 => 35,  182 => 64,  175 => 70,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 31,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 87,  307 => 183,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 176,  275 => 175,  265 => 74,  251 => 93,  199 => 41,  191 => 68,  170 => 59,  210 => 47,  180 => 59,  172 => 60,  168 => 58,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 119,  106 => 23,  334 => 31,  294 => 97,  286 => 20,  277 => 76,  255 => 95,  244 => 3,  214 => 76,  198 => 71,  181 => 89,  167 => 50,  160 => 54,  45 => 5,  487 => 345,  481 => 437,  479 => 117,  477 => 339,  468 => 425,  444 => 108,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 82,  274 => 188,  256 => 75,  254 => 204,  252 => 120,  231 => 67,  216 => 51,  213 => 82,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 195,  270 => 122,  266 => 36,  261 => 77,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 22,  194 => 71,  130 => 23,  100 => 22,  85 => 30,  76 => 21,  112 => 35,  101 => 38,  98 => 33,  272 => 85,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 25,  105 => 33,  66 => 21,  56 => 21,  115 => 29,  83 => 15,  164 => 63,  140 => 43,  58 => 15,  21 => 4,  61 => 23,  36 => 3,  209 => 75,  205 => 73,  196 => 79,  192 => 77,  189 => 64,  178 => 63,  176 => 62,  165 => 75,  161 => 53,  152 => 90,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 55,  123 => 52,  109 => 63,  90 => 37,  54 => 8,  133 => 40,  124 => 54,  111 => 45,  107 => 35,  80 => 34,  69 => 17,  60 => 16,  52 => 16,  97 => 39,  95 => 29,  88 => 26,  78 => 25,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 29,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 37,  259 => 73,  245 => 119,  241 => 70,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 47,  151 => 50,  145 => 47,  136 => 25,  128 => 41,  125 => 53,  119 => 114,  110 => 34,  96 => 35,  93 => 34,  91 => 33,  68 => 27,  65 => 12,  63 => 17,  43 => 14,  50 => 13,  25 => 7,  92 => 21,  86 => 19,  79 => 23,  46 => 13,  37 => 3,  33 => 10,  27 => 2,  82 => 22,  72 => 18,  64 => 8,  53 => 10,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 6,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 88,  215 => 78,  211 => 106,  204 => 98,  200 => 71,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 64,  162 => 55,  158 => 72,  156 => 41,  153 => 54,  146 => 58,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 39,  117 => 48,  103 => 29,  99 => 19,  77 => 14,  74 => 31,  57 => 16,  47 => 9,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 40,  116 => 51,  113 => 46,  108 => 30,  104 => 45,  102 => 61,  94 => 21,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 21,  70 => 19,  67 => 19,  62 => 11,  59 => 11,  55 => 20,  51 => 7,  48 => 23,  41 => 8,  38 => 12,  35 => 7,  31 => 8,  28 => 11,);
    }
}
