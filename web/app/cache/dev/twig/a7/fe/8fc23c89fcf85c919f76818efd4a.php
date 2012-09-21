<?php

/* ::shopHeader.html.twig */
class __TwigTemplate_a7fe8fc23c89fcf85c919f76818efd4a extends Twig_Template
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
        echo "<header class=\"clearfix\">
\t<div class=\"top-menu-container\">
\t\t<div class=\"container_8\">
\t\t\t<!--[if gt IE 7]>
\t\t\t\t";
        // line 5
        $this->env->loadTemplate("::shopSocialMediaInteractions.html.twig")->display($context);
        // line 6
        echo "\t\t\t<![endif]-->
\t\t\t<!--[if !IE]> -->
\t\t\t\t";
        // line 8
        $this->env->loadTemplate("::shopSocialMediaInteractions.html.twig")->display($context);
        // line 9
        echo "\t\t\t<!-- <![endif]-->
\t\t\t";
        // line 10
        $this->env->loadTemplate("::shopTopMenu.html.twig")->display($context);
        // line 11
        echo "\t\t</div>
\t</div>
\t<div class=\"container_8\">
\t\t<a class=\"logo\" title=\"Kitchen Appliance Centre\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/logos/kitchen-appliance-centre.png"), "html", null, true);
        echo "\" border=\"0\" alt=\"Kitchen Appliance Centre\" /></a>
        ";
        // line 15
        $this->env->loadTemplate("::shopSearch.html.twig")->display($context);
        // line 16
        echo "        ";
        $this->env->loadTemplate("::shopBasket.html.twig")->display($context);
        // line 17
        echo "        <div class=\"clear\"></div>
\t</div>
\t<div class=\"clear\"></div>
    ";
        // line 20
        echo $this->env->getExtension('actions')->renderAction("WebIlluminationShopBundle:System:mainMenu", array(), array());
        // line 21
        echo "    <div class=\"clear\"></div>
    ";
        // line 22
        $this->env->loadTemplate("::shopUniqueSellingPoints.html.twig")->display($context);
        // line 23
        echo "</header>";
    }

    public function getTemplateName()
    {
        return "::shopHeader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 23,  62 => 22,  59 => 21,  52 => 17,  49 => 16,  47 => 15,  41 => 14,  31 => 9,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  215 => 26,  159 => 24,  154 => 14,  151 => 13,  145 => 10,  142 => 9,  136 => 8,  131 => 125,  128 => 124,  122 => 122,  119 => 121,  108 => 117,  93 => 106,  91 => 105,  70 => 86,  65 => 84,  63 => 83,  57 => 20,  55 => 78,  51 => 77,  43 => 47,  40 => 13,  38 => 9,  34 => 10,  25 => 6,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 92,  129 => 89,  125 => 123,  116 => 120,  113 => 119,  110 => 118,  96 => 107,  88 => 27,  82 => 24,  74 => 21,  68 => 85,  60 => 15,  54 => 12,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
