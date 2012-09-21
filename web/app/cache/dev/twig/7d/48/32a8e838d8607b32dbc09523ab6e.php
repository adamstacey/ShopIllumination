<?php

/* WebIlluminationAdminBundle:Orders:listingFilter.html.twig */
class __TwigTemplate_7d4832a8e838d8607b32dbc09523ab6e extends Twig_Template
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
        echo "<div id=\"listing-filter\" class=\"no-padding-bottom listing-filter ui-helper-hidden\">
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-order-number\">Order No:</label></td>
\t\t\t\t<td width=\"14%\"><input type=\"text\" id=\"form-order-number\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"form-customer\">Customer:</label></td>
\t\t\t\t<td width=\"22%\"><input type=\"text\" id=\"form-customer\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"15%\"><label for=\"form-email-address\">Email Address:</label></td>
\t\t\t\t<td width=\"22%\"><input type=\"text\" id=\"form-email-address\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-order-number\">Order Total:</label></td>
\t\t\t\t<td width=\"89%\">
\t\t\t\t\t<p class=\"no-margin price-range ac\" id=\"total-range-amount\"></p>
\t\t\t\t\t<div id=\"total-range\" class=\"price-range-slider\"></div>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"separator\">
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-status\">Order Status:</label></td>
\t\t\t\t<td width=\"21%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Cancelled\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Cancelled</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Open Payment\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Open Payment</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Processing Your Order\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Processing Your Order</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Back Ordered\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Back Ordered</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Part Shipped\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Part Shipped</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Payment Failed\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Payment Failed</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Payment Received\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Payment Received</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-status=\"Refunded\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Refunded</div>
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-status=\"Order Completed\" type=\"checkbox\" class=\"order-status\" value=\"1\" />Order Completed</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-statuses\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-payment-type\">Payment Type:</label></td>
\t\t\t\t<td width=\"22%\">
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"Google Wallet\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />Google Wallet</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"PayPal\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />PayPal</div>
\t\t\t\t\t<div class=\"filter-checkbox\"><input data-payment-type=\"PayPal through SagePay\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />PayPal through SagePay</div>
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-payment-type=\"SagePay\" type=\"checkbox\" class=\"order-payment-type\" value=\"1\" />SagePay</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-payment-types\" value=\"\" />
\t\t\t\t</td>
\t\t\t\t<td class=\"label\" width=\"12%\"><label for=\"form-delivery-type\">Delivery Type:</label></td>
\t\t\t\t<td width=\"21%\">
\t\t\t\t\t<div class=\"filter-checkbox no-margin-bottom\"><input data-delivery-type=\"Standard Delivery\" type=\"checkbox\" class=\"order-delivery-type\" value=\"1\" />Standard Delivery</div>
\t\t\t\t\t<input type=\"hidden\" id=\"form-delivery-types\" value=\"\" />
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div>
\t\t<table width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td class=\"label\" width=\"20%\"><label for=\"form-date-from\">Date From:</label></td>
\t\t\t\t<td width=\"30%\"><input type=\"text\" id=\"form-date-from\" value=\"\" /><input type=\"hidden\" id=\"form-date-from-formatted\" value=\"\" /></td>
\t\t\t\t<td class=\"label\" width=\"20%\"><label for=\"form-date-to\">Date To:</label></td>
\t\t\t\t<td width=\"30%\"><input type=\"text\" id=\"form-date-to\" value=\"\" /><input type=\"hidden\" id=\"form-date-to-formatted\" value=\"\" /></td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<div class=\"ac\">
\t\t<button class=\"button bottom-button ui-button-green action-update-your-results\" data-icon-primary=\"ui-icon-refresh\">Update Your Results</button>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingFilter.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  58 => 6,  50 => 5,  42 => 4,  34 => 3,  26 => 2,  69 => 24,  59 => 17,  55 => 16,  43 => 10,  39 => 9,  35 => 8,  31 => 7,  27 => 6,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
