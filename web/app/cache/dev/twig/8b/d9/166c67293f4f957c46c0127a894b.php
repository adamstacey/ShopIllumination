<?php

/* WebIlluminationAdminBundle:Brands:leftMenu.html.twig */
class __TwigTemplate_8bd9166c67293f4f957c46c0127a894b extends Twig_Template
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
        echo "<li class=\"";
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "brands")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_brands"), "html", null, true);
        echo "\" class=\"navicon-box\">Brands</a></li>
<li class=\"";
        // line 2
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "products")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\" class=\"navicon-barcode\">Products</a></li>
<li class=\"";
        // line 3
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_categories")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\" class=\"navicon-cabinet\">Categories</a></li>
<li class=\"";
        // line 4
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_groups")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\" class=\"navicon-menu\">Groups</a></li>
<li class=\"";
        // line 5
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_features")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\" class=\"navicon-notepad\">Features</a></li>
<li class=\"";
        // line 6
        if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "request"), "attributes"), "get", array(0 => "_route"), "method") == "product_options")) {
            echo "current";
        }
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_products"), "html", null, true);
        echo "\" class=\"navicon-pulldown\">Options</a></li>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Brands:leftMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 6,  50 => 5,  42 => 4,  34 => 3,  26 => 2,  69 => 24,  59 => 17,  55 => 16,  43 => 10,  39 => 9,  35 => 8,  31 => 7,  27 => 6,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
