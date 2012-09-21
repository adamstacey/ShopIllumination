<?php

/* WebIlluminationShopBundle:Products:ajaxGetProductListingPagination.html.twig */
class __TwigTemplate_e715c7f0a534e8f855108db06710e410 extends Twig_Template
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
        if (($this->getContext($context, "productPagination") > 1)) {
            // line 2
            echo "\t<div class=\"pagination-container\">
\t\t<div class=\"fr\">
\t\t\t<ul class=\"pagination clearfix\">
\t\t\t\t";
            // line 5
            if (($this->getContext($context, "page") > 1)) {
                // line 6
                echo "\t\t\t\t\t<li class=\"page-navigation\" data-page=\"1\"><a href=\"Javascript:void(0);\">First</a></li>
\t\t\t\t\t<li class=\"page-navigation\" data-page=\"";
                // line 7
                echo twig_escape_filter($this->env, $this->getContext($context, "previousPage"), "html", null, true);
                echo "\"><a href=\"Javascript:void(0);\">&laquo;</a></li>
\t\t\t\t";
            }
            // line 9
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "productPagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["productPage"]) {
                // line 10
                echo "\t\t\t    \t<li data-page=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "productPage"), "html", null, true);
                echo "\" class=\"page";
                if (($this->getContext($context, "page") == $this->getContext($context, "productPage"))) {
                    echo " current";
                }
                echo "\"><a href=\"Javascript:void(0);\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "productPage"), "html", null, true);
                echo "</a></li>
\t\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productPage'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 12
            echo "\t\t\t    ";
            if (($this->getContext($context, "page") < $this->getContext($context, "productPagination"))) {
                // line 13
                echo "\t\t\t\t    <li class=\"page-navigation\" data-page=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "nextPage"), "html", null, true);
                echo "\"><a href=\"Javascript:void(0);\">&raquo;</a></li>
\t\t\t\t\t<li class=\"page-navigation\" data-page=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getContext($context, "productPagination"), "html", null, true);
                echo "\"><a href=\"Javascript:void(0);\">&hellip;";
                echo twig_escape_filter($this->env, $this->getContext($context, "productPagination"), "html", null, true);
                echo "</a></li>
\t\t\t\t";
            }
            // line 16
            echo "\t\t\t\t";
            if (($this->getContext($context, "brand") != "")) {
                // line 17
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_with_brand_all", array("url" => $this->getContext($context, "url"), "brand" => $this->getContext($context, "brand"))), "html", null, true);
                echo "\">VIEW ALL</a></li>
\t\t\t\t";
            } else {
                // line 19
                echo "\t\t\t\t\t<li><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("department_all", array("url" => $this->getContext($context, "url"))), "html", null, true);
                echo "\">VIEW ALL</a></li>
\t\t\t\t";
            }
            // line 21
            echo "\t\t\t</ul>
\t\t</div>\t
\t\t<div class=\"clear\"></div>
\t</div>
\t<div class=\"clear\"></div>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
            // line 28
            if (($this->getContext($context, "productPagination") > 5)) {
                // line 29
                echo "\t\t\t\tvar \$currentPage = ";
                echo twig_escape_filter($this->env, $this->getContext($context, "page"), "html", null, true);
                echo ";
\t\t\t\tvar \$pageNumbersDisplayed = 1;
\t\t\t\tvar \$pageNumbersToDisplay = 5;
\t\t\t\tvar \$pageRound = 1;
\t\t\t\t\$(\"li.page\").hide();
\t\t\t\t\$(\"li.page[data-page='\"+\$currentPage.toString()+\"']\").show();
\t\t\t\twhile (\$pageNumbersDisplayed < \$pageNumbersToDisplay)
\t\t\t\t{
\t\t\t\t\tvar \$previousPage = \$currentPage - \$pageRound;
\t\t\t\t\tvar \$nextPage = \$currentPage + \$pageRound;
\t\t\t\t\tif (\$(\"li.page[data-page='\"+\$previousPage.toString()+\"']\").length > 0)
\t\t\t\t\t{
\t\t\t\t\t\tif (\$pageNumbersDisplayed < \$pageNumbersToDisplay)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"li.page[data-page='\"+\$previousPage.toString()+\"']\").show();
\t\t\t\t\t\t\t\$pageNumbersDisplayed++;
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t\tif (\$(\"li.page[data-page='\"+\$nextPage.toString()+\"']\").length > 0)
\t\t\t\t\t{
\t\t\t\t\t\tif (\$pageNumbersDisplayed < \$pageNumbersToDisplay)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"li.page[data-page='\"+\$nextPage.toString()+\"']\").show();
\t\t\t\t\t\t\t\$pageNumbersDisplayed++;
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t\t\$pageRound++;
\t\t\t\t}
\t\t\t";
            }
            // line 58
            echo "\t\t\t
\t\t\t\$(\".pagination :checkbox:not(.no-uniform), .pagination :radio:not(.no-uniform), .pagination select:not(.no-uniform), .pagination :file:not(.no-uniform)\").uniform();
\t\t\t\t\$(\".pagination .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t\t});
\t</script>
";
        }
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Products:ajaxGetProductListingPagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 58,  95 => 29,  93 => 28,  84 => 21,  78 => 19,  72 => 17,  69 => 16,  62 => 14,  57 => 13,  54 => 12,  39 => 10,  34 => 9,  29 => 7,  26 => 6,  24 => 5,  19 => 2,  17 => 1,);
    }
}
