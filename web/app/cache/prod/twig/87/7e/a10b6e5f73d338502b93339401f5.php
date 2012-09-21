<?php

/* WebIlluminationAdminBundle:PracticeDayRegistrations:indexScript.js.twig */
class __TwigTemplate_877ea10b6e5f73d338502b93339401f5 extends Twig_Template
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
\t\t\t
\t\$(document).ready(function() {
\t\t
\t\t";
        // line 10
        echo "\t\t\$(\".action-clear-filters\").live('click', function() {
\t\t\t\$(\"input[type='checkbox']\").removeAttr(\"checked\");
\t\t\t\$(\"div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"#form-name, #form-membership-number, #form-email-address, #form-contact-number, #form-post-zip-code, #form-day, #form-age, #form-vip\").val(\"\");
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 19
        echo "\t\t\$(\".action-view-add\").live('click', function() {
\t\t\t\$(\"#add\").slideDown(function() {
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#add\").offset().top - 50},'slow');
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 26
        echo "\t\t\$(\".action-cancel-add\").live('click', function() {
\t\t\t\$(\".form-error\").hide();
\t\t\t\$(\"input, textarea, select\").removeClass(\"invalid\");
\t\t\t\$(\"#add\").slideUp(function() {
\t\t\t\t\$(\"#add input, #add textarea, #add select\").val(\"\");
\t\t\t\t\$(\"#add select option\").removeAttr(\"selected\");
\t\t\t\t\$(\"#add input[type='radio'], #add input[type='checkbox']\").removeAttr(\"checkbox\");
\t\t\t\t\$(\"#add div.checker span, #add div.radio span\").removeClass(\"checked\");
\t\t\t\t
\t\t\t\t
\t\t\t\tvar select = \$('#someSelect');
 
\$('#someSelect').val(\$('options:first', \$('#someSelect')).val());
\t\t\t\t
\t\t\t\t\$(\"#practice-day-registration-name, #practice-day-registration-membership-number, #practice-day-registration-email-address, #practice-day-registration-contact-number, #practice-day-registration-post-zip-code, #practice-day-registration-bike, #practice-day-registration-notes\").val(\"\");
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 45
        echo "        \$(\".action-add\").live('click', function() {
        \tvar addValidator = \$(\"#add :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (addValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"POST\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_add"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tvip: \$(\".practice-day-registration-vip:checked\").val(),
\t\t\t\t\t\tname: \$(\"#practice-day-registration-name\").val(),
\t\t\t\t\t\tmembershipNumber: \$(\"#practice-day-registration-membership-number\").val(),
\t\t\t\t\t\temailAddress: \$(\"#practice-day-registration-email-address\").val(),
\t\t\t\t\t\tcontactNumber: \$(\"#practice-day-registration-contact-number\").val(),
\t\t\t\t\t\tpostZipCode: \$(\"#practice-day-registration-post-zip-code\").val(),
\t\t\t\t\t\tage: \$(\"#practice-day-registration-age\").val(),
\t\t\t\t\t\tday: \$(\"#practice-day-registration-day\").val(),
\t\t\t\t\t\tbike: \$(\"#practice-day-registration-bike\").val(),
\t\t\t\t\t\tnotes: \$(\"#practice-day-registration-notes\").val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the practice day registration. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem adding the practice day registration. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#membership-card-add\").slideUp(function() {
\t\t\t\t\t\t\t\t\$(\"#practice-day-registration-name, #practice-day-registration-membership-number, #practice-day-registration-email-address, #practice-day-registration-contact-number, #practice-day-registration-post-zip-code, #practice-day-registration-bike, #practice-day-registration-notes\").val(\"\");
\t\t\t\t\t\t\t});
\t\t\t\t      \t\tloadResults();
    \t\t\t\t\t\t\$(\"#message-success-text\").html('The practice day registration was successfully added.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
        
        ";
        // line 101
        echo "        \$(\".action-view-practice-day-registration\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'practice-day-registration', \$(\"tr#practice-day-registration-\"+\$(this).attr(\"data-id\")+\" button.action-view-practice-day-registration\"));
        });
                
        ";
        // line 106
        echo "        \$(\".action-save-practice-day-registration\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar savePracticeDayRegistrationValidator = \$(\"#practice-day-registration-practice-day-registration-\"+\$id+\" :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (savePracticeDayRegistrationValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"GET\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_save_practice_day_registration"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tid: \$id,
\t\t\t\t\t\tvip: \$(\".practice-day-registration-vip-\"+\$id+\":checked\").val(),
\t\t\t\t\t\tname: \$(\"#practice-day-registration-name-\"+\$id).val(),
\t\t\t\t\t\tmembershipNumber: \$(\"#practice-day-registration-membership-number-\"+\$id).val(),
\t\t\t\t\t\temailAddress: \$(\"#practice-day-registration-email-address-\"+\$id).val(),
\t\t\t\t\t\tcontactNumber: \$(\"#practice-day-registration-contact-number-\"+\$id).val(),
\t\t\t\t\t\tpostZipCode: \$(\"#practice-day-registration-post-zip-code-\"+\$id).val(),
\t\t\t\t\t\tage: \$(\"#practice-day-registration-age-\"+\$id).val(),
\t\t\t\t\t\tday: \$(\"#practice-day-registration-day-\"+\$id).val(),
\t\t\t\t\t\tbike: \$(\"#practice-day-registration-bike-\"+\$id).val(),
\t\t\t\t\t\tnotes: \$(\"#practice-day-registration-notes-\"+\$id).val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#practice-day-registration-error-message-text-\"+\$id).html('Sorry, there was a problem saving the practice day registration. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#practice-day-registration-error-message-\"+\$id).fadeIn();
\t\t\t      \t\t\$.mask.close();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#practice-day-registration-error-message-text-\"+\$id).html('Sorry, there was a problem saving the practice day registration. Make sure you have filled in all fields and try again.');
\t\t\t\t      \t\t\$(\"#practice-day-registration-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t      \t\tloadResults();
\t\t\t\t      \t\t\$.mask.close();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id).hide();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\t\t\t\t\$(\"#message-success-text\").html('The practice day registration was successfully saved.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
        
        ";
        // line 163
        echo "        \$(\".action-confirm-delete-practice-day-registration\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#practice-day-registration-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete-practice-day-registration\"));
        });
        \$(\".action-delete-practice-day-registration\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 171
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_delete_practice_day_registration"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the practice day registration. Please try again.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t      \t\$.mask.close();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\t\$(\"#form-current-page\").val('1');
\t\t      \t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\t\t\$(\"tr.practice-day-registration td\").removeAttr(\"style\");
\t\t\t\t\t\$(\"tr.practice-day-registration button\").removeClass(\"ui-button-blue\");
\t\t\t\t\t\$.mask.close();
\t\t\t\t\tloadResults();
\t\t\t\t\t\$(\"#message-success-text\").html('The practice day registration has been successfully deleted.');
\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        \$(\".action-confirm-delete-practice-day-registrations\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#practice-day-registration-confirm-delete-practice-day-registrations\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#practice-day-registration-confirm-delete-practice-day-registrations\").offset().top - 50},'slow');
\t    \t}
        });
        \$(\".action-cancel-delete-practice-day-registrations\").live('click', function() {
        \t\$(\"#practice-day-registration-confirm-delete-practice-day-registrations\").fadeOut();
        });
        \$(\".action-delete-practice-day-registrations\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#practice-day-registration-confirm-delete-practice-day-registrations\").hide();
\t\t\t\tvar \$numberOfPracticeDayRegistrationsToDelete = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfPracticeDayRegistrationsDeleted = 0;
\t\t\t\tif (\$numberOfPracticeDayRegistrationsToDelete > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 222
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_delete_practice_day_registration"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfPracticeDayRegistrationsDeleted = \$numberOfPracticeDayRegistrationsDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the selected practice day registrations. Please try again.');
\t\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t\t      \tif (\$numberOfPracticeDayRegistrationsDeleted >= \$numberOfPracticeDayRegistrationsToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\t\$.mask.close();
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfPracticeDayRegistrationsDeleted = \$numberOfPracticeDayRegistrationsDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-success-text\").html('The practice day registrations were successfully deleted.');
\t\t\t\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t\t\t\t\t\tif (\$numberOfPracticeDayRegistrationsDeleted >= \$numberOfPracticeDayRegistrationsToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t} else {
\t\t\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any practice day registrations to delete.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        \$(\".vip\").live('click change', function() {
\t\t\tvar \$valuesToCollect = \$(\".vip:checked\").length;
\t\t\tvar \$valuesCollected = 0;
\t\t\tvar \$values = new Array();
\t\t\t\$(\".vip:checked\").each(function(index) {
\t\t\t\t\$values[\$values.length] = \$(this).attr(\"data-vip\");
\t\t\t\t\$valuesCollected = \$valuesCollected + 1;
\t\t\t\tif (\$valuesCollected == \$valuesToCollect)
\t\t\t\t{
\t\t\t\t\t\$(\"#form-vip\").val(\$values.join(\"|\"));
\t\t\t\t\tloadResults();
\t\t\t\t}
\t\t\t});
\t\t\tif (\$valuesToCollect == 0)
\t\t\t{
\t\t\t\t\$(\"#form-vip\").val(\"\");
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\".day\").live('click change', function() {
\t\t\tvar \$valuesToCollect = \$(\".day:checked\").length;
\t\t\tvar \$valuesCollected = 0;
\t\t\tvar \$values = new Array();
\t\t\t\$(\".day:checked\").each(function(index) {
\t\t\t\t\$values[\$values.length] = \$(this).attr(\"data-day\");
\t\t\t\t\$valuesCollected = \$valuesCollected + 1;
\t\t\t\tif (\$valuesCollected == \$valuesToCollect)
\t\t\t\t{
\t\t\t\t\t\$(\"#form-day\").val(\$values.join(\"|\"));
\t\t\t\t\tloadResults();
\t\t\t\t}
\t\t\t});
\t\t\tif (\$valuesToCollect == 0)
\t\t\t{
\t\t\t\t\$(\"#form-day\").val(\"\");
\t\t\t\tloadResults();
\t\t\t}
\t\t});
        \$(\".age\").live('click change', function() {
\t\t\tvar \$valuesToCollect = \$(\".age:checked\").length;
\t\t\tvar \$valuesCollected = 0;
\t\t\tvar \$values = new Array();
\t\t\t\$(\".age:checked\").each(function(index) {
\t\t\t\t\$values[\$values.length] = \$(this).attr(\"data-age\");
\t\t\t\t\$valuesCollected = \$valuesCollected + 1;
\t\t\t\tif (\$valuesCollected == \$valuesToCollect)
\t\t\t\t{
\t\t\t\t\t\$(\"#form-age\").val(\$values.join(\"|\"));
\t\t\t\t\tloadResults();
\t\t\t\t}
\t\t\t});
\t\t\tif (\$valuesToCollect == 0)
\t\t\t{
\t\t\t\t\$(\"#form-age\").val(\"\");
\t\t\t\tloadResults();
\t\t\t}
\t\t});
    \t\t
\t\t";
        // line 322
        echo "\t\t\$(\".action-select-all\").live('click', function() {
\t\t\tif (\$(\".action-select-all\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\".action-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\".action-select\").parent().addClass(\"checked\");
\t\t\t\t\$(\"tr.practice-day-registration\").addClass(\"selected\");
\t\t\t} else {
\t\t\t\t\$(\".action-select\").attr(\"checked\", false);
\t\t\t\t\$(\".action-select\").parent().removeClass(\"checked\");
\t\t\t\t\$(\"tr.practice-day-registration\").removeClass(\"selected\");
\t\t\t}
\t\t});
        \$(\".action-select\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tif (\$(this).is(\":checked\"))
        \t{
        \t\t\$(\"#practice-day-registration-\"+\$id).addClass(\"selected\");
        \t} else {
        \t\t\$(\"#practice-day-registration-\"+\$id).removeClass(\"selected\");
        \t}
        });
\t\t\t\t
\t\t";
        // line 345
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.practice-day-registration td\").removeAttr(\"style\");
\t\t\t\$(\"tr.practice-day-registration button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t\t\t
\t\t";
        // line 353
        echo "\t\t\$(\".action-filter-results\").live('click', function() {
\t\t\tif (\$(\"#listing-filter\").is(\":hidden\"))
\t\t\t{
\t\t\t\t\$(\"#listing-filter\").slideDown();
\t\t\t\t\$(\"#filter-results-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-s\").addClass(\"ui-icon-triangle-1-n\");
\t\t\t} else {
\t\t\t\t\$(\"#listing-filter\").slideUp();
\t\t\t\t\$(\"#filter-results-button > span.ui-button-icon-primary\").removeClass(\"ui-icon-triangle-1-n\").addClass(\"ui-icon-triangle-1-s\");
\t\t\t}
\t\t});
\t\t\t\t\t
\t\t";
        // line 365
        echo "\t\t\$(\".action-update-your-results\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t\$(\"#form-name, #form-membership-number, #form-email-address, #form-contact-number, #form-post-zip-code, #form-day, #form-age, #form-vip\").live('change', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t\$(\"#form-current-page\").val('1');
\t\tloadResults();
\t\t
\t\t\$(\"#form-sort-order, #form-max-results\").live('change', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 383
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t});
\t\t\t
\t";
        // line 390
        echo "\tfunction showMoreInformation(\$id, \$moreInformation, \$button)
\t{
\t\t\$(\".form-error\").hide();
    \t\$(\"tr#practice-day-registration-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
    \tif (\$(\"#practice-day-registration-\"+\$moreInformation+\"-\"+\$id).is(\":hidden\"))
    \t{
    \t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\$(\"#more-information-\"+\$id).show();
    \t\t\$(\"#practice-day-registration-\"+\$moreInformation+\"-\"+\$id).fadeIn();
    \t\t\$(\"#more-information-\"+\$id+\" td, #practice-day-registration-\"+\$id+\" td\").expose({
    \t\t\tcolor: \"#042F4F\",
    \t\t\tloadSpeed: 2000,
    \t\t\topacity: \"0.6\",
    \t\t\tonClose: function() {
    \t\t\t\t\$(\".form-error\").hide();
    \t\t\t\t\$(\".more-information, .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"#more-information-\"+\$id).fadeOut();
    \t\t\t\t\$(\"#practice-day-registration-\"+\$id+\" td\").removeAttr(\"style\");
    \t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"tr#practice-day-registration-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
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
\t}
\t\t
\t";
        // line 425
        echo "\tfunction loadResults()
\t{
\t\t\$(\"#ajax_loading\").show();
\t\t\$listingCountLoaded = false;
\t\t\$listingLoaded = false;
\t\t\$listingPaginationLoaded = false;
\t\tloadListingCount();
\t\tloadListing();
\t\tloadListingPagination();
\t}
\t
\t";
        // line 437
        echo "\tfunction checkResultsLoaded()
\t{
\t\tif (\$listingCountLoaded && \$listingLoaded && \$listingPaginationLoaded)
\t\t{
\t\t\t\$(\"#ajax_loading\").hide();
\t\t}
\t}
\t
\t";
        // line 446
        echo "\tfunction loadListingCount()
\t{
\t\t\$(\"#listing-count\").html('<img src=\"";
        // line 448
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\tdataType: \"json\",
\t\t\turl: \"";
        // line 452
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_get_listing_count"), "html", null, true);
        echo "\",
\t\t\tdata: {
    \t\t\tname: \$(\"#form-name\").val(),
\t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t\t\t\temailAddress: \$(\"#form-email-address\").val(),
\t\t\t\tcontactNumber: \$(\"#form-contact-number\").val(),
\t\t\t\tpostZipCode: \$(\"#form-post-zip-code\").val(),
\t    \t\tage: \$(\"#form-age\").val(),
\t    \t\tday: \$(\"#form-day\").val(),
    \t\t\tvip: \$(\"#form-vip\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-count\").html('No Practice Day Registrations Found');
\t\t\t\t\$listingCountLoaded = true;
\t\t\t\tcheckResultsLoaded();
\t      \t},
\t\t\tsuccess: function(data) {
\t\t\t\tif (data.response == 'success')
    \t    \t{
        \t\t\tvar \$listingCount = parseInt(data.listingCount);
        \t\t\tif ((\$listingCount > 1) || (\$listingCount < 1))
        \t\t\t{
        \t\t\t\tif (\$listingCount < 1)
\t        \t\t\t{
    \t    \t\t\t\t\$(\"#listing-count\").html('No Practice Day Registrations Found');
        \t\t\t\t} else {
\t        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' Practice Day Registrations');
\t        \t\t\t}
\t        \t\t} else {
    \t    \t\t\t\$(\"#listing-count\").html('Found 1 Practice Day Registration');
        \t\t\t}\t
\t        \t} else {
    \t    \t\t\$(\"#listing-count\").html('No Practice Day Registrations Found');
        \t\t}
        \t\t\$listingCountLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 493
        echo "\tfunction loadListing()
\t{
\t\tif (\$(\"#listing\").height() > 0)
\t\t{
\t\t\t\$(\"#listing-loading\").height(\$(\"#listing\").height() - 12);
\t\t}
\t\t\$(\"#listing-loading\").show();
\t\t\$(\"#listing\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 503
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_get_listing"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tname: \$(\"#form-name\").val(),
\t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t\t\t\temailAddress: \$(\"#form-email-address\").val(),
\t\t\t\tcontactNumber: \$(\"#form-contact-number\").val(),
\t\t\t\tpostZipCode: \$(\"#form-post-zip-code\").val(),
\t    \t\tage: \$(\"#form-age\").val(),
\t    \t\tday: \$(\"#form-day\").val(),
    \t\t\tvip: \$(\"#form-vip\").val(),
\t    \t\tsortOrder: \$(\"#form-sort-order\").val(),
\t    \t\tpage: \$(\"#form-current-page\").val(),
   \t\t\t\tmaxResults: \$(\"#form-max-results\").val()
   \t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-loading\").hide();
\t\t\t\t\$(\"#listing\").html('<p class=\"ac\">Sorry, no results were found.</p>').fadeIn();
\t\t\t\t\$listingLoaded = true;
\t\t\t\tcheckResultsLoaded();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#listing-loading\").hide();
\t\t\t\t\$(\"#listing\").html(data).fadeIn();
        \t\t\$listingLoaded = true;
        \t\tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 533
        echo "\tfunction loadListingPagination()
\t{
\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 538
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_practice_day_registrations_ajax_get_listing_pagination"), "html", null, true);
        echo "\",
\t\t\tdata: {
   \t\t\t\tname: \$(\"#form-name\").val(),
\t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t\t\t\temailAddress: \$(\"#form-email-address\").val(),
\t\t\t\tcontactNumber: \$(\"#form-contact-number\").val(),
\t\t\t\tpostZipCode: \$(\"#form-post-zip-code\").val(),
\t    \t\tage: \$(\"#form-age\").val(),
\t    \t\tday: \$(\"#form-day\").val(),
    \t\t\tvip: \$(\"#form-vip\").val(),
\t    \t\tpage: \$(\"#form-current-page\").val(),
   \t\t\t\tmaxResults: \$(\"#form-max-results\").val()
   \t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\t\t\$listingPaginationLoaded = true;
\t\t\t\tcheckResultsLoaded();
\t      \t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").html(data).fadeIn();
\t        \t\$listingPaginationLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:PracticeDayRegistrations:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 452,  495 => 448,  491 => 446,  432 => 390,  203 => 171,  114 => 46,  208 => 80,  183 => 68,  166 => 62,  423 => 218,  419 => 217,  411 => 215,  407 => 214,  403 => 213,  395 => 211,  383 => 345,  379 => 207,  375 => 206,  371 => 205,  363 => 203,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 195,  323 => 193,  307 => 183,  303 => 182,  299 => 181,  295 => 180,  283 => 177,  279 => 176,  275 => 175,  265 => 171,  251 => 166,  199 => 130,  191 => 125,  170 => 110,  210 => 70,  180 => 58,  172 => 56,  168 => 55,  149 => 121,  139 => 34,  240 => 191,  230 => 182,  121 => 23,  257 => 222,  249 => 119,  106 => 36,  334 => 31,  294 => 25,  286 => 20,  277 => 17,  255 => 8,  244 => 3,  214 => 142,  198 => 93,  181 => 89,  167 => 80,  160 => 76,  45 => 5,  487 => 345,  481 => 437,  479 => 340,  477 => 339,  468 => 425,  444 => 312,  439 => 310,  424 => 383,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 232,  327 => 194,  324 => 225,  320 => 223,  297 => 205,  274 => 188,  256 => 173,  254 => 204,  252 => 120,  231 => 152,  216 => 138,  213 => 82,  202 => 68,  458 => 112,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 70,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 44,  290 => 43,  284 => 195,  270 => 37,  266 => 36,  261 => 170,  247 => 165,  243 => 164,  238 => 28,  220 => 26,  201 => 22,  194 => 71,  130 => 67,  100 => 35,  85 => 30,  76 => 18,  112 => 37,  101 => 75,  98 => 18,  272 => 85,  269 => 172,  228 => 1,  221 => 77,  197 => 21,  184 => 59,  138 => 37,  118 => 73,  105 => 18,  66 => 45,  56 => 16,  115 => 21,  83 => 29,  164 => 50,  140 => 104,  58 => 15,  21 => 4,  61 => 11,  36 => 3,  209 => 134,  205 => 69,  196 => 79,  192 => 61,  189 => 77,  178 => 66,  176 => 57,  165 => 54,  161 => 58,  152 => 110,  148 => 52,  141 => 50,  134 => 99,  132 => 106,  127 => 53,  123 => 34,  109 => 63,  90 => 31,  54 => 8,  133 => 95,  124 => 52,  111 => 69,  107 => 110,  80 => 60,  69 => 87,  60 => 42,  52 => 16,  97 => 34,  95 => 33,  88 => 13,  78 => 27,  75 => 15,  71 => 25,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 66,  399 => 212,  343 => 198,  339 => 197,  335 => 196,  321 => 50,  317 => 29,  314 => 47,  311 => 184,  305 => 44,  291 => 179,  287 => 178,  282 => 19,  268 => 38,  264 => 37,  259 => 175,  245 => 80,  241 => 2,  236 => 29,  222 => 28,  218 => 110,  159 => 55,  154 => 14,  151 => 73,  145 => 56,  136 => 48,  128 => 25,  125 => 123,  119 => 114,  110 => 21,  96 => 35,  93 => 34,  91 => 33,  68 => 9,  65 => 12,  63 => 36,  43 => 24,  50 => 5,  25 => 6,  92 => 30,  86 => 28,  79 => 40,  46 => 26,  37 => 3,  33 => 10,  27 => 11,  82 => 59,  72 => 20,  64 => 16,  53 => 8,  49 => 9,  44 => 5,  42 => 13,  34 => 9,  29 => 6,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 88,  215 => 23,  211 => 135,  204 => 98,  200 => 154,  195 => 122,  193 => 163,  190 => 119,  188 => 70,  185 => 76,  179 => 72,  177 => 114,  171 => 64,  162 => 105,  158 => 61,  156 => 75,  153 => 54,  146 => 106,  142 => 69,  137 => 51,  131 => 63,  126 => 101,  120 => 87,  117 => 44,  103 => 64,  99 => 36,  77 => 18,  74 => 27,  57 => 31,  47 => 5,  39 => 4,  32 => 16,  24 => 6,  17 => 1,  135 => 50,  129 => 46,  122 => 122,  116 => 47,  113 => 112,  108 => 117,  104 => 39,  102 => 17,  94 => 103,  89 => 53,  87 => 64,  84 => 11,  81 => 20,  73 => 18,  70 => 17,  67 => 43,  62 => 11,  59 => 29,  55 => 14,  51 => 7,  48 => 25,  41 => 8,  38 => 19,  35 => 7,  31 => 2,  28 => 10,);
    }
}
