<?php

/* WebIlluminationShopBundle:Departments:indexFunctions.js.twig */
class __TwigTemplate_beb74bf4550ac87388d224c8b517e6f5 extends Twig_Template
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
        // line 2
        echo "function loadDepartment()
{
\t\$(\"#ajax-loading\").show();
\t\$productCountLoaded = false;
\t\$productsLoaded = false;
\t\$productPaginationLoaded = false;
\t\$brandFilterLoaded = false;
\t\$departmentFilterLoaded = false;
\t\$priceFilterLoaded = false;
\t\$priceFeatureLoaded = false;
\tloadProductListingCount();
\tloadProductListing();
\tloadProductListingPagination();
\t";
        // line 15
        if (($this->getContext($context, "brand") != "")) {
            // line 16
            echo "\t\t\$brandFilterLoaded = true;
\t";
        } else {
            // line 18
            echo "\t\tif (\$skipBrandFilter)
\t\t{
\t\t\t\$brandFilterLoaded = true;
\t\t\t\$skipBrandFilter = false;
\t\t} else {
\t\t\tloadProductListingBrandFilter();
\t\t}
\t";
        }
        // line 26
        echo "\tif (\$skipDepartmentFilter)
\t{
\t\t\$departmentFilterLoaded = true;
\t\t\$skipDepartmentFilter = false;
\t} else {
\t\tloadProductListingDepartmentFilter();
\t}
\tif (\$skipPriceFilter)
\t{
\t\t\$priceFilterLoaded = true;
\t\t\$skipPriceFilter = false;
\t} else {
\t\tloadProductListingPriceFilter();
\t}
\tif (\$skipFeatureFilter)
\t{
\t\t\$featureFilterLoaded = true;
\t\t\$skipFeatureFilter = false;
\t} else {
\t\tloadProductListingFeatureFilter();
\t}
}

";
        // line 50
        echo "function checkDepartmentLoaded()
{
\tif (\$productCountLoaded && \$productsLoaded && \$productPaginationLoaded && \$brandFilterLoaded && \$departmentFilterLoaded && \$priceFilterLoaded && \$featureFilterLoaded)
\t{
\t\t\$(\"#ajax-loading\").hide();
\t}
}

";
        // line 59
        echo "function loadProductListingCount()
{
\t\$(\"#product-count\").html('<img src=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationshop/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\$.ajax({
\t\ttype: \"GET\",
\t\tdataType: \"json\",
\t\turl: \"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_count"), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\tdepartmentId: ";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#product-count\").html('No Products Found');
\t\t\t\$productCountLoaded = true;
\t\t\tcheckDepartmentLoaded();
  \t\t},
\t\tsuccess: function(data) {
\t\t\tif (data.response == 'success')
    \t\t{
    \t\t\tvar \$productCount = parseInt(data.productCount);
    \t\t\tif ((\$productCount > 1) || (\$productCount < 1))
    \t\t\t{
    \t\t\t\tif (\$productCount < 1)
    \t\t\t\t{
    \t\t\t\t\t\$(\"#product-count\").html('No Products Found');
    \t\t\t\t} else {
        \t\t\t\t\$(\"#product-count\").html('Found '+\$productCount+' Products');
        \t\t\t}
    \t\t\t} else {
    \t\t\t\t\$(\"#product-count\").html('Found 1 Product');
    \t\t\t}
        \t} else {
\t    \t\t\$(\"#product-count\").html('No Products Found');
    \t\t}
    \t\t\$productCountLoaded = true;
    \t\tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 104
        echo "function loadProductListing()
{
\tif (\$(\"#products\").height() > 0)
\t{
\t\t\$(\"#products-loading\").height(\$(\"#products\").height());
\t}
\t\$(\"#products-loading\").show();
\t\$(\"#products\").hide().html(\"\");
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 114
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing"), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\turl: \"";
        // line 116
        echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
        echo "\",
\t\t\tdepartmentId: ";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tsortOrder: \$(\"#sort-order\").val(),
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val(),
\t\t\tpage: \$(\"#current-page\").val(),
\t\t\tmaxResults: \$(\"#results-per-page\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#products-loading\").hide();
\t\t\t\$(\"#products\").html('<p class=\"no-results\">Sorry, no products match your criteria.</p>').fadeIn();
\t\t\t\$productsLoaded = true;
\t\t\tcheckDepartmentLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#products-loading\").hide();
\t\t\t\$(\"#products\").html(data).fadeIn();
    \t   \t\$productsLoaded = true;
        \tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 143
        echo "function loadProductListingPagination()
{
\t\$(\"#product-pagination-top, #product-pagination-bottom\").hide().html(\"\");
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_pagination"), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\turl: '";
        // line 150
        echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
        echo "',
\t\t\tbrand: '";
        // line 151
        echo twig_escape_filter($this->env, $this->getContext($context, "brand"), "html", null, true);
        echo "',
\t\t\tdepartmentId: ";
        // line 152
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tpage: \$(\"#current-page\").val(),
\t\t\tmaxResults: \$(\"#results-per-page\").val(),
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#product-pagination-top, #product-pagination-bottom\").hide().html(\"\");
\t\t\t\$productPaginationLoaded = true;
\t\t\tcheckDepartmentLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#product-pagination-top, #product-pagination-bottom\").html(data).fadeIn();
        \t\$productPaginationLoaded = true;
        \tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 175
        echo "function loadProductListingBrandFilter()
{
\tif (\$(\"#filter-brand\").height() > 0)
\t{
\t\tif (\$(\"#filter-brand\").height() > \$(\"#filter-brand-loading\").height())
\t\t{
\t\t\t\$(\"#filter-brand-loading\").height(\$(\"#filter-brand\").height());
\t\t}
\t}
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 186
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_brand_filter"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#filter-brand-container\").show();
\t\t\t\$(\"#filter-brand-loading\").show();
\t\t\t\$(\"#filter-brand\").html(\"\").hide();
\t\t},
\t\tdata: {
\t\t\tdepartmentId: ";
        // line 193
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#filter-brand-container\").hide();
\t\t\t\$(\"button[data-filter='brand'] .ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t\$(\"#filter-brand-loading\").hide();
\t\t\t\$(\"#filter-brand\").html('<p class=\"no-results\">Sorry, no brands are available.</p>').fadeIn();
\t\t\t\$brandFilterLoaded = true;
\t\t\t\$skipBrandFilter = false;
\t\t\tcheckDepartmentLoaded();
  \t\t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#filter-brand-loading\").hide();
\t\t\t\$(\"#filter-brand\").html(data).fadeIn();
    \t\t\$brandFilterLoaded = true;
    \t\t\$skipBrandFilter = false;
    \t\tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 220
        echo "function loadProductListingDepartmentFilter()
{
\tif (\$(\"#filter-department\").height() > 0)
\t{
\t\tif (\$(\"#filter-department\").height() > \$(\"#filter-department-loading\").height())
\t\t{
\t\t\t\$(\"#filter-department-loading\").height(\$(\"#filter-department\").height());
\t\t}
\t}
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_department_filter"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#filter-department-container\").show();
\t\t\t\$(\"#filter-department-loading\").show();
\t\t\t\$(\"#filter-department\").html(\"\").hide();
\t\t},
\t\tdata: {
\t\t\tdepartmentId: ";
        // line 238
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#filter-department-container\").hide();
\t\t\t\$(\"button[data-filter='department'] .ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t\$(\"#filter-department-loading\").hide();
\t\t\t\$(\"#filter-department\").html('<p class=\"no-results\">Sorry, no departments are available.</p>').fadeIn();
\t\t\t\$departmentFilterLoaded = true;
\t\t\t\$skipDepartmentFilter = false;
\t\t\tcheckDepartmentLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#filter-department-loading\").hide();
\t\t\t\$(\"#filter-department\").html(data).fadeIn();
\t\t\t\$(\"#filter-department-\"+\$(\"#filter-departments\").val()).attr(\"checked\", \"checked\");
\t\t\t\$(\"#uniform-filter-department-\"+\$(\"#filter-departments\").val()+\" span\").addClass(\"checked\");
        \t\$departmentFilterLoaded = true;
        \t\$skipDepartmentFilter = false;
        \tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 267
        echo "function loadProductListingPriceFilter()
{
\tif (\$(\"#filter-price\").height() > 0)
\t{
\t\tif (\$(\"#filter-price\").height() > \$(\"#filter-price-loading\").height())
\t\t{
\t\t\t\$(\"#filter-price-loading\").height(\$(\"#filter-price\").height());
\t\t}
\t}
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 278
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_price_filter"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#filter-price-container\").show();
\t\t\t\$(\"#filter-price-loading\").show();
\t\t\t\$(\"#filter-price\").html(\"\").hide();
\t\t},
\t\tdata: {
\t\t\tdepartmentId: ";
        // line 285
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#filter-price-container\").hide();
\t\t\t\$(\"button[data-filter='price'] .ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t\$(\"#filter-price-loading\").hide();
\t\t\t\$(\"#filter-price\").html('<p class=\"no-results\">Sorry, no prices are available.</p>').fadeIn();
\t\t\t\$priceFilterLoaded = true;
\t\t\t\$skipPriceFilter = false;
\t\t\tcheckDepartmentLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#filter-price-loading\").hide();
\t\t\t\$(\"#filter-price\").html(data).fadeIn();
        \t\$priceFilterLoaded = true;
        \t\$skipPriceFilter = false;
        \tcheckDepartmentLoaded();
\t\t}
\t});
}

";
        // line 312
        echo "function loadProductListingFeatureFilter()
{
\tif (\$(\"#filter-feature\").height() > 0)
\t{
\t\tif (\$(\"#filter-feature\").height() > \$(\"#filter-feature-loading\").height())
\t\t{
\t\t\t\$(\"#filter-feature-loading\").height(\$(\"#filter-feature\").height());
\t\t}
\t}
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_listing_feature_filter"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\t\$(\"#filter-feature-container\").show();
\t\t\t\$(\"#filter-feature-loading\").show();
\t\t\t\$(\"#filter-feature\").html(\"\").hide();
\t\t},
\t\tdata: {
\t\t\tdepartmentId: ";
        // line 330
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
        echo ",
\t\t\tbrands: \$(\"#filter-brands\").val(),
\t\t\tdepartments: \$(\"#filter-departments\").val(),
\t\t\tfeatures: \$(\"#filter-features\").val(),
\t\t\tpriceFrom: \$(\"#filter-price-from\").val(),
\t\t\tpriceTo: \$(\"#filter-price-to\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#filter-feature-container\").hide();
\t\t\t\$(\"button[data-filter='feature'] .ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t\$(\"#filter-feature-loading\").hide();
\t\t\t\$(\"#filter-feature\").html('<p class=\"no-results\">Sorry, no features are available.</p>').fadeIn();
\t\t\t\$featureFilterLoaded = true;
\t\t\t\$skipFeatureFilter = false;
\t\t\tcheckDepartmentLoaded();
  \t\t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#filter-feature-loading\").hide();
\t\t\t\$(\"#filter-feature\").html(data).fadeIn();
    \t\t\$featureFilterLoaded = true;
    \t\t\$skipFeatureFilter = false;
    \t\tcheckDepartmentLoaded();
\t\t}
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Departments:indexFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  413 => 330,  403 => 323,  390 => 312,  361 => 285,  351 => 278,  338 => 267,  307 => 238,  297 => 231,  284 => 220,  255 => 193,  245 => 186,  232 => 175,  207 => 152,  203 => 151,  199 => 150,  159 => 117,  155 => 116,  150 => 114,  138 => 104,  99 => 67,  94 => 65,  87 => 61,  83 => 59,  73 => 50,  48 => 26,  38 => 18,  34 => 16,  32 => 15,  186 => 159,  158 => 132,  139 => 114,  111 => 87,  77 => 54,  59 => 37,  35 => 15,  33 => 14,  20 => 3,  17 => 2,  327 => 133,  322 => 132,  319 => 131,  304 => 120,  294 => 113,  287 => 111,  281 => 110,  275 => 109,  269 => 108,  263 => 107,  252 => 101,  246 => 100,  240 => 99,  234 => 98,  228 => 97,  222 => 96,  216 => 95,  206 => 88,  194 => 148,  187 => 143,  182 => 72,  176 => 69,  174 => 68,  169 => 66,  162 => 62,  157 => 59,  151 => 56,  148 => 55,  142 => 52,  135 => 48,  130 => 45,  124 => 42,  121 => 41,  115 => 39,  113 => 38,  108 => 36,  104 => 35,  97 => 31,  92 => 28,  86 => 25,  84 => 24,  71 => 14,  68 => 13,  65 => 12,  57 => 9,  51 => 7,  49 => 28,  45 => 5,  40 => 4,  37 => 3,  29 => 2,);
    }
}
