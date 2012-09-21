<?php

/* WebIlluminationAdminBundle:Products:listingFilter.html.twig */
class __TwigTemplate_758cf24c1b1b29feba87d1e87041b25a extends Twig_Template
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
\t\t\t\t<td width=\"15%\" class=\"label\">
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
\t\t\t\t<td class=\"label\" width=\"15%\">
\t\t\t\t\t<label for=\"filter-product-code\">Product Code</label>
\t\t\t\t</td>
\t\t\t\t<td width=\"15%\">
\t\t\t\t\t<input type=\"text\" id=\"filter-product-code\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "productCode", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "productCode"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"15%\">
\t\t\t\t\t<label for=\"filter-name\">Name</label>
\t\t\t\t</td>
\t\t\t\t<td width=\"15%\">
\t\t\t\t\t<input type=\"text\" id=\"filter-name\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "name"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"15%\">
\t\t\t\t\t<label for=\"filter-description\">Description</label>
\t\t\t\t</td>
\t\t\t\t<td width=\"25%\">
\t\t\t\t\t<input type=\"text\" id=\"filter-description\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "description", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "description"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<h5 class=\"no-margin-top margin-bottom-5\">Filter Prices<button class=\"fr ui-corner-none ui-corner-tr button ui-button-blue action-show-hide-filter-section\" data-filter-section=\"prices\" data-icon-primary=\"ui-icon-triangle-1-s\" data-icon-only=\"true\">Filter Prices</button></h5>
\t<div id=\"filter-section-prices\" class=\"filter-section ui-helper-hidden\">
\t\t<div class=\"separator\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Cost Price:</label></td>
\t\t\t\t\t<td width=\"40%\">
\t\t\t\t\t\t<div class=\"range-slider-values\">
\t\t\t\t\t\t\t<span>&pound;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"from-value\" value=\"\" />
\t\t\t\t\t\t\t<span>&nbsp;-&nbsp;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"to-value\" value=\"\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div data-from=\"";
        // line 54
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "costPriceFrom", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "costPriceFrom"), "0")) : ("0")), "html", null, true);
        echo "\" data-to=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "costPriceTo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "costPriceTo"), "10000")) : ("10000")), "html", null, true);
        echo "\" id=\"filter-cost-price\" class=\"range-slider\"></div>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>RRP:</label></td>
\t\t\t\t\t<td width=\"40%\">
\t\t\t\t\t\t<div class=\"range-slider-values\">
\t\t\t\t\t\t\t<span>&pound;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"from-value\" value=\"\" />
\t\t\t\t\t\t\t<span>&nbsp;-&nbsp;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"to-value\" value=\"\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div data-from=\"";
        // line 64
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "recommendedRetailPriceFrom", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "recommendedRetailPriceFrom"), "0")) : ("0")), "html", null, true);
        echo "\" data-to=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "recommendedRetailPriceTo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "recommendedRetailPriceTo"), "10000")) : ("10000")), "html", null, true);
        echo "\" id=\"filter-recommended-retail-price\" class=\"range-slider\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>List Price:</label></td>
\t\t\t\t\t<td width=\"40%\">
\t\t\t\t\t\t<div class=\"range-slider-values\">
\t\t\t\t\t\t\t<span>&pound;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"from-value\" value=\"\" />
\t\t\t\t\t\t\t<span>&nbsp;-&nbsp;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"to-value\" value=\"\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div data-from=\"";
        // line 76
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "listPriceFrom", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "listPriceFrom"), "0")) : ("0")), "html", null, true);
        echo "\" data-to=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "listPriceTo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "listPriceTo"), "10000")) : ("10000")), "html", null, true);
        echo "\" id=\"filter-list-price\" class=\"range-slider\"></div>
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Discount:</label></td>
\t\t\t\t\t<td width=\"40%\">
\t\t\t\t\t\t<div class=\"range-slider-values\">
\t\t\t\t\t\t\t<span>&pound;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"from-value\" value=\"\" />
\t\t\t\t\t\t\t<span>&nbsp;-&nbsp;</span>
\t\t\t\t\t\t\t<input type=\"text\" class=\"to-value\" value=\"\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div data-from=\"";
        // line 86
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "discountFrom", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "discountFrom"), "0")) : ("0")), "html", null, true);
        echo "\" data-to=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "discountTo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "discountTo"), "1000")) : ("1000")), "html", null, true);
        echo "\" id=\"filter-discount\" class=\"range-slider\"></div>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div>
