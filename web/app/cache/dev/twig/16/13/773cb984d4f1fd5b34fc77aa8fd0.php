<?php

/* WebIlluminationShopBundle:Basket:ajaxGetBasketSummary.html.twig */
class __TwigTemplate_1613773cb984d4f1fd5b34fc77aa8fd0 extends Twig_Template
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
        echo "<p class=\"fl\">Items: <strong>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "items"), "html", null, true);
        echo "</strong><br />Total: <strong>&pound;";
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "subTotal"), 2), "html", null, true);
        echo "</strong></p>
";
        // line 2
        if (($this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "totals"), "items") > 0)) {
            // line 3
            echo "\t<a title=\"Go to checkout\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_secure_checkout"), "html", null, true);
            echo "\" class=\"button ui-button-green\">Pay Now</a>
\t<a title=\"View your basket\" href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("basket_your_basket"), "html", null, true);
            echo "\" class=\"button ui-button-blue\">View</a>
";
        }
        // line 6
        echo "<script defer=\"defer\" type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#basket-summary-content :checkbox:not(.no-uniform), #basket-summary-content :radio:not(.no-uniform), #basket-summary-content select:not(.no-uniform), #basket-summary-content :file:not(.no-uniform)\").uniform();
\t\t\$(\"#basket-summary-content .button\").each(function () {
            \$(this).button({
            \ticons: {
                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
                }, 
               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
        \t});
        });
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Basket:ajaxGetBasketSummary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 6,  31 => 4,  26 => 3,  24 => 2,  17 => 1,);
    }
}
