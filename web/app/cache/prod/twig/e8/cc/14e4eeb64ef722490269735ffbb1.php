<?php

/* WebIlluminationAdminBundle:Orders:viewCopyInvoice.html.twig */
class __TwigTemplate_e8cc14e4eeb64ef722490269735ffbb1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::print.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::print.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Ride Direct Invoice: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " (Copy Invoice)";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFFFFF;\" cellpadding=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td valign=\"top\">
\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td width=\"100%\" valign=\"top\" style=\"padding: 20px;\">
\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"300\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\"><img width=\"300\" height=\"50\" alt=\"Ride Direct\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"right\" style=\"line-height: 35px; background: #FFFFFF; font-weight: bold; color: #000000; font-size: 24px; font-family: Arial;\">COPY INVOICE: <span style=\"line-height: 35px; font-weight: normal; color: #444444; font-size: 28px; font-family: Arial;\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"330\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF; padding: 0 20px 0 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Billing Address</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 0 30px; line-height: 120%; background: #FFFFFF; font-weight: normal; color: #000000; text-transform: uppercase; font-size: 12px; font-family: Arial;\">";
        // line 29
        ob_start();
        // line 30
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 31
        if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
            // line 32
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 34
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 35
        if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
            // line 36
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 38
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 39
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
            // line 40
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 42
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
            // line 43
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 45
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            // line 46
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Details</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Number:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 66
        if (($this->getAttribute($this->getContext($context, "order"), "membershipCardNumber") > 0)) {
            // line 67
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Membership Card Number:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 69
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "membershipCardNumber"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 72
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Date Order Placed:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 74
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderDate"), "d/m/Y h:iA"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Payment Type:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "paymentType"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Status:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "status"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Daytime):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "telephoneDaytime"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 88
        if ($this->getAttribute($this->getContext($context, "order"), "telephoneEvening")) {
            // line 89
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Evening):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "telephoneEvening"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 94
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if ($this->getAttribute($this->getContext($context, "order"), "mobile")) {
            // line 95
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Mobile:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "mobile"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 100
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Email Address:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-transform: lowercase; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "emailAddress"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Delivery";
        // line 105
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
            echo " Address";
        }
        echo ":</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 106
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 107
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"text-transform: uppercase; border: 1px solid #CCC; line-height: 120%; background: #CC0000; color: #FFF; font-size: 12px; font-weight: bold; font-family: 'Arial Black', Arial; padding: 5px 10px;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 109
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"text-transform: uppercase; border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            ob_start();
            // line 110
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 111
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 112
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 114
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 115
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 116
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 118
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 119
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 120
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 122
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                // line 123
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 125
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                // line 126
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 128
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 130
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t";
        // line 138
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 139
            echo "\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-weight: bold; font-size: 11px; color: #CC0000; padding: 20px 0 0 0; margin: 0; line-height: 120%;\">PLEASE NOTE: YOU HAVE CHOSEN TO COLLECT YOUR ORDER. WE WILL CONTACT YOU AS SOON AS YOUR ORDER IS READY FOR COLLECTION.</p>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 141
        echo "\t\t\t\t\t\t\t\t\t\t";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
            // line 142
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 143
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 144
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 146
            echo "\t\t\t\t\t\t\t\t\t\t";
        }
        // line 147
        echo "\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order</h3>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"5\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Price</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 154
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 155
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
            // line 156
            ob_start();
            // line 157
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 158
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                // line 159
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 160
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels"));
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
                foreach ($context['_seq'] as $context["_key"] => $context["selectedOptionLabel"]) {
                    // line 161
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (($this->getContext($context, "selectedOptionLabel") != "")) {
                        // line 162
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                        echo $this->getContext($context, "selectedOptionLabel");
                        if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                            echo "<br />";
                        }
                        // line 163
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 164
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['selectedOptionLabel'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 165
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 166
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
            // line 167
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
            // line 168
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
            // line 170
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">=</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
            // line 172
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 175
        echo "\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
            // line 176
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">Ride Direct Privilege Card</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">1</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;1.00</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">=</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;1.00</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 186
        echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 190
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "subTotal"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 194
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 195
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #CC0000; color: #FFFFFF; font-weight: bold; font-size: 11px; font-family: 'Arial Black', Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 197
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCharge") == 0)) {
                // line 198
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #69B334; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">FREE</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 200
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 202
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 203
        echo "\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 204
        if (($this->getAttribute($this->getContext($context, "order"), "discount") > 0)) {
            // line 205
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Discount:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #69B334; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
            // line 207
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "discount"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 210
        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>VAT (20%):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 212
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "vat"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Total Paid (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 216
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 10px 0 0 0;\" align=\"left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #000000; padding: 0 0 5px 0; margin: 0; line-height: 100%;\">Thank you for placing your order with Ride Direct.</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 16px; color: #444444; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong>Ride Direct</strong> Sales Team</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">t:</strong> 01332 365 913</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">e:</strong>  <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"mailto:sales@ridedirect.co.uk\">sales@ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">w:</strong> <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"http://www.ridedirect.co.uk/\">www.ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"right\" valign=\"top\" style=\"padding: 10px 0 0 0;\" width=\"85\"><img width=\"85\" height=\"85\" alt=\"Ride Direct QR Code\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/qr-code.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 10px; color: #98A7B3; padding: 10px 0; margin: 10px 0 0 0; line-height: 100%; border-top: 2px dotted #98A7B3;\">Ride Direct is a trading company of Motobrox Sport Ltd. Incorporated in England and Wales. Company Number: 06453317. VAT Number: 924765989. Registered Office: 119a Nun's Street, Derby, Derbyshire DE1 3LS.</p>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<div style=\"position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 999; background: transparent url(http://www.ridedirect.co.uk/bundles/webilluminationadmin/images/overlay/copy.png) top left repeat;\"></div>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:viewCopyInvoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  523 => 216,  516 => 212,  512 => 210,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 146,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 64,  227 => 47,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 719,  778 => 704,  748 => 675,  721 => 649,  695 => 625,  651 => 584,  630 => 565,  604 => 541,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 300,  219 => 100,  273 => 86,  263 => 83,  246 => 59,  234 => 78,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 103,  276 => 101,  262 => 99,  235 => 106,  232 => 89,  212 => 75,  207 => 44,  143 => 57,  157 => 50,  366 => 278,  340 => 255,  503 => 130,  488 => 200,  475 => 194,  471 => 418,  467 => 114,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 97,  358 => 155,  356 => 94,  353 => 266,  349 => 91,  345 => 147,  306 => 86,  271 => 75,  253 => 112,  233 => 50,  226 => 65,  187 => 66,  150 => 46,  260 => 82,  155 => 123,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 66,  258 => 63,  248 => 73,  242 => 89,  239 => 70,  237 => 107,  174 => 35,  182 => 82,  175 => 78,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 123,  491 => 446,  432 => 390,  203 => 72,  114 => 43,  208 => 58,  183 => 73,  166 => 57,  423 => 218,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 98,  375 => 206,  371 => 205,  363 => 157,  359 => 322,  355 => 201,  351 => 200,  347 => 199,  331 => 88,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 104,  279 => 120,  275 => 175,  265 => 74,  251 => 111,  199 => 41,  191 => 42,  170 => 59,  210 => 47,  180 => 59,  172 => 40,  168 => 74,  149 => 47,  139 => 44,  240 => 191,  230 => 182,  121 => 31,  257 => 222,  249 => 60,  106 => 23,  334 => 31,  294 => 125,  286 => 20,  277 => 119,  255 => 62,  244 => 110,  214 => 76,  198 => 71,  181 => 89,  167 => 38,  160 => 54,  45 => 5,  487 => 345,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 310,  424 => 167,  415 => 216,  392 => 353,  385 => 268,  376 => 261,  367 => 204,  360 => 251,  352 => 246,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 223,  297 => 126,  274 => 188,  256 => 75,  254 => 204,  252 => 61,  231 => 67,  216 => 51,  213 => 97,  202 => 72,  458 => 109,  453 => 97,  448 => 95,  437 => 88,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 365,  391 => 210,  387 => 209,  384 => 62,  322 => 224,  318 => 49,  300 => 28,  296 => 26,  293 => 80,  290 => 79,  284 => 70,  270 => 122,  266 => 116,  261 => 64,  247 => 71,  243 => 80,  238 => 69,  220 => 26,  201 => 43,  194 => 88,  130 => 23,  100 => 22,  85 => 34,  76 => 21,  112 => 35,  101 => 38,  98 => 38,  272 => 118,  269 => 172,  228 => 87,  221 => 77,  197 => 70,  184 => 59,  138 => 34,  118 => 25,  105 => 40,  66 => 21,  56 => 21,  115 => 29,  83 => 27,  164 => 72,  140 => 33,  58 => 17,  21 => 4,  61 => 23,  36 => 3,  209 => 95,  205 => 73,  196 => 89,  192 => 77,  189 => 86,  178 => 63,  176 => 41,  165 => 75,  161 => 53,  152 => 66,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 48,  123 => 46,  109 => 63,  90 => 35,  54 => 8,  133 => 40,  124 => 54,  111 => 42,  107 => 35,  80 => 21,  69 => 17,  60 => 16,  52 => 16,  97 => 39,  95 => 29,  88 => 26,  78 => 24,  75 => 25,  71 => 13,  464 => 123,  459 => 324,  454 => 105,  449 => 85,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 257,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 179,  287 => 178,  282 => 89,  268 => 84,  264 => 115,  259 => 114,  245 => 119,  241 => 109,  236 => 29,  222 => 63,  218 => 61,  159 => 55,  154 => 67,  151 => 50,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 114,  110 => 26,  96 => 35,  93 => 28,  91 => 33,  68 => 29,  65 => 42,  63 => 17,  43 => 13,  50 => 13,  25 => 7,  92 => 36,  86 => 22,  79 => 32,  46 => 13,  37 => 3,  33 => 15,  27 => 2,  82 => 22,  72 => 18,  64 => 18,  53 => 32,  49 => 6,  44 => 15,  42 => 7,  34 => 11,  29 => 6,  23 => 5,  19 => 1,  40 => 4,  20 => 3,  30 => 2,  26 => 8,  22 => 2,  224 => 88,  215 => 45,  211 => 106,  204 => 98,  200 => 91,  195 => 54,  193 => 104,  190 => 76,  188 => 70,  185 => 65,  179 => 48,  177 => 61,  171 => 137,  162 => 36,  158 => 69,  156 => 41,  153 => 54,  146 => 34,  142 => 46,  137 => 43,  131 => 42,  126 => 41,  120 => 45,  117 => 88,  103 => 39,  99 => 19,  77 => 31,  74 => 20,  57 => 16,  47 => 27,  39 => 4,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 37,  122 => 28,  116 => 27,  113 => 46,  108 => 30,  104 => 25,  102 => 61,  94 => 21,  89 => 20,  87 => 38,  84 => 49,  81 => 33,  73 => 21,  70 => 30,  67 => 19,  62 => 11,  59 => 37,  55 => 16,  51 => 15,  48 => 23,  41 => 22,  38 => 4,  35 => 3,  31 => 8,  28 => 11,);
    }
}
