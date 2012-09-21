<?php

/* WebIlluminationShopBundle:Products:buyNow.html.twig */
class __TwigTemplate_0dfa36f69b0929f6e80cf976cf5b3087 extends Twig_Template
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
        echo "<div class=\"buy-now\">
\t";
        // line 2
        if ((($this->getAttribute($this->getContext($context, "product"), "availableForPurchase") == 1) && ($this->getAttribute($this->getContext($context, "product"), "hidePrice") == 0))) {
            // line 3
            echo "\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "product"), "url"))), "html", null, true);
            echo "\" class=\"fr button ui-button-green\">Buy Now</a>
\t";
        } else {
            // line 5
            echo "\t\t<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("content_contact_us"), "html", null, true);
            echo "\" class=\"fr button ui-button-green\">Contact Us to Buy</a>
\t";
        }
        // line 7
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:buyNow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 5,  22 => 3,  115 => 42,  110 => 34,  104 => 32,  100 => 30,  96 => 28,  94 => 27,  89 => 26,  83 => 24,  80 => 23,  77 => 22,  75 => 21,  70 => 20,  66 => 18,  63 => 17,  57 => 15,  55 => 14,  50 => 13,  47 => 12,  45 => 11,  41 => 9,  36 => 7,  34 => 7,  29 => 5,  23 => 3,  20 => 2,  46 => 8,  44 => 7,  30 => 3,  24 => 2,  56 => 6,  49 => 9,  35 => 5,  17 => 1,);
    }
}
