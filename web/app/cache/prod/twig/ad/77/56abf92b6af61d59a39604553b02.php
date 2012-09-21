<?php

/* WebIlluminationAdminBundle:System:ajaxGetGuaranteesScript.js.twig */
class __TwigTemplate_ad7756abf92b6af61d59a39604553b02 extends Twig_Template
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
\t\$(document).ready(function() {
\t\t";
        // line 4
        echo "\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\$(\".action-select-all-guarantees\").live('click', function() {
\t\t\t\$(\"li.guarantee-container td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.guarantee-container\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.guarantee-select\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-guarantees\").fadeIn();
\t\t\t\$(\".action-select-all-guarantees\").hide();
\t\t\t\$(\".action-unselect-all-guarantees\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-guarantees\").live('click', function() {
\t\t\t\$(\"li.guarantee-container td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.guarantee-container\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.guarantee-select\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 23
        echo "\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\$(\"input.guarantee-select\").live('change', function() {
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#guarantee-\"+\$(this).attr(\"data-index\")).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#guarantee-\"+\$(this).attr(\"data-index\")).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.guarantee-container:visible .guarantee-select:checked\").length < \$(\"li.guarantee-container:visible .guarantee-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-guarantees\").hide();
\t\t\t}
\t\t\tif (\$(\"li.guarantee-container:visible .guarantee-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-guarantees\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-guarantees\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 48
        echo "\t\t\$(\".action-add-new-guarantee\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewGuarantee();
\t\t});
\t\t
\t\t";
        // line 55
        echo "\t\t\$(\".guarantee-length, .guarantee-type\").live('change', function() {
\t\t\t\$(\"#form-guarantee-requires-update-\"+\$(this).closest(\"li.guarantee-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 60
        echo "\t\t\$(\"#form-guarantees-container\").sortable({
\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\ttoleranceElement: '> div',
\t\t\tupdate: function(event, ui) {
\t\t\t\treOrderGuarantees();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 69
        echo "\t\t\$(\".action-update-guarantees-and-leave\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateGuarantees();
\t\t});
\t\t\t\t\t
\t\t";
        // line 76
        echo "\t\t\$(\".action-update-guarantees\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#guarantees-tab-to-redirect-to\").val(\"-1\");
\t\t\tupdateGuarantees();
\t\t});
\t\t
\t\t";
        // line 84
        echo "\t\t\$(\".action-confirm-delete-guarantee\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(\"#form-guarantee-id-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#guarantee-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.guarantee-container\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
        \t\t\t\tloadNewGuarantee();
        \t\t\t} else {
        \t\t\t\treOrderGuarantees();
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#guarantee-confirm-delete-button\").attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#guarantee-cancel-delete-button\").attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#guarantee-confirm-delete\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantee-confirm-delete\").offset().top - 10},'slow');
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex+\" input.guarantee-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 117
        echo "\t\t\$(\".action-cancel-delete-guarantee\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#guarantee-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"#guarantee-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"#guarantee-\"+\$elementIndex+\" input.guarantee-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#guarantee-confirm-delete\").hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 130
        echo "\t\t\$(\".action-delete-guarantee\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(\"#form-guarantee-id-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#guarantee-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.guarantee-container\").length < 1)
        \t\t\t{
        \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
        \t\t\t\tloadNewGuarantee();
        \t\t\t} else {
        \t\t\t\treOrderGuarantees();
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 152
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_guarantee"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-guarantee-id-\"+\$elementIndex).val(),
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#guarantee-error-message-text\").html('Sorry, there was a problem deleting your guarantee. Please try again.');
\t\t\t      \t\t\$(\"#guarantee-error-message\").fadeIn();
\t\t\t      \t\t\$(\"#guarantee-confirm-delete\").hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#guarantee-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#guarantee-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.guarantee-container:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t\t        \t\t\t\tloadNewGuarantee();
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderGuarantees();
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#guarantee-error-message-text\").html('Sorry, there was a problem deleting your guarantee. Please try again.');
\t\t\t        \t\t\$(\"#guarantee-error-message\").fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#guarantee-confirm-delete\").hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 194
        echo "\t\t\$(\".action-confirm-delete-guarantees\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.guarantee-container:visible input.guarantee-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-guarantee-id-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#guarantee-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#guarantee-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.guarantee-container\").length < 1)
\t\t    \t\t\t{
\t\t    \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t    \t\t\t\tloadNewGuarantee();
\t\t    \t\t\t} else {
\t\t    \t\t\t\treOrderGuarantees();
\t\t    \t\t\t}
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#guarantee-confirm-deletes\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantee-confirm-deletes\").offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 228
        echo "\t\t\$(\".action-cancel-delete-guarantees\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#guarantee-confirm-deletes\").hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 237
        echo "\t\t\$(\".action-delete-guarantees\").live('click', function() {
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.guarantee-container:visible input.guarantee-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.guarantee-container:visible input.guarantee-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_guarantee"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-guarantee-id-\"+\$elementIndex).val(),
\t\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#guarantee-error-message-text\").html('Sorry, there were problems deleting your selected guarantees. Please try again.');
\t\t\t\t        \t\t\t\$(\"#guarantee-error-message\").fadeIn();
\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t\t        \t\t\t\tloadNewGuarantee();
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderGuarantees();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#guarantee-confirm-deletes\").hide();
\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible input.guarantee-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-guarantees\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#guarantee-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#guarantee-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#guarantee-error-message-text\").html('Sorry, there were problems deleting your selected guarantees. Please try again.');
\t\t\t\t\t\t        \t\t\t\$(\"#guarantee-error-message\").fadeIn();
\t\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewGuarantee();
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderGuarantees();
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#guarantee-confirm-deletes\").hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible input.guarantee-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-guarantees\").fadeOut();
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t        \t}
\t\t\t\t        \t\t});
\t\t\t\t        \t} else {
\t\t\t\t        \t\t\$errorOccurred = true;
\t\t\t\t        \t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t        \t{
\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\"#guarantee-error-message-text\").html('Sorry, there were problems deleting your selected guarantees. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#guarantee-error-message\").fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-guarantees\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-guarantees\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewGuarantee();
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderGuarantees();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#guarantee-confirm-deletes\").hide();
\t\t\t\t\t        \t\tif (\$(\"li.guarantee-container:visible input.guarantee-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-guarantees\").fadeOut();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t        \t}
\t\t\t\t        \t}
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t\$(\".sidebar-tabs\").bind(\"tabsselect\", function(event, ui) {
\t\t\tif (\$(\"input.guarantee-requires-update[value='1']\").length > 0)
\t\t\t{
\t\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\t\$(\".form-error\").remove();
\t\t\t\t\$(\"#guarantee-leave-guarantees-button\").attr(\"data-tab-index\", ui.index);
\t\t\t\t\$(\"#guarantees-tab-to-redirect-to\").val(ui.index);
\t\t\t\t\$(\"#guarantee-confirm-leave\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t\t\treturn false;
\t\t\t}
\t\t\treturn true;
\t\t});
\t\t
\t\t\$(\".action-leave-guarantees\").live('click', function() {
\t\t\t\$(\"input.guarantee-requires-update\").val(\"0\");
\t\t\t\$(\"input.guarantee-id[value='0']\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\t\$(\"#guarantee-\"+\$elementIndex).remove();
\t\t\t});
\t\t\t\$(\"#guarantees .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(this).attr(\"data-tab-index\")));
\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#guarantees\").offset().top + 35},'slow');
\t\t});\t\t
\t});
\t";
        // line 375
        $this->env->loadTemplate("WebIlluminationAdminBundle:System:ajaxGetGuaranteesFunctions.js.twig")->display(array_merge($context, array("objectId" => $this->getContext($context, "objectId"), "objectType" => $this->getContext($context, "objectType"), "guarantees" => $this->getContext($context, "guarantees"), "guaranteeTypes" => $this->getContext($context, "guaranteeTypes"), "guaranteeLengths" => $this->getContext($context, "guaranteeLengths"))));
        // line 376
        echo "</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:ajaxGetGuaranteesScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 127,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 641,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 615,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 146,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 35,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 111,  288 => 123,  229 => 105,  206 => 54,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 71,  273 => 86,  263 => 229,  246 => 80,  234 => 106,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 119,  262 => 86,  235 => 51,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 375,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 220,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 67,  223 => 102,  186 => 45,  169 => 136,  301 => 65,  298 => 100,  292 => 98,  267 => 57,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 144,  182 => 44,  175 => 40,  144 => 114,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 57,  208 => 64,  183 => 58,  166 => 138,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 111,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 249,  279 => 120,  275 => 240,  265 => 116,  251 => 219,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 152,  172 => 137,  168 => 52,  149 => 50,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 30,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 128,  45 => 9,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 53,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 228,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 26,  85 => 63,  76 => 31,  112 => 25,  101 => 77,  98 => 75,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 89,  184 => 64,  138 => 108,  118 => 92,  105 => 38,  66 => 18,  56 => 19,  115 => 58,  83 => 18,  164 => 51,  140 => 38,  58 => 17,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 154,  189 => 86,  178 => 79,  176 => 41,  165 => 36,  161 => 35,  152 => 125,  148 => 32,  141 => 45,  134 => 105,  132 => 102,  127 => 99,  123 => 98,  109 => 84,  90 => 35,  54 => 12,  133 => 40,  124 => 60,  111 => 30,  107 => 24,  80 => 24,  69 => 16,  60 => 16,  52 => 16,  97 => 27,  95 => 37,  88 => 21,  78 => 23,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 228,  245 => 119,  241 => 204,  236 => 107,  222 => 62,  218 => 100,  159 => 34,  154 => 124,  151 => 121,  145 => 29,  136 => 103,  128 => 100,  125 => 98,  119 => 26,  110 => 42,  96 => 34,  93 => 20,  91 => 69,  68 => 29,  65 => 23,  63 => 17,  43 => 13,  50 => 27,  25 => 7,  92 => 36,  86 => 22,  79 => 54,  46 => 26,  37 => 10,  33 => 7,  27 => 5,  82 => 33,  72 => 19,  64 => 17,  53 => 29,  49 => 13,  44 => 15,  42 => 13,  34 => 9,  29 => 7,  23 => 3,  19 => 2,  40 => 7,  20 => 2,  30 => 7,  26 => 6,  22 => 3,  224 => 194,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 76,  188 => 153,  185 => 40,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 130,  153 => 30,  146 => 110,  142 => 117,  137 => 28,  131 => 104,  126 => 40,  120 => 93,  117 => 58,  103 => 33,  99 => 76,  77 => 56,  74 => 49,  57 => 13,  47 => 27,  39 => 17,  32 => 11,  24 => 5,  17 => 1,  135 => 105,  129 => 32,  122 => 26,  116 => 58,  113 => 53,  108 => 84,  104 => 24,  102 => 29,  94 => 68,  89 => 22,  87 => 30,  84 => 20,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 15,  59 => 18,  55 => 14,  51 => 31,  48 => 15,  41 => 23,  38 => 21,  35 => 10,  31 => 12,  28 => 11,);
    }
}
