<?php

/* WebIlluminationShopBundle:Checkout:invoice.html.twig */
class __TwigTemplate_ad0ba71a2cad08b77a13fb2c568587d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::email.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::email.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Your Order with Kitchen Appliance Centre: ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "orderNumber"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<table cellspacing=\"0\" border=\"0\" style=\"background-color: #DDDDDD;\" cellpadding=\"0\" width=\"100%\">
\t\t<tr>
\t\t\t<td valign=\"top\" style=\"padding: 10px;\">
\t\t\t\t<table cellspacing=\"0\" border=\"0\" align=\"center\" style=\"background: #FFFFFF; border: 1px solid #CCCCCC;\" cellpadding=\"0\" width=\"800\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td valign=\"top\">
\t\t\t\t\t\t\t<table cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"800\">
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"padding: 20px;\" width=\"760\">
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 0 0 10px 0; margin: 0; line-height: 120%;\">Hello ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "firstName"), "html", null, true);
        echo ",</p>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 0 0 10px 0; margin: 0; line-height: 120%;\">Thank you for ordering from Kitchen Appliance Centre.</p>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 0 0 10px 0; margin: 0; line-height: 120%;\">The details of your order can be found below. Please take a quick look and check the details. If anything's wrong, please call us on <strong>01159 385 111</strong>.</p>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 0 0 10px 0; margin: 0; line-height: 120%;\">A copy of your invoice has also been attached. The attachment is in PDF format and can be opened using Adobe Reader. You can download a free copy of Adobe Reader by visiting the <a style=\"font-family: Arial; font-size: 11px; color: #4EC0E3;\" target=\"_blank\" href=\"http://get.adobe.com/reader/\">Adobe</a> website.</p>
\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #000000; padding: 0 0 ";
        // line 17
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            echo "10px";
        } else {
            echo "0";
        }
        echo " 0; margin: 0; line-height: 120%;\">We'll let you know what's happening with your order by email.</p>
