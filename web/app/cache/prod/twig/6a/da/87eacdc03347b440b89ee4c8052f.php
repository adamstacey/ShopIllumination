<?php

/* WebIlluminationAdminBundle:System:ajaxGetContactsScript.js.twig */
class __TwigTemplate_6ada87eacdc03347b440b89ee4c8052f extends Twig_Template
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
        // line 2
        $this->env->loadTemplate("WebIlluminationAdminBundle:System:ajaxGetContactsFunctions.js.twig")->display(array_merge($context, array("objectId" => $this->getContext($context, "objectId"), "objectType" => $this->getContext($context, "objectType"), "contacts" => $this->getContext($context, "contacts"), "contactTitles" => $this->getContext($context, "contactTitles"))));
        // line 3
        echo "\t\$(document).ready(function() {
\t\t";
        // line 5
        echo "\t\t\$(\".contact-numbers-loading\").each(function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\tloadContactNumbers(\$contactId, 0);
\t\t});
\t\t
\t\t";
        // line 11
        echo "\t\t\$(\".contact-addresses-loading\").each(function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\tloadContactAddresses(\$contactId, 0);
\t\t});
\t\t
\t\t";
        // line 17
        echo "\t\t\$(\".contact-web-addresses-loading\").each(function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\tloadContactWebAddresses(\$contactId, 0);
\t\t});
\t\t
\t\t";
        // line 23
        echo "\t\t\$(\".contact-email-addresses-loading\").each(function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\tloadContactEmailAddresses(\$contactId, 0);
\t\t});
\t\t
\t\t";
        // line 29
        echo "\t\t\$(\".contact-organisation-name, .contact-first-name, .contact-last-name\").live('keyup', function() {
