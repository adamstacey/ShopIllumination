<?php

/* WebIlluminationAdminBundle:Orders:viewInvoicesAndDeliveryNotes.html.twig */
class __TwigTemplate_3b87a285228604b943394bd1dae069e6 extends Twig_Template
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
        echo "Ride Direct Invoices and Delivery Notes";
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "orders"));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 5
            echo "\t\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFFFFF;\" cellpadding=\"0\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td valign=\"top\">
\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td width=\"100%\" valign=\"top\" style=\"padding: 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"300\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\"><img width=\"300\" height=\"50\" alt=\"Ride Direct\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"right\" style=\"line-height: 35px; background: #FFFFFF; font-weight: bold; color: #000000; font-size: 24px; font-family: Arial;\">INVOICE: <span style=\"line-height: 35px; font-weight: normal; color: #444444; font-size: 28px; font-family: Arial;\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
            echo "</span></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"330\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF; padding: 0 20px 0 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Billing Address</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 0 30px; line-height: 120%; background: #FFFFFF; font-weight: normal; color: #000000; text-transform: uppercase; font-size: 12px; font-family: Arial;\">";
            // line 30
            ob_start();
            // line 31
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 32
            if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
                // line 33
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 35
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 36
            if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
                // line 37
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 40
            if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
                // line 41
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
                // line 44
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 46
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
                // line 47
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 49
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Details</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Number:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 67
            if (($this->getAttribute($this->getContext($context, "order"), "membershipCardNumber") > 0)) {
                // line 68
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Membership Card Number:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "membershipCardNumber"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 73
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Date Order Placed:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 75
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderDate"), "d/m/Y h:iA"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Payment Type:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "paymentType"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Status:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "status"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Daytime):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "telephoneDaytime"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 89
            if ($this->getAttribute($this->getContext($context, "order"), "telephoneEvening")) {
                // line 90
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Evening):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "telephoneEvening"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 95
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if ($this->getAttribute($this->getContext($context, "order"), "mobile")) {
                // line 96
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Mobile:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "mobile"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 101
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Email Address:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-transform: lowercase; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "emailAddress"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"100\" valign=\"top\" align=\"left\" style=\"white-space: nowrap; border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Delivery";
            // line 106
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
                echo " Address";
            }
            echo ":</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 107
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                // line 108
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"text-transform: uppercase; border: 1px solid #CCC; line-height: 120%; background: #CC0000; color: #FFF; font-size: 12px; font-weight: bold; font-family: 'Arial Black', Arial; padding: 5px 10px;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 110
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"text-transform: uppercase; border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
                ob_start();
                // line 111
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 112
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                    // line 113
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 115
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 116
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                    // line 117
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 119
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 120
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                    // line 121
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 123
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 126
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                    // line 127
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 129
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 131
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 139
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                // line 140
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-weight: bold; font-size: 11px; color: #CC0000; padding: 20px 0 0 0; margin: 0; line-height: 120%;\">PLEASE NOTE: YOU HAVE CHOSEN TO COLLECT YOUR ORDER. WE WILL CONTACT YOU AS SOON AS YOUR ORDER IS READY FOR COLLECTION.</p>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 142
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
                // line 143
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 144
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
                foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                    // line 145
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                    echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 147
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 148
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order</h3>
\t\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"5\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Price</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 155
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 156
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
                // line 157
                ob_start();
                // line 158
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 159
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                    // line 160
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 161
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
                        // line 162
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getContext($context, "selectedOptionLabel") != "")) {
                            // line 163
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                            echo $this->getContext($context, "selectedOptionLabel");
                            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                                echo "<br />";
                            }
                            // line 164
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 165
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                    // line 166
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 167
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 169
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
                // line 171
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">=</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
                // line 173
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 176
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
                // line 177
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">Ride Direct Privilege Card</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">1</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;1.00</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">=</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;1.00</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 187
            echo "\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
            // line 191
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "subTotal"), 2), "html", null, true);
            echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 195
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                // line 196
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #CC0000; color: #FFFFFF; font-weight: bold; font-size: 11px; font-family: 'Arial Black', Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 198
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCharge") == 0)) {
                    // line 199
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #69B334; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">FREE</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 201
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 203
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 204
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 205
            if (($this->getAttribute($this->getContext($context, "order"), "discount") > 0)) {
                // line 206
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Discount:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #69B334; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
                // line 208
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "discount"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 211
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>VAT (20%):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
            // line 213
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "vat"), 2), "html", null, true);
            echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Total Paid (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
            // line 217
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "html", null, true);
            echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 10px 0 0 0;\" align=\"left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #000000; padding: 0 0 5px 0; margin: 0; line-height: 100%;\">Thank you for placing your order with Ride Direct.</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 16px; color: #444444; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong>Ride Direct</strong> Sales Team</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">t:</strong> 01332 365 913</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">e:</strong>  <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"mailto:sales@ridedirect.co.uk\">sales@ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">w:</strong> <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"http://www.ridedirect.co.uk/\">www.ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"right\" valign=\"top\" style=\"padding: 10px 0 0 0;\" width=\"85\"><img width=\"85\" height=\"85\" alt=\"Ride Direct QR Code\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/qr-code.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 10px; color: #98A7B3; padding: 10px 0; margin: 10px 0 0 0; line-height: 100%; border-top: 2px dotted #98A7B3;\">Ride Direct is a trading company of Motobrox Sport Ltd. Incorporated in England and Wales. Company Number: 06453317. VAT Number: 924765989. Registered Office: 119a Nun's Street, Derby, Derbyshire DE1 3LS.</p>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t\t<div style=\"page-break-before: always;\"></div>
