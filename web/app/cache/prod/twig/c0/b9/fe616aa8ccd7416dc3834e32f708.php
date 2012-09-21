<?php

/* WebIlluminationShopBundle:Checkout:indexScript.js.twig */
class __TwigTemplate_c0b9fe616aa8ccd7416dc3834e32f708 extends Twig_Template
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
        echo "\t\tvar \$minimumSectionHeight = 0;
\t\t\$(\".sidebar-tabs > ul > li\").each(function() {
\t\t\t\$minimumSectionHeight = \$minimumSectionHeight + \$(this).outerHeight(true);
\t\t});
\t\t\$(\".sidebar-tabs section\").each(function() {
\t\t\t\$(this).css(\"min-height\", \$minimumSectionHeight+\"px\");
\t\t});
\t\t
\t\t";
        // line 13
        echo "\t\t\$(\".action-forgotten-your-password\").live('click', function() {
\t\t\t\$(\".form-error\").hide();
\t\t\t\$(\"#checkout-login\").slideUp();
\t\t\t\$(\"#forgotten-your-password\").slideDown(function() {
\t\t\t\t\$(\"#form-forgotten-your-password-email-address\").focus();
\t\t\t});
\t\t});
\t\t\$(\".action-secure-login\").live('click', function() {
\t\t\t\$(\".form-error\").hide();
\t\t\t\$(\"#forgotten-your-password\").slideUp();
\t\t\t\$(\"#checkout-login\").slideDown(function() {
\t\t\t\t\$(\"#form-checkout-login-email-address\").focus();
\t\t\t});
\t\t});
        
        ";
        // line 29
        echo "        var \$currentCheckoutStep = parseInt(\$(\"#current-checkout-step\").val());
        if (\$currentCheckoutStep > 4)
        {
        \t";
        // line 32
        if (($this->getAttribute($this->getContext($context, "order"), "paymentType") == "SagePay")) {
            // line 33
            echo "        \t\t\$(\"#payment-type-sagepay\").fadeIn();
        \t";
        } elseif (($this->getAttribute($this->getContext($context, "order"), "paymentType") == "Voucher Code")) {
            // line 35
            echo "        \t\t\$(\"#payment-type-voucher-code\").fadeIn();
        \t";
        } elseif (($this->getAttribute($this->getContext($context, "order"), "paymentType") == "Gift Voucher")) {
            // line 37
            echo "        \t\t\$(\"#payment-type-gift-voucher\").fadeIn();
        \t";
        }
        // line 39
        echo "        }
        
        ";
        // line 42
        echo "        \$(\".action-go-to-checkout-section\").live(\"click\", function() {
        \tvar \$tabIndex = \$(this).attr(\"data-checkout-section\");
        \t\$(\".sidebar-tabs\").tabs(\"select\", \$tabIndex);
        });
        
\t\t";
        // line 48
        echo "\t\t\$(\".sidebar-tabs\").tabs({
\t\t\tselect: function(event, ui) {
\t\t\t\tvar \$currentCheckoutStep = parseInt(\$(\"#current-checkout-step\").val());
\t\t   \t\tif (ui.index >= \$currentCheckoutStep)
\t\t   \t\t{
\t\t   \t\t\tevent.preventDefault();
\t\t   \t\t}
\t\t   \t}
\t\t});
\t\t
\t\t";
        // line 59
        echo "\t\t\$(\"#form-requested-delivery-date\").datepicker({
\t\t\tdateFormat: \"DD d MM yy\",
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tminDate: new Date(\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "basket"), "estimatedDeliveryDateRange"), "requestedDeliveryDateStart"), "html", null, true);
        echo "\"),
\t\t\tbeforeShowDay: \$.datepicker.noWeekends
\t\t});
\t\t
\t\t";
        // line 68
        echo "\t\tgetOrderInformation();
\t\t
\t\t";
        // line 71
        echo "\t\t\$(\"#form-billing-country-code\").live('change', function() {
