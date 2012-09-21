<?php

/* ::shopScript.js.twig */
class __TwigTemplate_9c0d4390ee46fd0e24f65b10b7503178 extends Twig_Template
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
\t\$(document).ready(function() {
\t\t";
        // line 4
        echo "\t\tif (\$.cookie('declinedCookies'))
\t\t{
\t\t\t\$(\"#cookie-policy-disclaimer\").hide();
\t\t}
\t\tif (!\$.cookie('acceptedCookies')) {
\t\t\t\$(\"#cookie-policy\").slideDown();
\t\t} 
\t\t
\t\t";
        // line 13
        echo "\t\t\$(\".action-accept-cookies\").live('click', function() {
\t\t\t\$.cookie('declinedCookies', null);
\t\t\t\$.cookie('acceptedCookies', '1', {
\t\t\t     expires: 28,
\t\t\t     path: '/'
\t\t\t });
\t\t\t \$(\"#cookie-policy\").slideUp();
\t\t});
\t\t
\t\t";
        // line 23
        echo "\t\t\$(\".action-decline-cookies\").live('click', function() {
\t\t\t\$.cookie('acceptedCookies', null);
\t\t\t\$.cookie('declinedCookies', '1', {
\t\t\t     expires: 28,
\t\t\t     path: '/'
\t\t\t });
\t\t\t \$(\"#cookie-policy-disclaimer\").slideUp();
\t\t});
\t\t\$(\"#cookie-policy h2\").live('click', function() {
\t\t\t \$(\"#cookie-policy-disclaimer\").slideDown();
\t\t});
\t\t
\t\t";
        // line 36
        echo "\t\t\$(\".action-cancel-search\").live('click', function() {
\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\$(\".slider-gallery-container\").slideDown();
\t\t\t\$(\"#quick_search\").val(\"\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 44
        echo "\t\t\$(\"#quick_search\").live('keyup', function() {
\t\t\tgetSearchResults();
\t\t});
\t\t\$(\".action-quick-search\").live('click', function() {
\t\t\tgetSearchResults();
\t\t});
\t\t
\t\t";
        // line 52
        echo "\t\tgetBasketSummary();
\t\t\t\t
\t\t";
        // line 55
        echo "\t\t\$(\".action-add-to-basket\").live('click', function() {
\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\$.ajax({
   \t\t\t\ttype: \"GET\",
   \t\t\t\tdataType: \"json\",
   \t\t\t\turl: \"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("basket_ajax_add_to_basket"), "html", null, true);
        echo "\",
   \t\t\t\tdata: {
   \t\t\t\t\tproductId: \$(this).attr(\"data-product-id\"),
   \t\t\t\t\tquantity: \$(\"#quantity-\"+\$(this).attr(\"data-product-id\")).val(),
   \t\t\t\t\tselectedOptions: \$(\"#selected-options-\"+\$(this).attr(\"data-product-id\")).val()
   \t\t\t\t},
   \t\t\t\terror: function(data) {
   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the item to your basket. Please try again.');
\t\t\t\t\t\$(\"#message-error\").fadeIn(function() {
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 15},'slow');
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t});
\t\t      \t},
   \t\t\t\tsuccess: function(data) {
   \t\t\t\t\tgetBasketSummary();
   \t\t\t\t\t\$(\"html, body\").animate({scrollTop: 0},'slow', function() {
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-image\").attr(\"src\", data.thumbnailPath);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-image\").attr(\"alt\", data.header);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-title\").attr(\"href\", data.url);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-title\").html(data.header);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup-description\").html(data.quantity+' &times; &pound;'+data.price+\" = &pound;\"+data.subTotal);
   \t\t\t\t\t\t\$(\"#shopping-basket-popup\").dialog('open');
   \t\t\t\t\t\tsetTimeout('\$(\"#shopping-basket-popup\").dialog(\"close\")', 5000);
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
   \t\t\t\t\t});
   \t\t\t\t}
 \t\t\t});
\t\t});
\t\t
\t\t";
        // line 90
        echo "\t\t\$(\"#shopping-basket-popup\").dialog({
