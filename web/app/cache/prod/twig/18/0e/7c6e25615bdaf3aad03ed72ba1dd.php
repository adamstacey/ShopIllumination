<?php

/* WebIlluminationAdminBundle:Departments:listingConfirmDelete.html.twig */
class __TwigTemplate_180e7c6e25615bdaf3aad03ed72ba1dd extends Twig_Template
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
        echo "<div class=\"ui-helper-hidden more-information-detail no-margin no-padding\" id=\"confirm-delete-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
        echo "\">
\t<div class=\"ui-widget message confirmation-message no-margin no-padding\">
\t    <div class=\"ui-state-highlight ui-corner-all no-margin no-padding\"> 
\t    \t<div class=\"fl no-margin no-padding\">
\t    \t\t<span class=\"ui-icon ui-icon-help margin-top-5\"></span>
\t    \t\t<p class=\"small-message\"><strong>WARNING:</strong> Are you sure you want to delete this ";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo "?</p>
\t    \t</div>
\t        <div class=\"fr no-margin no-padding\">
\t        \t<a href=\"Javascript:void(0);\" data-id=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t        \t<a href=\"Javascript:void(0);\" data-id=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "id"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-confirm-delete\">Cancel</a>
\t        </div>
\t        <div class=\"clear\"></div>
\t    </div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:listingConfirmDelete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 126,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  90 => 32,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 13,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 85,  65 => 84,  63 => 34,  43 => 47,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 2,  82 => 27,  72 => 16,  64 => 12,  53 => 8,  49 => 11,  44 => 5,  42 => 7,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 20,  20 => 2,  30 => 12,  26 => 6,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 125,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 25,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 9,  24 => 6,  17 => 1,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 24,  102 => 70,  94 => 33,  89 => 20,  87 => 28,  84 => 53,  81 => 26,  73 => 19,  70 => 86,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
