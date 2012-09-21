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
        return array (  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 197,  569 => 192,  455 => 153,  435 => 148,  337 => 139,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 227,  472 => 313,  456 => 303,  440 => 195,  377 => 164,  313 => 136,  281 => 135,  469 => 368,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 148,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 247,  330 => 124,  302 => 153,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 295,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 316,  478 => 195,  465 => 187,  441 => 347,  431 => 169,  396 => 163,  364 => 157,  348 => 223,  336 => 181,  310 => 119,  304 => 86,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 206,  457 => 185,  451 => 182,  436 => 171,  422 => 147,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 137,  350 => 224,  315 => 255,  312 => 190,  308 => 87,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 216,  515 => 211,  511 => 344,  505 => 206,  501 => 160,  499 => 204,  496 => 203,  493 => 219,  483 => 212,  480 => 289,  476 => 208,  474 => 194,  461 => 363,  446 => 257,  427 => 240,  418 => 276,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 136,  357 => 102,  341 => 146,  332 => 144,  328 => 129,  325 => 141,  316 => 166,  278 => 120,  250 => 200,  163 => 126,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 220,  494 => 151,  484 => 198,  462 => 205,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 156,  342 => 274,  329 => 142,  326 => 171,  319 => 138,  288 => 172,  229 => 67,  206 => 70,  147 => 119,  227 => 115,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 154,  344 => 301,  219 => 101,  273 => 86,  263 => 124,  246 => 119,  234 => 79,  217 => 182,  173 => 56,  309 => 188,  285 => 80,  280 => 235,  276 => 99,  262 => 118,  235 => 133,  232 => 97,  212 => 177,  207 => 160,  143 => 71,  157 => 128,  366 => 159,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 307,  433 => 191,  416 => 275,  412 => 184,  409 => 103,  404 => 100,  390 => 161,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 99,  345 => 97,  306 => 248,  271 => 104,  253 => 203,  233 => 132,  226 => 64,  187 => 40,  150 => 48,  260 => 91,  155 => 31,  223 => 116,  186 => 103,  169 => 60,  301 => 85,  298 => 180,  292 => 123,  267 => 121,  258 => 118,  248 => 115,  242 => 108,  239 => 190,  237 => 80,  174 => 82,  182 => 91,  175 => 90,  144 => 85,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 201,  432 => 176,  203 => 53,  114 => 24,  208 => 92,  183 => 151,  166 => 85,  423 => 279,  419 => 166,  411 => 215,  407 => 268,  403 => 213,  395 => 211,  383 => 153,  379 => 152,  375 => 151,  371 => 150,  363 => 104,  359 => 154,  355 => 227,  351 => 122,  347 => 101,  331 => 141,  323 => 145,  307 => 187,  303 => 131,  299 => 152,  295 => 87,  283 => 249,  279 => 128,  275 => 127,  265 => 108,  251 => 111,  199 => 87,  191 => 149,  170 => 139,  210 => 103,  180 => 128,  172 => 132,  168 => 54,  149 => 112,  139 => 50,  240 => 202,  230 => 93,  121 => 88,  257 => 71,  249 => 74,  106 => 22,  334 => 269,  294 => 131,  286 => 171,  277 => 113,  255 => 105,  244 => 107,  214 => 113,  198 => 100,  181 => 86,  167 => 86,  160 => 79,  45 => 12,  487 => 199,  481 => 320,  479 => 117,  477 => 430,  468 => 154,  444 => 196,  439 => 132,  424 => 173,  415 => 143,  392 => 162,  385 => 268,  376 => 339,  367 => 149,  360 => 156,  352 => 225,  338 => 235,  333 => 71,  327 => 204,  324 => 170,  320 => 168,  297 => 118,  274 => 126,  256 => 86,  254 => 74,  252 => 139,  231 => 106,  216 => 178,  213 => 175,  202 => 169,  458 => 139,  453 => 177,  448 => 298,  437 => 172,  434 => 287,  428 => 175,  414 => 166,  410 => 164,  405 => 165,  391 => 208,  387 => 171,  384 => 333,  322 => 140,  318 => 165,  300 => 132,  296 => 124,  293 => 239,  290 => 123,  284 => 170,  270 => 122,  266 => 102,  261 => 228,  247 => 88,  243 => 82,  238 => 107,  220 => 64,  201 => 90,  194 => 163,  130 => 95,  100 => 74,  85 => 54,  76 => 18,  112 => 79,  101 => 34,  98 => 69,  272 => 118,  269 => 237,  228 => 100,  221 => 93,  197 => 51,  184 => 95,  138 => 32,  118 => 93,  105 => 35,  66 => 11,  56 => 32,  115 => 63,  83 => 59,  164 => 80,  140 => 43,  58 => 6,  21 => 4,  61 => 14,  36 => 10,  209 => 173,  205 => 169,  196 => 93,  192 => 63,  189 => 106,  178 => 145,  176 => 57,  165 => 127,  161 => 49,  152 => 79,  148 => 47,  141 => 34,  134 => 30,  132 => 76,  127 => 93,  123 => 46,  109 => 73,  90 => 64,  54 => 18,  133 => 104,  124 => 52,  111 => 35,  107 => 29,  80 => 22,  69 => 45,  60 => 9,  52 => 7,  97 => 38,  95 => 33,  88 => 66,  78 => 57,  75 => 15,  71 => 20,  464 => 189,  459 => 362,  454 => 105,  449 => 176,  443 => 178,  429 => 284,  425 => 371,  420 => 277,  406 => 162,  402 => 142,  399 => 214,  343 => 125,  339 => 215,  335 => 143,  321 => 137,  317 => 123,  314 => 87,  311 => 133,  305 => 186,  291 => 174,  287 => 114,  282 => 129,  268 => 125,  264 => 112,  259 => 123,  245 => 90,  241 => 110,  236 => 187,  222 => 76,  218 => 105,  159 => 32,  154 => 46,  151 => 73,  145 => 77,  136 => 31,  128 => 25,  125 => 63,  119 => 38,  110 => 23,  96 => 62,  93 => 34,  91 => 33,  68 => 48,  65 => 12,  63 => 36,  43 => 25,  50 => 5,  25 => 50,  92 => 30,  86 => 61,  79 => 18,  46 => 10,  37 => 20,  33 => 14,  27 => 9,  82 => 19,  72 => 31,  64 => 35,  53 => 12,  49 => 11,  44 => 25,  42 => 20,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 10,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 65,  215 => 73,  211 => 101,  204 => 99,  200 => 111,  195 => 47,  193 => 160,  190 => 98,  188 => 146,  185 => 149,  179 => 92,  177 => 146,  171 => 76,  162 => 83,  158 => 81,  156 => 80,  153 => 47,  146 => 42,  142 => 56,  137 => 55,  131 => 58,  126 => 74,  120 => 45,  117 => 59,  103 => 71,  99 => 20,  77 => 18,  74 => 53,  57 => 13,  47 => 9,  39 => 10,  32 => 9,  24 => 7,  17 => 1,  135 => 64,  129 => 75,  122 => 76,  116 => 32,  113 => 36,  108 => 84,  104 => 30,  102 => 21,  94 => 61,  89 => 65,  87 => 31,  84 => 48,  81 => 24,  73 => 50,  70 => 40,  67 => 18,  62 => 17,  59 => 11,  55 => 8,  51 => 30,  48 => 12,  41 => 4,  38 => 3,  35 => 7,  31 => 14,  28 => 6,);
    }
}
