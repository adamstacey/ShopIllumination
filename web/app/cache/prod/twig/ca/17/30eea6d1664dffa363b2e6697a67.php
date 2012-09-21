<?php

/* WebIlluminationAdminBundle:Departments:listingFilter.html.twig */
class __TwigTemplate_ca1730eea6d1664dffa363b2e6697a67 extends Twig_Template
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
        echo "<div id=\"listing-filter\" class=\"no-padding-bottom listing-filter ui-helper-hidden\">
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td width=\"13%\" class=\"label\">
\t\t\t\t\t<label>Status</label>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<div class=\"filter-checkbox fl\"><input";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "status"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            if (($this->getContext($context, "status") == "a")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-status\" value=\"a\" />Active</div>
\t\t\t\t\t<div class=\"filter-checkbox fl\"><input";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "status"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            if (($this->getContext($context, "status") == "d")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-status\" value=\"d\" />Disabled</div>
\t\t\t\t\t<div class=\"filter-checkbox fl\"><input";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "status"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
            if (($this->getContext($context, "status") == "h")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-status\" value=\"h\" />Hidden</div>
\t\t\t\t\t<input type=\"hidden\" id=\"filter-status\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "status", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "status"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"13%\">
\t\t\t\t\t<label for=\"filter-name\">Name</label>
\t\t\t\t</td>
\t\t\t\t<td width=\"17%\">
\t\t\t\t\t<input type=\"text\" id=\"filter-name\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "name"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"13%\">
\t\t\t\t\t<label for=\"filter-description\">Description</label>
\t\t\t\t</td>
\t\t\t\t<td width=\"57%\">
\t\t\t\t\t<input type=\"text\" id=\"filter-description\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "description", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "description"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<h5 class=\"no-margin-top margin-bottom-5\">Filter Flags<button class=\"fr ui-corner-none ui-corner-tr button ui-button-blue action-show-hide-filter-section\" data-filter-section=\"flags\" data-icon-primary=\"ui-icon-triangle-1-s\" data-icon-only=\"true\">Filter Flags</button></h5>
\t<div id=\"filter-section-flags\" class=\"filter-section ui-helper-hidden\">
\t\t<div class=\"separator\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"label\" width=\"13%\"><label>Hide Prices</label></td>
\t\t\t\t\t<td width=\"20%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "hidePrices"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["hidePrices"]) {
            if (($this->getContext($context, "hidePrices") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hidePrices'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-hide-prices\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 43
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "hidePrices"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["hidePrices"]) {
            if (($this->getContext($context, "hidePrices") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hidePrices'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-hide-prices\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-hide-prices\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "hidePrices", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "hidePrices"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"14%\"><label>Show Prices Out of Hours</label></td>
\t\t\t\t\t<td width=\"20%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "showPricesOutOfHours"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["showPricesOutOfHours"]) {
            if (($this->getContext($context, "showPricesOutOfHours") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['showPricesOutOfHours'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-show-prices-out-of-hours\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "showPricesOutOfHours"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["showPricesOutOfHours"]) {
            if (($this->getContext($context, "showPricesOutOfHours") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['showPricesOutOfHours'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-show-prices-out-of-hours\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-show-prices-out-of-hours\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "showPricesOutOfHours", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "showPricesOutOfHours"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"13%\"><label>Available to Members</label></td>
\t\t\t\t\t<td width=\"20%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "membershipCardDiscountAvailable"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["membershipCardDiscountAvailable"]) {
            if (($this->getContext($context, "membershipCardDiscountAvailable") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['membershipCardDiscountAvailable'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-membership-card-discount-available\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 55
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "membershipCardDiscountAvailable"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["membershipCardDiscountAvailable"]) {
            if (($this->getContext($context, "membershipCardDiscountAvailable") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['membershipCardDiscountAvailable'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-membership-card-discount-available\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-membership-card-discount-available\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "membershipCardDiscountAvailable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "membershipCardDiscountAvailable"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td rowspan=\"2\" class=\"label\" width=\"13%\"><label>Department</label></td>
\t\t\t\t<td width=\"87%\">
\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t<input placeholder=\"Search for department&hellip;\" type=\"text\" class=\"embedded-icon full\" id=\"filter-department-search\" />
\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td width=\"87%\">
\t\t\t\t\t<div id=\"filter-departments\" class=\"filter filter-scrollable ui-corner-all\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
        // line 77
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            echo "\t
\t\t\t\t\t\t\t\t<li class=\"filter-checkbox\">
\t\t\t\t\t\t\t\t\t<input";
            // line 79
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "department"), "|"));
            foreach ($context['_seq'] as $context["_key"] => $context["selectedDepartment"]) {
                if (($this->getContext($context, "selectedDepartment") == $this->getAttribute($this->getContext($context, "department"), "id"))) {
                    echo " checked=\"checked\"";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedDepartment'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            echo " data-field=\"filter-department\" type=\"checkbox\" id=\"department-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t<label for=\"department-";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\">";
            if (($this->getAttribute($this->getContext($context, "department"), "level") > 0)) {
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute($this->getContext($context, "department"), "level")));
                foreach ($context['_seq'] as $context["_key"] => $context["level"]) {
                    echo "&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['level'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
            }
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "productCount"), "html", null, true);
            echo ")</label>
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 84
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-department\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "department", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "department"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ac\">
\t\t<button class=\"button bottom-button ui-button-green action-update-results\" data-icon-primary=\"ui-icon-refresh\">Update Your Results</button>
\t\t<button class=\"button bottom-button ui-button-red action-clear-filters\" data-icon-primary=\"ui-icon-closethick\">Clear Filters</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:listingFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 56,  184 => 55,  138 => 48,  118 => 43,  105 => 42,  66 => 12,  56 => 32,  115 => 89,  83 => 60,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 11,  36 => 10,  209 => 84,  205 => 82,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 14,  133 => 98,  124 => 41,  111 => 37,  107 => 36,  80 => 26,  69 => 20,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 56,  75 => 24,  71 => 14,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 121,  110 => 118,  96 => 107,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 25,  50 => 7,  25 => 6,  92 => 20,  86 => 28,  79 => 40,  46 => 10,  37 => 4,  33 => 12,  27 => 9,  82 => 27,  72 => 16,  64 => 12,  53 => 11,  49 => 28,  44 => 5,  42 => 24,  34 => 5,  29 => 2,  23 => 3,  19 => 2,  40 => 10,  20 => 2,  30 => 12,  26 => 6,  22 => 3,  224 => 96,  215 => 26,  211 => 88,  204 => 84,  200 => 83,  195 => 80,  193 => 79,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 60,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 44,  126 => 92,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 44,  74 => 27,  57 => 15,  47 => 19,  39 => 4,  32 => 9,  24 => 6,  17 => 1,  135 => 50,  129 => 47,  122 => 122,  116 => 120,  113 => 40,  108 => 117,  104 => 79,  102 => 70,  94 => 70,  89 => 20,  87 => 28,  84 => 53,  81 => 24,  73 => 19,  70 => 40,  67 => 19,  62 => 24,  59 => 21,  55 => 78,  51 => 13,  48 => 25,  41 => 9,  38 => 8,  35 => 7,  31 => 14,  28 => 3,);
    }
}
