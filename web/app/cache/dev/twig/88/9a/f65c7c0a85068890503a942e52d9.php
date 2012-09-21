<?php

/* WebIlluminationAdminBundle:Products:indexFunctions.js.twig */
class __TwigTemplate_889af65c7c0a85068890503a942e52d9 extends Twig_Template
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
        echo "function showMoreInformation(\$id, \$moreInformation, \$button)
{
\t\$(\".form-error\").hide();
\t\$(\"tr#item-\"+\$id+\" .button\").removeClass(\"ui-button-blue\");
\tif (\$(\"#\"+\$moreInformation+\"-\"+\$id).is(\":hidden\"))
\t{
\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
\t\t\$(\"#more-information-\"+\$id).show();
\t\t\$(\"#\"+\$moreInformation+\"-\"+\$id).fadeIn();
\t\t\$(\"#more-information-\"+\$id+\" td, #item-\"+\$id+\" td\").expose({
\t\t\tcolor: \"#042F4F\",
\t\t\tloadSpeed: 2000,
\t\t\topacity: \"0.6\",
\t\t\tonClose: function() {
\t\t\t\t\$(\".form-error\").hide();
\t\t\t\t\$(\".more-information, .more-information-detail\").fadeOut();
\t\t\t\t\$(\"#more-information-\"+\$id).fadeOut();
\t\t\t\t\$(\"#\"+\$id+\" td\").removeAttr(\"style\");
\t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
\t\t\t\t\$(\"tr#item-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
\t\t\t}
\t\t});
\t\tif (!\$button.hasClass(\"ui-button-red\"))
\t\t{
\t\t\t\$button.addClass(\"ui-button-blue\");
\t\t}
\t} else {
\t\t\$.mask.close();
\t\t\$(\"#more-information-\"+\$id).fadeOut();
\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
\t}
\t\$(\"html, body\").animate({scrollTop: \$button.offset().top - 50},'slow');
}

";
        // line 37
        echo "function loadResults()
{
\t\$(\"#ajax_loading\").show();
\t\$listingCountLoaded = false;
\t\$listingLoaded = false;
\t\$listingPaginationLoaded = false;
\tloadListingCount();
\tloadListing();
\tloadListingPagination();
}

";
        // line 49
        echo "function checkResultsLoaded()
{
\tif (\$listingCountLoaded && \$listingLoaded && \$listingPaginationLoaded)
\t{
\t\t\$(\"#ajax_loading\").hide();
\t}
}

";
        // line 58
        echo "function loadListingCount()
{
\t\$(\"#listing-count\").html('<img src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\$.ajax({
\t\ttype: \"POST\",
\t\tdataType: \"json\",
\t\turl: \"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_listing_count")), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\tstatus: \$(\"#filter-status\").val(),
\t\t\tavailableForPurchase: \$(\"#filter-available-for-purchase\").val(),
\t\t\thidePrice: \$(\"#filter-hide-price\").val(),
\t\t\tshowPriceOutOfHours: \$(\"#filter-show-price-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
\t\t\tfeatureComparison: \$(\"#filter-feature-comparison\").val(),
\t\t\tdownloadable: \$(\"#filter-downloadable\").val(),
\t\t\tspecialOffer: \$(\"#filter-special-offer\").val(),
\t\t\trecommended: \$(\"#filter-recommended\").val(),
\t\t\taccessory: \$(\"#filter-accessory\").val(),
\t\t\tnew: \$(\"#filter-new\").val(),
    \t\tproductCode: \$(\"#filter-product-code\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
    \t\tcostPriceFrom: \$(\"#filter-cost-price\").prev().find(\".from-value\").val(),
    \t\tcostPriceTo: \$(\"#filter-cost-price\").prev().find(\".to-value\").val(),
    \t\trecommendedRetailPriceFrom: \$(\"#filter-recommended-retail-price\").prev().find(\".from-value\").val(),
    \t\trecommendedRetailPriceTo: \$(\"#filter-recommended-retail-price\").prev().find(\".to-value\").val(),
    \t\tlistPriceFrom: \$(\"#lfilter-ist-price\").prev().find(\".from-value\").val(),
    \t\tlistPriceTo: \$(\"#filter-list-price\").prev().find(\".to-value\").val(),
    \t\tdiscountFrom: \$(\"#filter-discount\").prev().find(\".from-value\").val(),
    \t\tdiscountTo: \$(\"#filter-discount\").prev().find(\".to-value\").val(),
    \t\tbrand: \$(\"#filter-brand\").val(),
    \t\tdepartment: \$(\"#filter-department\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#listing-count\").html('No ";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo " Found');
\t\t\t\$listingCountLoaded = true;
\t\t\tcheckResultsLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\tif (data.response == 'success')
\t    \t{
    \t\t\tvar \$listingCount = parseInt(data.listingCount);
    \t\t\tif ((\$listingCount > 1) || (\$listingCount < 1))
    \t\t\t{
    \t\t\t\tif (\$listingCount < 1)
        \t\t\t{
\t    \t\t\t\t\$(\"#listing-count\").html('No ";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo " Found');
    \t\t\t\t} else {
        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' ";
        // line 106
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo "');
        \t\t\t}
        \t\t} else {
\t    \t\t\t\$(\"#listing-count\").html('Found 1 ";
        // line 109
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo "');
    \t\t\t}\t
        \t} else {
\t    \t\t\$(\"#listing-count\").html('No ";
        // line 112
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo " Found');
    \t\t}
    \t\t\$listingCountLoaded = true;
        \tcheckResultsLoaded();
\t\t}
\t});
\t
\treturn false;
}

";
        // line 123
        echo "function loadListing()
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_listing")), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\tstatus: \$(\"#filter-status\").val(),
\t\t\tavailableForPurchase: \$(\"#filter-available-for-purchase\").val(),
\t\t\thidePrice: \$(\"#filter-hide-price\").val(),
\t\t\tshowPriceOutOfHours: \$(\"#filter-show-price-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
\t\t\tfeatureComparison: \$(\"#filter-feature-comparison\").val(),
\t\t\tdownloadable: \$(\"#filter-downloadable\").val(),
\t\t\tspecialOffer: \$(\"#filter-special-offer\").val(),
\t\t\trecommended: \$(\"#filter-recommended\").val(),
\t\t\taccessory: \$(\"#filter-accessory\").val(),
\t\t\tnew: \$(\"#filter-new\").val(),
    \t\tproductCode: \$(\"#filter-product-code\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
    \t\tcostPriceFrom: \$(\"#filter-cost-price\").prev().find(\".from-value\").val(),
    \t\tcostPriceTo: \$(\"#filter-cost-price\").prev().find(\".to-value\").val(),
    \t\trecommendedRetailPriceFrom: \$(\"#filter-recommended-retail-price\").prev().find(\".from-value\").val(),
    \t\trecommendedRetailPriceTo: \$(\"#filter-recommended-retail-price\").prev().find(\".to-value\").val(),
    \t\tlistPriceFrom: \$(\"#lfilter-ist-price\").prev().find(\".from-value\").val(),
    \t\tlistPriceTo: \$(\"#filter-list-price\").prev().find(\".to-value\").val(),
    \t\tdiscountFrom: \$(\"#filter-discount\").prev().find(\".from-value\").val(),
    \t\tdiscountTo: \$(\"#filter-discount\").prev().find(\".to-value\").val(),
    \t\tbrand: \$(\"#filter-brand\").val(),
    \t\tdepartment: \$(\"#filter-department\").val(),
    \t\tsortOrder: \$(\"#listing-sort-order\").val(),
    \t\tpage: \$(\"#listing-current-page\").val(),
\t\t\t\tmaxResults: \$(\"#listing-max-results\").val()
\t\t\t},
\t\t\tbeforeSend: function() {
\t\t\t\tif (\$(\"#listing\").height() > 0)
\t\t\t{
\t\t\t\t\$(\"#listing-loading\").height(\$(\"#listing\").height() - 12);
\t\t\t}
\t\t\t\$(\"#listing-loading\").show();
\t\t\t\$(\"#listing\").hide().html(\"\");
\t\t\t
\t\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#listing\").html('<p class=\"ac\">Sorry, no results were found.</p>').fadeIn();
\t\t\t\$listingLoaded = true;
\t\t\tcheckResultsLoaded();
\t\t\t\$(\"#listing-loading\").hide();
  \t\t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#listing\").html(data).fadeIn();
    \t\t\$listingLoaded = true;
    \t\tcheckResultsLoaded();
    \t\t\$(\"#listing-loading\").hide();
\t\t}
\t});
\t
\treturn false;
}

";
        // line 184
        echo "function loadListingPagination()
{
\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_listing_pagination")), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\t\tstatus: \$(\"#filter-status\").val(),
\t\t\tavailableForPurchase: \$(\"#filter-available-for-purchase\").val(),
\t\t\thidePrice: \$(\"#filter-hide-price\").val(),
\t\t\tshowPriceOutOfHours: \$(\"#filter-show-price-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
\t\t\tfeatureComparison: \$(\"#filter-feature-comparison\").val(),
\t\t\tdownloadable: \$(\"#filter-downloadable\").val(),
\t\t\tspecialOffer: \$(\"#filter-special-offer\").val(),
\t\t\trecommended: \$(\"#filter-recommended\").val(),
\t\t\taccessory: \$(\"#filter-accessory\").val(),
\t\t\tnew: \$(\"#filter-new\").val(),
    \t\tproductCode: \$(\"#filter-product-code\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
    \t\tcostPriceFrom: \$(\"#filter-cost-price\").prev().find(\".from-value\").val(),
    \t\tcostPriceTo: \$(\"#filter-cost-price\").prev().find(\".to-value\").val(),
    \t\trecommendedRetailPriceFrom: \$(\"#filter-recommended-retail-price\").prev().find(\".from-value\").val(),
    \t\trecommendedRetailPriceTo: \$(\"#filter-recommended-retail-price\").prev().find(\".to-value\").val(),
    \t\tlistPriceFrom: \$(\"#lfilter-ist-price\").prev().find(\".from-value\").val(),
    \t\tlistPriceTo: \$(\"#filter-list-price\").prev().find(\".to-value\").val(),
    \t\tdiscountFrom: \$(\"#filter-discount\").prev().find(\".from-value\").val(),
    \t\tdiscountTo: \$(\"#filter-discount\").prev().find(\".to-value\").val(),
    \t\tbrand: \$(\"#filter-brand\").val(),
    \t\tdepartment: \$(\"#filter-department\").val(),
    \t\tpage: \$(\"#listing-current-page\").val(),
\t\t\t\tmaxResults: \$(\"#listing-max-results\").val()
\t\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\t\$listingPaginationLoaded = true;
\t\t\tcheckResultsLoaded();
      \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").html(data).fadeIn();
        \t\$listingPaginationLoaded = true;
        \tcheckResultsLoaded();
\t\t}
\t});
\t
\treturn false;
}

";
        // line 234
        echo "function loadNotificationMessage(\$container, \$message, \$type)
{
\t\$(\"#\"+\$container+\" .message-text\").html(\$message);
\t\$(\"#\"+\$container).fadeIn();
\t\$(\"html, body\").animate({scrollTop: \$(\"#\"+\$container).offset().top - 50},'slow');
\t\$(\"#ajax_loading\").hide();
}

";
        // line 243
        echo "function resetInteractions()
{
\t\$(\"#flash_messages .message\").hide();
\t\$(\".form-error\").hide();
\t\$(\"input, select, textarea\").removeClass(\"invalid\");
\t\$.mask.close();
\t\$(\"tr.item td\").removeAttr(\"style\");
\t\$(\"tr.item button\").removeClass(\"ui-button-blue\");
\t\$(\".more-information .more-information-detail, .more-information\").fadeOut();
\t\$(\"#ajax_loading\").hide();
}

";
        // line 256
        echo "function initialiseUniform(\$objectId)
{
\t\$(\"#\"+\$objectId+\" :checkbox:not(.no-uniform), #\"+\$objectId+\" :radio:not(.no-uniform), #\"+\$objectId+\" select:not(.no-uniform), #\"+\$objectId+\" :file:not(.no-uniform)\").uniform();
\t\$(\"#\"+\$objectId+\" .button\").each(function () {
        \$(this).button({
        \ticons: {
            \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
            }, 
           \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t});
    \tvar \$dataNotification = \$(this).attr(\"data-notification\");
    \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
    \t{
    \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
    \t}
    });
    \$(\"#\"+\$objectId+\" .selector, #\"+\$objectId+\" .uploader\").addClass(\"full\");
    \$(\"#\"+\$objectId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find('.message-close').click(function () {
    \t\$(this).parent().fadeOut();
    });
    
    return false;
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:indexFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  306 => 256,  292 => 243,  282 => 234,  235 => 189,  228 => 184,  163 => 123,  150 => 112,  144 => 109,  133 => 104,  118 => 92,  87 => 64,  80 => 60,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  555 => 376,  540 => 364,  535 => 362,  520 => 350,  511 => 344,  495 => 330,  472 => 313,  463 => 307,  456 => 303,  434 => 287,  429 => 284,  423 => 279,  420 => 277,  418 => 276,  416 => 275,  407 => 268,  393 => 257,  380 => 247,  370 => 240,  355 => 227,  352 => 225,  350 => 224,  348 => 223,  339 => 215,  327 => 204,  312 => 190,  309 => 188,  307 => 187,  305 => 186,  298 => 180,  291 => 174,  288 => 172,  286 => 171,  252 => 139,  227 => 115,  201 => 90,  169 => 127,  154 => 46,  141 => 34,  138 => 106,  136 => 31,  128 => 25,  114 => 24,  106 => 22,  102 => 21,  79 => 18,  75 => 15,  61 => 14,  57 => 13,  49 => 11,  26 => 8,  20 => 3,  94 => 21,  88 => 20,  82 => 19,  76 => 58,  70 => 17,  59 => 11,  47 => 9,  35 => 7,  29 => 9,  23 => 5,  644 => 211,  641 => 210,  617 => 206,  600 => 205,  593 => 203,  584 => 197,  581 => 196,  569 => 192,  552 => 191,  545 => 189,  514 => 161,  501 => 160,  488 => 324,  481 => 320,  468 => 154,  455 => 153,  448 => 298,  435 => 148,  422 => 147,  415 => 143,  402 => 142,  389 => 141,  382 => 137,  369 => 136,  356 => 135,  343 => 125,  330 => 124,  317 => 123,  310 => 119,  297 => 118,  284 => 170,  277 => 113,  264 => 112,  251 => 111,  244 => 107,  231 => 106,  218 => 105,  211 => 101,  198 => 100,  185 => 99,  167 => 86,  152 => 76,  135 => 64,  99 => 20,  90 => 30,  81 => 24,  53 => 37,  40 => 10,  27 => 9,  17 => 2,  142 => 56,  137 => 55,  134 => 30,  123 => 46,  120 => 54,  110 => 23,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 49,  60 => 9,  55 => 8,  52 => 7,  46 => 10,  41 => 8,  38 => 3,  30 => 2,);
    }
}
