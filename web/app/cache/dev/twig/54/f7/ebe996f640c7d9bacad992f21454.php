<?php

/* WebIlluminationAdminBundle:Products:index.html.twig */
class __TwigTemplate_54f7ebe996f640c7d9bacad992f21454 extends Twig_Template
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
        echo "\t\t\t\t\t";
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingSettings.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
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
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":listingToolbar.html.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        // line 46
        echo "\t\t\t\t</section>
\t        </div>
\t\t</div>
\t</section>
\t<div id=\"preview\" title=\"Preview\" class=\"ui-helper-hidden\">
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
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":indexScript.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 56,  137 => 55,  134 => 54,  123 => 46,  120 => 45,  110 => 38,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 11,  60 => 9,  55 => 8,  52 => 7,  46 => 5,  41 => 4,  38 => 3,  30 => 2,);
    }
}