\t\t\tvar \$elementIndex = \$(this).attr(\"data-index\");
\t\t\tvar \$displayName = '';
\t\t\tvar \$firstName = \$(\"#form-contact-first-name-\"+\$elementIndex).val();
\t\t\tvar \$lastName = \$(\"#form-contact-last-name-\"+\$elementIndex).val();
\t\t\tvar \$organisationName = \$(\"#form-contact-organisation-name-\"+\$elementIndex).val();
\t\t\tif (\$organisationName != '')
\t\t\t{
\t\t\t\t\$displayName = \$organisationName;
\t\t\t\tif ((\$firstName != '') || (\$lastName != ''))
\t\t\t\t{
\t\t\t\t\t\$displayName = \$displayName + ' (' + \$.trim(\$firstName + ' ' + \$lastName) + ')';
\t\t\t\t}
\t\t\t} else {
\t\t\t\t\$displayName = \$.trim(\$firstName + ' ' + \$lastName);
\t\t\t}
\t\t\t\$(\"#form-contact-display-name-\"+\$elementIndex).val(\$displayName);
\t\t});
\t\t
\t\t";
        // line 49
        echo "\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\$(\".action-select-all-contacts\").live('click', function() {
\t\t\t\$(\"li.contact-container td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.contact-container\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-select\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-contacts\").fadeIn();
\t\t\t\$(\".action-select-all-contacts\").hide();
\t\t\t\$(\".action-unselect-all-contacts\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-contacts\").live('click', function() {
\t\t\t\$(\"li.contact-container td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.contact-container\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-select\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 68
        echo "\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\$(\"input.contact-select\").live('change', function() {
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$(this).attr(\"data-index\")).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#contact-\"+\$(this).attr(\"data-index\")).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.contact-container:visible .contact-select:checked\").length < \$(\"li.contact-container:visible .contact-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-contacts\").hide();
\t\t\t}
\t\t\tif (\$(\"li.contact-container:visible .contact-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-contacts\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-contacts\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 93
        echo "\t\t\$(\".action-add-new-contact\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewContact();
\t\t});
\t\t
\t\t";
        // line 100
        echo "\t\t\$(\".contact-display-name, .contact-organisation-name, .contact-contact-title-id, .contact-first-name, .contact-middle-name, .contact-last-name\").live('change', function() {
\t\t\t\$(\"#form-contact-requires-update-\"+\$(this).closest(\"li.contact-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 105
        echo "\t\t\$(\"#form-contacts-container\").sortable({
\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\ttoleranceElement: '> div',
\t\t\tupdate: function(event, ui) {
\t\t\t\treOrderContacts();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 114
        echo "\t\t\$(\".contact-container .accordion\").accordion({
\t    \tautoHeight: false,
\t    \tcollapsible: true,
\t    \tactive: false
\t    });
\t\t
\t\t";
        // line 121
        echo "\t\t\$(\".action-update-contacts-and-leave\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateContacts();
\t\t});
\t\t\t\t\t
\t\t";
        // line 128
        echo "\t\t\$(\".action-update-contacts\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#contacts-tab-to-redirect-to\").val(\"-1\");
\t\t\tupdateContacts();
\t\t});
\t\t
\t\t";
        // line 136
        echo "\t\t\$(\".action-confirm-delete-contact\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(\"#form-contact-id-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-container\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
        \t\t\t\tloadNewContact();
        \t\t\t} else {
        \t\t\t\treOrderContacts();
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#contact-confirm-delete-button\").attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-cancel-delete-button\").attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-confirm-delete\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-confirm-delete\").offset().top - 10},'slow');
\t\t\t\t\$(\"#contact-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" input.contact-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 169
        echo "\t\t\$(\".action-cancel-delete-contact\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#contact-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"#contact-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"#contact-\"+\$elementIndex+\" input.contact-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#contact-confirm-delete\").hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 182
        echo "\t\t\$(\".action-delete-contact\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(\"#form-contact-id-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-container\").length < 1)
        \t\t\t{
        \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
        \t\t\t\tloadNewContact();
        \t\t\t} else {
        \t\t\t\treOrderContacts();
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 204
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-contact-id-\"+\$elementIndex).val(),
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#contact-error-message-text\").html('Sorry, there was a problem deleting your contact. Please try again.');
\t\t\t      \t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t      \t\t\$(\"#contact-confirm-delete\").hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#contact-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#contact-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.contact-container:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t\t        \t\t\t\tloadNewContact();
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderContacts();
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#contact-error-message-text\").html('Sorry, there was a problem deleting your contact. Please try again.');
\t\t\t        \t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#contact-confirm-delete\").hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 246
        echo "\t\t\$(\".action-confirm-delete-contacts\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.contact-container:visible input.contact-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-contact-id-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#contact-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#contact-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.contact-container\").length < 1)
\t\t    \t\t\t{
\t\t    \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t    \t\t\t\tloadNewContact();
\t\t    \t\t\t} else {
\t\t    \t\t\t\treOrderContacts();
\t\t    \t\t\t}
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#contact-confirm-deletes\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-confirm-deletes\").offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 280
        echo "\t\t\$(\".action-cancel-delete-contacts\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-confirm-deletes\").hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 289
        echo "\t\t\$(\".action-delete-contacts\").live('click', function() {
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.contact-container:visible input.contact-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.contact-container:visible input.contact-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 301
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-contact-id-\"+\$elementIndex).val(),
\t\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#contact-error-message-text\").html('Sorry, there were problems deleting your selected contacts. Please try again.');
\t\t\t\t        \t\t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.contact-container:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t\t        \t\t\t\tloadNewContact();
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderContacts();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#contact-confirm-deletes\").hide();
\t\t\t\t        \t\tif (\$(\"li.contact-container:visible input.contact-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contacts\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#contact-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#contact-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#contact-error-message-text\").html('Sorry, there were problems deleting your selected contacts. Please try again.');
\t\t\t\t\t\t        \t\t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-container:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewContact();
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderContacts();
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#contact-confirm-deletes\").hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-container:visible input.contact-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contacts\").fadeOut();
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
\t\t\t\t\t        \t\t\t\$(\"#contact-error-message-text\").html('Sorry, there were problems deleting your selected contacts. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.contact-container:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contacts\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contacts\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contacts\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewContact();
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderContacts();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#contact-confirm-deletes\").hide();
\t\t\t\t\t        \t\tif (\$(\"li.contact-container:visible input.contact-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contacts\").fadeOut();
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
\t\t\tif (\$(\"input.contact-requires-update[value='1']\").length > 0)
\t\t\t{
\t\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\t\$(\".form-error\").remove();
\t\t\t\t\$(\"#contact-leave-contacts-button\").attr(\"data-tab-index\", ui.index);
\t\t\t\t\$(\"#contacts-tab-to-redirect-to\").val(ui.index);
\t\t\t\t\$(\"#contact-confirm-leave\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\treturn false;
\t\t\t}
\t\t\treturn true;
\t\t});
\t\t
\t\t\$(\".action-leave-contacts\").live('click', function() {
\t\t\t\$(\"input.contact-requires-update\").val(\"0\");
\t\t\t\$(\"input.contact-id[value='0']\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\t\$(\"#contact-\"+\$elementIndex).remove();
\t\t\t});
\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(this).attr(\"data-tab-index\")));
\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t});
\t\t
\t\t";
        // line 428
        echo "\t\t";
        // line 429
        echo "\t\t";
        // line 430
        echo "
\t\t";
        // line 432
        echo "\t\t\$(\".action-select-all-contact-numbers\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-number-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-contact-numbers\").live('click', function() {
\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-number-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 451
        echo "\t\t\$(\"input.contact-number-select\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible .contact-number-select:checked\").length < \$(\"li.contact-container[data-contact-id='\"+\$contactId+\"']:visible .contact-number-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible .contact-number-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 477
        echo "\t\t\$(\".action-add-new-contact-number\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewContactNumber(\$contactId);
\t\t});
\t\t
\t\t";
        // line 485
        echo "\t\t\$(\".contact-number-field\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#form-contact-number-requires-update-\"+\$contactId+\"-\"+\$elementIndex).val(\"1\");
\t\t\t\$(\"#form-contact-requires-update-\"+\$(this).closest(\"li.contact-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 493
        echo "\t\t\$(\".action-update-contact-numbers\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateContactNumbers(\$contactId);
\t\t});
\t\t
\t\t";
        // line 501
        echo "\t\t\$(\".action-confirm-delete-contact-number\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactNumber(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactNumbers(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#contact-number-confirm-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-number-cancel-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-number-confirm-delete-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-number-confirm-delete-\"+\$contactId).offset().top - 10},'slow');
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-number-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 535
        echo "\t\t\$(\".action-cancel-delete-contact-number\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"##contact-number-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"##contact-number-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-number-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#contact-number-confirm-delete-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 549
        echo "\t\t\$(\".action-delete-contact-number\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactNumber(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactNumbers(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 572
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_number"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\tcontactId: \$contactId,
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact number. Please try again.');
\t\t\t      \t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t      \t\t\$(\"#contact-number-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#contact-number-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#contact-number-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactNumber(data.contactId);
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderContactNumbers(data.contactId);
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact number. Please try again.');
\t\t\t        \t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#contact-number-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 615
        echo "\t\t\$(\".action-confirm-delete-contact-numbers\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-number-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t        \t\t\t{
\t\t\t\t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t        \t\t\t\tloadNewContactNumber(\$contactId);
\t        \t\t\t} else {
\t        \t\t\t\treOrderContactNumbers(\$contactId);
\t        \t\t\t}
\t        \t\t\t\$(\"#ajax_loading\").hide();
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#contact-number-confirm-deletes-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-number-confirm-deletes-\"+\$contactId).offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 651
        echo "\t\t\$(\".action-cancel-delete-contact-numbers\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-number-confirm-deletes-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 662
        echo "\t\t\$(\".action-delete-contact-numbers\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-number-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-number-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 675
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_number"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\t\tcontactId: \$contactId,
\t\t\t      \t\t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact numbers. Please try again.');
\t\t\t\t\t        \t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactNumber(\$contactId);
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderContactNumbers(\$contactId);
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#contact-number-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-number-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#contact-number-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#contact-number-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#contact-number-error-message-text-\"+data.contactId).html('Sorry, there were problems deleting your selected contact numbers. Please try again.');
\t\t\t\t\t        \t\t\t\t\$(\"#contact-number-error-message-\"+data.contactId).fadeIn();
\t\t\t\t\t        \t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+data.contactId).offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewContactNumber(data.contactId);
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderContactNumbers(data.contactId);
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#contact-number-confirm-deletes-\"+data.contactId).hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+data.contactId+\"']:visible input.contact-number-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+data.contactId+\"']\").fadeOut();
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
\t\t\t\t\t        \t\t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact numbers. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewContactNumber(\$contactId);
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderContactNumbers(\$contactId);
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#contact-number-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t\t        \t\tif (\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-number-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-numbers[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t        \t}
\t\t\t\t        \t}
\t\t\t\t        \t\$(\"#contact-number-confirm-delete-\"+\$contactId).hide();
\t\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 779
        echo "\t\t";
        // line 780
        echo "\t\t";
        // line 781
        echo "
\t\t";
        // line 783
        echo "\t\t\$(\".action-select-all-contact-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-contact-addresses\").live('click', function() {
\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 802
        echo "\t\t\$(\"input.contact-address-select\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-address-select:checked\").length < \$(\"li.contact-container[data-contact-id='\"+\$contactId+\"']:visible .contact-address-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-address-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 828
        echo "\t\t\$(\".action-add-new-contact-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewContactAddress(\$contactId);
\t\t});
\t\t
\t\t";
        // line 836
        echo "\t\t\$(\".contact-address-field\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#form-contact-address-requires-update-\"+\$contactId+\"-\"+\$elementIndex).val(\"1\");
\t\t\t\$(\"#form-contact-requires-update-\"+\$(this).closest(\"li.contact-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 844
        echo "\t\t\$(\".action-update-contact-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateContactAddresses(\$contactId);
\t\t});
\t\t
\t\t";
        // line 852
        echo "\t\t\$(\".action-confirm-delete-contact-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#contact-address-confirm-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-address-cancel-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-address-confirm-delete-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-address-confirm-delete-\"+\$contactId).offset().top - 10},'slow');
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-address-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 886
        echo "\t\t\$(\".action-cancel-delete-contact-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"##contact-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"##contact-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-address-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#contact-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 900
        echo "\t\t\$(\".action-delete-contact-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 923
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_address"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\tcontactId: \$contactId,
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact address. Please try again.');
\t\t\t      \t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t      \t\t\$(\"#contact-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#contact-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#contact-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactAddress(data.contactId);
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderContactAddresses(data.contactId);
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact address. Please try again.');
\t\t\t        \t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#contact-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 966
        echo "\t\t\$(\".action-confirm-delete-contact-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-address-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t        \t\t\t{
\t\t\t\t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t        \t\t\t\tloadNewContactAddress(\$contactId);
\t        \t\t\t} else {
\t        \t\t\t\treOrderContactAddresses(\$contactId);
\t        \t\t\t}
\t        \t\t\t\$(\"#ajax_loading\").hide();
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#contact-address-confirm-deletes-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-address-confirm-deletes-\"+\$contactId).offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1002
        echo "\t\t\$(\".action-cancel-delete-contact-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1013
        echo "\t\t\$(\".action-delete-contact-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-address-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-address-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 1026
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_address"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\t\tcontactId: \$contactId,
\t\t\t      \t\t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact addresses. Please try again.');
\t\t\t\t\t        \t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactAddress(\$contactId);
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderContactAddresses(\$contactId);
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#contact-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-address-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#contact-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#contact-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#contact-address-error-message-text-\"+data.contactId).html('Sorry, there were problems deleting your selected contact addresses. Please try again.');
\t\t\t\t\t        \t\t\t\t\$(\"#contact-address-error-message-\"+data.contactId).fadeIn();
\t\t\t\t\t        \t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+data.contactId).offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewContactAddress(data.contactId);
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderContactAddresses(data.contactId);
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#contact-address-confirm-deletes-\"+data.contactId).hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+data.contactId+\"']:visible input.contact-address-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+data.contactId+\"']\").fadeOut();
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
\t\t\t\t\t        \t\t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact addresses. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewContactAddress(\$contactId);
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderContactAddresses(\$contactId);
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#contact-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t\t        \t\tif (\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-address-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t        \t}
\t\t\t\t        \t}
\t\t\t\t        \t\$(\"#contact-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1130
        echo "\t\t";
        // line 1131
        echo "\t\t";
        // line 1132
        echo "
\t\t";
        // line 1134
        echo "\t\t\$(\".action-select-all-contact-email-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-email-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-contact-email-addresses\").live('click', function() {
\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-email-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 1153
        echo "\t\t\$(\"input.contact-email-address-select\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-email-address-select:checked\").length < \$(\"li.contact-container[data-contact-id='\"+\$contactId+\"']:visible .contact-email-address-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-email-address-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1179
        echo "\t\t\$(\".action-add-new-contact-email-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewContactEmailAddress(\$contactId);
\t\t});
\t\t
\t\t";
        // line 1187
        echo "\t\t\$(\".contact-email-address-field\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#form-contact-email-address-requires-update-\"+\$contactId+\"-\"+\$elementIndex).val(\"1\");
\t\t\t\$(\"#form-contact-requires-update-\"+\$(this).closest(\"li.contact-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 1195
        echo "\t\t\$(\".action-update-contact-email-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateContactEmailAddresses(\$contactId);
\t\t});
\t\t
\t\t";
        // line 1203
        echo "\t\t\$(\".action-confirm-delete-contact-email-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactEmailAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactEmailAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#contact-email-address-confirm-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-email-address-cancel-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-email-address-confirm-delete-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-email-address-confirm-delete-\"+\$contactId).offset().top - 10},'slow');
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-email-address-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1237
        echo "\t\t\$(\".action-cancel-delete-contact-email-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"##contact-email-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"##contact-email-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-email-address-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#contact-email-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1251
        echo "\t\t\$(\".action-delete-contact-email-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactEmailAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactEmailAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 1274
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_email_address"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\tcontactId: \$contactId,
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact email address. Please try again.');
\t\t\t      \t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t      \t\t\$(\"#contact-email-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#contact-email-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#contact-email-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactEmailAddress(data.contactId);
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderContactEmailAddresses(data.contactId);
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact email address. Please try again.');
\t\t\t        \t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#contact-email-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1317
        echo "\t\t\$(\".action-confirm-delete-contact-email-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-email-address-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t        \t\t\t{
\t\t\t\t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t        \t\t\t\tloadNewContactEmailAddress(\$contactId);
\t        \t\t\t} else {
\t        \t\t\t\treOrderContactEmailAddresses(\$contactId);
\t        \t\t\t}
\t        \t\t\t\$(\"#ajax_loading\").hide();
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#contact-email-address-confirm-deletes-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-email-address-confirm-deletes-\"+\$contactId).offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1353
        echo "\t\t\$(\".action-cancel-delete-contact-email-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-email-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1364
        echo "\t\t\$(\".action-delete-contact-email-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-email-address-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-email-address-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 1377
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_email_address"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\t\tcontactId: \$contactId,
\t\t\t      \t\t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact email addresses. Please try again.');
\t\t\t\t\t        \t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactEmailAddress(\$contactId);
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderContactEmailAddresses(\$contactId);
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#contact-email-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-email-address-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#contact-email-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#contact-email-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#contact-email-address-error-message-text-\"+data.contactId).html('Sorry, there were problems deleting your selected contact email addresses. Please try again.');
\t\t\t\t\t        \t\t\t\t\$(\"#contact-email-address-error-message-\"+data.contactId).fadeIn();
\t\t\t\t\t        \t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+data.contactId).offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewContactEmailAddress(data.contactId);
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderContactEmailAddresses(data.contactId);
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#contact-email-address-confirm-deletes-\"+data.contactId).hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+data.contactId+\"']:visible input.contact-email-address-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+data.contactId+\"']\").fadeOut();
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
\t\t\t\t\t        \t\t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact email addresses. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewContactEmailAddress(\$contactId);
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderContactEmailAddresses(\$contactId);
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#contact-email-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t\t        \t\tif (\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-email-address-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-email-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t        \t}
\t\t\t\t        \t}
\t\t\t\t        \t\$(\"#contact-email-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1481
        echo "\t\t";
        // line 1482
        echo "\t\t";
        // line 1483
        echo "
\t\t";
        // line 1485
        echo "\t\t\$(\".action-select-all-contact-web-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").addClass(\"checked\");
\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']\").addClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-web-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"checked\");
\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t\$(\".action-unselect-all-contact-web-addresses\").live('click', function() {
\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"'] td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']\").removeClass(\"ui-state-highlight\");
\t\t\t\$(\"input.contact-web-address-select[data-contact-id='\"+\$contactId+\"']\").attr(\"checked\", \"\");
\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t});
\t\t
\t\t";
        // line 1504
        echo "\t\t\$(\"input.contact-web-address-select\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\tif (\$(this).is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-highlight\");
\t\t\t} else {
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-highlight\");
\t\t\t}
\t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-web-address-select:checked\").length < \$(\"li.contact-container[data-contact-id='\"+\$contactId+\"']:visible .contact-web-address-select\").length)
\t\t\t{
\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible .contact-web-address-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1530
        echo "\t\t\$(\".action-add-new-contact-web-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tloadNewContactWebAddress(\$contactId);
\t\t});
\t\t
\t\t";
        // line 1538
        echo "\t\t\$(\".contact-web-address-field\").live('change', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#form-contact-web-address-requires-update-\"+\$contactId+\"-\"+\$elementIndex).val(\"1\");
\t\t\t\$(\"#form-contact-requires-update-\"+\$(this).closest(\"li.contact-container\").attr(\"data-index\")).val(\"1\");
\t\t});
\t\t
\t\t";
        // line 1546
        echo "\t\t\$(\".action-update-contact-web-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\tupdateContactWebAddresses(\$contactId);
\t\t});
\t\t
\t\t";
        // line 1554
        echo "\t\t\$(\".action-confirm-delete-contact-web-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactWebAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactWebAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$(\"#contact-web-address-confirm-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-web-address-cancel-delete-button-\"+\$contactId).attr(\"data-contact-id\", \$contactId).attr(\"data-index\", \$elementIndex);
\t\t\t\t\$(\"#contact-web-address-confirm-delete-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-web-address-confirm-delete-\"+\$contactId).offset().top - 10},'slow');
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").addClass(\"checked\");
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-web-address-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1588
        echo "\t\t\$(\".action-cancel-delete-contact-web-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).removeClass(\"ui-state-error\");
\t\t\t\$(\"##contact-web-address-\"+\$contactId+\"-\"+\$elementIndex+\" td.delete div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"##contact-web-address-\"+\$contactId+\"-\"+\$elementIndex+\" input.contact-web-address-select\").attr(\"checked\", \"\");
\t\t\t\$(\"#contact-web-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1602
        echo "\t\t\$(\".action-delete-contact-web-address\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\tif (\$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t{
\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
        \t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
        \t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
        \t\t\t{
\t\t\t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
        \t\t\t\tloadNewContactWebAddress(\$contactId);
        \t\t\t} else {
        \t\t\t\treOrderContactWebAddresses(\$contactId);
        \t\t\t}
        \t\t\t\$(\"#ajax_loading\").hide();
        \t\t});
\t\t\t} else {
\t\t\t\t\$.ajax({
\t\t\t    \turl: \"";
        // line 1625
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_web_address"), "html", null, true);
        echo "\",
\t\t\t      \ttype: \"GET\",
\t\t\t      \tdataType: \"json\",
\t\t\t      \tdata: {
\t\t\t      \t\tid: \$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\tcontactId: \$contactId,
\t\t\t      \t\telementIndex: \$elementIndex
\t\t\t      \t},
\t\t\t      \terror: function(data) {
\t\t\t      \t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact web address. Please try again.');
\t\t\t      \t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t      \t\t\$(\"#contact-web-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t        \t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t      \t},
\t\t\t      \tsuccess: function(data) {
\t\t\t        \tif (data.response == 'success')
\t\t\t        \t{
\t\t\t        \t\t\$(\"#contact-web-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t        \t\t\t\$(\"#contact-web-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t        \t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactWebAddress(data.contactId);
\t\t\t        \t\t\t} else {
\t\t\t        \t\t\t\treOrderContactWebAddresses(data.contactId);
\t\t\t        \t\t\t}
\t\t\t        \t\t});
\t\t\t        \t} else {
\t\t\t        \t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Sorry, there was a problem deleting your contact web address. Please try again.');
\t\t\t        \t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t        \t}
\t\t\t        \t\$(\"#contact-web-address-confirm-delete-\"+\$contactId).hide();
\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t      \t}
\t\t\t   \t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 1668
        echo "\t\t\$(\".action-confirm-delete-contact-web-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$deletesNeedingConfirmation = 0;
\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-web-address-select:checked\").each(function(index) {
\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\tif (\$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val() == \"0\")
\t\t\t\t{
\t\t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).fadeOut(function() {
\t        \t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).remove();
\t        \t\t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t        \t\t\t{
\t\t\t\t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t        \t\t\t\tloadNewContactWebAddress(\$contactId);
\t        \t\t\t} else {
\t        \t\t\t\treOrderContactWebAddresses(\$contactId);
\t        \t\t\t}
\t        \t\t\t\$(\"#ajax_loading\").hide();
\t        \t\t});
\t\t\t\t} else {
\t\t\t\t\t\$deletesNeedingConfirmation++;
\t\t\t\t}
\t\t\t});
\t\t\tif (\$deletesNeedingConfirmation > 0)
\t\t\t{
\t\t\t\t\$(\"#contact-web-address-confirm-deletes-\"+\$contactId).fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contact-web-address-confirm-deletes-\"+\$contactId).offset().top - 10},'slow');
\t\t\t}
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1704
        echo "\t\t\$(\".action-cancel-delete-contact-web-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$elementIndex = \$(this).attr(\"data-index\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$(\"#contact-web-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\$(\"#ajax_loading\").hide();
\t\t});
\t\t
\t\t";
        // line 1715
        echo "\t\t\$(\".action-delete-contact-web-addresses\").live('click', function() {
\t\t\t\$contactId = \$(this).attr(\"data-contact-id\");
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\t\t\$(\".form-error\").remove();
\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\$errorOccurred = false;
\t\t\t\$numberOfElementsToDelete = \$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-web-address-select:checked\").length;
\t\t\t\$numberOfElementsProcessed = 0;
\t\t\tif (\$numberOfElementsToDelete > 0)
\t\t\t{
\t\t\t\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-web-address-select:checked\").each(function(index) {
\t\t\t\t\t\$elementIndex = \$(this).attr(\"data-index\");\t\t\t\t
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 1728
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_delete_contact_web_address"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tid: \$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t\t      \t\t\tcontactId: \$contactId,
\t\t\t      \t\t\telementIndex: \$elementIndex
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$errorOccurred = true;
\t\t\t\t      \t\t\$numberOfElementsProcessed++;
\t\t\t\t      \t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t        \t{
\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact web addresses. Please try again.');
\t\t\t\t\t        \t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t        \t\t}
\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t        \t\t\t{
\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t        \t\t\t\tloadNewContactWebAddress(\$contactId);
\t\t\t        \t\t\t} else {
\t\t\t\t        \t\t\treOrderContactWebAddresses(\$contactId);
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#contact-web-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-web-address-select:checked\").length < 1)
\t\t\t\t        \t\t{
\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t        \t\t}
\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t        \t}
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t        \tif (data.response == 'success')
\t\t\t\t        \t{
\t\t\t\t        \t\t\$(\"#contact-web-address-\"+data.contactId+\"-\"+data.elementIndex).fadeOut(function() {
\t\t\t\t        \t\t\t\$(\"#contact-web-address-\"+data.contactId+\"-\"+data.elementIndex).remove();
\t\t\t\t        \t\t\t\$numberOfElementsProcessed++;
\t\t\t\t        \t\t\tif (\$numberOfElementsToDelete == \$numberOfElementsProcessed)
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\tif (\$errorOccurred)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\"#contact-web-address-error-message-text-\"+data.contactId).html('Sorry, there were problems deleting your selected contact web addresses. Please try again.');
\t\t\t\t\t        \t\t\t\t\$(\"#contact-web-address-error-message-\"+data.contactId).fadeIn();
\t\t\t\t\t        \t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+data.contactId).offset().top + 35},'slow');
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+data.contactId+\"']:visible\").length < 1)
\t\t\t\t\t        \t\t\t{
\t\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").fadeIn();
\t\t\t\t\t        \t\t\t\tloadNewContactWebAddress(data.contactId);
\t\t\t\t\t        \t\t\t} else {
\t\t\t\t\t\t        \t\t\treOrderContactWebAddresses(data.contactId);
\t\t\t\t\t\t        \t\t}
\t\t\t\t\t\t        \t\t\$(\"#contact-web-address-confirm-deletes-\"+data.contactId).hide();
\t\t\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+data.contactId+\"']:visible input.contact-web-address-select:checked\").length < 1)
\t\t\t\t\t\t        \t\t{
\t\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+data.contactId+\"']\").fadeOut();
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
\t\t\t\t\t        \t\t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Sorry, there were problems deleting your selected contact web addresses. Please try again.');
\t\t\t\t\t        \t\t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length < 1)
\t\t\t\t        \t\t\t{
\t\t\t\t        \t\t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-unselect-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").hide();
\t\t\t\t\t\t\t\t\t\t\$(\".action-select-all-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeIn();
\t\t\t\t        \t\t\t\tloadNewContactWebAddress(\$contactId);
\t\t\t\t        \t\t\t} else {
\t\t\t\t\t        \t\t\treOrderContactWebAddresses(\$contactId);
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#contact-web-address-confirm-deletes-\"+\$contactId).hide();
\t\t\t\t\t        \t\tif (\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible input.contact-web-address-select:checked\").length < 1)
\t\t\t\t\t        \t\t{
\t\t\t\t\t        \t\t\t\$(\".action-confirm-delete-contact-web-addresses[data-contact-id='\"+\$contactId+\"']\").fadeOut();
\t\t\t\t\t        \t\t}
\t\t\t\t\t        \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t        \t}
\t\t\t\t        \t}
\t\t\t\t        \t\$(\"#contact-web-address-confirm-delete-\"+\$contactId).hide();
\t\t\t\t        \t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t});
\t\t\t}
\t\t});
\t});
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:ajaxGetContactsScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 127,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 641,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 615,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 146,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 35,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 111,  288 => 123,  229 => 105,  206 => 54,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 71,  273 => 86,  263 => 229,  246 => 80,  234 => 106,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 119,  262 => 86,  235 => 51,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 220,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 67,  223 => 102,  186 => 45,  169 => 136,  301 => 65,  298 => 100,  292 => 98,  267 => 57,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 144,  182 => 44,  175 => 40,  144 => 114,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 43,  208 => 64,  183 => 58,  166 => 138,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 111,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 98,  279 => 120,  275 => 119,  265 => 116,  251 => 54,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 37,  172 => 53,  168 => 52,  149 => 50,  139 => 41,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 30,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 128,  45 => 9,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 53,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 26,  85 => 63,  76 => 31,  112 => 25,  101 => 37,  98 => 75,  272 => 118,  269 => 91,  228 => 105,  221 => 72,  197 => 89,  184 => 64,  138 => 27,  118 => 92,  105 => 38,  66 => 16,  56 => 19,  115 => 58,  83 => 18,  164 => 51,  140 => 38,  58 => 17,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 154,  189 => 86,  178 => 79,  176 => 41,  165 => 36,  161 => 35,  152 => 121,  148 => 32,  141 => 45,  134 => 105,  132 => 102,  127 => 99,  123 => 39,  109 => 84,  90 => 35,  54 => 12,  133 => 40,  124 => 60,  111 => 30,  107 => 24,  80 => 24,  69 => 16,  60 => 16,  52 => 16,  97 => 27,  95 => 37,  88 => 21,  78 => 23,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 164,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 204,  236 => 107,  222 => 62,  218 => 100,  159 => 34,  154 => 124,  151 => 121,  145 => 29,  136 => 103,  128 => 100,  125 => 98,  119 => 26,  110 => 42,  96 => 34,  93 => 20,  91 => 36,  68 => 29,  65 => 23,  63 => 17,  43 => 13,  50 => 18,  25 => 5,  92 => 36,  86 => 22,  79 => 29,  46 => 23,  37 => 4,  33 => 7,  27 => 5,  82 => 33,  72 => 22,  64 => 17,  53 => 29,  49 => 11,  44 => 15,  42 => 13,  34 => 9,  29 => 7,  23 => 3,  19 => 2,  40 => 7,  20 => 2,  30 => 7,  26 => 6,  22 => 3,  224 => 101,  215 => 58,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 76,  188 => 153,  185 => 40,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 49,  153 => 30,  146 => 110,  142 => 42,  137 => 28,  131 => 44,  126 => 40,  120 => 93,  117 => 31,  103 => 33,  99 => 19,  77 => 56,  74 => 49,  57 => 13,  47 => 27,  39 => 17,  32 => 11,  24 => 5,  17 => 1,  135 => 105,  129 => 32,  122 => 26,  116 => 58,  113 => 53,  108 => 41,  104 => 24,  102 => 29,  94 => 68,  89 => 22,  87 => 30,  84 => 34,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 15,  59 => 18,  55 => 29,  51 => 13,  48 => 15,  41 => 23,  38 => 21,  35 => 10,  31 => 12,  28 => 11,);
    }
}