\t\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #FFFFFF;\" cellpadding=\"0\" width=\"100%\">
\t\t\t<tr>
\t\t\t\t<td valign=\"top\">
\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\">
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t\t<table width=\"100%\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td width=\"100%\" valign=\"top\" style=\"padding: 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"300\" valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\"><img width=\"300\" height=\"50\" alt=\"Ride Direct\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/ride-direct-email-logo.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"right\" style=\"line-height: 35px; background: #FFFFFF; font-weight: bold; color: #000000; font-size: 24px; font-family: Arial;\">";
            // line 255
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                echo "COLLECTION";
            } else {
                echo "DELIVERY";
            }
            echo " NOTE: <span style=\"line-height: 35px; font-weight: normal; color: #444444; font-size: 28px; font-family: Arial;\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
            echo "</span></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF; padding: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" style=\"border-collapse: collapse;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"background: #FFFFFF;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">";
            // line 264
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                echo "Collection";
            } else {
                echo "Delivery";
            }
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
                echo " Address";
            }
            echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 268
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
                // line 269
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: bold; color: #CC0000; text-transform: uppercase; font-size: 18px; font-family: 'Arial Black', Arial;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 271
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"padding: 50px 0 60px 30px; line-height: 120%; background: #FFFFFF; font-weight: normal; color: #000000; text-transform: uppercase; font-size: 12px; font-family: Arial;\">";
                ob_start();
                // line 272
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 273
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                    // line 274
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 276
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 277
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                    // line 278
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 280
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 281
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                    // line 282
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 284
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                    // line 285
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                    echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 287
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                    // line 288
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 290
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 292
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 297
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
                // line 298
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 299
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
                foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                    // line 300
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                    echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 302
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 303
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order</h3>
\t\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"2\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Quantity</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 310
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 311
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
                // line 312
                ob_start();
                // line 313
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
                echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 314
                if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                    // line 315
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 316
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
                        // line 317
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if (($this->getContext($context, "selectedOptionLabel") != "")) {
                            // line 318
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                            echo $this->getContext($context, "selectedOptionLabel");
                            if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                                echo "<br />";
                            }
                            // line 319
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 320
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
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
                    // line 321
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 322
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 323
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
                // line 325
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 328
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "membershipCardPurchased") > 0)) {
                // line 329
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">Ride Direct Privilege Card</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\"><strong>PRIVILEGE</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">1</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 336
            echo "\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 10px 0 0 0;\" align=\"left\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #000000; padding: 0 0 5px 0; margin: 0; line-height: 100%;\">Thank you for placing your order with Ride Direct.</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 16px; color: #444444; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong>Ride Direct</strong> Sales Team</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">t:</strong> 01332 365 913</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0 0 5px 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">e:</strong>  <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"mailto:sales@ridedirect.co.uk\">sales@ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 12px; color: #5FA729; padding: 0; margin: 0; line-height: 100%;\"><strong style=\"color: #5FA729\">w:</strong> <a style=\"font-family: Arial; font-size: 12px; color: #5FA729;\" href=\"http://www.ridedirect.co.uk/\">www.ridedirect.co.uk</a></p>
\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=\"right\" valign=\"top\" style=\"padding: 10px 0 0 0;\" width=\"85\"><img width=\"85\" height=\"85\" alt=\"Ride Direct QR Code\" border=\"0\" src=\"http://www.ridedirect.co.uk/bundles/webilluminationshop/images/logos/qr-code.gif\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 10px; color: #98A7B3; padding: 10px 0; margin: 10px 0 0 0; line-height: 100%; border-top: 2px dotted #98A7B3;\">Ride Direct is a trading company of Motobrox Sport Ltd. Incorporated in England and Wales. Company Number: 06453317. VAT Number: 924765989. Registered Office: 119a Nun's Street, Derby, Derbyshire DE1 3LS.</p>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</table>
\t\t<div style=\"page-break-before: always;\"></div>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    public function getTemplateName()
    {
        return "WebIlluminationAdminBundle:Orders:viewInvoicesAndDeliveryNotes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 316,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 284,  643 => 282,  641 => 281,  636 => 280,  628 => 277,  623 => 276,  617 => 274,  615 => 273,  608 => 272,  605 => 271,  599 => 268,  585 => 264,  567 => 255,  526 => 217,  519 => 213,  509 => 208,  478 => 195,  465 => 187,  441 => 173,  431 => 169,  396 => 163,  364 => 157,  348 => 148,  336 => 145,  310 => 131,  304 => 129,  18 => 1,  489 => 199,  486 => 198,  473 => 193,  470 => 192,  466 => 190,  457 => 185,  451 => 181,  436 => 171,  422 => 167,  417 => 163,  413 => 162,  408 => 161,  388 => 158,  382 => 157,  350 => 151,  315 => 137,  312 => 136,  308 => 134,  800 => 335,  791 => 328,  788 => 327,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 315,  720 => 314,  718 => 313,  713 => 312,  711 => 311,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 296,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 283,  639 => 281,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 263,  563 => 254,  522 => 216,  515 => 211,  511 => 210,  505 => 206,  501 => 205,  499 => 204,  496 => 203,  493 => 202,  483 => 198,  480 => 196,  476 => 195,  474 => 194,  461 => 186,  446 => 175,  427 => 168,  418 => 166,  401 => 164,  398 => 163,  389 => 161,  372 => 160,  369 => 159,  357 => 155,  341 => 146,  332 => 144,  328 => 143,  325 => 142,  316 => 138,  278 => 120,  250 => 111,  163 => 72,  523 => 216,  516 => 212,  512 => 211,  506 => 207,  500 => 204,  497 => 203,  494 => 202,  484 => 198,  462 => 186,  447 => 175,  438 => 172,  393 => 162,  373 => 160,  370 => 159,  368 => 158,  361 => 156,  342 => 146,  329 => 143,  326 => 142,  319 => 139,  288 => 123,  229 => 105,  206 => 94,  147 => 64,  227 => 47,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 940,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 840,  916 => 833,  897 => 815,  884 => 803,  867 => 787,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 271,  561 => 501,  540 => 482,  514 => 458,  450 => 176,  354 => 154,  344 => 147,  219 => 100,  273 => 86,  263 => 115,  246 => 59,  234 => 106,  217 => 77,  173 => 60,  309 => 94,  285 => 122,  280 => 120,  276 => 119,  262 => 115,  235 => 80,  232 => 106,  212 => 96,  207 => 44,  143 => 57,  157 => 68,  366 => 158,  340 => 255,  503 => 205,  488 => 200,  475 => 194,  471 => 191,  467 => 190,  463 => 112,  433 => 170,  416 => 165,  412 => 104,  409 => 103,  404 => 100,  390 => 161,  362 => 157,  358 => 155,  356 => 94,  353 => 154,  349 => 91,  345 => 147,  306 => 130,  271 => 118,  253 => 110,  233 => 105,  226 => 103,  187 => 65,  150 => 65,  260 => 82,  155 => 67,  223 => 102,  186 => 63,  169 => 66,  301 => 128,  298 => 100,  292 => 98,  267 => 116,  258 => 114,  248 => 109,  242 => 107,  239 => 70,  237 => 107,  174 => 78,  182 => 82,  175 => 62,  144 => 59,  596 => 538,  589 => 533,  557 => 503,  545 => 493,  502 => 205,  495 => 202,  491 => 201,  432 => 170,  203 => 92,  114 => 43,  208 => 95,  183 => 83,  166 => 59,  423 => 167,  419 => 166,  411 => 215,  407 => 358,  403 => 213,  395 => 211,  383 => 345,  379 => 156,  375 => 206,  371 => 159,  363 => 157,  359 => 154,  355 => 201,  351 => 200,  347 => 150,  331 => 141,  323 => 141,  307 => 130,  303 => 109,  299 => 107,  295 => 99,  283 => 120,  279 => 120,  275 => 119,  265 => 116,  251 => 111,  199 => 90,  191 => 42,  170 => 59,  210 => 76,  180 => 59,  172 => 40,  168 => 60,  149 => 50,  139 => 44,  240 => 108,  230 => 104,  121 => 31,  257 => 222,  249 => 60,  106 => 40,  334 => 142,  294 => 125,  286 => 121,  277 => 118,  255 => 111,  244 => 110,  214 => 76,  198 => 90,  181 => 82,  167 => 73,  160 => 54,  45 => 9,  487 => 199,  481 => 197,  479 => 117,  477 => 195,  468 => 190,  444 => 108,  439 => 171,  424 => 167,  415 => 165,  392 => 162,  385 => 268,  376 => 161,  367 => 158,  360 => 156,  352 => 152,  338 => 235,  333 => 144,  327 => 194,  324 => 225,  320 => 139,  297 => 126,  274 => 117,  256 => 113,  254 => 112,  252 => 112,  231 => 67,  216 => 98,  213 => 97,  202 => 92,  458 => 109,  453 => 177,  448 => 95,  437 => 172,  434 => 87,  428 => 168,  414 => 69,  410 => 68,  405 => 165,  391 => 159,  387 => 209,  384 => 62,  322 => 140,  318 => 139,  300 => 127,  296 => 126,  293 => 125,  290 => 123,  284 => 122,  270 => 122,  266 => 114,  261 => 113,  247 => 111,  243 => 110,  238 => 107,  220 => 26,  201 => 43,  194 => 88,  130 => 49,  100 => 22,  85 => 26,  76 => 31,  112 => 35,  101 => 39,  98 => 38,  272 => 118,  269 => 117,  228 => 105,  221 => 77,  197 => 89,  184 => 64,  138 => 34,  118 => 40,  105 => 36,  66 => 21,  56 => 21,  115 => 29,  83 => 25,  164 => 73,  140 => 47,  58 => 15,  21 => 4,  61 => 23,  36 => 4,  209 => 95,  205 => 94,  196 => 72,  192 => 87,  189 => 86,  178 => 79,  176 => 41,  165 => 75,  161 => 70,  152 => 66,  148 => 48,  141 => 45,  134 => 60,  132 => 56,  127 => 48,  123 => 46,  109 => 63,  90 => 35,  54 => 14,  133 => 40,  124 => 42,  111 => 38,  107 => 35,  80 => 32,  69 => 30,  60 => 16,  52 => 16,  97 => 38,  95 => 37,  88 => 35,  78 => 32,  75 => 25,  71 => 30,  464 => 189,  459 => 324,  454 => 105,  449 => 176,  443 => 73,  429 => 72,  425 => 71,  420 => 68,  406 => 67,  402 => 164,  399 => 163,  343 => 149,  339 => 197,  335 => 196,  321 => 114,  317 => 138,  314 => 111,  311 => 110,  305 => 44,  291 => 124,  287 => 123,  282 => 121,  268 => 115,  264 => 115,  259 => 114,  245 => 119,  241 => 81,  236 => 107,  222 => 101,  218 => 100,  159 => 54,  154 => 67,  151 => 66,  145 => 47,  136 => 32,  128 => 29,  125 => 53,  119 => 45,  110 => 42,  96 => 34,  93 => 36,  91 => 36,  68 => 29,  65 => 20,  63 => 17,  43 => 6,  50 => 16,  25 => 4,  92 => 36,  86 => 22,  79 => 32,  46 => 13,  37 => 4,  33 => 3,  27 => 2,  82 => 33,  72 => 22,  64 => 17,  53 => 32,  49 => 6,  44 => 15,  42 => 7,  34 => 3,  29 => 6,  23 => 3,  19 => 1,  40 => 7,  20 => 3,  30 => 2,  26 => 2,  22 => 2,  224 => 101,  215 => 78,  211 => 106,  204 => 98,  200 => 73,  195 => 89,  193 => 88,  190 => 76,  188 => 86,  185 => 83,  179 => 48,  177 => 61,  171 => 75,  162 => 36,  158 => 69,  156 => 41,  153 => 67,  146 => 64,  142 => 46,  137 => 46,  131 => 44,  126 => 47,  120 => 45,  117 => 44,  103 => 33,  99 => 19,  77 => 31,  74 => 20,  57 => 17,  47 => 7,  39 => 5,  32 => 9,  24 => 3,  17 => 1,  135 => 38,  129 => 43,  122 => 46,  116 => 39,  113 => 43,  108 => 41,  104 => 40,  102 => 39,  94 => 21,  89 => 35,  87 => 30,  84 => 34,  81 => 33,  73 => 31,  70 => 21,  67 => 29,  62 => 16,  59 => 18,  55 => 17,  51 => 8,  48 => 15,  41 => 5,  38 => 4,  35 => 5,  31 => 4,  28 => 11,);
    }
}