<?php

/* WebIlluminationAdminBundle:Departments:indexScript.js.twig */
class __TwigTemplate_08d29c93f9c2a8bf16e985353bf4a4b8 extends Twig_Template
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
\t";
        // line 8
        echo "\tvar departments = [
\t\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "departments"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 10
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo "\"
\t\t\t}";
            // line 13
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 14
            echo "\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "\t];
\t
\t\$(document).ready(function() {
\t
\t\t";
        // line 20
        echo "\t\t";
        // line 21
        echo "\t\t";
        // line 22
        echo "\t\t
\t\t";
        // line 24
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
        // line 36
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
\t\t\t\t
\t\t";
        // line 49
        echo "\t\t
\t\t\$(\"#filter-department-search\").autocomplete({
\t\t\tsource: departments,
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\"#department-\"+ui.item.value).click();
\t\t\t\t\$(\"#department-\"+ui.item.value).attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-department-\"+ui.item.value+\" span\").addClass(\"checked\");
\t\t\t\t\$(\"#filter-departments\").animate({scrollTop: (\$(\"#filter-departments\").scrollTop() + (\$(\"#uniform-department-\"+ui.item.value).position().top - 60))}, 'slow');
\t\t\t\t\$(\"#filter-department-search\").val(\"\");
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 63
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
        // line 87
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
        // line 118
        echo "\t\t";
        // line 119
        echo "\t\t";
        // line 120
        echo "\t\t
\t\t";
        // line 122
        echo "\t\t\$(\"#listing-sort-order, #listing-max-results\").live('change', function() {
\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 128
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#listing-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 134
        echo "\t\t";
        // line 135
        echo "\t\t";
        // line 136
        echo "\t\t\t\t
\t\t";
        // line 138
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
        // line 152
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
        // line 163
        echo "\t\t\$(\".listing-status\").live('change', function() {
\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$(\"#listing-select-\"+\$id).attr(\"checked\", \"checked\");
\t\t\t\$(\"#listing-select-\"+\$id).parent().addClass(\"checked\");
\t\t\t\$(\"tr#item-\"+\$id).addClass(\"selected\");
\t\t});
\t\t
\t\t";
        // line 171
        echo "\t\t";
        // line 172
        echo "\t\t";
        // line 173
        echo "\t\t   \t\t                
        ";
        // line 175
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
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id,
\t\t      \t\t\t\t\tstatus: \$(\"#listing-status-\"+\$id).val()
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsUpdated = \$numberOfItemsUpdated + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem updating the selected ";
        // line 195
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
        // line 205
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
        // line 216
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to update.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
\t\t
\t\t";
        // line 223
        echo "\t\t";
        // line 224
        echo "\t\t";
        // line 225
        echo "\t\t
\t\t";
        // line 227
        echo "        \$(\".action-confirm-delete\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#item-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete\"));
        });
   \t\t
   \t\t";
        // line 232
        echo "        \$(\".action-delete\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 235
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
        // line 246
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tif (data.response == \"error\")
\t\t      \t\t{
\t\t      \t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the ";
        // line 251
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t\t} else {
\t\t\t      \t\t\$(\"#listing-current-page\").val('1');
\t\t\t      \t\tloadResults();
\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 255
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " has been successfully deleted.\");
\t\t\t\t\t}
\t\t      \t}
\t\t   \t});
        });
        
\t\t";
        // line 261
        echo "        
        \$(\".action-confirm-multiple-delete\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#confirm-multiple-delete\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#confirm-multiple-delete\").offset().top - 50},'slow');
\t    \t} else {
\t    \t\tloadNotificationMessage(\"message-error\", \"Sorry, you did not select any ";
        // line 268
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t    \t}
        });
        
        ";
        // line 272
        echo " 
        \$(\".action-cancel-multiple-delete\").live('click', function() {
        \t\$(\"#confirm-multiple-delete\").fadeOut();
        });
        
        ";
        // line 278
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
        // line 292
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_delete")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsDeleted = \$numberOfItemsDeleted + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the selected ";
        // line 298
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
        // line 310
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t\t      \t\t} else {
\t\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 312
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
        // line 324
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 331
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.item td\").removeAttr(\"style\");
\t\t\t\$(\"tr.item button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 339
        echo "\t\t";
        // line 340
        echo "\t\t";
        // line 341
        echo "\t\t
\t\t\$(\"#listing-current-page\").val('1');
\t\tloadResults();
\t});
\t";
        // line 345
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":indexFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        echo "\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Departments:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  487 => 345,  481 => 341,  479 => 340,  477 => 339,  468 => 331,  444 => 312,  439 => 310,  424 => 298,  415 => 292,  392 => 272,  385 => 268,  376 => 261,  367 => 255,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 227,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 172,  252 => 171,  231 => 152,  216 => 138,  213 => 136,  202 => 128,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 65,  391 => 64,  387 => 63,  384 => 62,  322 => 224,  318 => 49,  300 => 46,  296 => 45,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 33,  247 => 32,  243 => 163,  238 => 28,  220 => 26,  201 => 22,  194 => 20,  130 => 7,  100 => 106,  85 => 22,  76 => 93,  112 => 40,  101 => 36,  98 => 33,  272 => 85,  269 => 84,  228 => 79,  221 => 77,  197 => 21,  184 => 55,  138 => 18,  118 => 43,  105 => 42,  66 => 11,  56 => 32,  115 => 41,  83 => 21,  164 => 50,  140 => 104,  58 => 32,  21 => 4,  61 => 14,  36 => 10,  209 => 134,  205 => 82,  196 => 79,  192 => 120,  189 => 77,  178 => 71,  176 => 70,  165 => 63,  161 => 61,  152 => 58,  148 => 57,  141 => 55,  134 => 51,  132 => 49,  127 => 46,  123 => 96,  109 => 39,  90 => 30,  54 => 79,  133 => 8,  124 => 6,  111 => 37,  107 => 110,  80 => 95,  69 => 87,  60 => 9,  52 => 78,  97 => 34,  95 => 21,  88 => 24,  78 => 56,  75 => 15,  71 => 90,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 278,  343 => 63,  339 => 53,  335 => 51,  321 => 50,  317 => 49,  314 => 47,  311 => 216,  305 => 44,  291 => 43,  287 => 42,  282 => 39,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 32,  236 => 29,  222 => 28,  218 => 27,  159 => 24,  154 => 14,  151 => 49,  145 => 56,  136 => 8,  128 => 124,  125 => 123,  119 => 114,  110 => 111,  96 => 104,  93 => 33,  91 => 105,  68 => 47,  65 => 84,  63 => 36,  43 => 73,  50 => 7,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 10,  37 => 41,  33 => 12,  27 => 9,  82 => 96,  72 => 16,  64 => 84,  53 => 12,  49 => 11,  44 => 25,  42 => 24,  34 => 5,  29 => 9,  23 => 3,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 8,  22 => 3,  224 => 27,  215 => 23,  211 => 135,  204 => 84,  200 => 83,  195 => 122,  193 => 79,  190 => 119,  188 => 118,  185 => 76,  179 => 72,  177 => 71,  171 => 54,  162 => 63,  158 => 61,  156 => 87,  153 => 59,  146 => 109,  142 => 9,  137 => 51,  131 => 63,  126 => 49,  120 => 87,  117 => 44,  103 => 36,  99 => 34,  77 => 18,  74 => 27,  57 => 13,  47 => 19,  39 => 4,  32 => 9,  24 => 7,  17 => 1,  135 => 50,  129 => 50,  122 => 122,  116 => 49,  113 => 112,  108 => 117,  104 => 35,  102 => 70,  94 => 103,  89 => 20,  87 => 98,  84 => 53,  81 => 20,  73 => 19,  70 => 40,  67 => 19,  62 => 83,  59 => 21,  55 => 8,  51 => 30,  48 => 25,  41 => 43,  38 => 3,  35 => 7,  31 => 6,  28 => 3,);
    }
}
