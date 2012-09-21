<?php

/* WebIlluminationShopBundle:Departments:indexScript.js.twig */
class __TwigTemplate_0e53bc104813e3dbfeada49af7cf75bc extends Twig_Template
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
        echo "<script defer=\"defer\" type=\"text/javascript\">
\t";
        // line 3
        echo "\tvar \$productCountLoaded = false;
\tvar \$productsLoaded = false;
\tvar \$productPaginationLoaded = false;
\tvar \$brandFilterLoaded = false;
\tvar \$departmentFilterLoaded = false;
\tvar \$featureFilterLoaded = false;
\tvar \$skipBrandFilter = false;
\tvar \$skipDepartmentFilter = false;
\tvar \$skipPriceFilter = false;
\tvar \$skipFeatureFilter = false;
\t
\t";
        // line 14
        $this->env->loadTemplate("WebIlluminationShopBundle:Departments:indexFunctions.js.twig")->display(array_merge($context, array("url" => $this->getContext($context, "url"), "brand" => $this->getContext($context, "brand"), "department" => $this->getContext($context, "department"))));
        // line 15
        echo "\t
\t\$(document).ready(function() {
\t\tloadDepartment();
\t\t
\t\t\$(\"#sort-order, #results-per-page\").live('change', function() {
\t\t\t\$(\"#current-page\").val('1');
\t\t\t\$skipBrandFilter = true;
\t\t\t\$skipDepartmentFilter = true;
\t\t\t\$skipPriceFilter = true;
\t\t\tloadDepartment();
\t\t});
\t\t
\t\t";
        // line 28
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#current-page\").val(\$(this).attr(\"data-page\"));
\t\t\t\$skipBrandFilter = true;
\t\t\t\$skipDepartmentFilter = true;
\t\t\t\$skipPriceFilter = true;
\t\t\tloadDepartment();
\t\t});
\t\t
\t\t";
        // line 37
        echo "\t\t\$(\".action-show-hide-filter\").live('click', function() {