\t\t\t\t\t\t\t\t\t\t";
        // line 18
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 19
            echo "\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-weight: bold; font-size: 11px; color: #CC0000; padding: 0 0 0 0; margin: 0; line-height: 120%;\">PLEASE NOTE: YOU HAVE CHOSEN TO COLLECT YOUR ORDER. WE WILL CONTACT YOU AS SOON AS YOUR ORDER IS READY FOR COLLECTION.</p>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 21
        echo "\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Order Details</h3>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Number:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 25
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "orderNumber", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "orderNumber"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Order Status:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 27
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "status", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "status"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Name:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "firstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "lastName"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Email Address:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: lowercase;\">";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "emailAddress"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Payment Method:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 37
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "paymentType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "paymentType"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Delivery Method:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 39
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 40
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; font-weight: bold; background: #FFFFFF; color: #CC0000; font-size: 10px; font-family: 'Arial Black', Arial; padding: 5px 10px;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 42
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "deliveryType", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "deliveryType"), "-")) : ("-")), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 44
        echo "\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Daytime):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 47
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneDaytime"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Telephone (Evening):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 49
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "telephoneEvening"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Mobile:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px;\">";
        // line 51
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getContext($context, "order", true), "mobile", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getContext($context, "order", true), "mobile"), "-")) : ("-")), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" width=\"25%\"><strong>Billing Address:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
        // line 55
        ob_start();
        // line 56
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingFirstName"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingLastName"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 57
        if (($this->getAttribute($this->getContext($context, "order"), "billingOrganisationName") != "")) {
            // line 58
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingOrganisationName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 60
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine1"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 61
        if (($this->getAttribute($this->getContext($context, "order"), "billingAddressLine2") != "")) {
            // line 62
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingAddressLine2"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 64
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingTownCity"), "html", null, true);
        echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 65
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountyState") != "")) {
            // line 66
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingCountyState"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 68
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "GB")) {
            // line 69
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "billingPostZipCode"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 71
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if (($this->getAttribute($this->getContext($context, "order"), "billingCountryCode") == "IE")) {
            // line 72
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 74
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"120\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #DDDDDD; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; font-weight: bold;\"><strong>Delivery";
        // line 75
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") != "Collection")) {
            echo " Address";
        }
        echo ":</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 76
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 77
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #CC0000; font-size: 10px; font-family: 'Arial Black', Arial; font-weight: bold; padding: 5px 10px; text-transform: uppercase;\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 79
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"3\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 10px; font-family: Arial; padding: 5px 10px; text-transform: uppercase;\">";
            ob_start();
            // line 80
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryFirstName"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryLastName"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 81
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName") != "")) {
                // line 82
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryOrganisationName"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 84
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine1"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 85
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2") != "")) {
                // line 86
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryAddressLine2"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 88
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryTownCity"), "html", null, true);
            echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 89
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountyState") != "")) {
                // line 90
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCountyState"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 92
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "GB")) {
                // line 93
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryPostZipCode"), "html", null, true);
                echo "<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 95
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCountryCode") == "IE")) {
                // line 96
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tRepublic of Ireland
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 98
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 100
        echo "\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t";
        // line 102
        if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "customerNotes")) > 0)) {
            // line 103
            echo "\t\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 0px 0px;\">Notes</h3>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 104
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "customerNotes"));
            foreach ($context['_seq'] as $context["_key"] => $context["note"]) {
                // line 105
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-family: Arial; font-size: 11px; color: #CC0000; padding: 10px 0 0 0; margin: 0; line-height: 100%;\"><em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "note"), "note"), "html", null, true);
                echo "</em></p>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['note'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 107
            echo "\t\t\t\t\t\t\t\t\t\t";
        }
        // line 108
        echo "\t\t\t\t\t\t\t\t\t\t<h3 style=\"border-bottom: 1px dotted #676767; line-height: 100%; color: #000; font-size: 14px; font-family: Arial; padding: 20px 0px 5px 0px; margin: 0px 0px 10px 0px;\">Your Order</h3>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Product</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Code</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td width=\"1\" colspan=\"5\" valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; text-align: center; line-height: 120%; background: #DDDDDD; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; font-weight: bold;\" align=\"center\" width=\"180\"><strong>Price</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 115
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "order"), "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 116
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" align=\"left\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px;\">";
            // line 117
            ob_start();
            // line 118
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "header"), "html", null, true);
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 119
            if ((twig_length_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "selectedOptionLabels")) > 0)) {
                // line 120
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 121
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
                    // line 122
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;-&nbsp;&nbsp;";
                    echo $this->getContext($context, "selectedOptionLabel");
                    if ((!$this->getAttribute($this->getContext($context, "loop"), "last"))) {
                        echo "<br />";
                    }
                    // line 123
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
                // line 124
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 125
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\">";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "productCode"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "quantity"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&times;</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
            // line 129
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "unitCost"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">=</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: center;\" align=\"center\" width=\"1\">&pound;";
            // line 131
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "subTotal"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 134
        echo "\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse: collapse; border: 1px solid #CCC;\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" width=\"100%\">
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Subtotal before Delivery Charges (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 138
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "subTotal"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Delivery Charge (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 142
        if (($this->getAttribute($this->getContext($context, "order"), "deliveryType") == "Collection")) {
            // line 143
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #CC0000; color: #FFFFFF; font-weight: bold; font-size: 11px; font-family: 'Arial Black', Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">COLLECTION</td>
\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 145
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($this->getAttribute($this->getContext($context, "order"), "deliveryCharge") == 0)) {
                // line 146
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #4EC0E3; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">FREE</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 148
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "deliveryCharge"), 2), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 150
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 151
        echo "\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 152
        if (($this->getAttribute($this->getContext($context, "order"), "discount") > 0)) {
            // line 153
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Discount:</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #4EC0E3; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\">&pound;";
            // line 155
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "discount"), 2), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 158
        echo "\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>VAT (20%):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 160
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "vat"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #000; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\"><strong>Total to Pay (inc. VAT):</strong></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td valign=\"top\" style=\"border: 1px solid #CCC; line-height: 120%; background: #FFFFFF; color: #B72C54; font-size: 11px; font-family: Arial; padding: 5px 10px; text-align: right;\" align=\"right\" width=\"1\"><strong>&pound;";
        // line 164
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($this->getContext($context, "order"), "total"), 2), "html", null, true);
        echo "</strong></td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t";
        // line 167
        $this->env->loadTemplate("::emailFooter.html.twig")->display($context);
        // line 168
        echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t</table>
