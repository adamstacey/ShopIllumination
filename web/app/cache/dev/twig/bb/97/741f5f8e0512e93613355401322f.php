<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductListingFeatureFilter.html.twig */
class __TwigTemplate_bb97741f5f8e0512e93613355401322f extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "featureGroups"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["featureGroup"] => $context["features"]) {
            // line 3
            echo "\t\t";
            if ((twig_length_filter($this->env, $this->getContext($context, "features")) > 0)) {
                // line 4
                echo "\t\t\t<li data-feature-group=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                echo "\" class=\"filter-feature-group\"><span class=\"ui-button-icon-primary ui-icon ui-icon-plusthick\"></span>";
                echo twig_escape_filter($this->env, $this->getContext($context, "featureGroup"), "html", null, true);
                echo "</li>
\t\t\t";
                // line 5
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getContext($context, "features"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
                    // line 6
                    echo "\t\t\t\t<li data-feature-group=\"feature-group-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "loop"), "parent"), "loop"), "index"), "html", null, true);
                    echo "\" class=\"filter-feature ui-helper-hidden\"><input class=\"filter-feature\" data-feature-id=\"";
                    echo twig_escape_filter($this->env, $this->getContext($context, "featureGroup"), "html", null, true);
                    echo ":";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "productFeature"), "html", null, true);
                    echo "\" type=\"checkbox\" id=\"filter-feature-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "loop"), "parent"), "loop"), "index"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" name=\"feature-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "loop"), "parent"), "loop"), "index"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\" value=\"1\" /><label for=\"filter-feature-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "loop"), "parent"), "loop"), "index"), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "loop"), "index"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "productFeature"), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "feature"), "productCount"), "html", null, true);
                    echo ")</label></li>
\t\t\t";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 8
                echo "\t\t";
            }
            // line 9
            echo "\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['featureGroup'], $context['features'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 10
        echo "</ul>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#filter-feature :checkbox:not(.no-uniform)\").uniform();
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductListingFeatureFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 10,  104 => 9,  101 => 8,  64 => 6,  47 => 5,  40 => 4,  37 => 3,  20 => 2,  17 => 1,);
    }
}
