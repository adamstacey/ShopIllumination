<?php

/* WebIlluminationAdminBundle:Orders:listingOrderItems.html.twig */
class __TwigTemplate_9749960dbe6cf16ffc05b9605d48b424 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail\" id=\"order-order-items-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<h5 class=\"no-margin-top\">Order Information</h5>
\t<div id=\"order-information-details-loading-";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"loading-container\">
\t\t<p class=\"ac\"><img class=\"no-float\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /></p>
\t\t<p class=\"ac\">Loading&hellip;</p>
\t</div>
\t<div class=\"sub-table-data-container\" id=\"order-information-details-";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-helper-hidden\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingOrderItems.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  38 => 12,  31 => 8,  157 => 50,  150 => 46,  141 => 42,  135 => 38,  129 => 37,  121 => 34,  108 => 30,  95 => 26,  88 => 25,  82 => 22,  76 => 21,  63 => 17,  55 => 20,  44 => 11,  26 => 6,  103 => 29,  91 => 28,  85 => 26,  83 => 25,  78 => 24,  72 => 22,  65 => 20,  59 => 18,  57 => 15,  50 => 18,  48 => 15,  43 => 14,  34 => 9,  29 => 6,  25 => 4,  23 => 3,  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 54,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 35,  117 => 41,  115 => 47,  106 => 43,  97 => 27,  90 => 37,  81 => 33,  68 => 18,  61 => 23,  54 => 19,  47 => 15,  42 => 10,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 33,  110 => 31,  104 => 25,  98 => 24,  92 => 23,  86 => 24,  80 => 21,  74 => 31,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 7,  17 => 1,);
    }
}
