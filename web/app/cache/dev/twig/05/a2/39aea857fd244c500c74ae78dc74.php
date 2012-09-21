<?php

/* WebIlluminationShopBundle:System:index.html.twig */
class __TwigTemplate_05a239aea857fd244c500c74ae78dc74 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::shop.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'slider' => array($this, 'block_slider'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::shop.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Worktops, Charcoal Filters, Cooker Hoods, Built-in Microwaves, Integrated Dishwashers, Integrated Washing Machines, Refrigeration, Cleaning Products, Glass Splashbacks, Waste Disposer, Sinks, Taps, Plinth Heaters, Range Cookers, Ducting, Hobs, Ovens, Coffee Machines, Solid Surface Worktops, Kitchen Appliances | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_slider($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"container_8 clearfix\">
\t\t<header>
\t\t\t<div class=\"slider-gallery-container\">
\t\t\t\t<div class=\"slider-gallery\">
\t\t\t\t\t<div class=\"slider-element\">
\t\t\t\t\t\t<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "neff", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/neff-dishwashers.jpg"), "html", null, true);
        echo "\" alt=\"Neff Dishwashers\" /></a>
\t\t\t\t\t\t<h3 class=\"left\">Neff Dishwashers</h3>
\t\t\t\t\t\t<p class=\"left\">A full scale dinner party or a meal for one, a Neff dishwasher can handle anything you need it to. And that includes bulky pans and casserole dishes. Innovations like our unique VarioFlex baskets give you the complete flexibility you need for the way we cook today.</p>
\t\t\t\t\t\t<a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "neff", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\" class=\"button left ui-button-green\">More Details</a>
\t\t\t\t\t</div>
\t\t\t    \t<div class=\"slider-element\">
\t\t\t    \t\t<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "franke", "url" => "sinks-and-taps-kitchen-sinks")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/franke-sinks.jpg"), "html", null, true);
        echo "\" alt=\"Franke Sinks\" /></a>
\t\t\t    \t\t<h3 class=\"right\">Franke Sinks</h3>
\t\t\t    \t\t<p class=\"right\">This superb choice of state-of-the-art new sink designs is offered in a wide range of durable materials, shapes and sizes.</p>
\t\t\t    \t\t<a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "franke", "url" => "sinks-and-taps-kitchen-sinks")), "html", null, true);
        echo "\" class=\"button right ui-button-green\">More Details</a>
\t\t\t    \t</div>
\t\t\t    \t<div class=\"slider-element\">
\t\t\t\t    \t<a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "bosch", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/bosch-dishwashers.jpg"), "html", null, true);
        echo "\" alt=\"Bosch Dishwashers\" /></a>
\t\t\t\t    \t<h3 class=\"left\">Bosch Dishwashers</a></h3>
\t\t\t\t    \t<p class=\"left\">ActiveWater dishwashers use less water. With water consumption at an all time high, it is important to choose a dishwasher that helps preserve this precious resource.</p>
\t\t\t\t    \t<a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "bosch", "url" => "laundry-and-dishwashers-dishwashers")), "html", null, true);
        echo "\" class=\"button left ui-button-green\">More Details</a>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"slider-element\">
\t\t\t\t    \t<a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "abode", "url" => "sinks-and-taps-kitchen-taps")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/headers/abode-taps.jpg"), "html", null, true);
        echo "\" alt=\"Abode Taps\" /></a>
\t\t\t\t    \t<h3 class=\"right\">Abode Taps</h3>
\t\t\t\t    \t<p class=\"right\">The Abode contemporary kitchen mixer range combines precision perfect engineering with stunning design. Clean lines and effortless control epitomise style and quality… beautifully.</p>
\t\t\t\t    \t<a href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand", array("brand" => "abode", "url" => "sinks-and-taps-kitchen-taps")), "html", null, true);
        echo "\" class=\"button right ui-button-green\">More Details</a>
\t\t\t\t    </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"slider-navigation-container\">
\t\t\t\t\t<div id=\"slider_gallery_navigation\" class=\"slider-navigation\"></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</header>
\t</div>
";
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        // line 41
        echo "\t<section class=\"container_6 clearfix no-padding-top\">
\t\t";
        // line 81
        echo "\t\t<div class=\"grid_6 leading\">
\t\t\t<div class=\"portlet\">
\t\t\t\t<header>
\t                <h2>Popular Departments</h2>
\t            </header>
\t\t\t\t<section class=\"no-padding-bottom\">
\t\t\t\t\t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\">Washing Machines and Dryers</a></h4>
\t\t        \t\t<a href=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/washing-machines-and-dryers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Washing Machines and Dryers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 92
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "fridges-and-freezers")), "html", null, true);
        echo "\">Fridges and Freezers</a></h4>
\t\t        \t\t<a href=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "fridges-and-freezers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/fridges-and-freezers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Fridges and Freezers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\">Dishwashers</a></h4>
\t\t        \t\t<a href=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "laundry-and-dishwashers")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/dishwashers.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Dishwashers\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department no-margin-right\">
\t\t        \t\t<h4><a href=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cookers-and-ovens")), "html", null, true);
        echo "\">Cookers and Ovens</a></h4>
\t\t        \t\t<a href=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cookers-and-ovens")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/cookers-and-ovens.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Cookers and Ovens\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "hobs")), "html", null, true);
        echo "\">Hobs</a></h4>
\t\t        \t\t<a href=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "hobs")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/hobs.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Hobs\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cooker-hoods")), "html", null, true);
        echo "\">Cooker Hoods</a></h4>
\t\t        \t\t<a href=\"";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "cooker-hoods")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/cooker-hoods.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Cooker Hoods\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department\">
\t\t        \t\t<h4><a href=\"";
        // line 112
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "sinks-and-taps")), "html", null, true);
        echo "\">Sinks and Taps</a></h4>
\t\t        \t\t<a href=\"";
        // line 113
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "sinks-and-taps")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/sinks-and-taps.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Sinks and Taps\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"department no-margin-right\">
\t\t        \t\t<h4><a href=\"";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "compact-appliances")), "html", null, true);
        echo "\">Compact Appliances</a></h4>
\t\t        \t\t<a href=\"";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => "compact-appliances")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/bundles/webilluminationshop/images/departments/compact-appliances.jpg"), "html", null, true);
        echo "\" border=\"0\" alt=\"Compact Appliances\" width=\"191\" height=\"191\" /></a>
\t\t        \t</div>
\t\t        \t<div class=\"clear\"></div>
\t\t\t\t</section>
\t        </div>
\t    </div>
\t   \t<div class=\"clear\"></div>
\t</section>
";
    }

    // line 126
    public function block_javascripts($context, array $blocks = array())
    {
        // line 127
        echo "\t";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t<script defer=\"defer\" type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t\$(\".special-offer .features-link\").click(function() {
\t\t\t\tif (\$(this).html() == '+ Show Features')
\t\t\t\t{
\t\t\t\t\t\$(\".special-offer .features-link\").html('- Hide Features');
\t\t\t\t\t\$(\".special-offer .features\").slideDown();
\t\t\t\t} else {
\t\t\t\t\t\$(\".special-offer .features-link\").html('+ Show Features');
\t\t\t\t\t\$(\".special-offer .features\").slideUp();
\t\t\t\t}
\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:System:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 92,  129 => 89,  125 => 88,  116 => 81,  113 => 41,  110 => 40,  96 => 30,  88 => 27,  82 => 24,  74 => 21,  68 => 18,  60 => 15,  54 => 12,  46 => 9,  39 => 4,  36 => 3,  29 => 2,);
    }
}