\t\t\tif (\$(this).val() == 'IE')
\t\t\t{
\t\t\t\t\$(\"#billing-post-zip-code-container\").hide();
\t\t\t\t\$(\"#same-address-billing\").hide();
\t\t\t\t\$(\"#form-billing-post-zip-code\").val('000');
\t\t\t\t\$(\"#republic-of-ireland-billing-address-message\").fadeIn();
\t\t\t\t\$(\"#form-same-billing-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-billing-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t} else if (\$(this).val() == 'GB') {
\t\t\t\t\$(\"#republic-of-ireland-billing-address-message\").hide();
\t\t\t\t\$(\"#form-billing-post-zip-code\").val(\"\");
\t\t\t\t\$(\"#form-same-billing-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-same-billing-address > span\").removeClass(\"checked\");
\t\t\t\t\$(\"#billing-post-zip-code-container\").fadeIn();
\t\t\t\t\$(\"#same-address-billing\").fadeIn();
\t\t\t\tresetDeliveryAddress();
\t\t\t}
\t\t});
\t\t\$(\"#form-delivery-country-code\").live('change', function() {
\t\t\tif (\$(this).val() == 'IE')
\t\t\t{
\t\t\t\t\$(\"#delivery-post-zip-code-container\").hide();
\t\t\t\t\$(\"#same-address-delivery\").hide();
\t\t\t\t\$(\"#form-delivery-post-zip-code\").val('000');
\t\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").fadeIn();
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t\t\t\tcopyDeliveryAddressToBillingAddress();
\t\t\t} else if (\$(this).val() == 'GB') {
\t\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").hide();
\t\t\t\t\$(\"#form-delivery-post-zip-code\").val(\"\");
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-delivery-billing-address > span\").removeClass(\"checked\");
\t\t\t\t\$(\"#delivery-post-zip-code-container\").fadeIn();
\t\t\t\t\$(\"#same-address-delivery\").fadeIn();
\t\t\t\tif (\$(\"#form-billing-country-code\").val() == 'IE')
\t\t\t\t{
\t\t\t\t\tresetBillingAddress();
\t\t\t\t}
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 116
        echo "\t\t\$(\"#form-same-delivery-address\").live('change', function() {
\t\t\tif (\$(\"#form-same-delivery-address\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#form-use-billing-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-use-billing-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t} else {
\t\t\t\t\$(\"#form-use-billing-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-use-billing-address > span\").removeClass(\"checked\");
\t\t\t}
\t\t});
\t\t\$(\"#form-use-billing-address\").live('change', function() {
\t\t\tif (\$(\"#form-use-billing-address\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t} else {
\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"\");
\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").removeClass(\"checked\");
\t\t\t\tresetDeliveryAddress();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 141
        echo "\t\t\$(\"input[name='delivery-option']\").live('change', function() {
\t\t\tif (\$(\"input[name='delivery-option']:checked\").val() == 'Collection')
\t\t\t{
\t\t\t\t\$(\"#label-requested-delivery-date\").html('Requested Collection Date<small>Enter a requested collection date</small>');
\t\t\t\t\$(\"#form-requested-delivery-date\").val(\"Collect ASAP\");
\t\t\t\t\$(\"#checkout-delivery-address\").fadeOut(function() {
\t\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t\t\t\t});
\t\t\t} else {
\t\t\t\t\$(\"#label-requested-delivery-date\").html('Requested Delivery Date<small>Enter a requested delivery date</small>');
\t\t\t\t\$(\"#form-requested-delivery-date\").val(\"Deliver ASAP\");
\t\t\t\tresetDeliveryAddress();
\t\t\t\t\$(\"#checkout-delivery-address\").fadeIn();
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 158
        echo "\t\tupdateCheckoutTabs();
\t\t
\t\t";
        // line 161
        echo "\t\t\$(\".action-check-email-address\").live('click', function() {
\t\t\tvar checkEmailAddressValidator = \$(\"#checkout-your-email-address :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (checkEmailAddressValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 173
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_check_email_address"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#flash-messages .message\").hide();
\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\$(\"#checkout-user\").hide();
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\temailAddress: \$(\"#form-checkout-your-email-address-email-address\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem checking your email address. Please try again.');
\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t});
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tif (data.response == 'success')
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\t\$(\"#checkout-your-email-address\").hide();
\t   \t\t\t\t\t\tif (data.userAccountExists == true)
\t   \t\t\t\t\t\t{
\t   \t\t\t\t\t\t\t\$(\"#form-checkout-login-email-address\").val(data.order.emailAddress);
\t   \t\t\t\t\t\t\t\$(\"#checkout-login\").fadeIn(function() {
\t   \t\t\t\t\t\t\t\t\$(\"#form-checkout-login-password\").focus();
\t   \t\t\t\t\t\t\t});\t
\t   \t\t\t\t\t\t} else {
\t   \t\t\t\t\t\t\t\$(\"#form-checkout-create-user-email-address\").val(data.order.emailAddress);
\t   \t\t\t\t\t\t\t\$(\"#checkout-create-user\").fadeIn(function() {
\t   \t\t\t\t\t\t\t\t\$(\"#form-checkout-create-user-confirm-email-address\").focus();
\t   \t\t\t\t\t\t\t});
\t   \t\t\t\t\t\t}
\t   \t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t\t} else {
\t   \t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem checking your email address. Please try again.');
\t\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t   \t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t\t      \t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t   \t\t\t\t\t}
\t   \t\t\t\t}
\t \t\t\t});
\t \t\t}
\t\t});
\t\t\$(\".action-use-different-email-address\").live('click', function() {
\t\t\t\$(\"#flash-messages .message\").hide();
\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\$(\"#form-checkout-your-email-address-email-address\").val(\"\");
\t\t\t\$(\"#checkout-your-email-address\").fadeIn(function() {
\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t});
\t\t});
\t\t
\t\t";
        // line 231
        echo "\t\t\$(\".action-create-user\").live('click', function() {
\t\t\tvar createUserValidator = \$(\"#checkout-create-user :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (createUserValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 243
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_create_user"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\temailAddress: \$(\"#form-checkout-create-user-email-address\").val(),
\t   \t\t\t\t\tpassword: \$(\"#form-checkout-create-user-password\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem creating your account. Please try again.');
\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t});
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\t\t\t\$(\"#checkout-your-email-address\").fadeIn(function() {
\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t\t\t});
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tif (data.response == 'success')
\t   \t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").val(\"\");
\t\t\t\t\t\t\t\$(\"#checkout-your-email-address\").show();
\t\t\t\t\t\t\t\$(\"#message-success-text\").html('Welcome to Ride Direct. Your new account has been successfully created.');
\t   \t\t\t\t\t\t\$(\"#message-success\").slideDown(function() {
\t   \t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t\t});
\t   \t\t\t\t\t\tupdateOrderProcess(data);
\t   \t\t\t\t\t\t\$(\".sidebar-tabs\").tabs({ selected: 2 });
\t   \t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t\t} else {
\t   \t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem creating your account. Please try again.');
\t\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t   \t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t\t      \t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-your-email-address\").fadeIn(function() {
\t\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t\t\t\t});
\t   \t\t\t\t\t}
\t   \t\t\t\t}
\t \t\t\t});
\t \t\t}
\t\t});
\t\t
\t\t";
        // line 298
        echo "\t\t\$(\".action-login\").live('click', function() {
\t\t\tvar loginValidator = \$(\"#checkout-login :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (loginValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 310
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("security_ajax_login"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\temailAddress: \$(\"#form-checkout-login-email-address\").val(),
\t   \t\t\t\t\tpassword: \$(\"#form-checkout-login-password\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem trying to log you in. Please try again.');
\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t});
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\t\t\t\$(\"#checkout-your-email-address\").fadeIn(function() {
\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t\t\t});
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tif (data.response == 'success')
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\t\$(\"#checkout-your-email-address-error\").hide();
\t   \t\t\t\t\t\t\$(\"#checkout-login-error\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-login\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-create-user\").hide();
\t\t\t\t\t\t\t\$(\"#checkout-your-email-address-loading\").hide();
\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").val(\"\");
\t\t\t\t\t\t\t\$(\"#checkout-your-email-address\").fadeIn(function() {
\t\t\t\t\t\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\$(\"#form-first-name\").val(data.order.firstName);
\t\t\t\t\t\t\t\$(\"#form-last-name\").val(data.order.lastName);
\t\t\t\t\t\t\t\$(\"#form-telephone-daytime\").val(data.order.telephoneDaytime);
\t\t\t\t\t\t\t\$(\"#form-telephone-evening\").val(data.order.telephoneEvening);
\t\t\t\t\t\t\t\$(\"#form-mobile\").val(data.order.mobile);
\t\t\t\t\t\t\t\$(\"#form-billing-first-name\").val(data.order.billingFirstName);
\t\t\t\t\t\t\t\$(\"#form-billing-last-name\").val(data.order.billingLastName);
\t\t\t\t\t\t\t\$(\"#form-billing-organisation-name\").val(data.order.billingOrganisationName);
\t\t\t\t\t\t\t\$(\"#form-billing-address-line-1\").val(data.order.billingAddressLine1);
\t\t\t\t\t\t\t\$(\"#form-billing-address-line-2\").val(data.order.billingAddressLine2);
\t\t\t\t\t\t\t\$(\"#form-billing-town-city\").val(data.order.billingTownCity);
\t\t\t\t\t\t\t\$(\"#form-billing-county-state\").val(data.order.billingCountyState);
\t\t\t\t\t\t\t\$(\"#form-billing-post-zip-code\").val(data.order.billingPostZipCode);
\t\t\t\t\t\t\t\$(\"#form-billing-country-code\").val(data.order.billingCountryCode);
\t\t\t\t\t\t\t\$(\"#form-delivery-first-name\").val(data.order.deliveryFirstName);
\t\t\t\t\t\t\t\$(\"#form-delivery-last-name\").val(data.order.deliveryLastName);
\t\t\t\t\t\t\t\$(\"#form-delivery-organisation-name\").val(data.order.deliveryOrganisationName);
\t\t\t\t\t\t\t\$(\"#form-delivery-address-line-1\").val(data.order.deliveryAddressLine1);
\t\t\t\t\t\t\t\$(\"#form-delivery-address-line-2\").val(data.order.deliveryAddressLine2);
\t\t\t\t\t\t\t\$(\"#form-delivery-town-city\").val(data.order.deliveryTownCity);
\t\t\t\t\t\t\t\$(\"#form-delivery-county-state\").val(data.order.deliveryCountyState);
\t\t\t\t\t\t\t\$(\"#form-delivery-post-zip-code\").val(data.order.deliveryPostZipCode);
\t\t\t\t\t\t\t\$(\"#form-delivery-country-code\").val(data.order.deliveryCountryCode);
\t\t\t\t\t\t\tif (data.order.sameDeliveryAddress > 0)
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\t\t\t\t\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t\t\t\t\t\t\t\t\$(\"#form-use-billing-address\").attr(\"checked\", \"checked\");
\t\t\t\t\t\t\t\t\$(\"#uniform-form-use-billing-address > span\").addClass(\"checked\");
\t\t\t\t\t\t\t}
\t   \t\t\t\t\t\tupdateOrderProcess(data);
\t   \t\t\t\t\t\t\$(\".sidebar-tabs\").tabs({ selected: 2 });
\t   \t\t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t\t} else {
\t   \t\t\t\t\t\t\$(\"#message-error-text\").html(data.message);
\t   \t\t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t   \t\t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t\t      \t\t\$(\"#form-checkout-login-password\").val(\"\").focus();
\t   \t\t\t\t\t}
\t   \t\t\t\t}
\t \t\t\t});
\t \t\t}
\t\t});
\t\t
\t\t";
        // line 389
        echo "\t\t\$(\".action-save-step-2\").live('click', function() {
\t\t\tvar step2Validator = \$(\"#step-2 :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (step2Validator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 401
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_save_step_2"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\tfirstName: \$(\"#form-first-name\").val(),
\t   \t\t\t\t\tlastName: \$(\"#form-last-name\").val(),
\t   \t\t\t\t\ttelephoneDaytime: \$(\"#form-telephone-daytime\").val(),
\t   \t\t\t\t\ttelephoneEvening: \$(\"#form-telephone-evening\").val(),
\t   \t\t\t\t\tmobile: \$(\"#form-mobile\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tif (\$(\"#form-billing-first-name\").val() == \"\")
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\t\$(\"#form-billing-first-name\").val(\$(\"#form-first-name\").val());
\t   \t\t\t\t\t}
\t   \t\t\t\t\tif (\$(\"#form-billing-last-name\").val() == \"\")
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\t\$(\"#form-billing-last-name\").val(\$(\"#form-last-name\").val());
\t   \t\t\t\t\t}
\t   \t\t\t\t\tupdateOrderProcess(data);
\t   \t\t\t\t\t\$(\".sidebar-tabs\").tabs({ selected: 2 });
\t   \t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t}
\t \t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 433
        echo "\t\t\$(\".action-save-step-3\").live('click', function() {
\t\t\tvar step3Validator = \$(\"#step-3 :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (step3Validator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\tvar \$sameDeliveryAddress = 0;
\t\t\t\tif (\$('#form-same-delivery-address').is(':checked'))
\t\t\t\t{
\t\t\t\t\t\$sameDeliveryAddress = 1;
\t\t\t\t}
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 450
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_save_step_3"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\tbillingFirstName: \$(\"#form-billing-first-name\").val(),
\t   \t\t\t\t\tbillingLastName: \$(\"#form-billing-last-name\").val(),
\t   \t\t\t\t\tbillingOrganisationName: \$(\"#form-billing-organisation-name\").val(),
\t   \t\t\t\t\tbillingCountryCode: \$(\"#form-billing-country-code\").val(),
\t   \t\t\t\t\tbillingAddressLine1: \$(\"#form-billing-address-line-1\").val(),
\t   \t\t\t\t\tbillingAddressLine2: \$(\"#form-billing-address-line-2\").val(),
\t   \t\t\t\t\tbillingTownCity: \$(\"#form-billing-town-city\").val(),
\t   \t\t\t\t\tbillingCountyState: \$(\"#form-billing-county-state\").val(),
\t   \t\t\t\t\tbillingPostZipCode: \$(\"#form-billing-post-zip-code\").val(),
\t   \t\t\t\t\tsameDeliveryAddress: \$sameDeliveryAddress
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tupdateOrderProcess(data);
\t   \t\t\t\t\tif (\$('#form-same-delivery-address').is(':checked'))
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\tcopyBillingAddressToDeliveryAddress();
\t   \t\t\t\t\t} else {
\t   \t\t\t\t\t\tresetDeliveryAddress();
\t   \t\t\t\t\t}
\t   \t\t\t\t\t\$(\".sidebar-tabs\").tabs({ selected: 3 });
\t   \t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t}
\t \t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 485
        echo "\t\t\$(\".action-save-step-4\").live('click', function() {
\t\t\tvar step4Validator = \$(\"#step-4 :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (step4Validator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\tvar \$sameDeliveryAddress = 0;
\t\t\t\tif (\$('#form-same-delivery-address').is(':checked'))
\t\t\t\t{
\t\t\t\t\t\$sameDeliveryAddress = 1;
\t\t\t\t}
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 502
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_save_step_4"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\tdeliveryOption: \$(\"input[name='delivery-option']:checked\").val(),
\t   \t\t\t\t\tdeliveryFirstName: \$(\"#form-delivery-first-name\").val(),
\t   \t\t\t\t\tdeliveryLastName: \$(\"#form-delivery-last-name\").val(),
\t   \t\t\t\t\tdeliveryOrganisationName: \$(\"#form-delivery-organisation-name\").val(),
\t   \t\t\t\t\tdeliveryCountryCode: \$(\"#form-delivery-country-code\").val(),
\t   \t\t\t\t\tdeliveryAddressLine1: \$(\"#form-delivery-address-line-1\").val(),
\t   \t\t\t\t\tdeliveryAddressLine2: \$(\"#form-delivery-address-line-2\").val(),
\t   \t\t\t\t\tdeliveryTownCity: \$(\"#form-delivery-town-city\").val(),
\t   \t\t\t\t\tdeliveryCountyState: \$(\"#form-delivery-county-state\").val(),
\t   \t\t\t\t\tdeliveryPostZipCode: \$(\"#form-delivery-post-zip-code\").val(),
\t   \t\t\t\t\tsameDeliveryAddress: \$sameDeliveryAddress
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tupdateOrderProcess(data);
\t   \t\t\t\t\tgetOrderInformation();
\t   \t\t\t\t\t\$(\".sidebar-tabs\").tabs({ selected: 4 });
\t   \t\t\t\t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t}
\t \t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 533
        echo "\t\t\$(\".action-submit-payment\").live('click', function() {
\t\t\tvar \$formId = \$(this).attr(\"data-form-id\");
\t\t\tvar submitPaymentValidator = \$(\"#order-notes :input\").validator({
\t\t\t\tposition : 'center right', 
    \t\t\toffset : [26, 7], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (submitPaymentValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 546
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_add_notes"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t\t\t\t\t\t\$(\"#ajax-loading\").show();
\t\t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\trequestedDeliveryDate: \$(\"#form-requested-delivery-date\").val(),
\t   \t\t\t\t\tnotes: \$(\"#form-notes\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\t\$(\"#\"+\$formId).submit();
\t   \t\t\t\t}
\t \t\t\t});
\t \t\t}
\t\t});
\t\t
\t\t";
        // line 565
        echo "\t\t\$(\".action-reset-password\").live('click', function() {
\t\t\tvar forgottenYourPasswordValidator = \$(\"#forgotten-your-password :input\").validator({
    \t\t\tposition : 'center right', 
    \t\t\toffset : [0, -250], 
    \t\t\tmessageClass : 'form-error', 
        \t\tmessage : '<div><span class=\"ui-icon ui-icon-closethick\"></span></div>'
\t\t\t});
\t\t\tif (forgottenYourPasswordValidator.data(\"validator\").checkValidity())
\t\t\t{
\t\t\t\t\$.ajax({
\t   \t\t\t\ttype: \"POST\",
\t   \t\t\t\tdataType: \"json\",
\t   \t\t\t\turl: \"";
        // line 577
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("security_ajax_forgotten_your_password"), "html", null, true);
        echo "\",
\t   \t\t\t\tbeforeSend: function() {
\t   \t\t\t\t\t\$(\"#ajax-loading\").show();
\t   \t\t\t\t\t\$(\"#secure-login-error\").hide();
\t   \t\t\t\t},
\t   \t\t\t\tdata: {
\t   \t\t\t\t\temailAddress: \$(\"#form-forgotten-your-password-email-address\").val()
\t   \t\t\t\t},
\t   \t\t\t\terror: function(data) {
\t   \t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem trying to reset your password. Please try again.');
\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t});
\t   \t\t\t\t\t\$(\"#form-forgotten-your-password-email-address\").focus();
\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t\t\t      \t},
\t   \t\t\t\tsuccess: function(data) {
\t   \t\t\t\t\tif (data.response == 'success')
\t   \t\t\t\t\t{
\t   \t\t\t\t\t\t\$(\"#message-success-text\").html('An email was sent to your registered email address with instructions on how to reset your password.');
\t\t   \t\t\t\t\t\$(\"#message-success\").slideDown(function() {
\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t   \t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t\t} else {
\t   \t\t\t\t\t\t\$(\"#message-error-text\").html(data.message);
\t\t   \t\t\t\t\t\$(\"#message-error\").slideDown(function() {
\t\t   \t\t\t\t\t\tsetTimeout(\"resetMessages()\", 5000);
\t\t   \t\t\t\t\t});
\t\t   \t\t\t\t\t\$(\"#form-forgotten-your-password-email-address\").focus();
\t\t\t\t      \t\t\$(\"#ajax-loading\").hide();
\t   \t\t\t\t\t}
\t   \t\t\t\t}
\t \t\t\t});
\t \t\t}
\t\t});
\t});
\t
\t";
        // line 616
        echo "\tfunction getOrderInformation()
\t{\t\t
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 620
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("checkout_ajax_get_order_information"), "html", null, true);
        echo "\",
\t\t\tbeforeSend: function() {
\t\t\t\t\$(\"#order-information\").hide();
\t\t\t\t\$(\"#order-information-loading\").show();
\t\t\t\t\$(\"#order-information\").html(\"\");
\t\t\t},
\t\t\terror: function(data) {
\t      \t\t\$(\"#order-information\").html('<p>Sorry, there was a problem retrieving the details of your order.</p>');
\t\t\t\t\$(\"#order-information-loading\").hide();
\t\t\t\t\$(\"#order-information\").fadeIn();
\t      \t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#order-information\").html(data);
\t\t\t\t\$(\"#order-information tr\").removeClass(\"even odd\");
\t\t\t\t\$(\"#order-information tr:even\").addClass(\"even\");
\t\t\t\t\$(\"#order-information tr:odd\").addClass(\"odd\");
\t\t\t\t\$(\"#order-information-loading\").hide();
\t\t\t\t\$(\"#order-information\").fadeIn();
\t\t\t\t\$(\"#order-information .button\").each(function () {
\t\t\t        \$(this).button({
\t\t\t        \ticons: {
\t\t\t            \tprimary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-primary'):null, 
\t\t\t                secondary: \$(this).attr('data-icon-primary')?\$(this).attr('data-icon-secondary'):null
\t\t\t            }, 
\t\t\t           \ttext: \$(this).attr('data-icon-only') === 'true'?false:true
\t\t\t    \t});
\t\t\t    \tvar \$dataNotification = \$(this).attr(\"data-notification\");
\t\t\t    \tif ((\$(this).attr(\"data-notification\") != \"\") && (\$(this).attr(\"data-notification\") != undefined))
\t\t\t    \t{
\t\t\t    \t\t\$(this).prepend('<div class=\"button-notification\">'+\$(this).attr(\"data-notification\")+'</div>');
\t\t\t    \t}
\t\t\t    });
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 657
        echo "\tfunction updateOrderProcess(data)
\t{
\t\t\$(\"#current-checkout-step\").val(data.order.checkoutStep);
\t\tif (data.order.checkoutStep == 5)
\t\t{
\t\t\tif (data.order.paymentType == 'SagePay')
\t\t\t{
\t\t\t\t\$(\"#sage-pay-vsp-protocol\").val(data.order.paymentProcess.vspProtocol);
\t\t\t\t\$(\"#sage-pay-vendor\").val(data.order.paymentProcess.vendor);
\t\t\t\t\$(\"#sage-pay-tx-type\").val(data.order.paymentProcess.txType);
\t\t\t\t\$(\"#sage-pay-crypt\").val(data.order.paymentProcess.crypt);
\t\t\t\t\$(\"#payment-type-sagepay\").fadeIn();
\t\t\t} else if (data.order.paymentType == 'Voucher Code') {
\t\t\t\t\$(\"#payment-type-voucher-code\").fadeIn();
\t\t\t} else if (data.order.paymentType == 'Gift Voucher') {
\t\t\t\t\$(\"#payment-type-gift-voucher\").fadeIn();
\t\t\t}
\t\t}
\t\tupdateCheckoutTabs();
\t}
\t
\t";
        // line 679
        echo "\tfunction updateCheckoutTabs()
\t{
\t\tvar \$currentCheckoutStep = parseInt(\$(\"#current-checkout-step\").val());
\t\t\$(\".sidebar-tabs ul li .ui-icon\").hide();
\t\t\$(\".sidebar-tabs ul li\").removeClass(\"ui-status-success\");
\t\tif (\$currentCheckoutStep == 1)
\t\t{
\t\t\t\$(\"#form-checkout-your-email-address-email-address\").focus();
\t\t}
\t\tif (\$currentCheckoutStep > 1)
\t\t{
\t\t\t\$(\"#tab-step-1\").addClass(\"ui-status-success\");
\t\t\t\$(\"#tab-step-1 .ui-icon\").show();
\t\t}
\t\tif (\$currentCheckoutStep > 2)
\t\t{
\t\t\t\$(\"#tab-step-2\").addClass(\"ui-status-success\");
\t\t\t\$(\"#tab-step-2 .ui-icon\").show();
\t\t}
\t\tif (\$currentCheckoutStep > 3)
\t\t{
\t\t\t\$(\"#tab-step-3\").addClass(\"ui-status-success\");
\t\t\t\$(\"#tab-step-3 .ui-icon\").show();
\t\t\t\$(\"#tab-step-4\").addClass(\"ui-status-success\");
\t\t\t\$(\"#tab-step-4 .ui-icon\").show();
\t\t}
\t\t\$(\".sidebar-tabs\").tabs({ selected: (\$currentCheckoutStep - 1) });
\t}
\t
\tfunction copyBillingAddressToDeliveryAddress()
\t{
\t\tresetDeliveryAddress();
\t\t\$(\"#form-delivery-country-code option:selected\").removeAttr(\"selected\");
\t\t\$(\"#form-delivery-country-code option[value='\"+\$(\"#form-billing-country-code\").val()+\"']\").attr(\"selected\", \"selected\");
\t\t\$(\"#uniform-form-delivery-country-code > span\").html(\$(\"#form-delivery-country-code option[value='\"+\$(\"#form-billing-country-code\").val()+\"']\").text());
\t\t\$(\"#form-delivery-first-name\").val(\$(\"#form-billing-first-name\").val());
\t\t\$(\"#form-delivery-last-name\").val(\$(\"#form-billing-last-name\").val());
\t\t\$(\"#form-delivery-organisation-name\").val(\$(\"#form-billing-organisation-name\").val());
\t\t\$(\"#form-delivery-address-line-1\").val(\$(\"#form-billing-address-line-1\").val());
\t\t\$(\"#form-delivery-address-line-2\").val(\$(\"#form-billing-address-line-2\").val());
\t\t\$(\"#form-delivery-town-city\").val(\$(\"#form-billing-town-city\").val());
\t\t\$(\"#form-delivery-county-state\").val(\$(\"#form-billing-county-state\").val());
\t\tif (\$(\"#form-billing-country-code\").val() == 'IE')
\t\t{
\t\t\t\$(\"#delivery-post-zip-code-container\").hide();
\t\t\t\$(\"#form-delivery-post-zip-code\").val('000');
\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").show();
\t\t\t\$(\"#same-address-delivery\").hide();
\t\t} else if (\$(\"#form-billing-country-code\").val() == 'GB') {
\t\t\t\$(\"#form-delivery-post-zip-code\").val(\$(\"#form-billing-post-zip-code\").val());
\t\t\t\$(\"#republic-of-ireland-delivery-address-message\").hide();
\t\t\t\$(\"#delivery-post-zip-code-container\").show();
\t\t\t\$(\"#same-address-delivery\").show();
\t\t}
\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", \"checked\");
\t\t\$(\"#uniform-form-same-delivery-address > span\").addClass(\"checked\");
\t}
\t
\tfunction copyDeliveryAddressToBillingAddress()
\t{
\t\tresetBillingAddress();
\t\t\$(\"#form-billing-country-code option:selected\").removeAttr(\"selected\");
\t\t\$(\"#form-billing-country-code option[value='\"+\$(\"#form-delivery-country-code\").val()+\"']\").attr(\"selected\", \"selected\");
\t\t\$(\"#uniform-form-billing-country-code > span\").html(\$(\"#form-billing-country-code option[value='\"+\$(\"#form-delivery-country-code\").val()+\"']\").text());
\t\t\$(\"#form-billing-first-name\").val(\$(\"#form-delivery-first-name\").val());
\t\t\$(\"#form-billing-last-name\").val(\$(\"#form-delivery-last-name\").val());
\t\t\$(\"#form-billing-organisation-name\").val(\$(\"#form-delivery-organisation-name\").val());
\t\t\$(\"#form-billing-address-line-1\").val(\$(\"#form-delivery-address-line-1\").val());
\t\t\$(\"#form-billing-address-line-2\").val(\$(\"#form-delivery-address-line-2\").val());
\t\t\$(\"#form-billing-town-city\").val(\$(\"#form-delivery-town-city\").val());
\t\t\$(\"#form-billing-county-state\").val(\$(\"#form-delivery-county-state\").val());
\t\tif (\$(\"#form-delivery-country-code\").val() == 'IE')
\t\t{
\t\t\t\$(\"#billing-post-zip-code-container\").hide();
\t\t\t\$(\"#form-billing-post-zip-code\").val('000');
\t\t\t\$(\"#republic-of-ireland-billing-address-message\").show();
\t\t\t\$(\"#same-address-billing\").hide();
\t\t} else if (\$(\"#form-delivery-country-code\").val() == 'GB') {
\t\t\t\$(\"#form-billing-post-zip-code\").val(\$(\"#form-delivery-post-zip-code\").val());
\t\t\t\$(\"#republic-of-ireland-billing-address-message\").hide();
\t\t\t\$(\"#billing-post-zip-code-container\").show();
\t\t\t\$(\"#same-address-billing\").show();
\t\t}
\t\t\$(\"#form-same-billing-address\").attr(\"checked\", \"checked\");
\t\t\$(\"#uniform-form-same-billing-address > span\").addClass(\"checked\");
\t}
\t
\tfunction resetBillingAddress()
\t{
\t\t\$(\"#form-billing-country-code option:selected\").removeAttr(\"selected\");
\t\t\$(\"#form-billing-country-code option:eq(0)\").attr(\"selected\", \"selected\");
\t\t\$(\"#uniform-form-billing-country-code > span\").html(\$(\"#form-billing-country-code option:eq(0)\").text());
\t\t\$(\"#form-billing-first-name\").val(\$(\"#form-first-name\").val());
\t\t\$(\"#form-billing-last-name\").val(\$(\"#form-last-name\").val());
\t\t\$(\"#form-billing-organisation-name\").val(\"\");
\t\t\$(\"#form-billing-address-line-1\").val(\"\");
\t\t\$(\"#form-billing-address-line-2\").val(\"\");
\t\t\$(\"#form-billing-town-city\").val(\"\");
\t\t\$(\"#form-billing-county-state\").val(\"\");
\t\t\$(\"#form-billing-post-zip-code\").val(\"\");
\t\t\$(\"#billing-post-zip-code-container\").show();
\t\t\$(\"#form-same-billing-address\").attr(\"checked\", false);
\t\t\$(\"#uniform-form-same-billing-address > span\").removeClass(\"checked\");
\t\t\$(\"#republic-of-ireland-billing-address-message\").hide();
\t\t\$(\"#same-address-billing\").show();
\t}
\t\t
\tfunction resetDeliveryAddress()
\t{
\t\t\$(\"#form-delivery-country-code option:selected\").removeAttr(\"selected\");
\t\t\$(\"#form-delivery-country-code option:eq(0)\").attr(\"selected\", \"selected\");
\t\t\$(\"#uniform-form-delivery-country-code > span\").html(\$(\"#form-delivery-country-code option:eq(0)\").text());
\t\t\$(\"#form-delivery-first-name\").val(\$(\"#form-first-name\").val());
\t\t\$(\"#form-delivery-last-name\").val(\$(\"#form-last-name\").val());
\t\t\$(\"#form-delivery-organisation-name\").val(\"\");
\t\t\$(\"#form-delivery-address-line-1\").val(\"\");
\t\t\$(\"#form-delivery-address-line-2\").val(\"\");
\t\t\$(\"#form-delivery-town-city\").val(\"\");
\t\t\$(\"#form-delivery-county-state\").val(\"\");
\t\t\$(\"#form-delivery-post-zip-code\").val(\"\");
\t\t\$(\"#delivery-post-zip-code-container\").show();
\t\t\$(\"#form-same-delivery-address\").attr(\"checked\", false);
\t\t\$(\"#uniform-form-same-delivery-address > span\").removeClass(\"checked\");
\t\t\$(\"#republic-of-ireland-delivery-address-message\").hide();
\t\t\$(\"#same-address-delivery\").show();
\t}
\t
</script>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Checkout:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  733 => 657,  694 => 620,  688 => 616,  647 => 577,  633 => 565,  612 => 546,  508 => 450,  590 => 345,  582 => 343,  541 => 315,  537 => 314,  533 => 313,  442 => 254,  530 => 163,  504 => 297,  498 => 147,  492 => 144,  482 => 189,  289 => 243,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 502,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 401,  435 => 250,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 323,  510 => 152,  472 => 167,  456 => 382,  440 => 151,  377 => 125,  313 => 136,  281 => 96,  469 => 403,  426 => 335,  421 => 242,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 298,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 153,  386 => 127,  380 => 227,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 679,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 344,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 389,  431 => 148,  396 => 131,  364 => 157,  348 => 146,  336 => 181,  310 => 192,  304 => 120,  18 => 1,  489 => 433,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 126,  350 => 211,  315 => 112,  312 => 264,  308 => 108,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 533,  595 => 267,  581 => 196,  563 => 254,  522 => 305,  515 => 301,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 168,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 119,  328 => 86,  325 => 117,  316 => 166,  278 => 184,  250 => 68,  163 => 112,  523 => 216,  516 => 154,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 141,  462 => 133,  447 => 256,  438 => 172,  393 => 257,  373 => 140,  370 => 240,  368 => 221,  361 => 217,  342 => 145,  329 => 142,  326 => 118,  319 => 131,  288 => 102,  229 => 88,  206 => 75,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 122,  344 => 127,  219 => 153,  273 => 182,  263 => 107,  246 => 89,  234 => 64,  217 => 69,  173 => 100,  309 => 108,  285 => 186,  280 => 235,  276 => 94,  262 => 92,  235 => 163,  232 => 175,  212 => 149,  207 => 152,  143 => 50,  157 => 97,  366 => 136,  340 => 160,  503 => 223,  488 => 284,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 112,  412 => 184,  409 => 103,  404 => 235,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 130,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 157,  187 => 66,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 60,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 485,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 42,  208 => 92,  183 => 101,  166 => 62,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 143,  375 => 225,  371 => 152,  363 => 135,  359 => 93,  355 => 133,  351 => 131,  347 => 101,  331 => 120,  323 => 145,  307 => 238,  303 => 105,  299 => 103,  295 => 101,  283 => 249,  279 => 75,  275 => 231,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 116,  210 => 82,  180 => 55,  172 => 64,  168 => 44,  149 => 52,  139 => 85,  240 => 99,  230 => 82,  121 => 44,  257 => 195,  249 => 88,  106 => 82,  334 => 120,  294 => 113,  286 => 98,  277 => 113,  255 => 193,  244 => 107,  214 => 83,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 16,  487 => 142,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 145,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 310,  352 => 91,  338 => 124,  333 => 210,  327 => 118,  324 => 289,  320 => 168,  297 => 190,  274 => 96,  256 => 90,  254 => 89,  252 => 170,  231 => 127,  216 => 95,  213 => 58,  202 => 76,  458 => 139,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 246,  414 => 354,  410 => 236,  405 => 134,  391 => 129,  387 => 229,  384 => 146,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 188,  284 => 100,  270 => 122,  266 => 178,  261 => 70,  247 => 191,  243 => 86,  238 => 107,  220 => 79,  201 => 161,  194 => 71,  130 => 46,  100 => 43,  85 => 32,  76 => 33,  112 => 16,  101 => 37,  98 => 36,  272 => 93,  269 => 92,  228 => 81,  221 => 80,  197 => 158,  184 => 124,  138 => 80,  118 => 92,  105 => 23,  66 => 26,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 73,  192 => 120,  189 => 119,  178 => 62,  176 => 110,  165 => 57,  161 => 100,  152 => 88,  148 => 42,  141 => 49,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 59,  54 => 8,  133 => 34,  124 => 42,  111 => 64,  107 => 71,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 30,  88 => 34,  78 => 48,  75 => 17,  71 => 42,  464 => 178,  459 => 260,  454 => 258,  449 => 155,  443 => 152,  429 => 166,  425 => 165,  420 => 143,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 115,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 174,  287 => 77,  282 => 76,  268 => 128,  264 => 112,  259 => 174,  245 => 67,  241 => 164,  236 => 84,  222 => 158,  218 => 85,  159 => 60,  154 => 53,  151 => 57,  145 => 77,  136 => 48,  128 => 83,  125 => 47,  119 => 43,  110 => 40,  96 => 63,  93 => 29,  91 => 17,  68 => 16,  65 => 18,  63 => 37,  43 => 12,  50 => 14,  25 => 8,  92 => 34,  86 => 25,  79 => 30,  46 => 11,  37 => 4,  33 => 9,  27 => 2,  82 => 27,  72 => 28,  64 => 25,  53 => 32,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 3,  23 => 6,  19 => 2,  40 => 10,  20 => 2,  30 => 2,  26 => 5,  22 => 3,  224 => 86,  215 => 173,  211 => 178,  204 => 61,  200 => 75,  195 => 54,  193 => 46,  190 => 92,  188 => 69,  185 => 65,  179 => 141,  177 => 120,  171 => 59,  162 => 56,  158 => 132,  156 => 108,  153 => 116,  146 => 41,  142 => 55,  137 => 86,  131 => 31,  126 => 92,  120 => 44,  117 => 50,  103 => 68,  99 => 23,  77 => 29,  74 => 29,  57 => 24,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 39,  104 => 58,  102 => 17,  94 => 21,  89 => 31,  87 => 45,  84 => 23,  81 => 22,  73 => 28,  70 => 15,  67 => 39,  62 => 14,  59 => 35,  55 => 33,  51 => 7,  48 => 29,  41 => 15,  38 => 4,  35 => 3,  31 => 13,  28 => 2,);
    }
}
