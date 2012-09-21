<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductPrice.html.twig */
class __TwigTemplate_0936cfe76685c56b664659b0a8206dac extends Twig_Template
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
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:price.html.twig")->display(array_merge($context, array("url" => "", "productCode" => $this->getAttribute($this->getContext($context, "product"), "productCode"), "recommendedRetailPrice" => $this->getAttribute($this->getContext($context, "price"), "recommendedRetailPrice"), "listPrice" => $this->getAttribute($this->getContext($context, "price"), "listPrice"), "savings" => $this->getAttribute($this->getContext($context, "price"), "savings"), "membershipCardPrice" => $this->getAttribute($this->getContext($context, "price"), "membershipCardPrice"), "hidePrice" => $this->getAttribute($this->getContext($context, "product"), "hidePrice"))));
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductPrice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  17 => 1,);
    }
}
