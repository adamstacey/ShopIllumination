<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductListingBrandFilter.html.twig */
class __TwigTemplate_8cd01993d0c4da543281c8f200b087f9 extends Twig_Template
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
        echo "<ul>
\t";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "brands"));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            echo "\t
\t\t<li><input";
            // line 3
            if ($this->getAttribute($this->getContext($context, "brand"), "selected")) {
                echo " checked=\"checked\"";
            }
            echo " class=\"filter-brand\" data-brand-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" id=\"filter-brand-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\" name=\"brand-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\" value=\"1\" /><label for=\"filter-brand-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "productCount"), "html", null, true);
            echo ")</label></li>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 5
        echo "</ul>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#filter-brand :checkbox:not(.no-uniform)\").uniform();
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductListingBrandFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 5,  26 => 3,  20 => 2,  17 => 1,);
    }
}
