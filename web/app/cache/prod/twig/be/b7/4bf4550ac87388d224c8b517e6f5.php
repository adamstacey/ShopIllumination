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
        return array (  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 464,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 403,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 182,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 110,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 169,  396 => 163,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 199,  486 => 191,  473 => 428,  470 => 142,  466 => 424,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 138,  312 => 264,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 196,  501 => 194,  499 => 204,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 123,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 172,  229 => 85,  206 => 88,  147 => 71,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 147,  344 => 301,  219 => 99,  273 => 86,  263 => 107,  246 => 100,  234 => 98,  217 => 69,  173 => 58,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 189,  232 => 175,  212 => 177,  207 => 152,  143 => 71,  157 => 59,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 167,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 307,  306 => 256,  271 => 104,  253 => 203,  233 => 204,  226 => 64,  187 => 143,  150 => 114,  260 => 91,  155 => 116,  223 => 179,  186 => 159,  169 => 66,  301 => 85,  298 => 180,  292 => 243,  267 => 109,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 111,  174 => 68,  182 => 72,  175 => 98,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 151,  114 => 20,  208 => 92,  183 => 75,  166 => 94,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 323,  395 => 155,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 151,  359 => 154,  355 => 227,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 109,  265 => 108,  251 => 111,  199 => 150,  191 => 149,  170 => 143,  210 => 93,  180 => 55,  172 => 53,  168 => 52,  149 => 47,  139 => 114,  240 => 99,  230 => 93,  121 => 41,  257 => 225,  249 => 74,  106 => 42,  334 => 269,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 113,  198 => 62,  181 => 101,  167 => 127,  160 => 50,  45 => 5,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 154,  376 => 339,  367 => 149,  360 => 320,  352 => 225,  338 => 267,  333 => 141,  327 => 133,  324 => 289,  320 => 168,  297 => 231,  274 => 126,  256 => 86,  254 => 74,  252 => 101,  231 => 114,  216 => 95,  213 => 175,  202 => 94,  458 => 139,  453 => 177,  448 => 298,  437 => 168,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 132,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 220,  270 => 122,  266 => 220,  261 => 228,  247 => 88,  243 => 211,  238 => 107,  220 => 79,  201 => 87,  194 => 148,  130 => 45,  100 => 74,  85 => 14,  76 => 23,  112 => 30,  101 => 33,  98 => 37,  272 => 118,  269 => 108,  228 => 97,  221 => 93,  197 => 169,  184 => 56,  138 => 104,  118 => 92,  105 => 26,  66 => 24,  56 => 18,  115 => 39,  83 => 59,  164 => 44,  140 => 41,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 173,  205 => 63,  196 => 59,  192 => 81,  189 => 106,  178 => 145,  176 => 69,  165 => 63,  161 => 61,  152 => 88,  148 => 55,  141 => 34,  134 => 40,  132 => 47,  127 => 46,  123 => 23,  109 => 38,  90 => 72,  54 => 15,  133 => 104,  124 => 42,  111 => 87,  107 => 39,  80 => 24,  69 => 22,  60 => 21,  52 => 6,  97 => 31,  95 => 37,  88 => 29,  78 => 16,  75 => 28,  71 => 25,  464 => 178,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 166,  425 => 165,  420 => 162,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 133,  305 => 135,  291 => 174,  287 => 111,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 186,  241 => 89,  236 => 187,  222 => 96,  218 => 105,  159 => 117,  154 => 43,  151 => 56,  145 => 77,  136 => 100,  128 => 47,  125 => 106,  119 => 34,  110 => 19,  96 => 15,  93 => 35,  91 => 24,  68 => 13,  65 => 12,  63 => 22,  43 => 4,  50 => 12,  25 => 7,  92 => 28,  86 => 25,  79 => 18,  46 => 20,  37 => 3,  33 => 14,  27 => 2,  82 => 33,  72 => 22,  64 => 15,  53 => 37,  49 => 28,  44 => 25,  42 => 12,  34 => 16,  29 => 2,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 12,  26 => 5,  22 => 5,  224 => 65,  215 => 173,  211 => 101,  204 => 61,  200 => 111,  195 => 54,  193 => 107,  190 => 92,  188 => 57,  185 => 149,  179 => 92,  177 => 59,  171 => 50,  162 => 62,  158 => 132,  156 => 57,  153 => 56,  146 => 122,  142 => 52,  137 => 38,  131 => 58,  126 => 92,  120 => 22,  117 => 50,  103 => 27,  99 => 67,  77 => 54,  74 => 19,  57 => 9,  47 => 13,  39 => 3,  32 => 15,  24 => 6,  17 => 2,  135 => 48,  129 => 34,  122 => 76,  116 => 27,  113 => 38,  108 => 36,  104 => 35,  102 => 17,  94 => 65,  89 => 30,  87 => 61,  84 => 24,  81 => 27,  73 => 50,  70 => 9,  67 => 20,  62 => 20,  59 => 37,  55 => 14,  51 => 7,  48 => 26,  41 => 5,  38 => 18,  35 => 3,  31 => 2,  28 => 11,);
    }
}
