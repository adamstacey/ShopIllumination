<?php

/* WebIlluminationAdminBundle:Products:indexScript.js.twig */
class __TwigTemplate_04e88d98aa726d0069ad600417abf0f4 extends Twig_Template
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
\t
\t";
        // line 8
        echo "\tvar brands = [
\t\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "data"), "brands"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["brand"]) {
            // line 10
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "id"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "brand"), "brand"), "html", null, true);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['brand'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "\t];
\t
\t";
        // line 18
        echo "\tvar departments = [
\t\t";
        // line 19
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
            // line 20
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "id"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "department"), "department"), "html", null, true);
            echo "\"
\t\t\t}";
            // line 23
            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                echo ",";
            }
            // line 24
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
        // line 25
        echo "\t];
\t
\t\$(document).ready(function() {
\t
\t\t";
        // line 30
        echo "\t\t";
        // line 31
        echo "\t\t";
        // line 32
        echo "\t\t
\t\t";
        // line 34
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
        // line 46
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
        // line 60
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
\t\t
\t\t";
        // line 90
        echo "\t\t
\t\t\$(\"#filter-brand-search\").autocomplete({
\t\t\tsource: brands,
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\"#brand-\"+ui.item.value).click();
\t\t\t\t\$(\"#brand-\"+ui.item.value).attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-brand-\"+ui.item.value+\" span\").addClass(\"checked\");
\t\t\t\t\$(\"#filter-brands\").animate({scrollTop: (\$(\"#filter-brands\").scrollTop() + (\$(\"#uniform-brand-\"+ui.item.value).position().top - 60))}, 'slow');
\t\t\t\t\$(\"#filter-brand-search\").val(\"\");
\t\t\t\treturn false;
\t\t\t}
\t\t});
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
        // line 115
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
        // line 139
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
        // line 170
        echo "\t\t";
        // line 171
        echo "\t\t";
        // line 172
        echo "\t\t
\t\t";
        // line 174
        echo "\t\t\$(\"#listing-sort-order, #listing-max-results\").live('change', function() {
\t\t\t\$(\"#listing-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 180
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#listing-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 186
        echo "\t\t";
        // line 187
        echo "\t\t";
        // line 188
        echo "\t\t\t\t
\t\t";
        // line 190
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
        // line 204
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
        // line 215
        echo "\t\t\$(\".listing-status\").live('change', function() {
\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$(\"#listing-select-\"+\$id).attr(\"checked\", \"checked\");
\t\t\t\$(\"#listing-select-\"+\$id).parent().addClass(\"checked\");
\t\t\t\$(\"tr#item-\"+\$id).addClass(\"selected\");
\t\t});
\t\t
\t\t";
        // line 223
        echo "\t\t";
        // line 224
        echo "\t\t";
        // line 225
        echo "\t\t   \t\t                
        ";
        // line 227
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
        // line 240
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_update")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id,
\t\t      \t\t\t\t\tstatus: \$(\"#listing-status-\"+\$id).val()
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsUpdated = \$numberOfItemsUpdated + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem updating the selected ";
        // line 247
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
        // line 257
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
        // line 268
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to update.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
\t\t
\t\t";
        // line 275
        echo "\t\t";
        // line 276
        echo "\t\t";
        // line 277
        echo "\t\t
\t\t";
        // line 279
        echo "        \$(\".action-confirm-delete\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#item-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete\"));
        });
   \t\t
   \t\t";
        // line 284
        echo "        \$(\".action-delete\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 287
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
        // line 298
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tif (data.response == \"error\")
\t\t      \t\t{
\t\t      \t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the ";
        // line 303
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t      \t\t} else {
\t\t\t      \t\t\$(\"#listing-current-page\").val('1');
\t\t\t      \t\tloadResults();
\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 307
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "singleItemDescription"), "html", null, true);
        echo " has been successfully deleted.\");
\t\t\t\t\t}
\t\t      \t}
\t\t   \t});
        });
        