\t\t\tautoOpen: false,
\t\t\twidth: 400,
\t\t\tshow: \"fade\",
\t\t\thide: \"fade\",
\t\t\tresizable: false
\t\t});
\t\t\$(\".action-close-shopping-basket-popup\").live('click', function() {
\t\t\t\$(\"#shopping-basket-popup\").dialog('close');
\t\t});
\t\t
\t\t\$(\".search-box\").live(\"mouseover mouseenter click focus\", function() {
\t\t\t\$(this).addClass(\"search-box-interacting\");
\t\t});
\t\t\$(\".search-box\").live(\"mouseout mouseleave blur\", function() {
\t\t\t\$(this).removeClass(\"search-box-interacting\");
\t\t});
\t\t\$(\".search-box\").live(\"focus\", function() {
\t\t\t\$(this).addClass(\"search-box-glowing\");
\t\t});
\t\t\$(\".search-box\").live(\"blur\", function() {
\t\t\t\$(this).removeClass(\"search-box-glowing\");
\t\t});
\t\t
\t\t\$(\".sub-department-link span\").each(function() {
\t\t\t\$(this).parent(\"a\").addClass(\"single-line\");
\t\t});
\t\t\$(\"body\").mousemove(function(e) {
\t\t\tvar minimumX = ((parseInt(\$(document).width()) - 980) / 2);
\t\t\tif ((e.pageY < 136) || ((e.pageX < minimumX) || (e.pageX > (minimumX + 980))))
\t\t\t{
\t\t\t\t\$(\"div.sub-departments:visible\").slideUp(200);
\t\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t\t}
\t\t});
\t\t\$(\".sub-department-link\").live('mouseover mouseenter', function(e) {
\t\t\tvar \$departmentId = \$(this).attr(\"data-department-id\");
\t\t\tvar \$menuLinkPosition = 0;
\t\t\tvar \$menuLinkCentre = 0;
\t\t\tif (\$departmentId == 'brands')
\t\t\t{
\t\t\t\tvar \$menuLinkPosition = \$(this).position();
\t\t\t\tvar \$menuLinkCentre = \$menuLinkPosition.left + (\$(this).width() / 2);
\t\t\t} else {
\t\t\t\tvar \$menuLinkPosition = \$(this).parent(\"li\").position();
\t\t\t\tvar \$menuLinkCentre = \$menuLinkPosition.left + (\$(this).parent(\"li\").width() / 2);
\t\t\t}
\t\t\tvar \$subDepartmentX = \$menuLinkCentre - (\$(\"#sub-department-\"+\$departmentId).width() / 2) + 5;
\t\t\tif (\$subDepartmentX < 0)
\t\t\t{
\t\t\t\t\$subDepartmentX = 0;
\t\t\t}
\t\t\tif ((\$subDepartmentX + \$(\"#sub-department-\"+\$departmentId).width()) > 979)
\t\t\t{
\t\t\t\t\$subDepartmentX = 979 - \$(\"#sub-department-\"+\$departmentId).width();
\t\t\t}
\t\t\t\$(\"#sub-department-\"+\$departmentId).css(\"margin-left\", \$subDepartmentX+\"px\");
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\$(this).parent(\"li\").addClass(\"active\");
\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t\t\$(\"div.sub-departments\").each(function() {
\t\t\t\tif (\$(this).attr(\"id\") == \"sub-department-\"+\$departmentId)
\t\t\t\t{
\t\t\t\t\t\$(this).slideDown(400);
\t\t\t\t} else {
\t\t\t\t\t\$(this).slideUp(200);
\t\t\t\t}
\t\t\t});
\t\t});
\t\t\$(\".sub-departments:visible\").live('mouseleave', function() {
\t\t\t\$(this).slideUp(200);
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t});
\t\t\$(\"body\").live('mouseenter', function() {
\t\t\t\$(\"div.sub-departments:visible\").slideUp(200);
\t\t\t\$(\".sub-department-link\").parent(\"li\").removeClass(\"active\");
\t\t\t\$(\".sub-department\").removeClass(\"sub-department-active\");
\t\t});
\t\t\$(\".sub-department\").live('mouseover mouseenter', function() {
\t\t\t\$(this).addClass(\"sub-department-active\");
\t\t});
\t\t\$(\".sub-department\").live('mouseleave', function() {
\t\t\t\$(this).removeClass(\"sub-department-active\");
\t\t});
\t\t\$(\".brand\").live('mouseover mouseenter', function() {
\t\t\t\$(this).addClass(\"brand-active\");
\t\t});
\t\t\$(\".brand\").live('mouseleave', function() {
\t\t\t\$(this).removeClass(\"brand-active\");
\t\t});
\t\t\$(\".action-close-large-image\").live('click', function() {
\t\t\t\$(\"#large-image-container\").fadeOut();
\t\t});
\t});
\t
\t";
        // line 187
        echo "\tfunction getSearchResults()
\t{
\t\tif (\$(\"#quick_search\").val().length >= 3)
\t\t{
\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\$(\".slider-gallery-container\").slideUp();
\t\t\t\$(\"#search-results-title\").html('Search Results: \"'+\$(\"#quick_search\").val()+'\"');
\t\t\t\$(\"#search-container, .search-box-container\").expose({
    \t\t\tcolor: \"#000000\",
    \t\t\topacity: \"0.6\"
    \t\t});
\t\t\t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\turl: \"";
        // line 200
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("products_ajax_get_product_search"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
   \t\t\t\t\tsearch: \$(\"#quick_search\").val()
   \t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\t\t\$(\".slider-gallery-container\").slideDown();
\t      \t\t\t\$(\"#ajax-loading\").hide();
\t      \t\t\t\$.mask.close();
\t      \t\t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\$(\"#search-results\").html(data);
\t\t\t\t\t\$(\"#search-container\").slideDown(function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t});
\t\t\t\t}
\t\t\t});
\t\t} else {
\t\t\t\$(\"#search-container\").slideUp();
\t\t\t\$(\".slider-gallery-container\").slideDown();
\t\t\t\$.mask.close();
\t\t}
\t}
\t
\t";
        // line 225
        echo "\tfunction getBasketSummary()
\t{
\t\t\$(\"#basket-summary-loading\").hide();
\t\t\$(\"#basket-summary-content\").show();
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("basket_ajax_get_basket_summary"), "html", null, true);
        echo "\",
\t\t\terror: function(data) {
      \t\t\t\$(\"#basket-summary-content\").html('<p>Your basket could not be loaded at this time.</p>');
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#basket-summary-content\").html(data);
\t\t\t\t\$(\"#basket-summary-loading\").hide();
\t\t\t\t\$(\"#basket-summary-content\").fadeIn();
\t\t\t}
\t\t});
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "::shopScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 231,  257 => 225,  230 => 200,  117 => 90,  78 => 55,  86 => 39,  77 => 34,  71 => 30,  56 => 36,  133 => 58,  109 => 43,  99 => 39,  89 => 35,  85 => 60,  76 => 28,  53 => 14,  45 => 17,  33 => 9,  48 => 11,  44 => 10,  22 => 4,  227 => 42,  223 => 40,  221 => 39,  212 => 36,  202 => 35,  191 => 33,  174 => 32,  171 => 31,  164 => 29,  144 => 62,  140 => 24,  138 => 23,  134 => 21,  130 => 20,  115 => 17,  112 => 16,  104 => 41,  97 => 13,  80 => 35,  75 => 11,  72 => 10,  28 => 5,  21 => 4,  42 => 23,  37 => 10,  32 => 6,  27 => 6,  20 => 2,  64 => 22,  62 => 25,  59 => 21,  52 => 17,  49 => 13,  47 => 11,  41 => 11,  31 => 13,  23 => 5,  17 => 1,  464 => 123,  459 => 106,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 65,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 48,  311 => 47,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 34,  245 => 33,  241 => 43,  236 => 29,  222 => 28,  218 => 27,  215 => 187,  159 => 27,  154 => 68,  151 => 66,  145 => 10,  142 => 61,  136 => 8,  131 => 125,  128 => 124,  122 => 50,  119 => 18,  108 => 117,  93 => 36,  91 => 105,  70 => 25,  65 => 44,  63 => 83,  57 => 17,  55 => 78,  51 => 77,  43 => 47,  40 => 6,  38 => 9,  34 => 11,  25 => 7,  231 => 127,  228 => 126,  213 => 117,  209 => 116,  201 => 113,  197 => 112,  189 => 109,  185 => 108,  177 => 105,  173 => 104,  165 => 101,  161 => 100,  153 => 97,  149 => 96,  141 => 93,  137 => 60,  129 => 89,  125 => 123,  116 => 47,  113 => 119,  110 => 15,  96 => 107,  88 => 27,  82 => 24,  74 => 52,  68 => 29,  60 => 24,  54 => 21,  46 => 76,  39 => 4,  36 => 11,  29 => 8,);
    }
}