";
    }

    public function getTemplateName()
    {
        return "WebIlluminationShopBundle:Checkout:invoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  530 => 163,  504 => 149,  498 => 147,  492 => 144,  482 => 189,  289 => 121,  714 => 654,  592 => 534,  559 => 507,  544 => 493,  513 => 153,  583 => 397,  577 => 393,  575 => 392,  573 => 391,  564 => 383,  644 => 211,  600 => 205,  593 => 203,  584 => 529,  569 => 516,  455 => 158,  435 => 367,  337 => 121,  1308 => 1052,  1301 => 1047,  1267 => 1015,  1255 => 1005,  1210 => 962,  1203 => 958,  1199 => 956,  1189 => 947,  1176 => 935,  1140 => 900,  1122 => 884,  1114 => 878,  1096 => 862,  1088 => 856,  1070 => 840,  1062 => 834,  1054 => 827,  1022 => 797,  1005 => 781,  994 => 771,  933 => 711,  894 => 674,  836 => 619,  789 => 575,  760 => 548,  698 => 491,  664 => 459,  618 => 417,  555 => 376,  510 => 152,  472 => 167,  456 => 382,  440 => 151,  377 => 125,  313 => 136,  281 => 110,  469 => 403,  426 => 335,  421 => 333,  397 => 315,  860 => 707,  829 => 678,  817 => 668,  775 => 628,  768 => 624,  764 => 622,  754 => 543,  741 => 601,  682 => 544,  655 => 519,  625 => 491,  614 => 481,  558 => 427,  534 => 404,  520 => 350,  381 => 199,  225 => 186,  400 => 362,  1851 => 1728,  1836 => 1715,  1824 => 1704,  1787 => 1668,  1742 => 1625,  1717 => 1602,  1702 => 1588,  1667 => 1554,  1658 => 1546,  1649 => 1538,  1640 => 1530,  1613 => 1504,  1593 => 1485,  1590 => 1483,  1588 => 1482,  1586 => 1481,  1480 => 1377,  1465 => 1364,  1453 => 1353,  1416 => 1317,  1371 => 1274,  1346 => 1251,  1331 => 1237,  1296 => 1203,  1287 => 1195,  1278 => 1187,  1269 => 1179,  1242 => 1153,  1222 => 1134,  1219 => 1132,  1217 => 1131,  1215 => 1130,  1109 => 1026,  1094 => 1013,  1082 => 1002,  1045 => 966,  1000 => 923,  975 => 900,  960 => 886,  925 => 852,  907 => 836,  898 => 828,  871 => 802,  851 => 783,  848 => 781,  846 => 780,  844 => 779,  738 => 675,  629 => 572,  554 => 501,  536 => 341,  527 => 477,  346 => 89,  560 => 178,  552 => 191,  548 => 172,  543 => 170,  539 => 169,  535 => 362,  531 => 167,  507 => 158,  490 => 192,  485 => 417,  445 => 153,  386 => 127,  380 => 247,  330 => 292,  302 => 255,  1001 => 904,  993 => 898,  931 => 838,  918 => 827,  870 => 781,  863 => 777,  856 => 772,  853 => 771,  822 => 739,  780 => 701,  705 => 630,  656 => 583,  642 => 507,  574 => 509,  566 => 503,  374 => 124,  804 => 336,  792 => 328,  783 => 325,  773 => 322,  770 => 321,  756 => 320,  753 => 319,  747 => 318,  744 => 317,  727 => 518,  724 => 315,  722 => 314,  717 => 313,  715 => 312,  712 => 311,  699 => 303,  696 => 302,  687 => 300,  680 => 298,  678 => 297,  671 => 292,  665 => 290,  658 => 287,  652 => 285,  649 => 579,  643 => 282,  641 => 210,  636 => 280,  628 => 277,  623 => 276,  617 => 206,  615 => 273,  608 => 541,  605 => 271,  599 => 268,  585 => 264,  567 => 435,  526 => 217,  519 => 164,  509 => 198,  478 => 195,  465 => 187,  441 => 169,  431 => 148,  396 => 131,  364 => 157,  348 => 146,  336 => 181,  310 => 119,  304 => 120,  18 => 1,  489 => 143,  486 => 191,  473 => 428,  470 => 138,  466 => 164,  457 => 130,  451 => 182,  436 => 119,  422 => 147,  417 => 163,  413 => 330,  408 => 368,  388 => 100,  382 => 126,  350 => 224,  315 => 138,  312 => 264,  308 => 259,  800 => 335,  791 => 328,  788 => 707,  779 => 324,  774 => 322,  769 => 321,  766 => 320,  752 => 319,  749 => 318,  743 => 317,  740 => 316,  723 => 662,  720 => 314,  718 => 579,  713 => 312,  711 => 651,  708 => 310,  704 => 309,  692 => 301,  683 => 299,  679 => 298,  676 => 297,  674 => 537,  667 => 291,  661 => 288,  657 => 287,  654 => 286,  648 => 284,  645 => 442,  639 => 573,  637 => 280,  632 => 279,  626 => 277,  624 => 276,  619 => 275,  613 => 273,  611 => 272,  601 => 269,  597 => 268,  595 => 267,  581 => 196,  563 => 254,  522 => 157,  515 => 211,  511 => 344,  505 => 428,  501 => 148,  499 => 426,  496 => 203,  493 => 219,  483 => 440,  480 => 188,  476 => 208,  474 => 168,  461 => 363,  446 => 257,  427 => 146,  418 => 142,  401 => 164,  398 => 193,  389 => 141,  372 => 160,  369 => 314,  357 => 102,  341 => 288,  332 => 119,  328 => 86,  325 => 117,  316 => 166,  278 => 98,  250 => 68,  163 => 104,  523 => 216,  516 => 154,  512 => 211,  506 => 207,  500 => 451,  497 => 453,  494 => 151,  484 => 141,  462 => 133,  447 => 180,  438 => 172,  393 => 257,  373 => 163,  370 => 240,  368 => 106,  361 => 285,  342 => 145,  329 => 142,  326 => 276,  319 => 131,  288 => 102,  229 => 63,  206 => 75,  147 => 41,  227 => 42,  1144 => 1036,  1137 => 1031,  1103 => 999,  1091 => 989,  1046 => 946,  1039 => 942,  1035 => 809,  1025 => 931,  1012 => 919,  976 => 884,  958 => 868,  950 => 862,  932 => 846,  924 => 703,  916 => 844,  897 => 815,  884 => 803,  867 => 648,  842 => 763,  833 => 755,  795 => 329,  778 => 323,  748 => 675,  721 => 649,  695 => 302,  651 => 584,  630 => 278,  604 => 549,  561 => 501,  540 => 364,  514 => 161,  450 => 354,  354 => 122,  344 => 301,  219 => 157,  273 => 214,  263 => 107,  246 => 100,  234 => 64,  217 => 69,  173 => 100,  309 => 108,  285 => 80,  280 => 235,  276 => 74,  262 => 92,  235 => 189,  232 => 175,  212 => 76,  207 => 152,  143 => 71,  157 => 97,  366 => 95,  340 => 160,  503 => 223,  488 => 324,  475 => 429,  471 => 191,  467 => 190,  463 => 399,  433 => 167,  416 => 112,  412 => 184,  409 => 103,  404 => 100,  390 => 312,  362 => 146,  358 => 284,  356 => 135,  353 => 266,  349 => 90,  345 => 307,  306 => 107,  271 => 95,  253 => 212,  233 => 204,  226 => 62,  187 => 61,  150 => 114,  260 => 91,  155 => 98,  223 => 61,  186 => 159,  169 => 66,  301 => 254,  298 => 180,  292 => 243,  267 => 109,  258 => 121,  248 => 115,  242 => 108,  239 => 190,  237 => 65,  174 => 32,  182 => 72,  175 => 55,  144 => 56,  596 => 538,  589 => 390,  557 => 503,  545 => 189,  502 => 156,  495 => 330,  491 => 421,  432 => 176,  203 => 50,  114 => 42,  208 => 92,  183 => 101,  166 => 62,  423 => 114,  419 => 113,  411 => 138,  407 => 110,  403 => 323,  395 => 103,  383 => 153,  379 => 153,  375 => 151,  371 => 152,  363 => 94,  359 => 93,  355 => 92,  351 => 278,  347 => 101,  331 => 141,  323 => 145,  307 => 238,  303 => 80,  299 => 152,  295 => 87,  283 => 249,  279 => 75,  275 => 109,  265 => 93,  251 => 111,  199 => 150,  191 => 33,  170 => 107,  210 => 93,  180 => 55,  172 => 64,  168 => 44,  149 => 96,  139 => 85,  240 => 99,  230 => 82,  121 => 41,  257 => 195,  249 => 88,  106 => 82,  334 => 120,  294 => 113,  286 => 171,  277 => 113,  255 => 193,  244 => 107,  214 => 77,  198 => 62,  181 => 128,  167 => 96,  160 => 50,  45 => 5,  487 => 142,  481 => 320,  479 => 140,  477 => 430,  468 => 180,  444 => 196,  439 => 132,  424 => 145,  415 => 143,  392 => 102,  385 => 154,  376 => 319,  367 => 149,  360 => 123,  352 => 91,  338 => 267,  333 => 87,  327 => 118,  324 => 289,  320 => 168,  297 => 105,  274 => 96,  256 => 90,  254 => 89,  252 => 101,  231 => 127,  216 => 95,  213 => 58,  202 => 35,  458 => 139,  453 => 177,  448 => 298,  437 => 150,  434 => 287,  428 => 116,  414 => 354,  410 => 164,  405 => 134,  391 => 129,  387 => 171,  384 => 333,  322 => 116,  318 => 115,  300 => 79,  296 => 124,  293 => 104,  290 => 103,  284 => 100,  270 => 122,  266 => 71,  261 => 70,  247 => 191,  243 => 86,  238 => 107,  220 => 79,  201 => 74,  194 => 71,  130 => 49,  100 => 43,  85 => 34,  76 => 33,  112 => 16,  101 => 20,  98 => 44,  272 => 118,  269 => 108,  228 => 81,  221 => 80,  197 => 72,  184 => 60,  138 => 80,  118 => 92,  105 => 23,  66 => 17,  56 => 13,  115 => 23,  83 => 19,  164 => 61,  140 => 24,  58 => 20,  21 => 4,  61 => 18,  36 => 3,  209 => 150,  205 => 146,  196 => 66,  192 => 120,  189 => 119,  178 => 145,  176 => 110,  165 => 101,  161 => 100,  152 => 88,  148 => 42,  141 => 93,  134 => 85,  132 => 77,  127 => 32,  123 => 29,  109 => 55,  90 => 41,  54 => 8,  133 => 34,  124 => 42,  111 => 64,  107 => 25,  80 => 32,  69 => 29,  60 => 18,  52 => 6,  97 => 45,  95 => 22,  88 => 34,  78 => 30,  75 => 17,  71 => 21,  464 => 178,  459 => 160,  454 => 105,  449 => 155,  443 => 152,  429 => 166,  425 => 165,  420 => 143,  406 => 162,  402 => 343,  399 => 105,  343 => 125,  339 => 215,  335 => 298,  321 => 139,  317 => 123,  314 => 87,  311 => 82,  305 => 135,  291 => 174,  287 => 77,  282 => 76,  268 => 128,  264 => 112,  259 => 123,  245 => 67,  241 => 85,  236 => 84,  222 => 158,  218 => 79,  159 => 60,  154 => 43,  151 => 57,  145 => 77,  136 => 100,  128 => 30,  125 => 47,  119 => 28,  110 => 40,  96 => 33,  93 => 18,  91 => 17,  68 => 21,  65 => 18,  63 => 13,  43 => 12,  50 => 13,  25 => 8,  92 => 70,  86 => 25,  79 => 18,  46 => 7,  37 => 3,  33 => 3,  27 => 2,  82 => 27,  72 => 37,  64 => 16,  53 => 17,  49 => 8,  44 => 14,  42 => 13,  34 => 3,  29 => 2,  23 => 6,  19 => 2,  40 => 4,  20 => 2,  30 => 2,  26 => 2,  22 => 3,  224 => 65,  215 => 59,  211 => 178,  204 => 61,  200 => 104,  195 => 54,  193 => 46,  190 => 92,  188 => 69,  185 => 68,  179 => 66,  177 => 65,  171 => 31,  162 => 62,  158 => 132,  156 => 90,  153 => 58,  146 => 41,  142 => 55,  137 => 86,  131 => 31,  126 => 92,  120 => 44,  117 => 50,  103 => 37,  99 => 23,  77 => 25,  74 => 29,  57 => 17,  47 => 13,  39 => 4,  32 => 10,  24 => 2,  17 => 1,  135 => 51,  129 => 70,  122 => 72,  116 => 63,  113 => 53,  108 => 39,  104 => 58,  102 => 17,  94 => 21,  89 => 31,  87 => 36,  84 => 16,  81 => 27,  73 => 28,  70 => 15,  67 => 19,  62 => 25,  59 => 13,  55 => 12,  51 => 7,  48 => 8,  41 => 7,  38 => 4,  35 => 3,  31 => 5,  28 => 2,);
    }
}
