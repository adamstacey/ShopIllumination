<?php

/* WebIlluminationShopBundle:Products:indexScript.js.twig */
class __TwigTemplate_382b2b7c0d48c37d81db91db86e0cf4e extends Twig_Template
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
        echo "<script type=\"text/javascript\" defer=\"defer\">
\t
\t";
        // line 3
        $this->env->loadTemplate("WebIlluminationShopBundle:Products:indexFunctions.js.twig")->display(array_merge($context, array("product" => $this->getContext($context, "product"))));
        // line 4
        echo "\t
\t\$(document).ready(function() {
\t\t";
        // line 7
        echo "\t\tupdateSelectedOptions();
\t\t\$(\".product-option-group\").live('change', function() {
\t\t\tupdateSelectedOptions();
\t\t});
\t\t
\t\t";
        // line 13
        echo "\t\t\$(\".sidebar-tabs\").each(function() {
\t\t\tvar \$minimumSideBarHeight = 3;
\t\t\t\$(this).find(\"li\").each(function() {
\t\t\t\t\$minimumSideBarHeight = \$minimumSideBarHeight + \$(this).outerHeight(true);
\t\t\t});
\t\t\t\$(\".sidebar-tabs\").css(\"min-height\", \$minimumSideBarHeight);
\t\t});
\t\t
\t\t";
        // line 22
        echo "\t\t\$(\".product-thumbnail\").live('hover', function() {
\t\t\t\$(\".product-thumbnail\").removeClass(\"selected\");
\t\t\t\$(this).addClass(\"selected\");
\t\t\t\$(\"#product-image\").attr(\"src\", \$(this).attr(\"data-medium-path\"));
\t\t\t\$(\"#product-image\").attr(\"alt\", \$(this).attr(\"alt\"));
\t\t\t\$(\"#product-image\").attr(\"width\", \$(this).attr(\"data-medium-width\"));
\t\t\t\$(\"#product-image\").attr(\"height\", \$(this).attr(\"data-medium-height\"));
\t\t\t\$(\"#product-image\").attr(\"data-large-path\", \$(this).attr(\"data-large-path\"));
\t\t\t\$(\"#product-image\").attr(\"data-large-width\", \$(this).attr(\"data-large-width\"));
\t\t\t\$(\"#product-image\").attr(\"data-large-height\", \$(this).attr(\"data-large-height\"));
\t\t});
\t\t
\t\t";
        // line 35
        echo "\t\t\$(\"#product-info img.product-image[rel], #product-info img.product-thumbnail[rel], #product-info button.action-larger-view[rel]\").overlay({
\t\t\tcloseOnClick: true,
\t\t\tcloseOnEsc: true,
\t\t\tonBeforeLoad: function() {
\t\t\t\tvar largeImageWidth = parseInt(\$(\"#product-image\").attr(\"data-large-width\"));
\t\t\t\tvar largeImageHeight = parseInt(\$(\"#product-image\").attr(\"data-large-height\"));
\t\t\t\tvar largeImageLeft = (600 - largeImageWidth) / 2;
\t\t\t\tvar largeImageTop = (400 - largeImageHeight) / 2;
\t\t\t\t\$(\"#large-image\").attr(\"src\", \$(\"#product-image\").attr(\"data-large-path\"));
\t\t\t\t\$(\"#large-image\").attr(\"alt\", \$(\"#product-image\").attr(\"alt\"));
\t\t\t\t\$(\"#large-image-title\").html(\$(\"#product-image\").attr(\"alt\"));
\t\t\t\t\$(\"#large-image\").attr(\"width\", largeImageWidth);
\t\t\t\t\$(\"#large-image\").attr(\"height\", largeImageHeight);
\t\t\t\t\$(\"#large-image\").css(\"left\", largeImageLeft);
\t\t\t\t\$(\"#large-image\").css(\"top\", largeImageTop);
\t\t\t\t\$(\"#large-image\").draggable();
\t\t\t}
\t\t});
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 22,  34 => 13,  27 => 7,  23 => 4,  21 => 3,  17 => 1,  486 => 168,  481 => 167,  478 => 166,  472 => 163,  464 => 157,  450 => 156,  447 => 155,  430 => 154,  422 => 148,  420 => 147,  416 => 145,  409 => 141,  403 => 138,  400 => 137,  397 => 136,  391 => 132,  383 => 130,  378 => 129,  374 => 128,  370 => 126,  368 => 125,  365 => 124,  360 => 123,  356 => 122,  345 => 113,  343 => 112,  332 => 104,  324 => 99,  309 => 86,  304 => 84,  298 => 83,  293 => 82,  288 => 80,  284 => 79,  280 => 78,  277 => 77,  275 => 76,  272 => 75,  263 => 71,  256 => 69,  253 => 68,  247 => 66,  244 => 65,  238 => 63,  232 => 61,  229 => 60,  226 => 59,  220 => 57,  214 => 55,  211 => 54,  208 => 53,  206 => 52,  199 => 51,  195 => 50,  190 => 48,  187 => 47,  183 => 46,  180 => 45,  178 => 44,  171 => 40,  157 => 28,  122 => 26,  105 => 25,  90 => 21,  80 => 13,  74 => 12,  66 => 11,  58 => 35,  54 => 8,  51 => 7,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
