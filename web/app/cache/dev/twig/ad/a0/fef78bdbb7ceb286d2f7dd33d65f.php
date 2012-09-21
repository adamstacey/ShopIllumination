<?php

/* WebIlluminationShopBundle:Products:indexFunctions.js.twig */
class __TwigTemplate_ada0fef78bdbb7ceb286d2f7dd33d65f extends Twig_Template
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
        // line 2
        echo "function updateSelectedOptions()
{
\t\$(\"#ajax-loading\").show();
\tvar \$selectedOptions = new Array();
\t\$(\".product-option-group\").each(function(index) {
\t\t\$selectedOptions[\$selectedOptions.length] = \$(this).val();
\t});
\t\$(\"#selected-options-";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
        echo "\").val(\$selectedOptions.join(\"|\"));
\t\$(\"#product-price-loading\").show();
\t\$(\"#product-price\").hide().html(\"\");
\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_price"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tproductId: ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
        echo ",
\t\t\t\tselectedOptions: \$(\"#selected-options-";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "id"), "html", null, true);
        echo "\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#product-price-loading\").hide();
\t\t\t\t\$(\"#product-price\").html('<p class=\"no-results\">Sorry, there was a problem updating the prices.</p>').fadeIn();
\t\t\t\t\$(\"#ajax-loading\").hide();
      \t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#product-price-loading\").hide();
\t\t\t\t\$(\"#product-price\").html(data).fadeIn();
\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t}
\t\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:indexFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,  39 => 16,  26 => 9,  44 => 22,  34 => 14,  27 => 7,  23 => 4,  21 => 3,  17 => 2,  486 => 168,  481 => 167,  478 => 166,  472 => 163,  464 => 157,  450 => 156,  447 => 155,  430 => 154,  422 => 148,  420 => 147,  416 => 145,  409 => 141,  403 => 138,  400 => 137,  397 => 136,  391 => 132,  383 => 130,  378 => 129,  374 => 128,  370 => 126,  368 => 125,  365 => 124,  360 => 123,  356 => 122,  345 => 113,  343 => 112,  332 => 104,  324 => 99,  309 => 86,  304 => 84,  298 => 83,  293 => 82,  288 => 80,  284 => 79,  280 => 78,  277 => 77,  275 => 76,  272 => 75,  263 => 71,  256 => 69,  253 => 68,  247 => 66,  244 => 65,  238 => 63,  232 => 61,  229 => 60,  226 => 59,  220 => 57,  214 => 55,  211 => 54,  208 => 53,  206 => 52,  199 => 51,  195 => 50,  190 => 48,  187 => 47,  183 => 46,  180 => 45,  178 => 44,  171 => 40,  157 => 28,  122 => 26,  105 => 25,  90 => 21,  80 => 13,  74 => 12,  66 => 11,  58 => 35,  54 => 8,  51 => 7,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
