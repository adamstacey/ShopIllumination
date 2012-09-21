<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:index.html.twig */
class __TwigTemplate_1d2040875a95d4599df96ff990f8f2cf extends Twig_Template
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
        echo "Practice Day Registrations | ";
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
\t<h2>Practice Day Registrations</h2>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    <section class=\"container_6 clearfix no-padding-top\">
    \t<div class=\"grid_6\">
    \t\t<div id=\"confirm-deletes\" class=\"ui-helper-hidden ui-widget following message confirmation-message no-margin no-padding\">
\t\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t\t\t    \t<div class=\"fl no-margin no-padding\">
\t\t\t    \t\t<span class=\"ui-icon ui-icon-help margin-top-5\"></span>
\t\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the selected practice day registrations below?</p>
\t\t\t    \t</div>
\t\t\t        <div class=\"fr no-margin no-padding\">
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-deletes\">Cancel</a>
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-deletes\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
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
        $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingFilter.html.twig")->display($context);
        // line 34
        echo "\t\t\t\t\t";
        $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingAdd.html.twig")->display($context);
        // line 35
        echo "\t\t\t\t\t";
        $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingSettings.html.twig")->display(array_merge($context, array("settings" => $this->getContext($context, "settings"))));
        // line 36
        echo "\t\t\t\t\t<div id=\"listing-pagination-top\" class=\"listing-pagination ui-helper-hidden\"></div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div id=\"listing-loading\">
\t\t\t\t\t\t<p class=\"ac\"><img src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"listing\" class=\"ui-helper-hidden\"></div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t<div id=\"listing-pagination-bottom\" class=\"listing-pagination ui-helper-hidden\"></div>
\t\t        \t<div class=\"clear\"></div>
\t\t        \t";
        // line 46
        $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:listingToolbar.html.twig")->display($context);
        // line 47
        echo "\t\t\t\t</section>
\t        </div>
\t\t</div>
\t</section>
";
    }

    // line 52
    public function block_javascripts($context, array $blocks = array())
    {
        // line 53
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 54
        $this->env->loadTemplate("WebIlluminationAdminBundle:PracticeDayRegistrations:indexScript.js.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 208,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 202,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 41,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 169,  249 => 119,  106 => 36,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 216,  392 => 272,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 75,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 23,  56 => 16,  115 => 21,  83 => 29,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 11,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 99,  132 => 54,  127 => 53,  123 => 34,  109 => 63,  90 => 31,  54 => 8,  133 => 95,  124 => 52,  111 => 69,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 34,  95 => 33,  88 => 13,  78 => 27,  75 => 15,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 35,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 3,  33 => 10,  27 => 11,  82 => 13,  72 => 20,  64 => 16,  53 => 8,  49 => 9,  44 => 5,  42 => 13,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 70,  185 => 76,  179 => 72,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 64,  99 => 36,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 47,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 103,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 17,  67 => 43,  62 => 11,  59 => 29,  55 => 14,  51 => 7,  48 => 25,  41 => 8,  38 => 3,  35 => 7,  31 => 2,  28 => 5,);
    }
}
