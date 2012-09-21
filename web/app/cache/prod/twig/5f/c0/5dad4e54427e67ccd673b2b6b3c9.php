<?php

/* WebIlluminationAdminBundle:Departments:indexFunctions.js.twig */
class __TwigTemplate_5fc05dad4e54427e67ccd673b2b6b3c9 extends Twig_Template
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
\t\t\thidePrices: \$(\"#filter-hide-prices\").val(),
\t\t\tshowPricesOutOfHours: \$(\"#filter-show-prices-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
    \t\tdepartment: \$(\"#filter-department\").val()
\t\t},
\t\terror: function(data) {
\t\t\t\$(\"#listing-count\").html('No ";
        // line 75
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
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo " Found');
    \t\t\t\t} else {
        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' ";
        // line 89
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsTitle"), "html", null, true);
        echo "');
        \t\t\t}
        \t\t} else {
\t    \t\t\t\$(\"#listing-count\").html('Found 1 ";
        // line 92
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemTitle"), "html", null, true);
        echo "');
    \t\t\t}\t
        \t} else {
\t    \t\t\$(\"#listing-count\").html('No ";
        // line 95
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
        // line 106
        echo "function loadListing()
{
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_listing")), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\tstatus: \$(\"#filter-status\").val(),
\t\t\thidePrices: \$(\"#filter-hide-prices\").val(),
\t\t\tshowPricesOutOfHours: \$(\"#filter-show-prices-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
    \t\tdepartment: \$(\"#filter-department\").val(),
    \t\tsortOrder: \$(\"#listing-sort-order\").val(),
    \t\tpage: \$(\"#listing-current-page\").val(),
\t\t\tmaxResults: \$(\"#listing-max-results\").val()
\t\t},
\t\tbeforeSend: function() {
\t\t\tif (\$(\"#listing\").height() > 0)
\t\t\t{
\t\t\t\t\$(\"#listing-loading\").height(\$(\"#listing\").height() - 12);
\t\t\t}
\t\t\t\$(\"#listing-loading\").show();
\t\t\t\$(\"#listing\").hide().html(\"\");\t
\t\t},
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
        // line 149
        echo "function loadListingPagination()
{
\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\$.ajax({
\t\ttype: \"POST\",
\t\turl: \"";
        // line 154
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_get_listing_pagination")), "html", null, true);
        echo "\",
\t\tdata: {
\t\t\tstatus: \$(\"#filter-status\").val(),
\t\t\thidePrices: \$(\"#filter-hide-prices\").val(),
\t\t\tshowPricesOutOfHours: \$(\"#filter-show-prices-out-of-hours\").val(),
\t\t\tmembershipCardDiscountAvailable: \$(\"#filter-membership-card-discount-available\").val(),
    \t\tname: \$(\"#filter-name\").val(),
    \t\tdescription: \$(\"#filter-description\").val(),
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
        // line 182
        echo "function loadNotificationMessage(\$container, \$message, \$type)
{
\t\$(\"#\"+\$container+\" .message-text\").html(\$message);
\t\$(\"#\"+\$container).fadeIn();
\t\$(\"html, body\").animate({scrollTop: \$(\"#\"+\$container).offset().top - 50},'slow');
\t\$(\"#ajax_loading\").hide();
}

";
        // line 191
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
        // line 204
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
        return "WebIlluminationAdminBundle:Departments:indexFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 191,  230 => 182,  121 => 89,  257 => 121,  249 => 119,  106 => 73,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 107,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 8,  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 11,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 67,  100 => 106,  85 => 14,  76 => 58,  112 => 40,  101 => 75,  98 => 18,  272 => 85,  269 => 14,  228 => 1,  221 => 77,  197 => 21,  184 => 55,  138 => 37,  118 => 43,  105 => 22,  66 => 49,  56 => 16,  115 => 64,  83 => 24,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 39,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 88,  176 => 70,  165 => 59,  161 => 58,  152 => 110,  148 => 57,  141 => 55,  134 => 99,  132 => 49,  127 => 92,  123 => 34,  109 => 63,  90 => 15,  54 => 79,  133 => 95,  124 => 90,  111 => 25,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 6,  97 => 34,  95 => 17,  88 => 24,  78 => 16,  75 => 15,  71 => 10,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 34,  335 => 51,  321 => 50,  317 => 29,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 68,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 17,  93 => 61,  91 => 105,  68 => 9,  65 => 45,  63 => 36,  43 => 4,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 10,  33 => 12,  27 => 9,  82 => 13,  72 => 20,  64 => 18,  53 => 37,  49 => 9,  44 => 25,  42 => 10,  34 => 5,  29 => 8,  23 => 3,  19 => 2,  40 => 20,  20 => 3,  30 => 2,  26 => 7,  22 => 5,  224 => 27,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 149,  190 => 119,  188 => 61,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 75,  153 => 59,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 41,  99 => 18,  77 => 18,  74 => 27,  57 => 31,  47 => 29,  39 => 4,  32 => 16,  24 => 6,  17 => 2,  135 => 50,  129 => 50,  122 => 122,  116 => 87,  113 => 112,  108 => 117,  104 => 35,  102 => 19,  94 => 103,  89 => 20,  87 => 64,  84 => 53,  81 => 20,  73 => 18,  70 => 49,  67 => 43,  62 => 83,  59 => 21,  55 => 14,  51 => 30,  48 => 25,  41 => 11,  38 => 3,  35 => 8,  31 => 14,  28 => 3,);
    }
}
