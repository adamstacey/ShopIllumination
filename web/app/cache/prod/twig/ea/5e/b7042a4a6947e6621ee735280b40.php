<?php

/* WebIlluminationAdminBundle:System:ajaxGetContactsFunctions.js.twig */
class __TwigTemplate_ea5eb7042a4a6947e6621ee735280b40 extends Twig_Template
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
        echo "function updateContacts()
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.contact-requires-update[value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$(\"input.contact-requires-update[value='1']\").each(function(index) {
\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_contact"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$(\"#form-contact-id-\"+\$elementIndex).val(),
\t\t      \t\tobjectId: '";
        // line 18
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
\t\t      \t\tobjectType: '";
        // line 19
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "',
\t\t      \t\tdisplayName: \$(\"#form-contact-display-name-\"+\$elementIndex).val(),
\t\t      \t\torganisationName: \$(\"#form-contact-organisation-name-\"+\$elementIndex).val(),
\t\t      \t\tcontactTitleId: \$(\"#form-contact-contact-title-id-\"+\$elementIndex).val(),
\t\t      \t\tfirstName: \$(\"#form-contact-first-name-\"+\$elementIndex).val(),
\t\t      \t\tmiddleName: \$(\"#form-contact-middle-name-\"+\$elementIndex).val(),
\t\t      \t\tlastName: \$(\"#form-contact-last-name-\"+\$elementIndex).val(),
\t\t      \t\tdisplayOrder: \$(\"#form-contact-display-order-\"+\$elementIndex).val(),
\t\t      \t\telementIndex: \$elementIndex
\t\t      \t},
\t\t      \terror: function(data) {
\t\t        \t\$errorOccurred = true;
\t\t        \t\$(\"#contact-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-error-message-text\").html('Problems occurred while trying to update your contacts. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-success-message-text\").html('Your contacts were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-success-message\").fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\tif (\$(\"#contacts-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#contacts-tab-to-redirect-to\").val()));
\t\t\t\t\t\t}
\t\t        \t}
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t      \t\t\tif (data.response == 'success')
\t      \t\t\t{
\t      \t\t\t\t\$(\"#contact-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t      \t\t\t\t\$(\"#form-contact-id-\"+data.elementIndex).val(data.id);
\t      \t\t\t\t\$(\"#form-contact-requires-update-\"+data.elementIndex).val(\"0\");
\t      \t\t\t\tloadContactNumbers(data.id, data.elementIndex);
\t      \t\t\t\tloadContactAddresses(data.id, data.elementIndex);
\t      \t\t\t\tloadContactEmailAddresses(data.id, data.elementIndex);
\t      \t\t\t\tloadContactWebAddresses(data.id, data.elementIndex);
\t      \t\t\t} else {
\t      \t\t\t\t\$(\"#contact-\"+data.elementIndex).addClass(\"ui-state-error\");
\t      \t\t\t\t\$errorOccurred = true;
\t      \t\t\t}
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-error-message-text\").html('Problems occurred while trying to update your contacts. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-error-message\").fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-success-message-text\").html('Your contacts were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-success-message\").fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#contacts\").offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\tif (\$(\"#contacts-tab-to-redirect-to\").val() > -1)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contacts .message\").hide();
\t\t\t\t\t\t\t\$(\".sidebar-tabs\").tabs(\"select\", parseInt(\$(\"#contacts-tab-to-redirect-to\").val()));
\t\t\t\t\t\t}
\t\t        \t}
\t\t      \t}
\t\t   \t});
\t\t});
\t}
}

";
        // line 92
        echo "function loadNewContact()
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#contact-count\").val()) + 1;
\t\$(\"#contact-count\").val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_contact"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tobjectId: '";
        // line 102
        echo twig_escape_filter($this->env, $this->getContext($context, "objectId"), "html", null, true);
        echo "',
      \t\tobjectType: '";
        // line 103
        echo twig_escape_filter($this->env, $this->getContext($context, "objectType"), "html", null, true);
        echo "'
      \t},
      \terror: function(data) {
        \t\$(\"#contact-error-message-text\").html('Sorry, there was an error adding a new contact. Please try again.');
\t\t\t\$(\"#contact-error-message\").fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-contacts-container\").append(data);
\t\t\t\$(\"#contact-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #contact-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #contact-\"+\$nextElement.toString()+\" select:not(.no-uniform), #contact-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#contact-\"+\$nextElement.toString()).fadeIn();
\t\t\t\$(\"#contact-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t\t\t\t\$(\".contact-container .accordion\").accordion({
\t\t\t    \tautoHeight: false,
\t\t\t    \tcollapsible: true,
\t\t\t    \tactive: false
\t\t\t    });
\t        });
\t        reOrderContacts();
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#contact-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 136
        echo "function reOrderContacts()
{
\t\$(\"#contacts .message\").hide();
\t\$(\".form-error\").remove();
\t\$contactCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.contact-container:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.contact-container:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.contact-display-order\").val() != \$contactCount)
\t\t{
\t\t\tif (\$row.find(\"input.contact-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.contact-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.contact-display-order\").val(\$contactCount);
\t    \$contactCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateContacts();
\t    }
\t});
\t\$(\"li.contact-container:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}

";
        // line 168
        echo "\t\t
";
        // line 169
        echo "\t
function loadContactNumbers(\$contactId, \$elementIndex)
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_contact_numbers"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tif (\$(\"#ajax-contact-numbers-\"+\$contactId).length < 1)
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" .contact-numbers\").html('<div id=\"contact-number-loading-error-'+\$contactId+'\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\"><div class=\"ui-state-error no-margin-top ui-corner-all\"><span class=\"ui-icon ui-icon-alert\"></span><p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the contact numbers.</p></div></div><div class=\"contact-numbers-loading\" data-contact-id=\"'+\$contactId+'\" id=\"ajax-contact-numbers-loading-'+\$contactId+'\" class=\"ac\"><p class=\"ac\">Loading contact numbers, please wait&hellip;</p><p class=\"ac\"><img class=\"inline\" alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 178
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p></div><div id=\"ajax-contact-numbers-'+\$contactId+'\" class=\"ui-helper-hidden\"></div>');
\t\t\t}
\t\t\t\$(\"#ajax-contact-numbers-loading-\"+\$contactId).show();
\t\t},
\t\tdata: {
\t\t\tcontactId: \$contactId
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-contact-numbers-loading-\"+\$contactId).hide();
      \t\t\$(\"#contact-number-loading-error-\"+\$contactId).fadeIn();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId).html(data);
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" :checkbox:not(.no-uniform), #ajax-contact-numbers-\"+\$contactId+\" :radio:not(.no-uniform), #ajax-contact-numbers-\"+\$contactId+\" select:not(.no-uniform), #ajax-contact-numbers-\"+\$contactId+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
        \t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find(\".message-close\").click(function() {
\t\t\t\t\$(this).parent().fadeOut(function() {
\t\t        \t\$(this).hide();
\t\t        });
\t\t    });
\t\t\t\$(\"#ajax-contact-numbers-\"+\$contactId).sortable({
\t\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\t\titems: 'li',
\t\t\t\ttoleranceElement: '> div',
\t\t\t\tupdate: function(event, ui) {
\t\t\t\t\treOrderContactNumbers(\$contactId);
\t\t\t\t}
\t\t\t});
\t\t\t\$(\".action-unselect-all-contact-numbers\").hide();
\t\t\t\$(\".action-confirm-delete-contact-numbers\").hide();
\t        \$(\"#ajax-contact-numbers-\"+\$contactId+\" .selector\").addClass(\"full\");
\t        \$(\"#ajax-contact-numbers-\"+\$contactId).fadeIn();
    \t    \$(\"#ajax-contact-numbers-loading-\"+\$contactId).hide();
\t\t}
\t});
}

";
        // line 224
        echo "function updateContactNumbers(\$contactId)
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.contact-number-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$(\"input.contact-number-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").each(function(index) {
\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 235
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_contact_number"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$(\"#form-contact-number-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactId: \$contactId,
\t\t      \t\tnumber: \$(\"#form-contact-number-number-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactNumberTypeId: \$(\"#form-contact-number-contact-number-type-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tdisplayOrder: \$(\"#form-contact-number-display-order-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\telementIndex: \$elementIndex
\t\t      \t},
\t\t      \terror: function(data) {
\t\t        \t\$errorOccurred = true;
\t\t        \t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact numbers. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-number-success-message-text-\"+\$contactId).html('Your contact numbers were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-number-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t      \t\t\tif (data.response == 'success')
\t      \t\t\t{
\t      \t\t\t\t\$(\"#contact-number-\"+data.contactId+\"-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t      \t\t\t\t\$(\"#form-contact-number-id-\"+data.contactId+\"-\"+data.elementIndex).val(data.id);
\t      \t\t\t\t\$(\"#form-contact-number-requires-update-\"+data.contactId+\"-\"+data.elementIndex).val(\"0\");
\t      \t\t\t} else {
\t      \t\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t      \t\t\t\t\$errorOccurred = true;
\t      \t\t\t}
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact numbers. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-number-success-message-text-\"+\$contactId).html('Your contact numbers were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-number-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-numbers-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t}
\t\t   \t});
\t\t});
\t}
}

";
        // line 295
        echo "function loadNewContactNumber(\$contactId)
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#contact-number-count-\"+\$contactId).val()) + 1;
\t\$(\"#contact-number-count-\"+\$contactId).val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 301
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_contact_number"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tcontactId: \$contactId
      \t},
      \terror: function(data) {
        \t\$(\"#contact-number-error-message-text-\"+\$contactId).html('Sorry, there was an error adding a new contact number. Please try again.');
\t\t\t\$(\"#contact-number-error-message-\"+\$contactId).fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-contact-numbers-container-\"+\$contactId).append(data);
\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #contact-number-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #contact-number-\"+\$contactId+\"-\"+\$nextElement.toString()+\" select:not(.no-uniform), #contact-number-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$nextElement.toString()).fadeIn();
\t\t\t\$(\"#contact-number-\"+\$contactId+\"-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderContactNumbers(\$contactId);
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#contact-number-\"+\$contactId+\"-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 333
        echo "function reOrderContactNumbers(\$contactId)
{
\t\$(\"#ajax-contact-numbers-\"+\$contactId+\" .message\").hide();
\t\$(\".form-error\").remove();
\t\$contactNumberCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.contact-number-display-order\").val() != \$contactNumberCount)
\t\t{
\t\t\tif (\$row.find(\"input.contact-number-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.contact-number-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.contact-number-display-order\").val(\$contactNumberCount);
\t    \$contactNumberCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateContactNumbers(\$contactId);
\t    }
\t});
\t\$(\"li.contact-number-container[data-contact-id='\"+\$contactId+\"']:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}

";
        // line 365
        echo "\t\t
";
        // line 366
        echo "\t
function loadContactAddresses(\$contactId, \$elementIndex)
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 371
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_contact_addresses"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tif (\$(\"#ajax-contact-addresses-\"+\$contactId).length < 1)
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" .contact-addresses\").html('<div id=\"contact-address-loading-error-'+\$contactId+'\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\"><div class=\"ui-state-error no-margin-top ui-corner-all\"><span class=\"ui-icon ui-icon-alert\"></span><p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the contact addresses.</p></div></div><div class=\"contact-addresses-loading\" data-contact-id=\"'+\$contactId+'\" id=\"ajax-contact-addresses-loading-'+\$contactId+'\" class=\"ac\"><p class=\"ac\">Loading contact addresses, please wait&hellip;</p><p class=\"ac\"><img class=\"inline\" alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 375
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p></div><div id=\"ajax-contact-addresses-'+\$contactId+'\" class=\"ui-helper-hidden\"></div>');
\t\t\t\t\$(\"#ajax-contact-addresses-loading-\"+\$contactId).show();
\t\t\t}
\t\t},
\t\tdata: {
\t\t\tcontactId: \$contactId
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-contact-addresses-loading-\"+\$contactId).hide();
      \t\t\$(\"#contact-address-loading-error-\"+\$contactId).fadeIn();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId).html(data);
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" :checkbox:not(.no-uniform), #ajax-contact-addresses-\"+\$contactId+\" :radio:not(.no-uniform), #ajax-contact-addresses-\"+\$contactId+\" select:not(.no-uniform), #ajax-contact-addresses-\"+\$contactId+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
        \t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find(\".message-close\").click(function() {
\t\t\t\t\$(this).parent().fadeOut(function() {
\t\t        \t\$(this).hide();
\t\t        });
\t\t    });
\t\t\t\$(\"#ajax-contact-addresses-\"+\$contactId).sortable({
\t\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\t\titems: 'li',
\t\t\t\ttoleranceElement: '> div',
\t\t\t\tupdate: function(event, ui) {
\t\t\t\t\treOrderContactAddresses(\$contactId);
\t\t\t\t}
\t\t\t});
\t\t\t\$(\".action-unselect-all-contact-addresses\").hide();
\t\t\t\$(\".action-confirm-delete-contact-addresses\").hide();
\t        \$(\"#ajax-contact-addresses-\"+\$contactId+\" .selector\").addClass(\"full\");
\t        \$(\"#ajax-contact-addresses-\"+\$contactId).fadeIn();
    \t    \$(\"#ajax-contact-addresses-loading-\"+\$contactId).hide();
\t\t}
\t});
}

";
        // line 421
        echo "function updateContactAddresses(\$contactId)
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.contact-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$(\"input.contact-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").each(function(index) {
\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 432
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_contact_address"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$(\"#form-contact-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactId: \$contactId,
\t\t      \t\tcontactAddressTypeId: \$(\"#form-contact-address-contact-address-type-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\torganisationName: \$(\"#form-contact-address-organisation-name-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactTitleId: \$(\"#form-contact-address-contact-title-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tfirstName: \$(\"#form-contact-address-first-name-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tmiddleName: \$(\"#form-contact-address-middle-name-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tlastName: \$(\"#form-contact-address-last-name-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\taddressLine1: \$(\"#form-contact-address-address-line-1-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\taddressLine2: \$(\"#form-contact-address-address-line-2-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\taddressLine3: \$(\"#form-contact-address-address-line-3-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tpostZipCode: \$(\"#form-contact-address-post-zip-code-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\ttownCity: \$(\"#form-contact-address-town-city-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcountyState: \$(\"#form-contact-address-county-state-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcountryCode: \$(\"#form-contact-address-country-code-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tdisplayOrder: \$(\"#form-contact-address-display-order-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\telementIndex: \$elementIndex
\t\t      \t},
\t\t      \terror: function(data) {
\t\t        \t\$errorOccurred = true;
\t\t        \t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-address-success-message-text-\"+\$contactId).html('Your contact addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t      \t\t\tif (data.response == 'success')
\t      \t\t\t{
\t      \t\t\t\t\$(\"#contact-address-\"+data.contactId+\"-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t      \t\t\t\t\$(\"#form-contact-address-id-\"+data.contactId+\"-\"+data.elementIndex).val(data.id);
\t      \t\t\t\t\$(\"#form-contact-address-requires-update-\"+data.contactId+\"-\"+data.elementIndex).val(\"0\");
\t      \t\t\t} else {
\t      \t\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t      \t\t\t\t\$errorOccurred = true;
\t      \t\t\t}
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-address-success-message-text-\"+\$contactId).html('Your contact addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t}
\t\t   \t});
\t\t});
\t}
}

";
        // line 503
        echo "function loadNewContactAddress(\$contactId)
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#contact-address-count-\"+\$contactId).val()) + 1;
\t\$(\"#contact-address-count-\"+\$contactId).val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 509
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_contact_address"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tcontactId: \$contactId
      \t},
      \terror: function(data) {
        \t\$(\"#contact-address-error-message-text-\"+\$contactId).html('Sorry, there was an error adding a new contact address. Please try again.');
\t\t\t\$(\"#contact-address-error-message-\"+\$contactId).fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-contact-addresses-container-\"+\$contactId).append(data);
\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #contact-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #contact-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" select:not(.no-uniform), #contact-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$nextElement.toString()).fadeIn();
\t\t\t\$(\"#contact-address-\"+\$contactId+\"-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderContactAddresses(\$contactId);
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#contact-address-\"+\$contactId+\"-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 541
        echo "function reOrderContactAddresses(\$contactId)
{
\t\$(\"#ajax-contact-addresses-\"+\$contactId+\" .message\").hide();
\t\$(\".form-error\").remove();
\t\$contactAddressCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.contact-address-display-order\").val() != \$contactAddressCount)
\t\t{
\t\t\tif (\$row.find(\"input.contact-address-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.contact-address-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.contact-address-display-order\").val(\$contactAddressCount);
\t    \$contactAddressCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateContactAddresses(\$contactId);
\t    }
\t});
\t\$(\"li.contact-address-container[data-contact-id='\"+\$contactId+\"']:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}

";
        // line 573
        echo "\t\t
";
        // line 574
        echo "\t
function loadContactEmailAddresses(\$contactId, \$elementIndex)
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 579
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_contact_email_addresses"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tif (\$(\"#ajax-contact-email-addresses-\"+\$contactId).length < 1)
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" .contact-email-addresses\").html('<div id=\"contact-email-address-loading-error-'+\$contactId+'\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\"><div class=\"ui-state-error no-margin-top ui-corner-all\"><span class=\"ui-icon ui-icon-alert\"></span><p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the contact email addresses.</p></div></div><div class=\"contact-email-addresses-loading\" data-contact-id=\"'+\$contactId+'\" id=\"ajax-contact-email-addresses-loading-'+\$contactId+'\" class=\"ac\"><p class=\"ac\">Loading contact email addresses, please wait&hellip;</p><p class=\"ac\"><img class=\"inline\" alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 583
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p></div><div id=\"ajax-contact-email-addresses-'+\$contactId+'\" class=\"ui-helper-hidden\"></div>');
\t\t\t}
\t\t\t\$(\"#ajax-contact-email-addresses-loading-\"+\$contactId).show();
\t\t\t
\t\t},
\t\tdata: {
\t\t\tcontactId: \$contactId
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-contact-email-addresses-loading-\"+\$contactId).hide();
      \t\t\$(\"#contact-email-address-loading-error-\"+\$contactId).fadeIn();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId).html(data);
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" :checkbox:not(.no-uniform), #ajax-contact-email-addresses-\"+\$contactId+\" :radio:not(.no-uniform), #ajax-contact-email-addresses-\"+\$contactId+\" select:not(.no-uniform), #ajax-contact-email-addresses-\"+\$contactId+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
        \t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find(\".message-close\").click(function() {
\t\t\t\t\$(this).parent().fadeOut(function() {
\t\t        \t\$(this).hide();
\t\t        });
\t\t    });
\t\t\t\$(\"#ajax-contact-email-addresses-\"+\$contactId).sortable({
\t\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\t\titems: 'li',
\t\t\t\ttoleranceElement: '> div',
\t\t\t\tupdate: function(event, ui) {
\t\t\t\t\treOrderContactEmailAddresses(\$contactId);
\t\t\t\t}
\t\t\t});
\t\t\t\$(\".action-unselect-all-contact-email-addresses\").hide();
\t\t\t\$(\".action-confirm-delete-contact-email-addresses\").hide();
\t        \$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .selector\").addClass(\"full\");
\t        \$(\"#ajax-contact-email-addresses-\"+\$contactId).fadeIn();
    \t    \$(\"#ajax-contact-email-addresses-loading-\"+\$contactId).hide();
\t\t}
\t});
}

";
        // line 630
        echo "function updateContactEmailAddresses(\$contactId)
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.contact-email-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$(\"input.contact-email-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").each(function(index) {
\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 641
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_contact_email_address"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$(\"#form-contact-email-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactId: \$contactId,
\t\t      \t\tcontactEmailAddressTypeId: \$(\"#form-contact-email-address-contact-email-address-type-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\temail: \$(\"#form-contact-email-address-email-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tdisplayOrder: \$(\"#form-contact-email-address-display-order-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\telementIndex: \$elementIndex
\t\t      \t},
\t\t      \terror: function(data) {
\t\t        \t\$errorOccurred = true;
\t\t        \t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact email addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-email-address-success-message-text-\"+\$contactId).html('Your contact email addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-email-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t      \t\t\tif (data.response == 'success')
\t      \t\t\t{
\t      \t\t\t\t\$(\"#contact-email-address-\"+data.contactId+\"-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t      \t\t\t\t\$(\"#form-contact-email-address-id-\"+data.contactId+\"-\"+data.elementIndex).val(data.id);
\t      \t\t\t\t\$(\"#form-contact-email-address-requires-update-\"+data.contactId+\"-\"+data.elementIndex).val(\"0\");
\t      \t\t\t} else {
\t      \t\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t      \t\t\t\t\$errorOccurred = true;
\t      \t\t\t}
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact email addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-email-address-success-message-text-\"+\$contactId).html('Your contact email addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-email-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-email-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t}
\t\t   \t});
\t\t});
\t}
}

";
        // line 701
        echo "function loadNewContactEmailAddress(\$contactId)
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#contact-email-address-count-\"+\$contactId).val()) + 1;
\t\$(\"#contact-email-address-count-\"+\$contactId).val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 707
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_contact_email_address"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tcontactId: \$contactId
      \t},
      \terror: function(data) {
        \t\$(\"#contact-email-address-error-message-text-\"+\$contactId).html('Sorry, there was an error adding a new contact email address. Please try again.');
\t\t\t\$(\"#contact-email-address-error-message-\"+\$contactId).fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-contact-email-addresses-container-\"+\$contactId).append(data);
\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #contact-email-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #contact-email-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" select:not(.no-uniform), #contact-email-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$nextElement.toString()).fadeIn();
\t\t\t\$(\"#contact-email-address-\"+\$contactId+\"-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderContactEmailAddresses(\$contactId);
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#contact-email-address-\"+\$contactId+\"-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 739
        echo "function reOrderContactEmailAddresses(\$contactId)
{
\t\$(\"#ajax-contact-email-addresses-\"+\$contactId+\" .message\").hide();
\t\$(\".form-error\").remove();
\t\$contactEmailAddressCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.contact-email-address-display-order\").val() != \$contactEmailAddressCount)
\t\t{
\t\t\tif (\$row.find(\"input.contact-email-address-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.contact-email-address-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.contact-email-address-display-order\").val(\$contactEmailAddressCount);
\t    \$contactEmailAddressCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateContactEmailAddresses(\$contactId);
\t    }
\t});
\t\$(\"li.contact-email-address-container[data-contact-id='\"+\$contactId+\"']:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}

";
        // line 771
        echo "\t\t
";
        // line 772
        echo "\t
function loadContactWebAddresses(\$contactId, \$elementIndex)
{
\t\$.ajax({
\t\ttype: \"GET\",
\t\turl: \"";
        // line 777
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_get_contact_web_addresses"), "html", null, true);
        echo "\",
\t\tbeforeSend: function() {
\t\t\tif (\$(\"#contact-\"+\$contactId+\" .contact-web-addresses #ajax-contact-web-addresses-\"+\$contactId).length < 1)
\t\t\t{
\t\t\t\t\$(\"#contact-\"+\$elementIndex+\" .contact-web-addresses\").html('<div id=\"contact-web-address-loading-error-'+\$contactId+'\" class=\"ui-widget message margin-bottom-5 ui-helper-hidden\"><div class=\"ui-state-error no-margin-top ui-corner-all\"><span class=\"ui-icon ui-icon-alert\"></span><p class=\"no-margin\"><strong>ERROR:</strong> Sorry, there was a problem loading the contact web addresses.</p></div></div><div class=\"contact-web-addresses-loading\" data-contact-id=\"'+\$contactId+'\" id=\"ajax-contact-web-addresses-loading-'+\$contactId+'\" class=\"ac\"><p class=\"ac\">Loading contact web addresses, please wait&hellip;</p><p class=\"ac\"><img class=\"inline\" alt=\"Loading\" width=\"16\" height=\"16\" src=\"";
        // line 781
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-loader-eeeeee.gif"), "html", null, true);
        echo "\" /></p></div><div id=\"ajax-contact-web-addresses-'+\$contactId+'\" class=\"ui-helper-hidden\"></div>');
\t\t\t}
\t\t\t\$(\"#ajax-contact-web-addresses-loading-\"+\$contactId).show();
\t\t},
\t\tdata: {
\t\t\tcontactId: \$contactId
\t\t},
\t\terror: function(data) {
  \t\t\t\$(\"#ajax-contact-web-addresses-loading-\"+\$contactId).hide();
      \t\t\$(\"#contact-web-address-loading-error-\"+\$contactId).fadeIn();
\t  \t},
\t\tsuccess: function(data) {
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId).html(data);
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" :checkbox:not(.no-uniform), #ajax-contact-web-addresses-\"+\$contactId+\" :radio:not(.no-uniform), #ajax-contact-web-addresses-\"+\$contactId+\" select:not(.no-uniform), #ajax-contact-web-addresses-\"+\$contactId+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .button\").each(function () {
    \t        \$(this).button({
        \t    \ticons: {
            \t    \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
                \t    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
    \t    \t});
        \t});
        \t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message.closeable\").prepend('<span class=\"message-close ui-icon ui-icon-circle-close\"></span>').find(\".message-close\").click(function() {
\t\t\t\t\$(this).parent().fadeOut(function() {
\t\t        \t\$(this).hide();
\t\t        });
\t\t    });
\t\t\t\$(\"#ajax-contact-web-addresses-\"+\$contactId).sortable({
\t\t\t\tplaceholder: \"highlighted-sortable\",
\t\t\t\titems: 'li',
\t\t\t\ttoleranceElement: '> div',
\t\t\t\tupdate: function(event, ui) {
\t\t\t\t\treOrderContactWebAddresses(\$contactId);
\t\t\t\t}
\t\t\t});
\t\t\t\$(\".action-unselect-all-contact-web-addresses\").hide();
\t\t\t\$(\".action-confirm-delete-contact-web-addresses\").hide();
\t        \$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .selector\").addClass(\"full\");
\t        \$(\"#ajax-contact-web-addresses-\"+\$contactId).fadeIn();
    \t    \$(\"#ajax-contact-web-addresses-loading-\"+\$contactId).hide();
\t\t}
\t});
}

";
        // line 827
        echo "function updateContactWebAddresses(\$contactId)
{
\t\$errorOccurred = false;
\t\$numberOfElementsToProcess = \$(\"input.contact-web-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").length;
\t\$numberOfElementsProcessed = 0;
\tif (\$numberOfElementsToProcess > 0)
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$(\"input.contact-web-address-requires-update[data-contact-id='\"+\$contactId+\"'][value='1']\").each(function(index) {
\t\t\t\$elementIndex = String(\$(this).attr(\"data-index\"));
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 838
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_update_contact_web_address"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$(\"#form-contact-web-address-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tcontactId: \$contactId,
\t\t      \t\tcontactWebAddressTypeId: \$(\"#form-contact-web-address-contact-web-address-type-id-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\turl: \$(\"#form-contact-web-address-url-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\tdisplayOrder: \$(\"#form-contact-web-address-display-order-\"+\$contactId+\"-\"+\$elementIndex).val(),
\t\t      \t\telementIndex: \$elementIndex
\t\t      \t},
\t\t      \terror: function(data) {
\t\t        \t\$errorOccurred = true;
\t\t        \t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact web addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-web-address-success-message-text-\"+\$contactId).html('Your contact web addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-web-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t      \t\t\tif (data.response == 'success')
\t      \t\t\t{
\t      \t\t\t\t\$(\"#contact-web-address-\"+data.contactId+\"-\"+data.elementIndex).removeClass(\"ui-state-error\");
\t      \t\t\t\t\$(\"#form-contact-web-address-id-\"+data.contactId+\"-\"+data.elementIndex).val(data.id);
\t      \t\t\t\t\$(\"#form-contact-web-address-requires-update-\"+data.contactId+\"-\"+data.elementIndex).val(\"0\");
\t      \t\t\t} else {
\t      \t\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$elementIndex).addClass(\"ui-state-error\");
\t      \t\t\t\t\$errorOccurred = true;
\t      \t\t\t}
\t\t        \t\$numberOfElementsProcessed++;
\t\t        \tif (\$numberOfElementsToProcess == \$numberOfElementsProcessed)
\t\t        \t{
\t\t        \t\tif (\$errorOccurred == true)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Problems occurred while trying to update your contact web addresses. Please try again.');
\t\t\t\t\t\t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#contact-web-address-success-message-text-\"+\$contactId).html('Your contact web addresses were successfully updated.');
\t\t\t\t\t\t\t\$(\"#contact-web-address-success-message-\"+\$contactId).fadeIn();
\t\t\t\t\t\t}
\t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#ajax-contact-web-addresses-\"+\$contactId).offset().top + 35},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t        \t}
\t\t      \t}
\t\t   \t});
\t\t});
\t}
}

";
        // line 898
        echo "function loadNewContactWebAddress(\$contactId)
{
\t\$(\"#ajax_loading\").show();
\t\$nextElement = parseInt(\$(\"#contact-web-address-count-\"+\$contactId).val()) + 1;
\t\$(\"#contact-web-address-count-\"+\$contactId).val(\$nextElement);
\t\$.ajax({
    \turl: \"";
        // line 904
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("system_ajax_add_contact_web_address"), "html", null, true);
        echo "\",
      \ttype: \"GET\",
      \tdata: {
      \t\tid: \$nextElement,
      \t\tcontactId: \$contactId
      \t},
      \terror: function(data) {
        \t\$(\"#contact-web-address-error-message-text-\"+\$contactId).html('Sorry, there was an error adding a new contact web address. Please try again.');
\t\t\t\$(\"#contact-web-address-error-message-\"+\$contactId).fadeIn();
      \t},
      \tsuccess: function(data) {
  \t\t\t\$(\"#form-contact-web-addresses-container-\"+\$contactId).append(data);
\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :checkbox:not(.no-uniform), #contact-web-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :radio:not(.no-uniform), #contact-web-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" select:not(.no-uniform), #contact-web-address-\"+\$contactId+\"-\"+\$nextElement.toString()+\" :file:not(.no-uniform)\").uniform();
\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$nextElement.toString()).fadeIn();
\t\t\t\$(\"#contact-web-address-\"+\$contactId+\"-\"+\$nextElement+\" .button\").each(function () {
\t            \$(this).button({
\t            \ticons: {
\t                \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t                    secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t                }, 
\t               \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t        \t});
\t        });
\t        reOrderContactWebAddresses(\$contactId);
\t        \$(\".selector, .uploader\").addClass(\"full\");
\t        \$(\"html, body\").animate({scrollTop: \$(\"#contact-web-address-\"+\$contactId+\"-\"+\$nextElement).offset().top - 100},'slow');
\t        \$(\"#ajax_loading\").hide();
      \t}
   \t});
}

";
        // line 936
        echo "function reOrderContactWebAddresses(\$contactId)
{
\t\$(\"#ajax-contact-web-addresses-\"+\$contactId+\" .message\").hide();
\t\$(\".form-error\").remove();
\t\$contactWebAddressCount = 1;
\t\$numberOfElementsToProcess = \$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").length;
\t\$numberOfElementsProcessed = 0;
\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:visible\").each(function(index) {
\t\t\$row = \$(this);
\t\tif (\$row.find(\"input.contact-web-address-display-order\").val() != \$contactWebAddressCount)
\t\t{
\t\t\tif (\$row.find(\"input.contact-web-address-id\").val() > 0)
\t\t\t{
\t\t\t\t\$row.find(\"input.contact-web-address-requires-update\").val(\"1\");
\t\t\t}
\t\t}
\t\t\$row.find(\"input.contact-web-address-display-order\").val(\$contactWebAddressCount);
\t    \$contactWebAddressCount++;
\t    \$numberOfElementsProcessed++;
\t    if (\$numberOfElementsProcessed == \$numberOfElementsToProcess)
\t    {
\t    \tupdateContactWebAddresses(\$contactId);
\t    }
\t});
\t\$(\"li.contact-web-address-container[data-contact-id='\"+\$contactId+\"']:hidden\").each(function(index) {
\t\t\$(this).remove();
\t});
}";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:System:ajaxGetContactsFunctions.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 574,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 213,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 192,  466 => 190,  457 => 185,  451 => 181,  436 => 171,  422 => 167,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 641,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 210,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 421,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 120,  227 => 197,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 178,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 235,  276 => 119,  262 => 115,  235 => 80,  232 => 106,  212 => 174,  207 => 44,  143 => 57,  157 => 68,  366 => 158,  340 => 255,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 118,  253 => 110,  233 => 105,  226 => 103,  187 => 65,  150 => 65,  260 => 82,  155 => 67,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 224,  258 => 114,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 78,  182 => 82,  175 => 62,  144 => 119,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 202,  491 => 201,  432 => 375,  203 => 92,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 159,  363 => 157,  359 => 154,  355 => 201,  351 => 200,  347 => 150,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 119,  265 => 116,  251 => 218,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 53,  168 => 52,  149 => 50,  139 => 41,  240 => 108,  230 => 104,  121 => 31,  257 => 222,  249 => 60,  106 => 40,  334 => 142,  294 => 125,  286 => 121,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 50,  45 => 9,  487 => 199,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 171,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 158,  360 => 156,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 112,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 168,  458 => 109,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 165,  391 => 159,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 126,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 106,  100 => 56,  85 => 26,  76 => 31,  112 => 35,  101 => 37,  98 => 75,  272 => 118,  269 => 117,  228 => 105,  221 => 77,  197 => 89,  184 => 64,  138 => 73,  118 => 59,  105 => 38,  66 => 21,  56 => 19,  115 => 58,  83 => 23,  164 => 51,  140 => 74,  58 => 15,  21 => 4,  61 => 15,  36 => 10,  209 => 95,  205 => 169,  196 => 72,  192 => 87,  189 => 86,  178 => 79,  176 => 41,  165 => 75,  161 => 70,  152 => 125,  148 => 43,  141 => 45,  134 => 60,  132 => 102,  127 => 48,  123 => 39,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 60,  111 => 38,  107 => 35,  80 => 55,  69 => 30,  60 => 16,  52 => 16,  97 => 55,  95 => 37,  88 => 26,  78 => 32,  75 => 55,  71 => 53,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 101,  218 => 100,  159 => 54,  154 => 124,  151 => 66,  145 => 47,  136 => 103,  128 => 29,  125 => 98,  119 => 45,  110 => 42,  96 => 34,  93 => 36,  91 => 36,  68 => 29,  65 => 23,  63 => 17,  43 => 6,  50 => 18,  25 => 4,  92 => 36,  86 => 22,  79 => 29,  46 => 13,  37 => 4,  33 => 3,  27 => 2,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 11,  44 => 15,  42 => 19,  34 => 3,  29 => 3,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 13,  26 => 2,  22 => 2,  224 => 101,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 164,  190 => 76,  188 => 153,  185 => 83,  179 => 48,  177 => 61,  171 => 136,  162 => 36,  158 => 125,  156 => 49,  153 => 67,  146 => 64,  142 => 42,  137 => 46,  131 => 44,  126 => 40,  120 => 45,  117 => 92,  103 => 33,  99 => 19,  77 => 21,  74 => 20,  57 => 17,  47 => 27,  39 => 5,  32 => 9,  24 => 4,  17 => 2,  135 => 38,  129 => 43,  122 => 59,  116 => 58,  113 => 57,  108 => 41,  104 => 40,  102 => 57,  94 => 21,  89 => 67,  87 => 30,  84 => 34,  81 => 60,  73 => 28,  70 => 52,  67 => 48,  62 => 16,  59 => 18,  55 => 13,  51 => 28,  48 => 15,  41 => 23,  38 => 18,  35 => 5,  31 => 4,  28 => 11,);
    }
}