\t\t\tvar \$filter = \$(this).attr(\"data-filter\");
\t\t\tvar \$filterObject = \$(\"#filter-\"+\$filter+\"-container\");
\t\t\tvar \$filterIconObject = \$(this).find(\".ui-button-icon-primary\");
\t\t\tif (\$filterObject.is(\":hidden\"))
\t\t\t{
\t\t\t\t\$filterObject.slideDown(function() {
\t\t\t\t\t\$filterIconObject.removeClass(\"ui-icon-triangle-1-s\").addClass(\"ui-icon-triangle-1-n\");
\t\t\t\t});
\t\t\t} else {
\t\t\t\t\$filterObject.slideUp(function() {
\t\t\t\t\t\$filterIconObject.removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 54
        echo "\t\t\$(\".action-reset-filter\").live('click', function() {
\t\t\tvar \$filter = \$(this).attr(\"data-filter\");
\t\t\tvar \$filterObject = \$(\"#filter-\"+\$filter+\"-container\");
\t\t\tif (\$filter == 'price')
\t\t\t{
\t\t\t\t\$(\"#filter-price-from\").val(\$(\"#filter-price-reset-from\").val());
\t\t\t\t\$(\"#filter-price-to\").val(\$(\"#filter-price-reset-to\").val());
\t\t\t\t\$(\"#price-range-slider\").slider(\"option\", \"values\", [parseInt(\$(\"#filter-price-reset-from\").val()), parseInt(\$(\"#filter-price-reset-to\").val())]);
\t\t\t} else {
\t\t\t\t\$filterObject.find(\"div.checker span\").each(function() {
\t\t\t\t\t\$(this).removeClass(\"checked\");
\t\t\t\t});
\t\t\t\t\$filterObject.find(\"input[type='checkbox']\").each(function() {
\t\t\t\t\t\$(this).removeAttr(\"checked\");
\t\t\t\t});
\t\t\t\t\$(\"#filter-\"+\$filter+\"s\").val(\"\");
\t\t\t\tif (\$filter == 'brand')
\t\t\t\t{
\t\t\t\t\t\$skipBrandFilter = true;
\t\t\t\t}
\t\t\t\tif (\$filter == 'department')
\t\t\t\t{
\t\t\t\t\t\$skipDepartmentFilter = true;
\t\t\t\t}
\t\t\t\tif (\$filter == 'feature')
\t\t\t\t{
\t\t\t\t\t\$skipFeatureFilter = true;
\t\t\t\t}
\t\t\t\tloadDepartment();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 87
        echo "\t\t\$(\".filter-brand\").live('change', function() {
\t\t\t\$(\"#current-page\").val('1');
\t\t\tvar \$brandsToCollect = \$(\".filter-brand:checked\").length;
\t\t\tvar \$brandsCollected = 0;
\t\t\tvar \$brands = new Array();
\t\t\tif (\$brandsToCollect > 0)
\t\t\t{
\t\t\t\t\$(\".filter-brand:checked\").each(function(index) {
\t\t\t\t\t\$brands[\$brands.length] = \$(this).attr(\"data-brand-id\");
\t\t\t\t\t\$brandsCollected = \$brandsCollected + 1;
\t\t\t\t\tif (\$brandsCollected == \$brandsToCollect)
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#filter-brands\").val(\$brands.join(\",\"));
\t\t\t\t\t\t\$skipPriceFilter = true;
\t\t\t\t\t\t\$skipBrandFilter = true;
\t\t\t\t\t\tloadDepartment();
\t\t\t\t\t}
\t\t\t\t});
\t\t\t} else {
\t\t\t\t\$(\"#filter-brands\").val(\"\");
\t\t\t\t\$skipPriceFilter = true;
\t\t\t\t\$skipBrandFilter = true;
\t\t\t\tloadDepartment();
\t\t\t}
\t\t});\t\t
\t\t
\t\t";
        // line 114
        echo "\t\t\$(\".filter-department\").live('change', function() {
\t\t\t\$(\"#current-page\").val('1');
\t\t\t\$(\".filter-department:checked\").attr(\"checked\", \"\");
\t\t\t\$(\".checker span\").removeClass(\"checked\");
\t\t\tif (\$(this).attr(\"data-department-id\") == \$(\"#filter-departments\").val())
\t\t\t{
\t\t\t\t\$(\"#filter-departments\").val(\"\");
\t\t\t} else {
\t\t\t\t\$(\"#filter-departments\").val(\$(this).attr(\"data-department-id\"));
\t\t\t\t\$(\"#filter-department-\"+\$(\"#filter-departments\").val()).attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-filter-department-\"+\$(\"#filter-departments\").val()+\" span\").addClass(\"checked\");
\t\t\t}
\t\t\t\$skipPriceFilter = true;
\t\t\t\$skipDepartmentFilter = true;
\t\t\tloadDepartment();
\t\t});
\t\t
\t\t";
        // line 132
        echo "\t\t\$(\".filter-feature\").live('change', function() {
\t\t\t\$(\"#current-page\").val('1');
\t\t\tvar \$featuresToCollect = \$(\".filter-feature:checked\").length;
\t\t\tvar \$featuresCollected = 0;
\t\t\tvar \$features = new Array();
\t\t\tif (\$featuresToCollect > 0)
\t\t\t{
\t\t\t\t\$(\".filter-feature:checked\").each(function(index) {
\t\t\t\t\t\$features[\$features.length] = \$(this).attr(\"data-feature-id\");
\t\t\t\t\t\$featuresCollected = \$featuresCollected + 1;
\t\t\t\t\tif (\$featuresCollected == \$featuresToCollect)
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#filter-features\").val(\$features.join(\",\"));
\t\t\t\t\t\t\$skipPriceFilter = true;
\t\t\t\t\t\t\$skipFeatureFilter = true;
\t\t\t\t\t\tloadDepartment();
\t\t\t\t\t}
\t\t\t\t});
\t\t\t} else {
\t\t\t\t\$(\"#filter-features\").val(\"\");
\t\t\t\t\$skipPriceFilter = true;
\t\t\t\t\$skipFeatureFilter = true;
\t\t\t\tloadDepartment();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 159
        echo "\t\t\$(\".filter-feature-group\").live('click', function() {
\t\t\tvar \$showHideButton = \$(this).find(\"span.ui-icon\");
\t\t\tif (\$showHideButton.hasClass(\"ui-icon-plusthick\"))
\t\t\t{
\t\t\t\t\$(\"li[data-feature-group='feature-group-\"+\$(this).attr(\"data-feature-group\")+\"']\").show();
\t\t\t\t\$showHideButton.removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
\t\t\t} else {
\t\t\t\t\$(\"li[data-feature-group='feature-group-\"+\$(this).attr(\"data-feature-group\")+\"']\").hide();
\t\t\t\t\$showHideButton.removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t}
\t\t});
\t\t
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Departments:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  186 => 159,  158 => 132,  139 => 114,  111 => 87,  77 => 54,  59 => 37,  35 => 15,  33 => 14,  20 => 3,  17 => 1,  327 => 133,  322 => 132,  319 => 131,  304 => 120,  294 => 113,  287 => 111,  281 => 110,  275 => 109,  269 => 108,  263 => 107,  252 => 101,  246 => 100,  240 => 99,  234 => 98,  228 => 97,  222 => 96,  216 => 95,  206 => 88,  194 => 79,  187 => 75,  182 => 72,  176 => 69,  174 => 68,  169 => 66,  162 => 62,  157 => 59,  151 => 56,  148 => 55,  142 => 52,  135 => 48,  130 => 45,  124 => 42,  121 => 41,  115 => 39,  113 => 38,  108 => 36,  104 => 35,  97 => 31,  92 => 28,  86 => 25,  84 => 24,  71 => 14,  68 => 13,  65 => 12,  57 => 9,  51 => 7,  49 => 28,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
