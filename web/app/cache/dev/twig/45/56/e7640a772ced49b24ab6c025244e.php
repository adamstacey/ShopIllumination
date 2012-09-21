<?php

/* WebIlluminationAdminBundle:Orders:listingToolbar.html.twig */
class __TwigTemplate_4556e7640a772ced49b24ab6c025244e extends Twig_Template
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
        echo "<div class=\"floating-buttons-toolbar\">
\t<div class=\"floating-buttons-container\">
\t\t<div class=\"floating-buttons\">
\t\t\t<div class=\"fl no-margin no-padding\">
\t\t\t\t<input type=\"checkbox\" id=\"form-notify-customer\" value=\"1\" /><label>Update Customers?</label>
\t\t\t</div>
\t\t\t<div class=\"fr no-margin no-padding\">
\t        \t<button class=\"fl button ui-corner-none ui-corner-tl ui-corner-bl ui-button-green action-update-orders\" data-icon-primary=\"ui-icon-check\">Update Orders</button>
\t        \t<button class=\"fl button ui-corner-none ui-button-blue action-print-invoices\" data-icon-primary=\"ui-icon-print\">Print Invoices</button>
\t        \t<button class=\"fl button ui-corner-none ui-button-blue action-print-delivery-notes\" data-icon-primary=\"ui-icon-print\">Print Delivery Notes</button>
\t        \t<button class=\"fl button ui-corner-none ui-button-blue action-print-invoices-and-delivery-notes\" data-icon-primary=\"ui-icon-print\">Print Invoices &amp; Delivery Notes</button>
\t        \t<button class=\"fl button ui-corner-none ui-corner-tr ui-corner-br ui-button-red action-confirm-delete-orders\" data-icon-primary=\"ui-icon-closethick\">Delete Orders</button>
\t        \t<form id=\"load-selected-orders-for-print\" method=\"post\" action=\"/\" target=\"_blank\"></form>
\t        </div>
\t        <div class=\"clear\"></div>
\t\t</div>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:listingToolbar.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  118 => 25,  112 => 24,  106 => 23,  100 => 22,  94 => 21,  83 => 15,  77 => 14,  71 => 13,  53 => 10,  47 => 9,  41 => 8,  29 => 6,  23 => 5,  58 => 6,  50 => 5,  42 => 4,  34 => 3,  26 => 2,  69 => 24,  59 => 11,  55 => 16,  43 => 10,  39 => 9,  35 => 7,  31 => 7,  27 => 6,  21 => 3,  17 => 1,  132 => 56,  127 => 55,  124 => 54,  113 => 46,  111 => 45,  101 => 38,  96 => 35,  93 => 34,  91 => 33,  85 => 30,  65 => 12,  62 => 11,  54 => 8,  51 => 15,  45 => 5,  40 => 4,  37 => 3,  30 => 2,);
    }
}
