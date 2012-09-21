<?php

/* WebIlluminationAdminBundle:Orders:listingConfirmDelete.html.twig */
class __TwigTemplate_90d9c20d157c807895c1a246ca805456 extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail no-margin no-padding\" id=\"order-confirm-delete-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\">
\t<div id=\"order-confirm-delete-";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"ui-widget message confirmation-message no-margin no-padding\">
\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t    \t<div class=\"fl no-margin no-padding\">
\t    \t\t<span class=\"ui-icon ui-icon-help margin-top-5\"></span>
\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete this order?</p>
\t    \t</div>
\t        <div class=\"fr no-margin no-padding\">
\t        \t<a href=\"Javascript:void(0);\" data-id=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete-order\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t        \t<a href=\"Javascript:void(0);\" data-id=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-confirm-delete-order\">Cancel</a>
\t        </div>
\t        <div class=\"clear\"></div>
\t    </div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingConfirmDelete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  39 => 5,  151 => 68,  145 => 65,  134 => 60,  127 => 56,  120 => 52,  100 => 44,  93 => 40,  79 => 32,  62 => 24,  56 => 21,  36 => 10,  32 => 9,  27 => 4,  38 => 12,  31 => 4,  157 => 50,  150 => 46,  141 => 64,  135 => 38,  129 => 37,  121 => 34,  108 => 30,  95 => 26,  88 => 25,  82 => 22,  76 => 21,  63 => 17,  55 => 20,  44 => 15,  26 => 6,  103 => 29,  91 => 28,  85 => 26,  83 => 25,  78 => 24,  72 => 28,  65 => 20,  59 => 18,  57 => 15,  50 => 18,  48 => 15,  43 => 6,  34 => 9,  29 => 6,  25 => 4,  23 => 3,  303 => 109,  299 => 107,  285 => 105,  283 => 104,  280 => 103,  276 => 101,  262 => 99,  260 => 98,  251 => 93,  237 => 91,  235 => 90,  232 => 89,  228 => 87,  214 => 85,  212 => 84,  203 => 79,  192 => 77,  190 => 76,  187 => 75,  183 => 73,  177 => 71,  175 => 70,  169 => 66,  164 => 54,  160 => 61,  148 => 59,  143 => 57,  139 => 55,  125 => 53,  123 => 35,  117 => 41,  115 => 47,  106 => 43,  97 => 27,  90 => 37,  81 => 33,  68 => 27,  61 => 23,  54 => 19,  47 => 7,  42 => 10,  35 => 9,  30 => 7,  24 => 3,  22 => 2,  309 => 113,  284 => 70,  267 => 66,  264 => 65,  261 => 64,  258 => 63,  255 => 95,  252 => 61,  249 => 60,  246 => 59,  244 => 58,  233 => 50,  227 => 47,  219 => 46,  215 => 45,  207 => 81,  201 => 43,  191 => 42,  176 => 41,  172 => 40,  167 => 38,  162 => 36,  154 => 35,  146 => 58,  140 => 33,  136 => 32,  128 => 29,  122 => 28,  116 => 51,  110 => 48,  104 => 45,  98 => 24,  92 => 23,  86 => 36,  80 => 21,  74 => 31,  70 => 19,  64 => 18,  58 => 17,  52 => 16,  33 => 7,  17 => 1,);
    }
}
