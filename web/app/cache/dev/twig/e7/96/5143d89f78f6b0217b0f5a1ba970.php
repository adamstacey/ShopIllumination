<?php

/* WebIlluminationAdminBundle:Products:listingToolbar.html.twig */
class __TwigTemplate_e7965143d89f78f6b0217b0f5a1ba970 extends Twig_Template
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
        echo "<div class=\"floating-buttons-toolbar\">
\t<div class=\"floating-buttons-container\">
\t\t<div class=\"floating-buttons\">
\t\t\t<div class=\"fr no-margin no-padding\">
\t        \t<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_add")), "html", null, true);
        echo "\" class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-green\" data-icon-primary=\"ui-icon-plusthick\">Add New Product</a>
\t        \t<button class=\"fl button ui-corner-none ui-button-green action-multiple-update\" data-icon-primary=\"ui-icon-check\">Update Selected Products</button>
\t        \t<button class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-confirm-multiple-delete\" data-icon-primary=\"ui-icon-closethick\">Delete Selected Products</button>
\t        </div>
\t        <div class=\"clear\"></div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:listingToolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  88 => 20,  82 => 19,  76 => 18,  70 => 17,  59 => 11,  47 => 9,  35 => 7,  29 => 6,  23 => 5,  644 => 211,  641 => 210,  617 => 206,  600 => 205,  593 => 203,  584 => 197,  581 => 196,  569 => 192,  552 => 191,  545 => 189,  514 => 161,  501 => 160,  488 => 159,  481 => 155,  468 => 154,  455 => 153,  448 => 149,  435 => 148,  422 => 147,  415 => 143,  402 => 142,  389 => 141,  382 => 137,  369 => 136,  356 => 135,  343 => 125,  330 => 124,  317 => 123,  310 => 119,  297 => 118,  284 => 117,  277 => 113,  264 => 112,  251 => 111,  244 => 107,  231 => 106,  218 => 105,  211 => 101,  198 => 100,  185 => 99,  167 => 86,  152 => 76,  135 => 64,  99 => 36,  90 => 30,  81 => 24,  53 => 10,  40 => 10,  27 => 9,  17 => 1,  142 => 56,  137 => 55,  134 => 54,  123 => 46,  120 => 54,  110 => 38,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 12,  60 => 9,  55 => 8,  52 => 7,  46 => 5,  41 => 8,  38 => 3,  30 => 2,);
    }
}
