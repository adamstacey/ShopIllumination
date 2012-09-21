<?php

/* WebIlluminationAdminBundle:MembershipCards:indexScript.js.twig */
class __TwigTemplate_266ffd86f5b72698eba071c14d20196c extends Twig_Template
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
        echo "\tvar contacts = [
\t\t";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "contacts"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
            // line 10
            echo "\t\t\t{
\t\t\t\tvalue: \"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "objectId"), "html", null, true);
            echo "\",
\t\t\t\tlabel: \"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "firstName"), "html", null, true);
            echo " ";
            if (($this->getAttribute($this->getContext($context, "contact"), "middleName") != "")) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "middleName"), "html", null, true);
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "lastName"), "html", null, true);
            if (($this->getAttribute($this->getContext($context, "contact"), "organisationName") != "")) {
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "contact"), "organisationName"), "html", null, true);
                echo ")";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
        echo "\t];
\t\t
\t\$(document).ready(function() {
\t\t\$(\"#user-search\").autocomplete({
\t\t\tsource: contacts,
\t\t\tselect: function(event, ui) {
\t\t\t\t\$(\"#user-\"+ui.item.value).attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-user-\"+ui.item.value+\" span\").addClass(\"checked\");
\t\t\t\t\$(\"#filter-users\").animate({scrollTop: (\$(\"#filter-users\").scrollTop() + (\$(\"#uniform-user-\"+ui.item.value).position().top - 60))}, 'slow');
\t\t\t\t\$(\"#user-search\").val(\"\");
\t\t\t\tbuildSelectedUsers();
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 31
        echo "\t\t\$(\".action-clear-filters\").live('click', function() {
\t\t\t\$(\"input[type='checkbox']\").removeAttr(\"checked\");
\t\t\t\$(\"div.checker span\").removeClass(\"checked\");
\t\t\t\$(\"#form-membership-number, #form-active, #form-user-id, #form-valid-from-date-from, #form-valid-from-date-from-formatted, #form-valid-from-date-to, #form-valid-from-date-to-formatted, #form-expiry-date-from, #form-expiry-date-from-formatted, #form-expiry-date-to, #form-expiry-date-to-formatted\").val(\"\");
\t\t\t\$(\"#filter-users\").animate({scrollTop: 0}, 'slow');
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 41
        echo "\t\t\$(\".action-view-add-membership-card\").live('click', function() {
\t\t\t\$(\"#membership-card-add\").slideDown(function() {
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#membership-card-add\").offset().top - 50},'slow');
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 48
        echo "\t\t\$(\".action-cancel-add-membership-card\").live('click', function() {
\t\t\t\$(\".form-error\").hide();
\t\t\t\$(\"input, textarea, select\").removeClass(\"invalid\");
\t\t\t\$(\"#membership-card-add\").slideUp(function() {
\t\t\t\t\$(\"#membership-card-membership-number\").val(\"\");
\t\t\t\t\$(\"#membership-card-valid-from-date\").val(\"";
        // line 53
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#membership-card-expiry-date\").val(\"";
        // line 54
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#membership-card-valid-from-date-formatted\").val(\"";
        // line 55
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#membership-card-expiry-date-formatted\").val(\"";
        // line 56
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\$(\"#membership-card-discount-use-container\").hide();
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 62
        echo "        \$(\".action-add-membership-card\").live('click', function() {
        \tvar addMembershipCardValidator = \$(\"#membership-card-add :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (addMembershipCardValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"POST\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_add_membership_card"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tmembershipNumber: \$(\"#membership-card-membership-number\").val(),
\t\t\t\t\t\tvalidFromDate: \$(\"#membership-card-valid-from-date-formatted\").val(),
\t\t\t\t\t\texpiryDate: \$(\"#membership-card-expiry-date-formatted\").val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#message-error .message-text\").html('Sorry, there was a problem adding the membership card. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#message-error .message-text\").html(data.message);
\t\t\t      \t\t\t\$(\"#message-error\").fadeIn();
\t\t\t      \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#membership-card-add\").slideUp(function() {
\t\t\t\t\t\t\t\t\$(\"#membership-card-membership-number\").val(\"\");
\t\t\t\t\t\t\t\t\$(\"#membership-card-valid-from-date\").val(\"";
        // line 98
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#membership-card-expiry-date\").val(\"";
        // line 99
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "d/m/Y"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#membership-card-valid-from-date-formatted\").val(\"";
        // line 100
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "validFromDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#membership-card-expiry-date-formatted\").val(\"";
        // line 101
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getContext($context, "expiryDate"), "Y-m-d"), "html", null, true);
        echo "\");
\t\t\t\t\t\t\t\t\$(\"#membership-card-discount-use-container\").hide();
\t\t\t\t\t\t\t});
\t\t\t\t      \t\tloadResults();
    \t\t\t\t\t\t\$(\"#message-success .message-text\").html('The membership card was successfully added.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
        
        ";
        // line 116
        echo "        \$(\".action-view-membership-card\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'membership-card', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-view-membership-card\"));
        });
        
        ";
        // line 121
        echo "        \$(\".action-view-customer\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar \$userId = \$(this).attr(\"data-user-id\");
        \t\$(\"#customer-details-\"+\$(this).attr(\"data-id\")).hide().html(\"\");
        \t\$(\"#customer-details-loading-\"+\$(this).attr(\"data-id\")).show();
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'customer', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-view-customer\"));
        \t\$.ajax({
   \t\t\t\ttype: \"GET\",
   \t\t\t\turl: \"";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_get_customer"), "html", null, true);
        echo "\",
   \t\t\t\tdata: {
   \t\t\t\t\tuserId: \$userId
\t   \t\t\t},
   \t\t\t\terror: function(data) {
   \t\t\t\t\t\$(\"#customer-details-loading-\"+\$id).hide();
   \t\t\t\t\t\$(\"#customer-details-\"+\$id).html('<p class=\"ac\">Sorry, the customer information could not be found.</p>').fadeIn();
\t\t      \t},
   \t\t\t\tsuccess: function(data) {
   \t\t\t\t\t\$(\"#customer-details-loading-\"+\$id).hide();
   \t\t\t\t\t\$(\"#customer-details-\"+\$id).html(data).fadeIn();
   \t\t\t\t}
 \t\t\t});
        });
        
        ";
        // line 145
        echo "        \$(\".action-assign-user\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'assign-user', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-assign-user\"));
        });
\t\t
        ";
        // line 150
        echo "        \$(\".action-view-report\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'report', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-view-report\"));
        });
        
        ";
        // line 155
        echo "        \$(\".action-save-membership-card\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar saveMembershipCardValidator = \$(\"#membership-card-membership-card-\"+\$id+\" :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (saveMembershipCardValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"GET\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 170
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_save_membership_card"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tid: \$id,
\t\t\t\t\t\tmembershipNumber: \$(\"#membership-card-membership-number-\"+\$id).val(),
\t\t\t\t\t\tvalidFromDate: \$(\"#membership-card-valid-from-date-formatted-\"+\$id).val(),
\t\t\t\t\t\texpiryDate: \$(\"#membership-card-expiry-date-formatted-\"+\$id).val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#membership-card-error-message-text-\"+\$id).html('Sorry, there was a problem saving the membership card. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#membership-card-error-message-\"+\$id).fadeIn();
\t\t\t      \t\t\$.mask.close();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#membership-card-error-message-text-\"+\$id).html(data.message);
\t\t\t\t      \t\t\$(\"#membership-card-error-message-\"+\$id).fadeIn();
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t      \t\tloadResults();
\t\t\t\t      \t\t\$.mask.close();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id).hide();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\t\t\t\t\$(\"#message-success .message-text\").html('The membership card was successfully saved.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
        
        ";
        // line 205
        echo "        \$(\".action-save-user\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar assignUserValidator = \$(\"#membership-card-assign-user-\"+\$id+\" :input\").validator({
    \t\t\tposition : 'bottom left', 
    \t\t\toffset : [0, 0], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><em/></div>'
\t\t\t});
\t\t\tif (assignUserValidator.data(\"validator\").checkValidity())
\t\t\t{\t\t\t
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#flash_messages .message\").hide();
\t        \t\$.ajax({
\t\t\t\t\ttype: \"GET\",
\t\t\t\t\tdataType: \"json\",
\t\t\t\t\turl: \"";
        // line 220
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_save_user"), "html", null, true);
        echo "\",
\t\t\t\t\tdata: {
\t\t\t\t\t\tid: \$id,
\t\t\t\t\t\tuserId: \$(\"#user-id-\"+\$id).val()
\t\t\t\t\t},
\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\$(\"#message-error-text-\"+\$id).html('Sorry, there was a problem assigning the customer. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#message-error-\"+\$id).fadeIn();
\t\t\t      \t\t\$.mask.close();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t      \t},
\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#message-error-text-\"+\$id).html(data.message);
\t\t\t\t      \t\t\$(\"#message-error-\"+\$id).fadeIn();
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t} else {
\t\t\t\t      \t\tloadResults();
\t\t\t\t      \t\t\$.mask.close();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id).hide();
    \t\t\t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\t\t\t\t\$(\"#message-success .message-text\").html('The customer was successfully assigned.');
\t\t\t\t      \t\t\$(\"#message-success\").fadeIn();
    \t\t\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t\t\t}
        });
                                
        ";
        // line 253
        echo "        \$(\".action-confirm-release-user\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-release-user', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-release-user\"));
        });
        \$(\".action-release-user\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 261
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_release_user"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#message-error .message-text\").html('Sorry, there was a problem releasing the customer from the membership card. Please try again.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t      \t\$.mask.close();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\t\$(\"#form-current-page\").val('1');
\t\t      \t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\t\t\$(\"tr.membership-card td\").removeAttr(\"style\");
\t\t\t\t\t\$(\"tr.membership-card button\").removeClass(\"ui-button-blue\");
\t\t\t\t\t\$.mask.close();
\t\t\t\t\tloadResults();
\t\t\t\t\t\$(\"#message-success .message-text\").html('The customer has been successfully released from the membership card.');
\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
        ";
        // line 290
        echo "        \$(\".action-confirm-delete-membership-card\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#membership-card-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete-membership-card\"));
        });
        \$(\".action-delete-membership-card\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 298
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_delete_membership_card"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#message-error .message-text\").html('Sorry, there was a problem deleting the membership card. Please try again.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t      \t\$.mask.close();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\t\$(\"#form-current-page\").val('1');
\t\t      \t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\t\t\$(\"tr.membership-card td\").removeAttr(\"style\");
\t\t\t\t\t\$(\"tr.membership-card button\").removeClass(\"ui-button-blue\");
\t\t\t\t\t\$.mask.close();
\t\t\t\t\tloadResults();
\t\t\t\t\t\$(\"#message-success .message-text\").html('The membership card has been successfully deleted.');
\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        \$(\".action-confirm-delete-membership-cards\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#membership-card-confirm-delete-membership-cards\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#membership-card-confirm-delete-membership-cards\").offset().top - 50},'slow');
\t    \t}
        });
        \$(\".action-cancel-delete-membership-cards\").live('click', function() {
        \t\$(\"#membership-card-confirm-delete-membership-cards\").fadeOut();
        });
        \$(\".action-delete-membership-cards\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#membership-card-confirm-delete-membership-cards\").hide();
\t\t\t\tvar \$numberOfMembershipCardsToDelete = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfMembershipCardsDeleted = 0;
\t\t\t\tif (\$numberOfMembershipCardsToDelete > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_delete_membership_card"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfMembershipCardsDeleted = \$numberOfMembershipCardsDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-error .message-text\").html('Sorry, there was a problem deleting the selected membership cards. Please try again.');
\t\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t\t      \tif (\$numberOfMembershipCardsDeleted >= \$numberOfMembershipCardsToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\t\$.mask.close();
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfMembershipCardsDeleted = \$numberOfMembershipCardsDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-success .message-text\").html('The membership cards were successfully deleted.');
\t\t\t\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t\t\t\t\t\tif (\$numberOfMembershipCardsDeleted >= \$numberOfMembershipCardsToDelete)
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
\t\t\t\t\t\$(\"#message-error .message-text\").html('Sorry, you did not select any membership cards to delete.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
    
\t\t";
        // line 391
        echo "\t\t\$(\".membership-card-active\").live('click', function() {
\t\t\tvar \$options = new Array();
\t\t\t\$(\".membership-card-active:checked\").each(function(index) {
\t\t\t\t\$options[\$options.length] = \$(this).attr(\"data-active\");
\t\t\t});
\t\t\t\$(\"#form-active\").val(\$options.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t\$(\".user\").live('click change', function() {
\t\t\tbuildSelectedUsers();
\t\t});
\t\t
\t\t";
        // line 404
        echo "\t\t\$(\".action-select-all\").live('click', function() {
\t\t\tif (\$(\".action-select-all\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\".action-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\".action-select\").parent().addClass(\"checked\");
\t\t\t\t\$(\"tr.membership-card\").addClass(\"selected\");
\t\t\t} else {
\t\t\t\t\$(\".action-select\").attr(\"checked\", false);
\t\t\t\t\$(\".action-select\").parent().removeClass(\"checked\");
\t\t\t\t\$(\"tr.membership-card\").removeClass(\"selected\");
\t\t\t}
\t\t});
        \$(\".action-select\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tif (\$(this).is(\":checked\"))
        \t{
        \t\t\$(\"#membership-card-\"+\$id).addClass(\"selected\");
        \t} else {
        \t\t\$(\"#membership-card-\"+\$id).removeClass(\"selected\");
        \t}
        });
\t\t\t\t
\t\t";
        // line 427
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.membership-card td\").removeAttr(\"style\");
\t\t\t\$(\"tr.membership-card button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 435
        echo "\t\t\$(\"#form-valid-from-date-from\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-valid-from-date-from-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-valid-from-date-to\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-valid-from-date-to-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-expiry-date-from\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-expiry-date-from-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-expiry-date-to\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-expiry-date-to-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 481
        echo "\t\t\$(\"#voucher-code-discount-use\").live('change', function() {
\t\t\tif (\$(this).val() == 'f')
\t\t\t{
\t\t\t\t\$(\"#voucher-code-discount-use-container\").fadeIn();
\t\t\t} else {
\t\t\t\t\$(\"#voucher-code-discount-use-container\").fadeOut();
\t\t\t}
\t\t});
\t
\t\t";
        // line 491
        echo "\t\t\$(\"#minimum-order-value-range\").slider({
\t\t\trange: true,
\t\t\tmin: 0,
\t\t\tmax: 5000,
\t\t\tvalues: [0, 5000],
\t\t\tslide: function(event, ui) {
\t\t\t\t\$(\"#minimum-order-value-range-amount\").html(\"&pound;\"+ui.values[0]+\" - &pound;\"+ui.values[1]);
\t\t\t},
\t\t\tchange: function(event, ui) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#minimum-order-value-range-amount\").html(\"&pound;\"+\$(\"#minimum-order-value-range\").slider(\"values\", 0)+\" - &pound;\"+\$(\"#minimum-order-value-range\").slider(\"values\", 1));
\t\t
\t\t";
        // line 507
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
        // line 519
        echo "\t\t\$(\".action-update-your-results\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t\$(\"#form-voucher-code, #form-actives, #form-discount-types, #form-discount-uses, #form-valid-from-date-from-formatted, #form-valid-from-date-to-formatted, #form-expiry-date-from-formatted, #form-expiry-date-to-formatted\").live('change', function() {
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
        // line 537
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t});
\t\t\t
\t";
        // line 544
        echo "\tfunction showMoreInformation(\$id, \$moreInformation, \$button)
\t{
\t\t\$(\".form-error\").hide();
    \t\$(\"tr#membership-card-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
    \tif (\$(\"#membership-card-\"+\$moreInformation+\"-\"+\$id).is(\":hidden\"))
    \t{
    \t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\$(\"#more-information-\"+\$id).show();
    \t\t\$(\"#membership-card-\"+\$moreInformation+\"-\"+\$id).fadeIn();
    \t\t\$(\"#more-information-\"+\$id+\" td, #membership-card-\"+\$id+\" td\").expose({
    \t\t\tcolor: \"#042F4F\",
    \t\t\tloadSpeed: 2000,
    \t\t\topacity: \"0.6\",
    \t\t\tonClose: function() {
    \t\t\t\t\$(\".form-error\").hide();
    \t\t\t\t\$(\".more-information, .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"#more-information-\"+\$id).fadeOut();
    \t\t\t\t\$(\"#voucher-code-\"+\$id+\" td\").removeAttr(\"style\");
    \t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"tr#membership-card-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
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
\t
\t";
        // line 579
        echo "\tfunction buildSelectedUsers()
\t{
\t\tvar \$usersToCollect = \$(\".user:checked\").length;
\t\tvar \$usersCollected = 0;
\t\tvar \$users = new Array();
\t\t\$(\".user:checked\").each(function(index) {
\t\t\t\$users[\$users.length] = \$(this).attr(\"data-id\");
\t\t\t\$usersCollected = \$usersCollected + 1;
\t\t\tif (\$usersCollected == \$usersToCollect)
\t\t\t{
\t\t\t\t\$(\"#form-user-id\").val(\$users.join(\"|\"));
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\tif (\$usersToCollect == 0)
\t\t{
\t\t\t\$(\"#form-user-id\").val(\"\");
\t\t\tloadResults();
\t\t}
\t}
\t
\t";
        // line 601
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
        // line 613
        echo "\tfunction checkResultsLoaded()
\t{
\t\tif (\$listingCountLoaded && \$listingLoaded && \$listingPaginationLoaded)
\t\t{
\t\t\t\$(\"#ajax_loading\").hide();
\t\t}
\t}
\t
\t";
        // line 622
        echo "\tfunction loadListingCount()
\t{
\t\t\$(\"#listing-count\").html('<img src=\"";
        // line 624
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\tdataType: \"json\",
\t\t\turl: \"";
        // line 628
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_get_listing_count"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t    \t\tactive: \$(\"#form-active\").val(),
\t    \t\tuserId: \$(\"#form-user-id\").val(),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-count\").html('No Membership Cards Found');
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
    \t    \t\t\t\t\$(\"#listing-count\").html('No Membership Cards Found');
        \t\t\t\t} else {
\t        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' Membership Cards | Assigned: '+data.listingStatistics.assigned+' | Unassigned: '+data.listingStatistics.unassigned);
\t        \t\t\t}
\t        \t\t} else {
    \t    \t\t\t\$(\"#listing-count\").html('Found 1 Membership Card | Assigned: '+data.listingStatistics.assigned+' | Unassigned: '+data.listingStatistics.unassigned);
        \t\t\t}\t
\t        \t} else {
    \t    \t\t\$(\"#listing-count\").html('No Membership Cards Found');
        \t\t}
        \t\t\$listingCountLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 668
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
        // line 678
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_get_listing"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t    \t\tactive: \$(\"#form-actives\").val(),
\t    \t\tuserId: \$(\"#form-user-id\").val(),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val(),
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
        // line 707
        echo "\tfunction loadListingPagination()
\t{
\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 712
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_membership_cards_ajax_get_listing_pagination"), "html", null, true);
        echo "\",
\t\t\tdata: {
   \t\t\t\tmembershipNumber: \$(\"#form-membership-number\").val(),
\t    \t\tactive: \$(\"#form-actives\").val(),
\t    \t\tuserId: \$(\"#form-user-id\").val(),
    \t\t\tvalidFromDateFrom: \$(\"#form-valid-from-date-from-formatted\").val(),
    \t\t\tvalidFromDateTo: \$(\"#form-valid-from-date-to-formatted\").val(),
    \t\t\texpiryDateFrom: \$(\"#form-expiry-date-from-formatted\").val(),
    \t\t\texpiryDateTo: \$(\"#form-expiry-date-to-formatted\").val(),
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
        return "WebIlluminationAdminBundle:MembershipCards:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 613,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 391,  381 => 261,  225 => 121,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 485,  527 => 477,  346 => 120,  560 => 178,  552 => 173,  548 => 172,  543 => 170,  539 => 169,  535 => 168,  531 => 167,  507 => 158,  490 => 150,  485 => 148,  445 => 137,  386 => 118,  380 => 115,  330 => 289,  302 => 82,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 338,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 220,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 428,  470 => 142,  466 => 141,  457 => 185,  451 => 181,  436 => 171,  422 => 298,  417 => 163,  413 => 162,  408 => 368,  388 => 158,  382 => 157,  350 => 301,  315 => 137,  312 => 106,  308 => 104,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 159,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 432,  483 => 198,  480 => 432,  476 => 349,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 366,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 35,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 451,  497 => 203,  494 => 151,  484 => 198,  462 => 140,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 295,  329 => 143,  326 => 92,  319 => 205,  288 => 123,  229 => 105,  206 => 71,  147 => 120,  227 => 80,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 936,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 844,  897 => 815,  884 => 803,  867 => 712,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 482,  514 => 458,  450 => 138,  354 => 154,  344 => 301,  219 => 116,  273 => 86,  263 => 229,  246 => 80,  234 => 106,  217 => 182,  173 => 60,  309 => 94,  285 => 246,  280 => 235,  276 => 99,  262 => 86,  235 => 129,  232 => 67,  212 => 66,  207 => 44,  143 => 115,  157 => 68,  366 => 158,  340 => 97,  503 => 205,  488 => 200,  475 => 429,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 126,  412 => 290,  409 => 103,  404 => 100,  390 => 161,  362 => 125,  358 => 124,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 92,  253 => 145,  233 => 78,  226 => 64,  187 => 65,  150 => 41,  260 => 82,  155 => 67,  223 => 79,  186 => 63,  169 => 136,  301 => 65,  298 => 100,  292 => 98,  267 => 57,  258 => 84,  248 => 109,  242 => 107,  239 => 70,  237 => 206,  174 => 60,  182 => 62,  175 => 40,  144 => 114,  596 => 538,  589 => 535,  557 => 503,  545 => 493,  502 => 156,  495 => 202,  491 => 201,  432 => 128,  203 => 169,  114 => 41,  208 => 64,  183 => 58,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 253,  363 => 157,  359 => 154,  355 => 201,  351 => 122,  347 => 101,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 249,  279 => 120,  275 => 240,  265 => 155,  251 => 89,  199 => 90,  191 => 42,  170 => 59,  210 => 72,  180 => 152,  172 => 137,  168 => 52,  149 => 62,  139 => 73,  240 => 70,  230 => 104,  121 => 31,  257 => 222,  249 => 72,  106 => 30,  334 => 94,  294 => 78,  286 => 76,  277 => 241,  255 => 90,  244 => 110,  214 => 76,  198 => 100,  181 => 82,  167 => 73,  160 => 128,  45 => 5,  487 => 199,  481 => 147,  479 => 117,  477 => 430,  468 => 190,  444 => 108,  439 => 132,  424 => 167,  415 => 365,  392 => 162,  385 => 268,  376 => 339,  367 => 110,  360 => 106,  352 => 152,  338 => 235,  333 => 71,  327 => 194,  324 => 225,  320 => 280,  297 => 126,  274 => 117,  256 => 113,  254 => 74,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 101,  458 => 139,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 376,  410 => 125,  405 => 165,  391 => 120,  387 => 209,  384 => 333,  322 => 140,  318 => 139,  300 => 127,  296 => 100,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 228,  247 => 88,  243 => 110,  238 => 107,  220 => 26,  201 => 69,  194 => 99,  130 => 106,  100 => 56,  85 => 30,  76 => 18,  112 => 25,  101 => 28,  98 => 75,  272 => 118,  269 => 237,  228 => 105,  221 => 72,  197 => 68,  184 => 64,  138 => 73,  118 => 36,  105 => 29,  66 => 18,  56 => 38,  115 => 58,  83 => 28,  164 => 51,  140 => 38,  58 => 15,  21 => 4,  61 => 18,  36 => 10,  209 => 95,  205 => 169,  196 => 60,  192 => 67,  189 => 86,  178 => 61,  176 => 41,  165 => 76,  161 => 58,  152 => 125,  148 => 32,  141 => 56,  134 => 105,  132 => 54,  127 => 53,  123 => 51,  109 => 84,  90 => 35,  54 => 8,  133 => 54,  124 => 52,  111 => 32,  107 => 24,  80 => 24,  69 => 41,  60 => 16,  52 => 14,  97 => 55,  95 => 37,  88 => 21,  78 => 23,  75 => 55,  71 => 20,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 371,  420 => 68,  406 => 367,  402 => 363,  399 => 121,  343 => 149,  339 => 197,  335 => 196,  321 => 112,  317 => 68,  314 => 87,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 170,  268 => 94,  264 => 93,  259 => 150,  245 => 119,  241 => 204,  236 => 107,  222 => 62,  218 => 77,  159 => 34,  154 => 124,  151 => 50,  145 => 29,  136 => 103,  128 => 100,  125 => 98,  119 => 26,  110 => 44,  96 => 35,  93 => 34,  91 => 33,  68 => 13,  65 => 12,  63 => 40,  43 => 13,  50 => 23,  25 => 7,  92 => 45,  86 => 15,  79 => 54,  46 => 10,  37 => 3,  33 => 7,  27 => 4,  82 => 33,  72 => 14,  64 => 16,  53 => 12,  49 => 11,  44 => 15,  42 => 13,  34 => 9,  29 => 9,  23 => 5,  19 => 2,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 194,  215 => 184,  211 => 106,  204 => 98,  200 => 73,  195 => 49,  193 => 164,  190 => 98,  188 => 153,  185 => 40,  179 => 48,  177 => 61,  171 => 52,  162 => 126,  158 => 125,  156 => 130,  153 => 30,  146 => 110,  142 => 46,  137 => 55,  131 => 41,  126 => 40,  120 => 93,  117 => 58,  103 => 31,  99 => 36,  77 => 27,  74 => 49,  57 => 13,  47 => 7,  39 => 18,  32 => 9,  24 => 5,  17 => 1,  135 => 105,  129 => 53,  122 => 48,  116 => 47,  113 => 57,  108 => 84,  104 => 39,  102 => 40,  94 => 41,  89 => 22,  87 => 30,  84 => 20,  81 => 60,  73 => 20,  70 => 17,  67 => 19,  62 => 11,  59 => 22,  55 => 14,  51 => 7,  48 => 15,  41 => 8,  38 => 21,  35 => 17,  31 => 12,  28 => 5,);
    }
}
