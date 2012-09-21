<?php

/* WebIlluminationAdminBundle:Orders:indexScript.js.twig */
class __TwigTemplate_202ee630288528d67eb6d27221b6b2b2 extends Twig_Template
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
\t\$(document).ready(function() {
\t\t";
        // line 9
        echo "\t\t\$(\"#order-document\").dialog({
\t\t\tmodal: true,
\t\t\tautoOpen: false,
\t\t\twidth: 800,
\t\t\tbuttons: {
\t\t\t\tClose: function() {
\t\t\t\t\t\$(\"#order-document > iframe\").attr(\"src\", \"\");
\t\t\t\t\t\$(this).dialog(\"close\");
\t\t\t\t}
\t\t\t}
\t\t});
\t\t
        ";
        // line 22
        echo "        \$(\".action-view-payment-information\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'payment-information', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-payment-information\"));
        });
        
        ";
        // line 27
        echo "        \$(\".action-view-delivery-information\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'delivery-information', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-delivery-information\"));
        });
        
        ";
        // line 32
        echo "        \$(\".action-view-customer\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'customer', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-customer\"));
        });
        
        ";
        // line 37
        echo "        \$(\".action-view-discounts\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'discounts', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-discounts\"));
        });
        
        ";
        // line 42
        echo "        \$(\".action-view-order-items\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \t\$(\"#order-information-details-\"+\$(this).attr(\"data-id\")).hide().html(\"\");
        \t\$(\"#order-information-details-loading-\"+\$(this).attr(\"data-id\")).show();
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'order-items', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-order-items\"));
        \t\$.ajax({
   \t\t\t\ttype: \"GET\",
   \t\t\t\turl: \"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_order_information"), "html", null, true);
        echo "\",
   \t\t\t\tdata: {
   \t\t\t\t\tid: \$id
\t   \t\t\t},
   \t\t\t\terror: function(data) {
   \t\t\t\t\t\$(\"#order-information-details-loading-\"+\$id).hide();
   \t\t\t\t\t\$(\"#order-information-details-\"+\$id).html('<p class=\"ac\">Sorry, no results were found.</p>').fadeIn();
\t\t      \t},
   \t\t\t\tsuccess: function(data) {
   \t\t\t\t\t\$(\"#order-information-details-loading-\"+\$id).hide();
   \t\t\t\t\t\$(\"#order-information-details-\"+\$id).html(data).fadeIn();
   \t\t\t\t}
 \t\t\t});
        });
        
        ";
        // line 65
        echo "        \$(\".action-view-documents\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'documents', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-view-documents\"));
        });
        \$(\".action-print-invoice, .action-print-delivery-note\").live('click', function() {
        \t\$(this).removeClass(\"ui-button-red\").addClass(\"ui-button-green\");
        \tvar \$id = \$(this).attr(\"data-id\");
        \tvar \$orderPrinted = 0;
        \tif (\$(\"#order-documents-\"+\$id+\" .action-print-invoice\").hasClass(\"ui-button-green\"))
        \t{
        \t\t\$orderPrinted = 1;
        \t}
        \tvar \$deliveryNotePrinted = 0;
        \tif (\$(\"#order-documents-\"+\$id+\" .action-print-delivery-note\").hasClass(\"ui-button-green\"))
        \t{
        \t\t\$deliveryNotePrinted = 1;
        \t}
        \tif (\$orderPrinted > 0)
        \t{
        \t\t\$(\"tr#order-\"+\$id+\" .action-view-documents\").removeClass(\"ui-button-yellow\").addClass(\"ui-button-green\");
        \t}
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_update_print_flags"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$id,
\t\t\t\t\torderPrinted: \$orderPrinted,
\t\t\t\t\tdeliveryNotePrinted: \$deliveryNotePrinted
\t\t\t\t}
\t\t\t});
        \t
        });
        \$(\".action-view-delivery-note\").live('click', function() {
\t        \$.mask.close();
        \t\$(\"#order-document\").attr(\"title\", \"Delivery Note: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#ui-dialog-title-order-document\").html(\"Delivery Note: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document > iframe\").attr(\"src\", \"http://www.ridedirect.co.uk/admin/orders/viewDeliveryNote/\"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document\").dialog(\"open\");
        });
        \$(\".action-view-invoice\").live('click', function() {
        \t\$.mask.close();
        \t\$(\"#order-document\").attr(\"title\", \"Invoice: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#ui-dialog-title-order-document\").html(\"Invoice: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document > iframe\").attr(\"src\", \"http://www.ridedirect.co.uk/admin/orders/viewInvoice/\"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document\").dialog(\"open\");
        });
        \$(\".action-view-copy-invoice\").live('click', function() {
        \t\$.mask.close();
        \t\$(\"#order-document\").attr(\"title\", \"Copy Invoice: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#ui-dialog-title-order-document\").html(\"Copy Invoice: \"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document > iframe\").attr(\"src\", \"http://www.ridedirect.co.uk/admin/orders/viewCopyInvoice/\"+\$(this).attr(\"data-id\"));
        \t\$(\"#order-document\").dialog(\"open\");
        });
        \$(\".action-send-invoice\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_send_invoice"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\tid: \$(this).attr(\"data-id\")
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t      \t\t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t});
        });
        
        ";
        // line 137
        echo "        \$(\".action-view-notes\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tloadCustomerNotes(\$id);
        \tloadStaffNotes(\$id);
        \tshowMoreInformation(\$id, 'notes', \$(\"tr#order-\"+\$id+\" button.action-view-notes\"));
        });
        \$(\".action-view-add-customer-note\").live('click', function() {
        \t\$addCustomerNoteObject = \$(\"#add-customer-note-\"+\$(this).attr(\"data-id\"));
        \tif (\$addCustomerNoteObject.is(\":hidden\"))
        \t{
        \t\t\$addCustomerNoteObject.slideDown();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
        \t} else {
        \t\t\$addCustomerNoteObject.slideUp();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
        \t}
        });
        \$(\".action-add-customer-note\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$notified = 0;
        \tvar \$orderId = \$(this).attr(\"data-id\");
        \tif (\$(\"#note-notify-customer-\"+\$orderId).is(\":checked\"))
        \t{
        \t\t\$notified = 1;
        \t}
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 165
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_add_customer_note"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\torderId: \$orderId,
\t    \t\t\tnote: \$(\"#note-customer-note-\"+\$orderId).val(),
\t\t    \t\tnotified: \$notified
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#notes-error-message-text-\"+\$orderId).html('Sorry, there was a problem adding the note. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#notes-error-message-\"+\$orderId).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#notes-error-message-text-\"+\$orderId).html('Sorry, there was a problem adding the note. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#notes-error-message-\"+\$orderId).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\tloadCustomerNotes(\$orderId);
\t\t\t\t\t\tif (\$notified > 0)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$(\"#notes-success-message-text-\"+\$orderId).html('The customer note was successfully added and the customer has been notified.');
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\$(\"#notes-success-message-text-\"+\$orderId).html('The customer note was successfully added.');
\t\t\t\t\t\t}
\t\t\t      \t\t\$(\"#notes-success-message-\"+\$orderId).fadeIn();
\t\t\t      \t\t\$(\"#note-customer-note-\"+\$orderId).val(\"\");
\t\t\t      \t\t\$(\"#note-notify-customer-\"+\$orderId).attr(\"checked\", false);
\t\t\t      \t\t\$(\"#uniform-note-notify-customer-\"+\$orderId+\" span\").removeClass(\"checked\");
\t\t\t      \t\t\$(\"#add-customer-note-\"+\$orderId).slideUp();
\t        \t\t\t\$(\"#order-notes-\"+\$orderId+\" button.action-view-add-customer-note span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        \$(\".action-view-add-staff-note\").live('click', function() {
        \t\$addStaffNoteObject = \$(\"#add-staff-note-\"+\$(this).attr(\"data-id\"));
        \tif (\$addStaffNoteObject.is(\":hidden\"))
        \t{
        \t\t\$addStaffNoteObject.slideDown();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-plusthick\").addClass(\"ui-icon-minusthick\");
        \t} else {
        \t\t\$addStaffNoteObject.slideUp();
        \t\t\$(this).find(\"span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
        \t}
        });
        \$(\".action-add-staff-note\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$notified = 0;
        \tvar \$orderId = \$(this).attr(\"data-id\");
        \t\$.ajax({
\t\t\t\ttype: \"GET\",
\t\t\t\tdataType: \"json\",
\t\t\t\turl: \"";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_add_staff_note"), "html", null, true);
        echo "\",
\t\t\t\tdata: {
\t\t\t\t\torderId: \$orderId,
\t    \t\t\tnote: \$(\"#note-staff-note-\"+\$orderId).val(),
\t\t    \t\tnotified: \$notified
\t\t\t\t},
\t\t\t\terror: function(data) {
\t\t\t\t\t\$(\"#notes-error-message-text-\"+\$orderId).html('Sorry, there was a problem adding the note. Make sure you have filled in all fields and try again.');
\t\t      \t\t\$(\"#notes-error-message-\"+\$orderId).fadeIn();
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t\t\tsuccess: function(data) {
\t\t\t\t\tif (data.response == 'error')
\t\t\t\t\t{
\t\t\t\t\t\t\$(\"#notes-error-message-text-\"+\$orderId).html('Sorry, there was a problem adding the note. Make sure you have filled in all fields and try again.');
\t\t\t      \t\t\$(\"#notes-error-message-\"+\$orderId).fadeIn();
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t} else {
\t\t\t\t\t\tloadStaffNotes(\$orderId);
\t\t\t\t\t\t\$(\"#notes-success-message-text-\"+\$orderId).html('The staff note was successfully added.');
\t\t\t      \t\t\$(\"#notes-success-message-\"+\$orderId).fadeIn();
\t\t\t      \t\t\$(\"#note-staff-note-\"+\$orderId).val(\"\");
\t\t\t      \t\t\$(\"#add-staff-note-\"+\$orderId).slideUp();
\t        \t\t\t\$(\"#order-notes-\"+\$orderId+\" button.action-view-add-staff-note span.ui-icon\").removeClass(\"ui-icon-minusthick\").addClass(\"ui-icon-plusthick\");
\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t}
\t\t\t\t}
\t\t\t});
        });
        \$(\".action-confirm-delete-note\").live('click', function() {
        \tvar \$noteId = \$(this).attr(\"data-note-id\");
        \tvar \$orderId = \$(this).attr(\"data-order-id\");
        \t\$(\"#notes-confirm-delete-button-\"+\$orderId).attr(\"data-note-id\", \$noteId).attr(\"data-order-id\", \$orderId);
        \t\$(\"#notes-cancel-delete-button-\"+\$orderId).attr(\"data-note-id\", \$noteId).attr(\"data-order-id\", \$orderId);
        \t\$(\"tr#more-information-\"+\$orderId+\" .selected\").removeClass(\"selected\");
        \t\$(\"#note-\"+\$noteId).addClass(\"selected\");
        \t\$(\"#notes-confirm-delete-\"+\$orderId).fadeIn();
        \t\$(\"html, body\").animate({scrollTop: \$(\"#notes-confirm-delete-\"+\$orderId).offset().top - 50},'slow');
        });
        \$(\".action-cancel-delete-note\").live('click', function() {
        \tvar \$noteId = \$(this).attr(\"data-note-id\");
        \tvar \$orderId = \$(this).attr(\"data-order-id\");
        \t\$(\"#notes-confirm-delete-button-\"+\$orderId).attr(\"data-note-id\", \"\").attr(\"data-order-id\", \"\");
        \t\$(\"#notes-cancel-delete-button-\"+\$orderId).attr(\"data-note-id\", \"\").attr(\"data-order-id\", \"\");
        \t\$(\"#note-\"+\$noteId).removeClass(\"selected\");
        \t\$(\"#notes-confirm-delete-\"+\$orderId).hide();
        \t\$(\"html, body\").animate({scrollTop: \$(\"tr#order-\"+\$orderId+\" button.action-view-notes\").offset().top - 50},'slow');
        });
        \$(\".action-delete-note\").live('click', function() {
        \t\$(\"#ajax_loading\").show();
        \tvar \$noteId = \$(this).attr(\"data-note-id\");
        \tvar \$orderId = \$(this).attr(\"data-order-id\");
        \t\$(\"#notes-confirm-delete-\"+\$orderId).hide();
        \t\$(\"#notes-confirm-delete-button-\"+\$orderId).attr(\"data-note-id\", \"\").attr(\"data-order-id\", \"\");
        \t\$(\"#notes-cancel-delete-button-\"+\$orderId).attr(\"data-note-id\", \"\").attr(\"data-order-id\", \"\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 275
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_delete_note"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$noteId
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#notes-error-message-text-\"+\$orderId).html('Sorry, there was a problem deleting the note. Please try again.');
\t\t\t      \t\$(\"#notes-error-message-\"+\$orderId).fadeIn();
\t\t\t      \t\$(\"#notes-confirm-delete-\"+\$orderId).hide();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"tr#order-\"+\$orderId+\" button.action-view-notes\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\tloadCustomerNotes(\$orderId);
\t\t      \t\tloadStaffNotes(\$orderId);
\t\t\t\t\t\$(\"#notes-success-message-text-\"+\$orderId).html('The note was successfully deleted.');
\t\t      \t\t\$(\"#notes-success-message-\"+\$orderId).fadeIn();
        \t\t\t\$(\"html, body\").animate({scrollTop: \$(\"tr#order-\"+\$orderId+\" button.action-view-notes\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
        
        ";
        // line 300
        echo "        \$(\".action-confirm-delete-order\").live('click', function() {
        \tshowMoreInformation(\$(this).attr(\"data-id\"), 'confirm-delete', \$(\"tr#order-\"+\$(this).attr(\"data-id\")+\" button.action-confirm-delete-order\"));
        });
        \$(\".action-delete-order\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \t\$(\"#ajax_loading\").show();
        \tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$.ajax({
\t\t    \turl: \"";
        // line 308
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_delete_order"), "html", null, true);
        echo "\",
\t\t      \ttype: \"GET\",
\t\t      \tdataType: \"json\",
\t\t      \tdata: {
\t\t      \t\tid: \$id
\t\t      \t},
\t\t      \terror: function(data) {
\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the order. Please try again.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t},
\t\t      \tsuccess: function(data) {
\t\t      \t\t\$(\"#form-current-page\").val('1');
\t\t      \t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\t\t\$(\"tr.order td\").removeAttr(\"style\");
\t\t\t\t\t\$(\"tr.order button\").removeClass(\"ui-button-blue\");
\t\t\t\t\t\$.mask.close();
\t\t\t\t\tloadResults();
\t\t\t\t\t\$(\"#message-success-text\").html('The order has been successfully deleted.');
\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-success\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t      \t}
\t\t   \t});
        });
         \$(\".action-confirm-delete-orders\").live('click', function() {
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t    \t\t\$(\"#order-confirm-delete-orders\").fadeIn();
\t    \t\t\$(\"html, body\").animate({scrollTop: \$(\"#order-confirm-delete-orders\").offset().top - 50},'slow');
\t    \t}
        });
        \$(\".action-cancel-delete-orders\").live('click', function() {
        \t\$(\"#order-confirm-delete-orders\").fadeOut();
        });
        \$(\".action-delete-orders\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t        \t\$(\"#ajax_loading\").show();
\t        \t\$(\"#order-confirm-delete-orders\").hide();
\t\t\t\tvar \$numberOfOrdersToDelete = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfOrdersDeleted = 0;
\t\t\t\tif (\$numberOfOrdersToDelete > 0)
\t\t\t\t{
\t\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\t\t\$.ajax({
\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\turl: \"";
        // line 358
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_delete_order"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\tid: \$id
\t\t\t\t\t\t\t},
\t\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\t\$numberOfOrdersDeleted = \$numberOfOrdersDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem deleting the selected orders. Please try again.');
\t\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t\t      \tif (\$numberOfOrdersDeleted >= \$numberOfOrdersToDelete)
\t\t\t\t\t\t      \t{
\t\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t\t}
\t\t\t\t      \t\t},
\t\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\t\$numberOfOrdersDeleted = \$numberOfOrdersDeleted + 1;
\t\t\t\t\t\t\t\t\$(\"#message-success-text\").html('The orders were successfully deleted.');
\t\t\t\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t\t\t\t\t\tif (\$numberOfOrdersDeleted >= \$numberOfOrdersToDelete)
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
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any orders to delete.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 399
        echo "        \$(\".action-print-invoices\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\t\$(\"#message-notice .message-text\").html('A PDF of the selected invoices will be generated and opened in a new window. If nothing loads, please make sure your Browser allows pop-ups.');
\t\t\t\t\$(\"#message-notice\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-notice\").offset().top - 50},'slow');
        \t\tvar \$orders = new Array();
\t\t\t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t{
\t\t\t\t\t\t\$orders[\$orders.length] = \$orderId;
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\tif (\$orders.length > 0)
\t\t\t\t{
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 418
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_bulk_print_invoices"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tids: \$orders.join(\",\")
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem generating the invoices. Please try again.');
\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").attr(\"action\", data.invoicesDocument);
\t\t\t\t      \t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t      \t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t      \t\t\t\$(this).attr(\"checked\", false);
\t\t\t\t\t\t\t\t\$(this).parent().removeClass(\"checked\");
\t\t\t\t\t\t\t\t\$(\"tr#order-\"+\$orderId).removeClass(\"selected\")
\t\t\t\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$(\"tr#more-information-\"+\$orderId+\" .action-print-invoice\").removeClass(\"ui-button-red\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \tvar \$orderPrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-invoice\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$orderPrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tvar \$deliveryNotePrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-delivery-note\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$deliveryNotePrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tif ((\$orderPrinted > 0) && (\$deliveryNotePrinted > 0))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$(\"tr#order-\"+\$orderId+\" .action-view-documents\").removeClass(\"ui-button-yellow\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \t\$.ajax({
\t\t\t\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\t\t\t\t\turl: \"";
        // line 458
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_update_print_flags"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\t\t\t\tid: \$orderId,
\t\t\t\t\t\t\t\t\t\t\torderPrinted: \$orderPrinted,
\t\t\t\t\t\t\t\t\t\t\tdeliveryNotePrinted: \$deliveryNotePrinted
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").submit();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t} else {
\t\t\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any orders or the orders you selected are not available for printing due to their current order status.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 482
        echo "        \$(\".action-print-delivery-notes\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\t\$(\"#message-notice .message-text\").html('A PDF of the selected delivery notes will be generated and opened in a new window. If nothing loads, please make sure your Browser allows pop-ups.');
\t\t\t\t\$(\"#message-notice\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-notice\").offset().top - 50},'slow');
        \t\tvar \$orders = new Array();
\t\t\t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t{
\t\t\t\t\t\t\$orders[\$orders.length] = \$orderId;
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\tif (\$orders.length > 0)
\t\t\t\t{
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 501
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_bulk_print_delivery_notes"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tids: \$orders.join(\",\")
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem generating the delivery notes. Please try again.');
\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").attr(\"action\", data.invoicesDocument);
\t\t\t\t      \t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t      \t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t      \t\t\t\$(this).attr(\"checked\", false);
\t\t\t\t\t\t\t\t\$(this).parent().removeClass(\"checked\");
\t\t\t\t\t\t\t\t\$(\"tr#order-\"+\$orderId).removeClass(\"selected\")
\t\t\t\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$(\"tr#more-information-\"+\$orderId+\" .action-print-delivery-note\").removeClass(\"ui-button-red\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \tvar \$orderPrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-invoice\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$orderPrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tvar \$deliveryNotePrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-delivery-note\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$deliveryNotePrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tif ((\$orderPrinted > 0) && (\$deliveryNotePrinted > 0))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$(\"tr#order-\"+\$orderId+\" .action-view-documents\").removeClass(\"ui-button-yellow\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \t\$.ajax({
\t\t\t\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\t\t\t\t\turl: \"";
        // line 541
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_update_print_flags"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\t\t\t\tid: \$orderId,
\t\t\t\t\t\t\t\t\t\t\torderPrinted: \$orderPrinted,
\t\t\t\t\t\t\t\t\t\t\tdeliveryNotePrinted: \$deliveryNotePrinted
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").submit();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t} else {
\t\t\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any orders or the orders you selected are not available for printing due to their current order status.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
        
        ";
        // line 565
        echo "        \$(\".action-print-invoices-and-delivery-notes\").live('click', function() {
        \t\$(\"#flash_messages .message\").hide();
        \tif (\$(\".action-select:checked\").length > 0)
\t\t\t{
\t\t\t\t\$(\"#ajax_loading\").show();
\t\t\t\t\$(\"#message-notice .message-text\").html('A PDF of the selected invoices and delivery notes will be generated and opened in a new window. If nothing loads, please make sure your Browser allows pop-ups.');
\t\t\t\t\$(\"#message-notice\").fadeIn();
\t\t\t\t\$(\"html, body\").animate({scrollTop: \$(\"#message-notice\").offset().top - 50},'slow');
        \t\tvar \$orders = new Array();
\t\t\t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t{
\t\t\t\t\t\t\$orders[\$orders.length] = \$orderId;
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\tif (\$orders.length > 0)
\t\t\t\t{
\t\t\t\t\t\$.ajax({
\t\t\t\t    \turl: \"";
        // line 584
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_bulk_print_invoices_and_delivery_notes"), "html", null, true);
        echo "\",
\t\t\t\t      \ttype: \"GET\",
\t\t\t\t      \tdataType: \"json\",
\t\t\t\t      \tdata: {
\t\t\t\t      \t\tids: \$orders.join(\",\")
\t\t\t\t      \t},
\t\t\t\t      \terror: function(data) {
\t\t\t\t      \t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t      \t\t\$(\"#message-error-text\").html('Sorry, there was a problem generating the invocies and delivery notes. Please try again.');
\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t},
\t\t\t\t      \tsuccess: function(data) {
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").attr(\"action\", data.invoicesDocument);
\t\t\t\t      \t\t\$(\".action-select:checked\").each(function(index) {
\t\t\t\t      \t\t\tvar \$orderId = \$(this).attr(\"data-id\");
\t\t\t\t      \t\t\t\$(this).attr(\"checked\", false);
\t\t\t\t\t\t\t\t\$(this).parent().removeClass(\"checked\");
\t\t\t\t\t\t\t\t\$(\"tr#order-\"+\$orderId).removeClass(\"selected\")
\t\t\t\t\t\t\t\tif (\$(\"tr#order-\"+\$orderId).hasClass(\"green\") || \$(\"tr#order-\"+\$orderId).hasClass(\"amber\"))
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$(\"tr#more-information-\"+\$orderId+\" .action-print-invoice\").removeClass(\"ui-button-red\").addClass(\"ui-button-green\");
\t\t\t\t\t\t\t\t\t\$(\"tr#more-information-\"+\$orderId+\" .action-print-delivery-note\").removeClass(\"ui-button-red\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \tvar \$orderPrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-invoice\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$orderPrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tvar \$deliveryNotePrinted = 0;
\t\t\t\t\t\t        \tif (\$(\"#order-documents-\"+\$orderId+\" .action-print-delivery-note\").hasClass(\"ui-button-green\"))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$deliveryNotePrinted = 1;
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \tif ((\$orderPrinted > 0) && (\$deliveryNotePrinted > 0))
\t\t\t\t\t\t        \t{
\t\t\t\t\t\t        \t\t\$(\"tr#order-\"+\$orderId+\" .action-view-documents\").removeClass(\"ui-button-yellow\").addClass(\"ui-button-green\");
\t\t\t\t\t\t        \t}
\t\t\t\t\t\t        \t\$.ajax({
\t\t\t\t\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\t\t\t\t\tdataType: \"json\",
\t\t\t\t\t\t\t\t\t\turl: \"";
        // line 625
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_update_print_flags"), "html", null, true);
        echo "\",
\t\t\t\t\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\t\t\t\t\tid: \$orderId,
\t\t\t\t\t\t\t\t\t\t\torderPrinted: \$orderPrinted,
\t\t\t\t\t\t\t\t\t\t\tdeliveryNotePrinted: \$deliveryNotePrinted
\t\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t});
\t\t\t\t      \t\t\$(\"#ajax_loading\").hide();
\t\t\t\t      \t\t\$(\"#load-selected-orders-for-print\").submit();
\t\t\t\t      \t}
\t\t\t\t   \t});
\t\t\t\t} else {
\t\t\t\t\t\$(\"#flash_messages .message\").hide();
\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, you did not select any orders or the orders you selected are not available for printing due to their current order status.');
\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t      \t\$(\"html, body\").animate({scrollTop: \$(\"#message-error\").offset().top - 50},'slow');
\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t}
\t\t\t}
        });
    
\t\t";
        // line 649
        echo "\t\t\$(\".order-status\").live('click', function() {
\t\t\tvar \$statuses = new Array();
\t\t\t\$(\".order-status:checked\").each(function(index) {
\t\t\t\t\$statuses[\$statuses.length] = \$(this).attr(\"data-status\");
\t\t\t});
\t\t\t\$(\"#form-statuses\").val(\$statuses.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t\$(\".order-payment-type\").live('click', function() {
\t\t\tvar \$paymentTypes = new Array();
\t\t\t\$(\".order-payment-type:checked\").each(function(index) {
\t\t\t\t\$paymentTypes[\$paymentTypes.length] = \$(this).attr(\"data-payment-type\");
\t\t\t});
\t\t\t\$(\"#form-payment-types\").val(\$paymentTypes.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t\$(\".order-delivery-type\").live('click', function() {
\t\t\tvar \$deliveryTypes = new Array();
\t\t\t\$(\".order-delivery-type:checked\").each(function(index) {
\t\t\t\t\$deliveryTypes[\$deliveryTypes.length] = \$(this).attr(\"data-delivery-type\");
\t\t\t});
\t\t\t\$(\"#form-delivery-types\").val(\$deliveryTypes.join(\"|\"));
\t\t\tloadResults();
\t\t});
\t\t
\t\t";
        // line 675
        echo "\t\t\$(\".action-select-all\").live('click', function() {
\t\t\tif (\$(\".action-select-all\").is(\":checked\"))
\t\t\t{
\t\t\t\t\$(\".action-select\").attr(\"checked\", \"checked\");
\t\t\t\t\$(\".action-select\").parent().addClass(\"checked\");
\t\t\t\t\$(\"tr.order\").addClass(\"selected\");
\t\t\t} else {
\t\t\t\t\$(\".action-select\").attr(\"checked\", false);
\t\t\t\t\$(\".action-select\").parent().removeClass(\"checked\");
\t\t\t\t\$(\"tr.order\").removeClass(\"selected\");
\t\t\t}
\t\t});
        \$(\".action-select\").live('click', function() {
        \tvar \$id = \$(this).attr(\"data-id\");
        \tif (\$(this).is(\":checked\"))
        \t{
        \t\t\$(\"#order-\"+\$id).addClass(\"selected\");
        \t} else {
        \t\t\$(\"#order-\"+\$id).removeClass(\"selected\");
        \t}
        });
\t\t\$(\".action-order-status\").live('change', function() {
\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\$(\"#order-id-\"+\$id).attr(\"checked\", \"checked\");
\t\t\t\$(\"#order-id-\"+\$id).parent().addClass(\"checked\");
\t\t\t\$(\"tr#order-\"+\$id).addClass(\"selected\");
\t\t});
\t\t
\t\t";
        // line 704
        echo "\t\t\$(\".action-update-orders\").live('click', function() {
\t\t\tif (\$(\".action-select:checked\").length > 0)
\t\t\t{\t
\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\tvar \$numberOfOrdersToUpdate = \$(\".action-select:checked\").length;
\t\t\t\tvar \$numberOfOrdersUpdated = 0;
\t\t\t\t\$(\".action-select:checked\").each(function() {
\t\t\t\t\tvar \$id = \$(this).attr(\"data-id\");
\t\t\t\t\tvar \$notifyCustomer = 0;
\t\t\t\t\tif (\$(\"#form-notify-customer\").is(\":checked\"))
\t\t\t\t\t{
\t\t\t\t\t\t\$notifyCustomer = 1;
\t\t\t\t\t}
\t\t\t\t\t\$.ajax({
\t\t\t\t\t\ttype: \"GET\",
\t\t\t\t\t\turl: \"";
        // line 719
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_update_order_status"), "html", null, true);
        echo "\",
\t\t\t\t\t\tdata: {
\t\t\t\t\t\t\tid: \$id,
\t\t\t\t\t\t\torderStatus: \$(\"#form-order-status-\"+\$id).val(),
\t\t\t\t\t\t\tnotifyCustomer: \$notifyCustomer
\t\t\t\t\t\t},
\t\t\t\t\t\terror: function(data) {
\t\t\t\t\t\t\t\$numberOfOrdersUpdated = \$numberOfOrdersUpdated + 1;
\t\t\t\t\t\t\t\$(\"#message-error-text\").html('Sorry, there was a problem updating the orders. Please try again.');
\t\t\t\t\t      \t\$(\"#message-error\").fadeIn();
\t\t\t\t\t      \tif (\$numberOfOrdersUpdated >= \$numberOfOrdersToUpdate)
\t\t\t\t\t      \t{
\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t}
\t\t\t      \t\t},
\t\t\t\t\t\tsuccess: function(data) {
\t\t\t\t\t\t\t\$numberOfOrdersUpdated = \$numberOfOrdersUpdated + 1;
\t\t\t\t\t\t\t\$(\"#message-success-text\").html('The orders were successfully updated.');
\t\t\t\t\t      \t\$(\"#message-success\").fadeIn();
\t\t\t\t\t\t\tif (\$numberOfOrdersUpdated >= \$numberOfOrdersToUpdate)
\t\t\t\t\t      \t{
\t\t\t\t\t      \t\t\$(\"html, body\").animate({scrollTop: \$(\"#flash_messages\").offset().top - 50},'slow');
\t\t\t\t\t\t\t\t\$(\"#ajax_loading\").hide();
\t\t\t\t\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\t\t\t\t\tloadResults();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t});
\t\t\t\t});
\t\t\t}
\t\t});
\t\t
\t\t";
        // line 755
        echo "\t\t\$(\".action-close-more-information\").live('click', function() {
\t\t\t\$(\".more-information, .more-information-detail\").hide();
\t\t\t\$(\"tr.order td\").removeAttr(\"style\");
\t\t\t\$(\"tr.order button\").removeClass(\"ui-button-blue\");
\t\t\t\$.mask.close();
\t\t});
\t\t
\t\t";
        // line 763
        echo "\t\t\$(\"#form-date-from\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-date-from-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#form-date-to\").datepicker({
\t\t\tchangeMonth: true,
\t\t\tchangeYear: true,
\t\t\tdateFormat: \"dd/mm/yy\",
\t\t\taltField: \"#form-date-to-formatted\",
\t\t\taltFormat: \"yy-mm-dd\",
\t\t\tonSelect: function(dateText, inst) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t
\t\t";
        // line 787
        echo "\t\t\$(\"#total-range\").slider({
\t\t\trange: true,
\t\t\tmin: 0,
\t\t\tmax: 10000,
\t\t\tvalues: [0, 10000],
\t\t\tslide: function(event, ui) {
\t\t\t\t\$(\"#total-range-amount\").html(\"&pound;\"+ui.values[0]+\" - &pound;\"+ui.values[1]);
\t\t\t},
\t\t\tchange: function(event, ui) {
\t\t\t\t\$(\"#form-current-page\").val('1');
\t\t\t\tloadResults();
\t\t\t}
\t\t});
\t\t\$(\"#total-range-amount\").html(\"&pound;\"+\$(\"#total-range\").slider(\"values\", 0)+\" - &pound;\"+\$(\"#total-range\").slider(\"values\", 1));
\t\t
\t\t";
        // line 803
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
        // line 815
        echo "\t\t\$(\".action-update-your-results\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val('1');
\t\t\tloadResults();
\t\t});
\t\t\$(\"#form-order-number, #form-customer, #form-email-address, #form-status, #form-payment-type, #form-delivery-type, #form-date-from-formatted, #form-date-to-formatted\").live('change', function() {
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
        // line 833
        echo "\t\t\$(\".page, .page-navigation\").live('click', function() {
\t\t\t\$(\"#form-current-page\").val(\$(this).attr(\"data-page\"));
\t\t\tloadResults();
\t\t});
\t});
\t
\t";
        // line 840
        echo "\tfunction loadCustomerNotes(\$id)
\t{
\t\t\$(\"#customer-notes-\"+\$id).hide().html(\"\");
    \t\$(\"#customer-notes-loading-\"+\$id).show();
    \t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 846
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_customer_notes"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tid: \$id
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#customer-notes-loading-\"+\$id).hide();
\t\t\t\t\$(\"#customer-notes-\"+\$id).html('<p class=\"ac\">There are no customer notes for this order.</p>').fadeIn();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#customer-notes-loading-\"+\$id).hide();
\t\t\t\t\$(\"#customer-notes-\"+\$id).html(data).fadeIn();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 862
        echo "\tfunction loadStaffNotes(\$id)
\t{
\t\t\$(\"#staff-notes-\"+\$id).hide().html(\"\");
    \t\$(\"#staff-notes-loading-\"+\$id).show();
    \t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 868
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_staff_notes"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\tid: \$id
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#staff-notes-loading-\"+\$id).hide();
\t\t\t\t\$(\"#staff-notes-\"+\$id).html('<p class=\"ac\">There are no staff notes for this order.</p>').fadeIn();
      \t\t},
\t\t\tsuccess: function(data) {
\t\t\t\t\$(\"#staff-notes-loading-\"+\$id).hide();
\t\t\t\t\$(\"#staff-notes-\"+\$id).html(data).fadeIn();
\t\t\t}
\t\t});
\t}
\t\t
\t";
        // line 884
        echo "\tfunction showMoreInformation(\$id, \$moreInformation, \$button)
\t{
\t\t\$(\".form-error\").hide();
    \t\$(\"tr#order-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
    \tif (\$(\"#order-\"+\$moreInformation+\"-\"+\$id).is(\":hidden\"))
    \t{
    \t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").hide();
    \t\t\$(\"#more-information-\"+\$id).show();
    \t\t\$(\"#order-\"+\$moreInformation+\"-\"+\$id).fadeIn();
    \t\t\$(\"#more-information-\"+\$id+\" td, #order-\"+\$id+\" td\").expose({
    \t\t\tcolor: \"#042F4F\",
    \t\t\tloadSpeed: 2000,
    \t\t\topacity: \"0.6\",
    \t\t\tonClose: function() {
    \t\t\t\t\$(\".form-error\").hide();
    \t\t\t\t\$(\".more-information, .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"#more-information-\"+\$id).fadeOut();
    \t\t\t\t\$(\"#order-\"+\$id+\" td\").removeAttr(\"style\");
    \t\t\t\t\$(\"#more-information-\"+\$id+\" .more-information-detail\").fadeOut();
    \t\t\t\t\$(\"tr#order-\"+\$id+\" button\").removeClass(\"ui-button-blue\");
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
        // line 919
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
        // line 931
        echo "\tfunction checkResultsLoaded()
\t{
\t\tif (\$listingCountLoaded && \$listingLoaded && \$listingPaginationLoaded)
\t\t{
\t\t\t\$(\"#ajax_loading\").hide();
\t\t}
\t}
\t
\t";
        // line 940
        echo "\tfunction loadListingCount()
\t{
\t\t\$(\"#listing-count\").html('<img src=\"";
        // line 942
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/webilluminationadmin/images/loaders/ajax-bars-loader.gif"), "html", null, true);
        echo "\" border=\"0\" alt=\"Loading\" /> Loading&hellip;');
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\tdataType: \"json\",
\t\t\turl: \"";
        // line 946
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_listing_count"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\torderId: \$(\"#form-order-number\").val(),
    \t\t\tcustomer: \$(\"#form-customer\").val(),
\t    \t\temailAddress: \$(\"#form-email-address\").val(),
    \t\t\tstatus: \$(\"#form-statuses\").val(),
    \t\t\tpaymentType: \$(\"#form-payment-types\").val(),
    \t\t\tdeliveryType: \$(\"#form-delivery-types\").val(),
\t    \t\ttotalFrom: \$(\"#total-range\").slider(\"values\", 0),
    \t\t\ttotalTo: \$(\"#total-range\").slider(\"values\", 1),
    \t\t\tdateFrom: \$(\"#form-date-from-formatted\").val(),
    \t\t\tdateTo: \$(\"#form-date-to-formatted\").val()
\t\t\t},
\t\t\terror: function(data) {
\t\t\t\t\$(\"#listing-count\").html('No Orders Found');
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
    \t    \t\t\t\t\$(\"#listing-count\").html('No Orders Found');
        \t\t\t\t} else {
\t        \t\t\t\t\$(\"#listing-count\").html('Found '+\$listingCount+' Orders | Total: &pound;'+data.listingStatistics.total+' | Average Order Value: &pound;'+data.listingStatistics.averageOrderValue);
\t        \t\t\t}
\t        \t\t} else {
    \t    \t\t\t\$(\"#listing-count\").html('Found 1 Order | Total: &pound;'+data.listingStatistics.total+' | Average Order Value: &pound;'+data.listingStatistics.averageOrderValue);
        \t\t\t}\t
\t        \t} else {
    \t    \t\t\$(\"#listing-count\").html('No Orders Found');
        \t\t}
        \t\t\$listingCountLoaded = true;
\t        \tcheckResultsLoaded();
\t\t\t}
\t\t});
\t}
\t
\t";
        // line 989
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
        // line 999
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_listing"), "html", null, true);
        echo "\",
\t\t\tdata: {
\t\t\t\torderId: \$(\"#form-order-number\").val(),
\t    \t\tcustomer: \$(\"#form-customer\").val(),
\t    \t\temailAddress: \$(\"#form-email-address\").val(),
\t    \t\tstatus: \$(\"#form-statuses\").val(),
\t    \t\tpaymentType: \$(\"#form-payment-types\").val(),
\t    \t\tdeliveryType: \$(\"#form-delivery-types\").val(),
\t    \t\ttotalFrom: \$(\"#total-range\").slider(\"values\", 0),
\t    \t\ttotalTo: \$(\"#total-range\").slider(\"values\", 1),
\t    \t\tdateFrom: \$(\"#form-date-from-formatted\").val(),
\t    \t\tdateTo: \$(\"#form-date-to-formatted\").val(),
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
        // line 1031
        echo "\tfunction loadListingPagination()
\t{
\t\t\$(\"#listing-pagination-top, #listing-pagination-bottom\").hide().html(\"\");
\t\t\$.ajax({
\t\t\ttype: \"GET\",
\t\t\turl: \"";
        // line 1036
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("orders_ajax_get_listing_pagination"), "html", null, true);
        echo "\",
\t\t\tdata: {
   \t\t\t\torderId: \$(\"#form-order-number\").val(),
\t    \t\tcustomer: \$(\"#form-customer\").val(),
\t    \t\temailAddress: \$(\"#form-email-address\").val(),
\t    \t\tstatus: \$(\"#form-statuses\").val(),
\t    \t\tpaymentType: \$(\"#form-payment-types\").val(),
\t    \t\tdeliveryType: \$(\"#form-delivery-types\").val(),
\t    \t\ttotalFrom: \$(\"#total-range\").slider(\"values\", 0),
\t    \t\ttotalTo: \$(\"#total-range\").slider(\"values\", 1),
\t    \t\tdateFrom: \$(\"#form-date-from-formatted\").val(),
\t    \t\tdateTo: \$(\"#form-date-to-formatted\").val(),
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
        return "WebIlluminationAdminBundle:Orders:indexScript.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 719,  778 => 704,  748 => 675,  721 => 649,  695 => 625,  651 => 584,  630 => 565,  604 => 541,  561 => 501,  540 => 482,  514 => 458,  471 => 418,  450 => 399,  407 => 358,  354 => 308,  344 => 300,  317 => 275,  258 => 219,  201 => 165,  171 => 137,  155 => 123,  117 => 88,  92 => 65,  74 => 49,  20 => 3,  118 => 25,  112 => 24,  106 => 23,  100 => 22,  94 => 21,  83 => 15,  77 => 14,  71 => 13,  53 => 32,  47 => 27,  41 => 22,  29 => 6,  23 => 5,  58 => 6,  50 => 5,  42 => 4,  34 => 3,  26 => 2,  69 => 24,  59 => 37,  55 => 16,  43 => 10,  39 => 9,  35 => 7,  31 => 7,  27 => 9,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 42,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
