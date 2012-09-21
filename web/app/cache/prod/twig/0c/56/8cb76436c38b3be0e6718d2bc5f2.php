<?php

/* WebIlluminationAdminBundle:Brands:indexScript.js.twig */
class __TwigTemplate_0c568cb76436c38b3be0e6718d2bc5f2 extends Twig_Template
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
        echo "<script type=\"text/javascript\" defer=\"defer\">
\t";
        // line 3
        echo "\tvar \$listingCountLoaded = false;
\tvar \$listingLoaded = false;
\tvar \$listingPaginationLoaded = false;
\t\t
\t\$(document).ready(function() {
\t
\t\t";
        // line 10
        echo "\t\t";
        // line 11
        echo "\t\t";
        // line 12
        echo "\t\t
\t\t";
        // line 14
        echo "\t\t\$(\".action-show-hide-filter\").live('click', function() {
\t\t\tif (\$(\"#listing-filter\").is(\":hidden\"))
\t\t\t{
\t\t\t\t\$(\"#listing-filter\").slideDown();
\t\t\t\t\$(\"#filter-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-s\").addClass(\"ui-icon-triangle-1-n\");
\t\t\t} else {
\t\t\t\t\$(\"#listing-filter\").slideUp();
\t\t\t\t\$(\"#filter-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 26
        echo "\t\t\$(\".action-show-hide-filter-section\").live('click', function() {
\t\t\tvar \$filterSection = \$(\"#filter-section-\"+\$(this).attr(\"data-filter-section\"));
\t\t\tvar \$filterSectionButton = \$(this).find(\"span.ui-button-icon-primary\");
\t\t\tif (\$filterSection.is(\":hidden\"))
\t\t\t{
\t\t\t\t\$filterSection.slideDown();
\t\t\t\t\$filterSectionButton.removeClass(\"ui-icon-triangle-1-s\").addClass(\"ui-icon-triangle-1-n\");
\t\t\t} else {
\t\t\t\t\$filterSection.slideUp();
\t\t\t\t\$filterSectionButton.removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 40
        echo "\t\t\$(\".range-slider\").each(function() {
\t\t\tvar \$sliderObject = \$(this);
\t\t\tvar \$fromObject = \$sliderObject.prev().find(\".from-value\");
\t\t\tvar \$toObject = \$sliderObject.prev().find(\".to-value\");
\t\t\t\$sliderObject.slider({
\t\t\t\trange: true,
\t\t\t\tmin: \$sliderObject.attr(\"data-from\"),
\t\t\t\tmax: \$sliderObject.attr(\"data-to\"),
\t\t\t\tvalues: [\$sliderObject.attr(\"data-from\"), \$sliderObject.attr(\"data-to\")],
\t\t\t\tcreate: function() {
\t\t\t\t\t\$fromObject.val(\$sliderObject.attr(\"data-from\"));
\t\t\t\t\t\$toObject.val(\$sliderObject.attr(\"data-to\"));
\t\t\t\t},
\t\t\t\tslide: function(event, ui) {
\t\t\t\t\t\$fromObject.val(ui.values[0]);
\t\t\t\t\t\$toObject.val(ui.values[1]);
\t\t\t\t},
\t\t\t\tchange: function(event, ui) {
\t\t\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\t\t\tloadResults();
\t\t\t\t}
\t\t\t});
\t\t});
\t\t\$(\".from-value, .to-value\").live('keyup', function() {
\t\t\tvar \$sliderObject = \$(this).parent().next();
\t\t\tvar \$fromObject = \$sliderObject.prev().find(\".from-value\");
\t\t\tvar \$toObject = \$sliderObject.prev().find(\".to-value\");
\t\t\t\$sliderObject.slider(\"option\", \"values\", [parseInt(\$fromObject.val()), parseInt(\$toObject.val())]);
\t\t});
\t\t\t\t
\t\t";
        // line 71
        echo "\t\t\$(\".action-clear-filters\").live('click', function() {
\t\t\t\$(\"#listing-filter input, #listing-filter textarea, #listing-filter select\").val(\"\");
\t\t\t\$(\"#listing-filter input[type='radio'], #listing-filter input[type='checkbox']\").removeAttr(\"checkbox\");
\t\t\t\$(\"#listing-filter div.checker span, #listing-filter div.radio span\").removeClass(\"checked\");
\t\t\t\$(\"#listing-filter select option\").removeAttr(\"selected\");
\t\t\t\$(\"#listing-filter select\").each(function() {
\t\t\t\tvar \$selectObject = \$(this);
\t\t\t\t\$selectObject.val(\$(\"options:first\", \$selectObject).val());
\t\t\t});
\t\t\t\$(\".range-slider\").each(function() {
\t\t\t\tvar \$sliderObject = \$(this);
\t\t\t\tvar \$fromObject = \$sliderObject.prev().find(\".from-value\");
\t\t\t\tvar \$toObject = \$sliderObject.prev().find(\".to-value\");
\t\t\t\t\$fromObject.val(\$sliderObject.attr(\"data-from\"));
\t\t\t\t\$toObject.val(\$sliderObject.attr(\"data-to\"));
\t\t\t\t\$sliderObject.slider(\"option\", \"values\", [parseInt(\$fromObject.val()), parseInt(\$toObject.val())]);
\t\t\t});
\t\t\t\$(\".filter-section\").slideUp();
\t\t\t\$(\".filter-scrollable\").animate({scrollTop: 0}, 'slow');
\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 95
        echo "\t\t\$(\"#listing-filter .filter-checkbox input[type='checkbox']\").live('click change', function() {
\t\t\tvar \$field = \$(this).attr(\"data-field\");
\t\t\tvar \$valuesToCollect = \$(\"#listing-filter .filter-checkbox input[data-field='\"+\$field+\"']:checked\").length;
\t\t\tvar \$valuesCollected = 0;
\t\t\tvar \$values = new Array();
\t\t\t\$(\"#listing-filter .filter-checkbox input[data-field='\"+\$field+\"']:checked\").each(function(index) {
\t\t\t\t\$values[\$values.length] = \$(this).val();
\t\t\t\t\$valuesCollected = \$valuesCollected + 1;
\t\t\t\tif (\$valuesCollected == \$valuesToCollect)
\t\t\t\t{
\t\t\t\t\t\$(\"#\"+\$field).val(\$values.join(\"|\"));
\t\t\t\t\tloadResults();
\t\t\t\t}
\t\t\t});
\t\t\tif (\$valuesToCollect == 0)
\t\t\t{
\t\t\t\t\$(\"#\"+\$field).val(\"\");
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#listing-filter input\").live('keyup', function() {
\t\t\tif (\$(this).val().length > 2)
\t\t\t{
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\".action-update-results\").live('click', function() {
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 126
        echo "\t\t";
        // line 127
        echo "\t\t";
        // line 128
        echo "\t\t
\t\t";
        // line 130
        echo "\t\t\$(\"#listing-sort-order, #listing-max-results\").live('change', function() {
\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 136
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#listing-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 142
        echo "        \$(\".action-view-contacts\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'contacts', \$(\"tr#brand-\"+\$(this).attr(\"data-id\")+\" button.action-view-contacts\"));
        });
        
        ";
        // line 147
        echo "        \$(\".action-view-prices\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'prices', \$(\"tr#brand-\"+\$(this).attr(\"data-id\")+\" button.action-view-prices\"));
        });
        
        ";
        // line 152
        echo "        \$(\".action-view-guarantees\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'guarantees', \$(\"tr#brand-\"+\$(this).attr(\"data-id\")+\" button.action-view-guarantees\"));
        });
\t\t
\t\t";
        // line 157
        echo "\t\t";
        // line 158
        echo "\t\t";
        // line 159
        echo "\t\t\t\t
\t\t";
        // line 161
        echo "\t\t\$(\".action-select-all\").live('click', function() {
\t\t\tif (\$(\".action-select-all\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\".action-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\".action-select\").parent().addClass(\"checked\");
\t\t\t\t\$(\"tr.item\").addClass(\"selected\");
\t\t\t} else {
\t\t\t\t\$(\".action-select\").attr(\"checked\", false);
\t\t\t\t\$(\".action-select\").parent().removeClass(\"checked\");
\t\t\t\t\$(\"tr.item\").removeClass(\"selected\");
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 175
        echo "        \$(\".action-select\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tif (\$(this).is(\":checked\"))
        \t{
        \t\t\$(\"#item-\"+\$id).addClass(\"selected\");
        \t} else {
        \t\t\$(\"#item-\"+\$id).removeClass(\"selected\");
        \t}
        });
        
        ";
        // line 186
        echo "\t\t\$(\".listing-status\").live('change', function() {
\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$(\"#listing-select-\"+\$id).attr(\"checked\", \"checked\");
\t\t\t\$(\"#listing-select-\"+\$id).parent().addClass(\"checked\");
\t\t\t\$(\"tr#item-\"+\$id).addClass(\"selected\");
\t\t});
\t\t
\t\t";
        // line 194
        echo "\t\t";
        // line 195
        echo "\t\t";
        // line 196
        echo "\t\t   \t\t                
        ";
        // line 198
        echo "        \$(\".action-multiple-update\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t\t\t\tresetInteractions();
\t        \t\$(\"#ajax_loading\").show();
\t\t\t\tvar \$numberOfItemsToUpdate = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfItemsUpdated = 0;
\t\t\t\tif (\$numberOfItemsToUpdate > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 211
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id,
\t\t      \t\t\t\t\tstatus: \$(\"#listing-status-\"+\$id).val()
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsUpdated = \$numberOfItemsUpdated + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem updating the selected ";
        // line 218
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t\t\t      \tif (\$numberOfItemsUpdated >= \$numberOfItemsToUpdate)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsUpdated = \$numberOfItemsUpdated + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 228
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " have been successfully updated.\");
\t\t\t\t\t\t\t\tif (\$numberOfItemsUpdated >= \$numberOfItemsToUpdate)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t} else {
\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, you did not select any ";
        // line 239
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to update.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
\t\t
\t\t";
        // line 246
        echo "\t\t";
        // line 247
        echo "\t\t";
        // line 248
        echo "\t\t
\t\t";
        // line 250
        echo "        \$(\".action-confirm-delete\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#item-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete\"));
        });
   \t\t
   \t\t";
        // line 255
        echo "        \$(\".action-delete\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 258
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_delete")), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \tbeforeSend: function() {
\t\t      \t\tresetInteractions();
\t\t      \t\t\$(\"#ajax_loading\").show();
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the ";
        // line 269
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tif (data.response == \"error\")
\t\t      \t\t{
\t\t      \t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the ";
        // line 274
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t\t} else {
\t\t\t      \t\t\$(\"#listing-current-page\").val('1');
\t\t\t      \t\tloadResults();
\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 278
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " has been successfully deleted.\");
\t\t\t\t\t}
\t\t      \t}
\t\t   \t});
        });
        
\t\t";
        // line 284
        echo "        
        \$(\".action-confirm-multiple-delete\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#confirm-multiple-delete\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#confirm-multiple-delete\").offset().top - 50},'slow');
\t    \t} else {
\t    \t\tloadNotificationMessage(\"message-error\", \"Sorry, you did not select any ";
        // line 291
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t    \t}
        });
        
        ";
        // line 295
        echo " 
        \$(\".action-cancel-multiple-delete\").live('click', function() {
        \t\$(\"#confirm-multiple-delete\").fadeOut();
        });
        
        ";
        // line 301
        echo "        \$(\".action-multiple-delete\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t\t\t\tresetInteractions();
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#confirm-multiple-delete\").hide();
\t\t\t\tvar \$numberOfItemsToDelete = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfItemsDeleted = 0;
\t\t\t\tif (\$numberOfItemsToDelete > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 315
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_delete")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsDeleted = \$numberOfItemsDeleted + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the selected ";
        // line 321
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t\t\t      \tif (\$numberOfItemsDeleted >= \$numberOfItemsToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsDeleted = \$numberOfItemsDeleted + 1;
\t\t\t\t\t\t\t\tif (data.response == \"error\")
\t\t\t\t\t      \t\t{
\t\t\t\t\t      \t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the selected ";
        // line 333
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t\t      \t\t} else {
\t\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 335
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " have been successfully deleted.\");
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\tif (\$numberOfItemsDeleted >= \$numberOfItemsToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t} else {
\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, you did not select any ";
        // line 347
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 354
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.item td\").removeAttr(\"style\");
\t\t\t\$(\"tr.item button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 362
        echo "\t\t";
        // line 363
        echo "\t\t";
        // line 364
        echo "\t\t
\t\t\$(\"#listing-current-page\").val('1');
\t\tloadResults();
\t});
\t";
        // line 368
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":indexFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        echo "\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Brands:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 301,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 246,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 247,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 255,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 363,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 42,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 274,  329 => 143,  326 => 92,  319 => 205,  288 => 123,  229 => 67,  206 => 71,  147 => 120,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 354,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 194,  217 => 182,  173 => 142,  309 => 250,  285 => 246,  280 => 235,  276 => 99,  262 => 77,  235 => 129,  232 => 67,  212 => 66,  207 => 44,  143 => 114,  157 => 45,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 364,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 284,  356 => 94,  353 => 154,  349 => 278,  345 => 147,  306 => 248,  271 => 92,  253 => 145,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 39,  223 => 79,  186 => 63,  169 => 48,  301 => 65,  298 => 100,  292 => 98,  267 => 78,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 31,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 88,  208 => 60,  183 => 58,  166 => 136,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 90,  303 => 109,  299 => 107,  295 => 87,  283 => 249,  279 => 228,  275 => 240,  265 => 155,  251 => 75,  199 => 90,  191 => 157,  170 => 59,  210 => 72,  180 => 152,  172 => 45,  168 => 52,  149 => 62,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 76,  249 => 74,  106 => 24,  334 => 269,  294 => 78,  286 => 76,  277 => 241,  255 => 90,  244 => 110,  214 => 73,  198 => 161,  181 => 82,  167 => 73,  160 => 41,  45 => 11,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 291,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 258,  297 => 126,  274 => 80,  256 => 211,  254 => 74,  252 => 112,  231 => 67,  216 => 64,  213 => 175,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 88,  296 => 100,  293 => 239,  290 => 86,  284 => 85,  270 => 122,  266 => 218,  261 => 228,  247 => 88,  243 => 110,  238 => 196,  220 => 26,  201 => 58,  194 => 99,  130 => 36,  100 => 68,  85 => 30,  76 => 18,  112 => 31,  101 => 34,  98 => 33,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 56,  184 => 55,  138 => 48,  118 => 43,  105 => 35,  66 => 11,  56 => 32,  115 => 58,  83 => 23,  164 => 50,  140 => 38,  58 => 15,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 57,  192 => 67,  189 => 49,  178 => 61,  176 => 41,  165 => 76,  161 => 58,  152 => 126,  148 => 32,  141 => 56,  134 => 54,  132 => 37,  127 => 53,  123 => 46,  109 => 30,  90 => 30,  54 => 8,  133 => 100,  124 => 97,  111 => 32,  107 => 24,  80 => 24,  69 => 12,  60 => 9,  52 => 7,  97 => 21,  95 => 71,  88 => 65,  78 => 56,  75 => 55,  71 => 19,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 321,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 84,  268 => 94,  264 => 93,  259 => 150,  245 => 119,  241 => 198,  236 => 195,  222 => 62,  218 => 65,  159 => 130,  154 => 127,  151 => 49,  145 => 41,  136 => 103,  128 => 27,  125 => 35,  119 => 33,  110 => 38,  96 => 35,  93 => 33,  91 => 33,  68 => 42,  65 => 12,  63 => 40,  43 => 25,  50 => 14,  25 => 7,  92 => 30,  86 => 15,  79 => 54,  46 => 5,  37 => 3,  33 => 12,  27 => 9,  82 => 18,  72 => 14,  64 => 16,  53 => 11,  49 => 28,  44 => 15,  42 => 24,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 11,  26 => 6,  22 => 4,  224 => 66,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 159,  193 => 158,  190 => 98,  188 => 55,  185 => 152,  179 => 147,  177 => 52,  171 => 54,  162 => 46,  158 => 125,  156 => 128,  153 => 30,  146 => 110,  142 => 56,  137 => 55,  131 => 44,  126 => 40,  120 => 95,  117 => 32,  103 => 78,  99 => 34,  77 => 18,  74 => 23,  57 => 13,  47 => 7,  39 => 18,  32 => 12,  24 => 6,  17 => 1,  135 => 107,  129 => 53,  122 => 48,  116 => 47,  113 => 57,  108 => 84,  104 => 39,  102 => 23,  94 => 63,  89 => 32,  87 => 30,  84 => 20,  81 => 24,  73 => 52,  70 => 40,  67 => 19,  62 => 16,  59 => 22,  55 => 8,  51 => 28,  48 => 26,  41 => 4,  38 => 3,  35 => 14,  31 => 14,  28 => 10,);
    }
}