\t\t";
        // line 313
        echo "        
        \$(\".action-confirm-multiple-delete\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#confirm-multiple-delete\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#confirm-multiple-delete\").offset().top - 50},'slow');
\t    \t} else {
\t    \t\tloadNotificationMessage(\"message-error\", \"Sorry, you did not select any ";
        // line 320
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t    \t}
        });
        
        ";
        // line 324
        echo " 
        \$(\".action-cancel-multiple-delete\").live('click', function() {
        \t\$(\"#confirm-multiple-delete\").fadeOut();
        });
        
        ";
        // line 330
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
        // line 344
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((("admin_" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsPath")) . "_ajax_delete")), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfItemsDeleted = \$numberOfItemsDeleted + 1;
\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-error\", \"Sorry, there was a problem deleting the selected ";
        // line 350
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
        // line 362
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo ". Please try again.\");
\t\t\t\t\t      \t\t} else {
\t\t\t\t\t\t\t\t\tloadNotificationMessage(\"message-success\", \"The ";
        // line 364
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
        // line 376
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "settings"), "multipleItemsDescription"), "html", null, true);
        echo " to delete.\");
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 383
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.item td\").removeAttr(\"style\");
\t\t\t\$(\"tr.item button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 391
        echo "\t\t";
        // line 392
        echo "\t\t";
        // line 393
        echo "\t\t
\t\t\$(\"#listing-current-page\").val('1');
\t\tloadResults();
\t});
\t";
        // line 397
        $template = $this->env->resolveTemplate((("WebIlluminationAdminBundle:" . $this->getAttribute($this->getContext($context, "settings"), "multipleItemsModel")) . ":indexFunctions.js.twig"));
        $template->display(array_merge($context, array("settings" => $this->getContext($context, "settings"), "data" => $this->getContext($context, "data"))));
        echo "\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Products:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  555 => 376,  540 => 364,  535 => 362,  520 => 350,  511 => 344,  495 => 330,  472 => 313,  463 => 307,  456 => 303,  434 => 287,  429 => 284,  423 => 279,  420 => 277,  418 => 276,  416 => 275,  407 => 268,  393 => 257,  380 => 247,  370 => 240,  355 => 227,  352 => 225,  350 => 224,  348 => 223,  339 => 215,  327 => 204,  312 => 190,  309 => 188,  307 => 187,  305 => 186,  298 => 180,  291 => 174,  288 => 172,  286 => 171,  252 => 139,  227 => 115,  201 => 90,  169 => 60,  154 => 46,  141 => 34,  138 => 32,  136 => 31,  128 => 25,  114 => 24,  106 => 22,  102 => 21,  79 => 18,  75 => 15,  61 => 14,  57 => 13,  49 => 11,  26 => 8,  20 => 3,  94 => 21,  88 => 20,  82 => 19,  76 => 18,  70 => 17,  59 => 11,  47 => 9,  35 => 7,  29 => 9,  23 => 5,  644 => 211,  641 => 210,  617 => 206,  600 => 205,  593 => 203,  584 => 197,  581 => 196,  569 => 192,  552 => 191,  545 => 189,  514 => 161,  501 => 160,  488 => 324,  481 => 320,  468 => 154,  455 => 153,  448 => 298,  435 => 148,  422 => 147,  415 => 143,  402 => 142,  389 => 141,  382 => 137,  369 => 136,  356 => 135,  343 => 125,  330 => 124,  317 => 123,  310 => 119,  297 => 118,  284 => 170,  277 => 113,  264 => 112,  251 => 111,  244 => 107,  231 => 106,  218 => 105,  211 => 101,  198 => 100,  185 => 99,  167 => 86,  152 => 76,  135 => 64,  99 => 20,  90 => 30,  81 => 24,  53 => 12,  40 => 10,  27 => 9,  17 => 1,  142 => 56,  137 => 55,  134 => 30,  123 => 46,  120 => 54,  110 => 23,  105 => 35,  101 => 34,  98 => 33,  92 => 30,  77 => 18,  69 => 12,  66 => 12,  60 => 9,  55 => 8,  52 => 7,  46 => 10,  41 => 8,  38 => 3,  30 => 2,);
    }
}
