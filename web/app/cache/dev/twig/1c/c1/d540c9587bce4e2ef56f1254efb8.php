<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductListingDepartmentFilter.html.twig */
class __TwigTemplate_1cc1d540c9587bce4e2ef56f1254efb8 extends Twig_Template
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
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            echo "\t
\t\t<li><input class=\"filter-department\" data-department-id=\"";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" type=\"checkbox\" id=\"filter-department-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" name=\"department-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" value=\"1\" /><label for=\"filter-department-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "productCount"), "html", null, true);
            echo ")</label></li>
\t\t";
            // line 4
            if ($this->getAttribute($this->getContext($context, "department", true), "departments", array(), "any", true, true)) {
                // line 5
                echo "\t\t\t";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "department"), "departments"));
                foreach ($context['_seq'] as $context["_key"] => $context["subDepartment"]) {
                    echo "\t
\t\t\t\t<li class=\"filter-sub-department\"><input class=\"filter-department\" data-department-id=\"";
                    // line 6
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "id"), "html", null, true);
                    echo "\" type=\"checkbox\" id=\"filter-department-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "id"), "html", null, true);
                    echo "\" name=\"department-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "id"), "html", null, true);
                    echo "\" value=\"1\" /><label for=\"filter-department-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "id"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "department"), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "subDepartment"), "productCount"), "html", null, true);
                    echo ")</label></li>
\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subDepartment'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 8
                echo "\t\t";
            }
            // line 9
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 10
        echo "</ul>
<script type=\"text/javascript\">
\t\$(document).ready(function() {
\t\t\$(\"#filter-department :checkbox:not(.no-uniform)\").uniform();
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductListingDepartmentFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 10,  70 => 9,  67 => 8,  49 => 6,  42 => 5,  40 => 4,  26 => 3,  20 => 2,  17 => 1,);
    }
}
