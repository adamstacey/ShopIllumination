<?php

/* WebIlluminationShopBundle:Products:productListing.html.twig */
class __TwigTemplate_b14469678ed0428a16230773a656752a extends Twig_Template
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
        echo "<div itemscope itemtype=\"http://schema.org/Product\" class=\"product\" data-product-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
        echo "\" id=\"product-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productId"), "html", null, true);
        echo "\">
\t<h4 class=\"no-margin-bottom\"><a itemprop=\"name\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "product"), "url"))), "html", null, true);
        echo "\">";
        echo $this->getAttribute($this->getContext($context, "product"), "header");
        echo "</a></h4>
\t<p><em>";
        // line 3
        echo (($this->getAttribute($this->getContext($context, "product", true), "tagline", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "product", true), "tagline"), "&nbsp;")) : ("&nbsp;"));
        echo "</em></p>
\t<div class=\"product-information\">
\t\t<a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("page_request", array("url" => $this->getAttribute($this->getContext($context, "product"), "url"))), "html", null, true);
        echo "\"><img itemprop=\"image\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getContext($context, "product"), "thumbnailPath")), "html", null, true);
        echo "\" border=\"0\" alt=\"";
        echo $this->getAttribute($this->getContext($context, "product"), "header");
        echo "\" width=\"100\" height=\"100\"></a>
\t\t<div class=\"product-description\">
\t\t\t";
        // line 7
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:price.html.twig")->display(array_merge($context, array("url" => $this->getAttribute($this->getContext($context, "product"), "url"), "productCode" => $this->getAttribute($this->getContext($context, "product"), "productCode"), "recommendedRetailPrice" => $this->getAttribute($this->getContext($context, "product"), "recommendedRetailPrice"), "listPrice" => $this->getAttribute($this->getContext($context, "product"), "listPrice"), "savings" => $this->getAttribute($this->getContext($context, "product"), "savings"), "membershipCardPrice" => $this->getAttribute($this->getContext($context, "product"), "membershipCardPrice"), "hidePrice" => $this->getAttribute($this->getContext($context, "product"), "hidePrice"))));
        // line 8
        echo "\t\t\t";
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:buyNow.html.twig")->display(array_merge($context, array("product" => $this->getContext($context, "product"))));
        // line 9
        echo "\t\t</div>
\t\t<div class=\"clear\"></div>
\t</div>
\t<div class=\"clear\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:productListing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 8,  44 => 7,  30 => 3,  24 => 2,  56 => 6,  49 => 9,  35 => 5,  17 => 1,);
    }
}
