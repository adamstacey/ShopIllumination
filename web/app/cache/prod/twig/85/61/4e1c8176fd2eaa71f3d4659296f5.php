<?php

/* WebIlluminationAdminBundle:Departments:index.html.twig */
class __TwigTemplate_85614e1c8176fd2eaa71f3d4659296f5 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo "  | ";
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
\t<h2>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo "</h2>
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        echo "    <section class=\"container_6 clearfix no-padding-top\">
    \t<div class=\"grid_6\">
    \t\t<div id=\"confirm-multiple-delete\" class=\"ui-helper-hidden ui-widget following message confirmation-message no-margin no-padding\">
\t\t\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t\t\t    \t<div class=\"fl no-margin no-padding\">
\t\t\t    \t\t<span class=\"ui-icon ui-icon-help\"></span>
\t\t\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete the selected ";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " below?</p>
\t\t\t    \t</div>
\t\t\t        <div class=\"fr no-margin no-padding\">
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-cancel-multiple-delete\">Cancel</a>
\t\t\t        \t<a href=\"Javascript:void(0);\" class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-multiple-delete\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t\t\t        </div>
\t\t\t        <div class=\"clear\"></div>
\t\t\t    </div>
\t\t\t</div>
    \t\t<div class=\"portlet\">
\t\t\t\t<header>
\t\t\t\t\t<button id=\"filter-button\" class=\"button ui-button-blue fr action-show-hide-filter\" data-icon-primary=\"ui-icon-triangle-1-s\">Filter Results</button>
\t                <h2 id=\"listing-count\"><img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" />Loading&hellip;</h2>
\t            </header>
\t\t\t\t<section class=\"no-padding\">
\t\t\t\t\t";
        // line 33
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingFilter.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "filters" => $this->getContext($context, "filters"), "data" => $this->getContext($context, "data"))));
        // line 34
        echo "\t\t\t\t\t<div id=\"listing-loading\">
\t\t\t\t\t\t<p class=\"ac\"><img src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t\t\t\t\t<p class=\"ac\">Loading&hellip;</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"listing\" class=\"ui-helper-hidden\"></div>
\t\t        \t<div class=\"clear\"></div>
\t\t        \t";
        // line 40
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingToolbar.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 41
        echo "\t\t\t\t</section>
\t        </div>
\t\t</div>
\t</section>
\t<div id=\"preview\" title=\"Preview\" class=\"ui-helper-hidden\">
\t\t<iframe width=\"100%\" height=\"560\" src=\"\"></iframe>
\t</div>
";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t";
        // line 51
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":indexScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 40,  101 => 34,  98 => 33,  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 56,  184 => 55,  138 => 48,  118 => 43,  105 => 42,  66 => 11,  56 => 32,  115 => 41,  83 => 60,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 12,  60 => 9,  52 => 7,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 25,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 5,  37 => 4,  33 => 12,  27 => 9,  82 => 27,  72 => 16,  64 => 12,  53 => 11,  49 => 28,  44 => 5,  42 => 24,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 6,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 44,  126 => 49,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 18,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 9,  24 => 6,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 35,  102 => 70,  94 => 70,  89 => 20,  87 => 28,  84 => 53,  81 => 24,  73 => 19,  70 => 40,  67 => 19,  62 => 24,  59 => 21,  55 => 8,  51 => 13,  48 => 25,  41 => 4,  38 => 3,  35 => 7,  31 => 14,  28 => 3,);
    }
}
