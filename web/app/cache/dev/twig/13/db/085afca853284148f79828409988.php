<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductListingPriceFilter.html.twig */
class __TwigTemplate_13db085afca853284148f79828409988 extends Twig_Template
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
        echo "<div class=\"range-slider-values\">
\t<span>&pound;</span>
\t<input id=\"filter-price-from\" type=\"text\" value=\"\" />
\t<span>&nbsp;-&nbsp;</span>
\t<input id=\"filter-price-to\" type=\"text\" value=\"\" />
</div>
<div class=\"price-range\" id=\"price-range-slider\"></div>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#filter-price-from\").val(\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "cheapestPrice"), "html", null, true);
        echo "\");
\t\t\$(\"#filter-price-to\").val(\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "mostExpensivePrice"), "html", null, true);
        echo "\");
\t\t\$(\"#price-range-slider\").slider({
\t\t\trange: true,
\t\t\tmin: ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "cheapestPrice"), "html", null, true);
        echo ",
\t\t\tmax: ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "mostExpensivePrice"), "html", null, true);
        echo ",
\t\t\tvalues: [";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "cheapestPrice"), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "prices"), "mostExpensivePrice"), "html", null, true);
        echo "],
\t\t\tslide: function(event, ui) {
\t\t\t\t\$(\"#filter-price-from\").val(ui.values[0]);
\t\t\t\t\$(\"#filter-price-to\").val(ui.values[1]);
\t\t\t},
\t\t\tchange: function(event, ui) {
\t\t\t\t\$skipPriceFilter = true;
\t\t\t\tloadDepartment();
\t\t\t}
\t\t});
\t\t\$(\"#filter-price-from, #filter-price-to\").live('change', function() {
\t\t\t\$(\"#price-range-slider\").slider(\"option\", \"values\", [parseInt(\$(\"#filter-price-from\").val()), parseInt(\$(\"#filter-price-to\").val())]);
\t\t});
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductListingPriceFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 16,  42 => 15,  38 => 14,  32 => 11,  28 => 10,  17 => 1,);
    }
}
