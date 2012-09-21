<?php

/* WebIlluminationAdminBundle:Products:listingConfirmDelete.html.twig */
class __TwigTemplate_9e313e2bad31f104682d5ae535c47df6 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-delete\" data-icon-primary=\"ui-icon-closethick\">Confirm Delete</a>
\t        \t<a href=\"Javascript:void(0);\" data-id=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "productId"), "html", null, true);
        echo "\" class=\"button ui-corner-none ui-corner-tl ui-corner-bl ui-button-blue action-confirm-delete\">Cancel</a>
\t        </div>
\t        <div class=\"clear\"></div>
\t    </div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:listingConfirmDelete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 10,  26 => 6,  198 => 62,  194 => 59,  188 => 54,  171 => 50,  168 => 49,  157 => 41,  151 => 38,  147 => 37,  142 => 35,  133 => 31,  127 => 30,  121 => 29,  115 => 28,  111 => 27,  108 => 26,  102 => 25,  94 => 23,  91 => 22,  89 => 21,  85 => 20,  81 => 19,  71 => 18,  63 => 17,  57 => 16,  51 => 15,  32 => 9,  17 => 1,);
    }
}