\t<h5 class=\"no-margin-top margin-bottom-5\">Filter Flags<button class=\"fr ui-corner-none ui-corner-tr button ui-button-blue action-show-hide-filter-section\" data-filter-section=\"flags\" data-icon-primary=\"ui-icon-triangle-1-s\" data-icon-only=\"true\">Filter Flags</button></h5>
\t<div id=\"filter-section-flags\" class=\"filter-section ui-helper-hidden\">
\t\t<div class=\"separator\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Available for Purchase</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 99
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "availableForPurchase"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["availableForPurchase"]) {
            if (($this->getContext($context, "availableForPurchase") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['availableForPurchase'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-available-for-purchase\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 100
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "availableForPurchase"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["availableForPurchase"]) {
            if (($this->getContext($context, "availableForPurchase") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['availableForPurchase'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-available-for-purchase\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-available-for-purchase\" value=\"";
        // line 101
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "availableForPurchase", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "availableForPurchase"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Hide Price</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 105
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "hidePrice"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["hidePrice"]) {
            if (($this->getContext($context, "hidePrice") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hidePrice'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-hide-price\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 106
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "hidePrice"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["hidePrice"]) {
            if (($this->getContext($context, "hidePrice") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hidePrice'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-hide-price\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-hide-price\" value=\"";
        // line 107
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "hidePrice", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "hidePrice"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Show Price Out of Hours</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 111
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "showPriceOutOfHours"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["showPriceOutOfHours"]) {
            if (($this->getContext($context, "showPriceOutOfHours") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['showPriceOutOfHours'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-show-price-out-of-hours\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 112
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "showPriceOutOfHours"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["showPriceOutOfHours"]) {
            if (($this->getContext($context, "showPriceOutOfHours") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['showPriceOutOfHours'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-show-price-out-of-hours\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-show-price-out-of-hours\" value=\"";
        // line 113
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "showPriceOutOfHours", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "showPriceOutOfHours"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Available to Members</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 117
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
        // line 118
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
        // line 119
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "membershipCardDiscountAvailable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "membershipCardDiscountAvailable"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Feature Comparison</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 123
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "featureComparison"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["featureComparison"]) {
            if (($this->getContext($context, "featureComparison") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['featureComparison'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-feature-comparison\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 124
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "featureComparison"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["featureComparison"]) {
            if (($this->getContext($context, "featureComparison") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['featureComparison'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-feature-comparison\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-feature-comparison\" value=\"";
        // line 125
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "featureComparison", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "featureComparison"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t\t<div class=\"separator\">
\t\t\t<table width=\"100%\">
\t\t\t\t<tr>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Download</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 135
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "downloadable"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["downloadable"]) {
            if (($this->getContext($context, "downloadable") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['downloadable'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-downloadable\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 136
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "downloadable"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["downloadable"]) {
            if (($this->getContext($context, "downloadable") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['downloadable'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-downloadable\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-downloadable\" value=\"";
        // line 137
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "downloadable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "downloadable"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Special Offer</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 141
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "specialOffer"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["specialOffer"]) {
            if (($this->getContext($context, "specialOffer") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['specialOffer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-special-offer\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 142
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "specialOffer"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["specialOffer"]) {
            if (($this->getContext($context, "specialOffer") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['specialOffer'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-special-offer\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-special-offer\" value=\"";
        // line 143
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "specialOffer", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "specialOffer"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Recommend</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 147
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "recommended"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["recommended"]) {
            if (($this->getContext($context, "recommended") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recommended'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-recommended\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 148
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "recommended"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["recommended"]) {
            if (($this->getContext($context, "recommended") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recommended'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-recommended\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-recommended\" value=\"";
        // line 149
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "recommended", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "recommended"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>Accessory</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 153
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "accessory"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["accessory"]) {
            if (($this->getContext($context, "accessory") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['accessory'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-accessory\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 154
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "accessory"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["accessory"]) {
            if (($this->getContext($context, "accessory") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['accessory'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-accessory\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-accessory\" value=\"";
        // line 155
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "accessory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "accessory"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t\t<td class=\"label\" width=\"10%\"><label>New</label></td>
\t\t\t\t\t<td width=\"10%\">
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 159
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "new"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
            if (($this->getContext($context, "new") == "1")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['new'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-new\" value=\"1\" />Yes</div>
\t\t\t\t\t\t<div class=\"filter-checkbox\"><input";
        // line 160
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "new"), "|"));
        foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
            if (($this->getContext($context, "new") == "0")) {
                echo " checked=\"checked\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['new'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        echo " type=\"checkbox\" data-field=\"filter-new\" value=\"0\" />No</div>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-new\" value=\"";
        // line 161
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "new", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "new"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</table>
\t\t</div>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td rowspan=\"2\" class=\"label\" width=\"10%\"><label>Brand</label></td>
\t\t\t\t<td width=\"20%\">
\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t<input placeholder=\"Search for brand&hellip;\" type=\"text\" class=\"embedded-icon full\" id=\"filter-brand-search\" />
\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t\t<td rowspan=\"2\" class=\"label\" width=\"10%\"><label>Department</label></td>
\t\t\t\t<td width=\"60%\">
\t\t\t\t\t<div class=\"position-relative\">
\t\t\t\t\t\t<input placeholder=\"Search for department&hellip;\" type=\"text\" class=\"embedded-icon full\" id=\"filter-department-search\" />
\t\t\t\t\t\t<span class=\"icon-embedded ui-button-icon-primary ui-icon ui-icon-search no-margin\"></span>
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td width=\"20%\">
\t\t\t\t\t<div id=\"filter-brands\" class=\"filter filter-scrollable ui-corner-all\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
        // line 189
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "brands"));
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            echo "\t
\t\t\t\t\t\t\t\t<li class=\"filter-checkbox\">
\t\t\t\t\t\t\t\t\t<input";
            // line 191
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->env->getExtension('twig_extensions')->filter_explode($this->getAttribute($this->getContext($context, "filters"), "brand"), "|"));
            foreach ($context['_seq'] as $context["_key"] => $context["selectedBrand"]) {
                if (($this->getContext($context, "selectedBrand") == $this->getAttribute($this->getContext($context, "brand"), "id"))) {
                    echo " checked=\"checked\"";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedBrand'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            echo " data-field=\"filter-brand\" type=\"checkbox\" id=\"brand-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t<label for=\"brand-";
            // line 192
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 196
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-brand\" value=\"";
        // line 197
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "filters", true), "brand", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "filters", true), "brand"), "")) : ("")), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t</td>
\t\t\t\t<td width=\"60%\">
\t\t\t\t\t<div id=\"filter-departments\" class=\"filter filter-scrollable ui-corner-all\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
        // line 203
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "departments"));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            echo "\t
\t\t\t\t\t\t\t\t<li class=\"filter-checkbox\">
\t\t\t\t\t\t\t\t\t<input";
            // line 205
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
            // line 206
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
        // line 210
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t\t<input type=\"hidden\" id=\"filter-department\" value=\"";
        // line 211
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
        return "WebIlluminationAdminBundle:Products:listingFilter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  644 => 211,  641 => 210,  617 => 206,  600 => 205,  593 => 203,  584 => 197,  581 => 196,  569 => 192,  552 => 191,  545 => 189,  514 => 161,  501 => 160,  488 => 159,  481 => 155,  468 => 154,  455 => 153,  448 => 149,  435 => 148,  422 => 147,  415 => 143,  402 => 142,  389 => 141,  382 => 137,  369 => 136,  356 => 135,  343 => 125,  330 => 124,  317 => 123,  310 => 119,  297 => 118,  284 => 117,  277 => 113,  264 => 112,  251 => 111,  244 => 107,  231 => 106,  218 => 105,  211 => 101,  198 => 100,  185 => 99,  167 => 86,  152 => 76,  135 => 64,  99 => 36,  90 => 30,  81 => 24,  53 => 11,  40 => 10,  27 => 9,  17 => 1,  142 => 56,  137 => 55,  134 => 54,  123 => 46,  120 => 54,  110 => 38,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 12,  60 => 9,  55 => 8,  52 => 7,  46 => 5,  41 => 4,  38 => 3,  30 => 2,);
    }
}
