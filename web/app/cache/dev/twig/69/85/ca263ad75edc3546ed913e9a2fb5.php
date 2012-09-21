<?php

/* WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig */
class __TwigTemplate_6985ca263ad75edc3546ed913e9a2fb5 extends Twig_Template
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
        if (($this->getContext($context, "pagination") > 1)) {
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
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["listingPage"]) {
                // line 10
                echo "\t\t\t    \t<li data-page=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "listingPage"), "html", null, true);
                echo "\" class=\"page";
                if (($this->getContext($context, "page") == $this->getContext($context, "listingPage"))) {
                    echo " current";
                }
                echo "\"><a href=\"Javascript:void(0);\">";
                echo twig_escape_filter($this->env, $this->getContext($context, "listingPage"), "html", null, true);
                echo "</a></li>
\t\t\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listingPage'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 12
            echo "\t\t\t    ";
            if (($this->getContext($context, "page") < $this->getContext($context, "pagination"))) {
                // line 13
                echo "\t\t\t\t    <li class=\"page-navigation\" data-page=\"";
                echo twig_escape_filter($this->env, $this->getContext($context, "nextPage"), "html", null, true);
                echo "\"><a href=\"Javascript:void(0);\">&raquo;</a></li>
\t\t\t\t\t<li class=\"page-navigation\" data-page=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination"), "html", null, true);
                echo "\"><a href=\"Javascript:void(0);\">&hellip;";
                echo twig_escape_filter($this->env, $this->getContext($context, "pagination"), "html", null, true);
                echo "</a></li>
\t\t\t\t";
            }
            // line 16
            echo "\t\t\t</ul>
\t\t</div>\t
\t\t<div class=\"clear\"></div>
\t</div>
\t<div class=\"clear\"></div>
\t<script type=\"text/javascript\">
\t\t\$(document).ready(function() {
\t\t\t";
            // line 23
            if (($this->getContext($context, "pagination") > 5)) {
                // line 24
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
            // line 53
            echo "\t\t\t\$(\".pagination :checkbox:not(.no-uniform), .pagination :radio:not(.no-uniform), .pagination select:not(.no-uniform), .pagination :file:not(.no-uniform)\").uniform();
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
        return "WebIlluminationAdminBundle:System:ajaxGetListingPagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 53,  80 => 24,  78 => 23,  69 => 16,  62 => 14,  57 => 13,  54 => 12,  39 => 10,  34 => 9,  29 => 7,  26 => 6,  24 => 5,  19 => 2,  17 => 1,);
    }
}
