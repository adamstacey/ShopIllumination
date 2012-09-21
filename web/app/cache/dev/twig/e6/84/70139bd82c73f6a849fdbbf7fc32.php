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
        return array (  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 7,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
